<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Поставки</title>
    <link href="../../frontend/css/pages.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page-holder">
    {include "../../frontend/html/managerHeader.tpl"}
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-box">
                    <div>
                        <div class="filter-toggle"><button id="toggle-filters-btn" class="btn-expand">Фільтри</button></div>
                        <div class="filters">
                            <div class="filters-inner">
                                <button id="date-order" class="btn btn-link" name="sort_by_date">Упорядкувати за датою</button>
                            </div>
                            <div class="filters-inner"><b>Вартість</b></div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="date_from">Від</label>
                                    <input id="pr-from" class="filter-btn-inp" type="number">
                                    <label for="date_to">До</label>
                                    <input id="pr-to" class="filter-btn-inp" type="number">
                                    <button id="pricesLimit" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                            <div class="filters-inner"><b>Дата</b></div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="date_from">Від</label>
                                    <input id="d-from" class="filter-btn-inp" type="date">
                                    <label for="date_to">До</label>
                                    <input id="d-to" class="filter-btn-inp" type="date">
                                    <button id="datesLimit" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="provss">Постачальники</label>
                                    <input id="s-prov" placeholder="Постачальники" list="providers" id="provs_list_inp" class="filter-btn-inp" name="provss">
                                    <datalist id="providers"></datalist>
                                    <button id="provSearch" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="container-box" class="search-content">
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form id="d-form" onsubmit="return false;">
                    <div class="m-input-holder">
                        <div class="m-input-label">Накладна №</div>
                        <input id="up_idp" class="input-holder" type="text" name="id">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Дата</div>
                        <input id="up_date" class="input-holder" type="date" name="date">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Постачальник</div>
                        <input id="up_prov" class="input-holder" list="provs" name="name" type="text">
                        <datalist id="provs"></datalist>
                    </div>
                    <input id="close" onclick="clear_btn()" type="reset" class="btn btn-danger clear-btn to-right" value="&times;">
                    <button id="up_sub" class="btn btn-success to-right" name="submit_add">Додати</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/getDeliveries.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
</body>
</html>