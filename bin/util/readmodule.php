<?php
/* 
 * Created on 2014��3��19��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 error_reporting(E_ALL ^ E_NOTICE);
 
 
 function readModule($fileName){
	 if($fileName!==null) {
	 	$fileName = basename($fileName);
		$s = new SaeStorage();
		$content = $s->fileExists(SAE_STORAGE_DOMAIN,SAE_MODULES."/".$fileName)?
			$s->read(SAE_STORAGE_DOMAIN,SAE_MODULES."/".$fileName)."\n":"Module File Not Found!";
	 	return  htmlspecialchars($content,ENT_QUOTES);
	 }else{
	 	return "Module File Not Found!";
	 }
 }

 
?>
