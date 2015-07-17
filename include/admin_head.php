<?php
/* 
 * Created on 2014��3��8��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
 /**
  * user type 1 is admin 
  */
  
$path = dirname($_SERVER["REQUEST_URI"]); 
session_start();
if(isset($_SESSION['user_info']) && !empty($_SESSION['user_info'])){
 	$user_info = $_SESSION("user_info");
 	$user_info['csrf'] = uniqid();
 	$_SESSION['user_info'] = $user_info;
 	if($user_info['type']!=1){//the user is not admin
		echo "<html><script>alert('你没有访问权限！！');history.back();</script></html>";
		exit;		
	}
 }else{
	header('Location: '.$path.'/login.php');
	exit;
 }

?>




<div class="navbar navbar-fixed-top navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">XssRAT </a>
		</div>
		<div class="collapse navbar-collapse">
          <p class="navbar-text">Mak3 th3 hack m0r3 c00l!</p>			
			 <ul class="nav navbar-nav  navbar-right">
			 <li class="dropdown">
			 	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
      				<span class="glyphicon glyphicon-user"></span> 用户  <span class="caret"></span>
    			</a>
    			<ul class="dropdown-menu">
    				<li><a href="#">管理</a></li>
    				<li><a href="#">注销</a></li>
    				<li><a href="#">关于</a></li>
    			</ul>
			 </li>
			 </ul> 
        </div>
	</div><!-- /.container -->
</div> <!--navbar end-->
