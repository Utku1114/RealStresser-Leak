<?php
//require_once '../@/config.php';
//require_once '../@/init.php'; gereksiz html5 parametreleri amk

$type = $_GET['type'];
$proxyMaxTimeOut = 1000; //1000ms...
//$proxyApi1 = get_data("https://api.proxyscrape.com/?request=displayproxies&proxytype=http&country=all&anonymity=all&timeout=$proxyMaxTimeOut&ssl=all");
//$proxyApi2 = get_data("https://www.proxyscan.io/download?type=http");
//$proxyApi3 = get_data("https://www.proxy-list.download/api/v1/get?type=http");
//$proxyApi4 = get_data("https://www.proxyscan.io/download?type=https");
//$proxyApi5 = get_data("https://advanced.name/freeproxy/5f546b42e6fb4");
//$proxyApi6 = get_data("http://spys.me/proxy.txt");
//$proxyApi7 = get_data("https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt");
//$proxyApi8 = get_data("https://proxy11.com/api/proxy.txt?key=MTczOA.X1boQQ.IqBDo1goZfyN6WvL9kIBdw_mPng");
//$test = get_data("https://example.com");

if($type == "HTTP" || $type == "http")
	$fileProxyApi = file_get_contents("http.txt");
else if($type == "SOCKS5" || $type == "socks5")
	$fileProxyApi = file_get_contents("socks5.txt");

$proxyApi7DelChars = substr($proxyApi7, 0, strpos($proxyApi7, "This List"));

//$blabla = getContentExternal('https://anonboot.net', '<div class="btnsp">', '</div>');

header('Content-Type: text/plain');
echo($fileProxyApi);
//echo ($proxyApi1);
//echo ($proxyApi2);
//echo ($proxyApi3);
//echo ($proxyApi4);
//echo get_data($proxyApi5);
//echo get_data($proxyApi6);
//echo ($proxyApi7);
//echo ($proxyApi8);
//echo get_data($test);

function deleteLineInFile($file,$string)
{
	$i=0;$array=array();
	
	$read = fopen($file, "r") or die("can't open the file");
	while(!feof($read)) {
		$array[$i] = fgets($read);	
		++$i;
	}
	fclose($read);
	
	$write = fopen($file, "w") or die("can't open the file");
	foreach($array as $a) {
		if(!strstr($a,$string)) fwrite($write,$a);
	}
	fclose($write);
}

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
?>