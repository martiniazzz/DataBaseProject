<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 09.03.2019
 * Time: 13:41
 */

class WriteOffDAO
{

    static private $writeoff;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        foreach ($pdo->query($sql) as $row) {
            $id = $row["idWriteOff"];
            $date = $row["woDate"];
            $amount = $row["woAmount"];
            $reason = $row["reason"];
            $tShelfNo = $row["tShelfNo"];
            $tRackNo = $row["tRackNo"];
            $idGroup = $row["idGroup"];
            $idManager = $row["idManager"];
            self::$writeoff[] = new WriteOff($id,$date,$amount,$reason,$tShelfNo,$tRackNo,$idGroup,$idManager);
        }

        Database::disconnect();
    }

    static public function getWriteoff() {
        return self::$writeoff;
    }

}