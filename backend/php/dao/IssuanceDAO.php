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
            $m = "";
            foreach ($pdo->query($sqli) as $giv) {
                $m .= 'Найменування: '.$giv["medName"].'\nКількість: '.$giv["amount"].'\n\n';
            }
            self::$issuance[] = new Issuance($id,$date,$status,$manager,$respPerson,$m);
        }

        Database::disconnect();
    }

    static public function getIssuance() {
        return self::$issuance;
    }
}