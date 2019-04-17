<?php

require "database/Database.php";
require "database/TablesUpdate.php";

if(isset($_POST["action"]) && $_POST["action"]=="medicineInfo"){
    $pdo = Database::connect();

    $sql = "SELECT medicines.idMedicine, medName, COALESCE(SUM(a1),0) AS amount1,COALESCE(SUM(a2),0) AS amount2,
COALESCE(SUM(X.delPackAmount * unitAmount),0) AS amount3,
 COALESCE(SUM(a3),0) AS amount4
    FROM medicines LEFT JOIN
    (SELECT Y.idGroup,Y.idMedicine,Y.delPackAmount, COALESCE(SUM(givenmed.amount),0) AS a1, a2,a3
    FROM (SELECT medicinegroups.idGroup,medicinegroups.idMedicine, medicinegroups.delPackAmount, 
    COALESCE(SUM(writeoff.woAmount),0) AS a2, COALESCE(SUM(storageUnitAmount),0) AS a3
    FROM medicinegroups LEFT JOIN writeoff ON medicinegroups.idGroup=writeoff.idGroup
    GROUP BY medicinegroups.idGroup) Y LEFT JOIN givenmed ON Y.idGroup=givenmed.idGroup
    GROUP BY Y.idGroup) X ON X.idMedicine = medicines.idMedicine
    GROUP BY medicines.idMedicine
    ORDER BY medName";

    $data1 = [];
    foreach ($pdo->query($sql) as $row){
        $data1[] = ["name"=>$row["medName"],"givs"=>$row["amount1"],"offs"=>$row["amount2"],
            "arr"=>$row["amount3"],"left"=>$row["amount4"]];
    }

    $sqlp = "SELECT MAX(COALESCE(amount,0)) AS max, MIn(COALESCE(amount,0)) AS min  
FROM (SELECT medicines.idMedicine, COUNT(idDelivery) AS amount
            FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine
            GROUP BY medicines.idMedicine) X";
    $max = 0;
    $min = 0;
    foreach ($pdo->query($sqlp) as $row){
        $max = $row["max"];
        $min = $row["min"];
    }

    $sql = "SELECT medicines.idMedicine, medName
    FROM medicines LEFT JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
    GROUP BY medicines.idMedicine
    HAVING (COALESCE(COUNT(idDelivery),0)) = '".$max."'";

    $data2 = [];
    foreach ($pdo->query($sql) as $row){
        $data2[] = [$row["medName"]];
    }

    $sql = "SELECT medicines.idMedicine, medName
    FROM medicines LEFT JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
    GROUP BY medicines.idMedicine
    HAVING (COALESCE(COUNT(idDelivery),0)) = '".$min."'";

    $data3 = [];
    foreach ($pdo->query($sql) as $row){
        $data3[] = [$row["medName"]];
    }

    $sqlp = "SELECT MAX(COALESCE(amount,0)) AS max, MIN(COALESCE(amount,0)) AS min  
FROM (SELECT medicines.idMedicine,medicinegroups.idGroup, COUNT(idGiven) AS amount
            FROM (medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine)
            LEFT JOIN givenmed ON medicinegroups.idGroup = givenmed.idGroup
            GROUP BY medicinegroups.idGroup,medicines.idMedicine) X";
    $max = 0;
    $min = 0;
    foreach ($pdo->query($sqlp) as $row){
        $max = $row["max"];
        $min = $row["min"];
    }

    $sql = "SELECT medicines.idMedicine,medicinegroups.idGroup, medName
    FROM (medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine)
            LEFT JOIN givenmed ON medicinegroups.idGroup = givenmed.idGroup
            GROUP BY medicinegroups.idGroup,medicines.idMedicine
    HAVING COALESCE(COUNT(idGiven),0) = '".$max."'";

    $data4 = [];
    foreach ($pdo->query($sql) as $row){
        $data4[] = [$row["medName"]];
    }

    $sql = "SELECT medicines.idMedicine,medicinegroups.idGroup, medName
    FROM (medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine)
            LEFT JOIN givenmed ON medicinegroups.idGroup = givenmed.idGroup
            GROUP BY medicinegroups.idGroup,medicines.idMedicine
    HAVING COALESCE(COUNT(idGiven),0) = '".$min."'";

    $data5 = [];
    foreach ($pdo->query($sql) as $row){
        $data5[] = [$row["medName"]];
    }

    $sqlp = "SELECT MAX(COALESCE(amount,0)) AS max, MIN(COALESCE(amount,0)) AS min  
FROM (SELECT medicines.idMedicine,medicinegroups.idGroup, COUNT(idWriteOff) AS amount
            FROM (medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine)
            LEFT JOIN writeoff ON medicinegroups.idGroup = writeoff.idGroup
            GROUP BY medicinegroups.idGroup,medicines.idMedicine) X";
    $max = 0;
    $min = 0;
    foreach ($pdo->query($sqlp) as $row){
        $max = $row["max"];
        $min = $row["min"];
    }

    $sql = "SELECT  medicines.idMedicine,medicinegroups.idGroup, medName
    FROM (medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine)
            LEFT JOIN writeoff ON medicinegroups.idGroup = writeoff.idGroup
            GROUP BY medicinegroups.idGroup,medicines.idMedicine
    HAVING COALESCE(COUNT(idWriteOff),0) = '".$max."'";

    $data6 = [];
    foreach ($pdo->query($sql) as $row){
        $data6[] = [$row["medName"]];
    }

    $sql = "SELECT DISTINCT medicines.idMedicine, medicinegroups.idGroup, medName
    FROM (medicines INNER JOIN medicinegroups ON medicines.idMedicine=medicinegroups.idMedicine)
            LEFT JOIN writeoff ON medicinegroups.idGroup = writeoff.idGroup
            GROUP BY medicinegroups.idGroup,medicines.idMedicine
    HAVING COALESCE(COUNT(idWriteOff),0) = '".$min."'";

    $data7 = [];
    foreach ($pdo->query($sql) as $row){
        $data7[] = [$row["medName"]];
    }
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $sql = "SELECT DISTINCT medName FROM medicines INNER JOIN medicinegroups X
            ON medicines.idMedicine=X.idMedicine
            WHERE NOT EXISTS 
            (SELECT *
            FROM responsiblepersons 
            WHERE department NOT IN
            (SELECT department
            FROM (responsiblepersons INNER JOIN issuance 
            ON responsiblepersons.idRespPerson = issuance.idRespPerson)
            INNER JOIN givenmed ON givenmed.idIssuance = issuance.idIssuance
            WHERE idGroup = X.idGroup))";

    $data8 = [];
    foreach ($pdo->query($sql) as $row){
        $data8[] = ["name"=>$row["medName"]];
    }


    Database::disconnect();

    $result = ["stat"=>$data1,
        "maxd"=>$data2,"mind"=>$data3,
        "maxg"=>$data4,"ming"=>$data5,
        "maxw"=>$data6,"minw"=>$data7,"allDeps"=>$data8];

    echo json_encode($result);
}
else if(isset($_POST["action"]) && $_POST["action"]=="groupsInfo"){
    $sql = "SELECT idGroup AS id, medName AS name, storageUnitAmount AS sa, delPackAmount*unitAmount AS tot, a1, a2
    FROM 
    (SELECT Y.idGroup,Y.idMedicine,Y.delPackAmount, Y.storageUnitAmount, COALESCE(SUM(givenmed.amount),0) AS a1, a2
    FROM 
    (SELECT medicinegroups.idGroup,medicinegroups.idMedicine, medicinegroups.delPackAmount, medicinegroups.storageUnitAmount,
    COALESCE(SUM(writeoff.woAmount),0) AS a2
    FROM medicinegroups LEFT JOIN writeoff ON medicinegroups.idGroup=writeoff.idGroup
    GROUP BY medicinegroups.idGroup) Y 
    LEFT JOIN givenmed ON Y.idGroup=givenmed.idGroup
    GROUP BY Y.idGroup) X 
    INNER JOIN medicines ON X.idMedicine = medicines.idMedicine";

    $pdo = Database::connect();

    $data = [];
    foreach ($pdo->query($sql) as $row){
        $data[] = ["id"=>$row["id"],"name"=>$row["name"],"givs"=>$row["a1"],"offs"=>$row["a2"],
            "arr"=>$row["tot"],"left"=>$row["sa"]];
    }

    Database::disconnect();

    echo json_encode($data);
}
else if(isset($_POST["action"]) && $_POST["action"]=="provsStat"){
    $pdo = Database::connect();

    $sqlp = "SELECT MAX(amount) AS max, MIN(amount) AS min  FROM (SELECT idProvider, COUNT(idDelivery) AS amount
            FROM deliveries
            GROUP BY idProvider) X";
    $max = 0;
    $min = 0;
    foreach ($pdo->query($sqlp) as $row){
        $max = $row["max"];
        $min = $row["min"];
    }
    $sql = "SELECT providers.idProvider, companyName
    FROM providers INNER JOIN deliveries ON providers.idProvider = deliveries.idProvider
    GROUP BY providers.idProvider
    HAVING COUNT(idDelivery) = '".$max."'";

    $data1 = [];
    foreach ($pdo->query($sql) as $row){
        $data1[] = [$row["companyName"]];
    }

    $sql = "SELECT providers.idProvider, companyName
    FROM providers INNER JOIN deliveries ON providers.idProvider = deliveries.idProvider
    GROUP BY providers.idProvider
    HAVING COUNT(idDelivery) = '".$min."'";

    $data2 = [];
    foreach ($pdo->query($sql) as $row){
        $data2[] = [$row["companyName"]];
    }

    $sql = "SELECT providers.idProvider, companyName, COUNT(idDelivery) AS amount, SUM(totalPrice) AS total
    FROM providers INNER JOIN deliveries ON providers.idProvider = deliveries.idProvider
    GROUP BY providers.idProvider";

    $data3 = [];
    foreach ($pdo->query($sql) as $row){
        $data3[] = ["name"=>$row["companyName"],"amount"=>$row["amount"],"total"=>$row["total"]];
    }
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $sql = "SELECT companyName FROM providers X 
            WHERE NOT EXISTS 
            (SELECT *
            FROM medicines
            WHERE idMedicine NOT IN
            (SELECT idMedicine
            FROM medicinegroups INNER JOIN deliveries ON medicinegroups.idDelivery = deliveries.idDelivery
            WHERE idProvider = X.idProvider))";

    $data4 = [];
    foreach ($pdo->query($sql) as $row){
        $data4[] = ["name"=>$row["companyName"]];
    }

    Database::disconnect();

    $result = ["max"=>$data1,"min"=>$data2,"stat"=>$data3,"provAllMeds"=>$data4];

    echo json_encode($result);
}
else if(isset($_POST["action"]) && $_POST["action"]=="givStat"){
    $pdo = Database::connect();

    $sqlp = "SELECT MAX(amount) AS max, MIN(amount) AS min  FROM 
            (SELECT idRespPerson, COUNT(idIssuance) AS amount
            FROM issuance
            GROUP BY idRespPerson) X";
    $max = 0;
    $min = 0;
    foreach ($pdo->query($sqlp) as $row){
        $max = $row["max"];
        $min = $row["min"];
    }

    $sql = "SELECT responsiblepersons.idRespPerson, lastName, firstName, midName
    FROM responsiblepersons LEFT JOIN issuance ON responsiblepersons.idRespPerson = issuance.idRespPerson
    GROUP BY responsiblepersons.idRespPerson
    HAVING COUNT(idIssuance) = '".$max."'";

    $data1 = [];
    foreach ($pdo->query($sql) as $row){
        $data1[] = $row["lastName"]." ".$row["firstName"]." ".$row["midName"];
    }

    $sql = "SELECT responsiblepersons.idRespPerson, lastName, firstName, midName
    FROM responsiblepersons LEFT JOIN issuance ON responsiblepersons.idRespPerson = issuance.idRespPerson
    GROUP BY responsiblepersons.idRespPerson
    HAVING COUNT(idIssuance) = '".$min."'";

    $data2 = [];
    foreach ($pdo->query($sql) as $row){
        $data2[] = $row["lastName"]." ".$row["firstName"]." ".$row["midName"];
    }

    $sqlp = "SELECT MAX(amount) AS max, MIN(amount) AS min  FROM 
            (SELECT department, COUNT(idIssuance) AS amount
            FROM responsiblepersons LEFT JOIN issuance ON responsiblepersons.idRespPerson = issuance.idRespPerson
            GROUP BY department) X";
    $max = 0;
    $min = 0;
    foreach ($pdo->query($sqlp) as $row){
        $max = $row["max"];
        $min = $row["min"];
    }

    $sql = "SELECT department
    FROM responsiblepersons LEFT JOIN issuance ON responsiblepersons.idRespPerson = issuance.idRespPerson
    GROUP BY department
    HAVING COUNT(idIssuance) = '".$max."'";

    $data3 = [];
    foreach ($pdo->query($sql) as $row){
        $data3[] = $row["department"];
    }

    $sql = "SELECT department
    FROM responsiblepersons LEFT JOIN issuance ON responsiblepersons.idRespPerson = issuance.idRespPerson
    GROUP BY department
    HAVING COUNT(idIssuance) = '".$min."'";

    $data4 = [];
    foreach ($pdo->query($sql) as $row){
        $data4[] = $row["department"];
    }

    Database::disconnect();

    $result = ["maxr"=>$data1,"minr"=>$data2,"maxd"=>$data3,"mind"=>$data4];

    echo json_encode($result);
}
else if(isset($_POST["action"]) && $_POST["action"]=="delStat"){
    $pdo = Database::connect();

    $sql = "SELECT COUNT(idDelivery) AS amount FROM deliveries";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $r1 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-6 months"));
    $sql = "SELECT COUNT(idDelivery) AS amount FROM deliveries WHERE deliverDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $r2 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-3 months"));
    $sql = "SELECT COUNT(idDelivery) AS amount FROM deliveries WHERE deliverDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $r3 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-1 months"));
    $sql = "SELECT COUNT(idDelivery) AS amount FROM deliveries WHERE deliverDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $r4 = $stmt->fetch();

    $data1 = [$r1["amount"],$r2["amount"],$r3["amount"],$r4["amount"]];

    $sql = "SELECT COUNT(idWriteOff) AS amount FROM writeoff";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $q1 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-6 months"));
    $sql = "SELECT COUNT(idWriteOff) AS amount FROM writeoff WHERE woDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $q2 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-3 months"));
    $sql = "SELECT COUNT(idWriteOff) AS amount FROM writeoff WHERE woDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $q3 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-1 months"));
    $sql = "SELECT COUNT(idWriteOff) AS amount FROM writeoff WHERE woDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $q4 = $stmt->fetch();

    $data2 = [$q1["amount"],$q2["amount"],$q3["amount"],$q4["amount"]];

    $sql = "SELECT COUNT(idIssuance) AS amount FROM issuance";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $w1 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-6 months"));
    $sql = "SELECT COUNT(idIssuance) AS amount FROM issuance WHERE iDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $w2 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-3 months"));
    $sql = "SELECT COUNT(idIssuance) AS amount FROM issuance WHERE iDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $w3 = $stmt->fetch();

    $d = date("Y-m-d", strtotime("-1 months"));
    $sql = "SELECT COUNT(idIssuance) AS amount FROM issuance WHERE iDate > '".$d."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $w4 = $stmt->fetch();

    $data3 = [$w1["amount"],$w2["amount"],$w3["amount"],$w4["amount"]];

    Database::disconnect();

    $result = ["dels"=>$data1,"offs"=>$data2,"givs"=>$data3];

    echo json_encode($result);
}
else if(isset($_POST["action"]) && $_POST["action"]=="getGroupInfo"){
    $id = $_POST["id"];

    $pdo = Database::connect();

    $sql = "SELECT * FROM medicinegroups INNER JOIN medicines 
      ON medicines.idMedicine = medicinegroups.idMedicine WHERE idGroup = '".$id."'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res= $stmt->fetch();
    $data1 = ["id"=>$res["idGroup"],"rack"=>$res["rackNo"],"shelf"=>$res["shelfNo"],
        "type"=>$res["unitType"],"delAmount"=>$res["delPackAmount"],
        "amount"=>$res["delPackAmount"]*$res["unitAmount"],"price"=>$res["pricePerPack"],
        "total"=>$res["totalPrice"],"name"=>$res["medName"],"info"=>$res["medDescript"]];

    $sql = "SELECT * FROM (medicinegroups INNER JOIN deliveries 
      ON deliveries.idDelivery = medicinegroups.idDelivery) 
      INNER JOIN providers ON providers.idProvider = deliveries.idProvider
      WHERE idGroup = '".$id."'";

    $data2 = [];
    foreach ($pdo->query($sql) as $row){
        $data2[] = ["doc"=>$row["idDelivery"],"name"=>$row["companyName"],
            "date"=>$row["deliverDate"],"amount"=>$row["delPackAmount"]];
    }

    $sql = "SELECT * FROM ((medicinegroups INNER JOIN givenmed 
      ON givenmed.idGroup = medicinegroups.idGroup) 
      INNER JOIN issuance ON issuance.idIssuance = givenmed.idIssuance)
      INNER JOIN responsiblepersons ON issuance.idRespPerson = responsiblepersons.idRespPerson
      WHERE medicinegroups.idGroup = '".$id."'";

    foreach ($pdo->query($sql) as $row){
        $data2[] = ["doc"=>"","name"=>$row["lastName"]." ".$row["firstName"]." ".$row["midName"],
            "date"=>$row["iDate"],"amount"=>$row["amount"]];
    }

    $sql = "SELECT * FROM medicinegroups INNER JOIN writeoff 
      ON writeoff.idGroup = medicinegroups.idGroup
      WHERE medicinegroups.idGroup = '".$id."'";

    foreach ($pdo->query($sql) as $row){
        $data2[] = ["doc"=>"","name"=>"Списання за причини '".$row["reason"]."'",
            "date"=>$row["woDate"],"amount"=>$row["woAmount"]];
    }

    Database::disconnect();

    $result = ["info"=>$data1,"del"=>$data2];

    echo json_encode($result);
}

