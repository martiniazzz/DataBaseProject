<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "classes/Provider.php";
require "dao/ProviderDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$headers = [];
$providers = [];

if(isset($_POST["submit_add"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $build = $_POST["build"];
    $account = $_POST["account"];
    $email = $_POST["email"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO providers (companyName,country,sity,street,buildNo,account,email) VALUES (?,?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $country, $city,$street,$build,$account,$email]);
    Database::disconnect();

    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    $headers = ProviderDAO::getHeaders();
}
else if(isset($_POST["submit_update_prov"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $street = $_POST["street"];
    $build = $_POST["build"];
    $account = $_POST["account"];
    $email = $_POST["email"];

    $pdo =  Database::connect();
    $sql = "UPDATE providers SET companyName=?,country=?,sity=?,street=?,buildNo=?,account=?,email=? WHERE idProvider=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $country, $city,$street,$build,$account,$email, $id]);
    Database::disconnect();

    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    $headers = ProviderDAO::getHeaders();
}
else if(isset($_POST["delete_prov"])){
    $id = $_POST["id"];
    $pdo =  Database::connect();
    $sql = "DELETE FROM providers WHERE idProvider=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);
    Database::disconnect();

    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    $headers = ProviderDAO::getHeaders();
}
else{
    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    $headers = ProviderDAO::getHeaders();
}

$smarty->assign("header_vals",$headers);
$smarty->assign("prov_vals",$providers);

$smarty->display("../../frontend/html/providersManagerPage.tpl");