
<div class="navbar navbar-fixed-top navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">XssRAT </a>
		</div>
		<div class="collapse navbar-collapse">
          <p class="navbar-text">Mak3 hack m0r3 c00l!</p>			
			 <ul class="nav navbar-nav  navbar-right">
			 <li class="dropdown">
			 	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
      				<span class="glyphicon glyphicon-user"></span> <?php echo $user_info["username"] ?>  <span class="caret"></span>
    			</a>
    			<ul class="dropdown-menu">
    				<li><a href="logout.php">注销</a></li>
    				<li><a href="#">关于</a></li>
    			</ul>
			 </li>
			 </ul> 
        </div>
	</div><!-- /.container -->
</div> <!--navbar end-->
