<?php
/* 
 * Created on 2014��3��26��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
function get_page_dir(){
	$dir = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
	$dir .= $_SERVER['HTTP_HOST'];
	$dir .= isset($_SERVER['REQUEST_URI']) ? dirname($_SERVER['REQUEST_URI']) : dirname(urlencode($_SERVER['PHP_SELF']));
	return $dir;
}

function get_page_url(){
	$url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'];
	$url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']);
	return $url;
}

function get_protocol(){
	return (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https' : 'http';
}

function get_port(){
	$port =  isset($_SERVER['SERVER_PORT'])? (int)$_SERVER['SERVER_PORT']:80;
	return $port;
}

function get_host(){
	$host =  explode(":",$_SERVER['HTTP_HOST']);
	return $host[0];
}

function get_page_path(){
	return  dirname($_SERVER['SCRIPT_NAME']);
}
 
?>
