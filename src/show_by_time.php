<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $user_id = isset($_REQUEST['user_id']) ? filter_var($_REQUEST['user_id'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $begin_year = isset($_REQUEST['begin_year']) ? filter_var($_REQUEST['begin_year'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $begin_month= isset($_REQUEST['begin_month']) ? filter_var($_REQUEST['begin_month'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $begin_day = isset($_REQUEST['begin_day']) ? filter_var($_REQUEST['begin_day'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $begin_hour = isset($_REQUEST['begin_hour']) ? filter_var($_REQUEST['begin_hour'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $begin_minute = isset($_REQUEST['begin_minute']) ? filter_var($_REQUEST['begin_minute'], FILTER_SANITIZE_SPECIAL_CHARS) : '';

    if ($isuser == false) {
        $msg = '請先登入';
    } else{
        if($op == 'search'){
            show_search($_POST['begin_year'], $_POST['begin_month'],$_POST['begin_day'],$_POST['begin_hour'],$_POST['begin_minute']);
            $op = 'search_by_time';
            $smarty->assign('op', $op );
        }
    }
    require("footer.php");

    function show_search($begin_year, $begin_month,$begin_day,$begin_hour,$begin_minute){
        global $smarty, $mysqli, $op, $msg;
        $op = 'search_by_time';
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `user_list` WHERE `user_id` = '{$user_id}'";
        $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶做事清單" . $mysqli->error);
        $result = $result->fetch_assoc();
        $user_list = $result['schedule_index'];
        $user_list = splitStringToArray($user_list);
        $begin_date = number2time($begin_year,$begin_month,$begin_day,$begin_hour,$begin_minute);
        $k = 0;
        for ($i = 0; $i < count($user_list); $i++) {
            $sql = "SELECT * FROM `dolist` WHERE `Index_schedule` = '{$user_list[$i]}'";
            $result= $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到做事清單" . $mysqli->error);
            $result = $result->fetch_assoc();
            $begin_date_time= number2time($result['begin_date_year'],$result['begin_date_month'],$result['begin_date_day'],$result['begin_time_hour'],$result['begin_time_minute']);


            if($begin_date_time >= $begin_date){
                $show_result[$k]['title'] = $result['title'];
                $show_result[$k]['Index_schedule'] = $result['Index_schedule'];
                $show_result[$k]['title'] = $result['title'];
                $show_result[$k]['location'] = $result['location'];
                $show_result[$k]['content'] = $result['content'];
                $show_result[$k]['begin_date_time'] = number2time($result['begin_date_year'],$result['begin_date_month'],$result['begin_date_day'],$result['begin_time_hour'],$result['begin_time_minute']);
                $show_result[$k]['finish_date_time'] = number2time($result['finish_date_year'],$result['finish_date_month'],$result['finish_date_day'],$result['finish_time_hour'],$result['finish_time_minute']);
                if($result['state'] == 1){
                    $show_result[$k]['state'] = '完成';
                }else{
                    $show_result[$k]['state'] = '未完成';
                }
                $k++;
            }
        }
        if(isset($show_result)){
            $smarty->assign('show_result',$show_result);
        }else{
            $msg = '查無資料';
            $smarty->assign('msg',$msg);
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