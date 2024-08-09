  <!-- CSRF Token -->
  <meta name="_token" content="str5hm5z8d6ux1jpmcILUXYo2rVyGNeI2uayBt35"> 
  <link rel="shortcut icon" href="favicon/favicon.ico">
  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->
   <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->
<?php
if (!isset($_SERVER['HTTP_REFERER'])) {die;}
//Header
require_once '../@/config.php';
require_once '../@/init.php';
include("@/config.php");

$apiKey = "8PO93-7PIX3-BMNM0-K7TAS";

$type = $_GET['type'];

function get_data_json($url)
{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
				
//Skype resolver
if ($type == 'skype')
{
	$skypeName = htmlspecialchars($_POST['skypeName']);
	if($skypeName == "")
	{
		echo("Please verify all fields");
	} else {
		$skypeResolve = get_data("https://webresolver.nl/api.php?key=$apiKey&action=resolve&string=$skypeName");
		echo($skypeResolve);
	}
}

//Skype resolver
if ($type == 'email2skype')
{
	$skypeMail = htmlspecialchars($_POST['skypeMail']);
	if($skypeMail == "")
	{
		echo("Please verify all fields");
	} else {
		$skypeResolveMAIL = get_data("https://webresolver.nl/api.php?key=$apiKey&action=email2skype&string=$skypeMail");
		echo($skypeResolveMAIL);
	}
}

//Domain resolver
if ($type == 'http')
{
	$webName = htmlspecialchars($_POST['webName']);
	if($webName == "")
	{
		echo("Please verify all fields");
	} else {
		$webResolve = get_data("https://webresolver.nl/api.php?key=$apiKey&action=dns&string=$webName");
		echo($webResolve);
	}
}

// Geo
if ($type == 'geo')
{
	$geoName = htmlspecialchars($_POST['geoName']);
	if($geoName == "")
	{
		echo("Please verify all fields");
	} else {
		if(filter_var($geoName, FILTER_VALIDATE_IP)) {
			$geoResolve = get_data("https://webresolver.nl/api.php?key=$apiKey&action=geoip&string=$geoName");
			echo($geoResolve);
		} else {
			echo("Put a valid IP Address");
		}
	}
}

// DB
if ($type == 'db')
{
	$dbName = htmlspecialchars($_POST['dbName']);
	if($dbName == "")
	{
		echo("Please verify all fields");
	} else {
	
	$dbResolve = get_data("https://webresolver.nl/api.php?key=$apiKey&action=resolvedb&string=$dbName");
	echo($dbResolve);
	}
}

//Cloudflare resolver
if ($type == 'cloudflare')
{
	$webName = htmlspecialchars($_POST['webName']);
	if($webName == "")
	{
		echo("Please verify all fields");
	} else {
		$cfResolve = get_data("https://webresolver.nl/api.php?key=$apiKey&action=cloudflare&string=$webName");
		echo($cfResolve);
	}
}

//Ping
if ($type == 'ping')
{
	$pingIP = htmlspecialchars($_POST['pingIP']);
	$parsedHost = parse_url($pingIP, PHP_URL_HOST);
	if($pingIP == "")
	{
		die("Please verify all fields");
	}
	
	if (strpos($pingIP, '&') !== false) {
    	die("Invalid format!");
	}
	
	if($parsedHost)
	{
		$pingIP = $parsedHost;
	}

	$output = shell_exec("ping -c 5 ".htmlspecialchars($pingIP));
	echo("<pre>".$output."</pre>");
}

//Whois
if ($type == 'whois')
{
	$whoisHost = htmlspecialchars($_POST['whoisHost']);
	if($whoisHost == "")
	{
		echo("Please verify all fields");
	}
	else
	{
		$whoisHost = preg_replace('#^https?://#', '', rtrim($whoisHost,'/'));
    	$whois = shell_exec("whois $whoisHost");
    	echo "<pre>$whois</pre>";
    	//print_r($whois);
	}
}

//Proxy Extractor
if ($type == 'proxyextractor')
{
	$proxyHost = htmlspecialchars($_POST['proxies']);
	if($proxyHost == "")
	{
		echo("Please verify all fields");
	}
	else
	{
		$proxyHost = preg_replace('#^https?://#', '', rtrim($proxyHost,'/'));
    	//$whois = shell_exec("whois $proxyHost");
    	//echo "<pre>$whois</pre>";
    	//print_r($whois);
	}
}

?>