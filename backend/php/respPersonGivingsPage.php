<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/IssuanceDAO.php";
require "classes/Issuance.php";
require "classes/GivenMed.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("respPersonName",$_SESSION["name"]);

$smarty->display("../../frontend/html/respPersonGivingPage.tpl");