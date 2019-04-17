<?php

class TablesUpdate
{

    static function updateMedicines(){
        $pdo = Database::connect();

        $sql = "SELECT idGroup, delPackAmount, unitAmount, pricePerPack , productDate, usabilityTerm
                FROM medicinegroups INNER JOIN medicines ON medicines.idMedicine = medicinegroups.idMedicine;";
        foreach ($pdo->query($sql) as $v){
            $deliv = $v["delPackAmount"]*$v["unitAmount"];
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
            $totalPrice = $deliv *  $v["pricePerPack"];

            $prod = $v["productDate"];
            $toadd = $v["usabilityTerm"];
            $date = date('Y-m-d', strtotime("+".$toadd." months", strtotime($prod)));

            $stmt= $pdo->prepare("UPDATE medicinegroups SET storageUnitAmount='".$tot."',totalPrice='".$totalPrice."',dueTo='".$date."' WHERE idGroup='".$v["idGroup"]."';");
            $stmt->execute();
        }

        Database::disconnect();
    }

    static function updateDeliveries(){
        $pdo = Database::connect();

        $sql = "SELECT idDelivery FROM deliveries";
        foreach ($pdo->query($sql) as $v){
            $sqlt = "SELECT SUM(totalPrice) as s
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

        Database::disconnect();
    }

}