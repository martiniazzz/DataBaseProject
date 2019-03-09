<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/IssuanceDAO.php";
require "classes/Issuance.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$table_cont = "table_content";
date_default_timezone_set('Europe/Kiev');

if(isset($_POST['showAllG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);
}
else if(isset($_POST['showOtrG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='отримано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);
}
else if(isset($_POST['showOprG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='опрацьовано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);
}
else if(isset($_POST['showNewG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='нове'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);
}
else{
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);
}

$smarty->display("../../frontend/html/issuanceManagerPage.tpl");