<?php include('../include/config.php'); 
    $prenom = $_SESSION['prenom']; 

    $req = $bdd->prepare('UPDATE membre SET derniereConnexion = :date WHERE prenom = :prenom');
    $req->execute(array(
        'date' => date('Y-m-d G:i:s'),
        'prenom' => $prenom
    ));
?>