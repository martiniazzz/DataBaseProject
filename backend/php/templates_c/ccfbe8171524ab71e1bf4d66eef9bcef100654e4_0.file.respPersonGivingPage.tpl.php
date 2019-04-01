<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\respPersonGivingPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9a57e4752456_81866816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccfbe8171524ab71e1bf4d66eef9bcef100654e4' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\respPersonGivingPage.tpl',
      1 => 1553618911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c9a57e4752456_81866816 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['respPersonName']->value;?>

            </div>
            <div class="account-giving">
                <a href="respPersonPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-10">
                <div class="search-content">
                    <?php if ($_smarty_tpl->tpl_vars['table_content']->value == array()) {?>
                        <div class="empty-giving-info">Видач немає</div>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                            <div class="med-holder">
                                <div class="med-name">
                                    <div class="med-name-n">Видача №<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
 від <?php echo $_smarty_tpl->tpl_vars['m']->value->getDate();?>
</div>
                                    <div class="med-aval">Статус: <?php echo $_smarty_tpl->tpl_vars['m']->value->getStatus();?>
</div>
                                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['m']->value->getStatus();
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 'опрацьовано') {?>
                                        <form action="respPersonGivingsPage.php" method="post">
                                            <input name="iss_id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
" hidden>
                                            <button type="submit" name="change_status" class="med-st-change edit-btn">Забрати</button>
                                        </form>
                                    <?php }?>
                                </div>
                                <div class="med-info">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value->getGivenMed(), 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
                                        <div class="med-info-row">
                                            <div>Найменування: <?php echo $_smarty_tpl->tpl_vars['g']->value->getName();?>
</div>
                                            <div>Кількість: <?php echo $_smarty_tpl->tpl_vars['g']->value->getAmount();?>
</div>
                                        </div>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </div>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </div>
            </div>
            <div class="content-inner  col-md-2">
                <div class="actions-holder">
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showAllG" type="submit">Усі</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showOtrG" type="submit">Отримано</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showOprG" type="submit">Опрацьовано</button>
                </form>
                <form method="post" action="respPersonGivingsPage.php">
                <button class="giving-action-btn" name="showNewG" type="submit">Нове</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
