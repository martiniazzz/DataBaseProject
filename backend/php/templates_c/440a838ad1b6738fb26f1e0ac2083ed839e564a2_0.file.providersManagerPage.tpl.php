<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\project_p\frontend\html\providersManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c83aea4202070_53485379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '440a838ad1b6738fb26f1e0ac2083ed839e564a2' => 
    array (
      0 => 'D:\\university\\database\\project_p\\frontend\\html\\providersManagerPage.tpl',
      1 => 1552133793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c83aea4202070_53485379 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Менеджер</title>
    <link href="../../frontend/css/managerPageCSS.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="page-holder">
    <div class="footer">
        <div class="account">
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['managerName']->value;?>

            </div>
            <div>
                <a href="logout.php">Вийти</a>
            </div>
            <div>
                <a href="mainManagerPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="container row">
        <div class="content col-md-10">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['header_vals']->value, 'h');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['h']->value) {
?>
                        <div class="col-md-1"><?php echo $_smarty_tpl->tpl_vars['h']->value;?>
</div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="table-content">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prov_vals']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <div><?php echo $_smarty_tpl->tpl_vars['v']->value->toString();?>
</div>
                        <button id="update_prov" onclick="pass_values(<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
,'<?php echo $_smarty_tpl->tpl_vars['v']->value->getName();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getCountry();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getCity();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getStreet();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getBuildNo();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getAccount();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getEmail();?>
')">Update</button>
                        <form method="post" action="providersManagerPage.php" onsubmit="return sub_delete()">
                            <input class="del_id" type="number" name="id" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
">
                            <button type="submit" name="delete_prov">Delete</button>
                        </form>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="navigator col-md-2">
            <div id="update_prov_div" class="center">
                <button id="close" style="float: right;">X</button>
                <form method="post" action="providersManagerPage.php">
                    <input id="up_name" type="text" name="name" placeholder="Company">
                    <input id="up_co" type="text" name="country" placeholder="Country">
                    <input id="up_ci" type="text" name="city" placeholder="City">
                    <input id="up_st" type="text" name="street" placeholder="Street">
                    <input id="up_bu" type="text" name="build" placeholder="Build">
                    <input id="up_ac" type="text" name="account" placeholder="Account">
                    <input id="up_em" type="text" name="email" placeholder="Email">
                    <input id="up_id" type="number" name="id" placeholder="id">
                    <input id="up_sub" type="submit" name="submit_add" value="Додати">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerPage.js"><?php echo '</script'; ?>
>
</html><?php }
}
