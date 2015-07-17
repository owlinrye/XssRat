<?php
/* 
 * Created on 2014��3��4��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
// require_once("Reflect.php");
 
 define('VALIDATE_USERNAME','/^[a-zA-Z_][a-zA-Z0-9_]{2,16}$/');
 define('VALIDATE_PASSWORD','/.{6,24}/');
 define('VALIDATE_CAPTCHA','/^[a-zA-Z0-9]{4}$/');
 define('VALIDATE_EMAIL',' /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/');
 define('VALIDATE_MODULE_NAME','/.{1,32}/');
 define('VALIDATE_MODULE_INFO','/.{1,256}/');
 
 class Validator{

 	 	
 	/**
 	 * validate the username
 	 */
	static public function validateUserName($username){
		return Validator::regMatch($username,VALIDATE_USERNAME);
	}
	/**
	 * validate the password
	 */
	static public function validatePassword($password){
		return Validator::regMatch($password,VALIDATE_PASSWORD);
	} 	
	
	/**
	 * validate the captcha
	 */
	static public function validateCaptcha($captcha){
		return Validator::regMatch($captcha,VALIDATE_CAPTCHA);
	}
	
	/**
	 * validate the email
	 */
	static public function validateEmail($email){
		return Validator::regMatch($email,VALIDATE_EMAIL);
	}
	
	/**
	 * validate the module name
	 */
	
	static public function validateMName($m_name){
		return Validator::regMatch($m_name,VALIDATE_MODULE_NAME);
	}
	
	/**
	 * validate the module info
	 */	
	static public function validateMInfo($m_info){
		return Validator::regMatch($m_info,VALIDATE_MODULE_INFO);
	} 	  	  	 	
 	
 	static function regMatch($str,$reg){
 		if(preg_match($reg,$str)) return true;
 		else return false;
 	}
 }
 
 
 
 
?>
