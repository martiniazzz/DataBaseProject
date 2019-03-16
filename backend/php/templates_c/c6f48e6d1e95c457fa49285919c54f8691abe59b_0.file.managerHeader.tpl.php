<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\managerHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4f04587001_73471279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6f48e6d1e95c457fa49285919c54f8691abe59b' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\managerHeader.tpl',
      1 => 1552764656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8d4f04587001_73471279 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="header">
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
    </div>
</div><?php }
}
