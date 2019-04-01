<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";

$smarty = new Smarty;

if(isset($_GET['action']) && $_GET['action'] == 'bad_pass')
    $smarty->assign("error_msg","Incorrect password!");
else if(isset($_GET['action']) && $_GET['action'] == 'no_user')
    $smarty->assign("error_msg","No such user!");
else
    $smarty->assign("error_msg","");

$smarty->display("../../frontend/html/home.tpl");

if(isset($_POST['login_post'])) {
    $pdo = Database::connect();
    $username = $_POST['login'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "admin"){
        header("Location: adminPage.php");
        exit;
    }

    try {
        $statement = $pdo->prepare("SELECT idUser, password FROM users WHERE idUser = :username");
        $statement->execute(array(':username' => $username));
        $res = $statement->fetch();

        if($res == false){
            header("Location: home.php?action=no_user");
            exit;
        }
        else {
            if (password_verify($password, $res['password'])) {
                $statement = $pdo->prepare("SELECT * FROM storagemanagers WHERE idManager = :username");
                $statement->execute(array(':username' => $username));
                $res = $statement->fetch(PDO::FETCH_ASSOC);

                if($res == false){
                    $statement = $pdo->prepare("SELECT * FROM responsiblepersons WHERE idRespPerson = :username");
                    $statement->execute(array(':username' => $username));
                    $res = $statement->fetch(PDO::FETCH_ASSOC);

                    $_SESSION["username"] = $username;
                    $_SESSION["usernameId"] = $res["idRespPerson"];
                    $_SESSION["name"] = $res["lastName"]." ".$res["firstName"]." ".$res["midName"];

                    header("Location: respPersonPage.php");
                    exit;
                }
                $_SESSION["username"] = $username;
                $_SESSION["usernameId"] = $res["idManager"];
                $_SESSION["name"] = $res["lastName"]." ".$res["firstName"]." ".$res["midName"];
                header("Location: mainManagerPage.php");
                exit;
            }
            else{
                header("Location: home.php?action=bad_pass");
                exit;
            }
        }
    }
    catch(PDOException $e) {}
    Database::disconnect();
}