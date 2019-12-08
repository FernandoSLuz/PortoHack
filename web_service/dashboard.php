<?php include('main/header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
  <style>
      #map{
        display: block;
        height: 691px;
        width: 966px;
        background-color: #ccc;
        background-image: url('./images/map.png');
      }


  </style>
<h1>Dashboard</h1>

  <br><a href="employees.php">Funcionários e Números</a>
  <br><a href="employees.php">Relatórios de performance</a>
  <br><a href="logout.php">Logout</a>

  <br><br>
  <?php
    include('sql_connect.php');

    $sql = "SELECT * FROM Report";

    if($res = mysqli_query($link, $sql)){
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
   <br><br>
   <div id="map" style="" >
     <style>
        #request1{
          display: block;
          position: relative;
          top: 50px;
          left: 50px;
          height: 30px; width: 30px;
          border-radius: 15px;
          border: solid 1px #000;
          background-color: #3c3;
        }
     </style>
     <div id="request1">
        <a href="#">&nbsp;</a>
     </div>
   </div>
<?php include('main/footer.php');?>
