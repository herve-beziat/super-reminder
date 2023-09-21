<?php
session_start();

require_once '../src/Users.php';
require_once '../config/db.php';
require_once '../controller/inscription.php';
require_once '../controller/connexion.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script defer src="../script/signup.js"></script>
    <script defer src="../script/connexion.js"></script>
    <script defer src="../script/inscription.js"></script>
</head>
<?php require_once '../include/header.php';?>


<body>
    <div id="signup-btn">
        <a href="../viewer/signup.php?form=connexion" id="connexion"> Se connecter</a>
        <a href="../viewer/signup.php?form=inscription" id="inscription"> S'inscrire</a>
    </div>

    <div id="container-sign">

    </div>
    <div id="container-form-sign">

    </div>
    
</body>
<?php require_once '../include/footer.php';?>
</html>