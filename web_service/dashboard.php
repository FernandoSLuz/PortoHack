<?php include('main/header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
  <style>
      #map{
        display: block;
        width: 802px;
        height: 474px;
        background-color: #ccc;
        background-image: url('./images/mapaporto.jpg');
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
     <?php
       include('sql_connect.php');

       $sql = "SELECT * FROM Report";

       if($res = mysqli_query($link, $sql)){
         if(mysqli_num_rows($res)>0){
           while($row = mysqli_fetch_array($res)){
             ?>
               <style>
                  #request<?php echo $row['id']?>{
                    display: block;
                    position: relative;
                    top: <?php echo $row['y']?>px;
                    left: <?php echo $row['x']?>px;
                    height: 20px; width: 20px;
                    border-radius: 10px;
                    border: solid 2px #000;
                    background-color: #3c3;
                  }
               </style>
               <div id="request<?php echo $row['id']?>">
                  <a href="#">&nbsp;</a>
               </div>
             <?php
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
     <style>
        #request0{
          display: block;
          position: relative;
          top: 50px;
          left: 50px;
          height: 20px; width: 20px;
          border-radius: 10px;
          border: solid 2px #000;
          background-color: #3c3;
        }
     </style>
     <div id="request0">
        <a href="#">&nbsp;</a>
     </div>
   </div>
<?php include('main/footer.php');?>
