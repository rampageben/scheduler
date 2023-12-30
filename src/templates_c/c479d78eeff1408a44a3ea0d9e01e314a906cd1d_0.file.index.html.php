<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-30 20:05:28
  from 'D:\scheduler\src\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_659007889febc2_91155342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c479d78eeff1408a44a3ea0d9e01e314a906cd1d' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\index.html',
      1 => 1703937788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index_side.html' => 1,
    'file:login.html' => 1,
    'file:change.html' => 1,
    'file:change_show.html' => 1,
    'file:add.html' => 1,
    'file:search_by_time.html' => 1,
    'file:show_schedule_unfinished.html' => 1,
    'file:registered.html' => 1,
    'file:today.html' => 1,
  ),
),false)) {
function content_659007889febc2_91155342 (Smarty_Internal_Template $_smarty_tpl) {
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
        <!--        <a class="home-link" href="index.php?op=home">-->
        <!--            <img alt="home" src="templates/web_image/home/home.png" width="80">-->
        <!--            <span class="home-text">首頁</span>-->
        <!--        </a>-->
        <a class="home-link" href="add.php?op=add">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">新增事件</span>
        </a>
        <a class="home-link" href="change.php?op=change">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">刪除事件</span>
        </a>
        <a class="home-link" href="show_unfinished.php?op=show_unfinished">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">未完成行程</span>
        </a>
        <!--        改-->
        <a class="home-link" href="show_by_time.php?op=search_by_time">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">依時間顯示行程</span>
        </a>
        <a class="home-link" href="Today.php?op=show_Today">
            <img alt="home" src="templates/web_image/home/home.png" width="80">
            <span class="home-text">顯示今日行程</span>
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
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "change" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:change.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php if (isset($_smarty_tpl->tpl_vars['schedule']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:change_show.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "add" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:add.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!--                改-->
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "search_by_time" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:search_by_time.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!--                改-->
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "show_unfinished" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['thing_to_do']->value)) {?>
                <?php if ($_smarty_tpl->tpl_vars['thing_to_do']->value != '') {?>
                <?php $_smarty_tpl->_subTemplateRender('file:show_schedule_unfinished.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php }?>
                <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "registered" || $_smarty_tpl->tpl_vars['op']->value == "registered_insert") {?>
                <div style="max-width: 500px;margin: auto;">
                    <?php $_smarty_tpl->_subTemplateRender('file:registered.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "show_Today" && $_smarty_tpl->tpl_vars['isuser']->value != false) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:today.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
