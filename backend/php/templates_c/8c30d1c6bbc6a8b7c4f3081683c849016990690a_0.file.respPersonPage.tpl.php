<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\respPersonPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca893810c9e27_61938504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c30d1c6bbc6a8b7c4f3081683c849016990690a' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\respPersonPage.tpl',
      1 => 1554551678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca893810c9e27_61938504 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Кабінет</title>
    <link href="../../frontend/css/pages.css" rel="stylesheet" type="text/css"/>

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
    <div class="header">
        <div class="header">
            <img id="logout-img" class="img-header" src="../../frontend/assets/images/exit.png">
            <div class="ver-separator"></div>
            <img id="to-givs-img" class="img-header img-header-m" src="../../frontend/assets/images/contract.png">
            <div class="ver-separator"></div>
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['respPersonName']->value;?>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-box">
                    <div>
                        <div class="filter-toggle"><button id="toggle-filters-btn" class="btn-expand">Фільтри</button></div>
                        <div class="filters">
                            <div class="filters-inner">
                                <button id="sort-by-name-btn" class="btn btn-link">Упорядкувати за назвою</button>
                            </div>
                        </div>
                        <div id="form-holder">
                            <input id="search-input" class="input-field" name="prefix">
                            <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Пошук</button>
                        </div>
                    </div>
                </div>
                <div class="search-content">
                    <div id="container-box" class="search-content">
                    </div>
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div class="giving-title">Створення видачі</div>
                <div class="separator"></div>
                <div class="giving-content">
                    <input id="giving-search" list="medicines" name="default" placeholder="Виберіть медикамент" />
                    <datalist id="medicines">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table_content']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['m']->value->getStorageAmount();
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 != 0) {?>
                                <option name="<?php echo $_smarty_tpl->tpl_vars['m']->value->getId();?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value->getStorageAmount();?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value->getName();?>
"></option>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </datalist>
                    <button id="giving-add">Додати</button>
                </div>
                <div id="giving-inner"></div>
                <div class="separator"></div>
                <form onsubmit="return false">
                    <input id="issue-data" name="dataI" value="" hidden>
                    <button name="newIssuance" type="submit" id="giving-create" class="btn btn-success to-right">Створити</button>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Підтвердіть створення видачі!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal-btn-si">Підтвердити</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no">&times;</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/pages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/getMedicinesResp.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/respPersonPage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerHome.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
