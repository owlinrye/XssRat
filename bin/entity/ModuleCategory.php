<?php
/*
 * Created on 2014-4-16
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
  class ModuleCategory{
 	
  	private $mysqli;
 	private $fields;
 	private $log;	
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this -> fields = array(
    		'id' => null,
    		'parent' => '',
    		'text' => '',
    		'discription' => '',
    		'icon' => '',
    		'other' => ''
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
    
    
    public function getCategorys(){
		$res =  array();
		$query = "select id,parent,text,icon from module_category";
		
		$r_id = null;
		$r_parent = null;
		$r_text = "";
		$r_icon = "";
		
		if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_parent,$r_text,$r_icon);
				while($stmt->fetch()){
					$category = array(
						"id" => $r_id,
						"parent" => $r_parent,
						"text" => $r_text,
						"icon" => $r_icon
					);
					array_push($res,$category);
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
    
     public function getFullCategorys(){
		$res =  array();
		$query = "select id,parent,text,discription,icon,other from module_category";
		
		$r_id = null;
		$r_parent = "";
		$r_text = "";
		$r_icon = "";
		$r_discription = "";
		$r_other = "";
		
		if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> execute();
				$stmt -> bind_result($r_id,$r_parent,$r_text,$r_icon);
				while($stmt->fetch()){
					$category = array(
						"id" => $r_id,
						"parent" => $r_parent,
						"text" => $r_text,
						"discription" => $r_discription,
						"icon" => $r_icon,
						"other" => $r_other
					);
					array_push($res,$category);
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
    
    public function insertCategory(){
    	$re = false;
    	$query = "insert into module_category (parent,text,discription,icon,other) values (?,?,?,?,?)";
    	if($stmt = $this->mysqli->prepare($query)){
			try{
				$stmt -> bind_param('sssss',$this->parent,$this->text,$this->discription,$this->icon,$this->other);
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
    
    public function updateCategory(){
     	$re = false;
    	$query = "update module_category set parent = ?, text = ? , discription = ? , icon = ? , other = ?  where id = ? ";
    	if($stmt = $this->mysqli->prepare($query)){
    		try{
    			$stmt -> bind_param('sssssd',$this->parent,$this->text,$this->discription,$this->icon,$this->other,$this->id);
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

