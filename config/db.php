<?php

// connexion à la base de données

$db = "mysql:host=localhost;dbname=super-reminder";

$host="root";
$password="Romain-1964";

try {
    $bdd = new PDO($db, $host, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Connexion échouée : " . $e->getMessage();
}

?>