<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Статистика</title>
    <link href="../../frontend/css/pages.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<body>
<link href='../../frontend/css/report.css' rel='stylesheet' type='text/css'/>
<div class="page-holder">
    {include "../../frontend/html/managerHeader.tpl"}
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-box">
                </div>
                <div class="row">
                    <div id="container-box">
                    </div>
                </div>

            </div>
            <div class="content-inner giving-holder col-md-4">
                <div>
                    <div class="filter-toggle"><button class="btn-expand">Фільтри</button></div>
                    <div class="filters-notoggle">
                        <div class="filters-inner">
                            <button id="meds-stat" class="btn btn-link">Статистика по медикаментах</button>
                        </div>
                        <div class="filters-inner">
                            <button id="groups-stat" class="btn btn-link">Статистика по групах медикаментів</button>
                        </div>
                        <div class="filters-inner">
                            <button id="provs-stat" class="btn btn-link">Статистика по постачальниках</button>
                        </div>
                        <div class="filters-inner">
                            <button id="giv-stat" class="btn btn-link">Статистика по видачах</button>
                        </div>
                        <div class="filters-inner">
                            <button id="del-stat" class="btn btn-link">Інше</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="print-content" class="display-none">
    <div class='report-header'>
        <div class='report-name'>
            <div class='report-name-top'>
                КП Трускавецька міська лікарня
            </div>
            <div class='report-name-sep'></div>
        </div>
        <div class='report-code'>
            Код по ОКУД 0303010
        </div>
    </div>
    <div class='report-title'>Карточка складського обліку матеріалів</div>
    <div class='report-content-top'>
        <table border='1'>
            <tr>
                <th>№ групи</th>
                <th>Стелаж</th>
                <th>Полиця</th>
                <th>Тип одиниці</th>
                <th>Кількість при поставці</th>
                <th>Кількість одиниць</th>
                <th>Ціна за одиницю</th>
                <th>Загальна вартість</th>
            </tr>
            <tr>
                <td id='groupNO'></td>
                <td id='rack'></td>
                <td id='shelf'></td>
                <td id='type'></td>
                <td id='delAmount'></td>
                <td id='amount'></td>
                <td id='price'></td>
                <td id='total'></td>
            </tr>
        </table>
    </div>
    <div class='report-content-mid'>
        Найменування матеріалу <span id='underline-t'></span>
        <div id="info"></div>
    </div>
    <div id="tab-cont" class='report-content-bottom'>
        <table id="cont-table" border='1'>
            <tr>
                <th>Дата запису</th>
                <th>№ документа</th>
                <th>Від кого отримано/кому видано/причина</th>
                <th>Кількість</th>
                <th>Підпис</th>
            </tr>
        </table>
    </div>
</div>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/getInfoManager.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
<script type="text/javascript" src="../../frontend/assets/lib/jquery.print.js"></script>
</body>
</html>