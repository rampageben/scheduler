<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$user_number = isset($_SESSION['user_number']) ? (int)filter_var($_SESSION['user_number'], FILTER_SANITIZE_SPECIAL_CHARS) : -1;
// 改
$gmail = isset($_REQUEST['gmail']) ? filter_var($_REQUEST['gmail'],FILTER_SANITIZE_SPECIAL_CHARS) : '';

switch ($op) {
    case 'login':
        break;
    case 'loginout':
        loginout();
        break;
    case 'logout':
        logout();
        header("location:index.php?op=home");
        exit;
        break;


    case 'registered':
    	registered($user_number);
    	break;
    case 'registered_insert':
    	registered_insert();
    	$op = 'registered';
        $smarty->assign('op', $op );
    	break;

// 改
    default :
        header("location:index.php?op=home");
        exit;
        break;
}

require("footer.php");

// 改
function registered(){

}
function registered_insert(){
	global $mysqli,$msg,$smarty;
	if (empty($_POST['user_id'])) {
		$msgdanger = "請輸入帳號";
		$smarty->assign('msgdanger', $msgdanger );
		return;
	}
	else if (empty($_POST['user_pw'])) {
		$msgdanger = "請輸入密碼";
		$smarty->assign('msgdanger', $msgdanger );
		return;
	}
	else if (strpos($_POST['user_id']," ")||strpos($_POST['user_pw']," ")) {
		$msgdanger = "帳號和密碼不可包含空白";
		$smarty->assign('msgdanger', $msgdanger );
		return;
	}
	foreach ($_POST as $var_name => $var_val) {
		$$var_name = $mysqli->real_escape_string($var_val);
	}
		$sql = "SELECT * FROM `user` WHERE `user_id`='{$user_id}'";
		$result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$user = $result->fetch_assoc();
		if (!empty($user)) {
			$msgdanger = "帳號已存在";
			$smarty->assign('msgdanger', $msgdanger );
			return;
		}
		if(strpos($gmail,"@")==false){
		    $msgdanger = "請輸入正確的信箱";
		    $smarty->assign('msgdanger', $msgdanger );
		    return;
		}
        $user_pw = password_hash($_REQUEST['user_pw'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`user_id`,`user_pw`,`gmail`,`nickname`) VALUES ('{$user_id}','{$user_pw}','{$gmail}','{$nickname}')";
	    $mysqli->query($sql) or die("在加入資料庫時發生錯誤");
	    $spl = "INSERT INTO `user_list` (`user_id`) VALUES ('{$user_id}')";
        $mysqli->query($spl) or die("在加入user_list資料庫時發生錯誤");
		$user_number = $mysqli->insert_id;
		$_SESSION['user_id'] = $user_id;
		header("location:index.php?op=home");
		exit;
		//return $user_number;
}

// 改
function login()
{

}

function loginout()
{
    global $admin_array, $mysqli, $msg, $smarty;
    $user_id = filter_var($_REQUEST['user_id'], FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($user_id)) {
        if ($_POST['captcha'] != $_SESSION['captcha']) {
            $msgdanger = "驗證碼錯誤";
            $smarty->assign('msgdanger', $msgdanger );
            return;
        }
        $sql = "SELECT * FROM `user` WHERE `user_id`='{$user_id}'";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        if (password_verify($_POST['user_pw'], $user['user_pw'])) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_number'] = $user['user_number'];
            header("location:index.php?op=home");
            exit;
        } else {
            $msgdanger = "帳號或密碼錯誤";
            $smarty->assign('msgdanger', $msgdanger );
        }
    } else {
        $msgdanger = "請輸入帳號";
        $smarty->assign('msgdanger', $msgdanger );
    }
    return;
}

function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['user_number']);
}


?>
