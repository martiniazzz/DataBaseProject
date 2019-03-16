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
                    <div class="col-md-3 table-header-cell">Номер видачі</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-3 table-header-cell">Кому</div>
                    <div class="col-md-3 table-header-cell">Статус</div>
                    <div class="col-md-3 table-header-cell">Детальніше</div>
                </div>
                <div class="table-content">
                    {foreach from=$table_content item=m}
                        <div class="row table-row">
                            <div class="col-md-3 table-cell">{$m->getId()}</div>
                            <div class="col-md-3 table-cell">{$m->getDate()}</div>
                            <div class="col-md-3 table-cell">{$m->getRespPerson()}</div>
                            <div class="col-md-3 table-cell">{$m->getStatus()}</div>
                            <button onclick="showInfo_G('{$m->getGivenMed()}')" class="col-md-3 table-cell">+</button>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="content-inner col-md-4">
            <div>
                <div class="get-more-title">More info</div>
                <div id="info-holder" class="get-more-cont border-shadow">
                </div>
            </div>
            <div class="actions-holder">
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showAllG" type="submit">Усі</button>
                </form>
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showOtrG" type="submit">Отримано</button>
                </form>
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showOprG" type="submit">Опрацьовано</button>
                </form>
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showNewG" type="submit">Нове</button>
                </form>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}