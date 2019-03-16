<?php

require "Database.php";

$pdo = Database::connect();

$sql = "SELECT idGroup, delPackAmount, unitAmount 
FROM medicinegroups INNER JOIN medicines ON medicines.idMedicine = medicinegroups.idMedicine;";
foreach ($pdo->query($sql) as $v){
    $deliv = $v["delPackAmount"] * $v["unitAmount"];
    $giv = 0;
    $off = 0;
    $sqlg = "SELECT * FROM givenmed WHERE idGroup='".$v["idGroup"]."';";
    foreach ($pdo->query($sqlg) as $g){
        $giv += $g["amount"];
    }
    $sqlw = "SELECT * FROM writeoff WHERE idGroup='".$v["idGroup"]."';";
    foreach ($pdo->query($sqlw) as $w){
        $off += $w["woAmount"];
    }
    $tot = $deliv - $giv - $off;
    $stmt= $pdo->prepare("UPDATE medicinegroups SET storageUnitAmount='".$tot."' WHERE idGroup='".$v["idGroup"]."';");
    $stmt->execute();
}

Database::disconnect();