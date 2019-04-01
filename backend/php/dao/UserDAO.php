<?php

class UserDAO
{

    private static $users;

    static public function eagerInit($sql) {
        $pdo = Database::connect();

        $sql = "SELECT * FROM storagemanagers";
        foreach ($pdo->query($sql) as $row) {
            $id = $row["idManager"];
            $lname = $row["lastName"];
            $fname = $row["firstName"];
            $mname = $row["midName"];
            self::$users[] = new User($id,$lname,$fname,$mname,"Завідувач");
        }

        $sql = "SELECT * FROM responsiblepersons";
        foreach ($pdo->query($sql) as $row) {
            $id = $row["idRespPerson"];
            $lname = $row["lastName"];
            $fname = $row["firstName"];
            $mname = $row["midName"];
            $dep = $row["department"];
            self::$users[] = new User($id,$lname,$fname,$mname,$dep);
        }

        Database::disconnect();
    }

    static public function getUsers() {
        return self::$users;
    }

}