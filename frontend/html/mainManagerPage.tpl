<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Менеджер</title>
    <link href="../../frontend/css/managerPageCSS.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js/managerPage.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="page-holder">
    <div class="footer">
        <div class="account">
            <div class="account-name">
                {$managerName}
            </div>
            <div>
                <a href="logout.php">Вийти</a>
            </div>
        </div>
    </div>
    <div class="container row">
        <div class="content col-md-10">
            <div class="content-inner row">
                <a href="providersManagerPage.php" id="providers-div" class="entity col-md-2">Providers</a>
                <a href="deliveriesManagerPage.php" id="deliveries-div" class="entity col-md-2">Deliveries</a>
                <a href="medManagerPage.php" id="medicines-div" class="entity col-md-2">Medicines</a>
                <a href="issuanceManagerPage.php" id="issuance-div" class="entity col-md-2">Issuance</a>
                <a href="writeoffManagerPage.php" id="writeoff-div" class="entity col-md-2">Write Off</a>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../assets/libs/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/managerPage.js"></script>
</html>