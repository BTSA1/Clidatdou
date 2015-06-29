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
$req->execute(array(
    'prenom' => $prenom
));
$info_membre = $req->fetch();
$idPrenom = $info_membre['id'];

if(isset($_POST['valider']))
{
    $req = $bdd->prepare('UPDATE membre SET adresse = :adresse , ville = :ville, tel = :tel, dateNaissance = :dateNaissance, email = :email, skype = :skype WHERE id = :id');
    $req->execute(array(
        'adresse' => $_POST['adresse'],
        'ville' => $_POST['ville'],
        'tel' => $_POST['tel'],
        'dateNaissance' => $_POST['dateNaissance'],
        'email' => $_POST['email'],
        'skype' => $_POST['skype'],
        'id' => $idPrenom
    ));
    header('Location: contact.php');
}
require 'views/view-compte.php';