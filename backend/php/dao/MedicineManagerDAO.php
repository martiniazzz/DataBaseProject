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

        try{
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
                    $groups .= "Номер групи: ".$group["idGroup"]."\n".
                        "Стелаж: ".$group["rackNo"]."\n".
                        "Полиця: ".$group["shelfNo"]."\n".
                        "Дата виготовлення: ".$group["productDate"]."\n".
                        "Придатний до: ".$group["dueTo"]."\n".
                        "Кількість при поставці: ".$group["delPackAmount"]."\n".
                        "Кількість одиниць на складі: ".$group["storageUnitAmount"]."\n".
                        "Ціна за одиницю: ".$group["pricePerPack"]."\n".
                        "Вартість: ".$group["totalPrice"]."\n\n";
                }
                self::$medicines[] = new MedicineManager($id,$name,$producer,$desc,$unitType,$unitAmount,$temp,$usabilityTerm,$storageAmount,$groups);
            }
        }catch (Exception $exception){
            echo $exception->getMessage();
        }


        Database::disconnect();
    }

    static public function getMedicines() {
        return self::$medicines;
    }

}