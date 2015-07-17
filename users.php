<?php include("./include/admin_sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XssRat User Manage Page</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/xssrat.js"></script>
<script language="javascript" src="js/json2.js"></script>
<!-- script begin -->
<script type="text/javascript">

function selectAllUser(){
	if($('#checkall_user').prop('checked')){
		$('#user_table').find("[type='checkbox']").each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',true);
		});	
	}else{
		$('#user_table').find("[type='checkbox']").each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',false);
		});	
	}
}

function selectAllInvite(){
		if($('#checkall_invite').prop('checked')){
		$('#invite_table').find("[type='checkbox']").each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',true);
		});	
	}else{
		$('#invite_table').find("[type='checkbox']").each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',false);
		});	
	}
}
	
function delUsers(){
	var ids = new Array(); 
	$('#user_table').find("[type='checkbox']").each(function(){
		if($(this).prop("checked")){
			var u_id = $(this).attr("value");
			ids.push(u_id);
		}
	});	
	if(ids.length>0){
		var del_data = {"action":"del","ids":ids};
		xssrat.sendAndReload(del_data,'./bin/action/user.php',false,'user_mgr');
	}
}

function delInvs(){
	var ids = new Array(); 
	$('#invite_table').find("[type='checkbox']").each(function(){
		if($(this).prop("checked")){
			var i_id = $(this).attr("value");
			ids.push(i_id);
		}
	});	
	if(ids.length>0){
		var del_data = {"action":"del","ids":ids};
		xssrat.sendAndReload(del_data,'./bin/action/invitation.php',false,'user_invite');
	}
}

function newInvite(){
	var new_data = {"action":"new"};
	xssrat.sendAndReload(new_data,'./bin/action/invitation.php',false,'user_invite');
}

function lockUser(id){
   var data = {"action":"lock","id":id};
 	xssrat.sendAndReload(data,'./bin/action/user.php',false,'user_mgr');
}

function unlockUser(id){
   var data = {"action":"unlock","id":id};
 	xssrat.sendAndReload(data,'./bin/action/user.php',false,'user_mgr');
}


$(function(){
	var f = location.href.split("#")[1];
	if(f=="user_invite")  $('#users_tab a[href="#user_invite"]').tab('show');
	if(f=="user_mgr")  $('#users_tab a[href="#user_mgr"]').tab('show');
});

</script>

<!-- script end-->

</head>

<body>
<?php include("./include/head.php");  ?>
<!--

--!>
<!-- main begin -->
<div class="container" >


	<div class="row jumb">
	
		<!--the left begin -->
		<?php include("include/menu.php");  ?>
		<!--the left end -->
		
			
<?php 
require_once "bin/Path.php";
require_once PHP_BASE_DIR."/db/MySQL.php";
require_once PHP_BASE_DIR."/entity/User.php";
require_once PHP_BASE_DIR."/entity/Invitation.php";
		
