<?php

require "Database.php";

$pdo = Database::connect();

$sql = "CREATE TABLE IF NOT EXISTS  users(idUser VARCHAR(50) PRIMARY KEY,
                                          password VARCHAR(200) NOT NULL);";
$pdo->exec($sql);

//$xusernames = ["sm1001","rp2001","rp2002","rp2003"];
//$xpasswords = ["passdef01","passdef02","passdef03","passdef04"];
//
//for($i = 0; $i<5; $i++){
//    $hash = password_hash($xpasswords[$i], PASSWORD_DEFAULT);
//    $sql_ins =  $pdo->prepare("INSERT INTO users (idUser, password) VALUES (:xusername, :xpassword)");
//    $sql_ins->execute(array(':xusername' => $xusernames[$i],':xpassword' => $hash));
//}

Database::disconnect();