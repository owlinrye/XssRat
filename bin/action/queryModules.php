<?php
/* 
 * Created on 2014��3��20��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 require_once("../Path.php");
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/entity/Module.php");
 
 error_reporting(E_ALL ^ E_NOTICE);
 header("Content-Type: application/json; charset=UTF-8"); 
 
 $res = array(
 	"result" => false,
 	"data" => ""
 );
 
 $db = new MySQL($log);
 $mysqli = $db->openDB();
	
if($mysqli!==null){
	$module = new Module($mysqli,$log);
	$modules= $module->getModules();	
	if(count($modules)>0){
		$mds = array();
		foreach($modules as $md){
			$mds[] = $md->getFields();
		}
		$res["result"] = true;
		$res["data"] = $mds;
	}else{
		$res["data"] = "No Modules";
	}
	$db->closeDB();	
}else{
	$res["data"] = "Connect to Database Error";
}	
 
die(json_encode($res));
 
?>
