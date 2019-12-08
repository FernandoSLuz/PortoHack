<?php
include('../sql_connect.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$phone = $_GET['phone'];

$sql = 'SELECT * FROM PhoneNumbers WHERE phone LIKE "'.$phone.'"';

if($res = mysqli_query($link, $sql)){
  if(mysqli_num_rows($res) > 0){
    echo "true";
  }
  else{
    echo "false";
  }
}


 ?>
