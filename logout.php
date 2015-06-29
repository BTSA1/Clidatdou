<?php 
require 'include/config.php';
setcookie('prenom', NULL, -1);
session_destroy();
header('Location: login.php');
?>