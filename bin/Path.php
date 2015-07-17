<?php
/* 
 * Created on 2014��3��2��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
if(!defined("PHP_BASE_DIR")){
 	define("PHP_BASE_DIR",dirname(__FILE__));
}
 
if(!defined("LOG4PHP_BASE_DIR")){
 	define("LOG4PHP_BASE_DIR",PHP_BASE_DIR."/log");
}

if(!defined("PHP_MODULES_DIR")){
 	//define("PHP_MODULES_DIR",PHP_BASE_DIR."/../modules");
 	define("PHP_MODULES_DIR","saestor://xssrat/modules");
}

if(!defined("SAE_STORAGE_DOMAIN")){
	define("SAE_STORAGE_DOMAIN","xssrat");
}

if(!defined("SAE_MODULES")){
	define("SAE_MODULES","modules");
}

if(!defined("UPLOAD_TMP_DIR")){
 	define("UPLOAD_TMP_DIR",SAE_TMP_PATH."/upload");
}

if(!defined("PHP_MODULES_URL")){
 	define("PHP_MODULES_URL","modules");
}


define(MAIL_ACCOUNT,'xssratd@gmail.com');
define(MAIL_PASS,'0w1InXssRat');

require_once(LOG4PHP_BASE_DIR."/XssRatLogger.php");


 
?>
