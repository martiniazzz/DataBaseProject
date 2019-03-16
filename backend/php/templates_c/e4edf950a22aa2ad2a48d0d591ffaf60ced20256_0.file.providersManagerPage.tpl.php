<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\providersManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4f04474e60_88252546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4edf950a22aa2ad2a48d0d591ffaf60ced20256' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\providersManagerPage.tpl',
      1 => 1552764674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/managerHeader.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c8d4f04474e60_88252546 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/managerHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-6 table-header-cell">Назва</div>
                    <div class="col-md-3 table-header-cell"></div>
                    <div class="col-md-3 table-header-cell"></div>
                </div>
                <div class="table-content">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prov_vals']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <div class="row table-row">
                            <div class="col-md-6 table-cell"><?php echo $_smarty_tpl->tpl_vars['v']->value->getName();?>
</div>
                            <div class="table-cell col-md-3">
                                <button id="update_prov" class="edit-btn" onclick="pass_values(<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
,'<?php echo $_smarty_tpl->tpl_vars['v']->value->getName();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getCountry();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getCity();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getStreet();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getBuildNo();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getAccount();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getEmail();?>
')">Редагувати</button>
                            </div>
                            <form class="col-md-3 table-cell" method="post" action="providersManagerPage.php" onsubmit="return sub_delete()">
                                <input class="del_id" type="number" name="id" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
">
                                <button class="delete-btn" type="submit" name="delete_prov">Видалити</button>
                            </form>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="table-navigation col-md-4">
            <div id="update_prov_div" class="center">
                <form method="post" action="providersManagerPage.php" id="form">
                    <input id="up_name" class="input-holder" type="text" name="name" placeholder="Company">
                    <input id="up_co" class="input-holder" type="text" name="country" placeholder="Country">
                    <input id="up_ci" class="input-holder" type="text" name="city" placeholder="City">
                    <input id="up_st" class="input-holder" type="text" name="street" placeholder="Street">
                    <input id="up_bu" class="input-holder" type="text" name="build" placeholder="Build">
                    <input id="up_ac" class="input-holder" type="text" name="account" placeholder="Account">
                    <input id="up_em" class="input-holder" type="text" name="email" placeholder="Email">
                    <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                    <input id="up_sub" class="add-btn" type="submit" name="submit_add" value="Додати">
                    <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn" value="&times;">
                </form>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
