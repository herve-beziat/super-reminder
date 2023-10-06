<?php
if (isset($_POST['id']) && isset($_POST['state'])) {
    $id = $_POST['id'];
    $state = $_POST['state'];
    
    // Assurez-vous que $id et $state sont valides, par exemple, en les filtrant et en vérifiant leur intégrité.
    
    // Utilisez la fonction `modifyState` pour mettre à jour le statut de la tâche.
    Tasks::modifyState($id, $state);
    
    // Redirigez l'utilisateur vers la page profil.php après avoir effectué la modification.
    header("Location: ../viewer/profil.php");
    die();
}
?>
