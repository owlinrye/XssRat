<?php
/*
 * Created on 2014-3-3
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 class Project{
 	
 	private $mysqli;
 	private $fields;
 	private $log;
 	
 	public function __construct($mysqli,$log){
 		$this->mysqli = $mysqli;
 		$this->log = $log;
 		$this->fields = array(
 			'id' => null,
			'u_id' => null,
    		'timestamp' => null,
    		'name' => '',
    		'discribe' => '',
    		'site' => '',
    		'vulnerability' => '',
    		'exp_url' =>''
 		);
 	}
 	
 		
 	public function __get($fieldname){
 			
 		return $this->fields[$fieldname];
 		
 	}
 	
 	public function __set($fieldname,$value){
 		if(array_key_exists($fieldname,$this->fields)){
 			$this->fields[$fieldname] = $value;
 		}
 	}
 	
 	public function getFields(){
 		return $this->fields;
 	}
 	
 	
 	/**
 	 * get projects by user id
 	 * the function returns the array of project  object;
 	 * if get nothing, the  sizeof($res) == 0
 	 */
 	public function getProjectsByUid($uid){
 		
 		$res = array();
 		$r_id = null;
 		$r_u_id = null;
 		$r_timestamp = null;
 		$r_name = '';
 		$r_discribe = '';
 		$r_site = '';
 		$r_vulnerability = '';
 		$r_exp_url = '';
 		
 		$query = "select * from project where u_id = ? order by timestamp";
 		
 		if($stmt = $this->mysqli->prepare($query)){
 			
 			try{
 				
 				$stmt -> bind_param('d',$uid);
 				$stmt -> execute();
 				$stmt -> bind_result($r_id,$r_u_id,$r_timestamp,$r_name,$r_discribe,$r_site,$r_vulnerability,$r_exp_url);

 				while($stmt->fetch()){
	 				$r_project = new Project($this->mysqli);
	 				$r_project -> id = $r_id;
	 				$r_project -> u_id = $r_u_id;
	 				$r_project -> timestamp = $r_timestamp;
	 				$r_project -> name = $r_name;
	 				$r_project -> discribe = $r_discribe;
	 				$r_project -> site = $r_site;
	 				$r_project -> vulnerability = $r_vulnerability;
	 				$r_project -> exp_url = $r_exp_url;
	 				array_push($res,$r_project);
 				}		
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}else $this->log->error(mysqli_error($this->mysqli)); 
 		
 		return $res;
 	}
 	
 	
 	public function addProject(){
 		$re = false;
 		if($this->fields['name'] == '') return $re;
 		$query = 'insert into project(u_id,name,discribe,site,vulnerability,exp_url) values(?,?,?,?,?,?)';
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('dsssss',$this->u_id,$this->name,$this->discribe,$this->site,$this->vulnerability,$this->exp_url);
 				$stmt -> execute();
 				if($stmt -> affected_rows > 0){
 					$re = true;
 				}
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}
 		return $re;
 	}
 	
 		
 	public  function delProject($id){
 		$re = false;
 		$query = "delete from project where id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
				$stmt -> bind_param('d',$id);
				$stmt -> execute();
				if($stmt -> affected_rows > 0){
					$re = true;
				}
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}
 		return $re; 		
 	}
 	
 	
 	public function updateProject(){
 		$re = false;
 		$query = "update project set u_id = ? , set name = ? , set discribe = ?, set site = ? , set vulnerability = ?, set exp_url = ? where id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('dsssssd',$this->u_id,$this->name,$this->discribe,$this->site,$this->vulnerability,$this->exp_url,$this->id);
 				$stmt -> execute();
 				if($stmt -> affected_rows > 0){
 					$re = true;
 				}
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}
 		return $re;
 	}
 	 
 	 
 /**
  * unit test 
  * 
  */
  

  
 	
 }
 
  include("../Path.php");
  include("../db/MySQL.php");
  
  $DB = new MySQL($log);
  $mysqli = $DB->openDB();
  
  if($mysqli!=null){
  	
  	$project = new Project($mysqli,$log);
  	
  	$project->u_id = 1;	
  	$project->name = "test";
  	$project->discribe = "test";
  	$project->site = "www.baidu.com";
  	$project->vulnerability = "storage xss";
  	$project->exp_url = "1111";
  	
  	if($project->addProject()){
  		
  		echo "add Project success!\n";
  		//print_r($project->getFields()); 		
  	}
  	
  	$projects = $project->getProjectsByUid(1);
  	
  	echo "the num of projects of uid 1 is:".count($projects)."\n";
  	if(count($projects)>0){ 
  		print_r($projects[0]->getFields());
  		
  		echo "\n delete the project:". $projects[0]->id;
  		
  		if($project->delProject($projects[0]->id)){			
  			echo "\n delete the project success! \n";
  		}
  	
  	}	
  	$DB->closeDB();
  }else {
  	
  	echo "database connect error!<\br>";
  }
 
 
 
?>
