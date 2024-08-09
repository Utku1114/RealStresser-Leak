<?php

require_once('ajax/CSRF.php');
$CSRF = new CSRF();
echo '<input type="hidden" id="__csrf" name="__csrf" value="'.$CSRF->getToken().'"/>';

include("@/header.php");
$paginaname = 'Attack Hub';
?>
<!DOCTYPE html>

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

<html>
	<head>
		<title><?php $title = htmlspecialchars($sitename); echo ($title); ?> <?php echo " - "; echo($paginaname); ?></title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<script src="../assets/js/spinner.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js" integrity="sha512-Bqyq/zbzlB7XpUGEHbmjS5ymk1rgC2/5IFpSiZWl7sM0lLKvzow1OkSZTP2Z/rDfecoaj//urmcs6nEzYQaPCg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" integrity="sha512-3QG6i4RNIYVKJ4nysdP4qo87uoO+vmEzGcEgN68abTpg2usKfuwvaYU+sk08z8k09a0vwflzwyR6agXZ+wgfLA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	</head>
	<body>
<?php
$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
$plansql -> execute(array(":id" => $_SESSION['ID']));
$rowxd = $plansql -> fetch();
$name = $getInfo['name'];									
$date = date("d/m/Y, h:i a", $rowxd['expire']);	
		$freePremiumMethods = 0;
		if(isMobile() == true) //Mobile
		{
			//die("Mobile!");
		}
?>
	
			 <div class="page-wrapper">
			  <div class="page-content">
				  
				  						   <?php 
								if($alert != "")
								{
									Alert($alert);
								}
						 	?>
				  
				  
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
				 // successAlert("deneme", "test");
?>
			  <nav class="page-breadcrumb">
					 <div class="row">
                       <div class="col-md-12">
					   						<div id="divall" style="display:none"></div>
						<div id="div" style="display:none"></div>
						   <script>
							   var csrfToken = $('#__csrf').val();
							   //console.log(csrfToken);
							   function sweetAlert(title, message, style)
					{
						Swal.fire(
						  title,
						  message,
						  style
						);
						$(".swal2-success-circular-line-left").css('background-color', 'transparent');
						$(".swal2-success-circular-line-right").css('background-color', 'transparent');
						$(".swal2-success-fix").css('background-color', 'transparent');
					}	
