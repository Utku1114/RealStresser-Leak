<?php
include("@/header.php");
$paginaname = 'Hub';


?>
<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<script src="../assets/js/spinner.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js" integrity="sha512-Bqyq/zbzlB7XpUGEHbmjS5ymk1rgC2/5IFpSiZWl7sM0lLKvzow1OkSZTP2Z/rDfecoaj//urmcs6nEzYQaPCg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" integrity="sha512-3QG6i4RNIYVKJ4nysdP4qo87uoO+vmEzGcEgN68abTpg2usKfuwvaYU+sk08z8k09a0vwflzwyR6agXZ+wgfLA==" crossorigin="anonymous" />
<?php
$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
$plansql -> execute(array(":id" => $_SESSION['ID']));
$rowxd = $plansql -> fetch();
$name = $getInfo['name'];									
$date = date("d/m/Y, h:i a", $rowxd['expire']);	
$premiumMethodsFree = 1;
?>
	
	  <script src="../assets/js/spinner.js"></script>

			 <div class="page-wrapper">
			  <div class="page-content">
				  
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
<script>
	//document.getElementById("attacksimage").style.display="none"; 
	//document.getElementById("image").style.display="none";
	
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

					function start()
					{
					launch.disabled = true;
					document.getElementById("launch").innerHTML = 'Please wait... <i class="fas fa-spinner fa-spin"></i>';
					var host=$('#host').val();
					var port= "80";
					var reqtype = $('#reqtype').val();
					var time=$('#time').val();
					var method=$('#method').val();
					document.getElementById("div").style.display="none"; 
					document.getElementById("image").style.display="inline"; 
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
						launch.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="none";
						if (xmlhttp.responseText.search("success") != -1)
						{
							document.getElementById("launch").innerHTML = 'Launch Attack <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>';
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "success");
							attacks();
							window.setInterval(ping(host),10000);
						}
						{
							document.getElementById("launch").innerHTML = 'Launch Attack <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>';
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "error");
						}
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=start" + "&host=" + host + "&port=" + port + "&reqtype=" + reqtype + "&time=" + time + "&method=" + method,true);
					xmlhttp.send();
					}			

					function renew(id)
					{
					rere.disabled = true;
					document.getElementById("div").style.display="none";
					document.getElementById("image").style.display="inline"; 
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
						rere.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none"; 
						document.getElementById("div").style.display="none";
						if (xmlhttp.responseText.search("success") != -1)
						{
						attacks();
						window.setInterval(ping(host),10000);
						}
						{
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "error");
						}
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=renew" + "&id=" + id,true);
					xmlhttp.send();
					}

					function stop(id)
					{
					st.disabled = true;
					document.getElementById("div").style.display="none";
					document.getElementById("image").style.display="inline"; 
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
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "success");
							attacks();
							window.setInterval(ping(host),10000);
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=stop" + "&id=" + id,true);
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
					xmlhttp.open("GET","ajax/hub.php?type=attacks",true);
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
					xmlhttp.open("GET","ajax/hub.php?type=adminattacks",true);
					xmlhttp.send();
					}
	
					$('select').change(function() {
    				var selected = $(':selected', this);
					var selectedx = selected.closest('optgroup').attr('label');

				});
					</script>
			  <nav class="page-breadcrumb">
					 <div class="row">
                       <div class="col-md-12">
						   
					   						<div id="divall" style="display:none"></div>
						<div id="div" style="display:none"></div>
						   <?php 
								if($alert != "")
								{
									Alert($alert);
								}
						 	?>
						   						  
								          <?php
											if (!$user->hasMembership($odb))
											{
												echo error('You not have an active membership <a href="plans.php">Purchase</a> now! <img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>');
											}
                                            
											else
												
											{ 
												if($rowxd['Premium'] == 0)
													echo '<div class="alert alert-fill-primary" role="alert">
													  	  <td>🌟 NOTICE: Methods are currently free!</td>
													      <img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>
													  	  </div>';
												else
													echo '
													      <img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>
													  	  ';
											}										
											?>
											
   </div>
  </div>
                    </nav>
    <div class="row flex-grow">
      <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
									<div class="form-group">
									<label class="col-md-3 control-label">Host</label>
									<div class="col-md-12">
									<input type="text" id="host" placeholder="https://example.com" class="form-control">
									<span class="help-block">IP Address/Website</span>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label">Request Type</label>
									<div class="col-md-12">
									<select class="form-control" id="reqtype">
										<option value="GET">GET</option>
										<option value="POST">POST</option>
									</select>
									<span class="help-block">Default: GET</span>
									</div>
									</div>
									<!--<div class="form-group">
									<label class="col-md-3 control-label">Post Data (Optional)</label>
									<div class="col-md-12">
									<input type="text" id="postdata" placeholder="username=test&password=test (Post request only)" class="form-control">
									</div>
									</div>!-->
									<?php
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
									<div class="form-group">
									<label class="col-md-3 control-label">Time</label>
									<div class="col-md-12">
									<input type="text" id="time" value="<?php echo $rowxd['mbt']; ?>" class="form-control">
									<span class="help-block">Your max time is <?php echo $rowxd['mbt']; ?> seconds</span>
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label">Method</label>
									<div class="col-md-12">
									<select class="form-control" id="method">

									<optgroup label="Low Protection">
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '4' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									
									<optgroup label="High Protection">
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '5' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									<?php
									$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt`, `users`.`Premium` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
									$plansql -> execute(array(":id" => $_SESSION['ID']));
									$rowxd = $plansql -> fetch();
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '6' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) 
										if($rowxd['Premium'] == 1)
										{
											echo '<optgroup label="Premium Methods">';
											$name     = $getInfo['name'];
											$fullname = $getInfo['fullname'];
											echo '<option class="text-warning" value="' . $name . '">' . $fullname . '</option>';
											echo '</optgroup>';
										}
										else if ($user->hasMembership($odb)) //PREMIUM METHODLARIN FREE'YE KAPATILMASI İÇİN // KOY!
										{
											if($premiumMethodsFree != 0)
											{
												echo '<optgroup label="Premium Methods [Currently FREE!]">';
												$name     = $getInfo['name'];
												$fullname = $getInfo['fullname'];
												echo '<option class="text-warning" value="' . $name . '">' . $fullname .' (FREE)'. '</option>';
												echo '</optgroup>';
											}
										}
									?>
									
									</select>
									</div>
									</div>
                <div class="form-group form-actions">
               <div class="col-xs-2 text-center">
             <button type="button" id="launch" onclick="start()"  class="btn btn-effect-ripple btn-sm btn-primary" >Launch Attack<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></button>
                 </div>
				   </div>
				    </div>
					 </div>
	               <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                 <div class="card-body">
              <span <?php if ($user -> isAdmin($odb)) {echo 'class="tip" onclick="adminattacks()" title="Click for admin mode" style="cursor:pointer"';} ?>><i  data-feather="sliders"></i></span> <img id="attacksimage" class="spinner-border text-danger" style="display:none"/>
				</div>
				<div style="position: relative; width: auto" class="slimScrollDiv">
			   <div id="attacksdiv" style="display:inline-block;width:100%"></div>										
			    </div>
				  </div>
                    </div>
                       </div>
					    </div>
<?php include("@/footer.php"); ?>					   

	  


</body>

</html>