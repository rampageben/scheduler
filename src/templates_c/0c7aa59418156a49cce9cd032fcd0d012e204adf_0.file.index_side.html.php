<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-28 09:35:50
  from 'C:\Users\ASUS\WebstormProjects\scheduler\src\templates\index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_658d4176140349_71024815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c7aa59418156a49cce9cd032fcd0d012e204adf' => 
    array (
      0 => 'C:\\Users\\ASUS\\WebstormProjects\\scheduler\\src\\templates\\index_side.html',
      1 => 1702908526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658d4176140349_71024815 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-default" id='panel'>
    <div class="panel-heading" id="panel-heading"></div>
    <div class="panel-body" id="panel-body">
        <?php if ($_smarty_tpl->tpl_vars['isuser']->value) {?>
        <div class='alert alert-success text-center' id="welcome_user_info">Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
<br></div>
        <a class="btn btn-block btn-danger" href="user.php?op=logout">登出</a>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['isuser']->value) {?>
        <div class='alert alert-warning'>登入以使用更多功能</div>
        <a class="btn btn-block btn-info" href="user.php?op=login">登入</a>
        <?php }?>
        <!-- <?php if ($_smarty_tpl->tpl_vars['isadmin']->value) {?>
        <a href="tool.php?op=list" class="btn btn-block btn-success">內容</a>
        <?php }?> -->

    </div>
</div><?php }
}
