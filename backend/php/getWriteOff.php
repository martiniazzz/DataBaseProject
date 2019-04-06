<?php

require "database/Database.php";
require "dao/WriteOffDAO.php";
require "classes/WriteOff.php";
require "classes/WriteOffGroup.php";
require "dao/WriteOffGroupDAO.php";
require "database/TablesUpdate.php";

if(isset($_GET["getData"])){
    $sql = "SELECT * FROM medicinegroups";
    WriteOffGroupDAO::eagerInit($sql);
    $wgroups = WriteOffGroupDAO::getGroups();
    $result = [];

    foreach($wgroups as $value) {
        $result[] = ["id"=>$value->getId(),
            "name"=>$value->getName(),
            "max"=>$value->getMax()];
    }

    echo json_encode($result);
}
else if(isset($_POST["action"]) && $_POST["action"]=="dateSort"){
    $sql = "SELECT * FROM writeoff WHERE idManager='".$_SESSION["username"]."' ORDER BY woDate DESC;";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();

    sendData($writeoff);
}
else if(isset($_POST["action"]) && $_POST["action"]=="dateLimit"){
    $from = $_POST["from"];
    $to = $_POST["to"];

    $sql = "SELECT * FROM writeoff WHERE woDate>='".$from."' AND woDate<='".$to."';";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();

    sendData($writeoff);
}
else if(isset($_POST["action"]) && $_POST["action"]=="addOff"){
    $id = $_POST["group"];
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

    TablesUpdate::updateMedicines();

    $sql = "SELECT * FROM writeoff;";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();

    sendData($writeoff);
}
else{
    $sql = "SELECT * FROM writeoff";
    WriteOffDAO::eagerInit($sql);
    $writeoff = WriteOffDAO::getWriteoff();

    sendData($writeoff);
}

function sendData($data){
    $result = [];

    foreach($data as $value) {
        $result[] = ["id"=>$value->getId(),
            "date"=>$value->getDate(),
            "amount"=>$value->getAmount(),
            "reason"=>$value->getReason(),
            "shelf"=>$value->getShelf(),
            "rack"=>$value->getRack(),
            "group"=>$value->getIdGroup()];
    }

    echo json_encode($result);
}