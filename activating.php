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




$method= $_REQUEST['method'];
$code = $_GET['code'];
$id = $_GET['id'];


$email = $_POST['email'];
$captcha = $_POST['captcha'];

$code = $code?$code:"";
$id = $id?$id:0;
$method= $method?$method:'';
$email= $email?$email:'';
$captcha= $captcha?$captcha:'';

if($method=='active'){
   	$db = new MySQL($log);
	if($mysqli = $db->openDB()){
		$user = new User($mysqli,$log);
		$invitation = new Invitation($mysqli,$log);
		if($user -> getUserByID($id)){
			
			if($user -> status == 2){
				$s_email = $user->email;
				$v_res = $invitation->validateEmailCode($code,$id);
				if($v_res['result']){
					$user -> status = 1;
					if($user -> updateUser($id)){
						$res['result'] = true;
						$res['message'] = '恭喜您，用户已激活成功';
						$res['action'] = 'login'; 
					}
				}else{
					$res['message'] = $v_res['reason'];
					$res['action'] = 'resend';
				}
			}else{
				$res['message'] = '用户已被激活或已禁用！';
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
if($method =='resend'){
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
			if($user -> getUserByMail($email)){
				if($user -> status == 2){
					$s_email = $email;
					$email_code = $invitation->genEmailValidateCode($user->id);
					$saemail = new SaeMail();
					if($saemail){
						//sea maill
						$message = "尊敬的XSSRAT用户 
			您好，欢迎您使用XSSRAT。XSSRAT是一个开放性的Web前端漏洞利用平台，您可以使用该平台进行一些Web前端漏洞的测试，并可以贡献自己的模块供其他用户使用。
			本平台是一个开放性的平台，可用于渗透测试或漏洞挖掘过程中，以提高Web应用的安全性，本身不具有任何恶意性。请勿将该平台用于非法用途，否则后果自负！
			请访问以下链接激活您的账号：					
			http://xssrat.sinaapp.com/activating.php?code=".$email_code."&id=".$user->id."&method=active	
		
			http://xssrat.sinaapp.com
			Mak3 hack m0r3 c00l!";
						$ret = $saemail->quickSend($email,'XSSRAT 用户验证',$message,MAIL_ACCOUNT,MAIL_PASS);
						
						$reg_info = array(
							'username' => htmlspecialchars($user->username,ENT_QUOTES),
							'email' => htmlspecialchars($user->email,ENT_QUOTES)
						);
						
						$_SESSION["reg_info"] = $reg_info;
						
						if($ret){
							 $res['result'] = true;
							 $res['message'] = '邮件已发出，请您及时查收，若您一直未收到，请稍后重新发送！';
							 $res['action'] = 'resend';
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
					$res['message'] = '该用户已经激活或已被禁用!';
					$res['action'] = 'resend';
				}
			}else{
				$res['message'] = '您提供的邮箱不存在，请重新填写!';
				$res['action'] = 'resend';
			}
		}else{
			$res['message'] = '数据库连接失败！';
			$res['action'] = 'resend';
		}
	}
	
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="zh-cn">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>XssRat-用户激活</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrapValidator.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/bootstrapValidator.min.js"></script>
<script type="text/javascript" language="javascript">
function reloadImage(){
	$('#siimage').prop('src', './bin/securimage/securimage_show.php?sid=' + Math.random());
}

function countTime(maxSec){
	if(maxSec==0) {
		$("#sendMail").prop('disabled',false);
		$("#sendMail").html("重发");
	}
	else {
		i = maxSec-1;
		$("#sendMail").prop('disabled',true);
		$("#sendMail").html(i+"秒后可重发");
		setTimeout('countTime('+i+')',1000);	
	}
}

var res = <?php echo json_encode($res); ?>;

$(function(){
	
	if(res.result==false&&res.action==''){
		$('#message_box').hide();
	}
	
	if(res.result==true&&res.action=='resend'){
		countTime(60);
	}

	if(res.result==true){
		$('#message_box').addClass('alert-success').html(res.message).show();
	}
	if(res.result==false&&res.action!==''){
		$('#message_box').addClass('alert-warning').html(res.message).show();
	}
	if(res.action=='login'){
		setTimeout("window.location.href = 'login.php';",1000);
	}
	
	$('#activating_form').bootstrapValidator({
        message: '该项输入不合法！',
        fields: {
            email: {
				message:'邮箱输入不合法',
                validators: {
                    notEmpty: {
                        message: 'email 不能为空！'
                    },
                    emailAddress: {
                        message: '这不是一个合法的邮件地址！'
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
	<img src="images/xssrat-sm.png" />&nbsp;&nbsp;&nbsp; <span>帐号激活</span>
</div>
<form method="post" id="activating_form" action="activating.php" class="form-activating" role="form" autocomplete="off" > 
<input  type="hidden"  name="method" value="resend"  />
<div id="message_box" class="alert ">您的帐号激活邮件已经发出，请您及时查收，若您一直未收到，请重新发送！</div>

<div class="form_field form-group">
<input class="form-control" placeholder="注册邮件"  tabindex="1" type="email" maxlength="16" name="email" value="<?php echo $s_email; ?>"   required autofocus />

</div>

<div class="captcha_box">
<img id="siimage" class="img-thumbnail" src="./bin/securimage/securimage_show.php?sid=<?php echo md5(uniqid()); ?>"  alt="CAPTCHA Image" />
&nbsp;&nbsp;<a class="btn btn-default btn-md"  onclick="reloadImage();this.blur(); return false" >
  <span style="color:#096"  class="glyphicon glyphicon-refresh"></span>	 
</a>
</div>

<div class="form_field form-group">
<input class="form-control" placeholder="验证码"   tabindex="2" type="text" maxlength="6" name="captcha" size="16" value="" required />
</div>

<div class="message_box">
<div id="error_message" class="alert alert-danger text-danger "></div>
<div id="success_message" class="alert  alert-success"></div>
</div>

<div class="form-group">
<button class="btn  btn-primary btn-block" id="sendMail" type="submit" >发 送</button>
</div>

<div class="form-group login-link">
<a href="login.php">登 陆</a> | <a href="register.php">注册帐号</a>
</div>

</form>
<div class="space30"></div>
</div>

</body>
</html>