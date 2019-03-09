<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/WriteOffDAO.php";
require "classes/WriteOff.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$table_cont = "table_content";
date_default_timezone_set('Europe/Kiev');

$sql = "SELECT * FROM writeoff WHERE idManager='".$_SESSION["username"]."';";
WriteOffDAO::eagerInit($sql);
$writeoff = WriteOffDAO::getWriteoff();
$smarty->assign($table_cont,$writeoff);

$smarty->display("../../frontend/html/writeoffManagerPage.tpl");