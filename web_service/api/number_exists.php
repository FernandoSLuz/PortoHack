<?php
include(',,/sql_connect.php');

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
