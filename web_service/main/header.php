<?php
include('sql_connect.php');
include('globals.php');
?>
<?php
session_start();
//if(!isset($_SESSION['login']) || !($_SESSION['login']) || ($_SESSION['email'])==""){
//	header('Location: logout.php');
//}
?>
<html>
  <head>
    <title><?php echo $appName?></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="@{'/public/stylesheets/datatables-bootstrap.css'}"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      body{
        padding: 30px;
      }
    </style>
  </head>
  <body>
