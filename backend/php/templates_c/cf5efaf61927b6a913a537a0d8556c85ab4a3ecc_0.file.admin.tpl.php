<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca7adcf067ed3_58336974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf5efaf61927b6a913a537a0d8556c85ab4a3ecc' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\admin.tpl',
      1 => 1554492877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
  ),
),false)) {
function content_5ca7adcf067ed3_58336974 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <div class="header">
        <div class="header">
            <img id="logout-img" class="img-header" src="../../frontend/assets/images/exit.png">
            <div class="ver-separator"></div>
            <div class="account-name">
                Адміністратор
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                    <div class="med-holder">
                        <div class="med-name">
                            <div class="med-name-n"><?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
 : <?php echo $_smarty_tpl->tpl_vars['m']->value->toString();?>
 : <?php echo $_smarty_tpl->tpl_vars['m']->value->getDep();?>
</div>
                                                                                                                                                </div>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form method="post" action="adminPage.php" id="form">
                    <input type="radio" name="type" value="manager" checked onclick="handleClick(this);"> Завідувач
                    <input type="radio" name="type" value="respperson" onclick="handleClick(this);"> Відповідальна особа
                    <input class="input-holder" type="text" name="id" placeholder="ID">
                    <input class="input-holder" type="text" name="lname" placeholder="Прізвище">
                    <input class="input-holder" type="text" name="fname" placeholder="Імя">
                    <input class="input-holder" type="text" name="mname" placeholder="По-батькові">
                    <input id="depart" class="input-holder" type="text" name="dep" placeholder="Відділ">
                    <input class="input-holder" type="text" name="password" placeholder="Пароль">
                    <button class="btn btn-success to-right" name="submit_add">Додати</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerPage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/respPersonPage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/pages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerHome.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
