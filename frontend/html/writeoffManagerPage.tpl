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
                    {if $table_content == []}
                        <div class="empty-giving-info">Списань немає</div>
                    {else}
                        <div class="filters">
                            <div class="filters-inner">
                                <form method="post" action="writeoffManagerPage.php">
                                    <button type="submit" class="filter-btn" name="date_order">Упорядкувати за датою</button>
                                </form>
                            </div>
                            <div class="filters-inner">
                                <form method="post" action="writeoffManagerPage.php">
                                    <label for="date_from">Від</label>
                                    <input class="filter-btn" type="date" name="date_from">
                                    <label for="date_to">До</label>
                                    <input class="filter-btn" type="date" name="date_to">
                                    <button type="submit" class="filter-btn" type="submit" name="date_search">Пошук</button>
                                </form>
                            </div>
                        </div>
                        {foreach from=$table_content item=m}
                            <div class="med-holder">
                                <div class="med-name">
                                    <div class="med-name-n">Списання №{$m->getId()} від {$m->getDate()}</div>
                                </div>
                                <div class="med-info">
                                    <div>Номер групи: {$m->getIdGroup()}</div>
                                    <div>Кількість: {$m->getAmount()}</div>
                                    <div>Причина: {$m->getReason()}</div>
                                </div>
                            </div>
                        {/foreach}
                    {/if}
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form method="post" action="writeoffManagerPage.php" id="form" onsubmit="return addWriteOff()">
                    <input id="up_prov" class="input-holder" list="groups" name="name" type="text" placeholder="Група">
                    <datalist id="groups">
                        {foreach from=$groups_list item=m}
                            <option name="{$m->getId()}" value="{$m->getId()} {$m->getName()} (Макс.:{$m->getMax()})"></option>
                        {/foreach}
                    </datalist>
                    <input id="up_date" class="input-holder" type="date" name="date" placeholder="Дата">
                    <input id="up_am" class="input-holder" type="number" min="1" name="amount" placeholder="Кількість">
                    <input id="up_re" onkeydown="return false" class="input-holder" list="reasons" type="text"  name="reason" placeholder="Причина">
                    <datalist id="reasons">
                        <option name="bad_deliv" value="Зіпсовано при поставці"></option>
                        <option name="out_of_date" value="Прострочено"></option>
                    </datalist>
                    <input id="up_sh" class="input-holder" type="number" min="1" name="shelf" placeholder="Полиця">
                    <input id="up_ra" class="input-holder" type="number" min="1" name="rack" placeholder="Стелаж">
                    <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                    <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                    <input id="up_sub" class="add-btn to-right" type="submit" name="submit_add" value="Додати">
                </form>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}