//LAYER 4
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("attacksdiv").innerHTML=xmlhttp.responseText;
						eval(document.getElementById("ajax").innerHTML);
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=attacks",true);
					xmlhttp.send();
	
					function start() //LAYER4
					{
					hit.disabled = true;
					document.getElementById("hit").innerHTML = '<i class="fas fa-spinner fa-spin"></i> Please wait...';
					var host=$('#host').val();
					var port= $('#port').val();
					var time=$('#time').val();
					var method=$('#method').val();
					document.getElementById("div").style.display="none"; 
					document.getElementById("image").style.display="none"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						hit.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="none";
						if (xmlhttp.responseText.search("success") != -1)
						{
							document.getElementById("hit").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "success");
							attacks();
							window.setInterval(ping(host),10000);
						}
						{
							document.getElementById("hit").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "error");
						}
						}
					  }
					if(host.includes("/") || host.includes(":") || host.includes("com") || host.includes("c") || host.includes("o") || host.includes("t") || host.includes("p") || host.includes("s"))
					{
						hit.disabled = false;
						document.getElementById("hit").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
						attackResult.innerHTML = "<?php echo error("Host is not a valid IPv4.");?>";
					}
					else
					{
						xmlhttp.open("GET","ajax/hub.php?type=start" + "&host=" + host + "&port=" + port + "&time=" + time + "&method=" + method, true);
						xmlhttp.send();
					}
					}			
						
					function stop(id)
					{
					st.disabled = true;
					document.getElementById("div").style.display="none";
					document.getElementById("image").style.display="none"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							st.disabled = false;
							document.getElementById("div").innerHTML=xmlhttp.responseText;
							document.getElementById("image").style.display="none";
							document.getElementById("div").style.display="none";
							attackResult.innerHTML = xmlhttp.responseText;
							attacks();
							//window.setInterval(ping(host),10000);
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=stop" + "&id=" + id,true);
					xmlhttp.send();
					}

					function start2() //LAYER7
					{
					hit2.disabled = true;
					document.getElementById("hit2").innerHTML = '<i class="fas fa-spinner fa-spin"></i> Please wait...';
					var host=$('#host2').val();
					var port= "80";
					var reqtype = $('#reqtype').val();
					var time=$('#time2').val();
					var method=$('#method2').val();
					document.getElementById("div").style.display="none"; 
					document.getElementById("image").style.display="none"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						hit2.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="none";
						if (xmlhttp.responseText.search("success") != -1)
						{
							document.getElementById("hit2").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							attackResult.innerHTML = xmlhttp.responseText;
							//setTimeout(function(){
							//	location.reload();
    						//}, 800);
							attacks();
							//window.setInterval(ping(host),10000);
						}
						{
							document.getElementById("hit2").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							attackResult.innerHTML = xmlhttp.responseText;
							//setTimeout(function(){
							//	location.reload();
    						//}, 800);
						}
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=start" + "&host=" + host + "&port=" + port + "&reqtype=" + reqtype + "&time=" + time + "&method=" + method + "&csrf=" + csrfToken,true);
					xmlhttp.send();
					}			

					function stop2(id)
					{
					st.disabled = true;
					document.getElementById("div").style.display="none";
					document.getElementById("image").style.display="none"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							st.disabled = false;
							document.getElementById("div").innerHTML=xmlhttp.responseText;
							document.getElementById("image").style.display="none";
							document.getElementById("div").style.display="none";
							attackResult.innerHTML = xmlhttp.responseText;
							//setTimeout(function(){
							//	location.reload();
    						//}, 800);
							attacks();
							//window.setInterval(ping(host),10000);
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=stop" + "&id=" + id + "&csrf=" + csrfToken, true);
					xmlhttp.send();
					}
							   
					function start3() //MINECRAFT
					{
					hit3.disabled = true;
					document.getElementById("hit3").innerHTML = '<i class="fas fa-spinner fa-spin"></i> Please wait...';
					var host=$('#host3').val();
					var port= "25565";
					var version = $('#version').val();
					var time=$('#time3').val();
					var method=$('#method3').val();
					document.getElementById("div").style.display="none"; 
					document.getElementById("image").style.display="none"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						hit3.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="none";
						if (xmlhttp.responseText.search("success") != -1)
						{
							document.getElementById("hit3").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							attackResult.innerHTML = xmlhttp.responseText;
							//setTimeout(function(){
							//	location.reload();
    						//}, 800);
							attacks();
							window.setInterval(ping(host),10000);
						}
						{
							document.getElementById("hit3").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							attackResult.innerHTML = xmlhttp.responseText;
							//setTimeout(function(){
							//	location.reload();
    						//}, 800);
						}
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=start" + "&host=" + host + "&port=" + port + "&version=" + version + "&time=" + time + "&method=" + method + "&csrf=" + csrfToken,true);
					xmlhttp.send();
					}			

					function attacks()
					{
					document.getElementById("attacksdiv").style.display="none";
					document.getElementById("attacksimage").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("attacksdiv").innerHTML=xmlhttp.responseText;
						document.getElementById("attacksimage").style.display="none";
						document.getElementById("attacksdiv").style.display="inline-block";
						document.getElementById("attacksdiv").style.width="100%";
						eval(document.getElementById("ajax").innerHTML);
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=attacks" + "&csrf=" + csrfToken, true);
					xmlhttp.send();
					}

					function adminattacks()
					{
					document.getElementById("attacksdiv").style.display="none";
					document.getElementById("attacksimage").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("attacksdiv").innerHTML=xmlhttp.responseText;
						document.getElementById("attacksimage").style.display="none";
						document.getElementById("attacksdiv").style.display="inline-block";
						document.getElementById("attacksdiv").style.width="100%";
						eval(document.getElementById("ajax").innerHTML);
						}
						
					  }
					xmlhttp.open("GET","ajax/hub.php?type=adminattacks" + "&csrf=" + csrfToken, true);
					xmlhttp.send();
					}
	
					function selected(sel) {
						var postDataForm = document.getElementById("postdataForm");
					  	var selectedx = sel.options[sel.selectedIndex].text;
						//console.log(selectedx);
						if(selectedx != "POST")
						{
							postDataForm.style.display = "none";
						}
						if(selectedx == "POST")
						{
							postDataForm.style.display = "inline";
						}
					}
						   </script>
						   						   						  
								          <?php
											if (!$user->hasMembership($odb))
											{
												//echo error('You not have an active membership <a href="plans.php">Purchase</a> now! <img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>');
											}
                                            
											else
												
											{ 
												if($rowxd['premium'] == 0 && $freePremiumMethods != 0)
													echo '<div class="alert alert-fill-primary" role="alert">
													  	  <td>🌟 NOTICE: Methods are currently free!</td>
													      <img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>
													  	  </div>';
												else
													echo '
													      <img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>
													  	  ';
											}
						   
						   									$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
									$plansql -> execute(array(":id" => $_SESSION['ID']));
									$rowxd = $plansql -> fetch(); 
									$date = date("d/m/Y, h:i a", $rowxd['expire']);
									if (!$user->hasMembership($odb))
									{
									$rowxd['mbt'] = 0;
									$rowxd['concurrents'] = 0;
									$rowxd['name'] = 'No membership';
									$date = 'No membership';
									}
											?>
						   			<div class="alert alert-fill-primary">	
           		<span data-feather="zap" class="icon-md text-light mr-2"></span>
			  	<span><?php echo htmlspecialchars($paginaname); ?></span>
			</div>
						   
				<div class="row mt-2">
					<div class="col-lg-12 col-md-12" style="text-align:center; font-size:22px; font-weight: bold;"><u id="attackResult" style="display: inline;"><span style="color: green;"></span></u></div>
				</div>
						   <!--<div id="attackResult" style="text-align: center; float: center; margin: auto;">Test</div>-->
						   
   </div>
  </div>
                    </nav>
    <div class="row flex-grow">
      <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <!--<li class="nav-item">
                    <a href="javascript:void();" data-target="#l4" data-toggle="pill" class="nav-link active"><i class="fa fa-wifi"></i> <span class="hidden-xs">Layer 4</span></a>
                </li>-->
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#l7" data-toggle="pill" class="nav-link active"><i class="fa fa-globe"></i> <span class="hidden-xs">Layer 7</span></a>
                </li>
				<li class="nav-item">
                    <a href="javascript:void();" data-target="#mc" data-toggle="pill" class="nav-link"><i class="fa fa-server"></i> <span class="hidden-xs">Minecraft</span></a>
                </li>
            </ul>
            <div class="tab-content">
                 <div class="tab-pane" id="l4">
                    <form class="form-horizontal" method="post" onsubmit="return false;">
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <div class="form-material floating">
		   	        				<label for="host"><i class="fa fa-terminal"></i> Host</label>
                                          <input type="text" class="form-control" id="host" name="host" placeholder="0.0.0.0">
                                          
                                      </div>
                                  </div>
                              </div>
							  
        
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <div class="form-material floating">
		   	        				        <label for="port"><i class="fab fa-megaport"></i> Port</label>
		   	        				        <input type="text" class="form-control" maxlength="5" id="port" name="port" value="80">
                                      </div>
                                  </div>
                              </div>  
        
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <div class="form-material floating">
                                          <label for="port"><i class="fad fa-project-diagram"></i> Common Ports</label>
                                       	<div class="input-group-append">
                                       		<select class="form-control" id="basic-select" onchange="document.getElementById('port').value = this.value;">
                                       			<option disabled="" style="color:#02cc0c;">Commonly Used</option>
                                       			<option value="80">HOME CONNECTION</option>
                                       			<option value="8080">HOME CONNECTION-2</option>
                                       			<option value="443">HTTPS</option>
                                       			<option value="53">DNS SERVERS</option>
                                       			<option value="1723">PPTP</option>
                                       			<option value="3306">MySQL Database</option>
                                       			<option value="21">FTP Server (File Transfer)</option>
                                       			<option value="22">SSH Server (Remote Login)</option>
                                       			<option value="25">SMTP Server (Email)</option>
                                       			<option value="118">SQL Servers (Database)</option>
                                       			<option disabled="" style="color:#048de8;">Game Servers</option>
                                       			<option value="25565">Minecraft Server</option>
                                       			<option value="27015">Counter-Strike Server</option>
                                       			<option value="6672">GTAV</option>
                                       			<option value="61455">GTAV-2</option>
                                       			<option value="61457">GTAV-3</option>
                                       			<option value="61456">GTAV-4</option>
                                       			<option value="61458">GTAV-4</option>
                                       			<option value="3478">PSN</option>
                                       			<option value="3479">PSN-2</option>
                                       			<option value="3480">PSN-3</option>
                                       			<option value="5223">PSN-4</option>
                                       			<option disabled="" style="color:red;">Additional</option>
                                       			<option value="434">Mobile Internet (Agent)</option>
                                       			<option value="435">Mobile Internet (Manager)</option>
                                       			<option value="1433">Microsoft SQL Server</option>
                                       			<option value="5355">NFO VPNS</option>
                                       			<option value="7777">VPNS / NFO VPNS</option>
                                       			<option value="1194">OPEN VPN</option>
                                       			<option value="5555">SOFTETHER VPNS</option>
                                       		</select>
                                       	</div>
                                      </div>
                                  </div>
                              </div>                       
        
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <div class="form-material floating">
		   	        				<label for="time"><i class="fa fa-clock"></i> Time</label>
                                          <input type="number" class="form-control" id="time" name="time" value="<?php echo $rowxd['mbt']; ?>">
                                      </div>
                                  </div>
                              </div>
                             <div class="col-lg-12">
                               <div class="form-group">
                                  <div>
                                       <label for="method"><i class="fa fa-rss"></i> Method</label>
									  <select class="form-control" id="method">
										  
									<optgroup label="Free Methods">
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '1' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									
								
										<?php
										$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
										$plansql -> execute(array(":id" => $_SESSION['ID']));
										$rowxd = $plansql -> fetch();
										$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '2' ORDER BY `id` ASC");
										?> 
									<optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Normal Methods"> 
										<?php
										while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											}
											else
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-gray" value="' . $name . '">' . $fullname . '</option>';
											}
										}
										//echo '</optgroup>';
										?>
									</optgroup>
										  
										<?php
										$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
										$plansql -> execute(array(":id" => $_SESSION['ID']));
										$rowxd = $plansql -> fetch();
										$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '3' ORDER BY `id` ASC");
										?> 
									<optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Premium Methods"> 
										<?php
										while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											}
											else
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-gray" value="' . $name . '">' . $fullname . '</option>';
											}
										}
										//echo '</optgroup>';
										?>
									</optgroup>
									</select>
                                </div>
		                    </div>
		   	        	<center>
		   	        		<div class="col-xs-12">
		   	        		    <div class="form-group m-b-0">
		   	        				<button class="btn btn-primary btn-sm btn-block waves-effect waves-light m-1" onclick="start()" id="hit" type="button"> <i class="fa fa-bolt"></i> SEND ATTACK</button>
		   	        			</div>
		   	        		</div>
		   	        	</center>
                      
		            </div>
	            </div></form>
				</div>
                <div class="tab-pane active" id="l7">
                    <form class="form-horizontal" method="post" onsubmit="return false;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-material floating">
		   	          		        	<label for="host2"><i class="fa fa-terminal"></i> Host</label>
                                        <input type="text" class="form-control" id="host2" name="host2" placeholder="https://example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-material floating">
		   	          		        	<label for="reqtype"><i class="fas fa-bullseye"></i> Request Type</label>
                                        <select class="form-control" id="reqtype" onChange="selected(this);">
											<option value="GET">GET</option>
											<option value="POST">POST</option>
										</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="postdataForm" style="display:none">
                                <div class="form-group">
                                    <div class="form-material floating">
		   	          		        	<label for="postdata">Post Data (Optional)</label>
                                        <input type="text" class="form-control" id="postdata" name="postdata" placeholder="username=test&password=test">
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-material floating">
		   	          		        	<label for="cookie"><i class="fas fa-cookie"></i> Cookie (Optional)</label>
                                        <input type="text" class="form-control" id="cookie" name="cookie" placeholder="PHPSESSID=abc123">
                                    </div>
                                </div>
                            </div>
														<div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-material floating">
		   	          	    	    <label for="origin"><i class="fas fa-browser"></i> Origin</label>
										<select name="origin" id="origin">
                                       <optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Origin"> 
										<?php
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												echo '
												<option value="ALL">➔ ALL</option>
										   		<option value="US">➔ UNITED STATES</option>												
										   		<option value="CN">➔ CHINA</option>
										   		<option value="RU">➔ RUSSIA</option>
										   		<option value="FR">➔ FRANCE</option>
										   		<option value="TR">➔ TURKEY</option>
										   		<option value="SG">➔ SINGAPORE</option>
												';
										   	}
											else
											{
												echo '
												<option class="text-gray" value="ALL">➔ ALL</option>
										   		<option class="text-gray" value="US">➔ UNITED STATES</option>												
										   		<option class="text-gray" value="CN">➔ CHINA</option>
										   		<option class="text-gray" value="RU">➔ RUSSIA</option>
										   		<option class="text-gray" value="FR">➔ FRANCE</option>
										   		<option class="text-gray" value="TR">➔ TURKEY</option>
										   		<option class="text-gray" value="SG">➔ SINGAPORE</option>
												';
											}
										//echo '</optgroup>';
										?>
									</optgroup>
										</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-material floating">
		   	          	    	    <label for="time2"><i class="fa fa-clock"></i> Time</label>
                                        <input type="number" class="form-control" id="time2" name="time2" value="<?php echo $rowxd['mbt']; ?>">
                                    </div>
                                </div>
                            </div>

                         <div class="col-lg-12">
                             <div class="form-group">
                                <div>
                                     <label for="method2"><i class="fa fa-rss"></i> Method</label>
