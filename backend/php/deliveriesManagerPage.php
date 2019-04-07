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

$smarty->display("../../frontend/html/deliveriesManagerPage.tpl");