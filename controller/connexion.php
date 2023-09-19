<?php

if (isset($_POST['login']) && isset($_POST['password'])) {
    echo Users::connect($_POST['login'], $_POST['password']);
    die();
}


?>