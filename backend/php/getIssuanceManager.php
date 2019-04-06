<?php

require "database/Database.php";
require "dao/IssuanceDAO.php";
require "dao/WorkersDAO.php";
require "classes/Issuance.php";
require "classes/GivenMed.php";

if(isset($_GET["getData"])){
    WorkersDAO::eagerInit();
    $w = WorkersDAO::getResppersons();
    $d = WorkersDAO::getDeparts();

    $ws = [];
    foreach ($w as $i){
        $ws[] = ["id"=>$i[1],"name"=>$i[0]];
    }

    $result = ["w"=>$ws, "d"=>$d];

    echo json_encode($result);
}
else if(isset($_POST["action"]) && $_POST["action"]=="procIs"){
    $id = $_POST["id"];
    $pdo = Database::connect();
    $sql = "UPDATE issuance SET status=?, idManager=? WHERE idIssuance=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(["опрацьовано",$_SESSION["usernameId"], $id]);
    Database::disconnect();

    showAll();
}
else if(isset($_POST["action"]) && $_POST["action"]=="sortDate"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
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
WHERE iDate>='".$from."' AND iDate<='".$to."'
GROUP BY issuance.idIssuance ORDER BY iDate DESC ;";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="findResp"){
    $data = $_POST["resp"];
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, issuance.idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM (issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance)
WHERE issuance.idRespPerson='".$data."'
GROUP BY issuance.idIssuance";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="findDep"){
    $data = $_POST["dep"];
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, issuance.idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM (issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance) INNER JOIN responsiblepersons ON
issuance.idRespPerson = responsiblepersons.idRespPerson
WHERE department='".$data."'
GROUP BY issuance.idIssuance";
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
WHERE status='опрацьовано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getGet"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='отримано'
GROUP BY issuance.idIssuance";

    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    sendData($issue);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getNew"){
    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson, COUNT(idGiven) AS mc, SUM(amount) AS ma
FROM issuance INNER JOIN givenmed ON issuance.idIssuance = givenmed.idIssuance
WHERE status='нове'
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
                "resp"=>$value->getRespPerson(),
                "givens"=>$d,
                "depart"=>$value->getDepart()];
        }
    }

    echo json_encode($result);
}