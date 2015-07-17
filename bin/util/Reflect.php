<?php
/* 
 * Created on 2014��3��4��
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */
 
function VarName(&$var){
	$allvar = $GLOBALS;
	foreach($allvar as $var_name=>$value){
		//print $var_name;
		if($value === $var){
			//print $GLOBALS[$var_name];
			$value_bak = $var;
			$var = "--test--";
			if($var === $GLOBALS[$var_name]){
				$var = $value_bak;
				return $var_name;
			}
			$var = $value_bak;
		}
		
	}
	return null;
} 

 function func($param1, $param2 ) {
    /* some code */
};

$refFunc = new ReflectionFunction($func);
foreach ($refFunc->getParameters() as $refParameter) {
    echo $refParameter->getName(), '<br />';
}

 
?>
