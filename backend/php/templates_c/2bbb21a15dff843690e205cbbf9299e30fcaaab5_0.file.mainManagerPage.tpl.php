<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\mainManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4f9d1fe2d3_95036585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bbb21a15dff843690e205cbbf9299e30fcaaab5' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\mainManagerPage.tpl',
      1 => 1552764803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c8d4f9d1fe2d3_95036585 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <div class="header">
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
        <a href="writeoffManagerPage.php" id="writeoff-div" class="entity col-md-2">Write Off</a>
        <a href="issuanceManagerPage.php" id="issuance-div" class="entity col-md-2">Issuance</a>
        <a href="medManagerPage.php" id="medicines-div" class="entity col-md-2">Medicines</a>
        <a href="deliveriesManagerPage.php" id="deliveries-div" class="entity col-md-2">Deliveries</a>
        <a href="providersManagerPage.php" id="providers-div" class="entity col-md-2">Providers</a>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
