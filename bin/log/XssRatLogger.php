<?php
/*
 * Created on 2014-3-2
 * auto init the php4log 
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include('Logger.php');
Logger::configure(dirname(__FILE__).'\logconfig.xml');
$log = Logger::getLogger('XSSRAT'); 
//echo "123123123"; 
?>
