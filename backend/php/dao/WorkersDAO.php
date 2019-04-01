<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 30.03.2019
 * Time: 17:03
 */

class WorkersDAO
{

    static private $managers;
    static private $resppersons;
    static private $departs;

    static public function eagerInit() {
        $pdo = Database::connect();

        $sql = "SELECT idManager, lastName, firstName, midName FROM storagemanagers";
        foreach ($pdo->query($sql) as $row) {
            self::$managers[] = [$row["lastName"]." ".$row["firstName"]." ".$row["midName"],$row["idManager"]];
        }

        $sql = "SELECT idRespPerson, lastName, firstName, midName FROM responsiblepersons";
        foreach ($pdo->query($sql) as $row) {
            self::$resppersons[] = [$row["lastName"]." ".$row["firstName"]." ".$row["midName"],$row["idRespPerson"]];
        }

        $sql = "SELECT DISTINCT department FROM responsiblepersons";
        foreach ($pdo->query($sql) as $row) {
            self::$departs[] = $row["department"];
        }

        Database::disconnect();
    }

    /**
     * @return mixed
     */
    public static function getManagers()
    {
        return self::$managers;
    }

    /**
     * @return mixed
     */
    public static function getResppersons()
    {
        return self::$resppersons;
    }

    /**
     * @return mixed
     */
    public static function getDeparts()
    {
        return self::$departs;
    }




}