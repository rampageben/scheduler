<?php
/* Smarty version 3.1.34-dev-7, created on 2023-12-26 14:46:14
  from 'D:\scheduler\src\templates\add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_658ae736871842_53462827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef19334c5019cb9efafebabf2f6e9f804fd0391d' => 
    array (
      0 => 'D:\\scheduler\\src\\templates\\add.html',
      1 => 1703601971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658ae736871842_53462827 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>新增</h1>
<br>

<form action="add.php" method="POST" class="form-horizontal" id="user_form">
    <div class="form-group">
        <label for="event_title">事件名稱</label>
        <input type="text" class="form-control" name="event_title" id="event_title" placeholder="請輸入事件名稱" required>
    </div>
    <div class="form-group">
        <label for="event_content">事件內容</label>
        <input type="text" class="form-control" name="event_content" id="event_content" placeholder="請輸入事件內容" required>
    </div>
    <div class="form-group">
        <label for="event_location">事件地點</label>
        <input type="text" class="form-control" name="event_location" id="event_location" placeholder="請輸入事件地點" required>
    </div>


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

            var endDateTime = new Date(
                document.getElementById("end_year").value,
                document.getElementById("end_month").value - 1,
                document.getElementById("end_day").value,
                document.getElementById("end_hour").value,
                document.getElementById("end_minute").value
            );

            if (endDateTime <= beginDateTime) {
                endDateTime = new Date(beginDateTime.getTime() + 60000); // 將結束時間設置為開始時間之後的1分鐘
                document.getElementById("end_year").value = endDateTime.getFullYear();
                document.getElementById("end_month").value = endDateTime.getMonth() + 1;
                document.getElementById("end_day").value = endDateTime.getDate();
                document.getElementById("end_hour").value = endDateTime.getHours();
                document.getElementById("end_minute").value = endDateTime.getMinutes();
            }
        }

        window.onload = function() {
            var beginYearSelect = document.getElementById("begin_year");
            var beginMonthSelect = document.getElementById("begin_month");
            var beginDaySelect = document.getElementById("begin_day");
            var beginHourSelect = document.getElementById("begin_hour");
            var beginMinuteSelect = document.getElementById("begin_minute");

            var endYearSelect = document.getElementById("end_year");
            var endMonthSelect = document.getElementById("end_month");
            var endDaySelect = document.getElementById("end_day");
            var endHourSelect = document.getElementById("end_hour");
            var endMinuteSelect = document.getElementById("end_minute");




            for (var i = 2050; i >= 2000; i--) {
                var option1 = document.createElement("option");
                var option2 = document.createElement("option");
                option1.value = option2.value = i;
                option1.textContent = option2.textContent = i;
                beginYearSelect.appendChild(option1);
                endYearSelect.appendChild(option2);
            }

            for (var i = 1; i <= 12; i++) {
                var option1 = document.createElement("option");
                var option2 = document.createElement("option");
                option1.value = option2.value = i;
                option1.textContent = option2.textContent = i;
                beginMonthSelect.appendChild(option1);
                endMonthSelect.appendChild(option2);
            }

            fillNumbers(beginHourSelect, 0, 23);
            fillNumbers(beginMinuteSelect, 0, 59);
            fillNumbers(endHourSelect, 0, 23);
            fillNumbers(endMinuteSelect, 0, 59);


            // 獲取當前時間
            var now = new Date();
            var oneHourLater = new Date(now.getTime() + 60 * 60 * 1000); // 一小時後

            // 設置開始時間為當前時間
            beginYearSelect.value = now.getFullYear();
            beginMonthSelect.value = now.getMonth() + 1;
            updateDays('begin_year', 'begin_month', 'begin_day', now.getDate());
            beginHourSelect.value = now.getHours();
            beginMinuteSelect.value = now.getMinutes();

            // 設置結束時間為開始時間一小時後
            endYearSelect.value = oneHourLater.getFullYear();
            endMonthSelect.value = oneHourLater.getMonth() + 1;
            updateDays('end_year', 'end_month', 'end_day', oneHourLater.getDate());
            endHourSelect.value = oneHourLater.getHours();
            endMinuteSelect.value = oneHourLater.getMinutes();


            beginYearSelect.onchange = function() {
                updateDays('begin_year', 'begin_month', 'begin_day',1);
                updateDateTime();
            };

            beginMonthSelect.onchange = function() {
                updateDays('begin_year', 'begin_month', 'begin_day', 1);
                updateDateTime();
            };
            beginDaySelect.onchange = function() {
                updateDateTime();
            };

            beginHourSelect.onchange = function() {
                updateDateTime();
            };
            beginMinuteSelect.onchange = function() {
                updateDateTime();
            };

            endYearSelect.onchange = function() {
                updateDays('end_year', 'end_month', 'end_day', 1);
                updateDateTime();
            };

            endMonthSelect.onchange = function() {
                updateDays('end_year', 'end_month', 'end_day', 1);
                updateDateTime();
            };

            endDaySelect.onchange = function() {
                updateDateTime();
            };

            endHourSelect.onchange = function() {
                updateDateTime();
            };

            endMinuteSelect.onchange = function() {
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
    <select id="begin_day" name="begin_month"></select>

    <label for="begin_hour">小時:</label>
    <select id="begin_hour" name="begin_hour"></select>

    <label for="begin_minute">分鐘:</label>
    <select id="begin_minute" name="begin_minute"></select>
    <br>


    <label for="end_year">選擇結束 年:</label>
    <select id="end_year" name="finish_year"></select>

    <label for="end_month">月:</label>
    <select id="end_month" name="end_month"></select>

    <label for="end_day">日:</label>
    <select id="end_day" name="end_month"></select>

    <label for="end_hour">小時:</label>
    <select id="end_hour" name="end_hour"></select>

    <label for="end_minute">分鐘:</label>
    <select id="end_minute" name="end_minute"></select>




    <div class="form-group">
        <input type="hidden" name="op" value="addevent" id="addevent">
        <input type="submit" class="btn btn-primary" value="新增">
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
    </div>

</form>
<?php }
}
