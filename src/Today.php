<?php
    require_once('header.php');
    date_default_timezone_set('Asia/Taipei');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $user_id = isset($_REQUEST['user_id']) ? filter_var($_REQUEST['user_id'], FILTER_SANITIZE_SPECIAL_CHARS) : '';

    // 顯示今日的年月日和時間
    $today = date('Y/m/d');

    if ($isuser == false) {
         $msg = '請先登入';
    }else {
        show_schedule();
    }
    require("footer.php");

    function show_schedule(){
        global $smarty, $mysqli, $op, $schedule, $msg, $today, $dateYear, $dateMonth, $dateDay,$user_id;
        // 查詢今日的行程
        $op = 'show_Today';
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT `schedule_index` FROM `user_list` WHERE `user_id` = '{$user_id}'";
        $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶做事清單" . $mysqli->error);
        $user_schedule = $result->fetch_assoc();
        $user_schedule = explode(",",$user_schedule['schedule_index']);
        $k = 0;

        for($i = 0;$i<count($user_schedule);$i++){
            $sql = "SELECT * FROM `dolist` WHERE `Index_schedule` = '{$user_schedule[$i]}'";
            $do = $mysqli->query($sql) or die("在查詢資料時發生錯誤".$mysqli->error);
            $list = $do->fetch_assoc();
            //echo number1time($list['begin_date_year'],$list['begin_date_month'],$list['begin_date_day']);
            if($today == number1time($list['begin_date_year'],$list['begin_date_month'],$list['begin_date_day'])){
                $schedule[$k] = $list;
                $schedule[$k]['title'] = $list['title'];
                $schedule[$k]['content'] = $list['content'];
                $schedule[$k]['location'] = $list['location'];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ['location'];
                $schedule[$k]['begin_date_time'] = number2time($list['begin_date_year'],$list['begin_date_month'],$list['begin_date_day'],$list['begin_time_hour'],$list['begin_time_minute']);
                $schedule[$k]['finish_date_time'] = number2time($list['finish_date_year'],$list['finish_date_month'],$list['finish_date_day'],$list['finish_time_hour'],$list['finish_time_minute']);
                $k++;
            }
        }
        if(isset($schedule)){
            $smarty->assign('schedule',$schedule);
        }
    }

    function number2time($year,$month, $day, $hour, $minute){
        $time = date("Y-m-d H:i",mktime($hour, $minute, 0, $month, $day, $year));
        return $time;
    }
    function number1time($year,$month, $day){
        $time = date("Y/m/d",mktime(0,0,0,$month, $day, $year));
        return $time;
    }
?>