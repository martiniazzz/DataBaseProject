<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 07.03.2019
 * Time: 22:22
 */

class ProviderDAO
{

    static private $providers;
    static private $headers;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idProvider"];
            $name = $row["companyName"];
            $country = $row["country"];
            $city = $row["sity"];
            $street = $row["street"];
            $buildNo = $row["buildNo"];
            $account = $row["account"];
            $email = $row["email"];
            $sqlp = "SELECT phone FROM phones WHERE idProvider='".$id."';";
            $phones = [];
            foreach ($pdo->query($sqlp) as $p) {
                $phones[] = $p["phone"];
            }
            self::$providers[] = new Provider($id,$name,$country,$city,$street,$buildNo,$account,$email,$phones);
        }

        self::$headers = ["idProvider","companyName","country","city","street","buildNo","account","email","phones"];

        Database::disconnect();
    }

    static public function getProviders() {
        return self::$providers;
    }

    static public function getHeaders(){
        return self::$headers;
    }

}