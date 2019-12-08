<?php
if(!isset($_REQUEST['id_Terminal']) || !isset($_REQUEST['id_User']) || !isset($_REQUEST['media'])){
    echo "Campos n達o preenchidos corretamente.";
}
else{

    define('UPLOAD_DIR', 'uploadedimages/');
    $image_parts = explode(";base64,", 'data:image/jpeg;base64,'.$_REQUEST['image']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $image_name = uniqid();
    $file = UPLOAD_DIR . $image_name . '.jpg';
    echo "id : ".$_REQUEST['id_Terminal']." - image: ".$image_name;
    file_put_contents($file, $image_base64);
    include_once("../sqlconnect.php");

    $sql = "INSERT INTO Report(id, id_Terminal, id_User, type, status, timestamp, media, description)
    VALUES(null, '.$_REQUEST['id_Terminal'].','.$_REQUEST['id_User'].',  '.$_REQUEST['type'].', '.$_REQUEST['status'].',CURRENT_TIMESTAMP,'".$image_name."', '".$_REQUEST['description']."')";

    echo "\n".$sql;

    if(mysqli_query($link, $sql)){
      echo " - Cadastrado com sucesso";
    }
    else{
      echo " - Erro de conex達o com o baco";
    }
}
?>
