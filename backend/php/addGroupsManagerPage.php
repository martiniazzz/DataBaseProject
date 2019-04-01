<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "database/TablesUpdate.php";
require "classes/MedicineGroup.php";
require "classes/Medicine.php";
require "dao/MedicineGroupDAO.php";
require "dao/MedicineDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$delid = $_SESSION['groupdel'];

$smarty->assign("id",$delid);

$sql = "SELECT * FROM medicinegroups WHERE idDelivery='".$delid."';";
MedicineGroupDAO::eagerInit($sql);
$groups = MedicineGroupDAO::getGroups();

if(isset($_POST["submit_add"])){
    $s = $_POST["shelf"];
    $r = $_POST["rack"];
    $pd = $_POST["pdate"];
    $am = $_POST["amount"];
    $pr = $_POST["price"];
    $med = $_POST["med"];

    $pdo =  Database::connect();

    $stmt = $pdo->prepare("SELECT usabilityTerm FROM medicines WHERE idMedicine=?;");
    $stmt->execute([$med]);
    $toadd = $stmt->fetchColumn();

    $date = date('Y-m-d', strtotime("+".$toadd." months", strtotime($pd)));

    $sql = "INSERT INTO medicinegroups (shelfNo,rackNo,productdate, dueTo,delPackAmount, storageUnitAmount, pricePerPack, isFinished, idMedicine, idDelivery) VALUES (?,?,?,?,?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$s, $r, $pd, $date, $am, 0, $pr, false, $med, $delid]);
    Database::disconnect();

    TablesUpdate::updateMedicines();

    header('location:addGroupsManagerPage.php');
}
else if(isset($_POST["submit_update_group"])){
    $s = $_POST["shelf"];
    $r = $_POST["rack"];
    $pd = $_POST["pdate"];
    $am = $_POST["amount"];
    $pr = $_POST["price"];
    $med = $_POST["med"];
    $id = $_POST["id"];

    $pdo =  Database::connect();

    $stmt = $pdo->prepare("SELECT usabilityTerm FROM medicines WHERE idMedicine=?;");
    $stmt->execute([$med]);
    $toadd = $stmt->fetchColumn();

    $date = date('Y-m-d', strtotime("+".$toadd." months", strtotime($pd)));

    $sql = "UPDATE medicinegroups SET shelfNo=?,rackNo=?,productdate=?,dueTo=?,delPackAmount=?,storageUnitAmount=?,pricePerPack=?,isFinished=?,idMedicine=?, idDelivery=? WHERE idGroup=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$s, $r, $pd, $date, $am, 0, $pr, false, $med, $delid,$id]);
    Database::disconnect();

    TablesUpdate::updateMedicines();

    header('location:addGroupsManagerPage.php');
}

$sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm, SUM(storageUnitAmount) AS amount
FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
GROUP BY medicines.idMedicine";
MedicineDAO::eagerInit($sql);
$meds = MedicineDAO::getMedicines();

$smarty->assign("groups_list",$groups);
$smarty->assign("meds_list",$meds);

$smarty->display("../../frontend/html/addGroupsManagerPage.tpl");