<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 08.03.2019
 * Time: 15:04
 */

class MedicineManagerDAO
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
            $groups = '';
            $sqli = "SELECT * FROM medicinegroups WHERE idMedicine='".$id."';";
            foreach ($pdo->query($sqli) as $group){
                $gr = new MedicineGroup($group["idGroup"],$group["shelfNo"],$group["rackNo"],$group["productDate"],$group["dueTo"],$group["delPackAmount"],$group["storageUnitAmount"],$group["pricePerPack"],$group["totalPrice"],$group["isFinished"],$id,$group["idDelivery"]);
                $groups .= $gr->toString().'\n';
            }
            self::$medicines[] = new MedicineManager($id,$name,$producer,$desc,$unitType,$unitAmount,$temp,$usabilityTerm,$storageAmount,$groups);
        }

        Database::disconnect();
    }

    static public function getMedicines() {
        return self::$medicines;
    }

}