<?php
/* 
 * Created on 2014��3��13��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 require_once("../Path.php");
 require_once("../sess.php");
 require_once("UploadHandler.php");
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/util/Validator.php");
 require_once(PHP_BASE_DIR."/entity/Module.php");
 
 error_reporting(E_ALL ^ E_NOTICE);
 
 $clientPage = "moduleItem.php";

 //非json数据的请求按照模块编辑或修改来处理
 $file = $_FILES["code_file"];
 $op = $_POST["op"];
 $m_id = $_POST["m_id"];
 $m_name = htmlspecialchars($_POST["m_name"],ENT_QUOTES);
 $author_id = $_POST["author_id"];
 $risk = $_POST["risk"];
 $m_info = htmlspecialchars($_POST["m_info"],ENT_QUOTES);
 $category_id = $_POST["category_id"];
 $m_id = $m_id?(int)$m_id:0;
 $author_id =$author_id?(int)$author_id:0;
 $risk =$risk?(int)$risk:0;
 $data = $_POST["data"];
 

 
 $res = array(
 	"result" => false,
 	"reason" => ""
 );
 
 if(!isset($_SESSION['user_info']) || empty($_SESSION['user_info'])) {
	$res["reason"] = "u are not login";
 	die(json_encode($res));
 }
 
$db = new MySQL($log);
$mysqli = $db->openDB();

if($mysqli==null){
	$res["reason"] = "DB Connect Error";
 	die(json_encode($res));
}

$module = new Module($mysqli,$log);



if($op === "del"){
 		
	foreach($data as $prodata ){
		//validate power
		//judge if  the module author_id is eq user id  
		if($module->getModuleByID($prodata["m_id"])){
			if($module->author_id==(int)$_SESSION['user_info']['id']){
				if($module->delModule($prodata["m_id"])){
					$res['result'] = true;
					$res['reason'] = "Delete Module Success!";
					$log->warn("Delete Module Success, User:".$_SESSION['user_info']['username']." ADDR:".$_SERVER["REMOTE_ADDR"]);
				}else{
					$res['result'] = false;
					$res['reason'] = "Delete Module Failed!";
				}
			}else{
				$res['result'] = false;
				$res["reason"] = "U have no power !";
			}
		}else{
			$res['result'] = false;
			$res['reason'] = "Can't find Module ID:!".$prodata["m_id"];
			break;
		}		
	}
 	
 }else{
 	if(Validator::validateMName($m_name)&&Validator::validateMInfo($m_info)){		
		
			
		if($op=='edit'){
			if($module->getModuleByID($m_id)){
				if($module->author_id==$_SESSION['user_info']['id']){
					$upload = new UploadHandler();
 					$res = $upload->Save($file,"js");
				 	$module->m_name = $m_name;
					$module->m_info = $m_info;
					$module->default_config = "";
					$module->risk = $risk;
					$module->author_id = $_SESSION['user_info']['id'];
					$module->m_id = $m_id;
					$module->category_id = $category_id;
					if($res["result"]) {//如果上传文件成功
						$module->m_path = $res["reason"];
						if($module->updateModule()){
							$res['result'] = true;
							$res["reason"] = $clientPage."?m_id=".$m_id;
							$log->warn("Edit Module Success, User:".$_SESSION['user_info']['username']." ADDR:".$_SERVER["REMOTE_ADDR"]);
						}else{
							$res["result"] = false; 
							$res["reason"] = "Failed To Edit Module";
						}
					}else{//如果上传文件失败
						if($module->updateModuleNoFile()){
							$res["result"] = true;
							$res["reason"] = $clientPage."?m_id=".$m_id;
							$log->warn("Edit Module Success, User:".$_SESSION['user_info']['username']." ADDR:".$_SERVER["REMOTE_ADDR"]);
						}else {
							$res["result"] = false; 
							$res["reason"] = "Failed To Update Module";
						}
					}	
				}else{
					$res['result'] = false;
					$res["reason"] = "U have no power !";
				}
			}else{
					$res['result'] = false;
					$res['reason'] = "Can't find Module ID:!".$m_id;
			}
		}
		if($op=="add"){
			if($author_id===$_SESSION['user_info']['id']){
				
				$upload = new UploadHandler();
 				$res = $upload->Save($file,"js");
 
				$module->m_name = $m_name;
				$module->m_info = $m_info;
				$module->default_config = "";
				$module->risk = $risk;
				$module->author_id = $author_id;
				$module->m_id = $m_id;
				$module->category_id = $category_id;
				if($res["result"]){
					$module->m_path = $res["reason"];
					$new_m_id = $module->addModule();
					if($new_m_id){
						$res["result"] = true;
						$res["reason"] = $clientPage."?m_id=".$new_m_id;
						$log->warn("Add Module Success, User:".$_SESSION['user_info']['username']." ADDR:".$_SERVER["REMOTE_ADDR"]);
					}else {
						$res["result"] = false; 
						$res["reason"] = "Failed To Add Module";
					}
				}else{
					$res['result'] = false;
					$res["reason"] = $res["reason"];
				}	
			}else{
				$res['result'] = false;
				$res["reason"] = "U have no power !";
			}
		}		
 	}else{
		$res['result'] = false;
 		$res["reason"] = "Illegal inputs";
 	}
 	
 }
 $db->closeDB();
 die(json_encode($res));
 
?>
