<?php include("./include/sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XssRat Account Page</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrapValidator.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/bootstrapValidator.min.js"></script>
<script language="javascript" src="js/xssrat.js"></script>
<script language="javascript" src="js/json2.js"></script>
<!-- script begin -->
<script type="text/javascript">
function reloadImage(){
	$('#siimage').prop('src', './bin/securimage/securimage_show.php?sid=' + Math.random());
}

function postForm(){
	$.ajax({
		url:"./bin/action/user.php",
		type:"POST",
		data:$("#account_form").serialize(),
		dataType:'json'
	}).done(function(data){
		reloadImage();
		if(data.result==false){
			$('#error_message').html(data.reason).show();
			setTimeout("$('#error_message').fadeOut()", 4000);
		}else{
			$('#success_message').html(data.reason).show();
			setTimeout("$('#success_message').fadeOut()", 1000);
			window.location.href = "user.php";
		}	
	});	
	
}


$(function(){
	$(".pwd").each(function(index, element) {
     	$(this).prop('disabled', true);
    });
	
	$('#account_form').bootstrapValidator({
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
			password_0: {
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
					
					different:{
						field:'username',
						message:'用户名和密码不能相同！'
					},
					different:{
						field:'password_0',
						message:'新密码与旧密码不能相同！'
					},
					identical:{
						field:'password_2',
						message:'两次密码输入必须相同！'
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
	
	$("#chpwd").on("change",function(){
		if($(this).prop("checked")){
			$(".pwd").each(function(index, element) {
                $(this).prop('disabled', false);
            });
		}else{
			$(".pwd").each(function(index, element) {
                $(this).prop('disabled', true);
            });
		}
	});

});

	
	
	
</script>

<!-- script end-->

</head>

<body>
<?php include("./include/head.php");  ?>
<!--

--!>
<!-- main begin -->
<div class="container" >
	<div class="row jumb"> 
		
		<!--the left begin -->
		<?php include("include/menu.php");  ?>
		<!--the left end -->
		
		<?php 
require_once "bin/Path.php";
require_once PHP_BASE_DIR."/db/MySQL.php";
require_once PHP_BASE_DIR."/entity/User.php";
		
$db = new MySQL($log);
$mysqli = $db->openDB();

?>
		
		<!--the right begin -->
		<div class="col-md-10 ">
			<ol class="breadcrumb">
				<li><a href="main.php">Home</a></li>
				<li class="active">Acount</li>
			</ol>
			<div class="panel panel-default ">
				<div class="panel-heading">账号管理</div>
				<div class="panel-body">
					<form method="post" id="account_form" class="form-horizontal" role="form" autocomplete="off" defaultbutton="default-btn" >
					<input  type="hidden" name="id" value="<?php echo $user_info['id'] ?>"  />
                    <input  type="hidden" name="action" value="update"  />
						<div class="form-group">
							<label for="inputUsername" class="col-sm-3 col-md-3 control-label">用户名</label>
							<div class="col-sm-5 col-md-5">
								<input class="form-control"  tabindex="1" type="text" maxlength="16" name="username" value="<?php echo $user_info['username'] ?>"  required autofocus />
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-3 col-md-3 control-label">邮箱</label>
							<div class="col-sm-5 col-md-5">
								<input class="form-control"  tabindex="2" type="text" maxlength="32" name="email" value="<?php echo $user_info['email'] ?>"  required autofocus />
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputEmail" class="col-sm-3 col-md-3 control-label"></label>
							 <div class="col-sm-5 col-md-5">
     							 <input type="checkbox" id="chpwd"  name="chpwd[]" value="true"  /> 修改密码 
    						 </div>
						</div>
						
						<div class="form-group">
							<label for="inputPassword1" class=" col-sm-3 col-md-3 control-label">当前密码</label>
							<div class="col-sm-5 col-md-5">
								<input class="pwd form-control" placeholder="您当前密码"   tabindex="3" type="password" maxlength="16" name="password_0" size="24" value="" required />
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword1" class=" col-sm-3 col-md-3 control-label">新密码</label>
							<div class="col-sm-5 col-md-5">
								<input class="pwd form-control" placeholder="6位以上密码"   tabindex="4" type="password" maxlength="16" name="password_1" size="24" value="" required />
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword2" class="pwd col-sm-3 col-md-3 control-label">确认新密码</label>
							<div class="col-sm-5 col-md-5">
								<input class="pwd form-control" placeholder="确认您的密码"   tabindex="5" type="password" maxlength="16" name="password_2" size="24" value="" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3 col-md-3" ></div>
							<div class="captcha_box col-sm-5 col-md-5"> <img id="siimage" onclick="reloadImage();this.blur(); return false" class="img-thumbnail" src="./bin/securimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>"  alt="CAPTCHA Image" /> &nbsp;&nbsp;
								<a class="btn btn-default btn-md"  onclick="reloadImage();this.blur(); return false" > <span style="color:#096"  class="glyphicon glyphicon-refresh"></span> </a>
							</div>
						</div>
						<div class="form-group">
							<label for="inputCaptcha" class="col-sm-3 col-md-3 control-label">验证码</label>
							<div class="col-sm-5 col-md-5">
								<input class="form-control" placeholder="验证码"   tabindex="6" type="text" maxlength="6" name="captcha" size="16" value="" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3 col-md-3" ></div>
							<div class="message_box text-center col-sm-5 col-md-5">
								<div id="error_message" class="alert alert-danger text-danger "></div>
								<div id="success_message" class="alert  alert-success"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3 col-md-3" ></div>
							<div class="col-sm-5 col-md-5">
								<button class="btn  btn-primary btn-block"  id="default-btn"  type="submit" >修 改</button>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer"> </div>
			</div>
		</div>
		<!--the right end -->
		<?php  if($mysqli!=null)  $db->closeDB();  ?>
	</div>
</div>
<!-- main end -->

<?php include "include/footer.php"; ?>

<!-- Modal --> 

<!-- Error Msg Modal -->
<div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="消息" aria-hidden="true">
	<div class="modal-dialog modal_small">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modal_msg">消息</h4>
			</div>
			<div class="modal-body">
				<div id="alert_msg"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!--modal-->

</body>
</html>