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
        $op = 'show_Today';
        $sql = "SELECT * FROM `dolist` WHERE `year` = '{$dateYear}' AND `month` = '{$dateMonth}' AND `day` = '{$dateDay}'";
        $result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程" . $mysqli->error);
        if(mysqli_num_rows($result) != 0){
            $i = 0;
            while ($schedule = $result->fetch_assoc()) {
                $all_journey[$i] = $schedule;
                $all_journey[$i]['begin_time'] = number2time($schedule['begin_date_year'],$schedule['begin_date_month'],$schedule['begin_date_day']);
                $all_journey[$i]['finish_time'] = number2time($schedule['finish_date_year'],$schedule['finish_date_month'],$schedule['finish_date_day']);
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

    function number2time($year,$month, $day, $hour, $minute){
        $time = date("Y-m-d H:i",mktime($hour, $minute, 0, $month, $day, $year));
        return $time;
    }

?>