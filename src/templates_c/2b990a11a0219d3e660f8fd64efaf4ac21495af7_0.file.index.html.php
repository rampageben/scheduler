<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-28 13:59:49
  from 'C:\scheduler\src\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_658d7f551e4040_92324468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b990a11a0219d3e660f8fd64efaf4ac21495af7' => 
    array (
      0 => 'C:\\scheduler\\src\\templates\\index.html',
      1 => 1703771987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index_side.html' => 1,
    'file:login.html' => 1,
    'file:search_by_time.html' => 1,
    'file:show_schedule_unfinished.html' => 1,
    'file:registered.html' => 1,
  ),
),false)) {
function content_658d7f551e4040_92324468 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="bootstrap/js/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 crossorigin="anonymous"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 crossorigin="anonymous"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 charset="utf-8" src="jQuery_validation_engine/js/languages/jquery.validationEngine-zh_TW.js"
            type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 charset="utf-8" src="jQuery_validation_engine/js/jquery.validationEngine.js"
            type="text/javascript"><?php echo '</script'; ?>
>
    <link href="jQuery_validation_engine/css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
    <link href="style.css" rel="stylesheet">
</head>

<body>

<div class='container'>
    <div class="col-md-16" id="shop_head">
        <a href="index.php?op=home">
            <img alt="logo" height="200" src="templates/web_image/home/lemon.png" width="200">
        </a>
        <a class="home-link" href="index.php?op=home">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">首頁</span>
        </a>
        <a class="home-link" href="lessonTable.php?op=lessontable">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">檢視課表</span>
        </a>
        <a class="home-link" href="Search.php?op=search">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">查詢課程</span>
        </a>
        <!--        改-->
        <a class="home-link" href="show_unfinished.php?op=show_unfinished">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">未完成行程</span>
        </a>
        <!--        改-->
        <a class="home-link" href="show_by_time.php?op=search_by_time">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">天數顯示</span>
        </a>

        <div class="col-md-3 col-sm-4" id="login_frame">
            <?php if ($_smarty_tpl->tpl_vars['op']->value != "login" && $_smarty_tpl->tpl_vars['op']->value != "registered" && $_smarty_tpl->tpl_vars['op']->value != "loginout") {?>
            <?php $_smarty_tpl->_subTemplateRender('file:index_side.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php }?>
        </div>
        <div class="row" id="shop_main">
            <div class="col-md-9 col-sm-8" id="show_shop">
                <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['op']->value == "home") {?>
                <h1>選課系統</h1>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "login" || $_smarty_tpl->tpl_vars['op']->value == "loginout") {?>
                <div style="max-width: 500px;margin: auto;">
                    <?php $_smarty_tpl->_subTemplateRender('file:login.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <!--                改-->
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "search_by_time" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:search_by_time.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "show_unfinished" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:show_schedule_unfinished.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "registered" || $_smarty_tpl->tpl_vars['op']->value == "registered_insert") {?>
                <div style="max-width: 500px;margin: auto;">
                    <?php $_smarty_tpl->_subTemplateRender('file:registered.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <!--                改-->
                <?php } else { ?>
                <h1>選課系統吧</h1>
                <?php }?>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html><?php }
}
