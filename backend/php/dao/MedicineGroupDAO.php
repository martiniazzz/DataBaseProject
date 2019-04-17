<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 01.04.2019
 * Time: 18:37
 */

class MedicineGroupDAO
{

    static private $groups;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idGroup"];
            $shelfNo = $row["shelfNo"];
            $rackNo = $row["rackNo"];
            $prodDate = $row["productDate"];
            $dueTo = $row["dueTo"];
            $delPackAmount = $row["delPackAmount"];
            $storageUA = $row["storageUnitAmount"];
            $pricePerPack = $row["pricePerPack"];
            $total = $row["totalPrice"];
            $deliv = $row["idDelivery"];
            $medName = "";
            $sqlm = "SELECT medName FROM medicines WHERE idMedicine='".$row["idMedicine"]."';";
            foreach ($pdo->query($sqlm) as $m)
                $medName = $m["medName"];

            self::$groups[] = new MedicineGroup($id, $shelfNo, $rackNo, $prodDate, $dueTo, $delPackAmount, $storageUA, $pricePerPack, $total, $row["idMedicine"], $deliv,$medName);

        }

        Database::disconnect();
    }

    static public function getGroups() {
        return self::$groups;
    }

}