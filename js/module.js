// JavaScript Document
if (typeof rat !== 'object') {
	rat = {
		extend:function() {  //来自于jquery extend 支持浅拷贝和深拷贝  
			var options, name, src, copy, copyIsArray, clone,  
				target = arguments[0] || {}, // 目标对象  
				i = 1,  
				length = arguments.length,  
				deep = false;  
			
			// 处理深度拷贝情况（第一个参数是boolean类型且为true）  
			if ( typeof target === "boolean" ) {  
				deep = target;  
				target = arguments[1] || {};  
				// 跳过第一个参数（是否深度拷贝）和第二个参数（目标对象）  
				i = 2;  
			}  
			
			// 如果目标不是对象或函数，则初始化为空对象  
			if ( typeof target !== "object" && !jQuery.isFunction(target) ) {  
				target = {};  
			}  
			
			// 如果只指定了一个参数，则使用jQuery自身作为目标对象  
			if ( length === i ) {  
				target = this;  
				--i;  
			}  
			
			for ( ; i < length; i++ ) {  
				// Only deal with non-null/undefined values  
				if ( (options = arguments[ i ]) != null ) {  
					// Extend the base object  
					for ( name in options ) {  
						src = target[ name ];  
						copy = options[ name ];  
			
						// Prevent never-ending loop  
						if ( target === copy ) {  
							continue;  
						}  
			
						// 如果对象中包含了数组或者其他对象，则使用递归进行拷贝  
						if ( deep && copy && ( jQuery.isPlainObject(copy) || (copyIsArray = jQuery.isArray(copy)) ) ) {  
							// 处理数组  
							if ( copyIsArray ) {  
								copyIsArray = false;  
								// 如果目标对象不存在该数组，则创建一个空数组；  
								clone = src && jQuery.isArray(src) ? src : [];  
							} else {  
								clone = src && jQuery.isPlainObject(src) ? src : {};  
							}  
			
							// 从不改变原始对象，只做拷贝  
							target[ name ] = jQuery.extend( deep, clone, copy );  
							  
						// 不拷贝undefined值  
						} else if ( copy !== undefined ) {  
							target[ name ] = copy;  
						}  
					}  
				}  
			}  
			
			// 返回已经被修改的对象  
			return target;  
		}
	}
	
}

if(typeof rat.module !== 'object'){
	rat.module = {}
}



