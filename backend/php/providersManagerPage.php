<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "classes/Provider.php";
require "dao/ProviderDAO.php";
require "dao/CitiesAndCountriesDAO.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;

$smarty->assign("managerName",$_SESSION["name"]);

$cities = [];
$countries = [];
$providers = [];

if(isset($_POST["sort_by_name"])){
    $sql = "SELECT * FROM providers ORDER BY companyName;";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();

    CitiesAndCountriesDAO::eagerInit();
    $cities = CitiesAndCountriesDAO::getCities();
    $countries = CitiesAndCountriesDAO::getCountries();
}
else if(isset($_POST["sort_by_address"])){
    $sql = "SELECT * FROM providers ORDER BY country,sity,street,buildNo;";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();

    CitiesAndCountriesDAO::eagerInit();
    $cities = CitiesAndCountriesDAO::getCities();
    $countries = CitiesAndCountriesDAO::getCountries();
}
else if(isset($_POST["search_cc"])){
    $city = $_POST["city_def"];
    $cou = $_POST["country_def"];

    $sql = "SELECT * FROM providers WHERE country LIKE '".$cou."%' AND sity LIKE '".$city."%';";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();

    CitiesAndCountriesDAO::eagerInit();
    $cities = CitiesAndCountriesDAO::getCities();
    $countries = CitiesAndCountriesDAO::getCountries();
}
else if(isset($_POST["submit_add"])){
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

    header('location:providersManagerPage.php');
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

    header('location:providersManagerPage.php');
}
else if(isset($_POST["delete_prov"])){
    $id = $_POST["id"];
    $pdo =  Database::connect();
    $sql = "DELETE FROM providers WHERE idProvider=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);
    Database::disconnect();

    header('location:providersManagerPage.php');
}
else if(isset($_POST["add_phone_b"])){
    $id = $_POST["provid"];
    $p = $_POST["phoneval"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO phones (phone,idProvider) VALUES (?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$p,$id]);
    Database::disconnect();

    header('location:providersManagerPage.php');
}
else if(isset($_POST["del_phone"])){
    $phone= $_POST["pval"];

    $pdo =  Database::connect();
    $sql = "DELETE FROM phones WHERE phone=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$phone]);
    Database::disconnect();

    header('location:providersManagerPage.php');
}
else{
    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();

    CitiesAndCountriesDAO::eagerInit();
    $cities = CitiesAndCountriesDAO::getCities();
    $countries = CitiesAndCountriesDAO::getCountries();

}

$smarty->assign("prov_vals",$providers);
$smarty->assign("countries",$countries);
$smarty->assign("cities",$cities);

$smarty->display("../../frontend/html/providersManagerPage.tpl");