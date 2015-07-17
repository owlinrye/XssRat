<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>XssRat-用户登陆</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrapValidator.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/bootstrapValidator.min.js"></script>
<script type="text/javascript" language="javascript">
function reloadImage(){
	$('#siimage').prop('src', './bin/securimage/securimage_show.php?sid=' + Math.random());
}

function postForm(){
	$.ajax({
		url:"./bin/action/login.php",
		type:"POST",
		data:$("#login_form").serialize(),
		dataType:'json'
	}).done(function(data){
		reloadImage();
		if(data.result==false){
			$('#error_message').html(data.reason).show();
			setTimeout("$('#error_message').fadeOut()", 4000);
		}else{
			$('#success_message').html("Login Success!").show();
			setTimeout("$('#success_message').fadeOut()", 1000);
			window.location.href = "main.php";
		}	
	});	
	
}

$(function(){
	
$('#login_form').bootstrapValidator({
        message: '该项输入不合法！',

		submitHandler: function(validator, form, submitButton) {
				postForm();
        },
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
			password: {
				validators: {
					notEmpty: {
                        message: '密码不能为空！'
                    },
					stringLength: {
                        min: 6,
                        max: 24,
                        message: '密码必须为6-24个字符！'
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
<div id="login_box" class="container">

<div class="login_tittle" >
	<img src="images/xssrat-sm.png" />&nbsp;&nbsp;&nbsp; <span>请登陆</span>

</div>

<form method="post" id="login_form" class="form-horizontal form-signin" autocomplete="off" role="form" > 

<div class="form-group">
<input class="form-control" placeholder="用户名"  tabindex="1" type="text" maxlength="16" name="username" value=""  required autofocus />
</div>

<div class="form-group">
<input class="form-control" placeholder="密码"  tabindex="2" type="password" maxlength="16" name="password" size="24" value="" required />
</div>


<div class="form-group">
<div class="captcha_box">
<img id="siimage" class="img-thumbnail" src="./bin/securimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>"  width="130" height="44"  alt="CAPTCHA Image" />
&nbsp;&nbsp;<a class="btn btn-default btn-md"  onclick="reloadImage();this.blur(); return false" >
  <span style="color:#096"  class="glyphicon glyphicon-refresh"></span>	 
</a>
</div>
</div>

<div class="form-group">
<input class="form-control"   tabindex="3" type="text" maxlength="6" name="captcha" size="16" value="" required />
</div>


<div class="form-group">
<div class="message_box text-center">
<div id="error_message" class="alert alert-danger text-danger "></div>
<div id="success_message" class="alert  alert-success"></div>
</div>
</div>

<div class="form-group">
<button class="btn  btn-primary btn-block btn-lg"  type="submit" >登 陆</button>
</div>
<div class="form-group login-link">
<a href="register.php">注册帐号</a> | <a href="findpwd.php">忘记密码</a>
</div>

</form>
<div class="space30 "></div>
</div>

</body>
</html>