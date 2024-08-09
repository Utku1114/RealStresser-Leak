<?php
include("@/header.php");
$paginaname = 'API';

$SQLGetInfo = $odb -> prepare("SELECT * FROM `plans` WHERE `ID` = :id LIMIT 1");
$SQLGetInfo -> execute(array(':id' => $_GET['id']));
$planInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
$API = $planInfo['api'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php $title = htmlspecialchars($sitename); echo ($title); ?> <?php echo " - "; echo($paginaname); ?></title>
	</head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js" integrity="sha512-Bqyq/zbzlB7XpUGEHbmjS5ymk1rgC2/5IFpSiZWl7sM0lLKvzow1OkSZTP2Z/rDfecoaj//urmcs6nEzYQaPCg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" integrity="sha512-3QG6i4RNIYVKJ4nysdP4qo87uoO+vmEzGcEgN68abTpg2usKfuwvaYU+sk08z8k09a0vwflzwyR6agXZ+wgfLA==" crossorigin="anonymous" />
	<script src="../assets/js/spinner.js"></script>
	  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->
   <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->
			 <div class="page-wrapper">
			  <div class="page-content">
				  <?php 
								if($alert != "")
								{
									Alert($alert);
								}
						 	?>

				  <script>	function sweetAlert(title, message, style)
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
					
					sweetAlert('<?php echo $sitename; ?>', 'SOON!', 'error');
					
					</script>
				  
				  <?php
				  
				  
				  
if ($API == 0)
{
	
}
	if (!($user -> isSupporter($odb)))
	{
		echo ' <script>
				$(document).keydown(function(event){
    				if(event.keyCode==123){
        				return false;
    				}
    					else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
             			return false;
    				}
				});

			$(document).on("contextmenu",function(e){        
   				e.preventDefault();
			});
				</script>';
	}
?>