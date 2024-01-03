<?php
/* Smarty version 3.1.34-dev-7, created on 2024-01-03 11:37:32
  from 'D:\scheduler\src\templates\change_show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6594d67ce92528_79359445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bcaa73296e56e95e6b05e1e839d5cd5ef765930' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\change_show.html',
      1 => 1704253051,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6594d67ce92528_79359445 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table">
    <thead>
    <tr>
        <th>名稱</th>
        <th>內容</th>
        <th>地點</th>
        <th>起始時間</th>
        <th>結束時間</th>
        <th>是否執行</th>
        <th>刪除</th>

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
        <form action="change.php" class="form-inline" method="get">
            <input id="change" name="op" type="hidden" value="change">
            <?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?>
            <input class="form-control" id="title" name="title" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
            <?php }?>
            <input id="chose_id" name="chose_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['Index_schedule'];?>
">
            <td>
                <button class="btn btn-danger" type="submit">刪除</button>
            </td>
        </form>

    </tr>
    </tbody>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
