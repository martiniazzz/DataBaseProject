<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\addGroupsManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cab2556db6f78_42884307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfd17a283c96db5aca7da8e5b4345dd59efd1d22' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\addGroupsManagerPage.tpl',
      1 => 1554720085,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cab2556db6f78_42884307 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Поставка №<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</title>
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
            <img id="to-main-img" class="img-header img-header-m" src="../../frontend/assets/images/back.png">
            <div class="ver-separator"></div>
            <img id="to-dels-img" class="img-header img-header-m" src="../../frontend/assets/images/box.png">
            <div class="ver-separator"></div>
            <div class="account-name">
                <?php echo $_smarty_tpl->tpl_vars['managerName']->value;?>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="content-inner content-holder col-md-8">
                <div class="deliv_head">Поставка №<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</div>
                <div id="container-box" class="search-content">
                </div>

            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form id="g-form" onsubmit="return false;">
                        <div class="m-input-holder">
                            <div class="m-input-label">Полиця</div>
                            <input id="up_sh" class="input-holder" type="text" name="shelf" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Стелаж</div>
                            <input id="up_ra" class="input-holder" type="text" name="rack" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Дата виготовлення</div>
                            <input id="up_date" class="input-holder" type="date" name="pdate" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Кількість в поставці</div>
                            <input id="up_am" class="input-holder" type="text" name="amount" placeholder="Кількість в поставці">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Ціна за одиницю</div>
                            <input id="up_pr" class="input-holder" type="text" name="price" placeholder="Ціна за одиницю">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Медикамент</div>
                            <input id="up_med" class="input-holder" list="meds" name="med" type="text" placeholder="Медикамент">
                            <datalist id="meds"></datalist>
                        </div>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                        <input name="delid" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" hidden>
                        <input id="close" onclick="clear_btn()" type="reset" class="btn btn-danger clear-btn to-right" value="&times;">
                        <input id="up_sub" class="btn btn-success to-right" type="submit" name="submit_add" value="Додати">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/pages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerPage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/getGroups.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/managerHome.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
