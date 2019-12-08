<?php include('main/header.php');?>
<h1>Funcionários</h1>
<h2>Novo funcionário</h2>
<form method="POST" action="employees_new_action.php">
<input type="text" name="name" placeholder="Nome Completo">
<input type="text" name="phone" placeholder="Telefone">
<input type="submit" value="Cadastrar">
</form>

<?php
  include_once('sql_connect.php');
  $sql = "SELECT * FROM PhoneNumbers";

  if($res = mysqli_query($link, $sql)){
    if(mysqli_num_rows($res)){
      while($row = mysqli_fetch_array($res)){
        echo "<br>".$row['name'];
      }
    }
    else{
      echo "<br>Não existem números cadastrados";
    }
  }
  else{
    echo "<br>Erro de banco";
  }

 ?>

<?php include('main/footer.php');?>
