<?php

class DeliveryDAO
{

    static private $deliveries;
    static private $headers;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idDelivery"];
            $date = $row["deliverDate"];
            $price = $row["totalPrice"];
            $provider = $row["idProvider"];
            $manager = $row["idManager"];
            self::$deliveries[] = new Delivery($id,$date,$price,$provider,$manager);
        }

        self::$headers = ["idDelivery","date","total price","provider","manager"];

        Database::disconnect();
    }

    static public function getDeliveries() {
        return self::$deliveries;
    }

    static public function getHeaders(){
        return self::$headers;
    }

}