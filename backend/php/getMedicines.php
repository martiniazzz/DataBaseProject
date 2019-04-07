<?php

require "database/Database.php";
require "database/TablesUpdate.php";
require "dao/MedicineManagerDAO.php";
require "classes/MedicineManager.php";
require "classes/MedicineGroup.php";

if(isset($_GET["sorted_name"])){
    $sql = "SELECT * FROM medicines ORDER BY medName;";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_GET["sorted_prod"])){
    $sql = "SELECT * FROM medicines ORDER BY producer;";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_GET["withFin"])){
    $sql = "SELECT *
FROM medicines
WHERE idMedicine IN (SELECT medicines.idMedicine
FROM medicines LEFT JOIN medicinegroups ON (medicines.idMedicine = medicinegroups.idMedicine)
WHERE storageUnitAmount=0 OR storageUnitAmount IS NULL );";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_GET["finished"])){
    $sql = "SELECT *
FROM medicines
WHERE idMedicine NOT IN (SELECT idMedicine
                        FROM medicines M
	WHERE NOT EXISTS (SELECT *
FROM medicines LEFT JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
WHERE (storageUnitAmount=0 OR storageUnitAmount IS NULL) AND M.idMedicine =medicines.idMedicine  ));";
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
else if(isset($_POST["action"]) && $_POST["action"]=="addMed"){
    $name = $_POST["name"];
    $prod = $_POST["prod"];
    $type = $_POST["type"];
    $am = $_POST["am"];
    $temp = $_POST["temp"];
    $usterm = $_POST["term"];
    $desc = $_POST["desc"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO medicines (medName,producer,medDescript,unitType,unitAmount,storageTemp,usabilityTerm) VALUES (?,?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $prod, $desc,$type,$am,$temp,$usterm]);
    Database::disconnect();

    TablesUpdate::updateMedicines();

    $sql = "SELECT * FROM medicines";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["action"]) && $_POST["action"]=="updateMed"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $prod = $_POST["prod"];
    $type = $_POST["type"];
    $am = $_POST["am"];
    $temp = $_POST["temp"];
    $usterm = $_POST["term"];
    $desc = $_POST["desc"];

    $pdo =  Database::connect();
    $sql = "UPDATE medicines SET medName=?,producer=?,medDescript=?,unitType=?,unitAmount=?,storageTemp=?,usabilityTerm=? WHERE idMedicine=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $prod, $desc,$type,$am,$temp,$usterm,$id]);
    Database::disconnect();

    TablesUpdate::updateMedicines();

    $sql = "SELECT * FROM medicines";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getLessN"){
    $n = $_POST["n"];
    $sql = "SELECT * FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine
GROUP BY medicines.idMedicine
HAVING SUM(medicinegroups.storageUnitAmount) <= '".$n."';";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getOut"){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM medicines 
WHERE idMedicine IN(
SELECT idMedicine FROM medicinegroups
WHERE dueTo <= '".$today."');";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getSoonOut"){
    $newdate = date("Y-m-d", strtotime("-1 months"));
    $sql = "SELECT * FROM medicines 
WHERE idMedicine IN(
SELECT idMedicine FROM medicinegroups
WHERE dueTo <= '".$newdate."');";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();
    sendData($medicine);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getAllMeds"){
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
                "unitAmount"=>$value->getUnitAmount(),
                "temp"=>$value->getTemp(),
                "term"=>$value->getUsabilityTerm(),
                "amount"=>$value->getStorageAmount(),
                "groups"=>$value->getGroups()];
        }
    }

    echo json_encode($result);
}



