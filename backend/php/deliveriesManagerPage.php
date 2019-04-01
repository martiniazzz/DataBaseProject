<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "classes/Delivery.php";
require "classes/Provider.php";
require "dao/DeliveryDAO.php";
require "dao/ProviderDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$deliveries = [];
$provs = [];
//if(isset($_POST["submit_add"])){
//    $id = $_POST["date"];
//    $name = $_POST["name"];
//
//    $pdo =  Database::connect();
//    $sql = "INSERT INTO de (companyName,country,sity,street,buildNo,account,email) VALUES (?,?,?,?,?,?,?);";
//    $stmt= $pdo->prepare($sql);
//    $stmt->execute([$name, $country, $city,$street,$build,$account,$email]);
//    Database::disconnect();
//
//    header('location:providersManagerPage.php');
//}
if(isset($_POST["sort_by_date"])){
    $sql = "SELECT * FROM deliveries ORDER BY deliverDate DESC ;";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    $sqlp = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sqlp);
    $provs = ProviderDAO::getProviders();
}
//else if(isset($_POST["search_provs"])){
//    $name = $_POST["provss"];
////    $sql = "SELECT idProvider FROM providers WHERE companyName='".$name."'";
////    $id = "";
////    foreach ($pdo->query($sql) as $row){
////        $id = $row["idProvider"];
////    }
//
//    $sql = "SELECT * FROM deliveries WHERE idDelivery='".$name."';";
//    DeliveryDAO::eagerInit($sql);
//    $deliveries = DeliveryDAO::getDeliveries();
//
//    $sqlp = "SELECT * FROM providers";
//    ProviderDAO::eagerInit($sqlp);
//    $provs = ProviderDAO::getProviders();
//}
else if(isset($_POST["price_search"])){
    $pfrom = $_POST["p_from"];
    $pto = $_POST["p_to"];
    $sql = "SELECT * FROM deliveries WHERE totalPrice>='".$pfrom."' AND totalPrice<='".$pto."';";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    $sqlp = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sqlp);
    $provs = ProviderDAO::getProviders();
}
else if(isset($_POST["date_search"])){
    $pfrom = $_POST["d_from"];
    $pto = $_POST["d_to"];
    $sql = "SELECT * FROM deliveries WHERE deliverDate>='".$pfrom."' AND deliverDate<='".$pto."';";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    $sqlp = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sqlp);
    $provs = ProviderDAO::getProviders();
}
else if(isset($_POST["submit_update_del"])){
    $id = $_POST["id"];
    $date = $_POST["date"];
    $name = $_POST["name"];
    $idp;

    $pdo =  Database::connect();
    $sqlp = "SELECT idProvider FROM providers WHERE companyName='".$name."';";
    foreach ($pdo->query($sqlp) as $p){
        $idp = $p["idProvider"];
    }
    $sql = "UPDATE deliveries SET deliverDate=?,idProvider=? WHERE idDelivery=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$date, $idp, $id]);
    Database::disconnect();

    header('location:deliveriesManagerPage.php');
}
else{
    $sql = "SELECT * FROM deliveries";
    DeliveryDAO::eagerInit($sql);
    $deliveries = DeliveryDAO::getDeliveries();

    $sqlp = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sqlp);
    $provs = ProviderDAO::getProviders();
}

$smarty->assign("del_vals",$deliveries);
$smarty->assign("provs_list",$provs);

$smarty->display("../../frontend/html/deliveriesManagerPage.tpl");