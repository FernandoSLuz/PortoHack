<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ('sql_connect.php');
$name = $_POST['name'];
$phone = $_POST['phone'];

$sql = 'INSERT into PhoneNumbers(id, name, phone, id_Terminal, id_User) VALUES(NULL, "'.$name.'", "'.$phone.'", 1, 1)';

if(mysqli_query($link, $sql)){
  header('Location: employees.php?success=true');
}
else{
  header('Location: employees.php?success=fail');
}

 ?>
