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
require_once '../@/config.php';
require_once '../@/init.php';
include("@/header.php");
include("@/config.php");
if(isset($_POST['deletelogs']))
{
	echo $_SESSION['username'];
	echo " " + $odb;
  	if($stats->countRunning($odb, $_SESSION['username']) > 0)
	{
		echo("<font style='color:red;'>An attack is running. Please stop the attack an try again!</font>");
	}
  	else
	{
		$deleteLogs = $odb -> prepare("DELETE FROM `logs` WHERE `user` = :username");
		$deleteLogs -> execute(array(":username" => $_SESSION['username']));
  		//echo "sweetAlert('$sitename', 'Your logs has been deleted successfully!', 'success');";
		echo("<font style='color:green;'>Your logs has been deleted successfully!</font>");
	}
}
?>