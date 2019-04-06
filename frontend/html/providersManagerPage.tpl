<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Постачальники</title>
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
                                <button id="sort_name" class="btn btn-link" name="sort_by_name">Упорядкувати за назвою</button>
                                <button id="sort_address" class="btn btn-link" name="sort_by_address">Упорядкувати за адресою</button>
                            </div>
                            <div class="filters-inner">
                                <input id="c_val" class="filter-btn-inp" list="countries" placeholder="Усі країни">
                                <datalist id="countries"></datalist>
                                <input id="cc_val" class="filter-btn-inp" list="cities" placeholder="Усі міста">
                                <datalist id="cities"></datalist>
                                <button id="c_search" type="submit" name="search_cc" class="filter-btn">Пошук</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="container-box" class="search-content">
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form id="p-form" onsubmit="return false;">
                        <div class="m-input-holder">
                            <div class="m-input-label">Компанія</div>
                            <input id="up_name" class="input-holder" type="text" name="name">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Країна</div>
                            <input id="up_co" class="input-holder" type="text" name="country">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Місто</div>
                            <input id="up_ci" class="input-holder" type="text" name="city">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Вулиця</div>
                            <input id="up_st" class="input-holder" type="text" name="street">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Будинок</div>
                            <input id="up_bu" class="input-holder" type="text" name="build">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Рахунок</div>
                            <input id="up_ac" class="input-holder" type="text" name="account">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">@</div>
                            <input id="up_em" class="input-holder" type="text" name="email">
                        </div>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input id="close" onclick="clear_btn()" type="reset" class="btn btn-danger clear-btn to-right" value="&times;">
                        <input id="up_sub" class="btn btn-success to-right" type="button" name="submit_add" value="Додати">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPhoneM" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input id="phone_holder" type="text" class="form-control validate" name="phone" placeholder="Телефон">
                </div>
                <div class="modal-footer">
                    <input id="phone_add_pid" name="provid" hidden>
                    <button id="add_phone_p" type="submit" data-dismiss="modal" class="btn btn-default" name="add_phone_b">Зберегти</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Підтвердіть видалення!</h4>
                    <h5><strong>Увага!</strong> Дану дію неможливо буде скасувати!</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal-btn-si">Підтвердити</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no">&times;</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/getProviders.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
</body>
</html>