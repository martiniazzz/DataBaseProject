{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                {$respPersonName}
            </div>
            <div class="account-exit">
                <a href="logout.php">Вийти</a>
            </div>
            <div class="account-giving">
                <a href="respPersonGivingsPage.php">Мої видачі</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-box">
                    <form id="form-holder" method="post" action="respPersonPage.php" name="form" accept-charset="UTF-8">
                        <input  id="search-input" class="input-field" name="prefix" value="{$input_val}">
                        <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Пошук</button>
                    </form>
                </div>
                <div class="search-content">
                    {foreach from=$table_content item=m}
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="med-name-n">{$m->getName()}</div>
                                <div class="med-aval">Доступно: {$m->getStorageAmount()}</div>
                            </div>
                            <div class="med-info">
                                <div>Виробник: {$m->getProducer()}</div>
                                <div>Опис: {$m->getDesc()}</div>
                                <div>Тип видачі: {$m->getUnitType()}</div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div class="giving-title">Видача</div>
                <div class="separator"></div>
                <div class="giving-content">
                    <input id="giving-search" list="medicines" name="default" placeholder="Виберіть медикамент" />
                    <datalist id="medicines">
                        {foreach from=$table_content item=m}
                            {if {$m->getStorageAmount()} != 0}
                                <option name="{$m->getId()}" data-max="{$m->getStorageAmount()}" value="{$m->getName()}"></option>
                            {/if}
                        {/foreach}
                    </datalist>
                    <button id="giving-add">Додати</button>
                </div>
                <div id="giving-inner"></div>
                <div class="separator"></div>
                <form method="post" action="respPersonPage.php" onsubmit="return createGiving()">
                    <input id="issue-data" name="dataI" value="" hidden>
                    <button name="newIssuance" type="submit" id="giving-create">Створити</button>
                </form>

            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}