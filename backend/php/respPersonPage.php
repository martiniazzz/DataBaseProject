<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/MedicineDAO.php";
require "classes/Medicine.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;
$smarty->assign("respPersonName",$_SESSION["name"]);
$table_cont = "table_content";
$input_val = "input_val";

if(isset($_POST['submit_btn'])){
    $prefix = $_POST['prefix'];
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm, SUM(storageUnitAmount) AS amount
FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
WHERE (lower(medName) LIKE '".$prefix."%')
GROUP BY medicines.idMedicine";
    MedicineDAO::eagerInit($sql);
    $medicine = MedicineDAO::getMedicines();

    $smarty->assign($input_val,$prefix);
    $smarty->assign($table_cont,$medicine);
}
if(isset($_POST['newIssuance'])){
    $pdo = Database::connect();
    $sql = "INSERT INTO issuance (iDate, status, idManager, idRespPerson) VALUES (?,?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([date('Y-m-d'), "нове","sm1001",$_SESSION["usernameId"]]);

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

    Database::disconnect();

    header('location:respPersonPage.php');
}
else{
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm, SUM(storageUnitAmount) AS amount
FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
GROUP BY medicines.idMedicine;";
    MedicineDAO::eagerInit($sql);
    $medicine = MedicineDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}

$smarty->display("../../frontend/html/respPersonPage.tpl");