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

$req = $bdd->prepare('SELECT * FROM membre WHERE prenom = ?');
$req->execute(array(
    $prenom
));
$info_membre = $req->fetch();
$idPrenom = $info_membre['id'];

if(isset($_POST['valider']))
{
    $titre = mysql_escape_string($_POST['titre']);
    $url = mysql_escape_string(htmlspecialchars($_POST['url']));
    
    if(isset($_GET['id']))
    {
        $req = $bdd->prepare('UPDATE lien SET url = :url, titre = :titre WHERE id = :id');
        $req->execute(array(
            'url' => $url,
            'titre' => $titre,
            'id' => $_GET['id']
        ));
        header('Location: gestionLien.php');
    }
    else
    {
        $req = $bdd->prepare('INSERT INTO lien VALUES("", :url, :titre, :prenom)');
        $req->execute(array(
            'url' => $url,
            'titre' => $titre,
            'prenom' => $idPrenom
        ));
        header('Location: index.php');
    }
}
require 'views/view-partageLien.php';