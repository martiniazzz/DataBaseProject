<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/respRepsonCSS.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="../assets/libs/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/respPersonPage.js"></script>

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
            <div class="account-giving">
                <a href="respPersonPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-3 table-header-cell">Номер видачі</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-3 table-header-cell">Статус</div>
                    <div class="col-md-3 table-header-cell">Детальніше</div>
                </div>
                <div class="table-content">
                    {foreach from=$table_content item=m}
                        <div class="row table-row">
                            <div class="col-md-3 table-cell">{$m->getId()}</div>
                            <div class="col-md-3 table-cell">{$m->getDate()}</div>
                            <div class="col-md-3 table-cell">{$m->getStatus()}</div>
                            <button onclick="showInfo_G('{$m->getGivenMed()}')" class="col-md-3 table-cell">+</button>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="content-inner col-md-4">
            <div>
                <div class="get-more-title">More info</div>
                <div id="info-holder" class="get-more-cont border-shadow">
                </div>
            </div>
            <div class="actions-holder">
                <form method="post" action="respPersonGivingsPage.php">
                    <button name="showAllG" type="submit">Усі</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                    <button name="showOtrG" type="submit">Отримано</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                    <button name="showOprG" type="submit">Опрацьовано</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                    <button name="showNewG" type="submit">Нове</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>