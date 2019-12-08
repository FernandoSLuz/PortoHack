<?php
session_start();
session_destroy();
$_SESSION['email']!="";
$_SESSION['login']!=false;
unset($_SESSION['email']);
unset($_SESSION['login']);
header('Location: index.php');

?>
