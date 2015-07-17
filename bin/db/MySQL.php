<?php
/* 
 * Created on 2014��3��2��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 include("config.php");
 
 
 class MySQL{
 	
 	private $mysqli = null;
 	private $log;
 	public function __construct($log){
 		$this->log = $log;
		$this->mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DBNAME,DB_PORT);
		if(mysqli_connect_errno()){
			$log->error("Database Connect failed: ".$this->mysqli->connect_error);
			$this->mysqli = null;
		}
 	}
 	
 	public  function openDB(){
 		return $this->mysqli;
 	}
 	
 	public  function closeDB(){
 		if($this->mysqli!=null){
 			$this->mysqli->close();
 		}
 	}
	
 }
 
 
 
?>
