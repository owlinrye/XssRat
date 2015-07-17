<?php
/*
 * Created on 2014-3-3
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 class SystemConfig{
 		
 	private $mysqli;
 	private $log;
 	public  $admin_mail;
 	public  $mail_password;
    public  $language;
 	
 	public function __construct($mysqli,$log){
    	$this->mysqli = $mysqli;
    	$this->log = $log;
    	$this->admin_mail = "";
    	$this->mail_password = "";
    	$this->language = "";
    }
    
    public function getSystemConfig(){
    	
    	
    }
    
    public function getLanguage(){
    	
    	
    }
    
    public function updateSystemConfig(){
    	
    	
    	
    }
 
 }
 
 
?>
