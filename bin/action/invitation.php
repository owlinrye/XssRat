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
  require_once(PHP_BASE_DIR."/entity/Invitation.php");
  
  error_reporting(E_ALL ^ E_NOTICE);
  header("Content-Type: application/json; charset=UTF-8");
  
  $res = array(
 	"result" => false,
 	"reason" => ""
  );
  
  $ids =  $_POST["ids"];
  $action = $_POST["action"];
  
  
  $ids =  !empty($ids)? $ids:0;
  $action = !empty($action) ? $action:""; 
  
  
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
  
  $invitation = new Invitation($mysqli,$log);
  
  if($action=="del"){
  	if($_SESSION['user_info']['type']==1){
  		if($ids==null||count($ids)<0){
  			$res["reason"] = "无数据！";
  		}else{
  			foreach($ids as $id){
	  			if($invitation->delInvitation($id))	{
		  			$res["result"] = true;
		  			$res["reason"] = "删除记录成功！";
		  		}else{
		  			$res["reason"] = "删除记录ID：".$id."失败！";
		  			break;
		  		}
  			}
  		}
  	}else{
  		$res["reason"] = "你没有权限！";
  	}
  }
  else if($action=="new"){
  	if($_SESSION['user_info']['type']==1){
  		$key = $invitation->genInvitationCode($_SESSION['user_info']['id']);
  		if($key){
  			$res["result"] = true;
		  	$res["reason"] = "添加邀请码成功！";
  		}else{
  			$res["reason"] = "添加邀请码失败！";
  		}
  	}else{
  		$res["reason"] = "你没有权限！";
  	}
  }
  else{
  	$res["reason"] = "不支持的请求！";
  }
  
  if($mysqli!=null) $db->closeDB();
  die(json_encode($res));
  
?>
