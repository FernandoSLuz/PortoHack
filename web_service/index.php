<?php
include('globals.php');
//$link = mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");

include('sql_connect.php');

//DB TEST
/*
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
*/

?>

<html>
  <head>
    <title><?php echo $appName?></title>
    <link rel="stylesheet" type="text/css" href="@{'/public/stylesheets/datatables-bootstrap.css'}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      body{
        padding: 30px;
      }
    </style>
  </head>
  <body>
    <h3>This is a layout test</h3>
    <p>Hello</p>
  </body>
</html>
