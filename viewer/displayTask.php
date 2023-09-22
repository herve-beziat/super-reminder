<?php
session_start();
require_once '../config/db.php';
require_once '../src/Users.php';
require_once '../src/Tasks.php';

$user_id = Users::getUserIdByUsername();

$disTasks = new Tasks;
$test=$disTasks->displayTasks($user_id);    
?>



<div class="table-container">
  <table id="tableTasks">
    <tr>
      <th>id</th>
      <th>Titre</th>
      <th>Description</th>
      <th>Statut</th>
      <th>Date</th>
      <th>Changer le statut</th>
    </tr>
    <?php foreach($test as $value) : ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['title'] ?></td>
      <td><?= $value['description'] ?></td>
      <td><?= $value['state'] ?></td>
      <td><?= $value['date'] ?></td>
      <td>
        <select class="status-dropdown">
            <option value="not_started">Not Started</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</div>