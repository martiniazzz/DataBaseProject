{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    {include "../../frontend/html/managerHeader.tpl"}
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-content">
                    <div class="filters">
                        <div class="filters-inner">
                            <form action="providersManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_name">Упорядкувати за назвою</button>
                            </form>
                            <form action="providersManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_address">Упорядкувати за адресою</button>
                            </form>
                        </div>
                        <div class="filters-inner">
                            <form method="post" action="providersManagerPage.php">
                                <input class="filter-btn" list="countries" name="country_def" placeholder="Усі країни" onkeydown="return false;">
                                <datalist id="countries">
                                    {foreach from=$countries item=v}
                                        <option name="{$v}" value="{$v}"></option>
                                    {/foreach}
                                </datalist>
                                <input class="filter-btn" list="cities" name="city_def" placeholder="Усі міста" onkeydown="return false;">
                                <datalist id="cities">
                                    {foreach from=$cities item=v}
                                        <option name="{$v}" value="{$v}"></option>
                                    {/foreach}
                                </datalist>
                                <button type="submit" name="search_cc" class="filter-btn">Пошук</button>
                            </form>
                        </div>
                    </div>
                    {foreach from=$prov_vals item=v}
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="prov-n">{$v->getName()}</div>
                                <div class="prov-a">
                                    <button onclick="passForPhone({$v->getId()})" id="add_phone" class="add-btn" data-toggle="modal" data-target="#addPhoneM">Додати телефон</button>
                                </div>
                                <div class="prov-e">
                                    <button id="update_prov" class="edit-btn" onclick="pass_values({$v->getId()},'{$v->getName()}','{$v->getCountry()}','{$v->getCity()}','{$v->getStreet()}','{$v->getBuildNo()}','{$v->getAccount()}','{$v->getEmail()}')">Редагувати</button>
                                </div>
                                <form class="prov-d" method="post" action="providersManagerPage.php" onsubmit="return sub_delete()">
                                    <input class="del_id" type="number" name="id" value="{$v->getId()}">
                                    <button class="delete-btn" type="submit" name="delete_prov">Видалити</button>
                                </form>
                            </div>
                            <div class="med-info">
                                <div>Країна: {$v->getCountry()}</div>
                                <div>Місто: {$v->getCity()}</div>
                                <div>Адреса: {$v->getStreet()}, {$v->getBuildNo()}</div>
                                <div>Номер рахунку:  {$v->getAccount()}</div>
                                <div>Email:  {$v->getEmail()}</div>
                                <div>Телефони:</div>
                                <div>
                                    {foreach from=$v->getPhones() item=t}
                                        <div class="phone_holder">
                                            <div class="phone_holder_inner">{$t}</div>
                                            <form class="phone_holder_inner" method="post" action="providersManagerPage.php">
                                                <input name="pval" value="{$t}" hidden>
                                                <button type="submit" name="del_phone" class="delete-btn">Видалити</button>
                                            </form>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form method="post" action="providersManagerPage.php" id="form">
                        <input id="up_name" class="input-holder" type="text" name="name" placeholder="Company">
                        <input id="up_co" class="input-holder" type="text" name="country" placeholder="Country">
                        <input id="up_ci" class="input-holder" type="text" name="city" placeholder="City">
                        <input id="up_st" class="input-holder" type="text" name="street" placeholder="Street">
                        <input id="up_bu" class="input-holder" type="text" name="build" placeholder="Build">
                        <input id="up_ac" class="input-holder" type="text" name="account" placeholder="Account">
                        <input id="up_em" class="input-holder" type="text" name="email" placeholder="Email">
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                        <input id="up_sub" class="add-btn to-right" type="submit" name="submit_add" value="Додати">
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
                    <form action="providersManagerPage.php" method="post" onsubmit="return validatePhone()">
                        <input id="phone_add_pid" name="provid" hidden>
                        <input id="phone_add_phone" name="phoneval" hidden>
                        <button type="submit" class="btn btn-default" name="add_phone_b">Зберегти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
{include "../../frontend/html/footer.tpl"}