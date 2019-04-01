<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\writeoffManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9f82247cb0f0_77965793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08e383c35b1f140b27f4590bf81c155c2a1af022' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\writeoffManagerPage.tpl',
      1 => 1553957410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c9f82247cb0f0_77965793 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <?php if ($_smarty_tpl->tpl_vars['table_content']->value == array()) {?>
                        <div class="empty-giving-info">Списань немає</div>
                    <?php } else { ?>
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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                            <div class="med-holder">
                                <div class="med-name">
                                    <div class="med-name-n">Списання №<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
 від <?php echo $_smarty_tpl->tpl_vars['m']->value->getDate();?>
</div>
                                </div>
                                <div class="med-info">
                                    <div>Номер групи: <?php echo $_smarty_tpl->tpl_vars['m']->value->getIdGroup();?>
</div>
                                    <div>Кількість: <?php echo $_smarty_tpl->tpl_vars['m']->value->getAmount();?>
</div>
                                    <div>Причина: <?php echo $_smarty_tpl->tpl_vars['m']->value->getReason();?>
</div>
                                </div>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form method="post" action="writeoffManagerPage.php" id="form" onsubmit="return addWriteOff()">
                    <input id="up_prov" class="input-holder" list="groups" name="name" type="text" placeholder="Група">
                    <datalist id="groups">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups_list']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                            <option name="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>
 (Макс.:<?php echo $_smarty_tpl->tpl_vars['m']->value->getMax();?>
)"></option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
