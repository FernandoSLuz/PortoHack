<?php
$link = mysqli_connect("localhost", "hacksantos", "user_password", "porto");
if($link){
  echo "Deu bom uhul";
}
else{
  echo "Perdeu 1h";
}
?>
