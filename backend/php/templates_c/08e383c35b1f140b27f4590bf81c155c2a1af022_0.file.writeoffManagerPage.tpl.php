<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\writeoffManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4faaa8fc06_32919580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08e383c35b1f140b27f4590bf81c155c2a1af022' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\writeoffManagerPage.tpl',
      1 => 1552764798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c8d4faaa8fc06_32919580 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-3 table-header-cell">Номер списання</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-3 table-header-cell">Кількість</div>
                    <div class="col-md-3 table-header-cell">Причина</div>
                    <div class="col-md-3 table-header-cell">Група</div>
                </div>
                <div class="table-content">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                        <div class="row table-row">
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getDate();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getAmount();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getReason();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getIdGroup();?>
</div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
