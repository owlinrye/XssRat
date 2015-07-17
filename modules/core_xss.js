// JavaScript Document
//rat.extend(true,rat.module.core,rat.module);
//core module has been extended from rat.module

rat.module.core = {
	config:null,
	browser_details:function(){
		rat.updater.browser_details();
	},
	exploit:function(){
		this.browser_details();
	}

};