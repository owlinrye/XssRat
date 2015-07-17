<?php include("./include/sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XssRat-客户端攻击</title>
<link rel="shortcut icon" href="images/xssrat.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css"  href="css/main.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css"  href="css/jstree/default/style.min.css" />
<script language="javascript" src="js/jquery-1.11.0.min.js"></script>
<script language="javascript" src="js/jquery-migrate-1.0.0.js"></script>
<script language="javascript" src="js/bootstrap.min.js"></script>
<script language="javascript" src="js/xssrat.js"></script>
<script language="javascript" src="js/module.js"></script>
<script language="javascript" src="js/json2.js"></script>
<script language="javascript" src="js/jstree.min.js"></script>
<script>
function loadModule(m_id){
	var pd = "{\"op\":\"load\",\"m_id\":"+m_id+"}";
	$.ajax({
		url:"bin/action/attack.php",
		type:"POST",
		data:pd,
		dataType:'json'
	}).done(function(r_data){
		if(r_data.result==true){
			var module = r_data.reason;
			var rs;
			switch(module.risk){
				case 1: rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
				case 2: rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
				case 3: rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_3 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
				case 4: rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_3 glyphicon glyphicon-fire'></span> <span class='risk_4 glyphicon glyphicon-fire'></span> <span class='risk_0 glyphicon glyphicon-fire'></span>";break;
				case 5: rs = "<span class='risk_1 glyphicon glyphicon-fire'></span> <span class='risk_2 glyphicon glyphicon-fire'></span> <span class='risk_3 glyphicon glyphicon-fire'></span> <span class='risk_4 glyphicon glyphicon-fire'></span> <span class='risk_5 glyphicon glyphicon-fire'></span>";break;
			}
			$("#m_name").html(module.m_name);
			$("#author").html(module.author);
			$("#risk").html(rs);
			$("#m_info").html(module.m_info);
			xssrat.module.m_id = m_id;
			xssrat.module.loadScript(module.m_path,module.m_name);
		}else {
			xssrat.alert(r_data.reason,"danger");
		}
	});
}


$(function() {
  	
   $('#category_box').jstree({ 'core' : {
	    'data' : {
			'url' : function (){
					return 'bin/action/categoryTree.php';
				} 
		}/**
		'data':[{"id":1,"parent":"#","text":"Core","icon":"glyphicon glyphicon-tower","disabled":true},{"id":8,"parent":"#","text":"Browser","icon":"glyphicon glyphicon-folder-close"},{"id":9,"parent":"#","text":"Host","icon":"glyphicon glyphicon-folder-close"},{"id":10,"parent":"#","text":"Social","icon":"glyphicon glyphicon-folder-close"},{"id":11,"parent":"#","text":"Exploit","icon":"glyphicon glyphicon-folder-close"},{"id":12,"parent":"1","text":"Core XSS","icon":"glyphicon glyphicon-leaf","risk":1,"m_id":1},{"id":13,"parent":"1","text":"Core CSRF","icon":"glyphicon glyphicon-leaf","risk":1,"m_id":2}]*/
	} });	
   
  //listen category event
   $('#category_box').on('changed.jstree', function (e, data) {
    //console.log(data.selected[0]);
	//console.log(data.node.original.m_id);
	var m_id = data.node.original.m_id;
	var parent = data.node.original.parent;
	
	if(parent==1){
		xssrat.alert("核心模块只能在新建工程时使用，请使用其它类型的模块！","danger");
	}
	else if(typeof(m_id)!=="undefined"){
		loadModule(m_id);
	}
	
  });
  
	//隐藏所有data box
	$(".data-box").removeClass("show").addClass("hidden");
	$(".collapse-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
	$(".collapse-control").bind("click",function(){
		var id = $(this).attr("for");
		if($("#pmd_"+id).css("display")=="none"){
			$("#pmd_"+id).removeClass("hidden").addClass("show");
			$("span[for='"+id+"']").removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
		}else {
			$("#pmd_"+id).removeClass("show").addClass("hidden");
			$("span[for='"+id+"']").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
		}
	});
  
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

$pmd_id = $_GET['pmd_id'];
$pmd_id = $pmd_id?(int) htmlspecialchars($pmd_id,ENT_QUOTES,'UTF-8'):0;

$db = new MySQL($log);
if($pmd_id>0&&$mysqli = $db->openDB()){
	$pmdData = new ProjectModuleData($mysqli,$log);
	if(!$pmdData->getPmdByID($pmd_id)){
		echo "<script>alert('未找到记录!');history.back();</script>"; 
	}
	$u_id = $pmdData->getUidOfPmdId($pmd_id);
	if((int)$user_info['id']!==(int)$u_id){
		echo "<script>alert('您无权操作!');history.back();</script>"; 
	}
}else{
	echo "<script>alert('数据错误!');history.back();</script>";
}
?>

<!-- main begin -->
<div class="container">
	<!--the row jumb begin-->
	<div class="row jumb">
		<!-- the breadcrumb begin -->
		<div class="col-md-12 col-lg-12 col-sm-12">	
			<ol class="breadcrumb">
			  <li><a href="main.php">Home</a></li>
			  <li><a href="javascript:history.back()">Project</a></li>
			  <li class="active" >Attack</li>
			</ol>
		</div>
		<!-- the breadcrub end -->
	
		<!--the left begin-->
		<div class="col-md-3">
			<div class="panel panel-default ">
				<div class="panel-heading">攻击模块</div>
					<div class="panel-body category_box">
						<div id="category_box">
						</div>
					</div>
			</div>
		</div>
		<!--the left end-->
		
		<!--the right begin -->
		<div class="col-md-9">
			<!-- client info begin-->
			<div class="data-container-2 small">
				<div class="data-info">
					<div class="row">
						<div class="col-md-9 collapse-control" for="<?php echo $pmdData->pmd_id ?>"  >
							<p><strong class="text-info">IP</strong>&nbsp;&nbsp;<?php echo $pmdData->clientIP ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong class="text-info">时间</strong>&nbsp;&nbsp;<?php echo $pmdData->time ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;<strong class="text-info">状态</strong>&nbsp;&nbsp;<span id="client_status" ></span>&nbsp;&nbsp;
                            </p>
							<p><strong class="text-info">UserAgent</strong>&nbsp;&nbsp;<?php echo $pmdData->userAgent ?></p>
							<p><strong class="text-info">Refer</strong>&nbsp;&nbsp;<?php echo $pmdData->Referer ?></p>
						</div>
						
						<div class="col-md-3">
							<div class="left-check pull-right  text-center">
							<span class="glyphicon glyphicon-chevron-right collapse-down collapse-control" for="<?php echo $pmdData->pmd_id ?>" ></span>
							</div>
						</div>
					</div>
				</div>
				<script langage="javascript">
				$(function(){
					var jsonObj = <?php 
						$dt = json_decode($pmdData->Data);
						if($dt){
							echo json_encode($dt);
						}else echo "'".$pmdData->Data."'";
					  ?>;
					$("#pmd_<?php echo $pmdData->pmd_id ?>").html(xssrat.json2li(jsonObj));
				});
				</script>
				<div class="data-box" style="display:none;" id="pmd_<?php echo $pmdData->pmd_id ?>" >
				</div>
			</div>
			
			
			<!-- client info end-->
			<!-- the panel begin -->
			<div class="panel panel-default ">
				<div class="panel-heading">模块信息</div>
				<!-- the panel body begin-->
				<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
	      					<p>
								<strong class="text-info">名称</strong>&nbsp;&nbsp;<span id="m_name"></span>&nbsp;&nbsp;&nbsp;
								<strong class="text-info">作者</strong>&nbsp;&nbsp;<span id="author"></span>&nbsp;&nbsp;&nbsp;
								<strong class="text-info">察觉风险</strong>&nbsp;&nbsp;<span id="risk"></span><br/>
	      					   	<strong class="text-info">描述</strong>&nbsp;&nbsp;<span id="m_info"></span>&nbsp;&nbsp;&nbsp;
	      					</p>
							<p><strong class="text-info">配置</strong></p>
							<div class="line-sm"></div>
							<!-- config  -->
                            <form id="config">

                            </form>
							<!-- config  end -->
	    				</div>
    				
	    				<div class="col-md-3 ">
							<div class="left-bt pull-right">
								<button type="button" onclick="xssrat.module.attack();" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-flash"></span> 攻击
								</button>
							</div> 
							<div class="space15"></div>
							<div id="message"></div>
	    				</div>
    				</div>
				</div>
				<!-- the panel body end -->
			</div><!-- the panel  end -->
			<!--attack_box begin -->
			<div class="">
				<!-- attackTab begin-->
				<ul class="nav nav-tabs" id="attackTab">
       				 <li class="active"><a data-toggle="tab" href="#result">结果</a></li>
        			<li><a data-toggle="tab" href="#logs">日志</a></li>
      			</ul>
				<!-- attackTab end-->
				
				<!-- attackTabContent begin-->
				<div class="tab-content " id="attackTabContent">
					<!-- result begin -->
        			<div id="result" class="tab-pane fade in active">
          				<div class="row margintop18">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="attack_box">
								<table class="table  table-hover table-pointer small">
									<thead>
										<tr>
											<th>时间</th>
											<th>名称</th>
											<th>状态</th>
										</tr>
									</thead>
									<tbody id="atackData">
									</tbody>
								</table>
								</div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								<div class="attack_box small" id="attack_result">
								</div>
							</div>
						</div>
        			</div>
					<!-- result end -->	
					<!-- logs begin -->
        			<div id="logs" class="tab-pane fade">
						<div class="margintop18">
							<div class="log_box">
								<table class="table table-striped table-hover  small">
									<thead>
										<tr>
											<th>时间</th>
											<th>消息</th>
										</tr>
									</thead>
									<tbody id="logData">
									</tbody>
								</table>
							</div>
						</div>
        			</div><!-- logs end -->
      			</div><!-- attackTabContent end-->		
			</div>
			<!--attack_box end -->
		</div>
		<!--the right end -->
		
	</div>
	<!--the row jumb end -->
</div>
<!-- main end -->

<!-- foot begin -->
<?php include "include/footer.php"; ?>
<!-- foot end -->
<script>
function updateData(pmd_id){
	xssrat.module.updateAttackData(pmd_id);
  	xssrat.module.updateAttackLog(pmd_id);
}

$(function(){
  
  //定时查询客户端状态 间隔时间为10s
  xssrat.module.checkOnline(<?php echo $pmd_id; ?>); 
  setInterval("xssrat.module.checkOnline(<?php echo $pmd_id; ?>)",10000);
  
  //定时更新攻击数据  间隔时间为3s
  updateData(<?php echo $pmd_id; ?>);
  setInterval("updateData(<?php echo $pmd_id; ?>)",3000);
  
  
  //展示攻击结果
   $("#atackData").on("click","tr",function(){
			var id = $(this).attr("for");
			var attackData = xssrat.module.attackData;
			console.log(id);
			for(var i = 0; i < attackData.length; i++){
				if(attackData[i].id===Number(id)){
					xssrat.module.getAttackResult(id);
				}
			}
	});
  
});
</script>

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