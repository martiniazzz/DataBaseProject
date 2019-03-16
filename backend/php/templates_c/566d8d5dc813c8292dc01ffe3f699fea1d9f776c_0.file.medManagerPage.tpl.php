<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\medManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4fa16402d5_42356429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '566d8d5dc813c8292dc01ffe3f699fea1d9f776c' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\medManagerPage.tpl',
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
function content_5c8d4fa16402d5_42356429 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="input-container">
                <form method="post" action="medManagerPage.php" name="form" accept-charset="UTF-8">
                    <input class="input-field" name="prefix" value="<?php echo $_smarty_tpl->tpl_vars['input_val']->value;?>
">
                    <button name="submit_btn" type="submit" class="input-btn">Search</button>
                </form>
            </div>
            <div class="table-holder">
                <div class="table-header border-shadow">
                    <div class="table-header-name table-header-cell">Назва</div>
                    <div class="table-header-type table-header-cell">Тип одиниці</div>
                    <div class="table-header-amount table-header-cell">Кількість</div>
                    <div class="table-header-more table-header-cell">
                    </div>
                </div>
                <div class="table-content">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                        <div class="table-row">
                            <div class="table-cell-name table-cell">
                                <?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>

                            </div>
                            <div class="table-cell-type table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getUnitType();?>
</div>
                            <div class="table-cell-amount table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getStorageAmount();?>
</div>
                            <button onclick="showInfo('<?php echo $_smarty_tpl->tpl_vars['m']->value->getProducer();?>
 \n <?php echo $_smarty_tpl->tpl_vars['m']->value->getDesc();?>
');showGroups('<?php echo $_smarty_tpl->tpl_vars['m']->value->getGroups();?>
');" class="table-cell-more table-cell more-info-btn">і</button>
                         </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="nav col-md-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="get-more-title">Інформація</div>
                    <div id="info-holder" class="get-more-cont border-shadow">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="get-more-title">Групи</div>
                    <div id="groups-holder" class="get-more-cont border-shadow">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
