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

if(isset($_POST['ajouter']))
{
	$titre = mysql_escape_string($_POST['titre']);
	$url = mysql_escape_string(htmlspecialchars($_POST['url']));
	mysql_query('INSERT INTO lien VALUES("", "'.$url.'", "'.$titre.'", "'.$pseudo.'")');
	header('Location: index.php');
}

if(isset($_POST['envoyer']))
{
	$contenu = mysql_escape_string($_POST['contenu']);
	mysql_query('INSERT INTO message VALUES("", "'.$contenu.'", "'.$pseudo.'")');
	header('Location: index.php');
}
require 'views/view-option.php';