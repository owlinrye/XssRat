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
    		'module_path' => '',
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
    
    public function getProjectModulesByProject($p_id){
    
    	$res = array();
    	$r_pm_id = null;
    	$r_project_id = null;
    	$r_module_path = '';
    	$r_config = '';
    	$query = "select * from project_module where project_id = ?";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		
    		try{
    		
	    		$stmt -> bind_param('d',$p_id);
	 			$stmt -> execute();
	 			$stmt -> bind_result($r_pm_id,$r_project_id,$r_module_path,$r_config);
	 			while($stmt->fetch()){	
	 				$r_project_module -> pm_id = $r_pm_id;
	 				$r_project_module -> project_id = $r_project_id;
	 				$r_project_module -> module_path = $r_module_path;
	 				$r_project_module -> config = $r_config;
	 				$r_project_module = new ProjectModule($this->mysqli);
	 				$res->push($r_project_module);
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
    	$query = "insert into project_module(project_id,module_path,config) values(?,?,?)";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		$stmt -> bind_param('dss',$this->project_id,$this->module_path,$this->config);
    		$stmt -> execute();
    		if($stmt -> affected_rows > 0){
 				$re = true;
 			}
 			$stmt->close();
    	}
    	
    	return $re;
    }
    
    
    
 }
 
 
?>
