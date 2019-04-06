<?php

require "database/Database.php";
require "dao/MedicineManagerDAO.php";
require "classes/MedicineManager.php";
require "classes/MedicineGroup.php";

if(isset($_POST["action"]) && $_POST["action"]=="sorted_name"){
    $sql = "SELECT * FROM medicines ORDER BY medName;";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["query"])){
    $prefix = $_POST["query"];
    $sql = "SELECT * FROM medicines WHERE (lower(medName) LIKE '".$prefix."%')";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["action"]) && $_POST["action"]=="createIssue"){
    $pdo = Database::connect();
    $sql = "INSERT INTO issuance (iDate, status, idManager, idRespPerson) VALUES (?,?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([date('Y-m-d'), "нове","",$_SESSION["usernameId"]]);

    $lastId = $pdo->lastInsertId();

    $data = json_decode(json_encode($_POST["dataI"]), JSON_UNESCAPED_UNICODE);
    $jsonIterator = new RecursiveIteratorIterator(
        new RecursiveArrayIterator(json_decode($data, TRUE)),
        RecursiveIteratorIterator::SELF_FIRST);

    $array = [];
    $lastIndex;
    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            $lastIndex = $key;
        } else {
            $array[$lastIndex][$key] = $val;
        }
    }

    foreach ($array as $a){
        $medid = $a["id"];
        $amount = $a["amount"];
        $sql = "SELECT medicines.idMedicine, idGroup, storageUnitAmount
                FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
                WHERE medicines.idMedicine=".$medid.";";

        $newam = [];
        $grid = [];
        $givam = [];
        foreach ($pdo->query($sql) as $r){
            if($r["storageUnitAmount"] >= $amount){
                $newam[] = $r["storageUnitAmount"] - $amount;
                $grid[] = $r["idGroup"];
                $givam[] = $amount;
                break;
            }
            else{
                $newam[] = 0;
                $amount = $amount - $r["storageUnitAmount"];
                $grid[] = $r["idGroup"];
                $givam[] = $r["storageUnitAmount"];
            }
        }
        for ($i=0;$i<(count($newam));$i++){
            $sql = "INSERT INTO givenmed (amount, idGroup, idIssuance) VALUES (?,?,?)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$givam[$i],$grid[$i],$lastId]);
        }
        for ($i=0;$i<(count($newam));$i++){
            $sql = "UPDATE medicinegroups SET storageUnitAmount=? WHERE idGroup=?";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$newam[$i], $grid[$i]]);
        }
    }

    $sql = "SELECT issuance.idIssuance, iDate, status, idManager, idRespPerson
            FROM issuance
            WHERE idRespPerson='".$_SESSION["usernameId"]."';";
    IssuanceDAO::eagerInit($sql);
    $issue = IssuanceDAO::getIssuance();

    $smarty->assign($table_cont,$issue);
    Database::disconnect();
}
else{
    $sql = "SELECT * FROM medicines";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}

function sendData($data){
    $result = [];
    if($data != []){
        foreach($data as $value) {
            $result[] = ["id"=>$value->getId(),
                "name"=>$value->getName(),
                "producer"=>$value->getProducer(),
                "desc"=>$value->getDesc(),
                "type"=>$value->getUnitType(),
                "amount"=>$value->getStorageAmount()];
        }
    }

    echo json_encode($result);
}



