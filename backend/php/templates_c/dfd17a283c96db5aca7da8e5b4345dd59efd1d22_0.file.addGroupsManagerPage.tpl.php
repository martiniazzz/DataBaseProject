<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\addGroupsManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca245ac9484b6_45851942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfd17a283c96db5aca7da8e5b4345dd59efd1d22' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\addGroupsManagerPage.tpl',
      1 => 1554138538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5ca245ac9484b6_45851942 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="account-giving">
                <a href="deliveriesManagerPage.php">До поставок</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="deliv_head">Поставка №<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</div>
                <div class="deliv_holder">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups_list']->value, 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
                        <div class="deliv_inner">
                            <div class="deliv_inner-inner">Номер групи: <?php echo $_smarty_tpl->tpl_vars['g']->value->getId();?>
 (<?php echo $_smarty_tpl->tpl_vars['g']->value->getIdMedicine();?>
)</div>
                            <div class="deliv_inner-inner">Полиця: <?php echo $_smarty_tpl->tpl_vars['g']->value->getShelf();?>
</div>
                            <div class="deliv_inner-inner">Стелаж: <?php echo $_smarty_tpl->tpl_vars['g']->value->getRack();?>
</div>
                            <div class="deliv_inner-inner">Дата виготовлення: <?php echo $_smarty_tpl->tpl_vars['g']->value->getProductDate();?>
</div>
                            <div class="deliv_inner-inner">Термін придатності: <?php echo $_smarty_tpl->tpl_vars['g']->value->getDueTo();?>
</div>
                            <div class="deliv_inner-inner">Кількість упаковок в поставці:<?php echo $_smarty_tpl->tpl_vars['g']->value->getDelPackAmount();?>
</div>
                            <div class="deliv_inner-inner">Кількість одиниць на складі: <?php echo $_smarty_tpl->tpl_vars['g']->value->getStorageUnitAmount();?>
</div>
                            <div class="deliv_inner-inner">Ціна за упаковку: <?php echo $_smarty_tpl->tpl_vars['g']->value->getPricePerPack();?>
</div>
                            <div class="deliv_inner-inner">Загальна вартість: <?php echo $_smarty_tpl->tpl_vars['g']->value->getTotalPrice();?>
</div>
                            <button class="edit-btn edit-group" onclick="passGroupVals(<?php echo $_smarty_tpl->tpl_vars['g']->value->getId();?>
,<?php echo $_smarty_tpl->tpl_vars['g']->value->getShelf();?>
,<?php echo $_smarty_tpl->tpl_vars['g']->value->getRack();?>
,'<?php echo $_smarty_tpl->tpl_vars['g']->value->getProductDate();?>
',<?php echo $_smarty_tpl->tpl_vars['g']->value->getDelPackAmount();?>
,<?php echo $_smarty_tpl->tpl_vars['g']->value->getPricePerPack();?>
,'<?php echo $_smarty_tpl->tpl_vars['g']->value->getIdMedicine();?>
')">Редагувати</button>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form method="post" action="addGroupsManagerPage.php" id="form">
                        <input id="up_sh" class="input-holder" type="text" name="shelf" placeholder="Полиця">
                        <input id="up_ra" class="input-holder" type="text" name="rack" placeholder="Стелаж">
                        <input id="up_date" class="input-holder" type="date" name="pdate" placeholder="Дата виготовлення">
                        <input id="up_am" class="input-holder" type="text" name="amount" placeholder="Кількість в поставці">
                        <input id="up_pr" class="input-holder" type="text" name="price" placeholder="Ціна за одиницю">
                        <input id="up_med" class="input-holder" list="meds" name="med" type="text" placeholder="Медикамент">
                        <datalist id="meds">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meds_list']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                                <option name="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </datalist>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input name="delid" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" hidden>
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
