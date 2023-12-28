<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-23 10:52:55
  from 'C:\scheduler\src\templates\registered.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6586bc075ade25_54394817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78a0832d102ad0ff6b705b5bc410e9403898466c' => 
    array (
      0 => 'C:\\scheduler\\src\\templates\\registered.html',
      1 => 1703328771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6586bc075ade25_54394817 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>用戶註冊</h1>
<br>
<form action="user.php" method="POST" class="form-horizontal" id="user_form">
    <div class="form-group">
        <label for="user_id">帳號</label>
        <input type="text" class="form-control" name="user_id" id="user_id" placeholder="請輸入帳號" required>
    </div>
    <div class="form-group">
        <label for="user_pw">密碼</label>
        <input class="form-control" id="user_pw" name="user_pw" type="password" placeholder="請輸入密碼" required>
    </div>
    <div class="form-group">
        <label for="nickname">暱稱</label>
        <input class="form-control" id="nickname" name="nickname" type="text" placeholder="請輸入暱稱" required>
    </div>
    <div class="form-group">
        <label for="gmail">Email</label>
        <input class="form-control" id="gmail" name="gmail" type="text" placeholder="abc@example.com" required>
    </div>

    <div class="form-group">
        <input type="hidden" name="op" value="registered_insert" id="registered_insert">
        <input type="submit" class="btn btn-primary" value="註冊">
        <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
        <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
        <?php }?>
    </div>

</form><?php }
}
