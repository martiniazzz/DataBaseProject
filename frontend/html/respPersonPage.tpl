<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/respRepsonCSS.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page-holder">
    <div class="footer">
        <div class="account">
            <div class="account-name">
                {$respPersonName}
            </div>
            <div class="account-exit">
                <a href="logout.php">Вийти</a>
            </div>
            <div class="account-giving">
                <a href="respPersonGivingsPage.php">Мої видачі</a>
            </div>
        </div>
    </div>
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="input-container">
                <form method="post" action="respPersonPage.php" name="form" accept-charset="UTF-8">
                    <input class="input-field" name="prefix" value="{$input_val}">
                    <button name="submit_btn" type="submit" class="input-btn">Search</button>
                </form>
            </div>
            <div class="table-holder">
                <div class="table-header border-shadow">
                    <div class="table-header-name table-header-cell">Назва</div>
                    <div class="table-header-type table-header-cell">Тип одиниці</div>
                    <div class="table-header-amount table-header-cell">Кількість</div>
                    <div class="table-header-more table-header-cell">

                    </div>
                    <div class="table-header-more table-header-cell">

                    </div>
                    <div class="table-header-more table-header-cell">

                    </div>
                </div>
                <div class="table-content">
                    {foreach from=$table_content item=m}
                        <div class="table-row">
                            <div class="table-cell-name table-cell">
                                {$m->getName()}
                            </div>
                            <div class="table-cell-type table-cell">{$m->getUnitType()}</div>
                            <div class="table-cell-amount table-cell">{$m->getStorageAmount()}</div>
                            <button onclick="showInfo('{$m->getProducer()} \n {$m->getDesc()}')" class="table-cell-more table-cell more-info-btn">і</button>
                            <button onclick="addItem('{$m->getId()}','{$m->getName()}',{$m->getStorageAmount()})" class="table-cell-more table-cell more-info-btn">+</button>
                            <button onclick="removeItem('{$m->getId()}','{$m->getName()}')" class="table-cell-more table-cell more-info-btn">-</button>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="table-navigation col-md-4">
            <div>
                <div class="get-more-title">More info</div>
                <div id="info-holder" class="get-more-cont border-shadow">
                </div>
            </div>
            <div>
                <div class="giving-title">Видача</div>
                <div class="giving-holder">
                    <div id="giving-cont">
                    </div>
                    <form method="post" action="respPersonGivingsPage.php" onsubmit="return createGiving()">
                        <input name="dataI" value="" id="issue-data">
                        <button type="submit" name="newIssuance" id="giving-btn" class="input-btn">Створити видачу</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../assets/libs/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/respPersonPage.js"></script>
</html>