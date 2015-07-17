<?php
require_once("bin/Path.php");
require_once(PHP_BASE_DIR."/db/MySQL.php");
require_once(PHP_BASE_DIR."/util/Validator.php");
require_once(PHP_BASE_DIR."/entity/User.php");
require_once(PHP_BASE_DIR."/entity/Invitation.php");
function startSession($time = 3600, $ses = 'xssrat_session') {
    session_set_cookie_params($time,"/",null,false,true);
    session_name($ses);
    session_start();

    // Reset the expiration time upon page load
    if (isset($_COOKIE[$ses]))
      setcookie($ses, $_COOKIE[$ses], time() + $time, "/");
}
startSession();

$res = array(
	'result' => false,
	'message' => '',
	'action' => ''
);
/*
if(isset($_SESSION['reg_info']) && !empty($_SESSION['reg_info'])) {
	$s_email = $_SESSION['reg_info']['email'];
	$s_username = $_SESSION['reg_info']['username'];
	$s_message = $_SESSION['reg_info']['message'];
	session_unset();
 	session_destroy();
 	
 	$res['result']= true;
 	$res['message']= $s_message;
 	$res['action']= 'resend';
}
*/



$method= $_REQUEST['method'];
$code = $_GET['code'];
$id = $_GET['id'];

$username = $_POST['username'];
$captcha = $_POST['captcha'];

$id = $id?$id:0;
$code = $code?$code:"";
$method= $method?$method:'';
$username= $username?htmlspecialchars($username,ENT_QUOTES):'';
$captcha= $captcha?$captcha:'';

if($method=='resetpwd'){
	
	$reset_pwd = $_SESSION['reset_pwd']; 
	
	if($reset_pwd['id']!=$id&&$reset_pwd['email_code']!=$code){
		$res['result'] = false;
		$res['message'] = '验证失败，请使用同一个浏览器，且在一小时内验证，若超时请重发邮件。';
		$res['action'] = 'resend';
	}else{

		$db = new MySQL($log);
		if($mysqli = $db->openDB()){
			
			$user = new User($mysqli,$log);
			$invitation = new Invitation($mysqli,$log);
			if($user -> getUserByID($id)){
				$v_res = $invitation->validateEmailCode($code,$id);
				if($v_res['result']){
					$res['result'] = true;
					$reset_pwd['b_confirm'] = true;
					$_SESSION['reset_pwd'] = $reset_pwd;
					$res['message'] = '认证成功！请重置您的密码。';
					$res['action'] = 'reset'; 
				}else{
					$res['message'] = $v_res['reason'];
					$res['action'] = 'resend';
				}
			}else{
				$res['message'] = '用户不存在！';
				$res['action'] = 'resend';
			}
			$db->closeDB();	
		}else{
			$res['message'] = '数据库连接失败！';
			$res['action'] = 'resend';
		}
	}
}
if($method =='findpwd'){
	//Captcha Validate
	require_once(PHP_BASE_DIR."/securimage/securimage.php");
	$img = new Securimage();
	if ($img->check($captcha) == false) {
		$res['message'] = '验证码错误！';
		$res['action'] = 'resend';
	}else{
		$db = new MySQL($log);
		if($mysqli = $db->openDB()){
			$user = new User($mysqli,$log);
			$invitation = new Invitation($mysqli,$log);
			if($user -> getUserByName($username)){
				$email_code = $invitation->genPwdEmailValidateCode($user->id);
				$saemail = new SaeMail();
				if($saemail){
				//sea maill
					$message = $username." 
			您好，欢迎您使用XSSRAT。XSSRAT是一个开放性的Web前端漏洞利用平台，您可以使用该平台进行一些Web前端漏洞的测试，并可以贡献自己的模块供其他用户使用。
			本平台是一个开放性的平台，可用于渗透测试或漏洞挖掘过程中，以提高Web应用的安全性，本身不具有任何恶意性。请勿将该平台用于非法用途，否则后果自负！
			您的用户名为：".$username."
			请及时访问以下链接重置您的密码：					
			http://xssrat.sinaapp.com/findpwd.php?code=".$email_code."&id=".$user->id."&method=resetpwd
			（该链接只能在同一浏览器，cookie有效期内生效）	
		
			http://xssrat.sinaapp.com
			Mak3 hack m0r3 c00l!";
						$ret = $saemail->quickSend($user->email,'XSSRAT 密码重置',$message,MAIL_ACCOUNT,MAIL_PASS);
						if($ret){
							 $res['result'] = true;
							 $res['message'] = '邮件已发出，请您及时查收，若您一直未收到，请稍后重新发送！';
							 $res['action'] = 'resend';
							 
							 $reset_pwd = array(
							 	'id' => $user->id,
								'email_code' => $email_code,
								'b_confirm' =>  false
							 );
							 
							 $_SESSION['reset_pwd'] = $reset_pwd;
						}
						if ($ret === false){
							$log->error($mail->errmsg());
							$res['message'] = '邮件发送失败，请稍后重试！';
							$res['action'] = 'resend';
						}
				
				}else{
					$res['message'] = 'SAE邮件服务故障,请稍后重试!';
					$res['action'] = 'resend';
				}
			}else{
				$res['message'] = '用户名不存在!';
				$res['action'] = 'resend';
			}
		}else{
			$res['message'] = '数据库连接失败！';
			$res['action'] = 'resend';
		}
	}
	
}

