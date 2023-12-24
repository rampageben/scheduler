<?php
    require_once('header.php');
    date_default_timezone_set('Asia/Taipei');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $journey = isset($_REQUEST['journey']) ? filter_var($_REQUEST['journey'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $Year = isset($_REQUEST['year']) ? filter_var($_REQUEST['year'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $Month = isset($_REQUEST['month']) ? filter_var($_REQUEST['month'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $Day = isset($_REQUEST['day']) ? filter_var($_REQUEST['day'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $all_journey = isset($all_journey)?$all_journey:array();

    // 顯示今日的年月日和時間
    $today = date('Y/m/d H:i:s');
    echo "今天是：" . date('Y年m月d日') . "，現在時間：" . date('H時i分');

    $timestamp = strtotime($today);
    $dateYear = date('Y', $timestamp);
    $dateMonth = date('m', $timestamp);
    $dateDay = date('d', $timestamp);

    if ($isuser == false) {
        $msg = '請先登入';
    } else {
        show_schedule();
    }

    require("footer.php");

    function show_schedule(){
        global $smarty, $mysqli, $journey, $op, $msg, $today, $dateYear, $dateMonth, $dateDay;
        // 查詢今日的行程
        $sql = "SELECT * FROM `dolist` WHERE `year` = '{$dateYear}' AND `month` = '{$dateMonth}' AND `day` = '{$dateDay}'";
        $result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
        if(mysqli_num_rows($result) != 0){
            $i = 0;
            while ($schedule = $result->fetch_assoc()) {
                $all_journey[$i] = $schedule;
                $all_journey[$i]['time'] = checktime($class['time1'],$class['time2'],$class['time3']);
                //$all_journey[$i]['course_room'] = checkroom($class['course_room1'],$class['course_room2'],$class['course_room3']);
                //$all_journey[$i]['course_people'] = $class['course_quotaPick'].'/'.$class['course_quota'];
                $i++;
            }
            // 將行程資料傳遞給模板
            $smarty->assign('all_journey', $all_journey);
        } else {
            // 沒有行程的處理方式
            $msg = '今天沒有行程';
        }
    }


    function checkroom($room1,$room2,$room3){
        $room = '';
        if($room1!=''){
            $room =  $room.$room1;}
        if($room2!=''){
            $room =  $room.','.$room2;}
        if($room3!=''){
            $room=  $room.','.$room3;}
        return $room;
    }

    function checktime($time1,$time2,$time3){
        $time = '';
        if($time1!=''){
            $time =  $time.changetime($time1);}
        if($time2!=''){
            $time =  $time.','.changetime($time2);}
        if($time3!=''){
            $time=  $time.','.changetime($time3);}
        return $time;
    }
    function changetime($orgtime){
        if($orgtime==''){
            return '';}
        $week = substr($orgtime,0,1);
        $time = substr($orgtime,1,2);
        switch($week){
            case '1':
                $week = '星期一';
                break;
            case '2':
                $week = '星期二';
                break;
            case '3':
                $week = '星期三';
                break;
            case '4':
                $week = '星期四';
                break;
            case '5':
                $week = '星期五';
                break;
            case '6':
                $week = '星期六';
                break;
            case '7':
                $week = '星期日';
                break;
            default:
                $week = '';
                break;
        }
        return $week.'第'.$time.'節';
    }
?>