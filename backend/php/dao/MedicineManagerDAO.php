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

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idMedicine"];
            $name = $row["medName"];
            $producer = $row["producer"];
            $desc = $row["medDescript"];
            $unitType = $row["unitType"];
            $unitAmount = $row["unitAmount"];
            $temp = $row["storageTemp"];
            $usabilityTerm = $row["usabilityTerm"];
            $storageAmount = 0;
            $groups = "";
            $sqli = "SELECT * FROM medicinegroups WHERE idMedicine='".$id."';";
            foreach ($pdo->query($sqli) as $group){
                $storageAmount += $group["storageUnitAmount"];
                $groups .= "Номер групи: ".$group["idGroup"]."<br>".
                           "Стелаж: ".$group["rackNo"]."<br>".
                           "Полиця: ".$group["shelfNo"]."<br>".
                           "Дата виготовлення: ".$group["productDate"]."<br>".
                           "Придатний до: ".$group["dueTo"]."<br>".
                           "Кількість при поставці: ".$group["delPackAmount"]."<br>".
                           "Кількість одиниць на складі: ".$group["storageUnitAmount"]."<br>".
                           "Ціна за одиницю: ".$group["pricePerPack"]."<br>".
                           "Вартість: ".$group["totalPrice"]."<br><br>";
            }
            self::$medicines[] = new MedicineManager($id,$name,$producer,$desc,$unitType,$unitAmount,$temp,$usabilityTerm,$storageAmount,$groups);
        }

        Database::disconnect();
    }

    static public function getMedicines() {
        return self::$medicines;
    }

}