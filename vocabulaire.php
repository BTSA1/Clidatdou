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

$anglais[0] = "";
$francais[0] = "";

require 'views/view-vocabulaire.php';