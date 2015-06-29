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

function DateEnLettre($date)
{
    list($annee, $mois, $jour) = explode('-', $date);
    switch($mois)
    {
        case 1:
            $moisEnLettre = 'Janvier';
            break;
        case 2:
            $moisEnLettre = 'Février';
            break;
        case 3:
            $moisEnLettre = 'Mars';
            break;
        case 4:
            $moisEnLettre = 'Avril';
            break;
        case 5:
            $moisEnLettre = 'Mai';
            break;
        case 6:
            $moisEnLettre = 'Juin';
            break;
        case 7:
            $moisEnLettre = 'Juillet';
            break;
        case 8:
            $moisEnLettre = 'Août';
            break;
        case 9:
            $moisEnLettre = 'Septembre';
            break;
        case 10:
            $moisEnLettre = 'Octobre';
            break;
        case 11:
            $moisEnLettre = 'Novembre';
            break;
        case 12:
            $moisEnLettre = 'Décembre';
            break;
    }
    return $jour.' '.$moisEnLettre.' '.$annee;
}
require 'views/view-contact.php';