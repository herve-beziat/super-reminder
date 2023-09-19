<?php

require_once('../config/db.php');

class Users {
    private ?int $id;
    private ?string $login;
    private ?string $password;

    public function __construct() {
        //empty
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }   

    public function getPassword() {
        return $this->password;
    }

    public static function checkLoginExist($login) {
        require_once('../config/db.php');
        global $bdd;

        $query = $bdd->prepare('SELECT * FROM users WHERE login = :login');
        $query->bindparam(':login', $login, PDO::PARAM_STR, 255);
        $query->execute();

        return $query->rowCount();
    }

    public static function register($login, $password) {
        require_once('../config/db.php');
        global $bdd;

        $login = trim(htmlspecialchars($login));

        $mess_exist = "User déjà existant";
        $champs_vide = "Veuillez remplir tous les champs";
        $mess_done = "Inscription réussie";

        if (empty($login) || empty($password)) {
            echo $champs_vide;
        } else {
            $query = $bdd->prepare('SELECT * FROM users WHERE login = :login');
            $query->bindParam(':login', $login, PDO::PARAM_STR, 255);
            $query->execute();
            $result = $query->fetch();
            
            if ($result) {
                echo $mess_exist;
            } else {
                $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                $request = $bdd->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
                $request->bindParam(':login', $login, PDO::PARAM_STR, 255);
                $request->bindParam(':password', $pass_hash, PDO::PARAM_STR, 255);
                $request->execute();
                return $mess_done;
            }
        }
    }

    public static function connect($login, $password) {
        require_once('../config/db.php');
        global $bdd;

        $mess_error = "Veuillez saisir tous les champs";
        $mess_login = "Login incorrect";
        $mess_password = "Mot de passe incorrect";
        $mess_done = "Connexion réussie";

        if (empty($login) || empty($password)) {
            echo $mess_error;
        } else {
            $request = $bdd->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
            $request->bindParam(':login', $login, PDO::PARAM_STR, 255);
            $request->execute();
            $count = $request->fetchColumn();
            
            if ($count > 0) {
                $request = $bdd->prepare('SELECT * FROM users WHERE login = :login');
                $request->bindParam(':login', $login, PDO::PARAM_STR, 255);
                $request->execute();
                $row = $request->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $row['password'])) {
                    // session_start();
                    $_SESSION['login'] = $login;
                    echo $mess_done;
                } else {
                    echo $mess_password;
                }
            } else {
                return $mess_login;
            }
        }
    }



public static function logout() {
    session_start();
    session_destroy();
    header('Location: ../index.php');
    exit();
}
}

// $users = new Users();
// $users->register('test6', 'test');

?>

