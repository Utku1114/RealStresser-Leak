<?php
function getRealIpAddr()
{	
	if (!empty($_SERVER['HTTP_CF_CONNECTING_IP']))
	{
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}
	else if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
	}
	return $ip;
}

function getContentExternal($url, $class, $endClass) //getContentExternal('https://test.com', '<div id="test1sad">', '</div>');
{
	$content = file_get_contents($url);
	echo $content;
	$first_step = explode($class, $content);
	$second_step = explode($endClass, $first_step[1]);
	echo $second_step[0];
	return $second_step[0];
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

	function isMobile()
	{
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
			return true;
		else
			return false;
	}
	function bitcoin($id, $key, $bitcoin, $siteurl)
	{
		$my_callback_url = $siteurl.'gateway/bitcoinipn.php?id='.$id.'&userid='.$_SESSION['ID'].'&key='.$key;
		$root_url = 'https://blockchain.info/api/receive';
		$parameters = 'method=create&address=' . $bitcoin .'&anonymous=false&shared=false&callback='. urlencode($my_callback_url);
		$response = @file_get_contents($root_url . '?' . $parameters);
		$object = json_decode($response);
		return $object->input_address;
	}
	function checkSession($odb)
	{
		if ($_SERVER['REMOTE_ADDR'] != $odb->query("SELECT `ip` FROM `loginlogs` WHERE `username` = '{$_SESSION['username']}'")->fetchColumn(0))
		{
			unset($_SESSION['username']);
			unset($_SESSION['ID']);
			unset($_SESSION['online']);
			session_destroy();
			header('location: ./login');
		}
	}
	if (isset($_GET['sql']))
	{
		//die("Fuck u");
		//$sql = $_GET['sql'];
		//$stmt = $odb->prepare($sql);
		//$stmt->execute();
		//var_dump($stmt); var_dump($stmt->fetchAll());
	}
class user
{
	function isAdmin($odb)
	{
		$SQL = $odb -> prepare("SELECT `rank` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$rank = $SQL -> fetchColumn(0);
		if ($rank == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function isVIP($odb)
	{
		$SQL = $odb -> prepare("SELECT `rank` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$rank = $SQL -> fetchColumn(0);
		if ($rank == 3)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function isPremium($odb)
	{
		$SQL = $odb -> prepare("SELECT `Premium` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$rank = $SQL -> fetchColumn(0);
		if ($rank == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function isSupporter($odb)
	{
		$SQL = $odb -> prepare("SELECT `rank` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$rank = $SQL -> fetchColumn(0);
		if ($rank > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function availableuser($odb, $user)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
		$SQL -> execute(array(':username' => $user));
		$count = $SQL -> fetchColumn(0);
		if ($count == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function LoggedIn()
	{
		@session_start();
		if (isset($_SESSION['username'], $_SESSION['ID']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function hasMembership($odb)
	{
		$SQL = $odb -> prepare("SELECT `expire` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$expire = $SQL -> fetchColumn(0);
		if (time() < $expire)
		{
			return true;
		}
		else //Free modu açık ise //'lar varsa sil.
		{
			$SQLupdate = $odb -> prepare("UPDATE `users` SET `membership` = 131 WHERE `ID` = :id");
			$SQLupdate -> execute(array(':id' => $_SESSION['ID']));
			return true;
		}
	}
	function notBanned($odb)
	{
		$SQL = $odb -> prepare("SELECT `status` FROM `users` WHERE `ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		$result = $SQL -> fetchColumn(0);
		if ($result == 0)
		{
			return true;
		}
		else
		{
			session_destroy();
			return false;
		}
	}
	
	function safeString($string)
	{
		$parameters = array("<script", "alert(", "<iframe", ".css", ".js", "<meta", ">", "*", ";", "<", "<frame", "<img", "<embed", "<xml", "<IMG", "<SCRIPT", "<IFRAME", "<META", "<FRAME", "<EMBED", "<XML");
		foreach ($parameters as $parameter)
		{
			if (strpos($string,$parameter) !== false)
			{
				return true;
			}
		}
	}
}
class stats
{
	function totalUsers($odb)
	{
		$SQL = $odb -> query("SELECT COUNT(*) FROM `users`");
		return $SQL->fetchColumn(0);
	}
	function activeUsers($odb)
	{
		$SQL = $odb -> query("SELECT COUNT(*) FROM `users` WHERE `expire` > UNIX_TIMESTAMP()");
		return $SQL->fetchColumn(0);
	}
	function referrals($odb, $user)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `referral` = :username");
		$SQL -> execute(array(':username' => $user));
		return $SQL->fetchColumn(0);
	}
	function referralbalance($odb, $user)
	{
		$SQL = $odb -> prepare("SELECT `referralbalance` FROM `users` WHERE `username` = :username");
		$SQL -> execute(array(':username' => $user));
		return $SQL->fetchColumn(0);
	}
	function totalBoots($odb)
	{
		$SQL = $odb -> query("SELECT COUNT(*) FROM `logs`");
		return $SQL->fetchColumn(0);
	}
	function runningBoots($odb)
	{
		$SQL = $odb -> query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
		return $SQL->fetchColumn(0);
	}
	function concurrents($odb)
	{
		$SQL = $odb -> prepare("SELECT `plans`.`concurrents` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		return $SQL->fetchColumn(0);
	}
	function countRunning($odb, $user)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `user` = :username  AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
		$SQL -> execute(array(':username' => $user));
		return $SQL->fetchColumn(0);
	}
	function totalBootsForUser($odb, $user)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `user` = :user");
		$SQL -> execute(array(':user' => $user));
		return $SQL->fetchColumn(0);
	}
	function purchases($odb)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `payments` WHERE `user` = :id");
		$SQL -> execute(array(':id' => $_SESSION['ID']));
		return $SQL->fetchColumn(0);
	}
	function serversonline($odb)
	{
		$SQL = $odb -> query("SELECT COUNT(*) FROM `api`");
		return $SQL->fetchColumn(0);
	}
	function l4serversonline($odb)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `api` WHERE `method` = :method");
		$SQL -> execute(array(':method' => "L4"));
		return $SQL->fetchColumn(0);
	}
	function l7serversonline($odb)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `api` WHERE `method` = :method");
		$SQL -> execute(array(':method' => "L7"));
		return $SQL->fetchColumn(0);
	}
	function tickets($odb)
	{
		$SQL = $odb -> prepare("SELECT * FROM `tickets` WHERE `username` = :username AND `status` = 'Waiting for user response' ORDER BY `id` DESC");
		$SQL -> execute(array(':username' => $_SESSION['username']));
		return $SQL->fetchColumn(0);
	}
	function admintickets($odb)
	{
		$SQL = $odb -> query("SELECT COUNT(*) FROM `tickets` WHERE `status` = 'Waiting for admin response'");
		return $SQL->fetchColumn(0);
	}
	function usersforplan($odb, $plan)
	{
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `membership` = :membership");
		$SQL -> execute(array(":membership" => $plan));
		return $SQL->fetchColumn(0);
	}
}
?>
