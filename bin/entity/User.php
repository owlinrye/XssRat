<?php
/* 
 * Created on 2014��3��2��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
require_once("../Path.php");
 
 class User{
 	
 	private $mysqli;
 	private $fields;
 	private $log;
 	 
 	public function __construct($mysqli,$log){	
 		$this->fields = array(
 			'id' => null,
 			'username' => '',
 			'password' => '',
 			'type' => null,
 			'email' => '');
 		
 		$this->mysqli = $mysqli;
 		$this->log = $log;
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
 	 * get userinfo by user id
 	 * return true success
 	 * return false failure
 	 */
 	public function getUserByID($id){		
 		$re = false;
 		$query = 'select * from user where id = ?';	
 		$r_id = null;
 		$r_username = '';
 		$r_password = '';
 		$r_type = null;
 		$r_email = '';
 		 
		if($stmt = $this->mysqli->prepare($query)){
			
			try{
			
				$stmt -> bind_param('d',$id);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_username,$r_password,$r_type,$r_email);
			
				if($stmt->fetch()){ 					
		 			$this->id = $r_id;
					$this->username = $r_username;
					$this->password = $r_password;
					$this->type= $r_type;
					$this->email = $r_email;	
					$re = true;
				}
			}catch(Exception $e){
				$log->error(mysqli_error($this->mysqli));
			}
			$stmt->close();

		}else{ $log->error(mysqli_error($this->mysqli));  }			
		return $re;		
	}
 	
 	
 	/**
 	 * get userinfo by user name
 	 * return true success
 	 * return false failure
 	 */
 	public function getUserByName($username){
 		$re = false;
 		$query = "select * from user where username = ?";
 		$r_id = null;
 		$r_username = '';
 		$r_password = '';
 		$r_type = null;
 		$r_email = '';
 			 
		if($stmt = $this->mysqli->prepare($query)){
			
			try{
			
				$stmt -> bind_param('s',$username);
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_username,$r_password,$r_type,$r_email);
			
				if($stmt->fetch()){ 					
		 			$this->id = $r_id;
					$this->username = $r_username;
					$this->password = $r_password;
					$this->type= $r_type;
					$this->email = $r_email;	
					$re = true;
				}
			}catch(Exception $e){
				$log->error(mysqli_error($this->mysqli));
			}
			$stmt->close();
		}else{ $log->error(mysqli_error($this->mysqli));  }			
		return $re;		
 	}
 	
 	/**
 	 * the userinfo in
 	 * $this->fields[
 	 *      	'id' => null,
 				'username' => %username%,
 				'password' => %passwd%,
 				'type' => %type%,
 				'email' => %email%
 			]
 	 * return true success
 	 * return false failure
 	 */
 	public function addUser(){
 		$re = false;
 		if($this->username=="") return $re;
 		$query = "insert into user (username,password,type,email) values (?,?,?,?)";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('ssds',$this->username,$this->password,$this->type,$this->email);
 				$stmt -> execute();
 				if($stmt->affected_rows>0){
 					$re = true;
 				}
 			}catch(Exception $e){
 				$log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}else{ $log->error(mysqli_error($this->mysqli));  }	
 		
 		return $re;
 	}
 	
 	/**
 	 * update the userinfo by userid
 	 * the userinfo in
 	 * $this->fields[
 	 *      	'id' => null,
 				'username' => %username%,
 				'password' => %passwd%,
 				'type' => %type%,
 				'email' => %email%
 			]
 	 * return true success
 	 * return false failure
 	 */
 	
 	public function updateUser($id){
 		$re = false;
 		if($this->username=="") return $re;
 		
 		$query = "update user set username = ?, password = ?, type = ?, email = ? where id = ? ";
 		
 		
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('ssdsd',$this->username,$this->password,$this->type,$this->email,$id);
 				$stmt -> execute();
 				if($stmt->affected_rows>0){
 					$re = true;
 				}
 			}catch(Exception $e){
 				$log->error(mysqli_error($this->mysqli));
 			}
 			$stmt->close();
 		}
 		return $re;	
 	}
 	
 	
 	/**
 	 * delete user record by userid
 	 */
 	
 	public static function delUser($id){
 		$re = false;
 		$query = "delete from user where id = ?";
 		if($stmt= $this->mysqli->prepare($query)){
 			try{
 				$stmt -> bind_param('d',$id);
 				$stmt -> execute();
 				if($stmt->affected_rows>0){
 					$re = true;
 				}
 			}catch(Exception $e){
 				$log->error(mysqli_error($this->mysqli));
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
  
  require_once(PHP_BASE_DIR."/db/MySQL.php");
  
  $DB = new MySQL($log);
  $mysqli = $DB->openDB();
  
  if($mysqli != null){
  	$user = new User($mysqli,$log);
  	if($user->getUserByID(1)){
	
		echo "query by id</br>";
		echo $user->username."\n</br>";
		echo $user->id."\n</br>";
		echo $user->password."\n</br>";
		echo $user->type."\n</br>";
		echo $user->email."\n</br>";
	}
	$DB->closeDB();
  }else {
  	echo "conncect database error!";
  }
 
 
?>
