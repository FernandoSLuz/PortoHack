<?php
if(!isset($_REQUEST['image']) || !isset($_REQUEST['id_user']) || !isset($_REQUEST['name'])){
    echo "Campos n達o preenchidos corretamente.";
}
else{
    echo "id : ".$_REQUEST['id_user']." - image: ".$_REQUEST['image'];
    define('UPLOAD_DIR', 'uploadedimages/');
    $image_parts = explode(";base64,", 'data:image/jpeg;base64,'.$_REQUEST['image']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $image_name = uniqid();
    $file = UPLOAD_DIR . $image_name . '.jpg';
    file_put_contents($file, $image_base64);
    include_once("../sqlconnect.php");

    $sql = "INSERT INTO tkd_dii_images(id, user_id, image_path, name, timestamp) VALUES(null, '".$_REQUEST['id_user']."','".$image_name."','".$_REQUEST['name']."', null)";
    echo "\n".$sql;
    if(mysqli_query($link, $sql)){
      echo " - Cadastrado com sucesso";
    }
    else{
      echo " - Erro de conex達o com o baco";
    }
}
?>
