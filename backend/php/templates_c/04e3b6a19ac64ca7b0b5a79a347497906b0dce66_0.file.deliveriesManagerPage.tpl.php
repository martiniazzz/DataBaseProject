<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\deliveriesManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9fa59fa45d31_40860228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04e3b6a19ac64ca7b0b5a79a347497906b0dce66' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\deliveriesManagerPage.tpl',
      1 => 1553966492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c9fa59fa45d31_40860228 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="search-content">
                    <div class="filters">
                        <div class="filters-inner">
                            <form action="deliveriesManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_date">Упорядкувати за датою</button>
                            </form>
                        </div>
                        <div class="filters-inner"><b>Вартість</b></div>
                        <div class="filters-inner">
                            <form method="post" action="deliveriesManagerPage.php">
                                <label for="date_from">Від</label>
                                <input class="filter-btn" type="number" name="p_from">
                                <label for="date_to">До</label>
                                <input class="filter-btn" type="number" name="p_to">
                                <button type="submit" class="filter-btn" type="submit" name="price_search">Пошук</button>
                            </form>
                        </div>
                        <div class="filters-inner"><b>Дата</b></div>
                        <div class="filters-inner">
                            <form method="post" action="deliveriesManagerPage.php">
                                <label for="date_from">Від</label>
                                <input class="filter-btn" type="date" name="d_from">
                                <label for="date_to">До</label>
                                <input class="filter-btn" type="date" name="d_to">
                                <button type="submit" class="filter-btn" type="submit" name="date_search">Пошук</button>
                            </form>
                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['del_vals']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="med-name-n">Поставка №<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
 від <?php echo $_smarty_tpl->tpl_vars['v']->value->getDate();?>
</div>
                                <div class="prov-e">
                                    <button id="update_prov" class="edit-btn" onclick="deliv_pass_values('<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getDate();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getIdprov();?>
')">Редагувати</button>
                                </div>
                            </div>
                            <div class="med-info">
                                <div>Вартість: <?php echo $_smarty_tpl->tpl_vars['v']->value->getTotal();?>
</div>
                                <div>Постачальник: <?php echo $_smarty_tpl->tpl_vars['v']->value->getIdprov();?>
</div>
                                <div>Отримав: <?php echo $_smarty_tpl->tpl_vars['v']->value->getIdman();?>
</div>
                                <div class="separator"></div>
                                <div>Дані про групи: </div>
                                <div><?php echo $_smarty_tpl->tpl_vars['v']->value->getGroups();?>
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
                <form method="post" action="deliveriesManagerPage.php" id="form">
                    <input id="up_idp" class="input-holder" type="text" name="id" placeholder="Номер накладної">
                    <input id="up_date" class="input-holder" type="text" name="date" placeholder="Дата">
                    <div class="giving-content">
                        <input id="up_prov" class="input-holder" list="provs" name="name" type="text" placeholder="Постачальник">
                        <datalist id="provs">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['provs_list']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                                <option name="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>
"></option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </datalist>
                    </div>
                    <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                    <button id="up_sub" class="add-btn to-right" name="submit_add">Додати</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
