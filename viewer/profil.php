<?php
session_start();

require_once '../src/Users.php';
require_once '../config/db.php';
require_once '../controller/profil.php';

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
                <ul>
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
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Task 1</td>
                                <td>Description for Task 1</td>
                                <td>20/09/2023</td>
                                <td>Completed</td>
                                <td>
                                    <select class="status-dropdown">
                                        <option value="completed">Completed</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="not_started">Not Started</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Task 2</td>
                                <td>Description for Task 2</td>
                                <td>21/09/2023</td>
                                <td>In Progress</td>
                                <td>
                                    <select class="status-dropdown">
                                        <option value="in_progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                        <option value="not_started">Not Started</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Task 3</td>
                                <td>Description for Task 3</td>
                                <td>22/09/2023</td>
                                <td>Not Started</td>
                                <td>
                                    <select class="status-dropdown">
                                        <option value="not_started">Not Started</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
    <?php require_once '../include/footer.php';?>
</html>
