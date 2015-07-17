 <?php 
    if (isset($_GET['view-source'])) {
        show_source(__FILE__);
        exit();
    }

    include('flag.php');

    $smile = 1; 

    if (!isset ($_GET['^_^'])) $smile = 0; 
    if (ereg ('\.', $_GET['^_^'])) $smile = 0; 
    if (ereg ('%', $_GET['^_^'])) $smile = 0; 
    if (ereg ('[0-9]', $_GET['^_^'])) $smile = 0; 
    if (ereg ('http', $_GET['^_^']) ) $smile = 0; 
    if (ereg ('https', $_GET['^_^']) ) $smile = 0; 
    if (ereg ('ftp', $_GET['^_^'])) $smile = 0; 
    if (ereg ('telnet', $_GET['^_^'])) $smile = 0; 
    if (ereg ('_', $_SERVER['QUERY_STRING'])) $smile = 0; 
    if ($smile) {
        if (@file_exists ($_GET['^_^'])) $smile = 0; 
    } 
    if ($smile) {
        $smile = @file_get_contents ($_GET['^_^']); 
        if ($smile === "2222") die($flag); 
    } 
?> 
<!doctype html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Show me your smile :)</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<br><br><br><br><br><br><br>
<div class="loginform cf">
    <form name="login" action="index.php" method="POST" accept-charset="utf-8">
        <ul>
            <li>
                <label for="SMILE">Show me your smile face <a href="?view-source">XD</a></label>
                <input type="text" name="T_T" placeholder="where is your smile" required>
            </li>
            <li><input type="submit" value="Show"> </li>
        </ul>
    </form>
</div>
<div style="text-align:center;clear:both">
</div>
</body>

</html>
