<?php

require_once('../config/db.php');
require_once('../src/Users.php');

class Tasks {
    private ?int $id;
    private ?string $title;
    private ?string $description;
    private ?string $state;
    private ?string $date;
    private ?int $user_id;

    public function __construct() {
        //empty
    }

    public function getId(): ?int {
        return $this->id;  
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getState(): ?string {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }   

    public function getDate(): ?string {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getUserId(): ?int {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    


    public static function addTask($title, $description) {
        require_once('../config/db.php');
        global $bdd;
    
        $title = trim(htmlspecialchars($title));
        $description = trim(htmlspecialchars($description));
    
        $mess_exist = "Tâche déjà existante";
        $champs_vide = "Veuillez remplir tous les champs";
        $mess_done = "Tâche ajoutée";
    
        // Statut par défaut : "In progress"
        $state = "Not Started";
    
        if (empty($title) || empty($description)) {
            echo $champs_vide;
        } else {
            //session_start();
            $user_id= Users::getUserIdByUsername();

            // Vérifier si une tâche avec le même titre existe déjà pour l'utilisateur
            $query_check = $bdd->prepare('SELECT COUNT(*) FROM tasks WHERE title = :title AND user_id = :user_id');
            $query_check->bindparam(':title', $title, PDO::PARAM_STR, 255);
            $query_check->bindparam(':user_id', $user_id, PDO::PARAM_INT, 11);
            $query_check->execute();
            $task_count = $query_check->fetchColumn();
    
            if ($task_count > 0) {
                echo $mess_exist;
            } else {
                // Générez la date actuelle au format AAAA-MM-JJ HH:MM:SS
                $date = date("Y-m-d H:i:s");
    
                // Insérez la tâche dans la base de données avec la date actuelle
                $query = $bdd->prepare('INSERT INTO tasks (title, description, state, date, user_id) VALUES (:title, :description, :state, :date, :user_id)');
                $query->bindparam(':title', $title, PDO::PARAM_STR, 255);
                $query->bindparam(':description', $description, PDO::PARAM_STR, 255);
                $query->bindparam(':state', $state, PDO::PARAM_STR, 255);
                $query->bindparam(':date', $date, PDO::PARAM_STR);
                $query->bindparam(':user_id', $user_id, PDO::PARAM_INT, 11);
                $query->execute();
                echo $mess_done;
            }
        }
    }
    
    

    public static function deleteTask($id) {
        require_once('../config/db.php');
        global $bdd;

        $id = trim(htmlspecialchars($id));

        
        $mess_done = "Tâche supprimée";

            $query = $bdd->prepare('DELETE FROM tasks WHERE id = :id');
            $query->bindparam(':id', $id, PDO::PARAM_INT, 11);
            $query->execute();
            echo $mess_done;
    }

    public static function displayTasks($user_id) {
        require_once('../config/db.php');
        global $bdd;

        $user_id = trim(htmlspecialchars($user_id));

        $query = $bdd->prepare('SELECT tasks.id, tasks.title, tasks.description, tasks.state, tasks.date
                                FROM tasks
                                INNER JOIN users ON tasks.user_id = users.id
                                WHERE users.id = :user_id;
        ');
        $query->bindparam(':user_id', $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function modifyState($id, $state) {
        require_once('../config/db.php');
        global $bdd;

        $id = trim(htmlspecialchars($id));
        $state = trim(htmlspecialchars($state));

        $mess_done = "Statut modifié";

        $query = $bdd->prepare('UPDATE tasks SET state = :state WHERE id = :id');
        $query->bindparam(':id', $id, PDO::PARAM_INT, 11);
        $query->bindparam(':state', $state, PDO::PARAM_STR, 255);
        $query->execute();
        echo $mess_done;
    }


}

//$tasks = new Tasks();
//$tasks->addTask('test2', 'test2');
//$tasks->displayTasks('1');

?>