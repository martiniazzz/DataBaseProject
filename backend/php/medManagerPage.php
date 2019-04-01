<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/MedicineManagerDAO.php";
require "classes/MedicineManager.php";
require "classes/MedicineGroup.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;
$smarty->assign("managerName",$_SESSION["name"]);

$table_cont = "table_content";
$input_val = "input_val";

if(isset($_POST['submit_btn'])){
    $prefix = $_POST['prefix'];
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm
FROM medicines
WHERE (lower(medName) LIKE '".$prefix."%')";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();

    $smarty->assign($input_val,$prefix);
    $smarty->assign($table_cont,$medicine);
}
else if(isset($_POST["submit_add"])){
    $name = $_POST["name"];
    $prod = $_POST["prod"];
    $type = $_POST["unittype"];
    $am = $_POST["unitam"];
    $temp = $_POST["temp"];
    $usterm = $_POST["usterm"];
    $desc = $_POST["desc"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO medicines (medName,producer,medDescript,unitType,unitAmount,storageTemp,usabilityTerm) VALUES (?,?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $prod, $desc,$type,$am,$temp,$usterm]);
    Database::disconnect();

    header('location:medManagerPage.php');
}
else if(isset($_POST["submit_update_med"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $prod = $_POST["prod"];
    $type = $_POST["unittype"];
    $am = $_POST["unitam"];
    $temp = $_POST["temp"];
    $usterm = $_POST["usterm"];
    $desc = $_POST["desc"];

    $pdo =  Database::connect();
    $sql = "UPDATE medicines SET medName=?,producer=?,medDescript=?,unitType=?,unitAmount=?,storageTemp=?,usabilityTerm=? WHERE idMedicine=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $prod, $desc,$type,$am,$temp,$usterm,$id]);
    Database::disconnect();

    header('location:medManagerPage.php');
}
else if(isset($_POST["delete_med"])){
    $id = $_POST["id"];
    $pdo =  Database::connect();
    $sql = "DELETE FROM medicines WHERE idMedicine=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);
    Database::disconnect();

    header('location:medManagerPage.php');
}
else if(isset($_POST["sort_by_name"])){
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm
FROM medicines
ORDER BY medName;";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}
else if(isset($_POST["sort_by_prod"])){
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm
FROM medicines
ORDER BY producer;";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}
else if(isset($_POST["finished_groups"])){
    $sql = "SELECT * FROM medicines WHERE EXISTS (SELECT * FROM medicinegroups WHERE isFinished='".true."' AND idMedicine = medicines.idMedicine);";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}
else if(isset($_POST["finished_full"])){
    $sql = "SELECT * FROM medicines WHERE NOT EXISTS (SELECT * FROM medicinegroups WHERE isFinished='".false."' AND idMedicine = medicines.idMedicine);";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}
else{
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm FROM medicines";
    MedicineManagerDAO::eagerInit($sql);
    $medicine = MedicineManagerDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}

$smarty->display("../../frontend/html/medManagerPage.tpl");