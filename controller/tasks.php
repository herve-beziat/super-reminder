<?php


if (isset($_POST['title']) && isset($_POST['description'])) {
    echo Tasks::addTask($_POST['title'], $_POST['description']);
    header("Location: ../viewer/profil.php");
    die();
}


?>







