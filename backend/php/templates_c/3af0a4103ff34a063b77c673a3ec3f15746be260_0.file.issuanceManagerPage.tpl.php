<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\project_p\frontend\html\issuanceManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c83aec2b89c68_23605019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3af0a4103ff34a063b77c673a3ec3f15746be260' => 
    array (
      0 => 'D:\\university\\database\\project_p\\frontend\\html\\issuanceManagerPage.tpl',
      1 => 1552133824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c83aec2b89c68_23605019 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/respRepsonCSS.css" rel="stylesheet" type="text/css"/>

    <?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/respPersonPage.js"><?php echo '</script'; ?>
>

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
            <div class="account-giving">
                <a href="mainManagerPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="content row">
        <div class="content-inner col-md-8">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    <div class="col-md-3 table-header-cell">Номер видачі</div>
                    <div class="col-md-3 table-header-cell">Дата</div>
                    <div class="col-md-3 table-header-cell">Кому</div>
                    <div class="col-md-3 table-header-cell">Статус</div>
                    <div class="col-md-3 table-header-cell">Детальніше</div>
                </div>
                <div class="table-content">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                        <div class="row table-row">
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getDate();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getRespPerson();?>
</div>
                            <div class="col-md-3 table-cell"><?php echo $_smarty_tpl->tpl_vars['m']->value->getStatus();?>
</div>
                            <button onclick="showInfo_G('<?php echo $_smarty_tpl->tpl_vars['m']->value->getGivenMed();?>
')" class="col-md-3 table-cell">+</button>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <div class="content-inner col-md-4">
            <div>
                <div class="get-more-title">More info</div>
                <div id="info-holder" class="get-more-cont border-shadow">
                </div>
            </div>
            <div class="actions-holder">
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showAllG" type="submit">Усі</button>
                </form>
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showOtrG" type="submit">Отримано</button>
                </form>
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showOprG" type="submit">Опрацьовано</button>
                </form>
                <form method="post" action="issuanceManagerPage.php">
                    <button name="showNewG" type="submit">Нове</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
