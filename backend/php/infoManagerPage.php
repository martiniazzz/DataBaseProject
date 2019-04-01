<?php

require "database/Database.php";
require "C:\Smarty\libs\Smarty.class.php";

$smarty = new Smarty;

$pdo = Database::connect();

//$sql_prov_more = "
//SELECT P.idProvider
//FROM providers P INNER JOIN (SELECT providers.idProvider, COUNT(idDelivery) AS delAm
//FROM providers INNER JOIN deliveries ON providers.idProvider = deliveries.idProvider
//                            GROUP BY providers.idProvider) T ON P.idProvider = T.idProvider
//HAVING (SELECT MAX(COUNT(idDelivery)) AS ammax
//        FROM providers INNER JOIN deliveries ON providers.idProvider = deliveries.idProvider) = T.delAm;";

$info = "";
//foreach ($pdo->query($sql_prov_more) as $res){
//    $info = "Постачальник: ".$res["idProvider"];
//}

Database::disconnect();

$smarty->assign("managerName",$_SESSION["name"]);
$smarty->assign("info",$info);

$smarty->display("../../frontend/html/infoManagerPage.tpl");