xssrat.module = {
		attackData:null,
		attackLog:null,
		pmd_id:null,
		m_id:null,
		loadScript:function(fileName,moduleName){
			var reg = /^[a-z0-9]{32}\.js$/
			if(reg.test(fileName)){
				$.getScript("http://xssrat-xssrat.stor.sinaapp.com/modules/"+fileName).done(function(){
					if(typeof(rat.module[moduleName])==="object"){
						 var config = rat.module[moduleName].config;
						// console.log(config);
						 if(typeof(config)==="object"){
							var i =0;
							var inner_html = "";
							for(var f in config){
								if(i==0) inner_html += "<div class=\"row\">";
								inner_html += "<div class=\"col-lg-6 col-md-6 col-sm-6\">";
								inner_html += "<label for=\""+f+"\"  class=\"control-label\">"+f+"</label><input type=\"text\" class=\"form-control input-sm\" name=\""+f+"\"  value=\""+config[f]+"\" id=\""+f+"\" />";
								inner_html += "</div>";
								i++;
								if(i==2) {inner_html += "</div>"; i = 0;}
							}
							$("#config").html(inner_html);
						 }else{ console.log("config is not a object"); $("#config").html(""); }
					}else {console.log(moduleName +" is not a object");$("#config").html("");}
				}).fail(function(jqxhr, settings, exception ){
					console.log(jqxhr);
					console.log(exception);
					console.log("load script failed");
					$("#config").html("");
				});
			}else{
				console.log("module script not found!");
				$("#config").html("");
			}
		},
		loadCoreScript:function(fileName){
			var reg = /^[\w\_\.-]{1,32}\.js$/
			if(reg.test(fileName)){
				$.getScript("http://xssrat-xssrat.stor.sinaapp.com/modules/"+fileName).done(function(){
					if(typeof(rat.module.core)==="object"){
						 var config = rat.module.core.config;
						 if(typeof(config)==="object"&&config!=null){
							var inner_html = "<label class=\"control-label\">--------------配置---------------</label>";
							for(var f in config){
								inner_html += "<div class=\"form_filed\">";
								inner_html += "<label class=\"control-label\">"+f+"</label>" 
								inner_html +="<input class=\"form-control\" id=\"f_"+f+"\"   type=\"text\"  name=\""+f+"\" value=\""+config[f]+"\"  required  />"
								inner_html += "</div>";
							}
							$("#core_config").html(inner_html);
						 }else{ console.log("config is not a object"); $("#core_config").html(""); }
					}else {console.log("rat.module.core is not a object");$("#core_config").html("");}
				}).fail(function(jqxhr, settings, exception ){
					console.log(jqxhr);
					console.log(exception);
					console.log("load script failed");
					$("#core_config").html("");
				});
			}else{
				console.log("module script not found!");
				$("#core_config").html("");
			}
		},
		loadCoreConfig:function(p_id){
			$.getScript("bin/action/projectModule.php?p_id="+p_id).done(function(){
				 var config = coreconfig;
				 if(typeof(config)==="object"&&config!=null){
					var inner_html = "<label class=\"control-label\">--------------配置---------------</label>";
					for(var f in config){
						inner_html += "<div class=\"form_filed\">";
						inner_html += "<label class=\"control-label\">"+f+"</label>" 
						inner_html +="<input class=\"form-control\" id=\"f_"+f+"\"   type=\"text\"  name=\""+f+"\" value=\""+config[f]+"\"  required  />"
						inner_html += "</div>";
					}
					$("#core_config").html(inner_html);
				 }else{ console.log("config is not a object"); $("#core_config").html(""); }
			}).fail(function(jqxhr, settings, exception ){
				console.log(jqxhr);
				console.log(exception);
				console.log("load script failed");
				$("#core_config").html("");
			});
		},
		attack:function(){
			var config_data = $("#config").serializeObject();
			$.ajax({
				url:"bin/action/attack.php",
				type:"POST",
				data:"{\"op\":\"attack\",\"pmd_id\":\""+xssrat.module.pmd_id+"\",\"m_id\":\""+xssrat.module.m_id+"\",\"config\":"+JSON.stringify(config_data)+"}",
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result==false){
					$("#message").removeClass().addClass('alert alert-danger').html(r_data.reason).show();
					setTimeout("$(\"#message\").fadeOut()", 3000);	
				}else{
					$("#message").removeClass().addClass('alert alert-success').html(r_data.reason).show();
					setTimeout("$(\"#message\").fadeOut()", 3000);
				}	
			});	
			//var m_id = 
			//config_data.push
		},
		checkOnline:function(pmd_id){
			xssrat.module.pmd_id = pmd_id;
			$.ajax({
				url:"bin/action/attack.php",
				type:"POST",
				data:"{\"op\":\"checkOnline\",\"pmd_id\":\""+pmd_id+"\"}",
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result==false){//下线
					$("#client_status").removeClass().addClass('unknown').html('未知');
				}else{
					if(r_data.reason=='online') $("#client_status").removeClass().addClass('online').html('在线');
					else $("#client_status").removeClass().addClass('outline').html('离线');
				}
			});
		},
		updateAttackData:function(pmd_id){
			xssrat.module.pmd_id = pmd_id;
			var attackData = {};
			$.ajax({
				url:"bin/action/attack.php",
				type:"POST",
				data:"{\"op\":\"attackData\",\"pmd_id\":\""+pmd_id+"\"}",
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result===true){
		
					xssrat.module.attackData = r_data.reason;
					//绘制表格
					xssrat.module.drawDataTable(r_data.reason);
				}
			});
			
		},
		updateAttackLog:function(pmd_id){
			$.ajax({
				url:"bin/action/attack.php",
				type:"POST",
				data:"{\"op\":\"attackLog\",\"pmd_id\":\""+pmd_id+"\"}",
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result===true){
					xssrat.module.attackLog = r_data.reason;
					//绘制表格
					xssrat.module.drawLogTable(r_data.reason);
				}
			});
		},
		drawDataTable:function(attackData){
			var tbody = $("#atackData");
			if(typeof(attackData)==="object"||attackData.length>0){
				var innerHtml = "";
				for(var i = 0; i < attackData.length; i++){
					innerHtml += "<tr for="+attackData[i].id+">";
					innerHtml += "<td>"+attackData[i].datetime+"</td>";
					innerHtml += "<td>"+attackData[i].m_name+"</td>";
					var status = "";
					switch(attackData[i].status){
						case 0:  status = "<font color=\"#0066CC\">waiting</font>"; break;
						case 1:  status = "<font color=\"#096\">Finished</font>"; break;
						case 2:  status = "<font color=\"#F60\">Running</font>"; break;
						case -1: status = "<font color=\"#999999\">Timeout</font>"; break;
					}
					
					innerHtml += "<td>"+status+"</td>";
					innerHtml += "</tr>";
				}
				tbody.html(innerHtml);
			}
		
		},
		drawLogTable:function(logData){
			var tbody = $("#logData");
			if(typeof(logData)==="object"||logData.length>0){
				var innerHtml = "";
				for(var i = 0; i < logData.length; i++){
					innerHtml += "<tr for="+logData[i].id+">";
					innerHtml += "<td>"+logData[i].datetime+"</td>";
					innerHtml += "<td>"+logData[i].log+"</td>";
					innerHtml += "</tr>";
				}
				tbody.html(innerHtml);
			}
		
		},
		getAttackResult:function(id){
			$.ajax({
				url:"bin/action/attack.php",
				type:"POST",
				data:"{\"op\":\"attackResult\",\"id\":\""+id+"\"}",
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result===true){
					if(typeof(r_data.reason)=="object"){
						$("#attack_result").html(xssrat.json2li(r_data.reason));
					}else{
						$("#attack_result").html(r_data.reason);
					}
				}else{
					$("#attack_result").html("");
				}
			});
		}
		
		
	}