if($method =='chgpwd'){

 	$password_1 = $_POST["password_1"];
 	$password_2 = $_POST["password_2"];
 	$password_1 = !empty($password_1) ? $password_1:"";
 	$password_2 = !empty($password_2) ? $password_2:"";
 	
 	
 	require_once(PHP_BASE_DIR."/securimage/securimage.php");
	$img = new Securimage();
	if ($img->check($captcha) == false) {
		$res['message'] = '验证码错误！';
		$res['action'] = 'reset';
	}else{
		$reset_pwd = $_SESSION['reset_pwd']; 
		if($reset_pwd['b_confirm']==false){
			$res['message'] = '您还未经过邮件验证，收取邮件或重发邮件!';
			$res['action'] = 'resend';
		}else{
			$db = new MySQL($log);
			if($mysqli = $db->openDB()){
				$user = new User($mysqli,$log);
				if($user -> getUserByName($username)){
					if($user->id===$reset_pwd['id']){
						if($password_1==$password_2&&Validator::validatePassword($password_1)){
							$user->password = hash("sha256",$password_1);
							if($user->updateUser($user->id)){
								session_unset();
								session_destroy();
								$res['result'] = true;
								$res['message'] = '密码已修改成功!';
								$res['action'] = 'login';
							}else{
								$res['message'] = '密码修改失败!';
								$res['action'] = 'reset';
							}
							
						}else{
							$res['message'] = '密码格式错误!';
							$res['action'] = 'reset';	
						}
					}else{
						$res['message'] = '请提供自己的用户名!';
						$res['action'] = 'reset';
					}
					
				}else{
					$res['message'] = '用户名不存在!';
					$res['action'] = 'reset';
				}		
			}else{
				$res['message'] = '数据库连接失败!';
				$res['action'] = 'reset';
			}
		}
	}
}
if($method ==''){
	$reset_pwd = $_SESSION['reset_pwd'];
	if($reset_pwd['b_confirm']==true){
		$res['message'] = '请重新修改您的密码!';
		$res['action'] = 'reset';
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="zh-cn">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>XssRat-找回密码</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrapValidator.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/bootstrapValidator.min.js"></script>
<script type="text/javascript" language="javascript">
function reloadImage(i){
	if(i==1)$('#siimage_1').prop('src', './bin/securimage/securimage_show.php?sid=' + Math.random());
	if(i==2)$('#siimage_2').prop('src', './bin/securimage/securimage_show.php?sid=' + Math.random());
}

function countTime(maxSec){
	if(maxSec==1) {
		$("#findpwd_form fieldset").prop('disabled',false);
		$("#sendMail").html("重 发");
	}
	else {
		i = maxSec-1;
		$("#findpwd_form fieldset").prop('disabled',true);
		$("#sendMail").html(i+"秒后可重发");
		setTimeout('countTime('+i+')',1000);	
	}
}

var res = <?php echo json_encode($res); ?>;

$(function(){
	if(res.result==false&&res.action==''){
		//$('#findpwd_form').addClass('hidden');
		$('#pwdreset_form').hide();
		$('#message_box').hide();
			
	}
	
	if(res.action=='resend'){
		$('#pwdreset_form').hide();
		$('#message_box').hide();
	}
	
	if(res.result==true&&res.action=='resend'){
		countTime(60);
	}
	
	if(res.action=='reset'){
		$('#findpwd_form').hide();
	}

	if(res.action=='login'){
		$('#findpwd_form').hide();
		setTimeout("window.location.href = 'login.php';",1000);
	}
	

	if(res.result==true){
		$('#message_box').addClass('alert-success').html(res.message).show();
	}
	if(res.result==false&&res.action!==''){
		$('#message_box').addClass('alert-warning').html(res.message).show();
	}


	$('#findpwd_form').bootstrapValidator({
        message: '该项输入不合法！',
        fields: {
             username: {
                message: '用户名输入不合法！',
                validators: {
                    notEmpty: {
                        message: '用户名不能为空！'
                    },
                    stringLength: {
                        min: 3,
                        max: 16,
                        message: '用户名必须为3-16个字符！'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '用户名必须为字母，数字及下划线！'
                    }
                }
            },
			captcha:{
				validators: {
					notEmpty: {
							message: '验证码不能为空！'
					},
					regexp: {
							regexp: /^[a-z0-9]{4}$/,
							message: '验证码必须为4位的字母或数字！'
					}
				}
			}
        }
    });
	
	
	$('#pwdreset_form').bootstrapValidator({
        message: '该项输入不合法！',
        fields: {
             username: {
                message: '用户名输入不合法！',
                validators: {
                    notEmpty: {
                        message: '用户名不能为空！'
                    },
                    stringLength: {
                        min: 3,
                        max: 16,
                        message: '用户名必须为3-16个字符！'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '用户名必须为字母，数字及下划线！'
                    }
                }
            },
			password_1: {
				validators: {
					notEmpty: {
                        message: '密码不能为空！'
                    },
					stringLength: {
                        min: 6,
                        max: 24,
                        message: '密码必须为6-24个字符！'
                    },
					identical:{
						field:'password_2',
						message:'两次密码输入必须相同！'
					},
					different:{
						field:'username',
						message:'用户名和密码不能相同！'
					}
				 }
			},
			password_2: {
				validators: {
					notEmpty: {
                        message: '密码不能为空！'
                    },
					stringLength: {
                        min: 6,
                        max: 24,
                        message: '密码必须为6-24个字符！'
                    },
					identical:{
						field:'password_1',
						message:'两次密码输入必须相同！'
					},
					different:{
						field:'username',
						message:'用户名和密码不能相同！'
					}
				}
			},
			captcha:{
				validators: {
					notEmpty: {
							message: '验证码不能为空！'
					},
					regexp: {
							regexp: /^[a-z0-9]{4}$/,
							message: '验证码必须为4位的字母或数字！'
					}
				}
			}
        }
    });
	
	
});

</script>

</head>

<body class="wall-hole" >
<div id="activating" class="container">
<div class="login_tittle" >
	<img src="images/xssrat-sm.png" />&nbsp;&nbsp;&nbsp; <span>密码找回</span>
</div>

<div id="message_box" class="alert "></div>

<form method="post" action="findpwd.php" id="findpwd_form" class="form-activating" role="form" autocomplete="off" > 
<fieldset>
<input  type="hidden"  name="method" value="findpwd"  />


<div class="form_field form-group">
<input class="form-control" placeholder="用户名"  tabindex="1" type="username" maxlength="16" name="username" value=""   required autofocus />
</div>

<div class="captcha_box">
<img id="siimage_2" class="img-thumbnail" src="./bin/securimage/securimage_show.php?sid=<?php echo md5(uniqid()); ?>"  alt="CAPTCHA Image" />
&nbsp;&nbsp;<a class="btn btn-default btn-md"  onclick="reloadImage(2);this.blur(); return false" >
  <span style="color:#096"  class="glyphicon glyphicon-refresh"></span>	 
</a>
</div>

<div class="form_field form-group">
<input class="form-control" placeholder="验证码"   tabindex="2" type="text" maxlength="6" name="captcha" size="16" value="" required />
</div>

<div class="form-group">
<button class="btn  btn-primary btn-block" id="sendMail" type="submit" >发 送</button>
</div>
</fieldset>
</form>

<!-------------------------- reset passwd ------------------------------------------>

<form method="post" action="findpwd.php" id="pwdreset_form" class="form-activating" role="form" autocomplete="off" > 
<input  type="hidden"  name="method" value="chgpwd"  />
<div class="form_field form-group">
<input class="form-control" placeholder="用户名"  tabindex="1" type="username" maxlength="16" name="username" value=""   required autofocus />
</div>

<div class="form_field form-group">
<input class="form-control" placeholder="新密码"  tabindex="1" type="password" maxlength="16" name="password_1" value=""   required autofocus />
</div>

<div class="form_field form-group">
<input class="form-control" placeholder="确认密码"  tabindex="1" type="password" maxlength="16" name="password_2" value=""   required autofocus />
</div>

<div class="captcha_box">
<img id="siimage_1" class="img-thumbnail" src="./bin/securimage/securimage_show.php?sid=<?php echo md5(uniqid()); ?>"  alt="CAPTCHA Image" />
&nbsp;&nbsp;<a class="btn btn-default btn-md"  onclick="reloadImage(1);this.blur(); return false" >
  <span style="color:#096"  class="glyphicon glyphicon-refresh"></span>	 
</a>
</div>

<div class="form_field form-group">
<input class="form-control" placeholder="验证码"   tabindex="2" type="text" maxlength="6" name="captcha" size="16" value="" required />
</div>

<div class="form-group">
<button class="btn  btn-primary btn-block" id="resetpwd" type="submit" >发 送</button>
</div>

</form>
<!-- reset passwd -->

<div class="form-group login-link">
<a href="login.php">登 陆</a> | <a href="register.php">注册帐号</a>
</div>


<div class="space30"></div>
</div>

</body>
</html>