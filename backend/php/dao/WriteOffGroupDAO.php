<?php

class WriteOffGroupDAO
{

    static private $groups;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idGroup"];
            $max = $row["storageUnitAmount"];
            $med = "";
            $sqlm = "SELECT medName FROM medicines WHERE idMedicine='".$row["idMedicine"]."';";
            foreach ($pdo->query($sqlm) as $m)
                $med = $m["medName"];
            self::$groups[] = new WriteOffGroup($id,$med,$max);
        }

        Database::disconnect();
    }

    static public function getGroups() {
        return self::$groups;
    }

}