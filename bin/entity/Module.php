<?php
/*
 * Created on 2014-3-3
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 class Module{
 	
 	
 	private $mysqli;
 	private $fields;
 	private $log;
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'm_id' => null,
    		'm_path' => null,
    		'm_name' => '',
    		'm_info' => '',
    		'default_config' => '',
    		'risk' => null,
    		'author' =>''
    	);
    	echo "123123";
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
 	 * get Modules
 	 * the function returns the array of Modules object;
 	 * if get nothing, the  sizeof($res) == 0
 	 */
 	public function getModules(){
 		$res = array();
 		$sql = "select * from module";

 		$r_m_id = null;
    	$r_m_path = null;
    	$r_m_name = '';
    	$r_m_info = '';
    	$r_default_config = '';
    	$r_risk = null;
    	$r_author ='';
 		
 		
 		if($stmt = $this->mysqli->prepare($sql)){
 			try{
 				$stmt->execute();
 				$stmt -> bind_result($r_m_id,$r_m_path,$r_m_name,$r_m_info,$r_default_config,$r_risk,$r_author);
 				while($stmt->fetch()){
 					$module = new Module($this->mysqli,$this->log);
 					$module->m_id = $r_m_id;
 					$module->m_path = $r_m_path;
 					$module->m_name = $r_m_name;
 					$module->m_info = $r_m_info;
 					$module->default_config = $r_default_config;
 					$module->risk = $r_risk;
 					$module->author = $r_author;
 					array_push($res,$module);	
 				}	
 			}catch(Exception $e){
 					$this->log->error(mysqli_error($this->mysqli));
 			}
 			
 			$stmt->close();
 		}
 		
 		return $res;
 	}
 	
 	
 	public function addModule(){
 		$re = false;
 		if($this->fields['m_name'] == '') return $re;
 		$query = 'insert into module(m_path,m_name,m_info,default_config,risk,author) values(?,?,?,?,?,?)';
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('ssssds',$this->m_path,$this->m_name,$this->m_info,$this->default_config,$this->risk,$this->author);
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
 	
 	
 	 	
 	public  function delModule($id){
 		$re = false;
 		$query = "delete from module where m_id = ?";
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
 	
 	
 	public function updateModule(){
 		$re = false;
 		$query = "update module set  set m_path = ? ,set m_name = ? , set m_info = ?, set default_config = ? , set risk = ?, set author = ? where m_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('dsssssd',$this->m_path,$this->m_name,$this->m_info,$this->default_config,$this->risk,$this->author,$this->m_id);
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
  * unit test 
  * 
  */
  
 
  include("../Path.php");
  include("../db/MySQL.php");
  
  $DB = new MySQL($log);
  $mysqli = $DB->openDB();
  
  if($mysqli!=null){
  	
  	$module = new Module($mysqli,$log);
  	
	$module->m_path = "asdfasdfasdf";
	$module->m_name = "aaaaaaa";
	$module->m_info = "asdfasdfasdf";
	$module->default_config = "asdfasdfasdfsadfasdfa";
	$module->risk = 1;
	$module->author = "owlinrye";
  	
  	if($module->addModule()){
  		
  		echo "add module success!\n";	
  	}
  	
  	$modules = $module->getModules();
  	
  	echo "the num of modules of uid 1 is:".count($modules)."\n";
  	if(count($modules)>0){ 
  		print_r($modules[0]->getFields());
  		
  		echo "\n delete the module:". $modules[0]->m_id;
  		
  		if($module->delModule($modules[0]->m_id)){			
  			echo "\n delete the module success! \n";
  		}
  	
  	}	
  	$DB->closeDB();
  }else {
  	
  	echo "database connect error!<\br>";
  }
 
 
?>
