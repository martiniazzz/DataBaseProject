<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/IssuanceDAO.php";
require "dao/WorkersDAO.php";
require "classes/Issuance.php";
require "classes/GivenMed.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$table_cont = "table_content";
date_default_timezone_set('Europe/Kiev');


if(isset($_POST['search_resp_p'])){
    $data = $_POST["resppersonsInp"];
    $datas = explode(" ",$data);
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, issuance.idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM (issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance) INNER JOIN responsiblepersons ON
issuance.idRespPerson = responsiblepersons.idRespPerson
WHERE responsiblepersons.lastName='".$datas[0]."'
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("resppersons",WorkersDAO::getResppersons());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST['search_depart'])){
    $data = $_POST["departInp"];

    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, issuance.idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM (issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance) INNER JOIN responsiblepersons ON
issuance.idRespPerson = responsiblepersons.idRespPerson
WHERE department='".$data."'
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("resppersons",WorkersDAO::getResppersons());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST['order_date'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
GROUP BY issuance.idIssuance ORDER BY iDate DESC ;";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("managers",WorkersDAO::getManagers());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST["date_search"])){
    $dfrom = $_POST["date_from"];
    $dto = $_POST["date_to"];

    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE iDate>='".$dfrom."' AND iDate<='".$dto."'
GROUP BY issuance.idIssuance ORDER BY iDate DESC ;";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("managers",WorkersDAO::getManagers());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST['change_status'])){
    $id = $_POST["iss_id"];
    $pdo = Database::connect();
    $sql = "UPDATE issuance SET status=? WHERE idIssuance=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(["опрацьовано", $id]);
    Database::disconnect();

    header('location:issuanceManagerPage.php');
}
else if(isset($_POST['showAllG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("managers",WorkersDAO::getManagers());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST['showOtrG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='отримано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("managers",WorkersDAO::getManagers());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST['showOprG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='опрацьовано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("managers",WorkersDAO::getManagers());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else if(isset($_POST['showNewG'])){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='нове'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("managers",WorkersDAO::getManagers());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}
else{
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    $smarty->assign($table_cont,$issue);

    WorkersDAO::eagerInit();
    $smarty->assign("resppersons",WorkersDAO::getResppersons());
    $smarty->assign("departs",WorkersDAO::getDeparts());
}

$smarty->display("../../frontend/html/issuanceManagerPage.tpl");