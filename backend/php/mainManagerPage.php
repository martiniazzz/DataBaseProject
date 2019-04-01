<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "database/TablesUpdate.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;
$smarty->assign("managerName",$_SESSION["name"]);

TablesUpdate::updateMedicines();
TablesUpdate::updateDeliveries();

$smarty->display("../../frontend/html/mainManagerPage.tpl");