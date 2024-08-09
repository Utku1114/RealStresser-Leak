<?php
include("@/header.php");
$paginaname = 'Power Proof';

$SQLGetInfo = $odb -> prepare("SELECT * FROM `plans` WHERE `ID` = :id LIMIT 1");
$SQLGetInfo -> execute(array(':id' => $_GET['id']));
$planInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);

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
				  		     <div class="alert alert-fill-primary">	
           <span data-feather="camera" class="icon-md text-light mr-2"></span>
			  <span><?php echo htmlspecialchars($paginaname); ?></span>
				  </div>

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
					
					
					</script>
				  
<div class="row" id="powerproof">
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://siberdeyiz.com" target="_blank">Siberdeyiz</a> Shitty Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/siberdeyiz.jpg"><img
                        src="powerproofs/siberdeyiz.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by FluxCDN (HTTP-BYPASS - 2 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://memoryhackers.org" target="_blank">MemoryHackers</a> Shitty Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/memoryhackers.jpg"><img
                        src="powerproofs/memoryhackers.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by CloudFlare (HTTP-REQUEST - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://apathe.net" target="_blank">Apathe</a> Shitty Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/aptalhe3.jpg"><img
                        src="powerproofs/aptalhe3.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by DDoS Guard (Hosting) (HTTP-BYPASS & HTTP-RS - 2 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://spyhackerz.org" target="_blank">Spyhackerz</a> Shitty Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/spyhackerz.jpg"><img
                        src="powerproofs/spyhackerz.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by CloudFlare (HTTP-BYPASS - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://netiyi.com" target="_blank">Netiyi</a> Shitty DDoS Protected Host Downed by RealStresser!</h4>
                <hr><a href="powerproofs/netiyi.jpg"><img
                        src="powerproofs/netiyi.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by Netrix / Wafbone (HTTP-RS - 2 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://eba.gov.tr" target="_blank">EBA</a> Educational Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/ebagovtr.jpg"><img
                        src="powerproofs/ebagovtr.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by TTNET (HTTP-RS + HTTP-DROP - 2 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://root-team.com" target="_blank">Root-Team</a> Shitty Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/root-team.jpg"><img
                        src="powerproofs/root-team.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by CloudFlare (BYPASS v2 - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="http://sibershacker.org/index.php" target="_blank">SibersHacker</a> Shitty Website Downed by RealStresser!</h4>
                <hr><a href="powerproofs/sibershacker.jpg"><img
                        src="powerproofs/sibershacker.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by CloudFlare (UAM) + DorukNet (HTTP-RS - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://stresser.me" target="_blank">Stresser.me</a> Shitty Stresser Downed by RealStresser!</h4>
                <hr><a href="powerproofs/stresserme.jpg"><img
                        src="powerproofs/stresserme.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by Yoncu + CloudFlare (HTTP-FAST - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://tawk.to" target="_blank">Tawk.to</a> Downed by RealStresser!</h4>
                <hr><a href="powerproofs/tawkto.jpg"><img
                        src="powerproofs/tawkto.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by CloudFlare (HTTP-FAST - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
	    <div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><a href="https://skype.com" target="_blank">Skype</a> Downed by RealStresser!</h4>
                <hr><a href="powerproofs/skype.jpg"><img
                        src="powerproofs/skype.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by Microsoft (BYPASS - 2 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
				<h4 style="text-align:center"><a href="https://razer.com" target="_blank">Razer</a> Downed by RealStresser!</h4>
                <hr><a href="powerproofs/razer.jpg"><img
                        src="powerproofs/razer.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by Amazon (HTTP-FAST - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
				<h4 style="text-align:center"><a href="https://tsm.gg" target="_blank">TSM</a> Downed by RealStresser!</h4>
                <hr><a href="powerproofs/tsm.jpg"><img
                        src="powerproofs/tsm.jpg" width="750px" height="500px"></a>
				<hr>
                <h6 style="text-align:center">Protected by CloudFlare (HTTP-FAST - 1 Concurrent)</h6>
            </div>
        </div>
    </div>
            </div>
	</div>
				 
				  <?php
				  

				 
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