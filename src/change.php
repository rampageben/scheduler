<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$title = isset($_REQUEST['title']) ? filter_var($_REQUEST['title'], FILTER_SANITIZE_SPECIAL_CHARS) : '';


show_search();


require("footer.php");




function show_search(){
    global $smarty, $mysqli, $op, $msg, $isuser, $title;
    $op = 'change';
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `user_list` WHERE `user_id` = '{$user_id}'";
    $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶做事清單" . $mysqli->error);
    $result = $result->fetch_assoc();
    $user_list = $result['schedule_index'];
    $user_list = splitStringToArray($user_list);
    for ($i = 0; $i < count($user_list); $i++) {
        $sql = "SELECT * FROM `dolist` WHERE `index` = '{$user_list[$i]}'";
        $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到做事清單" . $mysqli->error);
        $result = $result->fetch_assoc();
        $schedule[$i] = $result;
        $schedule[$i]['begin_date_time'] = number2time($result['begin_date_year'],$result['begin_date_month'],
                                        $result['begin_date_day'],$result['begin_time_hour'],$result['begin_time_minute']);
        $schedule[$i]['finish_date_time'] = number2time($result['finish_date_year'],$result['finish_date_month'],
                                                $result['finish_date_day'],$result['finish_time_hour'],$result['finish_time_minute']);
    }
    $smarty->assign('schedule', $schedule);
}


function splitStringToArray($inputString) {
    // 使用逗號作為分隔符分割字串
    $array = explode(",", $inputString);
    return $array;
}

function number2time($year,$month, $day, $hour, $minute){
    $time = date("Y-m-d H:i",mktime($hour, $minute, 0, $month, $day, $year));
    return $time;
}

?>
