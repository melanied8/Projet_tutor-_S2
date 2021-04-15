
<?php

$host =  "localhost";
$dbname = "ptut";
$port = "3306";
$servername = "localhost";
$username = "root";
$password = "";

try {
  //Connection to the server
  $db = new \PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4", $username, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
  //echo " connexion reusie";
} catch (\PDOException $e) 
{
  echo "erreur lors de la connexion à la base";
}

?>


