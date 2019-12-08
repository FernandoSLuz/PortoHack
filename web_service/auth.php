<?php

session_destroy();
$_SESSION['email']!="";
$_SESSION['password']!=false;
unset($_SESSION['email']);
unset($_SESSION['login']);
session_start();

include('sql_connect.php');

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

echo "<br>";


$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

$sql = "SELECT * FROM `Users` WHERE email LIKE '$email'";
echo $sql;
	if ($res = mysqli_query($link, $sql)) {
	    if(mysqli_num_rows($res) > 0){
			while ($row = mysqli_fetch_array($res)){
				if($row['password']==$password){
					echo 'Autenticado';
					$_SESSION["login"]=true;
					$_SESSION["username"]=$username;
					//header('Location: index.php?error=Foi');
				}
				else{
					echo 'Senha inválida';
					$_SESSION["login"]=false;
					//header('Location: index.php?error='.'Senha inválida');
				}
			}
		}
		else{
			echo 'Usuário não encontrado';
			$_SESSION["login"]=false;
			//header('Location: index.php?error='.'Usuário não encontrado');
		}
	}
	else{
		echo 'Erro de banco';
		$_SESSION["login"]=false;
		//header('Location: index.php?error='.'Erro de banco, contate os administradores');
	}

?>
