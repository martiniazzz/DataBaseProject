<?php
/* Smarty version 3.1.33, created on 1
  from 'D:\university\database\databaseproject\frontend\html\writeoffManagerPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca89aa8da5f77_72348730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08e383c35b1f140b27f4590bf81c155c2a1af022' => 
    array (
      0 => 'D:\\university\\database\\databaseproject\\frontend\\html\\writeoffManagerPage.tpl',
      1 => 1554553511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../frontend/html/header.tpl' => 1,
    'file:../../frontend/html/managerHeader.tpl' => 1,
  ),
),false)) {
function content_5ca89aa8da5f77_72348730 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <button id="sortDate" type="submit" class="btn btn-link" name="date_order">Упорядкувати за датою</button>
                            </div>
                            <div class="filters-inner">
                                <form onsubmit="return false">
                                    <label for="date_from">Від</label>
                                    <input id="d-from" class="filter-btn-inp" type="date">
                                    <label for="date_to">До</label>
                                    <input id="d-to" class="filter-btn-inp" type="date">
                                    <button id="b-s-date" class="filter-btn" >Пошук</button>
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
            <div class="content-inner giving-holder col-md-4">
                <form id="w-form" onsubmit="return false">
                    <div class="m-input-holder">
                        <div class="m-input-label">Група</div>
                        <input id="up_prov" class="input-holder" list="groups" name="name" type="text" placeholder="">
                        <datalist id="groups">
                        </datalist>
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Дата</div>
                        <input id="up_date" class="input-holder" type="date" name="date" placeholder="">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Кількість</div>
                        <input id="up_am" class="input-holder" type="number" min="1" name="amount" placeholder="">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Причина</div>
                        <input id="up_re"class="input-holder" list="reasons" type="text"  name="reason" placeholder="">
                        <datalist id="reasons">
                            <option name="bad_deliv" value="Зіпсовано при поставці"></option>
                            <option name="out_of_date" value="Прострочено"></option>
                        </datalist>
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Полиця</div>
                        <input id="up_sh" class="input-holder" type="number" min="1" name="shelf" placeholder="">
                    </div>
                    <div class="m-input-holder">
                        <div class="m-input-label">Стелаж</div>

                        <input id="up_ra" class="input-holder" type="number" min="1" name="rack" placeholder="">
                    </div>
                    <input id="up_id" class="input-holder" type="number" name="id" placeholder="id">
                    <input id="close" onclick="clear_btn()" type="reset" class="btn btn-danger clear-btn to-right" value="&times;">
                    <input id="up_sub" class="btn btn-success to-right" type="submit" name="submit_add" value="Додати">
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/pages.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../frontend/js/getWriteOff.js"><?php echo '</script'; ?>
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
