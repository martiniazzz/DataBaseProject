<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Медикаменти</title>
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
                                <button id="sort-by-name-btn" class="btn btn-link">Упорядкувати за назвою</button>
                                <button id="sort-by-prod-btn" class="btn btn-link">Упорядкувати за виробником</button>
                            </div>
                            <div class="filters-inner">
                                <button id="show-with-finish-btn" class="btn btn-link">Показати із закінченими групами</button>
                                <button id="show-finished-btn" class="btn btn-link">Показати закінчені</button>
                            </div>
                            <br>
                            <div class="filters-inner">
                                <label for="lessN" class="text-muted">Медикаменти з кількістю менше за</label>
                                <input id="get-less-N" type="number" name="lessN" class="input-small">
                            </div>
                            <div class="filters-inner">
                                <button id="show-with-out" class="btn btn-link">Медикаменти з групами, у яких вийшов термін придатності</button>
                            </div>
                            <div class="filters-inner">
                                <button id="show-with-soon-out" class="btn btn-link">Медикаменти з групами, у яких скоро вийде термін придатності</button>
                            </div>
                        </div>
                    </div>
                    <div id="form-holder">
                        <input id="search-input" class="input-field" name="prefix">
                        <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Пошук</button>
                    </div>
                </div>
                <div id="container-box" class="search-content">
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form id="m-form" onsubmit="return false">
                        <div class="m-input-holder">
                            <div class="m-input-label">Найменування</div>
                            <input id="up_name" class="input-holder" type="text" name="name" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Виробник</div>
                            <input id="up_prod" class="input-holder" type="text" name="prod" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Тип одиниці</div>
                            <input id="up_type" class="input-holder" type="text" name="unittype" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Кількість одн. в упаковці</div>
                            <input id="up_am" class="input-holder" type="text" name="unitam" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Температура</div>
                            <input id="up_temp" class="input-holder" type="text" name="temp" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Термін придатності</div>
                            <input id="up_term" class="input-holder" type="text" name="usterm" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Опис</div>
                            <textarea id="up_desc" class="input-holder inp-hol-area" name="desc" placeholder=""></textarea>
                        </div>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input id="close" onclick="clear_btn()" type="reset" class="btn btn-danger clear-btn to-right" value="&times;">
                        <input id="up_sub" class="btn btn-success to-right" type="submit" name="submit_add" value="Додати">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/getMedicines.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
</body>
</html>