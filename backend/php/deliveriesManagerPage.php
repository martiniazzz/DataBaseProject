<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "classes/Delivery.php";
require "dao/DeliveryDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$headers = [];
$deliveries = [];

$sql = "SELECT * FROM deliveries";
DeliveryDAO::eagerInit($sql);
$deliveries = DeliveryDAO::getDeliveries();
$headers = DeliveryDAO::getHeaders();


$smarty->assign("header_vals",$headers);
$smarty->assign("del_vals",$deliveries);

$smarty->display("../../frontend/html/deliveriesManagerPage.tpl");