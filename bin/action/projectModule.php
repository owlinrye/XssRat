<?php
/* 
 * Created on 2014��5��3��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 require_once("../Path.php");
 require_once("../sess.php");
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/util/util.php"); 
 require_once(PHP_BASE_DIR."/entity/Project.php");
require_once(PHP_BASE_DIR."/entity/ProjectModule.php");
error_reporting(E_ALL ^ E_NOTICE);
header("Content-Type: application/javascript; charset=UTF-8"); 
 
  /**
  * validate power
  */
$p_id = empty($_GET['p_id'])?0:(int)$_GET['p_id'];

if(!isset($_SESSION['user_info']) || empty($_SESSION['user_info'])) {
	$res["reason"] = "u are not login";
 	die(json_encode($res));
 }
 
 $db = new MySQL($log);
 $mysqli = $db->openDB();
 if($mysqli!==null){
 	$project = new Project($mysqli,$log);
 	$projectModule = new ProjectModule($mysqli,$log);
 	$project->getProjectById($p_id);
 	if($_SESSION['user_info']['id']===$project->u_id){
 		$projectModule->getProjectModulesByProject($p_id);
 		die("coreconfig = ".$projectModule->config); 
 	}
 	$db -> closeDB();
 }
 
 die("coreconfig = null;");
 
 
?>
