<?php
session_start();
if(!isset($_SESSION['login']) || !($_SESSION['login']) || ($_SESSION['username'])==""){
	header('Location: logout.php');
}
?>

<?php include('main/header.php');?>
<h1>Dashboard</h1>

  <br><a href="employees.php">Funcionários</a>
  <br><a href="logout.php">Logout</a>

  <br><br>
  <?php
    include('sql_connect.php');

    $sql = "SELECT * FROM Report";

    if($res = mysqli($link, $sql)){
      if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_array($res)){
          echo "<br>".$row['description'];
        }
      }
      else{
        echo "Não temos solicitações";
      }
    }
    else{
      echo "Erro de banco";
    }

   ?>
<?php include('main/footer.php');?>
