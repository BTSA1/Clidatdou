<?php include('../include/config.php');
$req = $bdd->prepare('DELETE FROM message WHERE id = :id');
$req->execute(array('id' => $_POST['id']));
?>