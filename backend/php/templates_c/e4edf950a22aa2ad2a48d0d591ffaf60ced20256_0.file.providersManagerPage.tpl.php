<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\providersManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca22593e64dc4_02760946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4edf950a22aa2ad2a48d0d591ffaf60ced20256' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\providersManagerPage.tpl',
      1 => 1554130319,
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
function content_5ca22593e64dc4_02760946 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/managerHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-content">
                    <div class="filters">
                        <div class="filters-inner">
                            <form action="providersManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_name">Упорядкувати за назвою</button>
                            </form>
                            <form action="providersManagerPage.php" method="post">
                                <button class="filter-btn" name="sort_by_address">Упорядкувати за адресою</button>
                            </form>
                        </div>
                        <div class="filters-inner">
                            <form method="post" action="providersManagerPage.php">
                                <input class="filter-btn" list="countries" name="country_def" placeholder="Усі країни" onkeydown="return false;">
                                <datalist id="countries">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                                        <option name="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"></option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </datalist>
                                <input class="filter-btn" list="cities" name="city_def" placeholder="Усі міста" onkeydown="return false;">
                                <datalist id="cities">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cities']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                                        <option name="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"></option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </datalist>
                                <button type="submit" name="search_cc" class="filter-btn">Пошук</button>
                            </form>
                        </div>
                    </div>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prov_vals']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <div class="med-holder">
                            <div class="med-name">
                                <div class="prov-n"><?php echo $_smarty_tpl->tpl_vars['v']->value->getName();?>
</div>
                                <div class="prov-a">
                                    <button onclick="passForPhone(<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
)" id="add_phone" class="add-btn" data-toggle="modal" data-target="#addPhoneM">Додати телефон</button>
                                </div>
                                <div class="prov-e">
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
                                <form class="prov-d" method="post" action="providersManagerPage.php" onsubmit="return sub_delete()">
                                    <input class="del_id" type="number" name="id" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
">
                                    <button class="delete-btn" type="submit" name="delete_prov">Видалити</button>
                                </form>
                            </div>
                            <div class="med-info">
                                <div>Країна: <?php echo $_smarty_tpl->tpl_vars['v']->value->getCountry();?>
</div>
                                <div>Місто: <?php echo $_smarty_tpl->tpl_vars['v']->value->getCity();?>
</div>
                                <div>Адреса: <?php echo $_smarty_tpl->tpl_vars['v']->value->getStreet();?>
, <?php echo $_smarty_tpl->tpl_vars['v']->value->getBuildNo();?>
</div>
                                <div>Номер рахунку:  <?php echo $_smarty_tpl->tpl_vars['v']->value->getAccount();?>
</div>
                                <div>Email:  <?php echo $_smarty_tpl->tpl_vars['v']->value->getEmail();?>
</div>
                                <div>Телефони:</div>
                                <div>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v']->value->getPhones(), 't');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
?>
                                        <div class="phone_holder">
                                            <div class="phone_holder_inner"><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
</div>
                                            <form class="phone_holder_inner" method="post" action="providersManagerPage.php">
                                                <input name="pval" value="<?php echo $_smarty_tpl->tpl_vars['t']->value;?>
" hidden>
                                                <button type="submit" name="del_phone" class="delete-btn">Видалити</button>
                                            </form>
                                        </div>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
                    <form method="post" action="providersManagerPage.php" id="form">
                        <input id="up_name" class="input-holder" type="text" name="name" placeholder="Company">
                        <input id="up_co" class="input-holder" type="text" name="country" placeholder="Country">
                        <input id="up_ci" class="input-holder" type="text" name="city" placeholder="City">
                        <input id="up_st" class="input-holder" type="text" name="street" placeholder="Street">
                        <input id="up_bu" class="input-holder" type="text" name="build" placeholder="Build">
                        <input id="up_ac" class="input-holder" type="text" name="account" placeholder="Account">
                        <input id="up_em" class="input-holder" type="text" name="email" placeholder="Email">
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input id="close" onclick="clear_btn()" type="reset" class="delete-btn clear-btn to-right" value="&times;">
                        <input id="up_sub" class="add-btn to-right" type="submit" name="submit_add" value="Додати">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPhoneM" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input id="phone_holder" type="text" class="form-control validate" name="phone" placeholder="Телефон">
                </div>
                <div class="modal-footer">
                    <form action="providersManagerPage.php" method="post" onsubmit="return validatePhone()">
                        <input id="phone_add_pid" name="provid" hidden>
                        <input id="phone_add_phone" name="phoneval" hidden>
                        <button type="submit" class="btn btn-default" name="add_phone_b">Зберегти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
