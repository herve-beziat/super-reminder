<?php
if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['conf-password'])) {
    echo Users::register($_POST['login'], $_POST['password']);
    die();
}

?>

