<?php
/* 
 * Created on 2014��4��7��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 class AttackLog{
 	
  	private $mysqli;
 	private $fields;
 	private $log;	
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'id' => null,
    		'pmd_id' => null,
    		'datetime' => null,
    		'log' => ''
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
    
    
    public function getLogs($pmd_id,$start_id=0){
		$res =  array();
		$query = "select id,pmd_id,datetime,log from attack_log where  id > ? and pmd_id = ? ";
		
		$r_id = null;
		$r_pmd_id = null;
		$r_datetime = "";
		$r_log = "";
		
		if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('dd',$start_id,$pmd_id);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_pmd_id,$r_datetime,$r_log);
				while($stmt->fetch()){
					$atlog =  array(
						'id' => $r_id,
						'pmd_id' => $r_pmd_id,
						'datetime' => $r_datetime,
						'log' => $r_log
					);
					array_push($res,$atlog);
				}
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    		}
 			$stmt->close();
    	}else{
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $res;		
    }
    
    public function insertLog($pmd_id,$msg){
    	$re = false;
    	$query = "insert into attack_log (pmd_id,log) values (?,?)";
    	if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('ds',$pmd_id,$msg);
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

    
 }
?>
