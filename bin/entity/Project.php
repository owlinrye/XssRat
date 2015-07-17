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
			'm_id' => null,
    		'timestamp' => null,
    		'name' => '',
    		'discribe' => '',
    		'exp_url' =>'',
    		'ticket' => ''
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
 		$r_m_id = null;
 		$r_timestamp = null;
 		$r_name = '';
 		$r_discribe = '';
 		$r_exp_url = '';
 		$r_ticket = '';
 		
 		$query = "select * from project where u_id = ? order by timestamp DESC";
 		
 		if($stmt = $this->mysqli->prepare($query)){
 			
 			try{
 				
 				$stmt -> bind_param('d',$uid);
 				$stmt -> execute();
 				$stmt -> bind_result($r_id,$r_u_id,$r_m_id,$r_timestamp,$r_name,$r_discribe,$r_exp_url,$r_ticket);

 				while($stmt->fetch()){
	 				$r_project = new Project($this->mysqli,$this->log);
	 				$r_project -> id = $r_id;
	 				$r_project -> u_id = $r_u_id;
	 				$r_project -> m_id = $r_m_id;
	 				$r_project -> timestamp = $r_timestamp;
	 				$r_project -> name = htmlspecialchars($r_name,ENT_QUOTES,'UTF-8');
	 				$r_project -> discribe = htmlspecialchars($r_discribe,ENT_QUOTES,'UTF-8');
	 				$r_project -> exp_url = htmlspecialchars($r_exp_url,ENT_QUOTES,'UTF-8');
	 				$r_project -> ticket = htmlspecialchars($r_ticket,ENT_QUOTES,'UTF-8');
	 				array_push($res,$r_project);
 				}		
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}else $this->log->error(mysqli_error($this->mysqli)); 
 		
 		return $res;
 	}
 	
 	public function getMailByTiket($ticket){
 		$res = false;
 		$r_email = '';
 		$query = "select email from user where id = ( select u_id from project where ticket = ? ) and b_send = 1";
 		
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('s',$ticket);
 				$stmt -> execute();	
 				$stmt -> bind_result($r_email);
 				
 				if($stmt->fetch()){
 					$res = $r_email;
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
			$this->log->error(mysqli_error($this->mysqli));
 		}
 		return $res;
 	}
 	
 	
 	public function getProjectById($id){
 		$res = false;
 		$r_id = null;
 		$r_u_id = null;
 		$r_m_id = null;
 		$r_timestamp = null;
 		$r_name = '';
 		$r_discribe = '';
 		$r_exp_url = '';
 		$r_ticket = '';
 		$query = "select * from project where id = ?";
 		if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('d',$id);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_u_id,$r_m_id,$r_timestamp,$r_name,$r_discribe,$r_exp_url,$r_ticket);
				if($stmt->fetch()){
					$this -> id = $r_id;
 					$this -> u_id = $r_u_id;
 					$this -> m_id = $r_m_id;
 					$this -> timestamp = $r_timestamp;
 					$this -> name = htmlspecialchars($r_name,ENT_QUOTES,'UTF-8');
 					$this -> discribe = htmlspecialchars($r_discribe,ENT_QUOTES,'UTF-8');
 					$this -> exp_url = htmlspecialchars($r_exp_url,ENT_QUOTES,'UTF-8');
 					$this -> ticket = htmlspecialchars($r_ticket,ENT_QUOTES,'UTF-8');
 					$res = true;
				}
			}catch(Exception $e){
				$this->log->error(mysqli_error($this->mysqli));
			}
 		}
 		return $res;
 	}
 	
 	public function getProjectByTicket($ticket){
 		$res = false;
 		$r_id = null;
 		$r_u_id = null;
 		$r_m_id = null;
 		$r_timestamp = null;
 		$r_name = '';
 		$r_discribe = '';
 		$r_exp_url = '';
 		$r_ticket = '';
 		$query = "select * from project where ticket = ?";
 		if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('s',$ticket);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_u_id,$r_m_id,$r_timestamp,$r_name,$r_discribe,$r_exp_url,$r_ticket);
				if($stmt->fetch()){
					$this -> id = $r_id;
 					$this -> u_id = $r_u_id;
 					$this -> m_id = $r_m_id;
 					$this -> timestamp = $r_timestamp;
 					$this -> name = htmlspecialchars($r_name,ENT_QUOTES,'UTF-8');
 					$this -> discribe = htmlspecialchars($r_discribe,ENT_QUOTES,'UTF-8');
 					$this -> exp_url = htmlspecialchars($r_exp_url,ENT_QUOTES,'UTF-8');
 					$this -> ticket = htmlspecialchars($r_ticket,ENT_QUOTES,'UTF-8');
 					$res = true;
				}
			}catch(Exception $e){
				$this->log->error(mysqli_error($this->mysqli));
			}
 		}
 		return $res;
 	}



 	
 	public function addProject(){
 		$re = false;
 		if($this->fields['name'] == '') return $re;
 		$query = 'insert into project(u_id,m_id,name,discribe,exp_url,ticket) values(?,?,?,?,?,?)';
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('ddssss',$this->u_id,$this->m_id,$this->name,$this->discribe,$this->exp_url,$this->ticket);
 				$stmt -> execute();
 				if($stmt -> affected_rows > 0){
 					$re = $this->mysqli->insert_id;
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
 		$query = "update project set u_id = ? , m_id=  ?, name = ? ,discribe = ?, exp_url = ? ,ticket = ? where id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('ddssssd',$this->u_id,$this->m_id,$this->name,$this->discribe,$this->exp_url,$this->ticket,$this->id);
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
 	 
   
 	
 }
 
 /**	 
  *unit test 
  * 
  



 
  include("../Path.php");
  include("../db/MySQL.php");
  
  $DB = new MySQL($log);
  $mysqli = $DB->openDB();
  
  if($mysqli!=null){
  	
  	$project = new Project($mysqli,$log);
  	
  	$project->u_id = 1;	
  	$project->name = "test";
  	$project->discribe = "test<script>alert('123123')</script>";
  	$project->site = "www.baidu.com<script>alert(\"123123\")</script>";
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
 
 **/
  
?>
