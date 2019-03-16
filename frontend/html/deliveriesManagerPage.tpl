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
    <div class="content row">
        <div class="content-inner col-md-9">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-2 table-header-cell">Поставка</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-2 table-header-cell">Ціна</div>
                    <div class="col-md-3 table-header-cell">Постачальник</div>
                    <div class="col-md-2 table-header-cell">Менеджер</div>
                </div>
                <div class="table-content">
                    <div class="table-content">
                        {foreach from=$del_vals item=v}
                            <div class="row table-row">
                                <div class="col-md-2 table-cell">{$v->getId()}</div>
                                <div class="col-md-3 table-cell">{$v->getDate()}</div>
                                <div class="col-md-2 table-cell">{$v->getTotal()}</div>
                                <div class="col-md-3 table-cell">{$v->getIdprov()}</div>
                                <div class="col-md-2 table-cell">{$v->getIdman()}</div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
        <div class="table-navigation col-md-3">
            <div id="update_prov_div" class="center">

            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}