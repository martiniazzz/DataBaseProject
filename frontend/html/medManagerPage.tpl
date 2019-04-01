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
            <div class="content-inner content-holder col-md-12">
                <div class="search-box">
                    <form id="form-holder" method="post" action="medManagerPage.php" name="form" accept-charset="UTF-8">
                        <input  id="search-input" class="input-field" name="prefix" value="{$input_val}">
                        <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Пошук</button>
                    </form>
                </div>
                <div class="search-content">
                    {foreach from=$table_content item=m}
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="med-name-n">{$m->getName()}</div>
                                <div class="med-aval">Кількість: {$m->getStorageAmount()}</div>
                            </div>
                            <div class="med-info">
                                <div>Виробник: {$m->getProducer()}</div>
                                <div>Опис: {$m->getDesc()}</div>
                                <div>Тип видачі: {$m->getUnitType()}</div>
                                <div class="separator"></div>
                                <div>Групи:</div>
                                    <div class="med-info-row">
                                        {$m->getGroups()}
                                    </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}