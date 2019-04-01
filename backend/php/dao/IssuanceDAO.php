<?php

class IssuanceDAO
{
    static private $issuance;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idIssuance"];
            $date = $row["iDate"];
            $status = $row["status"];
            $manager = $row["idManager"];
            $respPerson = $row["idRespPerson"];
            $sqli = "SELECT medName, amount
                     FROM (givenmed INNER JOIN medicinegroups ON givenmed.idGroup = medicinegroups.idGroup) INNER JOIN medicines ON medicines.idMedicine = medicinegroups.idMedicine
                     WHERE idIssuance='".$id."';";
            $m = [];
            foreach ($pdo->query($sqli) as $giv) {
                $m[] = new GivenMed($giv["medName"],$giv["amount"]);
            }
            $sqli = "SELECT lastName, firstName, midName FROM storagemanagers WHERE idManager='".$manager."';";
            foreach ($pdo->query($sqli) as $row) {
                $manager = $row["lastName"]." ".$row["firstName"]." ".$row["midName"];
            }
            $sqli = "SELECT department, lastName, firstName, midName FROM responsiblepersons WHERE idRespPerson='".$respPerson."';";
            $depart = "";
            foreach ($pdo->query($sqli) as $row) {
                $respPerson = $row["lastName"]." ".$row["firstName"]." ".$row["midName"];
                $depart = $row["department"];
            }
            self::$issuance[] = new Issuance($id,$date,$status,$manager,$respPerson,$m,$depart);
        }

        Database::disconnect();
    }

    static public function getIssuance() {
        return self::$issuance;
    }
}