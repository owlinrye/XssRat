<?php include("./include/sess.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="Xss,Cross Site Script,Web Vulnerability, CSRF,Hack,Information Security, Xss Platform, Xss Framework" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XssRat Module Item Page</title>
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

function postModule(){
		$.ajaxFileUpload({
			url:"bin/action/module.php",
			secureuri:false,
			fileElementId:'code_file',
			dataType: 'json',
			data:$('#module_form').serializeObject(),
			success: function(data,status){
					if(data.result==true){
						xssrat.alert("创建/编辑模块成功！",'success');
						setTimeout("window.location.href='"+data.reason+"'", 1000);
					}else{
						xssrat.alert(data.reason,'danger');
					}
				},
			error: function(data,status,e){
					xssrat.alert(e,'danger');
				}
		});
}

$(function(){
	 $("pre").snippet("javascript",{style:"bright"});
});

</script>

</head>

<body>
<?php include("./include/head.php");  ?>

<?php 
require_once("bin/Path.php");
require_once(PHP_BASE_DIR."/db/MySQL.php"); 
require_once(PHP_BASE_DIR."/entity/Module.php");
require_once(PHP_BASE_DIR."/entity/ModuleCategory.php");
require_once(PHP_BASE_DIR."/entity/User.php"); 
require_once(PHP_BASE_DIR."/util/readmodule.php"); 

$m_id = $_GET['m_id'];
$m_id = $m_id?$m_id:0;
$res = false;
$editAble = false;
$db = new MySQL($log);
$mysqli = $db->openDB(); 
$stor = new SaeStorage(); 
 
if($m_id>0){ 

	if($mysqli!=null){
		$module = new Module($mysqli,$log);
		$mCategory = new ModuleCategory($mysqli,$log);
		$array_category = $mCategory->getCategorys();
		$res = $module->getModuleByID($m_id);
		if($res){
			$user = new User($mysqli,$log);
			//get the module author name
			$author = $user->getUserByID($module->author_id)?$user->username:'Anonymous';
			//Only the op is 'edit' and the current user is  the module author
			//the user can edit the form 
			if($user_info['id']===$module->author_id) $editAble = true;
			$op = 'edit';
		}	 
	}
}else {
	//if the op is 'new', user the can edit the empty form to create a new module
	if($mysqli!=null){
		$mCategory = new ModuleCategory($mysqli,$log);
		$array_category = $mCategory->getCategorys();
	}
	$editAble = true;
	$author = $user_info['username'];
	$op = 'add';
}

$db->closeDB();

?>

<!--

--!>
<!-- main begin -->
<div class="container">

	<div class="row jumb">
	
		<!--the left begin -->
		<?php include("include/menu.php");  ?>

		
		<!--the left end -->		
		
		<!--the right begin -->
		<div class="col-md-10 ">
		
	
			<ol class="breadcrumb">
			  <li><a href="main.php">Home</a></li>
			  <li><a href="module.php">Module</a></li>
			  <li class="active">Item</li>
			</ol>
		
			<div class="panel panel-default ">
				<div class="panel-heading">模块</div>
					<form action="bin/action/module.php" id="module_form" method="post" enctype="multipart/form-data">
					<div class="panel-body">
						<input type="hidden" name="op" value="<?php echo $op; ?>"  />
						<input type="hidden" name="m_id" value="<?php echo $module->m_id; ?>"  />
						<input type="hidden" name="author_id" value="<?php echo $user_info['id']; ?>"  />
						<div class="row form_row">
							<div class="col-md-4">
								<label class="control-label">名称</label>
								<input class="form-control" <?php echo $editAble?'':'readonly'; ?>  placeholder="模块名称"  tabindex="1" type="text"  name="m_name" value="<?php echo $module->m_name; ?>"  required  />
                                <p class="help-block small" >必须和脚本中的模块名一致</p>
							</div>
							<div class="col-md-4">
								<label class="control-label">作者</label>
								<input class="form-control" readonly  placeholder="模块作者"  tabindex="2" type="text"  name="author" value="<?php echo $author ?>"  required  />
							</div>
							<div class="col-md-4">
								<label class="control-label">危险等级</label>
								<input class="form-control" <?php echo $editAble?'':'readonly'; ?>  tabindex="3" type="number" min="1" max="5"  name="risk" value="<?php echo $module->risk; ?>"  required  />
								 <p class="help-block small" >1-5级，等级越高，越容易被发现！</p>
							</div>
						</div>
				
						<div class="row form_row">
							<div class="col-md-4">
								<label class="control-label">类别</label>
									<select class="form-control" <?php echo $editAble?'':'readonly'; ?> name="category_id" tabindex="4" placeholder="模块类别"  >
										<?php 
											foreach($array_category as $ca){
												if((int)$module->category_id === (int)$ca['id'])
												echo "<option selected = \"selected\" value=\"".$ca['id']."\">".$ca['text']."</option>";
												else echo "<option value=\"".$ca['id']."\">".$ca['text']."</option>";
											}
										?>
									</select>
							</div>
							<div class="col-md-6">
								<label class="control-label">介绍</label>
								<input class="form-control" <?php echo $editAble?'':'readonly'; ?>  placeholder="模块介绍"  tabindex="5" type="text"  name="m_info" value="<?php echo $module->m_info; ?>"  required  />
							</div>
						</div>
						
						<div class="row form_row">
							<div class="col-md-6">
								<label for="code_file" class="control-label">代码</label>
								<input type="file"   <?php echo $editAble?'':'disabled=true'; ?> id="code_file" name='code_file' accept="application/javascript" />
								<p class="help-block" >Only support JavaScript file type</p>
							</div>
							<div class="col-md-6">
									<button  <?php echo $editAble?'':'disabled=true'; ?>    type="button" onclick="postModule();" class="btn btn-primary center-block">
										<span class="glyphicon glyphicon-ok"></span> 提交
									</button>
							</div>
						</div>
						
						<div class="row form_row1">
							<div class="col-md-10">
								<p class="help-block">你可以通过上传文件来替换下列代码。替换后无法恢复，请谨慎操作！</p>
							</div>
							<div class="col-md-2 pull-right">
								<a target="_blank" href="<?php echo$stor->getCDNUrl("xssrat","modules/".$module->m_path); ?>" ><span class="label label-info"><i class="glyphicon glyphicon-download"></i> 下载</span></a>
							</div>
						</div>
						
						<div class="row form_row">
							<div class="col-md-12">
								<pre>
									<?php echo readModule($module->m_path); ?>
								</pre>
								
							</div>
						</div>
						
					</div>
					</form>
			</div>
		</div>
		<!--the right end -->

			
	</div>
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


