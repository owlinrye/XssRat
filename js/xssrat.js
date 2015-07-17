/**
 * 
 * this function is a extend of JQuery
 * it can serialize the from to be a json type object
 * 
 */

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

/**
 * the namespace must need json2.js  and jquery.js
 * the namespace base on bootstrap
 * 
 */
var xssrat = {
		
		/**
		 * data:  the json object to be post
		 * url: the Post URL
		 * msgDiv: the return msg div
		 */
		postData:function(data,url,msgDiv){
			$.ajax({
				url:url,
				type:"POST",
				data:JSON.stringify(data),
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result==false){
					$(msgDiv).removeClass().addClass('alert alert-danger').html(r_data.reason);
					setTimeout("$("+msgDiv+").fadeOut()", 4000);	
				}else{
					$(msgDiv).removeClass().addClass('alert alert-success').html(r_data.reason);
					setTimeout("window.location.reload()", 1000);
				}	
			});	
		},
		delData:function(data,url,isJson){
			$.ajax({
				url:url,
				type:"POST",
				data:isJson?JSON.stringify(data):data,
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result==false){
					xssrat.alert(r_data.reason,'danger');
				}else{
					xssrat.alert(r_data.reason,'success');
					setTimeout("window.location.reload()", 1000);
				}	
			});	
		},
		sendAndReload:function(data,url,isJson,f){
			$.ajax({
				url:url,
				type:"POST",
				data:isJson?JSON.stringify(data):data,
				dataType:'json'
			}).done(function(r_data){
				if(r_data.result==false){
					xssrat.alert(r_data.reason,'danger');
				}else{
					xssrat.alert(r_data.reason,'success');
					var url = location.href;
					var new_url = url.split("#")[0]+ "#" +f;
					setTimeout("window.location.href = '"+new_url+"';location.reload();", 1000);
					
				}	
			});	
		},
		/**
		 * suport 4 types :  
		 * 		danger,info,waring,danger
		 */
		alert:function(msg,type){
			switch(type){
				case 'danger':
					$('#alert_msg').removeClass().addClass('alert alert-danger').html(msg);break;
				case 'info':
					$('#alert_msg').removeClass().addClass('alert alert-info').html(msg);break;
				case 'warning':
					$('#alert_msg').removeClass().addClass('alert alert-warning').html(msg);break;
				case 'success':
					$('#alert_msg').removeClass().addClass('alert alert-success').html(msg);break;
			}
			$('#alert_modal').modal();
			//alert(123123);
		},
		json2li:function(json){
			var _sreturn = "<ul>";
			if(typeof(json)!=="object"){
				_sreturn += "<li>"+unescape(json) +"</li>";
			}else{
				for(var key in json){
					var value = (typeof(json[key]) == "object") ? xssrat.json2li(json[key]):json[key];
					_sreturn += "<li>"+key + " : " + value +"</li>";
				}
			}
			return _sreturn + "</ul>";
		},
		half_html_encode:function(str){
			var s = "";   
			if (str.length == 0) return "";     
			s = s.replace(/</g, "&lt;");   
			s = s.replace(/>/g, "&gt;");    
			s = s.replace(/\'/g, "&#39;");   
			s = s.replace(/\"/g, "&quot;");    
			return s;   
		},
		html_encode:function(str)   
		{   
		  var s = "";   
		  if (str.length == 0) return "";   
		  s = str.replace(/&/g, "&gt;");   
		  s = s.replace(/</g, "&lt;");   
		  s = s.replace(/>/g, "&gt;");   
		  s = s.replace(/ /g, "&nbsp;");   
		  s = s.replace(/\'/g, "&#39;");   
		  s = s.replace(/\"/g, "&quot;");   
		  s = s.replace(/\n/g, "<br>");   
		  return s;   
		},
		html_decode:function(str)   
		{   
		  var s = "";   
		  if (str.length == 0) return "";   
		  s = str.replace(/&gt;/g, "&");   
		  s = s.replace(/&lt;/g, "<");   
		  s = s.replace(/&gt;/g, ">");   
		  s = s.replace(/&nbsp;/g, " ");   
		  s = s.replace(/&#39;/g, "\'");   
		  s = s.replace(/&quot;/g, "\"");   
		  s = s.replace(/<br>/g, "\n");   
		  return s;   
		},   
		getTrueValue:function(json){
			var value_str = "[";
			if(typeof(json)!=="object") return json;
			else{
				for(var key in json){
					var value = (typeof(json[key]) == "object") ? xssrat.getTrueValue(json[key]):json[key];
					if(value) value_str += key + ":"+ value;
				}
			}
			return value_str+"]";
		}
}