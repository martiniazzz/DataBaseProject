<?php
session_start();
class Database {

    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "sqlweb";
    private static $dbname = "med_storage";
    private static $pdo = null;

    static function connect() {
        self::$pdo =  new PDO( "mysql:host=".self::$servername.";
                                    charset=utf8;"."dbname=".self::$dbname, self::$username, self::$password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }

    public static function disconnect(){
        self::$pdo = null;
    }

}