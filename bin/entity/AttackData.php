<?php
/* 
 * Created on 2014��4��7��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 class AttackData{
 	
  	private $mysqli;
 	private $fields;
 	private $log;	
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'id' => null,
    		'pmd_id' => null,
    		'module_id' => null,
    		'status' => null,
    		'datetime' => null,
    		'module_config' => '',
    		'data' => ''
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
    
    
    public function getDatas($pmd_id,$start_id=0){
		$res =  array();
		$query = "select id,pmd_id,module_id,datetime,status,module_config,data from attack_data where  id > ? and pmd_id = ? ";
		
		$r_id = null;
		$r_pmd_id = null;
		$r_module_id = null;
		$r_status = null;
		$r_datetime = "";
		$r_module_config = "";
		$r_data = "";
		
		if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('dd',$start_id,$pmd_id);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_pmd_id,$r_module_id,$r_datetime,$r_status,$r_module_config,$r_data);
				while($stmt->fetch()){
					$atdata = new AttackData($this->mysqli,$this->log);
					$atdata -> id = $r_id;
					$atdata -> pmd_id = $r_pmd_id;
					$atdata -> module_id = $r_module_id;
					$atdata -> datetime = $r_datetime;
					$atdata -> status = $r_status;
					$atdata -> module_config = $r_module_config;
					$atdata -> data = $r_data;
					array_push($res,$atdata);
				}
    		}catch(Exception $e){
    			$this->log->error("attackData->getDatas() Error: ".mysqli_error($this->mysqli));
    		}
 			$stmt->close();
    	}else{
    		$this->log->error("attackData->getDatas() Error: ".mysqli_error($this->mysqli));
    	}
    	return $res;		
    }
    
    
    public function getDatasByPmdID($pmd_id){
    	$res =  array();
		$query = "SELECT
					a.id AS id,
					a.module_id AS m_id,
					b.m_name AS m_name,
					a.datetime AS datetime,
					a.status AS status,
					a.module_config AS moudle_config,
					a.data AS data
					FROM
						attack_data AS a , module AS b
					WHERE
						a.module_id = b.m_id
					AND pmd_id = ?
					ORDER BY
					datetime DESC ";
		
		$r_id = null;
		$r_m_id = null;
		$r_m_name = "";
		$r_datetime = "";
		$r_status = null;
		$r_module_config = "";
		$r_data = "";
		try{
			if($stmt = $this->mysqli->prepare($query)){
				$stmt -> bind_param('d',$pmd_id);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_m_id,$r_m_name,$r_datetime,$r_status,$r_module_config,$r_data);
				while($stmt->fetch()){
					$row = array(
						"id" => $r_id,
						"m_id" => $r_m_id,
						"m_name" => $r_m_name,
						"datetime" => $r_datetime,
						"module_config" => $r_module_config,
						"status" => $r_status
					);
					array_push($res,$row);
				}
				$stmt->close();
			}else $this->log->error("attackData->getDatasByPmdID() Error: ".mysqli_error($this->mysqli));
			
		}catch(Exception $e){
			$this->log->error(mysqli_error($this->mysqli));
		}
		return $res;
    }
    
    public function getDataByID($id){
    	$res = false;
    	$r_data = "";
    	$query = "select data from attack_data where id = ?";
    	try{
    		if($stmt = $this->mysqli->prepare($query)){
    			$stmt -> bind_param('d',$id);
    			$stmt -> execute();
    			$stmt -> bind_result($r_data);
    			if($stmt -> fetch()){
    				$res = (string)$r_data;
    			}
    		}else $this->log->error(mysqli_error($this->mysqli));
    		$stmt->close();
    	}catch(Exception $e){
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $res;
    }
    
    public function newAttackData(){
    	$re = false;
    	$status = 0;
    	$query = "insert into attack_data (pmd_id,module_id,status,module_config) values (?,?,?,?)";
    	if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('ddds',$this->pmd_id,$this->module_id,$status,$this->module_config);
				$stmt -> execute();
				if($stmt -> affected_rows > 0){
					$re = $this->mysqli->insert_id;
				}else $this->log->error( mysqli_error($this->mysqli));
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    		}
 			$stmt->close();
    	}else {
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $re;
    }
    
    public function checkStatus($pmd_id){
    	
    }
    
    public function fetchModuleToAttack($pmd_id){
    	$re = false;
    	
    	$id = null;
    	$m_path = null;
    	$m_name = null;
    	$module_config = null;

    	$query = "SELECT
					a.id AS id,
					b.m_path AS m_path,
					b.m_name as m_name,
					a.module_config AS module_config
				FROM
					attack_data AS a,
					module AS b
				WHERE
					a.module_id = b.m_id
				AND a.`status` = 0
				AND a.pmd_id = ?
				ORDER BY
					a.datetime ASC";
		try{
			if($stmt = $this->mysqli->prepare($query)){
				$stmt -> bind_param('d',$pmd_id);
				$stmt -> execute();
				$stmt -> bind_result($id,$m_path,$m_name,$module_config);
				if($stmt -> fetch()){
    				$re = array(
    					'id' => $id,
    					'm_name' => $m_name,
    					'm_path' =>  $m_path,
    					'config' => $module_config
    				);
    				
    			}
    			$stmt->close();
			}else $this->log->error( mysqli_error($this->mysqli));
			
		}catch(Exception $e){
			$this->log->error(mysqli_error($this->mysqli));
		}
		return $re;	
    }
     
    public function updateAttackStatus($pmd_id,$timeout = 15){
    	$re = false;
    	// now - datetime > timeout 则攻击失败
    	$query = "UPDATE attack_data SET `status` = - 1 WHERE `status` = 2 AND pmd_id = ? AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(datetime) > ?;";
    	try{
    		if($stmt = $this->mysqli->prepare($query)){
    			$stmt -> bind_param('dd',$pmd_id,$timeout);
    			$stmt -> execute();
    			if($this->mysqli->errno==0) $re = true;
    		}
    	}catch(Exception $e){
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $re;
    }
    
    public function setStatus($id,$status){
    	$re = false;
    	$query = "UPDATE attack_data SET `status` = ? WHERE id = ? ";
    	try{
    		if($stmt = $this->mysqli->prepare($query)){
    			$stmt -> bind_param('dd',$status,$id);
    			$stmt -> execute();
    			if($this->mysqli->errno==0) $re = true;
    		}
    	}catch(Exception $e){
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $re;
    }
    
    public function insertData(){
    	$re = false;
    	$query = "insert into attack_data (pmd_id,module_id,status,module_config,data) values (?,?,?,?)";
    	if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('ddss',$this->pmd_id,$this->module_id,$this->module_config,$this->data);
				$stmt -> execute();
				if($stmt -> affected_rows > 0){
					$re = $this->mysqli->insert_id;
				}else $this->log->error( mysqli_error($this->mysqli));
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    		}
 			$stmt->close();
    	}else {
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $re;
    }
    
    public function updateData($id,$data){
     	$re = false;
    	$query = "update attack_data set data = ?, status = 1 where id = ? ";
    	if($stmt = $this->mysqli->prepare($query)){
    		try{
    			$stmt -> bind_param('sd',$data,$id);
    			$stmt -> execute();
    			if($stmt -> affected_rows > 0){
    				$re = true;
    			}else $this->log->error(mysqli_error($this->mysqli));
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    		}
    		$stmt->close();
    	}
    	return $re;   	
    }

    
 }
 
?>
