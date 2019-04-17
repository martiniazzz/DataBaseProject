<?php

require "database/Database.php";
require "database/TablesUpdate.php";
require "classes/MedicineGroup.php";
require "classes/Medicine.php";
require "dao/MedicineGroupDAO.php";
require "dao/MedicineDAO.php";

$id = $_SESSION['groupdel'];

if(isset($_GET["getCC"])){
    $pdo = Database::connect();
    $sql = "SELECT * FROM medicines";
    $result = [];
    foreach ($pdo->query($sql) as $value) {
        $result[] = ["id"=>$value["idMedicine"],
            "name"=>$value["medName"]];
    }
    Database::disconnect();

    echo json_encode($result);
}
else if(isset($_POST["groupAction"]) && $_POST["groupAction"]=="addGroup"){
    $s = $_POST["s"];
    $r = $_POST["r"];
    $pd = $_POST["pd"];
    $am = $_POST["am"];
    $pr = $_POST["pr"];
    $med = $_POST["med"];

    $pdo =  Database::connect();

    $stmt = $pdo->prepare("SELECT usabilityTerm FROM medicines WHERE idMedicine=?;");
    $stmt->execute([$med]);
    $toadd = $stmt->fetchColumn();

    $date = date('Y-m-d', strtotime("+".$toadd." months", strtotime($pd)));

    $sql = "INSERT INTO medicinegroups (shelfNo,rackNo,productdate, dueTo,delPackAmount, storageUnitAmount, pricePerPack, idMedicine, idDelivery) VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$s, $r, $pd, $date, $am, 0, $pr, $med, $id]);
    Database::disconnect();

    TablesUpdate::updateMedicines();
    TablesUpdate::updateDeliveries();

    $sql = "SELECT * FROM medicinegroups WHERE idDelivery='".$id."';";
    MedicineGroupDAO::eagerInit($sql);
    $groups = MedicineGroupDAO::getGroups();

    sendData($groups);
}
else if(isset($_POST["groupAction"]) && $_POST["groupAction"]=="updateGroup"){
    $gid = $_POST["id"];
    $s = $_POST["s"];
    $r = $_POST["r"];
    $pd = $_POST["pd"];
    $am = $_POST["am"];
    $pr = $_POST["pr"];
    $med = $_POST["med"];

    $pdo =  Database::connect();

    $stmt = $pdo->prepare("SELECT usabilityTerm FROM medicines WHERE idMedicine=?;");
    $stmt->execute([$med]);
    $toadd = $stmt->fetchColumn();

    $date = date('Y-m-d', strtotime("+".$toadd." months", strtotime($pd)));

    $sql = "UPDATE medicinegroups SET shelfNo=?,rackNo=?,productdate=?,dueTo=?,delPackAmount=?,storageUnitAmount=?,pricePerPack=?,idMedicine=?, idDelivery=? WHERE idGroup=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$s, $r, $pd, $date, $am, 0, $pr, $med, $id,$gid]);
    Database::disconnect();

    TablesUpdate::updateMedicines();
    TablesUpdate::updateDeliveries();

    $sql = "SELECT * FROM medicinegroups WHERE idDelivery='".$id."';";
    MedicineGroupDAO::eagerInit($sql);
    $groups = MedicineGroupDAO::getGroups();

    sendData($groups);
}
else{
    $sql = "SELECT * FROM medicinegroups WHERE idDelivery='".$id."';";
    MedicineGroupDAO::eagerInit($sql);
    $groups = MedicineGroupDAO::getGroups();

    sendData($groups);
}

function sendData($data){
    $result = [];

    foreach($data as $value) {
        $result[] = ["id"=>$value->getId(),
            "shelf"=>$value->getShelf(),
            "rack"=>$value->getRack(),
            "pdate"=>$value->getProductDate(),
            "due"=>$value->getDueTo(),
            "delam"=>$value->getDelPackAmount(),
            "storam"=>$value->getStorageUnitAmount(),
            "price"=>$value->getPricePerPack(),
            "total"=>$value->getTotalPrice(),
            "med"=>$value->getIdMedicine(),
            "medName"=>$value->getMedName()];
    }

    echo json_encode($result);
}