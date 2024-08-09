<?php

//$wafSystemActive = 1;
//$blockMessage = "SQL injection detected and <font style='color:red;'>BLOCKED</font>!<br>RealStresser Protection";
//
//if($wafSystemActive == 1)
//{
//	if(preg_match("/([%\$#\*]+)/", $_SERVER["QUERY_STRING"])) //Firewall Step 1
//		die($blockMessage) & exit;
//	
//	$blockedQuerys = array("..", "../", "sql", "%", "[", "*", "\\", "UPDATE", "INSERT", "%27", "SELECT", "WHERE", "DELETE", "/**/", "update", "insert", "select", "where", "delete", "%A2", "rank=", "FROM", "from", "$", "^", "#", "+"); //Yasaklı karakterler.
//	if (strposa($_SERVER["QUERY_STRING"], $blockedQuerys, 1))
//	    die($blockMessage) & exit;
//}
//
//$file = $_GET['file'];
//
//if(empty($file))
//	die("file Parameter is not defined!") & exit;
//
//if(!file_exists($file))
//	die("There is no such file!") & exit;
//
//header("Pragma: public");
//header("Expires: 0");
//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("Cache-Control: public");
//header("Content-Description: File Transfer");
//header("Content-type: application/octet-stream");
//header('Content-Disposition: attachment; filename="'.$file.'"');
//header("Content-Transfer-Encoding: binary");
//header("Content-Length: ".filesize($file));
//ob_end_flush();
//@readfile($file);
//
//function strposa($haystack, $needles=array(), $offset=0) {
//        $chr = array();
//        foreach($needles as $needle) {
//                $res = strpos($haystack, $needle, $offset);
//                if ($res !== false) $chr[$needle] = $res;
//        }
//        if(empty($chr)) return false;
//        return min($chr);
//}

die("Currently disabled!");

?>