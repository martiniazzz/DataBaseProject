<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\issuanceManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8d4fa68f8d86_82964482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1fe0863af854a5e5f6f6b93e22d09a467544150' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\issuanceManagerPage.tpl',
      1 => 1552764806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/footer.tpl' => 1,
  ),
),false)) {
function content_5c8d4fa68f8d86_82964482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <div class="header">
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
<?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
