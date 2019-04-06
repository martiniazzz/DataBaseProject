<?php

require "database/Database.php";
require "classes/Delivery.php";
require "classes/Provider.php";
require "dao/DeliveryDAO.php";
require "dao/ProviderDAO.php";

if(isset($_GET["getData"])){
    $sql = "SELECT idProvider, companyName FROM providers";
    $pdo = Database::connect();
    $result = [];
    foreach ($pdo->query($sql) as $value) {
        $result[] = ["id"=>$value["idProvider"],
            "name"=>$value["companyName"]];
    }
    Database::disconnect();

    echo json_encode($result);
}
else if(isset($_GET["showGroups"])){
    $_SESSION['groupdel'] = $_GET["showGroups"];
    header('location:addGroupsManagerPage.php');
}
else if(isset($_POST["delAction"]) && $_POST["delAction"]=="addDel"){
    $id = $_POST["id"];
    $date = $_POST["date"];
    $prov = $_POST["prov"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO deliveries (idDelivery,deliverDate,idProvider,idManager) VALUES (?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id, $date, $prov,$_SESSION["username"]]);
    Database::disconnect();

    $sql = "SELECT * FROM deliveries";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}
else if(isset($_POST["delAction"]) && $_POST["delAction"]=="updateDel"){
    $id = $_POST["id"];
    $date = $_POST["date"];
    $prov = $_POST["prov"];

    $pdo =  Database::connect();
    $sql = "UPDATE deliveries SET deliverDate=?,idProvider=? WHERE idDelivery=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$date, $prov, $id]);
    Database::disconnect();

    $sql = "SELECT * FROM deliveries";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}
else if(isset($_POST["action"]) && $_POST["action"]=="dateOrder"){
    $sql = "SELECT * FROM deliveries ORDER BY deliverDate DESC ";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}
else if(isset($_POST["action"]) && $_POST["action"]=="pricesLimit"){
    $pfrom = $_POST["from"];
    $pto = $_POST["to"];
    $sql = "SELECT * FROM deliveries WHERE totalPrice>='".$pfrom."' AND totalPrice<='".$pto."';";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}
else if(isset($_POST["action"]) && $_POST["action"]=="datesLimit"){
    $pfrom = $_POST["from"];
    $pto = $_POST["to"];
    $sql = "SELECT * FROM deliveries WHERE deliverDate>='".$pfrom."' AND deliverDate<='".$pto."';";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}
else if(isset($_POST["action"]) && $_POST["action"]=="provSearch"){
    $prov = $_POST["prov"];

    $sql = "SELECT * FROM deliveries WHERE idProvider='".$prov."';";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}
else{
    $sql = "SELECT * FROM deliveries";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    sendData($deliveries);
}

function sendData($data){
    $result = [];

    foreach($data as $value) {
        $result[] = ["id"=>$value->getId(),
            "date"=>$value->getDate(),
            "total"=>$value->getTotal(),
            "prov"=>$value->getIdprov(),
            "provName"=>$value->getProv(),
            "admin"=>$value->getIdman()];
    }

    echo json_encode($result);
}