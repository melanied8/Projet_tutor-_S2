<?php
$dsn = "mysql:host=localhost;dbname=ptut;port=3306;charset=utf8mb4";
$servername = "localhost";
$username = "root";
$password = "";

try {
    //connexion au serveur 
    $db = new \PDO($dsn, $username, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
  // sql to create table
  $sq2 = "CREATE TABLE listitems (
    iditem INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(50) NOT NULL,
    deadline DATE,
    status boolean,
    Note VARCHAR(255),
    idList INT(6) NOT NULL, FOREIGN KEY (idList) REFERENCES list(idList)

)";

  
$db->exec($sq2);
echo "Table crée !";

}
 catch(\PDOException $e) {
 echo $sq2 . "Erreur : " . $e->getMessage();
}

$conn = null;
?> 

