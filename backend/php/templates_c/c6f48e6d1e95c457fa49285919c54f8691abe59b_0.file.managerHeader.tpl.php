<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\managerHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca7908b1b5b41_26875942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6f48e6d1e95c457fa49285919c54f8691abe59b' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\managerHeader.tpl',
      1 => 1554485383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca7908b1b5b41_26875942 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="header">
    <div class="header">
        <img id="logout-img" class="img-header" src="../../frontend/assets/images/exit.png">
        <div class="ver-separator"></div>
        <img id="to-main-img" class="img-header img-header-m" src="../../frontend/assets/images/back.png">
        <div class="ver-separator"></div>
        <div class="account-name">
            <?php echo $_smarty_tpl->tpl_vars['managerName']->value;?>

        </div>
    </div>
</div><?php }
}
