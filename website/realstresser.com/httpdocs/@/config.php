<?php

$wafSystemActive = 0;
$blockMessage = "SQL injection detected and <font style='color:red;'>BLOCKED</font>!<br>RealStresser Protection";

if($wafSystemActive == 1)
{	
	if(preg_match("/([%\$#\*]+)/", $_SERVER["QUERY_STRING"])) //Firewall Step 1
		die($blockMessage);
	
	$blockedQuerys = array("sql", "%", "[", "*", "UPDATE", "INSERT", "%27", "SELECT", "WHERE", "DELETE", "update", "insert", "select", "where", "delete", "%A2", "rank=", "FROM", "from", "$", "^", "#", "+", "<script>"); //Yasaklı karakterler.
	if (strposa($_SERVER["QUERY_STRING"], $blockedQuerys, 1))
	    die($blockMessage);
	

	
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'realstresser');
define('DB_USERNAME', 'realstresser');
define('DB_PASSWORD', '1em85e?P');
define('ERROR_MESSAGE', 'Oops, we ran into a problem here please try again later. -RealStresser');


try {
$odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
}
catch( PDOException $Exception ) {
	error_log('ERROR: '.$Exception->getMessage().' - '.$_SERVER['REQUEST_URI'].' at '.date('l jS \of F, Y, h:i:s A')."\n", 3, 'error.log');
	die(ERROR_MESSAGE);
}

function error($string)
{
	return "<span style='color: red;'>$string</span>";
}

function success($string)
{
	return "<span style='color: green;'>$string</span>";
}

function successAlert($title, $string)
{
	return "<script>
				function sweetAlert(title, message, style)
					{
						Swal.fire(
						  title,
						  message,
						  style
						);
						$('.swal2-success-circular-line-left').css('background-color', 'transparent');
						$('.swal2-success-circular-line-right').css('background-color', 'transparent');
						$('.swal2-success-fix').css('background-color', 'transparent');

					}
			</script>";
}

function strposa($haystack, $needles=array(), $offset=0) {
        $chr = array();
        foreach($needles as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
}
?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e9908e869e9320caac47210/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
