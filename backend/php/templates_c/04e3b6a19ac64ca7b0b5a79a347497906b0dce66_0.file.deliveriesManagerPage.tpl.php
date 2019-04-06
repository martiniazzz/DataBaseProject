<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\deliveriesManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca8d198434026_08123860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04e3b6a19ac64ca7b0b5a79a347497906b0dce66' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\deliveriesManagerPage.tpl',
      1 => 1554553115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/managerHeader.tpl' => 1,
  ),
),false)) {
function content_5ca8d198434026_08123860 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Поставки</title>
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
    <?php $_smarty_tpl->_subTemplateRender("file:../../frontend/html/managerHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="search-box">
                    <div>
                        <div class="filter-toggle"><button id="toggle-filters-btn" class="btn-expand">Фільтри</button></div>
                        <div class="filters">
                            <div class="filters-inner">
                                <button id="date-order" class="btn btn-link" name="sort_by_date">Упорядкувати за датою</button>
                            </div>
                            <div class="filters-inner"><b>Вартість</b></div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="date_from">Від</label>
                                    <input id="pr-from" class="filter-btn-inp" type="number">
                                    <label for="date_to">До</label>
                                    <input id="pr-to" class="filter-btn-inp" type="number">
                                    <button id="pricesLimit" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                            <div class="filters-inner"><b>Дата</b></div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="date_from">Від</label>
                                    <input id="d-from" class="filter-btn-inp" type="date">
                                    <label for="date_to">До</label>
                                    <input id="d-to" class="filter-btn-inp" type="date">
                                    <button id="datesLimit" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="provss">Постачальники</label>
                                    <input id="s-prov" placeholder="Постачальники" list="providers" id="provs_list_inp" class="filter-btn-inp" name="provss">
                                    <datalist id="providers"></datalist>
                                    <button id="provSearch" class="filter-btn">Пошук</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="container-box" class="search-content">
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <form id="d-form" onsubmit="return false;">
                    <div class="m-input-holder">
                        <div class="m-input-label">Накладна №</div>
                        <input id="up_idp" class="input-holder" type="text" name="id">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Дата</div>
                        <input id="up_date" class="input-holder" type="date" name="date">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Постачальник</div>
                        <input id="up_prov" class="input-holder" list="provs" name="name" type="text">
                        <datalist id="provs"></datalist>
                    </div>
                    <input id="close" onclick="clear_btn()" type="reset" class="btn btn-danger clear-btn to-right" value="&times;">
                    <button id="up_sub" class="btn btn-success to-right" name="submit_add">Додати</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/pages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/getDeliveries.js"><?php echo '</script'; ?>
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
