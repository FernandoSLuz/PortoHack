<?php
include('sql_connect.php');
include('globals.php');
?>
<?php
session_start();
if(!isset($_SESSION['login']) || !($_SESSION['login']) || ($_SESSION['username'])==""){
	header('Location: logout.php');
}
?>
<html>
  <head>
    <title><?php echo $appName?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
      body{
        padding: 30px;
      }
    </style>
  </head>
  <body>
