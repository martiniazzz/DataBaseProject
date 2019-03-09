<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\project_p\frontend\html\medManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c83aeb173a391_31638658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c8643120a9beb5da323237b13adaed0fb2c4d15' => 
    array (
      0 => 'D:\\university\\database\\project_p\\frontend\\html\\medManagerPage.tpl',
      1 => 1552133087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c83aeb173a391_31638658 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/respRepsonCSS.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="page-holder">
    <div class="footer">
        <div class="account">
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['managerName']->value;?>

            </div>
            <div class="account-exit">
                <a href="logout.php">Вийти</a>
            </div>
            <div>
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
')" class="table-cell-more table-cell more-info-btn">і</button>
                            <button onclick="showGroups('<?php echo $_smarty_tpl->tpl_vars['m']->value->getGroups();?>
')" class="table-cell-more table-cell more-info-btn">і</button>
                         </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="table-navigation col-md-4">
            <div>
                <div class="get-more-title">More info</div>
                <div id="info-holder" class="get-more-cont border-shadow">
                </div>
            </div>
            <div>
                <div class="get-more-title">Groups</div>
                <div id="groups-holder" class="get-more-cont border-shadow">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="../assets/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../js/respPersonPage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../js/managerPage.js"><?php echo '</script'; ?>
>
</html><?php }
}
