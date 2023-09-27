<?php
session_start();

require_once '../src/Users.php';
require_once '../src/Tasks.php';
require_once '../config/db.php';
require_once '../controller/profil.php';
require_once '../controller/tasks.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <script defer src="../script/profil.js"></script>
    <title>profil</title>
</head>
    <?php require_once '../include/header.php';?>
<body>

    <div class="container">
        <div class="container-left">
            <div class="container-left-top">
                <h2>Menu</h2>
            </div>
            <div class="container-left-bottom">
                <ul id="onglets" class="onglets">
                    <li><a href="./profil.php">Accueil</a></li>
                    <li><a href="#" id="load-tasks">Afficher la liste</a></li>
                    <li><a href="#" id="addTasksLink">Ajouter une tâche</a></li> 
                </ul>
            </div>
        </div>
        <div class="container-right">
            <div class="container-right-top">
                <h3>Bienvenue <?php echo $_SESSION['login']; ?></h3>
            </div>
            <div class="container-right-bottom">
                <div id="container-profil">
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
    <?php require_once '../include/footer.php';?>
</html>
