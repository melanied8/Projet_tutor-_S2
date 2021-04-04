<?php
$dsn = "mysql:host=localhost;dbname=ptut;port=3306;charset=utf8mb4";
$servername = "localhost";
$username = "root";
$password = "";

try {
    //connexion au serveur 
    $db = new \PDO($dsn, $username, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
  // sql to create table
  $sq2 = "CREATE TABLE listItems (
    idItem INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(30) NOT NULL,
    deadline DATE NOT NULL ,
    idList INT(6) NOT NULL,
    FOREIGN KEY (idList) REFERENCES list(idList)

)";

  
$db->exec($sq2);
echo "Table crée !";

}
 catch(\PDOException $e) {
 echo $sq2 . "Erreur : " . $e->getMessage();
}

$conn = null;
?> 
