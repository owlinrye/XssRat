<?php include("./include/sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>XssRat Main Page</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/xssrat.js"></script>
<script language="javascript" src="js/json2.js"></script>
<script language="javascript" src="js/module.js"></script>
<!-- script begin -->
<script type="text/javascript">

function selectAll(){
	if($('#checkall').prop('checked')){
		$('.table').find("[type='checkbox']").each(function(){
				$(this).prop('checked',true);
		});	
	}else{
		$('.table').find("[type='checkbox']").each(function(){
				$(this).prop('checked',false);
		});	
	}
}

	
function delProject(){
	var projs = new Array(); 
	$('.table').find("[type='checkbox']").each(function(){
		
		if($(this).prop("checked")){
			var id = $(this).attr("value");
			var u_id = $(this).parent().next().html();
			var del_porj = {id:id,u_id:u_id};
			projs.push(del_porj);
		}
	});	
	
	if(projs.length>0){
		var del_data = {op:'del',data:projs};
		PostData(del_data);
	}
}

function doProjectModal(op){
	
	if(op==='edit'){
		
		var selected_id = -1;
		$('.table').find("[type='checkbox']").each(function(){
			if($(this).prop("checked")){
				selected_id  = $(this).prop("value");
			}
		});
		if(selected_id>0){
			$("input[name='op']").attr('value','edit');
			$("input[name='id']").attr('value',selected_id);
			for(var key in projects){
				if(projects[key].id == selected_id){
					$("input[name='name']").attr('value',projects[key].name);
					$("input[name='discribe']").attr('value',projects[key].discribe);
					$("input[name='name']").attr('value',projects[key].name);
					$("select[name='m_id']").val(projects[key].m_id);
					for(var m in core_modules){
						if(core_modules[m].m_id===projects[key].m_id){
							$('#module_describe').html(core_modules[m].m_info);
						}
					}
					xssrat.module.loadCoreConfig(selected_id);
				}
			}
			$('#addProject').modal();
		}
		
	}
	
	if(op==='add'){
		$('#modal_title').html('新建项目');
		$('#f_module').val(1);
		var index = $('#f_module').get(0).selectedIndex;
		$('#module_describe').html(core_modules[index].m_info);
		$('#addProject').find('input').each(function(){
			if($(this).prop('type')!=='hidden')  $(this).attr('value','');
		});
		$("input[name='op']").attr('value','add');
		xssrat.module.loadCoreScript(core_modules[index].m_path);
		$('#addProject').modal();
	} 
}
function createProject(){
	var data = $('#project_form').serializeObject();
	data.config = $('#core_config').serializeObject();
	PostData(data);
}
function PostData(p_data){
	$.ajax({
			url:"./bin/action/project.php",
			type:"POST",
			data:JSON.stringify(p_data),
			dataType:'json'
		}).done(function(data){
			if(data.result==false){
				if(p_data.op=='del'){
					$('#alert_modal').find('#error_message').html(data.reason).show();
					$('#alert_modal').modal();
				}else{
					$('#addProject').find('#error_message').html(data.reason).show();
					setTimeout("$('#addProject').find('#error_message').fadeOut()", 4000);					
				}
			}else{
				if(p_data.op=='del'){
					$('#alert_modal').find('#success_message').html(data.reason).show();
					$('#alert_modal').modal();
				}else{
					$('#addProject').find('#success_message').html(data.reason).show();	
				}
				setTimeout("window.location.reload()", 1000);
			}	
		});	
}



</script>

<!-- script end-->

</head>

<body>
<?php include("./include/head.php");  ?>
<!--

--!>
<!-- main begin -->
<div class="container">

	<div class="row jumb">
	
		<!--the left begin -->
		<?php include("include/menu.php");  ?>
		<!--the left end -->
		
		
<?php 		
require_once "bin/Path.php";
require_once PHP_BASE_DIR."/db/MySQL.php";
require_once PHP_BASE_DIR."/entity/Project.php";
require_once PHP_BASE_DIR."/entity/Module.php";


function getModuleNameByMID($mid,$mdArray){
	
	foreach($mdArray as $md){
		if($md->m_id === $mid)
		return $md->m_name;
	} 
	return "Not Found";
}

		
$db = new MySQL($log);
$mysqli = $db->openDB();
$modules = array();
$projects = array();
if($mysqli!=null){
	$module = new Module($mysqli,$log);
	$project = new Project($mysqli,$log);
	$projects = $project->getProjectsByUid($user_info["id"]);
	//获取核心模块
	$modules= $module->getCoreModules();
	$db->closeDB();
}
$p_num = count($projects);
?>
<script>
var core_modules = <?php
    $mds =  array();
	foreach($modules as $md){
		array_push($mds,$md->getFields());
	}
	echo json_encode($mds);
?>;

var projects = <?php
    $ps =  array();
	foreach($projects as $p){
		array_push($ps,$p->getFields());
	}
	echo json_encode($ps);
?>;
<?php 
/*
	foreach($modules as $md){
		$config	= json_decode($md->default_config)?$md->default_config:"null";
		$item = "{\"m_id\":\"".$md->m_id."\",\"m_name\":\"".$md->m_name."\",\"m_path\":\""+$md->m_path+"\",\"config\":".$config."}";	
		echo $op;
	}
*/	
?>
$(function(){
	$('#f_module').on("change",function(){
			var index = $('#f_module').get(0).selectedIndex;
			$('#module_describe').html(core_modules[index].m_info);
			xssrat.module.loadCoreScript(core_modules[index].m_path);
	});
});

</script>
		
		
		<!--the right begin -->
		<div class="col-md-10 ">
		
			<ol class="breadcrumb">
			  <li class="active" >Home</li>
			</ol>
		
			<div class="panel panel-default ">
				<div class="panel-heading">项目列表</div>
					<div class="panel-body">
						<input type="checkbox" id="checkall" onclick="selectAll();" />&nbsp;&nbsp;<panel>全选</panel>
						<div class="pull-right">
							<button type="button" class="btn btn-info btn-sm" onclick="doProjectModal('edit')" >
							 <span class="glyphicon glyphicon-pencil"></span> 编辑
							</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" onclick="delProject();" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-remove"></span> 删除
							</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button" onclick="doProjectModal('add')" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-plus"></span> 新建
							</button>
						</div>
				</div>
				
				<table class="table small">
					<thead>
					<tr>
						<th>#</th>
						<th>时间</th>
						<th>名称</th>
						<th>描述</th>
						<th>攻击模块</th>
						<th>URL</th>
					</tr>
					</thead>
					<tbody>
					
					<?php if($p_num>0){  
						foreach($projects as $proj){	
					?>
					<tr id="<?php echo $proj->id ?>">
						<td><input class="checkbox"   type="checkbox" value="<?php echo $proj->id ?>" ></td>
						<td class="hidden" for="u_id" ><?php echo $proj->u_id ?></td>
						<td class="hidden" for="m_id" ><?php echo $proj->m_id ?></td>
						<td for="timestamp" ><?php echo $proj->timestamp ?></td>
						<td for="name" ><a href="project.php?p_id=<?php echo $proj->id ?>" ><?php echo $proj->name ?></a></td>
						<td for="discribe" ><?php echo $proj->discribe ?></td>
						<td for="m_name" ><?php echo getModuleNameByMID($proj->m_id,$modules); ?></td>
						<td for="exp_url" ><?php echo $proj->exp_url ?></td>
					</tr>
					<?php } }?>
					</tbody>
				</table>
					<div class="panel-footer">
					<?php if($p_num>0){
						echo "<p>总计：".$p_num."</p>";
						}else {	
					 ?>	  
						<p> <span class="glyphicon glyphicon-question-sign"></span> 未查询到项目，请新建！</p>
					<?php }?>
					</div>
			</div>
		</div>
		<!--the right end -->
			
	</div>
</div>
<!-- main end -->

<?php include "include/footer.php"; ?>



<!-- Modal -->
<!-- edit/new project Modal -->
<div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="新建项目" aria-hidden="true" >
  <div class="modal-dialog modal_md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modal_title">Modal title</h4>
      </div>
      <div class="modal-body">
    
        	<form method="post" id="project_form"  role="form" > 
			
			<input id="f_id" name="id" value=""  type="hidden"  />
			<input id="f_op" name="op" value=""  type="hidden"  />
			<input id="f_u_id" name="u_id" value="<?php echo $user_info["id"] ?>"  type="hidden"  />
			
			<div class="form_field">
			<label class="control-label">名称</label>
			<input class="form-control" id="f_name"  placeholder="项目名称"  tabindex="1" type="text"  name="name" value=""  required autofocus />
			</div>
			<div class="form_field">
			<label class="control-label" >描述</label>
			<input class="form-control" id="f_discribe"  placeholder="项目描述"  tabindex="2" type="text"  name="discribe" value=""  required  />
			</div>
			
			<div class="form_filed">
			<label class="control-label">核心模块</label>
				<select class="form-control" id="f_module" placeholder="攻击模块" tabindex="3" name="m_id" value="" >
					<?php
						foreach($modules as $md){
							$op = "<option value='".$md->m_id."'>".$md->m_name."</option>";
							echo $op;
						}
					 ?>
				</select>
                <p class="small text-info" id="module_describe"></p>
			</div>			
			</form>
			 <form id="core_config">
			</form>  
            <br/>     	
			<div class="message_box">
			<div id="error_message" class="alert alert-danger text-danger "></div>
			<div id="success_message" class="alert  alert-success"></div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" onclick="createProject()" class="btn btn-primary">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Error Msg Modal -->
<div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="消息" aria-hidden="true">
	<div class="modal-dialog modal_small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modal_msg">消息</h4>
      </div>
      <div class="modal-body">
        <div id="error_message"  class="alert  alert-danger"></div>
        <div id="success_message"  class="alert alert-success"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!--modal-->


</body>
</html>