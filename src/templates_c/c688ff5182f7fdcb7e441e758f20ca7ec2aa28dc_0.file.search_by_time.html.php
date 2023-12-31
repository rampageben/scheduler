<?php
/* Smarty version 3.1.34-dev-7, created on 2024-01-03 11:36:45
  from 'D:\scheduler\src\templates\search_by_time.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6594d64d719d21_71868941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c688ff5182f7fdcb7e441e758f20ca7ec2aa28dc' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\search_by_time.html',
      1 => 1704253003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6594d64d719d21_71868941 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>依時間搜尋</h2>
<br>
<form action="show_by_time.php" class="form-horizontal" id="user_form" method="POST">

    <?php echo '<script'; ?>
>
        function updateDays(selectYearId, selectMonthId, selectDayId, defaultDay) {
            var year = parseInt(document.getElementById(selectYearId).value, 10);
            var month = parseInt(document.getElementById(selectMonthId).value, 10);
            var daySelect = document.getElementById(selectDayId);

            var daysInMonth = new Date(year, month, 0).getDate();
            daySelect.innerHTML = '';

            for (var i = 1; i <= daysInMonth; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                daySelect.appendChild(option);
            }

            // 設置預設的日
            daySelect.value = defaultDay;
        }

        function fillNumbers(selectElement, start, end) {
            for (var i = start; i <= end; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                selectElement.appendChild(option);
            }
        }

        function updateDateTime() {
            var beginDateTime = new Date(
                document.getElementById("begin_year").value,
                document.getElementById("begin_month").value - 1,
                document.getElementById("begin_day").value,
                document.getElementById("begin_hour").value,
                document.getElementById("begin_minute").value
            );
        }

        window.onload = function () {
            var beginYearSelect = document.getElementById("begin_year");
            var beginMonthSelect = document.getElementById("begin_month");
            var beginDaySelect = document.getElementById("begin_day");
            var beginHourSelect = document.getElementById("begin_hour");
            var beginMinuteSelect = document.getElementById("begin_minute");


            for (var i = 2050; i >= 2000; i--) {
                var option1 = document.createElement("option");
                var option2 = document.createElement("option");
                option1.value = option2.value = i;
                option1.textContent = option2.textContent = i;
                beginYearSelect.appendChild(option1);
            }

            for (var i = 1; i <= 12; i++) {
                var option1 = document.createElement("option");
                var option2 = document.createElement("option");
                option1.value = option2.value = i;
                option1.textContent = option2.textContent = i;
                beginMonthSelect.appendChild(option1);
            }

            fillNumbers(beginHourSelect, 0, 23);
            fillNumbers(beginMinuteSelect, 0, 59);


            // 獲取當前時間
            var now = new Date();

            // 設置開始時間為當前時間
            beginYearSelect.value = now.getFullYear();
            beginMonthSelect.value = now.getMonth() + 1;
            updateDays('begin_year', 'begin_month', 'begin_day', now.getDate());
            beginHourSelect.value = now.getHours();
            beginMinuteSelect.value = now.getMinutes();


            beginYearSelect.onchange = function () {
                updateDays('begin_year', 'begin_month', 'begin_day', 1);
                updateDateTime();
            };

            beginMonthSelect.onchange = function () {
                updateDays('begin_year', 'begin_month', 'begin_day', 1);
                updateDateTime();
            };
            beginDaySelect.onchange = function () {
                updateDateTime();
            };

            beginHourSelect.onchange = function () {
                updateDateTime();
            };
            beginMinuteSelect.onchange = function () {
                updateDateTime();
            };
        };
    <?php echo '</script'; ?>
>

    <label for="begin_year">選擇開始 年:</label>
    <select id="begin_year" name="begin_year"></select>

    <label for="begin_month">月:</label>
    <select id="begin_month" name="begin_month"></select>

    <label for="begin_day">日:</label>
    <select id="begin_day" name="begin_day"></select>

    <label for="begin_hour">小時:</label>
    <select id="begin_hour" name="begin_hour"></select>

    <label for="begin_minute">分鐘:</label>
    <select id="begin_minute" name="begin_minute"></select>
    <br>


    <div class="form-group">
        <input id="search" name="op" type="hidden" value="search">
        <input class="btn btn-primary" type="submit" value="搜尋">

    </div>
</form>
<?php if (isset($_smarty_tpl->tpl_vars['show_result']->value)) {?>
<div>
    <table class="table">
        <thead>
        <h2>結果</h2>
        <tr>
            <th>名稱</th>
            <th>內容</th>
            <th>地點</th>
            <th>起始時間</th>
            <th>結束時間</th>
            <th>狀態</th>
        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['show_result']->value, 'thing_a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thing_a']->value) {
?>
        <tbody>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_a']->value['title'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_a']->value['content'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_a']->value['location'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_a']->value['begin_date_time'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_a']->value['finish_date_time'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['thing_a']->value['state'];?>
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
}