<select class="form-control" id="method2" name="method2">

									<optgroup label="Free Methods">
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '4' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									
								
										<?php
										$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
										$plansql -> execute(array(":id" => $_SESSION['ID']));
										$rowxd = $plansql -> fetch();
										$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '5' ORDER BY `id` ASC");
										?> 
									<optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Normal Methods"> 
										<?php
										while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											}
											else
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-gray" value="' . $name . '">' . $fullname . '</option>';
											}
										}
										//echo '</optgroup>';
										?>
									</optgroup>
										<?php
										$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
										$plansql -> execute(array(":id" => $_SESSION['ID']));
										$rowxd = $plansql -> fetch();
										$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '6' ORDER BY `id` ASC");
										?> 
									<optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Premium Methods"> 
										<?php
										while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											}
											else
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-gray" value="' . $name . '">' . $fullname . '</option>';
											}
										}
										//echo '</optgroup>';
										?>
									</optgroup>
									</select>
                                </div>
                            </div>
		                  </div>

		   	        	<div class="col-lg-12">
		   	        		<div class="form-group m-b-0">
		   	        			<button class="btn btn-primary btn-sm btn-block waves-effect waves-light m-1" onclick="start2()" id="hit2" type="button"><i class="fa fa-bolt"></i> SEND ATTACK</button>
		   	        		</div>
		   	        	</div>
		                
		              </div>
		            </form></div>
				
				<!-- MINECRAFT -->
				<div class="tab-pane" id="mc">
                    <form class="form-horizontal" method="post" onsubmit="return false;">
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <div class="form-material floating">
		   	        				<label for="host3"><i class="fa fa-terminal"></i> Host</label>
                                          <input type="text" class="form-control" id="host3" name="host3" placeholder="0.0.0.0">
                                          
                                      </div>
                                  </div>
                              </div>
							  
        
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <div class="form-material floating">
		   	        				        <label for="port3"><i class="fab fa-megaport"></i> Port</label>
		   	        				        <input type="text" class="form-control" maxlength="5" id="port3" name="port3" value="25565">
                                      </div>
                                  </div>
                              </div>  
							  
        
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <div class="form-material floating">
                                          <label for="version"><i class="fad fa-project-diagram"></i> Version</label>
                                       	<div class="input-group-append">
                                       		<select id="version" class="form-control" id="basic-select" onchange="">
                                       			<option disabled="" style="color:#02cc0c;">Select target's server version!</option>
                                       			<option value="1.16.4">1.16.4</option>
                                       			<option value="1.16.3">1.16.3</option>
                                       			<option value="1.16.2">1.16.2</option>
                                       			<option value="1.16.1">1.16.1</option>
                                       			<option value="1.16">1.16</option>
                                       			<option value="1.15.2">1.15.2</option>
                                       			<option value="1.15.1">1.15.1</option>
                                       			<option value="1.15">1.15</option>
                                       			<option value="1.14.4">1.14.4</option>
                                       			<option value="1.14.3">1.14.3</option>
												<option value="1.14.2">1.14.2</option>
												<option value="1.14.1">1.14.1</option>
												<option value="1.14">1.14</option>
												<option value="1.13.2">1.13.2</option>
												<option value="1.13.1">1.13.1</option>
												<option value="1.12.2">1.12.2</option>
												<option value="1.12.1">1.12.1</option>
												<option value="1.12">1.12</option>
												<option value="1.11.2">1.11.2</option>
												<option value="1.11.1">1.11.1</option>
												<option value="1.11">1.11</option>
												<option value="1.10.2">1.10.2</option>
												<option value="1.10.1">1.10.1</option>
												<option value="1.10">1.10</option>
												<option value="1.9.4">1.9.3 - 1.9.4</option>
												<option value="1.9.2">1.9.2</option>
												<option value="1.9.1">1.9.1</option>
												<option value="1.9">1.9</option>
												<option value="1.8.8">1.8.8 - 1.8.9</option>
												<option value="1.8">1.8</option>
												<option value="1.7.6">1.7.6 - 1.7.10</option>
												<option value="1.7.2">1.7.2 - 1.7.5</option>
												<option value="1.5.2">1.5.2</option>
                                       		</select>
                                       	</div>
                                      </div>
                                  </div>
                              </div>                       
        
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <div class="form-material floating">
		   	        				<label for="time3"><i class="fa fa-clock"></i> Time</label>
                                          <input type="number" class="form-control" id="time3" name="time3" value="<?php echo $rowxd['mbt']; ?>">
                                      </div>
                                  </div>
                              </div>
                             <div class="col-lg-12">
                               <div class="form-group">
                                  <div>
                                       <label for="method3"><i class="fa fa-rss"></i> Method</label>
									  <select class="form-control" id="method3">
										  
									<optgroup label="Free Methods">
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '7' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									
								
										<?php
										$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
										$plansql -> execute(array(":id" => $_SESSION['ID']));
										$rowxd = $plansql -> fetch();
										$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '8' ORDER BY `id` ASC");
										?> 
									<optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Normal Methods"> 
										<?php
										while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											}
											else
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-gray" value="' . $name . '">' . $fullname . '</option>';
											}
										}
										//echo '</optgroup>';
										?>
									</optgroup>
										  
										<?php
										$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `plans`.`premium`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
										$plansql -> execute(array(":id" => $_SESSION['ID']));
										$rowxd = $plansql -> fetch();
										$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '9' ORDER BY `id` ASC");
										?> 
									<optgroup <?php if($rowxd['premium'] == 0 && $freePremiumMethods == 0) echo "disabled style='color:red;'"; ?> label="Premium Methods"> 
										<?php
										while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
											if($rowxd['premium'] == 1 || $freePremiumMethods != 0)
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											}
											else
											{
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-gray" value="' . $name . '">' . $fullname . '</option>';
											}
										}
										//echo '</optgroup>';
										?>
									</optgroup>
									</select>
                                </div>
		                    </div>
		   	        	<center>
		   	        		<div class="col-xs-12">
		   	        		    <div class="form-group m-b-0">
		   	        				<button class="btn btn-primary btn-sm btn-block waves-effect waves-light m-1" onclick="start3()" id="hit3" type="button"> <i class="fa fa-bolt"></i> SEND ATTACK</button>
		   	        			</div>
		   	        		</div>
		   	        	</center>
                      
		            </div>
	            </div></form>
				</div>
                </div>
        </div>
				</div>
					 </div>
		</div>
				  	               <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                 <div class="card-body">
              <span <?php if ($user -> isAdmin($odb)) {echo 'class="tip" onclick="adminattacks()" title="Click for admin mode" style="cursor:pointer"';} ?>><i  data-feather="sliders"></i></span> Manage Attacks <img id="attacksimage" class="spinner-border text-danger" style="display:none"/>
				</div>
				<div style="position: relative; width: auto;" class="slimScrollDiv">
			   <div id="attacksdiv" style="display:inline-block; width:100%;"></div>										
			    </div>
				  </div>
                    </div>
				  </div>
<?php include("@/footer.php"); ?>					   

	  


</body>

</html>