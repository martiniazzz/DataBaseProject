{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                {$respPersonName}
            </div>
            <div class="account-giving">
                <a href="respPersonPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-10">
                <div class="search-content">
                    {if $table_content == []}
                        <div class="empty-giving-info">Видач немає</div>
                    {else}
                        {foreach from=$table_content item=m}
                            <div class="med-holder">
                                <div class="med-name">
                                    <div class="med-name-n">Видача №{$m->getId()} від {$m->getDate()}</div>
                                    <div class="med-aval">Статус: {$m->getStatus()}</div>
                                    {if {$m->getStatus()} == 'опрацьовано'}
                                        <form action="respPersonGivingsPage.php" method="post">
                                            <input name="iss_id" value="{$m->getId()}" hidden>
                                            <button type="submit" name="change_status" class="med-st-change edit-btn">Забрати</button>
                                        </form>
                                    {/if}
                                </div>
                                <div class="med-info">
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
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showAllG" type="submit">Усі</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showOtrG" type="submit">Отримано</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showOprG" type="submit">Опрацьовано</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showNewG" type="submit">Нове</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}