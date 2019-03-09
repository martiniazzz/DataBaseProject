<?php

class MedicineDAO
{
    static private $medicines;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        //$sql_sel = "SELECT * FROM medicines";
        foreach ($pdo->query($sql) as $row) {
            $id = $row["idMedicine"];
            $name = $row["medName"];
            $producer = $row["producer"];
            $desc = $row["medDescript"];
            $unitType = $row["unitType"];
            $unitAmount = $row["unitAmount"];
            $temp = $row["storageTemp"];
            $usabilityTerm = $row["usabilityTerm"];
            $storageAmount = $row["amount"];
            self::$medicines[] = new Medicine($id,$name,$producer,$desc,$unitType,$unitAmount,$temp,$usabilityTerm,$storageAmount);
        }

        Database::disconnect();
    }

    static public function getMedicines() {
        return self::$medicines;
    }
}