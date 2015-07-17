<?php
/* 
 * Created on 2014��3��27��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 require_once("../Path.php");
 require_once("../sess.php");
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/entity/ProjectModuleData.php");
 require_once(PHP_BASE_DIR."/entity/Project.php");
 
 
 error_reporting(E_ALL ^ E_NOTICE);
 header("Content-Type: application/json; charset=UTF-8");
 
 $data = json_decode(file_get_contents('php://input'), true);
 $res = array(
 	"result" => false,
 	"reason" => ""
 );
 
 if(empty($data)||$data===null){
 	$res["reason"] = "Post Data Illegal";
 	die(json_encode($res));
 }
 
 
  /**
  * validate power
  */
 if(!isset($_SESSION['user_info']) || empty($_SESSION['user_info'])) {
	$res["reason"] = "u are not login";
 	die(json_encode($res));
 }
 
$db = new MySQL($log);
$mysqli = $db->openDB();


if($mysqli!==null){
	$project = new Project($mysqli,$log);
	$pmd = new ProjectModuleData($mysqli,$log);
	if($data["op"]==="del"){
		foreach($data['data'] as $deldata){
			$project ->getProjectById($deldata["p_id"]);
			if($project->u_id===$_SESSION['user_info']['id']){//判断project的所有者是否是当前用户
				if($pmd->delPMD($deldata["pmd_id"],$deldata["p_id"])){
					$res["result"] = true;
					$res["reason"] = "Delete data success!";
				}else{
					$res["result"] = false;
					$res["reason"] = "Delete data failed!";
					$db->closeDB();
					die(json_encode($res));
				}
			}else{
					$res["result"] = false;
					$res["reason"] = "You have not power!";
					$db->closeDB();
					die(json_encode($res));
			}
		}  
	}	
	$db->closeDB();
}

die(json_encode($res));
 
?>
