<?php
    require_once('header.php');
    date_default_timezone_set('Asia/Taipei');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $journey = isset($_REQUEST['journey']) ? filter_var($_REQUEST['journey'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $Year = isset($_REQUEST['year']) ? filter_var($_REQUEST['year'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $Month = isset($_REQUEST['month']) ? filter_var($_REQUEST['month'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $Day = isset($_REQUEST['day']) ? filter_var($_REQUEST['day'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $today = date('Y/m/d H:i:s');
    $timestamp = strtotime($today);
    $dateYear = date('Y', $timestamp);
    $dateMonth = date('m', $timestamp);
    $dateDay = date('d', $timestamp);

    show_schedule();
    require("footer.php");

    function show_schedule(){
        global $smarty, $mysqli,$journey,$op,$msg,$today,$year,$month,$day,$dateYear,$dateMonth,$dateDay;
        $op = 'show';
        $sql = "SELECT * FROM `dolist` WHERE `year` LIKE '%{$begin_date_year}%' "
        $year=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程". $mysqli->error);
        if(mysqli_num_rows($year) != 0){
            $sql = "SELECT * FROM `dolist` WHERE ``month` LIKE '%{$begin_date_month}%'"
            $month=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程". $mysqli->error);
            if(mysqli_num_rows($year) != 0){
                $sql = "SELECT * FROM `dolist` WHERE `day` LIKE '%{$begin_date_day}%' "
                $month=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程". $mysqli->error);
//         //改
//             if($class_id!='' && $class_name == '' || $class_id!='' && $class_teacher == ''){
//         //改
//                 $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$class_id}%' ORDER BY `course_id` ASC";
//                 $course=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程". $mysqli->error);
//                 if (mysqli_num_rows($course) != 0) {
//                     $i = 0;
//                     while ($class = $course->fetch_assoc()) {
//                         $all_class[$i] = $class;
//                         $all_class[$i]['course_time'] = checktime($class['course_time1'],$class['course_time2'],$class['course_time3']);
//                         $all_class[$i]['course_room'] = checkroom($class['course_room1'],$class['course_room2'],$class['course_room3']);
//                         $all_class[$i]['course_people'] = $class['course_quotaPick'].'/'.$class['course_quota'];
//                         $i++;
//                     }
//                     $smarty->assign('all_class',$all_class);
//                     $op='search_result';
//                 }
//                 else{
//                     $msg = '查無資料';
//                 }
//                 $smarty->assign('class_id',$class_id);
//             }
//             //改
//             else if($class_name != ''&& $class_id == '' || $class_name != ''&& $class_teacher == ''){
//             //改
//                 $sql = "SELECT * FROM `course_data` WHERE `course_name` LIKE '%{$class_name}%' ";
//                 $course_name=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程". $mysqli->error);
//                 if (mysqli_num_rows($course_name) != 0) {
//                     $i = 0;
//                     while ($class = $course_name->fetch_assoc()) {
//                         $all_class[$i] = $class;
//                         $all_class[$i]['course_time'] = checktime($class['course_time1'],$class['course_time2'],$class['course_time3']);
//                         $all_class[$i]['course_room'] = checkroom($class['course_room1'],$class['course_room2'],$class['course_room3']);
//                         $all_class[$i]['course_people'] = $class['course_quotaPick'].'/'.$class['course_quota'];
//                         $i++;
//                     }
//                     $smarty->assign('all_class',$all_class);
//                     $op='search_class_result';
//                 }
//                 else{
//                     $msg = '查無資料';
//                 }
//                 $smarty->assign('class_name',$class_name);
//             }
//             //改
//             else if($class_teacher != '' && $class_id == '' || $class_teacher != '' && $class_name == ''){
//             //改
//                 $sql = "SELECT * FROM `course_data` WHERE `course_teacher` LIKE '%{$class_teacher}%' ";
//                 $course_teacher=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到查詢課程". $mysqli->error);
//                 if (mysqli_num_rows($course_teacher) != 0) {
//                     $i = 0;
//                     while ($class = $course_teacher->fetch_assoc()) {
//                         $all_class[$i] = $class;
//                         $all_class[$i]['course_time'] = checktime($class['course_time1'],$class['course_time2'],$class['course_time3']);
//                         $all_class[$i]['course_room'] = checkroom($class['course_room1'],$class['course_room2'],$class['course_room3']);
//                         $all_class[$i]['course_people'] = $class['course_quotaPick'].'/'.$class['course_quota'];
//                         $i++;
//                     }
//                     $smarty->assign('all_class',$all_class);
//                     $op='search_class_teacher';
//                 }
//                 else{
//                     $msg = '查無資料';
//                 }
//                 $smarty->assign('class_teacher',$class_teacher);
//             }
//         }
//     }
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