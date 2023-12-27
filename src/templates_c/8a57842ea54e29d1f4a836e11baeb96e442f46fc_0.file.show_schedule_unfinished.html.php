<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-27 15:14:00
  from 'D:\scheduler\src\templates\show_schedule_unfinished.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_658c3f38154f92_64865112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a57842ea54e29d1f4a836e11baeb96e442f46fc' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\show_schedule_unfinished.html',
      1 => 1703690022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658c3f38154f92_64865112 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <table class="table">
        <thead>
        <h2>未完成清單</h2>
        <tr>
            <!--            改-->
            <th>標題</th>
            <th>地點</th>
            <th>起始時間</th>
            <th>結束時間</th>
            <!--            改-->
        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['thing_to_do']->value, 'thing_f');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thing_f']->value) {
?>
        <tbody>
        <tr>
            <!--            改-->
            <td><?php echo $_smarty_tpl->tpl_vars['thing_f']->value['title'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_f']->value['location'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_f']->value['begin_date_time'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_f']->value['finish_date_time'];?>
</td>
            <!--            改-->
            <td>

            <form action="show_unfinished.php" class="form-inline" method="get">
                    <input id="show_unfinished" name="op" type="hidden" value="show_unfinished">
                    <input id="unfinished" name="unfinished" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['thing_f']->value['Index_schedule'];?>
">
                    <td>
                        <button class="btn btn-danger" type="submit">完成</button>
                    </td>
                </form>
            </td>
        </tr>
        </tbody>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div>

<?php }
}
