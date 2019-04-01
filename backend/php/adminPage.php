<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/UserDAO.php";
require "classes/User.php";

if(isset($_POST["submit_add"])){
    $id = $_POST["id"];
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $pass = $_POST["password"];

    $type = $_POST["type"];

    $pdo =  Database::connect();

    if($type == "manager"){
        $sql = "INSERT INTO storagemanagers (idManager,lastName,firstName,midName) VALUES (?,?,?,?);";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id, $lname, $fname,$mname]);
    }

    else{
        $sql = "INSERT INTO responsiblepersons (idRespPerson,lastName,firstName,midName,department) VALUES (?,?,?,?,?);";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id, $lname, $fname,$mname,$_POST["dep"]]);
    }

    $sql = "INSERT INTO users (idUser,password) VALUES (?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id,password_hash($pass, PASSWORD_DEFAULT)]);

    Database::disconnect();

    header('location:adminPage.php');
}
else if(isset($_POST["delete"])){
    $id = $_POST["id"];

    $pdo =  Database::connect();

    $sql = "DELETE FROM storagemanagers WHERE idManager=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);

    $sql = "DELETE FROM responsiblepersons WHERE idRespPerson=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);

    $sql = "DELETE FROM users WHERE idUser=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);

    Database::disconnect();

    header('location:adminPage.php');
}

$smarty = new Smarty;
UserDAO::eagerInit("");
$smarty->assign("users",UserDAO::getUsers());

$smarty->display("../../frontend/html/admin.tpl");