<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\respPersonGivingPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca892a043f423_52924313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccfbe8171524ab71e1bf4d66eef9bcef100654e4' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\respPersonGivingPage.tpl',
      1 => 1554551452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
  ),
),false)) {
function content_5ca892a043f423_52924313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="page-holder">
    <div class="header">
        <div class="header">
            <img id="logout-img" class="img-header" src="../../frontend/assets/images/exit.png">
            <div class="ver-separator"></div>
            <img id="to-meds-img" class="img-header img-header-m" src="../../frontend/assets/images/back.png">
            <div class="ver-separator"></div>
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['respPersonName']->value;?>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-10">
                <div class="search-box">
                    <div>
                        <div class="filter-toggle"><button id="toggle-filters-btn" class="btn-expand">Фільтри</button></div>
                        <div class="filters">
                            <div class="filters-inner">
                                <button id="b-get-all" class="btn btn-success margin-around" name="showAllG" type="submit">Усі</button>
                                <button id="b-get-get"  class="btn btn-success margin-around" name="showOtrG" type="submit">Отримано</button>
                                <button id="b-get-proc"  class="btn btn-success margin-around" name="showOprG" type="submit">Опрацьовано</button>
                                <button id="b-get-new"  class="btn btn-success margin-around" name="showNewG" type="submit">Нове</button>
                            </div>
                            <div class="filters-inner">
                                <button id="sort-date-i" type="submit" class="btn btn-link" name="order_date">Впорядкувати за датою</button>
                            </div>
                            <div class="filters-inner">
                                <form onsubmit="return false;">
                                    <label for="date_from">Від</label>
                                    <input id="di-from" class="filter-btn-inp" type="date" name="date_from">
                                    <label for="date_to">До</label>
                                    <input id="di-to" class="filter-btn-inp" type="date" name="date_to">
                                    <button id="btn-date-i" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-content">
                    <div id="container-box" class="search-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/pages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/getIssuanceRespPerson.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerPage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerHome.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
