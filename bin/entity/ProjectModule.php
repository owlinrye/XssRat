<?php
/*
 * Created on 2014-3-3
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 class ProjectModule{
 	
  	private $mysqli;
 	private $fields;
 	private $log;	
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'pm_id' => null,
    		'project_id' => null,
    		'module_id' => null,
    		'module_path' => '',
    		'ticket' => '',
    		'config' => ''
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
 	 * get ProjectModules
 	 * the function returns the array ofProjectModule object;
 	 * if get nothing, the sizeof($res) == 0
 	 */
    
    public function getProjectModuleByProject($p_id){
    
    	$res = false;
    	$r_pm_id = null;
    	$r_project_id = null;
    	$r_module_id = null;
    	$r_module_path = '';
    	$r_ticket = '';
    	$r_config = '';
    	$query = "select * from project_module where project_id = ?";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		
    		try{
    		
	    		$stmt -> bind_param('d',$p_id);
	 			$stmt -> execute();
	 			$stmt -> bind_result($r_pm_id,$r_project_id,$r_module_id,$r_module_path,$r_ticket,$r_config);
	 			if($stmt->fetch()){	
	 				
	 				$this -> pm_id = $r_pm_id;
	 				$this -> project_id = $r_project_id;
	 				$this -> module_id = $r_module_id;
	 				$this -> module_path = $r_module_path;
	 				$this -> ticket = $r_ticket;
	 				$this -> config = $r_config;
	 				$res = true;
	 			}
 			
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    		}
 			$stmt->close();
    	}
    	
    	return $res;
    
    }
    
    
    public function getProjectModulesByTicket($ticket){
    
    	$res = false;
    	$r_pm_id = null;
    	$r_project_id = null;
    	$r_module_id = null;
    	$r_module_path = '';
    	$r_ticket = '';
    	$r_config = '';
    	$query = "select * from project_module where ticket = ?";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		
    		try{
    		
	    		$stmt -> bind_param('s',$ticket);
	 			$stmt -> execute();
	 			$stmt -> bind_result($r_pm_id,$r_project_id,$r_module_id,$r_module_path,$r_ticket,$r_config);
	 			if($stmt->fetch()){	
	 				
	 				$this -> pm_id = $r_pm_id;
	 				$this -> project_id = $r_project_id;
	 				$this -> module_id = $r_module_id;
	 				$this -> module_path = $r_module_path;
	 				$this -> ticket = $r_ticket;
	 				$this -> config = $r_config;
	 				$res = true;
	 			}
 			
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    		}
 			$stmt->close();
    	}
    	
    	return $res;
    
    }
    
    
    public function addProjectModule(){
    	
    	$re = false;
    	$query = "insert into project_module(project_id,module_id,module_path,ticket,config) values (?,?,?,?,?)";
    	
    	if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('ddsss',$this->project_id,$this->module_id,$this->module_path,$this -> ticket,$this->config);
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
    
    public  function delProjectModule($pm_id){
 		$re = false;
 		$query = "delete from project_module where pm_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('d',$pm_id);
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
 	
 	public  function delProjectModuleByPID($project_id){
 		$re = false;
 		$query = "delete from project_module where project_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('d',$project_id);
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
 	
 	
 	
 	public function updateProjectModule(){
 		$re = false;
 		$query = "update project_module set project_id = ? ,module_id = ? ,  module_path = ?, ticket = ?,config = ?  where pm_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('ddsssd',$this->project_id,$this->module_id,$this->module_path,$this->ticket,$this->config,$this->pm_id);
	 			$stmt -> execute();
	 			$re = true;
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}
 		return $re;
 	}
 
    
 }
 
 
?>
