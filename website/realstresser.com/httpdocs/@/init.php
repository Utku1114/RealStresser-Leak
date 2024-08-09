<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}

define('DIRECT', TRUE);
require 'functions.php';
$user = new user;
$stats = new stats;

function MessageBox()
{

}



function Alert($text)
{		
    echo '<div class="alert alert-fill-primary" role="alert">
						  	  <strong><i class="fa fa-bullhorn"></i><td> NOTICE:</strong> '.$text.'</td>

						  	  </div>';
}

$siteinfo = $odb -> query("SELECT * FROM `settings` LIMIT 1");
while ($show = $siteinfo -> fetch(PDO::FETCH_ASSOC))
{
$sitename = $show['sitename'];
$description = $show['description'];
$maintaince = $show['maintaince'];
$ethereum = $show['ethereum'];
$bitcoin = $show['bitcoin'];
$tos = $show['tos'];
$siteurl = $show['url'];
$rotation = $show['rotation'];
$system = $show['system'];
$maxattacks = $show['maxattacks'];
$key = $show['key'];
$testboots = $show['testboots'];
$cloudflare = $show['cloudflare'];
$cbp = $show['cbp'];
$skype = $show['skype'];
$issuerId = $show['issuerId'];
$secretKey = $show['secretKey'];
$coinpayments = $show['coinpayments'];
$ipnSecret = $show['ipnSecret'];
$freePremiumMethods = $show['freeMethods'];
$alert = $show['alert'];
$recaptchaSiteKey = "6LftH8EZAAAAAJRxeodIR5htk8y-KXQZSANVMzoG";
$recaptchaSecretKey = "6LftH8EZAAAAAIyjI9LtXNoGpRhmz4ylXxjBzog0";
}

?>
