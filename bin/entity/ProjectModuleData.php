<?php
/*
 * Created on 2014-3-20
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
  class ProjectModuleData{
 	
  	private $mysqli;
 	private $fields;
 	private $log;	
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'pmd_id' => null,
    		'ticket' => '',
    		'p_id' => null,
    		'clientIP' => '',
    		'time' => '',
    		'uptime' => '',
    		'status' => null,
    		'ec' => '',
    		'userAgent' => '',
    		'Referer' => '',
    		'Data' => ''
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
    
    public function getPMDByProject($p_id){
    
    	$res = array();
    	$r_pmd_id = null;
    	$r_ticket = '';
    	$r_p_id = null;
    	$r_clientIP = '';
    	$r_time = '';
    	$r_uptime = '';
    	$r_userAgent = '';
    	$r_status = null;
    	$r_ec = '';
    	$r_Referer = '';
    	$r_Data = '';
    	$query = "select pmd_id, ticket, p_id,clientIP, UNIX_TIMESTAMP(time),UNIX_TIMESTAMP(uptime),status,ec,userAgent,Referer,Data from pm_data where p_id = ? order by uptime desc";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		
    		try{
    		
	    		$stmt -> bind_param('d',$p_id);
	 			$stmt -> execute();
	 			$stmt -> bind_result($r_pmd_id,$r_ticket,$r_p_id,$r_clientIP,$r_time,$r_uptime,$r_status,$r_ec,$r_userAgent,$r_Referer,$r_Data);
	 			
	 			while($stmt->fetch()){	
	 				$r_pmd = new ProjectModuleData($this->mysqli,$this->log);
	 				$r_pmd -> pmd_id = (int)$r_pmd_id;
	 				$r_pmd -> ticket = $r_ticket;
	 				$r_pmd -> clientIP = $r_clientIP;
	 				$r_pmd -> p_id = (int)$r_p_id;
	 				$r_pmd -> time = date("Y-m-d H:i:s",$r_time);
	 				$r_pmd -> uptime = date("Y-m-d H:i:s",$r_uptime);
	 				$r_pmd -> status = $r_status;
	 				$r_pmd -> ec = $r_ec;
	 				$r_pmd -> userAgent = $r_userAgent;
	 				$r_pmd -> Referer = $r_Referer;
	 				$r_pmd -> Data = $r_Data;
	 				array_push($res,$r_pmd);
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
    
    public function getPmdByID($pmd_id){
    	$res = false;
    	$r_pmd_id = null;
    	$r_ticket = '';
    	$r_p_id = null;
    	$r_clientIP = '';
    	$r_time = '';
    	$r_uptime = '';
    	$r_userAgent = '';
    	$r_status = null;
    	$r_ec = '';
    	$r_Referer = '';
    	$r_Data = '';
    	$query = "select pmd_id,ticket, p_id,clientIP, UNIX_TIMESTAMP(time),UNIX_TIMESTAMP(uptime),status,ec,userAgent,Referer,Data from pm_data where  pmd_id = ?";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		
    		try{
    		
	    		$stmt -> bind_param('d',$pmd_id);
	 			$stmt -> execute();
	 			$stmt -> bind_result($r_pmd_id,$r_ticket,$r_p_id,$r_clientIP,$r_time,$r_uptime,$r_status,$r_ec,$r_userAgent,$r_Referer,$r_Data);
	 			
	 			if($stmt->fetch()){	
	 				$this -> pmd_id = (int)$r_pmd_id;
	 				$this -> ticket = $r_ticket;
	 				$this -> clientIP = $r_clientIP;
	 				$this -> p_id = (int)$r_p_id;
	 				$this -> time = date("Y-m-d H:i:s",$r_time);
	 				$this -> uptime = date("Y-m-d H:i:s",$r_uptime);
	 				$this -> status = $r_status;
	 				$this -> ec = $r_ec;
	 				$this -> userAgent = $r_userAgent;
	 				$this -> Referer = $r_Referer;
	 				$this -> Data = $r_Data;
	 				$res = true;
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
    
    
        public function getPmdByEC($ec,$ticket){
    	$res = false;
    	$r_pmd_id = null;
    	$r_ticket = '';
    	$r_p_id = null;
    	$r_clientIP = '';
    	$r_time = '';
    	$r_uptime = '';
    	$r_userAgent = '';
    	$r_status = null;
    	$r_ec = '';
    	$r_Referer = '';
    	$r_Data = '';
    	$query = "select pmd_id,ticket, p_id,clientIP, UNIX_TIMESTAMP(time),UNIX_TIMESTAMP(uptime),status,ec,userAgent,Referer,Data from pm_data where  ec = ? and ticket = ?";
    	
    	if($stmt = $this->mysqli->prepare($query)){
    		
    		try{
    		
	    		$stmt -> bind_param('ss',$ec,$ticket);
	 			$stmt -> execute();
	 			$stmt -> bind_result($r_pmd_id,$r_ticket,$r_p_id,$r_clientIP,$r_time,$r_uptime,$r_status,$r_ec,$r_userAgent,$r_Referer,$r_Data);
	 			
	 			if($stmt->fetch()){	
	 				$this -> pmd_id = (int)$r_pmd_id;
	 				$this -> ticket = $r_ticket;
	 				$this -> clientIP = $r_clientIP;
	 				$this -> p_id = (int)$r_p_id;
	 				$this -> time = date("Y-m-d H:i:s",$r_time);
	 				$this -> uptime = date("Y-m-d H:i:s",$r_uptime);
	 				$this -> status = $r_status;
	 				$this -> ec = $r_ec;
	 				$this -> userAgent = $r_userAgent;
	 				$this -> Referer = $r_Referer;
	 				$this -> Data = $r_Data;
	 				$res = true;
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
    
      
    
    public function getUidOfPmdId($pmd_id){
    	$re = 0;
    	$u_id = null;
    	$query = " select u_id from project where id = ( select p_id from pm_data where pmd_id = ? ) ";
    	try{
    		if($stmt = $this->mysqli->prepare($query)){
    			$stmt -> bind_param('d',$pmd_id);
    			$stmt -> execute();
    			$stmt -> bind_result($u_id);
    			if($stmt->fetch()){
    				$re = $u_id;
    			}
    			$stmt->close();
    			
    		}else{
    			$this->log->error(mysqli_error($this->mysqli));
    		}
    	}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli));
    	}
    	
    	return $re;
    }
    
    
    public function addPMD(){
    	
    	$re = false;
    	$query = "insert into pm_data(ticket,p_id,clientIP,time,status,ec,userAgent,Referer,Data) values(?,?,?,?,?,?,?,?,?)";
    	
    	if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('sdssdssss',$this->ticket,$this->p_id,$this->clientIP,$this->time,$this->status,$this->ec,$this->userAgent,$this->Referer,$this->Data);
				$stmt -> execute();
				echo mysqli_error($this->mysqli);
				if($stmt -> affected_rows > 0){
					$re = $this->mysqli->insert_id;
				}else $this->log->error( mysqli_error($this->mysqli));
    		}catch(Exception $e){
    			$this->log->error(mysqli_error($this->mysqli)."|".$e->getMessage());
    		}
 			$stmt->close();
    	}else {
    		$this->log->error(mysqli_error($this->mysqli));
    	}
    	return $re;
    }
    
    public  function delPMD($pmd_id,$p_id){
 		$re = false;
 		$query = "delete from pm_data where pmd_id = ? and p_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('dd',$pmd_id,$p_id);
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
 	
 	
 	public function updatePMD(){
 		$re = false;
 		$query = "update pm_data set ticket=? , p_id = ?, clientIP = ? ,time = ?,status = ?, ec = ?, userAgent = ?, Referer = ?, Data = ?  where pmd_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('sdssdssssd',$this->ticket,$this->p_id,$this->clientIP,$this->time,$this->status,$this->ec,$this->userAgent,$this->Referer,$this->Data,$this->pmd_id);
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
 	
 	 public function getStatus($pmd_id){
 		$re = 0;
 		$status= 0;
 		$query = "select status from pm_data where pmd_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param("d",$pmd_id);
 				$stmt -> execute();
 				$stmt -> bind_result($status);
 				if($stmt->fetch()){
 					$re = $status;
 				}
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt -> close();
 		}
 		return $re;
 	}
 	
 	public function updateStatus($pmd_id,$status){
 		$re = false;
 		$uptime = date("Y-m-d H:i:s");
 		$query = "update pm_data set uptime = ?, status = ? where pmd_id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param("sdd",$uptime,$status,$pmd_id);
 				$stmt -> execute();
	 			if($stmt -> affected_rows > 0){
	 				$re = true;
	 			}
 			}catch(Exception $e){
 				$this->log->error(mysqli_error($this->mysqli));
 			}
 			$stmt -> close();
 		}else $this->log->error(mysqli_error($this->mysqli));
 		return $re;
 	}
 	
 	//session management
 	
 	
 	
 
 } 

?>
