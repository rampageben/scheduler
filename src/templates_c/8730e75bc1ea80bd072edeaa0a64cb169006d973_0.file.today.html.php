<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-28 23:05:03
  from 'C:\Users\ASUS\WebstormProjects\scheduler\src\templates\today.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_658d8e9f18fc53_16197211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8730e75bc1ea80bd072edeaa0a64cb169006d973' => 
    array (
      0 => 'C:\\Users\\ASUS\\WebstormProjects\\scheduler\\src\\templates\\today.html',
      1 => 1703775901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658d8e9f18fc53_16197211 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['schedule']->value)) {?>
<table class="table">
    <thead>
    <tr>
        <th>名稱</th>
        <th>內容</th>
        <th>開始時間</th>
        <th>結束時間</th>
        <th>地點</th>
        <th>是否完成</th>
    </tr>
    </thead>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schedule']->value, 'event');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
?>
    <tbody>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['content'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['begin_date_time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['finish_date_time'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['event']->value['state'] == 1) {?>
            是
            <?php } else { ?>
            否
            <?php }?>
        </td>
    </tr>
    </tbody>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php } else { ?>
    <h2>今日無行程</h2>
<?php }
}
}
