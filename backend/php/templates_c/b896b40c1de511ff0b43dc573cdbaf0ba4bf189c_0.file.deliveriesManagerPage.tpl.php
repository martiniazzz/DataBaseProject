<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\project_p\frontend\html\deliveriesManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c83aead4de062_60966822',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b896b40c1de511ff0b43dc573cdbaf0ba4bf189c' => 
    array (
      0 => 'D:\\university\\database\\project_p\\frontend\\html\\deliveriesManagerPage.tpl',
      1 => 1552049079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c83aead4de062_60966822 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Менеджер</title>
    <link href="../../frontend/css/managerPageCSS.css" rel="stylesheet" type="text/css"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerPage.js"><?php echo '</script'; ?>
>

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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['del_vals']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <div><?php echo $_smarty_tpl->tpl_vars['v']->value->toString();?>
</div>
                                                                                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="navigator col-md-2">
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
