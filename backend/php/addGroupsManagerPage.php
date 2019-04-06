<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "database/TablesUpdate.php";
require "classes/MedicineGroup.php";
require "classes/Medicine.php";
require "dao/MedicineGroupDAO.php";
require "dao/MedicineDAO.php";

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$id = $_SESSION['groupdel'];
$smarty->assign("id",$id);

$smarty->display("../../frontend/html/addGroupsManagerPage.tpl");