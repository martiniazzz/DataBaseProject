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
            <div class="account-giving">
                <a href="deliveriesManagerPage.php">До поставок</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="deliv_head">Поставка №{$id}</div>
                <div class="deliv_holder">
                    {foreach from=$groups_list item=g}
                        <div class="deliv_inner">
                            <div class="deliv_inner-inner">Номер групи: {$g->getId()} ({$g->getIdMedicine()})</div>
                            <div class="deliv_inner-inner">Полиця: {$g->getShelf()}</div>
                            <div class="deliv_inner-inner">Стелаж: {$g->getRack()}</div>
                            <div class="deliv_inner-inner">Дата виготовлення: {$g->getProductDate()}</div>
                            <div class="deliv_inner-inner">Термін придатності: {$g->getDueTo()}</div>
                            <div class="deliv_inner-inner">Кількість упаковок в поставці:{$g->getDelPackAmount()}</div>
                            <div class="deliv_inner-inner">Кількість одиниць на складі: {$g->getStorageUnitAmount()}</div>
                            <div class="deliv_inner-inner">Ціна за упаковку: {$g->getPricePerPack()}</div>
                            <div class="deliv_inner-inner">Загальна вартість: {$g->getTotalPrice()}</div>
                            <button class="edit-btn edit-group" onclick="passGroupVals({$g->getId()},{$g->getShelf()},{$g->getRack()},'{$g->getProductDate()}',{$g->getDelPackAmount()},{$g->getPricePerPack()},'{$g->getIdMedicine()}')">Редагувати</button>
                        </div>
                    {/foreach}
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form method="post" action="addGroupsManagerPage.php" id="form">
                        <input id="up_sh" class="input-holder" type="text" name="shelf" placeholder="Полиця">
                        <input id="up_ra" class="input-holder" type="text" name="rack" placeholder="Стелаж">
                        <input id="up_date" class="input-holder" type="date" name="pdate" placeholder="Дата виготовлення">
                        <input id="up_am" class="input-holder" type="text" name="amount" placeholder="Кількість в поставці">
                        <input id="up_pr" class="input-holder" type="text" name="price" placeholder="Ціна за одиницю">
                        <input id="up_med" class="input-holder" list="meds" name="med" type="text" placeholder="Медикамент">
                        <datalist id="meds">
                            {foreach from=$meds_list item=m}
                                <option name="{$m->getId()}" value="{$m->getId()}">{$m->getName()}</option>
                            {/foreach}
                        </datalist>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input name="delid" value="{$id}" hidden>
                        <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                        <input id="up_sub" class="add-btn to-right" type="submit" name="submit_add" value="Додати">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}