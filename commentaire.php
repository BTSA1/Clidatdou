<?php require 'include/config.php'; 
if(!isset($_SESSION['prenom']))
{
    if(isset($_COOKIE['prenom']))
    {
        $_SESSION['prenom'] = $_COOKIE['prenom'];
    }
    else
    {
        header('Location: login.php');
    }
}
require 'models/session.php'; 

$req = $bdd->prepare('SELECT * FROM membre WHERE prenom = :prenom');
$req->execute(array('prenom' => $prenom));
$info_membre = $req->fetch();
$idPrenom = $info_membre['id'];

if(isset($_POST['envoyer']))
{
    $contenu = $_POST['contenu'];
    
    if(isset($_GET['id']))
    {
        $update = $bdd->prepare('UPDATE message SET contenu = :contenu WHERE id = :id');
        $update->execute(array( 
            'contenu' => $contenu,
            'id' => $_GET['id']
        ));
    }
    else
    {
        $insert = $bdd->prepare('INSERT INTO message VALUES("", :contenu, :prenom)');
        $insert->execute(array(
            'contenu' => $contenu,
            'prenom' => $idPrenom
        ));
    }
    
    header('Location: index.php');
} 
require 'views/view-commentaire.php';