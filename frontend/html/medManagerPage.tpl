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
                <div class="search-box">
                    <div class="filters">
                        <div class="filters-inner">
                            <form action="medManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_name">Упорядкувати за назвою</button>
                            </form>
                            <form action="medManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_prod">Упорядкувати за виробником</button>
                            </form>
                            <form action="medManagerPage.php" method="post">
                                <button class="filter-btn" name="finished_groups">Показати із закінченими групами</button>
                            </form>
                            <form action="medManagerPage.php" method="post">
                                <button class="filter-btn" name="finished_full">Показати закінчені</button>
                            </form>
                        </div>
                    </div>
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
                                <div class="prov-e">
                                    <button id="update_prov" class="edit-btn" onclick="medPassVals({$m->getId()},'{$m->getName()}','{$m->getProducer()}','{$m->getDesc()}','{$m->getUnitType()}','{$m->getUnitAmount()}','{$m->getTemp()}','{$m->getUsabilityTerm()}')">Редагувати</button>
                                </div>
                                <form class="prov-d" method="post" action="medManagerPage.php" onsubmit="return sub_delete()">
                                    <input class="del_id" type="number" name="id" value="{$m->getId()}">
                                    <button class="delete-btn" type="submit" name="delete_med">Видалити</button>
                                </form>
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
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form method="post" action="medManagerPage.php" id="form">
                        <input id="up_name" class="input-holder" type="text" name="name" placeholder="Найменування">
                        <input id="up_prod" class="input-holder" type="text" name="prod" placeholder="Виробник">
                        <input id="up_type" class="input-holder" type="text" name="unittype" placeholder="Тип одиниці">
                        <input id="up_am" class="input-holder" type="text" name="unitam" placeholder="Кількість одн. в упаковці">
                        <input id="up_temp" class="input-holder" type="text" name="temp" placeholder="Температура">
                        <input id="up_term" class="input-holder" type="text" name="usterm" placeholder="Термін придатності">
                        <textarea id="up_desc" class="input-holder" name="desc" placeholder="Опис"></textarea>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                        <input id="up_sub" class="add-btn to-right" type="submit" name="submit_add" value="Додати">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}