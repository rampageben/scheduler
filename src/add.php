<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$event_title = isset($_REQUEST['event_title']) ? filter_var($_REQUEST['event_title'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$event_content = isset($_REQUEST['event_content']) ? filter_var($_REQUEST['event_content'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$event_location = isset($_REQUEST['event_location']) ? filter_var($_REQUEST['event_location'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_year = isset($_REQUEST['begin_year']) ? filter_var($_REQUEST['begin_year'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_month= isset($_REQUEST['begin_month']) ? filter_var($_REQUEST['begin_month'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_day = isset($_REQUEST['begin_day']) ? filter_var($_REQUEST['begin_day'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_hour = isset($_REQUEST['begin_hour']) ? filter_var($_REQUEST['begin_hour'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_minute = isset($_REQUEST['begin_minute']) ? filter_var($_REQUEST['begin_minute'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_year = isset($_REQUEST['end_year']) ? filter_var($_REQUEST['end_year'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_month= isset($_REQUEST['end_month']) ? filter_var($_REQUEST['end_month'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_day = isset($_REQUEST['end_day']) ? filter_var($_REQUEST['end_day'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_hour = isset($_REQUEST['end_hour']) ? filter_var($_REQUEST['end_hour'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_minute = isset($_REQUEST['end_minute']) ? filter_var($_REQUEST['end_minute'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
if ($isuser == false) {
    $msg = '請先登入';
}else{
    if($op == 'addevent'){
        addevent($_POST['event_title'], $_POST['event_content'], $_POST['event_location'], $_POST['begin_year'], $_POST['begin_month'],$_POST['begin_day'],$_POST['begin_hour'],$_POST['begin_minute'] , $_POST['end_year'], $_POST['end_month'], $_POST['end_day'],$_POST['end_hour'],$_POST['end_minute']);
        $op = 'add';
        $smarty->assign('op', $op );
    }
}


require("footer.php");


function addevent($event_title, $event_content, $event_location, $begin_year, $begin_month,$begin_day,$begin_hour,$begin_minute , $end_year, $end_month, $end_day,$end_hour,$end_minute){
    global $smarty, $mysqli;
   $op = 'add';
    if($event_title == '' || $event_content == '' || $event_location == '' || $begin_year == '' || $begin_month == '' || $begin_day == '' ||$begin_hour == '' ||$begin_minute == '' || $end_year == '' || $end_month == '' || $end_day == ''|| $end_hour == ''|| $end_minute == ''){
        //echo 'Please fill in all fields!';
        $msgdanger = 'Please fill in all fields!';
        $smarty->assign('msgdanger', $msgdanger );
        return;
    }
    $begin_date = number2time($begin_year,$begin_month,$begin_day,$begin_hour,$begin_minute);
    $end_date = number2time($end_year,$end_month,$end_day,$end_hour,$end_minute);
    if($begin_date > $end_date){
        //echo 'Please check your begin date and end date!';
        $msgdanger = 'Please check your begin date and end date!';
        $smarty->assign('msgdanger', $msgdanger );
        return;
    }
    $sql = "INSERT INTO dolist (`title`,`content`,`location`,`state`,`begin_date_year`,`begin_date_month`,`begin_date_day`,`begin_time_hour`,`begin_time_minute`,`finish_date_year`,`finish_date_month`,`finish_date_day`,`finish_time_hour`,`finish_time_minute`) VALUES ('$event_title','$event_content','$event_location','0','$begin_year','$begin_month','$begin_day','$begin_hour','$begin_minute','$end_year','$end_month','$end_day','$end_hour','$end_minute')";
    $result = $mysqli->query($sql) or die("在加入資料庫時發生錯誤,無法加入事件" . $mysqli->error);
    $sql = "SELECT `Index_schedule` FROM `dolist` WHERE `title` = '{$event_title}'";
    $result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,無法查詢事件" . $mysqli->error);
    $result = $result->fetch_assoc();
    $Index_schedule = $result['Index_schedule'];
    $user_id = $_SESSION['user_id'];
//     echo $user_id;
    $sql = "SELECT `schedule_index` From user_list WHERE `user_id` = '{$user_id}'";
    $user_list = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,無法查詢用戶事件清單" . $mysqli->error);
    $user_list = $user_list->fetch_assoc();
    $schedule_list = $user_list['schedule_index'];
    $schedule_list = $schedule_list .',' .$Index_schedule ;
    $sql = "UPDATE `user_list` SET `schedule_index` = '{$schedule_list}' WHERE `user_id` = '{$user_id}'";
    $result = $mysqli->query($sql) or die("在更新資料庫時發生錯誤,無法更新用戶清單" . $mysqli->error);
    if(!$result){
        $msgdanger = '加入失敗';
        $smarty->assign('msgdanger', $msgdanger );
    }
    else{
        $msgsuccess = '加入成功';
        $smarty->assign('msgsuccess', $msgsuccess );
    }

}

function number2time($year,$month, $day, $hour, $minute){
    $time = date("Y-m-d H:i",mktime($hour, $minute, 0, $month, $day, $year));
    return $time;
}


?>