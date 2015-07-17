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
		delData:function(data,url){
			$.ajax({
				url:url,
				type:"POST",
				data:JSON.stringify(data),
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
			$('#alert_modal').modal()
		}
		
}