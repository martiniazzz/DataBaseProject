<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\medManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca899de1ce904_76267728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '566d8d5dc813c8292dc01ffe3f699fea1d9f776c' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\medManagerPage.tpl',
      1 => 1554553278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/managerHeader.tpl' => 1,
  ),
),false)) {
function content_5ca899de1ce904_76267728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../../frontend/html/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
                                <button id="sort-by-name-btn" class="btn btn-link">Упорядкувати за назвою</button>
                                <button id="sort-by-prod-btn" class="btn btn-link">Упорядкувати за виробником</button>
                            </div>
                            <div class="filters-inner">
                                <button id="show-with-finish-btn" class="btn btn-link">Показати із закінченими групами</button>
                                <button id="show-finished-btn" class="btn btn-link">Показати закінчені</button>
                            </div>
                            <br>
                            <div class="filters-inner">
                                <label for="lessN" class="text-muted">Медикаменти з кількістю менше за</label>
                                <input id="get-less-N" type="number" name="lessN" class="input-small">
                            </div>
                            <div class="filters-inner">
                                <button id="show-with-out" class="btn btn-link">Медикаменти з групами, у яких вийшов термін придатності</button>
                            </div>
                            <div class="filters-inner">
                                <button id="show-with-soon-out" class="btn btn-link">Медикаменти з групами, у яких скоро вийде термін придатності</button>
                            </div>
                        </div>
                    </div>
                    <div id="form-holder">
                        <input id="search-input" class="input-field" name="prefix">
                        <button id="input-btn" name="submit_btn" type="submit" class="input-btn">Пошук</button>
                    </div>
                </div>
                <div id="container-box" class="search-content">
                </div>
            </div>
            <div class="content-inner giving-holder col-md-4">
                <div id="update_prov_div" class="">
                    <form id="m-form" onsubmit="return false">
                        <div class="m-input-holder">
                            <div class="m-input-label">Найменування</div>
                            <input id="up_name" class="input-holder" type="text" name="name" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Виробник</div>
                            <input id="up_prod" class="input-holder" type="text" name="prod" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Тип одиниці</div>
                            <input id="up_type" class="input-holder" type="text" name="unittype" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Кількість одн. в упаковці</div>
                            <input id="up_am" class="input-holder" type="text" name="unitam" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Температура</div>
                            <input id="up_temp" class="input-holder" type="text" name="temp" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Термін придатності</div>
                            <input id="up_term" class="input-holder" type="text" name="usterm" placeholder="">
                        </div>
                        <div class="m-input-holder">
                            <div class="m-input-label">Опис</div>
                            <textarea id="up_desc" class="input-holder inp-hol-area" name="desc" placeholder=""></textarea>
                        </div>
                        <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
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
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/getMedicines.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"><?php echo '</script'; ?>
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
