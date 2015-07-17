<?php
/* 
 * Created on 2014��5��10��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 	
 class Invitation{
 	
  	private $mysqli;
 	public $fields;
 	private $log;
 	
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'id' => null,
    		'friend_uid' => null,
    		'new_uid' => null,
    		'key' => '',
    		'status' => null,
    		'uptime' => ''
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
 	 * 生成一个新的邀请码
 	 */
 	public function genInvitationCode($u_id){
 		$re = false;
 		$code = hash('md5',uniqid().rand(1,10000));
 		$query = "INSERT INTO invitation (`friend_uid`,`key`,`status`) values (?,?,0)";
 		
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('ds',$u_id,$code);
 				$stmt->execute();
 				if($stmt->affected_rows>0){
 					$re = $code;
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->genInvationCode() : ".mysqli_error($this->mysqli));
 		}
 		
 		return $re;	
 	}
 	
 	/**
 	 * 验证邀请码
 	 * 
 	 */
 	public function vilidateCode($code){
 		$re = false;
 		$r_id = null;
 		$query = "SELECT id FROM `invitation` WHERE `key` = ?";
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('s',$code);
 				$stmt->execute();
 				$stmt-> bind_result($r_id);
 				if($stmt->fetch()){
 					$re = $r_id;
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->vilidateCode() : ".mysqli_error($this->mysqli));
 		}
 		return $re;	
 	}
 	
 	/**
 	 * 更新邀请码状态,还未生成新的邮件验证码
 	 */
 	public function setRegister($id,$new_uid){
 		$re = false;
 		$query = "UPDATE invitation SET new_uid = ?,status = 2 WHERE id = ?";
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('dd',$new_uid,$id);
 				$stmt->execute();
 				if($stmt->affected_rows>0){
 					$re = true;
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->setRegister() : ".mysqli_error($this->mysqli));
 		}
 		
 		return $re;	
 		
 	}
 	
 	/**
 	 * 
 	 * 生成新的邮件验证码
 	 * 
 	 */
 	 public function genEmailValidateCode($new_uid){
 	 	$re = false;
 		$code = hash('md5',uniqid().rand(1,10000));
 		
 		$query = "UPDATE invitation SET `status` = 3,`key` = ? WHERE `new_uid` = ? AND (`status` = 2 OR `status` = 3)";
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('sd',$code,$new_uid);
 				$stmt->execute();
 				if($stmt->affected_rows>0){
 					$re = $code;
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->genEmailValidateCode() : ".mysqli_error($this->mysqli));
 		}
 		return $re;	
 	 }
 	 
 	 
 	 /**
 	 * 
 	 * 生成新的密码重置验证码
 	 * 
 	 */
 	 public function genPwdEmailValidateCode($new_uid){
 	 	$re = false;
 		$code = hash('md5',uniqid().rand(1,10000));
 		
 		$query = "UPDATE invitation SET `status` = 3,`key` = ? WHERE `new_uid` = ?  AND (`status` = 1 OR `status` = 3)";
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('sd',$code,$new_uid);
 				$stmt->execute();
 				if($stmt->affected_rows>0){
 					$re = $code;
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->genPwdEmailValidateCode() : ".mysqli_error($this->mysqli));
 		}
 		return $re;	
 	 }
 	 
 	 
 	 
 	/**
 	 * 
 	 * 验证邮件
 	 * 
 	 */
 	 public function validateEmailCode($code,$u_id){
 	 	$res = array(
 	 		'result' => false,
 	 		'reason' => ''
 	 	);
 	 	$r_id = null;
 	 	$r_uptime = '';
 		$query = "SELECT id,unix_timestamp(uptime)  FROM `invitation` WHERE `new_uid`= ? and `key` = ? and `status`= 3 ";
 		$query_2 = "UPDATE invitation SET `status` = 1 where `id`= ?";
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt -> bind_param('ds',$u_id,$code);
 				$stmt->execute();
 				$stmt-> bind_result($r_id,$r_uptime);
 				if($stmt->fetch()){
 					$stmt->close();
 					if($r_id>0&&($r_uptime+259200>time())){//激活链接三天内有效
 						$stmt_2 = $this->mysqli->prepare($query_2);
 						$stmt_2 -> bind_param('d',$r_id);
 						$stmt_2->execute();
 						if($stmt_2->affected_rows>0){
 							$res['result'] = true;
 							$res['reason'] = "帐号已激活成功！";
 						}
 						$stmt_2->close();
 					}else {
 						$res['reason'] = "当前链接已过时，请重新发送激活邮件！";
 					}
 				}else{
 					$stmt->close();
 					$res['reason'] = "当前链接无效，验证码不正确！";
 				}
 				
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->validateEmailCode() : ".mysqli_error($this->mysqli));
 			$res['reason'] = "数据库执行异常！";
 		}
 		return $res;	
 	 }
 	
 	
 	public function getInvitations(){
 		$res = array();
 		$query = "SELECT a.id,a.uptime,b.username,a.key,a.status  FROM invitation AS a , user AS b  WHERE a.friend_uid = b.id  ORDER BY uptime DESC";
 		
 		$r_id = null;
 		$r_uptime = '';
 		$r_username = '';
 		$r_key = '';
 		$r_status = null;
 		
 		try{
 			if($stmt = $this->mysqli->prepare($query)){
 				$stmt->execute();
 				$stmt-> bind_result($r_id,$r_uptime,$r_username,$r_key,$r_status);
 				while($stmt->fetch()){
 					$r = array(
 						'id' => $r_id,
 						'uptime' => $r_uptime,
 						'username' => $r_username,
 						'key' => $r_key,
 						'status' => $r_status
 					);
 					array_push($res,$r);
 				}
 				$stmt->close();
 			}
 		}catch(Exception $e){
 			$this->log->error("Invitaion->getInvitations() : ".mysqli_error($this->mysqli));
 		}
 		return $res;	
 	}
 	
 	public function delInvitation($id){
 		$re = false;
 		$query = "delete from invitation where id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
	 			$stmt -> bind_param('d',$id);
	 			$stmt -> execute();
	 			if($stmt -> affected_rows > 0){
	 				$re = true;
	 			}
 			}catch(Exception $e){
 				$this->log->error("Invitaion->delInvitation() : ".mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}
 		return $re;
 	}
 }
 	
 	
 
?>
