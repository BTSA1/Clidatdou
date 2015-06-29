<?php require 'include/config.php';
if(isset($_POST['valider']))
{
    $prenom = $_POST['prenom'];
    $mdp = md5($_POST['mdp']);
    
    $req = $bdd->prepare('SELECT * FROM membre WHERE prenom = :prenom');
    $req->execute(array(
        'prenom' => $prenom
    ));
    $info_membre = $req->fetch();
    
    if(isset($info_membre['prenom']))
    {
        if($mdp == $info_membre['mdp'])
        {
            $_SESSION['prenom'] = $info_membre['prenom'];
            if(isset($_POST['save']))
            {
                setcookie('prenom', $info_membre['prenom'], time() + 30*24*3600, null, null, false, true);
            }
            header('Location: index.php');
        }
        else
        {
            $erreur = 'Le mot de passe est incorrect.';
        }			
    }
    else
    {
        $erreur = 'Le pseudo n\'existe pas.';
    }
}
require 'views/view-login.php';