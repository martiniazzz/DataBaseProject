{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    {include "../../frontend/html/managerHeader.tpl"}
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-6 table-header-cell">Назва</div>
                    <div class="col-md-3 table-header-cell"></div>
                    <div class="col-md-3 table-header-cell"></div>
                </div>
                <div class="table-content">
                    {foreach from=$prov_vals item=v}
                        <div class="row table-row">
                            <div class="col-md-6 table-cell">{$v->getName()}</div>
                            <div class="table-cell col-md-3">
                                <button id="update_prov" class="edit-btn" onclick="pass_values({$v->getId()},'{$v->getName()}','{$v->getCountry()}','{$v->getCity()}','{$v->getStreet()}','{$v->getBuildNo()}','{$v->getAccount()}','{$v->getEmail()}')">Редагувати</button>
                            </div>
                            <form class="col-md-3 table-cell" method="post" action="providersManagerPage.php" onsubmit="return sub_delete()">
                                <input class="del_id" type="number" name="id" value="{$v->getId()}">
                                <button class="delete-btn" type="submit" name="delete_prov">Видалити</button>
                            </form>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="table-navigation col-md-4">
            <div id="update_prov_div" class="center">
                <form method="post" action="providersManagerPage.php" id="form">
                    <input id="up_name" class="input-holder" type="text" name="name" placeholder="Company">
                    <input id="up_co" class="input-holder" type="text" name="country" placeholder="Country">
                    <input id="up_ci" class="input-holder" type="text" name="city" placeholder="City">
                    <input id="up_st" class="input-holder" type="text" name="street" placeholder="Street">
                    <input id="up_bu" class="input-holder" type="text" name="build" placeholder="Build">
                    <input id="up_ac" class="input-holder" type="text" name="account" placeholder="Account">
                    <input id="up_em" class="input-holder" type="text" name="email" placeholder="Email">
                    <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                    <input id="up_sub" class="add-btn" type="submit" name="submit_add" value="Додати">
                    <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn" value="&times;">
                </form>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}