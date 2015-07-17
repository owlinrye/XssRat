<?php
/* 
 * Created on 2014��3��8��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */

?>


<div class="col-md-2">
	<div class="list-group ">
		<a href="main.php" id="project" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp; 项目</a>
		<a href="module.php" id="module" class="list-group-item"><span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp; 模块</a>
		<a href="user.php" id="user" class="list-group-item"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; 账号</a>
		<?php if($user_info['type']==1)  {?>
		<a href="users.php" id="system" class="list-group-item"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp; 管理</a>
		<?php } ?>
	</div>
</div>