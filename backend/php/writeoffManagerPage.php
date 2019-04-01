<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/WriteOffDAO.php";
require "classes/WriteOff.php";
require "classes/WriteOffGroup.php";
require "dao/WriteOffGroupDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$table_cont = "table_content";
date_default_timezone_set('Europe/Kiev');
if(isset($_POST["date_order"])){
    $sql = "SELECT * FROM writeoff WHERE idManager='".$_SESSION["username"]."' ORDER BY woDate DESC;";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();
    $smarty->assign($table_cont,$writeoff);

    $sql = "SELECT * FROM medicinegroups";
    WriteOffGroupDAO::eagerInit($sql);
    $wgroups = WriteOffGroupDAO::getGroups();
    $smarty->assign("groups_list",$wgroups);

    $smarty->display("../../frontend/html/writeoffManagerPage.tpl");
}
else if(isset($_POST["date_search"])){
    $dfrom = $_POST["date_from"];
    $dto = $_POST["date_to"];
    $sql = "SELECT * FROM writeoff WHERE idManager='".$_SESSION["username"]."' AND woDate>='".$dfrom."' AND woDate<='".$dto."';";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();
    $smarty->assign($table_cont,$writeoff);

    $sql = "SELECT * FROM medicinegroups";
    WriteOffGroupDAO::eagerInit($sql);
    $wgroups = WriteOffGroupDAO::getGroups();
    $smarty->assign("groups_list",$wgroups);

    $smarty->display("../../frontend/html/writeoffManagerPage.tpl");
}
else if(isset($_POST["submit_add"])){
    $name = $_POST["name"];
    $pieces = explode(" ", $name);
    $id = $pieces[0];
    $amount = $_POST["amount"];
    $reason = $_POST["reason"];
    $date = $_POST["date"];
    $shelf = $_POST["shelf"];
    $rack = $_POST["rack"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO writeoff (woDate,woAmount,reason,tShelfNo,tRackNo,idGroup, idManager) VALUES (?,?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$date, $amount, $reason, $shelf, $rack, $id,$_SESSION["username"]]);
    Database::disconnect();

    header('location:writeoffManagerPage.php');
}
else{
    $sql = "SELECT * FROM writeoff WHERE idManager='".$_SESSION["username"]."';";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();
    $smarty->assign($table_cont,$writeoff);

    $sql = "SELECT * FROM medicinegroups";
    WriteOffGroupDAO::eagerInit($sql);
    $wgroups = WriteOffGroupDAO::getGroups();
    $smarty->assign("groups_list",$wgroups);

    $smarty->display("../../frontend/html/writeoffManagerPage.tpl");
}

