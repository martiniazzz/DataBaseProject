<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 30.03.2019
 * Time: 15:45
 */

class CitiesAndCountriesDAO
{

    static private $cities;
    static private $countries;

    static public function eagerInit() {
        $pdo = Database::connect();

        $sql = "SELECT DISTINCT country FROM providers";
        foreach ($pdo->query($sql) as $row) {
            self::$countries[] = $row["country"];
        }

        $sql = "SELECT DISTINCT sity FROM providers";
        foreach ($pdo->query($sql) as $row) {
            self::$cities[] = $row["sity"];
        }

        Database::disconnect();
    }

    static public function getCities() {
        return self::$cities;
    }

    static public function getCountries() {
        return self::$countries;
    }

}