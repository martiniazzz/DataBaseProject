{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    {include "../../frontend/html/managerHeader.tpl"}
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-12">
                <div class="search-box">
                    <div>
                        <div class="filter-toggle"><button id="toggle-filters-btn" class="btn-expand">Фільтри</button></div>
                        <div class="filters">
                            <div class="filters-inner">
                                <button id="b-get-all" class="btn btn-success margin-around" name="showAllG" type="submit">Усі</button>
                                <button id="b-get-get"  class="btn btn-success margin-around" name="showOtrG" type="submit">Отримано</button>
                                <button id="b-get-proc"  class="btn btn-success margin-around" name="showOprG" type="submit">Опрацьовано</button>
                                <button id="b-get-new"  class="btn btn-success margin-around" name="showNewG" type="submit">Нове</button>
                            </div>

                            <div class="filters-inner">
                                <button id="sort-date-i" type="submit" class="btn btn-link" name="order_date">Впорядкувати за датою</button>
                            </div>
                            <div class="filters-inner"><b>Дата</b></div>
                            <div class="filters-inner">
                                <form onsubmit="return false;">
                                    <label for="date_from">Від</label>
                                    <input id="di-from" class="filter-btn-inp" type="date" name="date_from">
                                    <label for="date_to">До</label>
                                    <input id="di-to" class="filter-btn-inp" type="date" name="date_to">
                                    <button id="btn-date-i" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                            <div class="filters-inner">
                                <form onsubmit="return false;">
                                    <label for="resppersonsInp">Відповідальні особи</label>
                                    <input id="resp-s" placeholder="Відповідальні особи" list="resppersons" class="filter-btn-inp" name="resppersonsInp">
                                    <datalist id="resppersons"></datalist>
                                    <button id="get-resp-s" class="filter-btn" type="submit" name="search_resp_p">Пошук</button>
                                </form>
                            </div>
                            <div class="filters-inner">
                                <form onsubmit="return false;">
                                    <label for="managerInp">Відділення</label>
                                    <input id="deps-s" placeholder="Відділення" list="departs" class="filter-btn-inp" name="departInp">
                                    <datalist id="departs"></datalist>
                                    <button id="get-dep-s" class="filter-btn" type="submit" name="search_depart">Пошук</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-content">
                    <div class="empty-giving-info"></div>
                    <div id="container-box" class="search-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/getIssuanceManager.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
</body>
</html>