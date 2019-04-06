<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "classes/Provider.php";
require "dao/ProviderDAO.php";
require "dao/CitiesAndCountriesDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$smarty->display("../../frontend/html/providersManagerPage.tpl");