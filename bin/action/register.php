<?php
/* 
 * Created on 2014��5��10��
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
 require_once(PHP_BASE_DIR."/entity/Invitation.php");
 
 error_reporting(E_ALL ^ E_NOTICE);
 header("Content-Type: application/json; charset=UTF-8");
 
 $username = $_POST["username"];
 $email = $_POST["email"];
 $password_1 = $_POST["password_1"];
 $password_2 = $_POST["password_2"];
 $invitation_code = $_POST["invitation_code"];
 $captcha = $_POST["captcha"];
 
  
 $username = $username ? htmlspecialchars($username,ENT_QUOTES):"";
 $email = $email ? htmlspecialchars($email,ENT_QUOTES) :""; 
 $password_1 = $password_1 ? $password_1:"";
 $password_2 = $password_2 ? $password_2:""; 
 $invitation_code = $invitation_code ? $invitation_code:"";
 $captcha = $captcha ? $captcha:"";
 
 
 
  $res = array(
 	"result" => false,
 	"reason" => ""
 );
 
 if($password_1!=$password_2){
 	$res["reason"] = "两次密码输入不同！";
	die(json_encode($res));
 }
 
 
  //string format validate
if(!(Validator::validateUserName($username)&&Validator::validateEmail($email)&&Validator::validatePassword($password_1)&&Validator::validateCaptcha($captcha))){
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
if($mysqli = $db->openDB()){
	
	$user = new User($mysqli,$log);
	$invitation = new Invitation($mysqli,$log);
	
	if($user->getUserByName($username)){
		$res['reason'] = '用户已存在！';
		$db->closeDB();
		die(json_encode($res));
	}
	
	if($user->getUserByMail($email)){
		$res['reason'] = '邮箱已被使用！';
		$db->closeDB();
		die(json_encode($res));
	}
	
	$inv_id = $invitation->vilidateCode($invitation_code);
	
	if($inv_id){
		
		$user->username = $username;
		$user->password = hash('sha256',$password_1);
		$user->email = $email;
		$user->type = 3;//普通用户
		$user->b_send = 1;//发送邮件
		$user ->status = 2;//未激活状态
		
		$uid = $user->addUser();
		
		if($uid>0) {
			$invitation -> setRegister($inv_id,$uid);
			//生成邮件验证码
			$val_code = $invitation -> genEmailValidateCode($uid);
			$reg_info = array(
					'username' => htmlspecialchars($user->username,ENT_QUOTES),
					'email' => htmlspecialchars($user->email,ENT_QUOTES),
					'message'=> ''
				);
			$saemail = new SaeMail();
			if($email){
				//sea maill
				$saemail = new SaeMail();
				$message = "尊敬的XSSRAT用户 
	您好，欢迎您使用XSSRAT。XSSRAT是一个开放性的Web前端漏洞利用平台，您可以使用该平台进行一些Web前端漏洞的测试，并可以贡献自己的模块供其他用户使用。
	本平台是一个开放性的平台，可用于渗透测试或漏洞挖掘过程中，以提高Web应用的安全性，本身不具有任何恶意性。请勿将该平台用于非法用途，否则后果自负！
	请访问以下链接激活您的账号：					
	http://xssrat.sinaapp.com/activating.php?code=".$val_code."&id=".$uid."&method=active

	http://xssrat.sinaapp.com
	Mak3 hack m0r3 c00l!";
				$ret = $saemail->quickSend($email,'XSSRAT 用户验证',$message,MAIL_ACCOUNT,MAIL_PASS);
				
				if($ret){
					 $res['result'] = true;
					 $res['reason'] = '已注册成功，请收取邮件以激活帐号！';
					 $reg_info['message'] = '已注册成功，请收取邮件以激活帐号！';
				}
				if ($ret === false){
					$log->error($mail->errmsg());
					$res['result'] = true;
					$res['reason'] = '已注册成功,邮件发送失败，请稍后重新发送！';
					$reg_info['message'] = '已注册成功,邮件发送失败，请稍后重新发送！';
				}
				
			}else{
				$res['result'] = true;
				$res['reason'] = '已注册成功,邮件发送失败，请稍后重新发送！';
				$reg_info['message'] = '已注册成功,邮件发送失败，请稍后重新发送！';
			}
			$_SESSION["reg_info"] = $reg_info;
		}else{
			$res['reason'] = '数据库执行失败！';
		}
	}else{
		$res['reason'] = '邀请码错误！';
	}
	$db->closeDB();
	
}else{
	$res['reason'] = '数据连接失败！';
}

die(json_encode($res));
 
?>
