<?php
session_start();
require_once '../src/Users.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>home</title>
</head>

<?php require_once '../include/header.php'; ?>

<body>
    <div class="home-content">
        <img src="../assets/logo/logo.png" alt="Logo Super-Reminder" class="logo">
        <div class="home-text">
            <h1>Bienvenue sur Super - Reminder ! </h1><br>
                </p>Ce Projet vous est proposé par Hervé et Romain, deux étudiants qui vont devenir des monstres du code ! <br> <br>
                    Les formulaires d'inscriptions ,de connexion ainsi que l'ajout des tâches sont gérés en asynchrone. <br><br>
                    Vous pouvez donc vous inscrire et vous connecter sans recharger la page ! <br> <br>
                    Vous pouvez également ajouter des tâches, et gérer l'état de celles-ci ! <br><br><br>
                    Bonne utilisation !</p>
        </div>
    </div>
</body>
<?php require_once '../include/footer.php'; ?>
</html>
