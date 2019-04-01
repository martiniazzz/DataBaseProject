<div class="input-container">
    <form method="post" action="respPersonPage.php" name="form" accept-charset="UTF-8">
        <input  id="search-input" class="input-field" name="prefix" value="{$input_val}">
        <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Search</button>
    </form>
</div>
<div class="table-holder">
    <div class="table-header border-shadow">
        <div class="table-header-name table-header-cell">Назва</div>
        <div class="table-header-type table-header-cell">Тип</div>
        <div class="table-header-amount table-header-cell">Доступна кількість</div>
        <div class="table-header-more table-header-cell">

        </div>
        <div class="table-header-more table-header-cell">

        </div>
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
                <button onclick="showInfo('{$m->getProducer()} \n {$m->getDesc()}')" class="table-cell-more table-cell more-info-btn">і</button>
                <button onclick="addItem('{$m->getId()}','{$m->getName()}',{$m->getStorageAmount()})" class="table-cell-more table-cell more-info-btn">+</button>
                <button onclick="removeItem('{$m->getId()}','{$m->getName()}')" class="table-cell-more table-cell more-info-btn">-</button>
            </div>
        {/foreach}
    </div>
</div>

<div>
    <div class="get-more-title">Інформація</div>
    <div id="info-holder" class="get-more-cont border-shadow">
    </div>
</div>
<div>
    <div class="giving-title">Видача</div>
    <div class="giving-holder">
        <div id="giving-cont">
        </div>
        <form method="post" action="respPersonGivingsPage.php" onsubmit="return createGiving()">
            <input name="dataI" value="" id="issue-data">
            <button type="submit" name="newIssuance" id="giving-btn" class="input-btn">Створити видачу</button>
        </form>
    </div>
</div>
