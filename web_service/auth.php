<?php

session_destroy();
$_SESSION['email']!="";
$_SESSION['password']!=false;
unset($_SESSION['email']);
unset($_SESSION['login']);
session_start();

include('sql_connect.php');


$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

$sql = "SELECT * FROM User WHERE email LIKE '$email'";

	if ($res = mysqli_query($link, $sql)) {
	    if(mysqli_num_rows($res) > 0){
			while ($row = mysqli_fetch_array($res)){
				if($row['password']==$password){
					echo 'Autenticado';
					$_SESSION["login"]=true;
					$_SESSION["email"]=$username;
					header('Location: dashboard.php');
				}
				else{
					echo 'Senha inválida';
					$_SESSION["login"]=false;
					header('Location: index.php?error='.'Senha inválida');
				}
			}
		}
		else{
			echo 'Usuário não encontrado';
			$_SESSION["login"]=false;
			header('Location: index.php?error='.'Usuário não encontrado');
		}
	}
	else{
    echo ($mysqli -> error);
		echo 'Erro de banco';
		$_SESSION["login"]=false;
		header('Location: index.php?error='.'Erro de banco, contate os administradores');
	}

?>
