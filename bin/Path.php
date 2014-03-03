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
 
require_once(LOG4PHP_BASE_DIR."/XssRatLogger.php");


 
?>
