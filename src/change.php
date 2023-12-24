<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
$title = isset($_REQUEST['title']) ? filter_var($_REQUEST['title'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$chose_id = isset($_REQUEST['chose_id']) ? filter_var($_REQUEST['chose_id'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
// $startmonth = isset($_REQUEST['startmonth']) ? filter_var($_REQUEST['startmonth'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$tmp = 0;
if ($isuser == false) {
    $msg = '請先登入';
} else{
    show_search();
    if($chose_id!=''){
        delevent($chose_id);
    }
}



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
    $k = 0;
    $today = date("Y-m-d H:i");
    for ($i = 0; $i < count($user_list); $i++) {
        $sql = "SELECT * FROM `dolist` WHERE `Index_schedule` = '{$user_list[$i]}'";
        $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到做事清單" . $mysqli->error);
        $result = $result->fetch_assoc();
        $begin_date_time= number2time($result['begin_date_year'],$result['begin_date_month'],
                                               $result['begin_date_day'],$result['begin_time_hour'],$result['begin_time_minute']);
        if($today < $begin_date_time){
            if($title != ''){
                if(strpos($result['title'], $title) !== false){
                    $schedule[$k] = $result;
                    $schedule[$k]['begin_date_time'] = number2time($result['begin_date_year'],$result['begin_date_month'],
                                                    $result['begin_date_day'],$result['begin_time_hour'],$result['begin_time_minute']);
                    $schedule[$k]['finish_date_time'] = number2time($result['finish_date_year'],$result['finish_date_month'],
                                                    $result['finish_date_day'],$result['finish_time_hour'],$result['finish_time_minute']);
                    $k++;
                }
            }else{
                $schedule[$k] = $result;
                $schedule[$k]['begin_date_time'] = number2time($result['begin_date_year'],$result['begin_date_month'],
                                                  $result['begin_date_day'],$result['begin_time_hour'],$result['begin_time_minute']);
                $schedule[$k]['finish_date_time'] = number2time($result['finish_date_year'],$result['finish_date_month'],
                                                  $result['finish_date_day'],$result['finish_time_hour'],$result['finish_time_minute']);
                $k++;
            }

        }
    }
    if(isset($title)){
        $smarty->assign('title', $title);
    }
    if(isset($schedule)){
        $smarty->assign('schedule', $schedule);
    }
}

function delevent($chose_id){
    global $smarty, $mysqli, $op, $msg, $isuser, $title;
    $op = 'change';
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `user_list` WHERE `user_id` = '{$user_id}'";
    $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶做事清單" . $mysqli->error);
    $result = $result->fetch_assoc();
    $user_list = $result['schedule_index'];
    $user_list = splitStringToArray($user_list);

    if(in_array($chose_id, $user_list)){
        $key = array_search($chose_id, $user_list);
        unset($user_list[$key]);
        $user_list = implode(",", $user_list);
        $sql = "UPDATE `user_list` SET `schedule_index` = '{$user_list}' WHERE `user_id` = '{$user_id}'";
        $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新用戶做事清單" . $mysqli->error);
        $msgsuccess = '刪除成功';
        $smarty->assign('msgsuccess', $msgsuccess );
        $chose_id = '';
        show_search();
    }else{
        $msgdanger = '刪除失敗';
        $smarty->assign('msgdanger', $msgdanger );
    }
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
