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
{include "../../frontend/html/footer.tpl"}