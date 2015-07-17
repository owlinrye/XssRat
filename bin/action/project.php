<?php
/* 
 * Created on 2014��3��9��
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
  require_once(PHP_BASE_DIR."/entity/Module.php");
 require_once(PHP_BASE_DIR."/entity/ProjectModule.php");
 
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
	$module = new Module($mysqli,$log);
	$projectModule = new ProjectModule($mysqli,$log);
	if($data['op']==='del'){
		foreach($data['data'] as $prodata ){
			//validate power
			//judge if  the project u_id is eq user id
			if($project->getProjectById($prodata['id'])){
				if($project->u_id!==$_SESSION['user_info']['id']){
					$res["result"] = false;
					$res["reason"] = "U have no power to del ID:".$prodata['id'];
					$db->closeDB();
					die(json_encode($res));
				}
			}else{
				$res["result"] = false;
				$res["reason"] = "Project ID:".$prodata['id']."Not Found!";
				$db->closeDB();
				die(json_encode($res));
			}
			 
			if(!($project->delProject($prodata['id'])&&$projectModule->delProjectModuleByPID($prodata['id']))){
				$res["reason"] = "Del Project ID:".$prodata['id']."Failed";
				$db->closeDB();
				die(json_encode($res));
			}	 	
		}
		$res['result'] = true;
	 	$res['reason'] = 'Del Project Success!';
	}else{

		if(!$module->getModuleByID($data['m_id'])){
			$res["reason"] = "Module not exist";
			$db->closeDB();
			die(json_encode($res));
		}
		
		if($data['op']==='add'){
			
			//validate power
			//judge the editor id and the project uid
			if((int)$_SESSION['user_info']['id']!==(int)$data['u_id']){
				$res["reason"] = "u have no power";
				$db->closeDB();
				die(json_encode($res));
			} 
			
			$project->id = $data['id'];
			$project->u_id = $_SESSION['user_info']['id'];
			$project->m_id = $data['m_id'];
			$project->name = htmlspecialchars($data['name'],ENT_QUOTES);
			$project->discribe = htmlspecialchars($data['discribe'],ENT_QUOTES);
					//生成tciket
			$project->ticket = substr(md5(uniqid()+(string)rand()),-8);
			$project->exp_url = dirname($_SERVER["HTTP_REFERER"])."/"."rat.php?t=".$project->ticket;
			
			$projectModule->project_id = $project->addProject();
			$projectModule->module_id = $data['m_id'];
			$projectModule->module_path = $module->m_path;
			$projectModule->ticket = $project->ticket;
			$projectModule->config = json_encode($data['config']); 
			
		 	if($projectModule->project_id){
		 		if($projectModule -> addProjectModule()){
		 			$res['result'] = true;
		 			$res['reason'] = 'Add Project Success!';
		 		}else{
		 			$res['reason'] = 'Add Project Module Failed!';
		 		}
		 	}else $res['reason'] = 'Add Project Failed!';
		}
		if($data['op']==='edit'){
					
				//validate power
				//judge the editor id and the project uid
			
				//judge if  the project u_id is eq user id
			if($project->getProjectById((int)$data['id'])){
				if($project->u_id!==$_SESSION['user_info']['id']){
					$res["result"] = false;
					$res["reason"] = "U have no power to Edit ID:".$data['id'];
					$db->closeDB();
					die(json_encode($res));
				}
			}else{
				$res["result"] = false;
				$res["reason"] = "Project ID:".$data['id']."Not Found!";
				$db->closeDB();
				die(json_encode($res));
			}
			
			$project->u_id = $_SESSION['user_info']['id'];
			$project->m_id = $data['m_id'];
			$project->name = htmlspecialchars($data['name'],ENT_QUOTES);
			$project->discribe = htmlspecialchars($data['discribe'],ENT_QUOTES);	
			$project->exp_url = dirname($_SERVER["HTTP_REFERER"])."/"."rat.php?t=".$project->ticket;
			
			if($projectModule -> getProjectModuleByProject($project->id)){
				$projectModule->module_id = $data['m_id'];
				$projectModule->ticket = $project->ticket;
				$projectModule->module_path = $module->m_path;
				$projectModule->config = json_encode($data['config']); 
				if($project->updateProject()&&$projectModule->updateProjectModule()){
		 			$res['result'] = true;
		 			$res['reason'] = 'Edit Project Success!';	
			 	}else $res['reason'] = 'Edit Project Failed!';
			}else{
				$res['reason'] = 'the Module not exists!';
			}
				
		}
		 			
	}
	$db->closeDB();	
}else{
	$res['reason'] = 'failed to connect to database';
}

$log->info('User:'.$_SESSION['user_info']['username'].' '.$res['reason']);
die(json_encode($res)); 
?>
