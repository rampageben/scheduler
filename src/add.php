<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$event_title = isset($_REQUEST['event_title']) ? filter_var($_REQUEST['event_title'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$event_content = isset($_REQUEST['event_content']) ? filter_var($_REQUEST['event_content'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$event_location = isset($_REQUEST['event_location']) ? filter_var($_REQUEST['event_location'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_year = isset($_REQUEST['begin_year']) ? filter_var($_REQUEST['begin_year'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_month= isset($_REQUEST['begin_month']) ? filter_var($_REQUEST['begin_month'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$begin_day = isset($_REQUEST['begin_day']) ? filter_var($_REQUEST['begin_day'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_year = isset($_REQUEST['end_year']) ? filter_var($_REQUEST['end_year'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_month= isset($_REQUEST['end_month']) ? filter_var($_REQUEST['end_month'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$end_day = isset($_REQUEST['end_day']) ? filter_var($_REQUEST['end_day'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
if ($isuser == false) {
    $msg = '請先登入';
}else{
    if($op == 'addevent'){
        addevent($event_title, $event_content, $event_location, $begin_year, $begin_month, $begin_day, $end_year, $end_month, $end_day);
    }
}


require("footer.php");


function addevent($event_title, $event_content, $event_location, $begin_year, $begin_month, $begin_day, $end_year, $end_month, $end_day){
    global $smarty, $mysqli;
   $op = 'add';
    if($event_title == '' || $event_content == '' || $event_location == '' || $begin_year == '' || $begin_month == '' || $begin_day == '' || $end_year == '' || $end_month == '' || $end_day == ''){
        //echo 'Please fill in all fields!';
        $msgdanger = 'Please fill in all fields!';
        $smarty->assign('msgdanger', $msgdanger );
        return;
    }
    $begin_date = $begin_year . '-' . $begin_month . '-' . $begin_day;
    $end_date = $end_year . '-' . $end_month . '-' . $end_day;
    $sql = "INSERT INTO events (event_title, event_content, event_location, begin_date, end_date) VALUES ('$event_title', '$event_content', '$event_location', '$begin_date', '$end_date')";
    $result = $mysqli->query($sql) or die("在加入資料庫時發生錯誤,無法加入事件" . $mysqli->error);
    if(!$result){
//         echo 'Error: ' . mysql_error();
        $msgdanger = '加入失敗';
        $smarty->assign('msgdanger', $msgdanger );
    }
    else{
//         echo 'Event added successfully!';
        $msgsuccess = '加入成功';
        $smarty->assign('msgsuccess', $msgsuccess );
    }
}

?>