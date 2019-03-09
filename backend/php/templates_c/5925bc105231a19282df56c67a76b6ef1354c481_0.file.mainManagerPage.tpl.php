<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\project_p\frontend\html\mainManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c83ae3b2a7c71_48288013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5925bc105231a19282df56c67a76b6ef1354c481' => 
    array (
      0 => 'D:\\university\\database\\project_p\\frontend\\html\\mainManagerPage.tpl',
      1 => 1552133082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c83ae3b2a7c71_48288013 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Менеджер</title>
    <link href="../../frontend/css/managerPageCSS.css" rel="stylesheet" type="text/css"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="../js/managerPage.js"><?php echo '</script'; ?>
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
        </div>
    </div>
    <div class="container row">
        <div class="content col-md-10">
            <div class="content-inner row">
                <a href="providersManagerPage.php" id="providers-div" class="entity col-md-2">Providers</a>
                <a href="deliveriesManagerPage.php" id="deliveries-div" class="entity col-md-2">Deliveries</a>
                <a href="medManagerPage.php" id="medicines-div" class="entity col-md-2">Medicines</a>
                <a href="issuanceManagerPage.php" id="issuance-div" class="entity col-md-2">Issuance</a>
                <a href="writeoffManagerPage.php" id="writeoff-div" class="entity col-md-2">Write Off</a>
            </div>
        </div>
    </div>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="../assets/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../js/managerPage.js"><?php echo '</script'; ?>
>
</html><?php }
}
