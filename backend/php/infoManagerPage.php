<?php

require "database/Database.php";
require "C:\Smarty\libs\Smarty.class.php";

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$smarty->display("../../frontend/html/infoManagerPage.tpl");