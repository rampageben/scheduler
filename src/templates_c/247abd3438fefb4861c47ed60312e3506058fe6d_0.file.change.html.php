<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-19 09:40:33
  from 'D:\scheduler\src\templates\change.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_65816511b24590_26255604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '247abd3438fefb4861c47ed60312e3506058fe6d' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\change.html',
      1 => 1702978828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65816511b24590_26255604 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>修改</h2>
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
