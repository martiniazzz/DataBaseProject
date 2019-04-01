<?php

include "Database.php";

$pdo = Database::connect();

$names = ["sm1001","rp2001","rp2002","rp2003"];
$passs = ["passdef01","passdef02","passdef03","passdef04"];

for($i = 0; $i < 4; $i++){
    $sql_ins = $pdo->prepare("INSERT INTO users (idUser, password) VALUES (?,?)");
    $sql_ins->execute([$names[$i],password_hash($passs[$i], PASSWORD_DEFAULT)]);
}

Database::disconnect();