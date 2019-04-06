{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <div class="header">
            <img id="logout-img" class="img-header" src="../../frontend/assets/images/exit.png">
            <div class="ver-separator"></div>
            <div class="account-name">
                Адміністратор
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                {foreach from=$users item=m}
                    <div class="med-holder">
                        <div class="med-name">
                            <div class="med-name-n">{$m->getId()} : {$m->toString()} : {$m->getDep()}</div>
                            {*<form action="adminPage.php" method="post" onsubmit="return confirmDelete()">*}
                                {*<input name="id" value="{$m->getId()}" hidden>*}
                                {*<button type="submit" name="delete" class="med-st-change delete-btn">Видалити</button>*}
                            {*</form>*}
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form method="post" action="adminPage.php" id="form">
                    <input type="radio" name="type" value="manager" checked onclick="handleClick(this);"> Завідувач
                    <input type="radio" name="type" value="respperson" onclick="handleClick(this);"> Відповідальна особа
                    <input class="input-holder" type="text" name="id" placeholder="ID">
                    <input class="input-holder" type="text" name="lname" placeholder="Прізвище">
                    <input class="input-holder" type="text" name="fname" placeholder="Імя">
                    <input class="input-holder" type="text" name="mname" placeholder="По-батькові">
                    <input id="depart" class="input-holder" type="text" name="dep" placeholder="Відділ">
                    <input class="input-holder" type="text" name="password" placeholder="Пароль">
                    <button class="btn btn-success to-right" name="submit_add">Додати</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/respPersonPage.js"></script>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
</body>
</html>