<?php 
session_start();
try
{
    $host = 'localhost';
    $dbname = 'clidatdo_bdd';
    $root = 'root';
    $password = '';
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $root, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");
?>