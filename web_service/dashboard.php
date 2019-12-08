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

  <table  id="example" class="display">
		<thead>
		<tr>
			<th style="min-width: 10px;">Terminal</th>
			<th style="min-width: 200px;">Usuário</th>
      <th style="min-width: 200px;">Descrição</th>
      <th style="min-width: 200px;">Data</th>
      <th style="min-width: 200px;">Tipo</th>

		</tr>
		</thead>

    <tbody>

      <?php
        include('sql_connect.php');

        $sql = "SELECT * FROM Report";

        if($res = mysqli_query($link, $sql)){
          if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_array($res)){
              echo "<tr>"
              echo "<td>".$row['id_Terminal']."</td>";
              echo "<td>".$row['id_User']."</td>";
              echo "<td>".$row['description']."</td>";
              echo "<td>".$row['timestamp']."</td></tr>";
              echo "<td>".$row['type']."</td></tr>";

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

    </tbody>
  </table>




  <br><br>

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
