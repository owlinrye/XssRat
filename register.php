<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>XssRat-用户注册</title>
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
		url:"./bin/action/register.php",
		type:"POST",
		data:$("#register_form").serialize(),
		dataType:'json'
	}).done(function(data){
		reloadImage();
		if(data.result==false){
			$('#error_message').html(data.reason).show();
			setTimeout("$('#error_message').fadeOut()", 4000);
		}else{
			$('#success_message').html(data.reason).show();
			setTimeout("$('#success_message').fadeOut()", 1000);
			window.location.href = "activating.php";
		}	
	});	
	
}


$(function(){
	
$('#register_form').bootstrapValidator({
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
            email: {
                validators: {
                    notEmpty: {
                        message: 'email 不能为空！'
                    },
                    emailAddress: {
                        message: '这不是一个合法的邮件地址！'
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
			invitation_code: {
				validators: {
					notEmpty: {
							message: '邀请码不能为空！'
					},
					regexp: {
							regexp: /^[a-z0-9]{32}$/,
							message: '邀请码必须为32位的字母或数字！'
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
<div id="register_box" class="container">
<div class="login_tittle" >
	<img src="images/xssrat-sm.png" />&nbsp;&nbsp;&nbsp; <span >欢迎注册</span>

</div>
<form method="post" id="register_form" class="form-horizontal" role="form" autocomplete="off" > 

<div class="form-group">
<label for="inputUsername" class="col-sm-3 col-md-3 control-label">用户名</label>
<div class="col-sm-9 col-md-9">
<input class="form-control" placeholder="您的网名"  tabindex="1" type="text" maxlength="16" name="username" value=""  required autofocus />
</div>
</div>

<div class="form-group">
<label for="inputEmail" class="col-sm-3 col-md-3 control-label">邮箱</label>
<div class="col-sm-9 col-md-9">
<input class="form-control" placeholder="邮件地址"  tabindex="2" type="text" maxlength="32" name="email" value=""  required autofocus />
</div>
</div>

<div class="form-group">
<label for="inputPassword1" class="col-sm-3 col-md-3 control-label">密码</label>
<div class="col-sm-9 col-md-9">
<input class="form-control" placeholder="6位以上密码"   tabindex="3" type="password" maxlength="16" name="password_1" size="24" value="" required />
</div>
</div>

<div class="form-group">
<label for="inputPassword2" class="col-sm-3 col-md-3 control-label">确认密码</label>
<div class="col-sm-9 col-md-9">
<input class="form-control" placeholder="确认密码"   tabindex="4" type="password" maxlength="16" name="password_2" size="24" value="" required />
</div>
</div>

<div class="form-group">
<label for="inputInvitation" class="col-sm-3 col-md-3 control-label">邀请码</label>
<div class="col-sm-9 col-md-9">
<input class="form-control" placeholder="32位Hash"   tabindex="5" type="text" maxlength="32" name="invitation_code" size="24" value="" required />
</div>
</div>

<div class="form-group">
<div class="col-sm-3 col-md-3" ></div>
<div class="captcha_box col-sm-9 col-md-9">
    <img id="siimage" onclick="reloadImage();this.blur(); return false" class="img-thumbnail" src="./bin/securimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>"  alt="CAPTCHA Image" />
    &nbsp;&nbsp;<a class="btn btn-default btn-md"  onclick="reloadImage();this.blur(); return false" >
  <span style="color:#096"  class="glyphicon glyphicon-refresh"></span>	 
    </a>
    </div>
</div>

<div class="form-group">
<label for="inputCaptcha" class="col-sm-3 col-md-3 control-label">验证码</label>
<div class="col-sm-9 col-md-9">
<input class="form-control" placeholder="验证码"   tabindex="6" type="text" maxlength="6" name="captcha" size="16" value="" required />
</div>
</div>
<div class="form-group">
<div class="col-sm-3 col-md-3" ></div>
<div class="message_box text-center col-sm-9 col-md-9">
<div id="error_message" class="alert alert-danger text-danger "></div>
<div id="success_message" class="alert  alert-success"></div>
</div>
</div>

<div class="form-group">
<div class="col-sm-3 col-md-3" ></div>
<div class="col-sm-9 col-md-9">
<button class="btn  btn-primary btn-block"  type="submit" >注 册</button>
</div>
</div>

<div class="form-group">
<div class="col-sm-3 col-md-3" ></div>
<div class="col-sm-9 col-md-9 login-link">
<a href="login.php">登陆</a> | <a href="mailto:xssratd@gmail.com">申请邀请码</a>
</div>
</div>

</form>
<div class="space30"></div>
</div>



</body>
</html>