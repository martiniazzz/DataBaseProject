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
            <div class="content-inner content-holder col-md-10">
                <div class="search-content">
                    <div class="filters">
                        <div class="filters-inner">
                            <form method="post" action="issuanceManagerPage.php">
                                <button type="submit" class="filter-btn" name="order_date">Впорядкувати за датою</button>
                            </form>
                        </div>
                        <div class="filters-inner">
                            <form method="post" action="issuanceManagerPage.php">
                                <label for="date_from">Від</label>
                                <input class="filter-btn" type="date" name="date_from">
                                <label for="date_to">До</label>
                                <input class="filter-btn" type="date" name="date_to">
                                <button type="submit" class="filter-btn" type="submit" name="date_search">Пошук</button>
                            </form>
                        </div>
                        <div class="filters-inner">
                            <form method="post" action="issuanceManagerPage.php">
                                <label for="resppersonsInp">Відповідальні особи</label>
                                <input placeholder="Відповідальні особи" list="resppersons" class="filter-btn" name="resppersonsInp" onkeydown="return false;">
                                <datalist id="resppersons">
                                    {foreach from=$resppersons item=m}
                                        <option name="{$m[1]}" value="{$m[0]}"></option>
                                    {/foreach}
                                </datalist>
                                <button class="filter-btn" type="submit" name="search_resp_p">Пошук</button>
                            </form>
                        </div>
                        <div class="filters-inner">
                            <form method="post" action="issuanceManagerPage.php">
                                <label for="managerInp">Відділення</label>
                                <input placeholder="Відділення" list="departs" class="filter-btn" name="departInp" onkeydown="return false;">
                                <datalist id="departs">
                                    {foreach from=$departs item=m}
                                        <option name="{$m}" value="{$m}"></option>
                                    {/foreach}
                                </datalist>
                                <button class="filter-btn" type="submit" name="search_depart">Пошук</button>
                            </form>
                        </div>
                    </div>
                    {if $table_content == []}
                        <div class="empty-giving-info">Видач немає</div>
                    {else}
                        {foreach from=$table_content item=m}
                            <div class="med-holder">
                                <div class="med-name">
                                    <div class="med-name-n">Видача №{$m->getId()} від {$m->getDate()}</div>
                                    <div class="med-m-aval">Статус: {$m->getStatus()}</div>
                                    {if {$m->getStatus()} == 'нове'}
                                        <form action="issuanceManagerPage.php" method="post">
                                            <input name="iss_id" value="{$m->getId()}" hidden>
                                            <button type="submit" name="change_status" class="med-st-change edit-btn">Опрацювати</button>
                                        </form>
                                    {/if}
                                </div>
                                <div class="med-info">
                                    <div class="">Для: {$m->getRespPerson()}</div>
                                    <div class="">На відділення: {$m->getDepart()}</div>
                                    {foreach from=$m->getGivenMed() item=g}
                                        <div class="med-info-row">
                                            <div>Найменування: {$g->getName()}</div>
                                            <div>Кількість: {$g->getAmount()}</div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        {/foreach}
                    {/if}
                </div>
            </div>
            <div class="content-inner  col-md-2">
                <div class="actions-holder">
                    <form method="post" action="issuanceManagerPage.php">
                        <button class="giving-action-btn" name="showAllG" type="submit">Усі</button>
                    </form>
                    <form method="post" action="issuanceManagerPage.php">
                        <button class="giving-action-btn" name="showOtrG" type="submit">Отримано</button>
                    </form>
                    <form method="post" action="issuanceManagerPage.php">
                        <button class="giving-action-btn" name="showOprG" type="submit">Опрацьовано</button>
                    </form>
                    <form method="post" action="issuanceManagerPage.php">
                        <button class="giving-action-btn" name="showNewG" type="submit">Нове</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}