$db = new MySQL($log);
$mysqli = $db->openDB();
if($mysqli!=null){
	
	$user = new User($mysqli,$log);
	$invitation = new Invitation($mysqli,$log);
	$users = $user->getUsers();
	$invs = $invitation->getInvitations();
	
	$u_num = count($users);	
	$i_num = count($invs);			
} 
?>		
		
		<!--the right begin -->
		<div class="col-md-10 ">
			
			<ol class="breadcrumb">
			  <li><a href="main.php">Home</a></li>
			  <li class="active">Manage</li>
			</ol>
		
		
        <ul id="users_tab" class="nav nav-tabs">
          <li class="active"><a href="#user_mgr" data-toggle="tab">用户管理</a></li>
          <li><a href="#user_invite" data-toggle="tab">邀请码</a></li>
        </ul>
        
        <div class="space15"></div>
			
        <div class="tab-content"><!-- tab content  begin -->    
			<div id="user_mgr" class="tab-pane fade in active "><!-- user manage tab pane -->
					<div class="user_box">
						<input type="checkbox" id="checkall_user" onclick="selectAllUser();" />&nbsp;&nbsp;<panel>全选</panel>
						<div class="pull-right">
							<button type="button" onclick="delUsers();" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-remove"></span> 删除
							</button>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
					
				 <div class="space15"></div>
				<table id="user_table" class="table table-hover small">
					<thead>
					<tr>
						<th>#</th>
						<th>用户名</th>
						<th>类型</th>
						<th>邮箱</th>
						<th>发送邮件</th>
						<th>状态</th>
					</tr>
					</thead>
					<tbody>
					
					<?php 				
					
					if($u_num>0){  
						foreach($users as $u){	
					?>
					<tr id="<?php echo $u['id'] ?>">
						<td><input class="checkbox" <?php if($user_info[id]==$u['id']) echo 'disabled';  ?>  type="checkbox" value="<?php echo  $u['id'] ?>" ></td>
						<td for="username" ><?php echo htmlspecialchars($u['username'],ENT_QUOTES); ?></td>
						<td for="type" ><?php echo $u['type']==1? '管理员':'用户';  ?></td>
						<td for="email" ><?php echo htmlspecialchars($u['email'],ENT_QUOTES);  ?></td>
						<td for="b_send" ><?php echo $u['b_send']==1?'<font color="#39C">启用</font>':'<font color="#D60544">禁用</font>' ?></td>
						<td for="status" 	 ><?php 
							switch($u['status']){
								case 1: echo '<button type="button" onclick="lockUser('.$u['id'].');" class="btn btn-warning btn-sm">
							<span class="glyphicon glyphicon-pause"></span> 锁定
							</button';break;
								case 0: echo '<button type="button" onclick="unlockUser('.$u['id'].');" class="btn btn-info btn-sm">
										<span class="glyphicon glyphicon-play"></span> 解锁
											</button>';break;
								case 2: echo '<font color="#D60544">未激活</font>';break;
								case 3: echo '<font color="#D60544">未激活</font>';break;
						} ?></td>
					</tr>
					<?php }}?>
					</tbody>
				</table>
					
					<?php if($u_num>0){
						echo "<p>总计：".$u_num."</p>";
						} else {	
					 ?>	  
						<p> <span class="glyphicon glyphicon-question-sign"></span>未查询到用户！</p>
					<?php }?>
                    
                    </div>
			</div><!-- user manage tab pane -->
            
            <div class="tab-pane fade" id="user_invite"><!-- user invite tab pane -->
            	<div class="user_box">
						<input type="checkbox" id="checkall_invite" onclick="selectAllInvite();" />&nbsp;&nbsp;<panel>全选</panel>
						<div class="pull-right">
							<button type="button" onclick="delInvs();" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-remove"></span> 删除
							</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" onclick="newInvite();" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-plus"></span> 新增
							</button>
						</div>
					
				 <div class="space15"></div>
				<table id="invite_table" class="table table-hover small">
					<thead>
					<tr>
						<th>#</th>
						<th>创建时间</th>
						<th>邀请者</th>
						<th>邀请码/验证码</th>
						<th>状态</th>
						
					</tr>
					</thead>
					<tbody>
					
					<?php 				
					
					if($i_num>0){  
						foreach($invs as $in){	
					?>
					<tr id="<?php echo $in['id']; ?>">
						<td><input class="checkbox"  type="checkbox" value="<?php echo  $in['id']; ?>" ></td>
						<td for="uptime" ><?php echo $in['uptime'];  ?></td>
                        <td for="username" ><?php echo htmlspecialchars($in['username'],ENT_QUOTES); ?></td>
						<td for="key" ><?php echo $in['key'];  ?></td>
						<td for="status" 	 ><?php 
							switch($in['status']){
								case 1: echo '<font color="#0099CC">已激活</font>';break;
								case 0: echo '<font color="#009966">未使用</font>';break;
								case 2: echo '<font color="#D60544">未生成邮件验证码</font>';break;
								case 3: echo '<font color="#FC9914">已生成邮件验证码</font>';break;
						} ?></td>
					</tr>
					<?php }}?>
					</tbody>
				</table>
					
					<?php if($i_num>0){
						echo "<p>总计：".$i_num."</p>";
						} else {	
					 ?>	  
						<p> <span  class="glyphicon glyphicon-question-sign"></span>未查询到邀请码！</p>
					<?php }?>
                    
                    </div>
            
            </div><!-- user invite tab pane -->	
            		
           
           </div><!-- tab content  end -->
		</div>
		<!--the right end -->
<?php  if($mysqli!=null)  $db->closeDB();  ?>

			
	</div>
</div>
<!-- main end -->

<?php include "include/footer.php"; ?>



<!-- Modal -->

<!-- Error Msg Modal -->
<div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="消息" aria-hidden="true">
	<div class="modal-dialog modal_small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modal_msg">消息</h4>
      </div>
      <div class="modal-body">
        <div id="alert_msg"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!--modal-->


</body>
</html>