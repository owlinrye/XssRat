<?php
/* 
 * Created on 2014��5��3��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 class SaeLogger{
 	
 	private $p_name = "";
 	
 	public function __construct($name){
 		$this ->p_name = $name;
 	}
 	
 	public static function getLogger($name){
 		return new SaeLogger($name);
 	}
 	
 	public function trace($message){
 		$level = "TRACE";
 		$log_msg = "[".$this ->p_name."]	".$level."	".$message;
 		sae_set_display_errors(false);
 		sae_debug($log_msg);
 		sae_set_display_errors(true);
 			
 	}
 	
 	public function debug($message){
 		$level = "DEBUG";
 		$log_msg = "[".$this ->p_name."]	".$level."	".$message;
 		sae_set_display_errors(false);
 		sae_debug($log_msg);
 		sae_set_display_errors(true);
 	}
 	
 	public function info($message){
 		$level = "INFO";
 		$log_msg = "[".$this ->p_name."]	".$level."	".$message;
 		sae_set_display_errors(false);
 		sae_debug($log_msg);
 		sae_set_display_errors(true);
 	}
 	
 	public function warn($message){
 		$level = "WARN";
 		$log_msg = "[".$this ->p_name."]	".$level."	".$message;
 		sae_set_display_errors(false);
 		sae_debug($log_msg);
 		sae_set_display_errors(true);
 	}
 	
 	public function error($message){
 		$level = "ERROR";
 		$log_msg = "[".$this ->p_name."]	".$level."	".$message;
 		sae_set_display_errors(false);
 		sae_debug($log_msg);
 		sae_set_display_errors(true);
 	}
 	
 	public function fatal($message){
 		$level = "FATAL";
 		$log_msg = "[".$this ->p_name."]	".$level."	".$message;
 		sae_set_display_errors(false);
 		sae_debug($log_msg);
 		sae_set_display_errors(true);
 	}
 	
 }
 
 
?>
