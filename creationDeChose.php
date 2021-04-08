<?php
$dsn = "mysql:host=localhost;dbname=ptut;port=3307;charset=utf8mb4";
$servername = "localhost";
$username = "root";
$password = "";

try {
    //connexion au serveur 
    $db = new \PDO($dsn, $username, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
  // sql to create table
  $sq2 = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

  
$db->exec($sq2);
echo "Table crée !";

}
 catch(\PDOException $e) {
 echo $sq2 . "Erreur : " . $e->getMessage();
}

$conn = null;
?> 
