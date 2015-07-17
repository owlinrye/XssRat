<?php
/*
 * Created on 2014-5-5
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
  require_once("bin/sess.php");
  require_once("bin/Path.php");
  require_once(PHP_BASE_DIR."/util/util.php");
  
  if(isset($_SESSION['user_info']) && !empty($_SESSION['user_info'])) {
	session_unset();
 	session_destroy();
  }
  
  if (isset($_SESSION)) {
    unset($_SESSION);	//注销$_SESSION
  }
  session_regenerate_id();

  $path = dirname($_SERVER["REQUEST_URI"]); 
  header('Location: login.php');
  exit;
  
?>
