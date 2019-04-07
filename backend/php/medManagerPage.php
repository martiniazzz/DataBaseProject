<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;
$smarty->assign("managerName",$_SESSION["name"]);

$smarty->display("../../frontend/html/medManagerPage.tpl");