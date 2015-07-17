<?php
/*
 * Created on 2014��5��13��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
  require_once("../Path.php");
  require_once("../sess.php");
  require_once(PHP_BASE_DIR."/db/MySQL.php");
  require_once(PHP_BASE_DIR."/entity/User.php");
  require_once(PHP_BASE_DIR."/util/Validator.php");
  
  
  error_reporting(E_ALL ^ E_NOTICE);
  header("Content-Type: application/json; charset=UTF-8");
   
  $res = array(
 	"result" => false,
 	"reason" => ""
  );
  
 
 $ids =  $_POST["ids"];
 $id =  $_POST["id"];
 $username = $_POST["username"];
 $password = $_POST["password"];
 $captcha = $_POST["captcha"];
 $action = $_POST["action"];
 $email = $_POST["email"];
 $chpwd = $_POST["chpwd"];
 $password_0 = $_POST["password_0"];
 $password_1 = $_POST["password_1"];
 $password_2 = $_POST["password_2"];
 
 $ids =  !empty($ids)? $ids:0;
 $id =  !empty($id)? (int)$id:0;
 $username = !empty($username)? htmlspecialchars($username,ENT_QUOTES):""; 
 $email =  !empty($email)? htmlspecialchars($email,ENT_QUOTES):""; 
 $password = !empty($password)? $password:""; 
 $captcha = !empty($captcha)? $captcha:"";
 $action = !empty($action) ? $action:""; 
 $chpwd = !empty($chpwd) ? $chpwd:""; 
 $password_0 = !empty($password_0) ? $password_0:""; 
 $password_1 = !empty($password_1) ? $password_1:"";
 $password_2 = !empty($password_2) ? $password_2:"";
  
  
  
 if(!isset($_SESSION['user_info']) || empty($_SESSION['user_info'])) {
	$res["reason"] = "你还未登录";
 	die(json_encode($res));
  }
  
  $db = new MySQL($log);
  $mysqli = $db->openDB();
  if($mysqli==null) {
  	$res["reason"] = "数据库连接失败";
 	die(json_encode($res));
  }
  $user = new User($mysqli,$log);
  
  //删除用户
  if($action=="del"){
  	if($_SESSION['user_info']['type']==1){
  		if($ids==null||count($ids)<0){
  			$res["reason"] = "无数据！";
  		}else{
  			foreach($ids as $uid){
  				if($uid == $_SESSION['user_info']['id']) {$res["reason"] = "禁止删除自己！"; break;}
	  			if($user->delUser($uid))	{
		  			$res["result"] = true;
		  			$res["reason"] = "用户删除成功！";
		  		}else{
		  			$res["reason"] = "删除用户ID：".$uid."失败！";
		  			break;
		  		}
  			}
  		}
  	}else{
  		$res["reason"] = "你没有权限！";
  	}
  }
  
  //锁定帐户
  
  if($action=="lock"){
  	if($id == $_SESSION['user_info']['id']){
  		$res["reason"] = "禁止锁定自己！"; 
  	}else{
	  	if($_SESSION['user_info']['type']==1){
	  		if($user->getUserByID($id)){
	  			$user->status = 0;
	  			if($user->updateUser($id)){
	  				$res["result"] = true;
	  				$res["reason"] = "用户锁定成功！";
	  			}else{
	  				$res["reason"] = "用户状态更新失败！";
	  			}
	  		}else{
	  			$res["reason"] = "用户不存在！";
	  		}
	  	}else{
	  		$res["reason"] = "你没有权限！";
	  	}		
  	}
  	
  }
  
  //解锁帐户
  if($action=="unlock"){
  	if($_SESSION['user_info']['type']==1){
  		if($user->getUserByID($id)){
  			$user->status = 1;
  			if($user->updateUser($id)){
  				$res["result"] = true;
  				$res["reason"] = "用户解锁成功！";
  			}else{
  				$res["reason"] = "用户状态更新失败！";
  			}
  		}else{
  			$res["reason"] = "用户不存在！";
  		}
  	}else{
  		$res["reason"] = "你没有权限！";
  	}
  }
  
  //update
  if($action=="update"){
  	
  	//Captcha Validate
	require_once(PHP_BASE_DIR."/securimage/securimage.php");
	$img = new Securimage();
	if ($img->check($captcha) == false) {
	    $res['reason'] = '验证码错误！';
	    $db->closeDB();
	    die(json_encode($res));
	}
	
	//验证用户名是否重复
	if($user->getUserByNameExId($username,$_SESSION['user_info']['id'])){
		$res['reason'] = '用户已存在！';
		$db->closeDB();
		die(json_encode($res));
	}
	
	//验证邮箱是否重复
	if($user->getUserByMailExId($email,$_SESSION['user_info']['id'])){
		$res['reason'] = '邮箱已被使用！';
		$db->closeDB();
		die(json_encode($res));
	}
	
	
  	$user->getUserByID($_SESSION['user_info']['id']);
  	//选择修改密码
  	if($chpwd[0]=="true"){
  		if(hash("sha256",$password_0)==$user->password){
  			if($password_1!==$password_0){
  				if($password_1==$password_2){
  					 //string format validate
					if(Validator::validateUserName($username)&&Validator::validatePassword($password_1)&&Validator::validateEmail($email)){
						$user->username = $username;
						$user->password = hash("sha256",$password_1);
						$user->email = $email;
						if($user->updateUser($id)){
							$_SESSION['user_info']['username'] = $username;
							$_SESSION['user_info']['email'] = $email;
			  				$res["result"] = true;
			  				$res["reason"] = "用户信息更新成功！";
			  			}else{
			  				$res["reason"] = "用户信息更新失败！";
			  			}
					}else{
						$res["reason"] = "输入不合法！";
					} 
  				}else{
  					$res["reason"] = "两次密码不同！";	
  				}
  			}else{
  				$res["reason"] = "新旧密码不能一样！";
  			}
  		}else{
  			$res["reason"] = "密码错误！";	
  		}	
  	}else{
  		if(Validator::validateUserName($username)&&Validator::validateEmail($email)){
			$user->username = $username;
			$user->email = $email;
			if($user->updateUser($id)){
				$_SESSION['user_info']['username'] = $username;
				$_SESSION['user_info']['email'] = $email;
  				$res["result"] = true;
  				$res["reason"] = "用户信息更新成功！";
  			}else{
  				$res["reason"] = "用户信息更新失败！";
  			}
		}else{
			$res["reason"] = "输入不合法！";
		} 
  	}
  		
  }
  
  
  if($mysqli!=null) $db->closeDB();

  die(json_encode($res));
  
  
  
  
  
  
  
  
  
 
?>
