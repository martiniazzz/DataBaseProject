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

$smarty->display("../../frontend/html/writeoffManagerPage.tpl");
