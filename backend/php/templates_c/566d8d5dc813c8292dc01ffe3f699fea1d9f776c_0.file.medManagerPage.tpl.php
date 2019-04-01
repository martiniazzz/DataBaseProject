<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\medManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9a46658e0535_62947684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '566d8d5dc813c8292dc01ffe3f699fea1d9f776c' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\medManagerPage.tpl',
      1 => 1553614434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c9a46658e0535_62947684 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="content-inner content-holder col-md-12">
                <div class="search-box">
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
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
