<?php include("./include/sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XssRat Module Page</title>
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

function selectAll(){
	if($('#checkall').prop('checked')){
		$('.table').find("[type='checkbox']").each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',true);
		});	
	}else{
		$('.table').find("[type='checkbox']").each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',false);
		});	
	}
}
	
function delModule(){
	var mds = new Array(); 
	$('.table').find("[type='checkbox']").each(function(){
		if($(this).prop("checked")){
			var m_id = $(this).attr("value");
			var author_id = $(this).parent().next().html();
			var md = {m_id:m_id,author_id:author_id};
			mds.push(md);
		}
	});	
	
	if(mds.length>0){
		var del_data = {op:'del',data:mds};
		xssrat.delData(del_data,'./bin/action/module.php',false);
	}
}


$(function(){
	
});

</script>

<!-- script end-->

</head>

<body>
<?php include("./include/head.php");  ?>
<!--

--!>
<!-- main begin -->
<div class="container">

<!--
	<div  class="row jumb">
		<div class="col-md-12">
			<div class = "jumbotron">
				<h2>XssRAT</h2>
				<p>Mak3 th3 hack m0r3 c00l!</p>
			</div>
		</div>		
	</div>
-->
	<div class="row jumb">
	
		<!--the left begin -->
		<?php include("include/menu.php");  ?>
		<!--the left end -->
		
			
<?php 
require_once "bin/Path.php";
require_once PHP_BASE_DIR."/db/MySQL.php";
require_once PHP_BASE_DIR."/entity/Module.php";
require_once PHP_BASE_DIR."/entity/User.php";
require_once(PHP_BASE_DIR."/entity/ModuleCategory.php");
		
$db = new MySQL($log);
$mysqli = $db->openDB();
$modules = array();
if($mysqli!=null){
	$module = new Module($mysqli,$log);
	$user = new User($mysqli,$log);
	$mCategory = new ModuleCategory($mysqli,$log);
	$array_category = $mCategory->getCategorys();
	$modules = $module->getModules();
	$m_num = count($modules);			
} 
?>		
		
		<!--the right begin -->
		<div class="col-md-10 ">
			
			<ol class="breadcrumb">
			  <li><a href="main.php">Home</a></li>
			  <li class="active">Module</li>
			</ol>
		
		
		
			<div class="panel panel-default ">
				<div class="panel-heading">模块列表</div>
					<div class="panel-body">
						<input type="checkbox" id="checkall" onclick="selectAll();" />&nbsp;&nbsp;<panel>全选</panel>
						<div class="pull-right">
							<button type="button" onclick="delModule();" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-remove"></span> 删除
							</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" onclick="window.location.href='moduleItem.php'" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-plus"></span> 新建
							</button>
						</div>
				</div>
				
				<table class="table table-hover small">
					<thead>
					<tr>
						<th>#</th>
						<th>名称</th>
						<th>作者</th>
						<th>类别</th>
						<th>介绍</th>
						<th>察觉风险</th>
					</tr>
					</thead>
					<tbody>
					
					<?php 				
					
					if($m_num>0){  
						foreach($modules as $md){	
					?>
					<tr id="<?php echo $md->m_id ?>">
						<td><input class="checkbox" <?php echo $user_info[id]===$md->author_id?'':'disabled' ?> type="checkbox" value="<?php echo $md->m_id ?>" ></td>
						<td class="hidden" for="author_id" ><?php echo $md->author_id ?></td>
						<td for="m_name" ><a href="moduleItem.php?m_id=<?php echo  $md->m_id ?>"><?php echo $md->m_name ?></a></td>
						<td for="author" ><?php echo $user->getUserByID($md->author_id)?$user->username:'Anonymous'; ?></td>
						<td for="category" ><?php  foreach($array_category as $ca){ if($ca['id']===(int)$md->category_id) echo $ca['text']; } ?></td>
						<td for="m_info" ><?php echo $md->m_info ?></td>
						<td for="risk" 	 ><?php
							$rs= "";
							switch($md->risk){
								case 1: $rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
								case 2: $rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
								case 3: $rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_3 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
								case 4: $rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_3 glyphicon glyphicon-fire'></span> <span class='risk_4 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
								case 5: $rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_3 glyphicon glyphicon-fire'></span> <span class='risk_4 glyphicon glyphicon-fire'></span> <span class='risk_5 glyphicon glyphicon-fire'></span>";break;
							}
						 echo $rs ?></td>
					</tr>
					<?php }}?>
					</tbody>
				</table>
					<div class="panel-footer">
					<?php if($m_num>0){
						echo "<p>总计：".$m_num."</p>";
						} else {	
					 ?>	  
						<p> <span class="glyphicon glyphicon-question-sign"></span>未查询到模块！</p>
					<?php }?>
					</div>
			</div>
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