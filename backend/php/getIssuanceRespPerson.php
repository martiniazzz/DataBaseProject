<?php

require "database/Database.php";
require "dao/IssuanceDAO.php";
require "dao/WorkersDAO.php";
require "classes/Issuance.php";
require "classes/GivenMed.php";

if(isset($_POST["action"]) && $_POST["action"]=="changeStat"){
    $id = $_POST["id"];
    $pdo = Database::connect();
    $sql = "UPDATE issuance SET status=? WHERE idIssuance=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(["отримано", $id]);
    Database::disconnect();

    showAll();
}
else if(isset($_POST["action"]) && $_POST["action"]=="sortDate"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE idRespPerson='".$_SESSION["usernameId"]."'
GROUP BY issuance.idIssuance ORDER BY iDate DESC ;";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="dateLimit"){
    $from = $_POST["from"];
    $to = $_POST["to"];

    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE idRespPerson='".$_SESSION["usernameId"]."' AND iDate>='".$from."' AND iDate<='".$to."'
GROUP BY issuance.idIssuance ORDER BY iDate DESC ;";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getAll"){
    showAll();
}
else if(isset($_POST["action"]) && $_POST["action"]=="getProc"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE idRespPerson='".$_SESSION["usernameId"]."' AND status='опрацьовано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getGet"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE idRespPerson='".$_SESSION["usernameId"]."' AND status='отримано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getNew"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE idRespPerson='".$_SESSION["usernameId"]."' AND status='нове'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else{
    showAll();
}

function showAll(){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE idRespPerson='".$_SESSION["usernameId"]."'
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();
    sendData($issue);
}

function sendData($data){
    $result = [];
    if($data != []){
        foreach($data as $value) {
            $d = "";
            foreach ($value->getGivenMed() as $t){
                $d .= "Найменування: ".$t->getName()."\n Кількість: ".$t->getAmount()."\n\n";
            }
            $result[] = ["id"=>$value->getId(),
                "date"=>$value->getDate(),
                "status"=>$value->getStatus(),
                "givens"=>$d];
        }
    }

    echo json_encode($result);
}