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

// 改
    case 'registered':
    	registered($user_number);
    	break;
    case 'registered_insert':
    	registered_insert();
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
	global $mysqli,$msg;
	if (empty($_POST['user_id'])) {
		$msg = "請輸入帳號";
		return;
	}
	else if (empty($_POST['user_pw'])) {
		$msg = "請輸入密碼";
		return;
	}
	else if (strpos($_POST['user_id']," ")||strpos($_POST['user_pw']," ")) {
		$msg = "帳號和密碼不可包含空白";
		return;
	}
	foreach ($_POST as $var_name => $var_val) {
		$$var_name = $mysqli->real_escape_string($var_val);
	}
		$sql = "SELECT * FROM `user` WHERE `user_id`='{$user_id}'";
		$result = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
		$user = $result->fetch_assoc();
		if (!empty($user)) {
			$msg = "帳號已存在";
			return;
		}
        $user_pw = password_hash($_REQUEST['user_pw'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`user_id`,`user_pw`,`gmail`,`nickname`) VALUES ('{$user_id}','{$user_pw}','{$gmail}','{$nickname}')";
	    $mysqli->query($sql) or die("在查詢資料庫時發生錯誤");
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
            $msg = "驗證碼錯誤";
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
            $msg = "帳號或密碼錯誤";
        }
    } else {
        $msg = "請輸入帳號";
    }
    return;
}

function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['user_number']);
}


?>
