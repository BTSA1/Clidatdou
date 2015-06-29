<?php include('../include/config.php');
$req = $bdd->prepare('DELETE FROM lien WHERE id = :id');
$req->execute(array('id' => $_POST['id']));
?>