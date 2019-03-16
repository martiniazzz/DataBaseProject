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
            <div class="input-container">
                <form method="post" action="medManagerPage.php" name="form" accept-charset="UTF-8">
                    <input class="input-field" name="prefix" value="{$input_val}">
                    <button name="submit_btn" type="submit" class="input-btn">Search</button>
                </form>
            </div>
            <div class="table-holder">
                <div class="table-header border-shadow">
                    <div class="table-header-name table-header-cell">Назва</div>
                    <div class="table-header-type table-header-cell">Тип одиниці</div>
                    <div class="table-header-amount table-header-cell">Кількість</div>
                    <div class="table-header-more table-header-cell">
                    </div>
                </div>
                <div class="table-content">
                    {foreach from=$table_content item=m}
                        <div class="table-row">
                            <div class="table-cell-name table-cell">
                                {$m->getName()}
                            </div>
                            <div class="table-cell-type table-cell">{$m->getUnitType()}</div>
                            <div class="table-cell-amount table-cell">{$m->getStorageAmount()}</div>
                            <button onclick="showInfo('{$m->getProducer()} \n {$m->getDesc()}');showGroups('{$m->getGroups()}');" class="table-cell-more table-cell more-info-btn">і</button>
                         </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="nav col-md-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="get-more-title">Інформація</div>
                    <div id="info-holder" class="get-more-cont border-shadow">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="get-more-title">Групи</div>
                    <div id="groups-holder" class="get-more-cont border-shadow">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}