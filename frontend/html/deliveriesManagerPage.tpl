{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                {$managerName}
            </div>
            <div class="account-exit">
                <a href="logout.php">Вийти</a>
            </div>
            <div class="account-giving">
                <a href="mainManagerPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-content">
                    <div class="filters">
                        <div class="filters-inner">
                            <form action="deliveriesManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_date">Упорядкувати за датою</button>
                            </form>
                        </div>
                        <div class="filters-inner"><b>Вартість</b></div>
                        <div class="filters-inner">
                            <form method="post" action="deliveriesManagerPage.php">
                                <label for="date_from">Від</label>
                                <input class="filter-btn" type="number" name="p_from">
                                <label for="date_to">До</label>
                                <input class="filter-btn" type="number" name="p_to">
                                <button type="submit" class="filter-btn" type="submit" name="price_search">Пошук</button>
                            </form>
                        </div>
                        <div class="filters-inner"><b>Дата</b></div>
                        <div class="filters-inner">
                            <form method="post" action="deliveriesManagerPage.php">
                                <label for="date_from">Від</label>
                                <input class="filter-btn" type="date" name="d_from">
                                <label for="date_to">До</label>
                                <input class="filter-btn" type="date" name="d_to">
                                <button type="submit" class="filter-btn" type="submit" name="date_search">Пошук</button>
                            </form>
                        </div>
                        <div class="filters-inner">
                            <form method="post" action="deliveriesManagerPage.php">
                                <label for="provss">Постачальники</label>
                                <input placeholder="Постачальники" list="providers" id="provs_list_inp" class="filter-btn" name="provss" onkeydown="return false;">
                                <datalist id="providers">
                                    {foreach from=$provs_list_inp item=m}
                                        <option name="{$m->getId()}" value="{$m->getName()}"></option>
                                    {/foreach}
                                </datalist>
                                <button class="filter-btn" type="submit" name="search_provs">Пошук</button>
                            </form>
                        </div>
                    </div>
                    {foreach from=$del_vals item=v}
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="med-name-n">Поставка №{$v->getId()} від {$v->getDate()}</div>
                                <div class="prov-e">
                                    <button id="update_prov" class="edit-btn" onclick="deliv_pass_values('{$v->getId()}','{$v->getDate()}','{$v->getIdprov()}')">Редагувати</button>
                                </div>
                                <div class="prov-e">
                                    <form action="deliveriesManagerPage.php" method="post">
                                        <input name="delid" value="{$v->getId()}" hidden>
                                         <button name="add_group" class="add-btn">Групи</button>
                                    </form>

                                </div>
                            </div>
                            <div class="med-info">
                                <div>Вартість: {$v->getTotal()}</div>
                                <div>Постачальник: {$v->getIdprov()}</div>
                                <div>Отримав: {$v->getIdman()}</div>
                                {*<div class="separator"></div>*}
                                {*<div>Дані про групи: </div>*}
                                {*<div>{$v->getGroups()}</div>*}
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form method="post" action="deliveriesManagerPage.php" id="form">
                    <input id="up_idp" class="input-holder" type="text" name="id" placeholder="Номер накладної">
                    <input id="up_date" class="input-holder" type="date" name="date" placeholder="Дата">
                    <div class="giving-content">
                        <input id="up_prov" class="input-holder" list="provs" name="name" type="text" placeholder="Постачальник">
                        <datalist id="provs">
                            {foreach from=$provs_list item=m}
                                <option name="{$m->getId()}" value="{$m->getId()}">{$m->getName()}</option>
                            {/foreach}
                        </datalist>
                    </div>
                    <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                    <button id="up_sub" class="add-btn to-right" name="submit_add">Додати</button>
                </form>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}