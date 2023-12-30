<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $user_id = isset($_REQUEST['user_id']) ? filter_var($_REQUEST['user_id'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $unfinished = isset($_REQUEST['unfinished']) ? filter_var($_REQUEST['unfinished'],FILTER_SANITIZE_SPECIAL_CHARS) : '';

    if($isuser==false){
        $msg = '請先登入';
    }else if($unfinished !=''){
        check_finished($unfinished);
        $op = 'show_unfinished';
        $smarty->assign('op',$op);
    }else{
        show_schedule_unfinished();
    }
	require("footer.php");

	function show_schedule_unfinished(){
        global $smarty, $mysqli,$op,$user_id, $msg;
        $op = 'show_unfinished';
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `user_list` WHERE `user_id` LIKE '%{$user_id}%'";
        $result = $mysqli->query($sql) or die("在查詢用戶時發生錯誤".$mysqli->error);
        $user_schedule = $result->fetch_assoc();
        $user_schedule = explode(",",$user_schedule['schedule_index']);
        $k = 0;

        for($i = 0;$i<count($user_schedule);$i++){
            $sql = "SELECT * FROM `dolist` WHERE `Index_schedule` = '{$user_schedule[$i]}' ";
            $todo = $mysqli->query($sql) or die("在查詢資料時發生錯誤".$mysqli->error);
            $to_do = $todo->fetch_assoc();
            if($to_do['state'] == 0){
               $thing_to_do[$k]['title'] = $to_do['title'];
               $thing_to_do[$k]['Index_schedule'] = $to_do['Index_schedule'];
               $thing_to_do[$k]['location'] = $to_do['location'];
               $thing_to_do[$k]['content'] = $to_do['content'];
               $thing_to_do[$k]['begin_date_time'] = number2time($to_do['begin_date_year'],$to_do['begin_date_month'],$to_do['begin_date_day'],$to_do['begin_time_hour'],$to_do['begin_time_minute']);
               $thing_to_do[$k]['finish_date_time'] = number2time($to_do['finish_date_year'],$to_do['finish_date_month'],$to_do['finish_date_day'],$to_do['finish_time_hour'],$to_do['finish_time_minute']);
              $k++;
            }

        }

        if(isset($thing_to_do)){
            $smarty->assign('thing_to_do',$thing_to_do);
            unset($thing_to_do);
        }else{
            if(isset($thing_to_do)){
                $thing_to_do = '';
                $smarty->assign('thing_to_do',$thing_to_do);
            }
            $msg = '沒有待辦事項';
        }
        echo '{$thing_to_do}';
	}

	function check_finished($unfinished){
	    global $smarty, $mysqli,$op,$msg;
	    $op = 'show_unfinished_schedule';
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT `schedule_index` FROM `user_list` WHERE `user_id` = '{$user_id}'";
        $schedule_index =$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶資料". $mysqli->error);
        $schedule_index = $schedule_index->fetch_assoc();
        $schedule_index = $schedule_index['schedule_index'];
        $users_schedule = explode(",",$schedule_index);
        $one = 1;
        for($i = 0;$i<count($users_schedule);$i++){
            if($unfinished == $users_schedule[$i]){
                $sql = "UPDATE `dolist` SET `state` = 1 WHERE `Index_schedule` = '{$users_schedule[$i]}'";
                $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新狀態". $mysqli->error);
            }
        }
        show_schedule_unfinished();
	}
// 改
	function number2time($year,$month, $day, $hour, $minute){
        $time = date("Y-m-d H:i",mktime($hour, $minute, 0, $month, $day, $year));
        return $time;
    }
//     改
?>