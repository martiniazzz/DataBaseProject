<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\medManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca247efc8aaa0_13920498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '566d8d5dc813c8292dc01ffe3f699fea1d9f776c' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\medManagerPage.tpl',
      1 => 1554139107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5ca247efc8aaa0_13920498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['managerName']->value;?>

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
                                <button class="filter-btn" name="finished_groups">Показати закінчені групи</button>
                            </form>
                        </div>
                    </div>
                    <form id="form-holder" method="post" action="medManagerPage.php" name="form" accept-charset="UTF-8">
                        <input  id="search-input" class="input-field" name="prefix" value="<?php echo $_smarty_tpl->tpl_vars['input_val']->value;?>
">
                        <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Пошук</button>
                    </form>
                </div>
                <div class="search-content">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="med-name-n"><?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>
</div>
                                <div class="med-aval">Кількість: <?php echo $_smarty_tpl->tpl_vars['m']->value->getStorageAmount();?>
</div>
                                <div class="prov-e">
                                    <button id="update_prov" class="edit-btn" onclick="medPassVals(<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
,'<?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value->getProducer();?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value->getDesc();?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value->getUnitType();?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value->getUnitAmount();?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value->getTemp();?>
','<?php echo $_smarty_tpl->tpl_vars['m']->value->getUsabilityTerm();?>
')">Редагувати</button>
                                </div>
                                <form class="prov-d" method="post" action="medManagerPage.php" onsubmit="return sub_delete()">
                                    <input class="del_id" type="number" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
">
                                    <button class="delete-btn" type="submit" name="delete_med">Видалити</button>
                                </form>
                            </div>
                            <div class="med-info">
                                <div>Виробник: <?php echo $_smarty_tpl->tpl_vars['m']->value->getProducer();?>
</div>
                                <div>Опис: <?php echo $_smarty_tpl->tpl_vars['m']->value->getDesc();?>
</div>
                                <div>Тип видачі: <?php echo $_smarty_tpl->tpl_vars['m']->value->getUnitType();?>
</div>
                                <div class="separator"></div>
                                <div>Групи:</div>
                                    <div class="med-info-row">
                                        <?php echo $_smarty_tpl->tpl_vars['m']->value->getGroups();?>

                                    </div>
                            </div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
