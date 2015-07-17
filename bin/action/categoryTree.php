<?php
/*
 * Created on 2014-4-16
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
  header("Content-Type: application/json; charset=UTF-8");
  error_reporting(E_ALL ^ E_NOTICE);
  require_once("../Path.php");
  require_once(PHP_BASE_DIR."/db/MySQL.php");
  require_once(PHP_BASE_DIR."/entity/Module.php");
  require_once(PHP_BASE_DIR."/entity/ModuleCategory.php");
 

  
 
  $db = new MySQL($log);
  if($mysqli = $db->openDB()){
  	$module = new Module($mysqli,$log);
  	$mCategory = new ModuleCategory($mysqli,$log);
  	
  	$array_module =  array();
  	$array_category = array();
  	
  	$array_module = $module->getModules();
  	$array_category = $mCategory->getCategorys();
  	$end_category = end($array_category);
  	$last_id = $end_category["id"];
  	
  	foreach($array_module as $m){
  		$last_id ++;
  		$category = array(
  			"id" => $last_id,
  			"parent" => $m->category_id,
			"text" => $m->m_name,
			"icon" => "glyphicon glyphicon-leaf",
			"risk" => $m -> risk,
			"m_id" => $m -> m_id
			
  		);
  		array_push($array_category,$category);
  	}
  	echo json_encode($array_category);
  	$db->closeDB();
  }
  
?>
