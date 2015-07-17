<?php
/* 
 * Created on 2014��3��8��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */

function startSession($time = 3600, $ses = 'xssrat_session') {
    session_set_cookie_params($time,"/",null,false,true);
    session_name($ses);
    session_start();

    // Reset the expiration time upon page load
    if (isset($_COOKIE[$ses]))
      setcookie($ses, $_COOKIE[$ses], time() + $time, "/");
}
startSession();

if(isset($_SESSION['user_info']) && !empty($_SESSION['user_info'])) {
 	$user_info = $_SESSION['user_info'];
 	//update the csrf uid
 	//$user_info['csrf'] = uniqid();
 	//$_SESSION['user_info'] = $user_info;
}else{
 	$path = dirname($_SERVER["REQUEST_URI"]); 
	header('Location: login.php');
	exit;
 }

 
?>