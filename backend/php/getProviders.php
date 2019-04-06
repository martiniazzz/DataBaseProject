<?php

require "database/Database.php";
require "dao/ProviderDAO.php";
require "dao/CitiesAndCountriesDAO.php";
require "classes/Provider.php";

if(isset($_GET["sort_name"])){
    $sql = "SELECT * FROM providers ORDER BY companyName";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}
else if(isset($_GET["sort_address"])){
    $sql = "SELECT * FROM providers ORDER BY country,sity,street,buildNo";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}
else if(isset($_GET["findC"])){
    $city = $_GET["city"];
    $cou = $_GET["country"];

    $sql = "SELECT * FROM providers WHERE country LIKE '".$cou."%' AND sity LIKE '".$city."%';";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}
else if(isset($_GET["getCC"])){
    CitiesAndCountriesDAO::eagerInit();
    $cities = CitiesAndCountriesDAO::getCities();
    $countries = CitiesAndCountriesDAO::getCountries();

    $result = ["cities"=>$cities, "countries"=>$countries];

    echo json_encode($result);
}
else if(isset($_GET["delPhone"])){
    $phone = $_GET["delPhone"];

    $pdo =  Database::connect();
    $sql = "DELETE FROM phones WHERE phone=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$phone]);

    Database::disconnect();

    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}
else if(isset($_GET["addPhone"])){
    $id = $_GET["id"];
    $phone = $_GET["phone"];

    $pdo =  Database::connect();
    $sql = "INSERT INTO phones (phone,idProvider) VALUES (?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$phone,$id]);
    Database::disconnect();

    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}
else if(isset($_POST["provAction"]) && $_POST["provAction"]=="addProvider"){
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
    sendData($providers);
}
else if(isset($_POST["provAction"]) && $_POST["provAction"]=="updateProvider"){
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
    sendData($providers);
}
else if(isset($_POST["action"]) && $_POST["action"]=="deleteProv"){
    $id = $_POST["id"];
    $pdo =  Database::connect();
    $sql = "DELETE FROM providers WHERE idProvider=?;";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$id]);
    Database::disconnect();

    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}
else{
    $sql = "SELECT * FROM providers";
    ProviderDAO::eagerInit($sql);
    $providers = ProviderDAO::getProviders();
    sendData($providers);
}

function sendData($data){
    $result = [];

    foreach($data as $value) {
        $result[] = ["id"=>$value->getId(),
            "name"=>$value->getName(),
            "country"=>$value->getCountry(),
            "city"=>$value->getCity(),
            "street"=>$value->getStreet(),
            "build"=>$value->getBuildNo(),
            "account"=>$value->getAccount(),
            "email"=>$value->getEmail(),
            "phones"=>$value->getPhones()];
    }

    echo json_encode($result);
}