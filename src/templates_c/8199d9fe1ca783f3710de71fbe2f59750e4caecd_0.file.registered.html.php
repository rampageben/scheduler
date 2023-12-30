<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-30 20:05:54
  from 'D:\scheduler\src\templates\registered.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_659007a26eb7e4_94363839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8199d9fe1ca783f3710de71fbe2f59750e4caecd' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\registered.html',
      1 => 1703919144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_659007a26eb7e4_94363839 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>用戶註冊</h2>
<br>
<form action="user.php" class="form-horizontal" id="user_form" method="POST">
    <?php if (isset($_smarty_tpl->tpl_vars['msgdanger']->value)) {?>
    <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msgdanger']->value;?>
</b>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['msgsuccess']->value)) {?>
    <b class="text-success">●<?php echo $_smarty_tpl->tpl_vars['msgsuccess']->value;?>
</b>
    <?php }?>
    <br>
    <div class="form-group">
        <label for="user_id">帳號</label>
        <input class="form-control" id="user_id" name="user_id" placeholder="請輸入帳號" required type="text">
    </div>
    <div class="form-group">
        <label for="user_pw">密碼</label>
        <input class="form-control" id="user_pw" name="user_pw" placeholder="請輸入密碼" required type="password">
    </div>
    <div class="form-group">
        <label for="nickname">暱稱</label>
        <input class="form-control" id="nickname" name="nickname" placeholder="請輸入暱稱" required type="text">
    </div>
    <div class="form-group">
        <label for="gmail">Email</label>
        <input class="form-control" id="gmail" name="gmail" placeholder="abc@example.com" required type="text">
    </div>

    <div class="form-group">
        <input id="registered_insert" name="op" type="hidden" value="registered_insert">
        <input class="btn btn-primary" type="submit" value="註冊">
        <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
        <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
        <?php }?>
    </div>

</form><?php }
}
