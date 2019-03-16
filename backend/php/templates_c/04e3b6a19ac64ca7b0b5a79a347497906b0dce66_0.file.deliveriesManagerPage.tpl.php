<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\deliveriesManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4f9e3a29a8_74951546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04e3b6a19ac64ca7b0b5a79a347497906b0dce66' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\deliveriesManagerPage.tpl',
      1 => 1552764822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c8d4f9e3a29a8_74951546 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="content-inner col-md-9">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-2 table-header-cell">Поставка</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-2 table-header-cell">Ціна</div>
                    <div class="col-md-3 table-header-cell">Постачальник</div>
                    <div class="col-md-2 table-header-cell">Менеджер</div>
                </div>
                <div class="table-content">
                    <div class="table-content">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['del_vals']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                            <div class="row table-row">
                                <div class="col-md-2 table-cell"><?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
</div>
                                <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['v']->value->getDate();?>
</div>
                                <div class="col-md-2 table-cell"><?php echo $_smarty_tpl->tpl_vars['v']->value->getTotal();?>
</div>
                                <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['v']->value->getIdprov();?>
</div>
                                <div class="col-md-2 table-cell"><?php echo $_smarty_tpl->tpl_vars['v']->value->getIdman();?>
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
        <div class="table-navigation col-md-3">
            <div id="update_prov_div" class="center">

            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
