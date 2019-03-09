<?php

//Updating total prices of deliveries and medicine groups

require "Database.php";

$pdo = Database::connect();

$sql = "SELECT idDelivery FROM deliveries";
foreach ($pdo->query($sql) as $v){
    $sqlt = "SELECT IFNULL(SUM(delPackAmount*pricePerPack),0) as s
              FROM medicinegroups
              WHERE idDelivery=?
              GROUP BY idDelivery;";
    $query = $pdo->prepare($sqlt);
    $query->execute([$v["idDelivery"]]);
    $total = $query->fetch(PDO::FETCH_ASSOC);

    $sqli = "UPDATE deliveries SET totalPrice=? WHERE idDelivery=?;";
    $stmt= $pdo->prepare($sqli);
    $stmt->execute([$total["s"], $v["idDelivery"]]);
}

$stmt= $pdo->prepare("UPDATE medicinegroups SET totalPrice=delPackAmount*pricePerPack;");
$stmt->execute();

Database::disconnect();