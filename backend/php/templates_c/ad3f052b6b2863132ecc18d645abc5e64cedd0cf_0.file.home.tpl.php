<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c83b48cac5b52_26392976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad3f052b6b2863132ecc18d645abc5e64cedd0cf' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\home.tpl',
      1 => 1551878483,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c83b48cac5b52_26392976 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/home.css" rel="stylesheet" type="text/css"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/home.js"><?php echo '</script'; ?>
>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="login-form">
    <div id="formContent">
        <form method="post" action="home.php">
            <input type="text" id="login" class="second" name="login" placeholder="Логін">
            <input type="password" id="password" class="third" name="password" placeholder="Пароль">
            <input type="submit" name="login_post" class="fourth" value="Увійти">
        </form>
    </div>
    <div id="formContent" class="error-msg"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div>
</div>
</body>
</html><?php }
}
