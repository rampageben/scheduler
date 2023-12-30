<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-28 13:11:10
  from 'C:\scheduler\src\templates\change.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_658d73ee4e4f54_17049809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8fe682445b506500972811096926e392201efda' => 
    array (
      0 => 'C:\\scheduler\\src\\templates\\change.html',
      1 => 1703769033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658d73ee4e4f54_17049809 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>刪除</h2>
<br>
<form action="change.php" class="form-inline" method="get" style="padding-left: 70px;">
    <input id="change" name="op" type="hidden" value="change">
    <input class="form-control" id="title" name="title" placeholder="請輸入事件名稱"
           style="margin-top: 5px; margin-bottom: 3px;"
           type="text">
    <button id="search" style="width: 30px;height: 30px;" type="submit">
        <img alt="search" src="templates/web_image/search.png" width="20px">
    </button>
    <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
    <br>
    <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['msgdanger']->value)) {?>
    <br>
    <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msgdanger']->value;?>
</b>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['msgsuccess']->value)) {?>
    <br>
    <b class="text-success">●<?php echo $_smarty_tpl->tpl_vars['msgsuccess']->value;?>
</b>
    <?php }?>
</form><?php }
}
