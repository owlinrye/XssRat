<?php
/* 
 * Created on 2014��3��4��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 require_once("../Path.php");
 require_once("../sess.php");
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/util/Validator.php");
 require_once(PHP_BASE_DIR."/entity/User.php");
 
 error_reporting(E_ALL ^ E_NOTICE);
 header("Content-Type: application/json; charset=UTF-8");
 
 $username = $_POST["username"];
 $password = $_POST["password"];
 $captcha = $_POST["captcha"];
 
 $username = $username ? $username:""; 
 $password = $password ? $password:""; 
 $captcha = $captcha ? $captcha:"";
 
 $res = array(
 	"result" => false,
 	"reason" => ""
 );
 
 //string format validate
if(!(Validator::validateUserName($username)&&Validator::validatePassword($password)&&Validator::validateCaptcha($captcha))){
	$res["reason"] = "输入不合法！";
	die(json_encode($res));
} 

//Captcha Validate
require_once(PHP_BASE_DIR."/securimage/securimage.php");
$img = new Securimage();
if ($img->check($captcha) == false) {
    $res['reason'] = '验证码错误！';
    die(json_encode($res));
}

$db = new MySQL($log);
$mysqli = $db->openDB();


//Validate Password

if($mysqli!=null){
	
	$user = new User($mysqli,$log);
	if($user->getUserByName($username)){
		if($user->status === 0){
			$res["reason"] = "您的账号已锁定！";
			$log->warn("LOGIN IN ERROR, User:".$username." has been blocked  ADDR:".$_SERVER["REMOTE_ADDR"]);
		}else
		if($user->status === 2){
			$res["reason"] = "您的账号还未激活！";
			$log->warn("LOGIN IN ERROR, User:".$username." 未激活   ADDR:".$_SERVER["REMOTE_ADDR"]);
		} 
		else //Validate password
		if($user->password === hash("sha256",$password)){
			$res["result"] = true;
			$log->warn("LOGIN IN SUCCESS, User:".$username." ADDR:".$_SERVER["REMOTE_ADDR"]);			
			
			$user_info = array(
				"id" => $user->id,
				"username" => htmlspecialchars($user->username,ENT_QUOTES),
				"type" => $user -> type,
				"email" => htmlspecialchars($user->email,ENT_QUOTES),
				"csrf" => uniqid()
			); 
			//设置用户信息
			session_regenerate_id(true);
			$_SESSION["user_info"] = $user_info;
			
		}else {
			$res["reason"] = "密码错误！";
			$log->warn("LOGIN IN ERROR, User:".$username." password error  ADDR:".$_SERVER["REMOTE_ADDR"]);
		}		
	}else {
		$res["reason"] = "用户不存在！";
		$log->warn("LOGIN IN ERROR, User:".$username." not exist  ADDR:".$_SERVER["REMOTE_ADDR"]);
	}
	$db->closeDB();
}else  $res["reason"] = "数据库连接失败！";

die(json_encode($res));
 
?>
