<?php

class DeliveryDAO
{

    static private $deliveries;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idDelivery"];
            $date = $row["deliverDate"];
            $price = $row["totalPrice"];
            $provider = "";
            $manager = "";
            $sqlm = "SELECT * FROM storagemanagers WHERE idManager='".$row["idManager"]."';";
            foreach ($pdo->query($sqlm) as $m){
                $manager = $m["lastName"]." ".$m["firstName"]." ".$m["midName"];
            }
            $sqlp = "SELECT * FROM providers WHERE idProvider='".$row["idProvider"]."';";
            foreach ($pdo->query($sqlp) as $m){
                $provider = $m["companyName"];
            }

            $groups = "";
            $sqli = "SELECT * FROM medicinegroups WHERE idDelivery='".$id."';";
            foreach ($pdo->query($sqli) as $group){
                $groups .= "<br>".
                    "Номер групи: ".$group["idGroup"]."<br>".
                    "Кількість при поставці: ".$group["delPackAmount"]."<br>".
                    "Ціна за одиницю: ".$group["pricePerPack"]."<br>".
                    "Вартість: ".$group["totalPrice"]."<br><br>";
            }

            self::$deliveries[] = new Delivery($id,$date,$price,$provider,$manager,$groups);
        }

        Database::disconnect();
    }

    static public function getDeliveries() {
        return self::$deliveries;
    }

}