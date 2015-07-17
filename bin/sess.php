<?php
/*
 * Created on 2014-5-5
 * 
 * @project XssRat
 * @author owlinrye
 * @email blackrat.sec@gmail.com
 * An easy Xss framework
 */

function startSession($time = 3600, $ses = 'xssrat_session') {
    session_set_cookie_params($time,"/",null,false,true);
    session_name($ses);
    session_start();

    // Reset the expiration time upon page load
    if (isset($_COOKIE[$ses]))
      setcookie($ses, $_COOKIE[$ses], time() + $time, "/");
}

startSession();


?>
