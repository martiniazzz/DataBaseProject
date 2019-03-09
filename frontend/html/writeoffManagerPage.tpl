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
                {$managerName}
            </div>
            <div class="account-giving">
                <a href="mainManagerPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-3 table-header-cell">Номер списання</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-3 table-header-cell">Кількість</div>
                    <div class="col-md-3 table-header-cell">Причина</div>
                    <div class="col-md-3 table-header-cell">Група</div>
                </div>
                <div class="table-content">
                    {foreach from=$table_content item=m}
                        <div class="row table-row">
                            <div class="col-md-3 table-cell">{$m->getId()}</div>
                            <div class="col-md-3 table-cell">{$m->getDate()}</div>
                            <div class="col-md-3 table-cell">{$m->getAmount()}</div>
                            <div class="col-md-3 table-cell">{$m->getReason()}</div>
                            <div class="col-md-3 table-cell">{$m->getIdGroup()}</div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>