<?php
include("@/header.php");
$paginaname = 'Tools';

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
	
	  <script src="../assets/js/spinner.js"></script>

			 <div class="page-wrapper">
			  <div class="page-content">
				  
				  						   <?php 
								if($alert != "")
								{
									Alert($alert);
								}
						 	?>
				  
			<div class="alert alert-fill-primary">	
           		<span data-feather="book" class="icon-md text-light mr-2"></span>
			  	<span><?php echo htmlspecialchars($paginaname); ?></span>
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
				 // successAlert("deneme", "test");
?>
			  <nav class="page-breadcrumb">
					 <div class="row">
                       <div class="col-md-12">
						   
					   						<div id="divall" style="display:none"></div>
						<div id="div" style="display:none"></div>
						   
						<script>
							
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
						function isEmpty(str) {
    						return !str.trim().length;
						}
						function skype()
						{
						var skypeName=$('#skypeName').val();
						document.getElementById("skypediv").style.display="none";
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
							document.getElementById("skypediv").innerHTML=xmlhttp.responseText;
							document.getElementById("skypediv").style.display="inline";
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=skype",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("skypeName=" + skypeName);
						}

						function email2skype()
						{
						var skypeMail=$('#skypeMail').val();
						document.getElementById("mail2skypediv").style.display="none";
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
							document.getElementById("mail2skypediv").innerHTML=xmlhttp.responseText;
							document.getElementById("mail2skypediv").style.display="inline";
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=email2skype",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("skypeMail=" + skypeMail);
						}

						function http()
						{
						var webName=$('#webName').val();
						document.getElementById("dnsbutton").innerHTML='<i class="fas fa-spinner fa-spin"></i> Loading';
						dnsbutton.disabled = true;
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
								sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "info");
								document.getElementById("dnsbutton").innerHTML='<i class="fas fa-search"></i> Resolve';
								dnsbutton.disabled = false;
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=http",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("webName=" + webName);

						}

						function cloudflare()
						{
						var webName=$('#CFwebName').val();
						document.getElementById("cfbutton").innerHTML='<i class="fas fa-spinner fa-spin"></i> Loading';
						cfbutton.disabled = true;
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
								sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "info");
								document.getElementById("cfbutton").innerHTML='<i class="fas fa-search"></i> Resolve';
								cfbutton.disabled = false;
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=cloudflare",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						xmlhttp.send("webName=" + webName);

						}
						
						function geo()
						{
						var geoName=$('#geoName').val();
						document.getElementById("geobutton").innerHTML='<i class="fas fa-spinner fa-spin"></i> Loading';
						geobutton.disabled = true;
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
								sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "info");
								document.getElementById("geobutton").innerHTML='<i class="fas fa-search"></i> Resolve';
								geobutton.disabled = false;
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=geo",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("geoName=" + geoName);

						}
						function db()
						{
						var dbName=$('#dbName').val();
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
							document.getElementById("dbdiv").innerHTML=xmlhttp.responseText;
							document.getElementById("dbdiv").style.display="inline";
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=db",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("dbName=" + dbName);

						}

						function ping()
						{
						var pingName=$('#pingName').val();
						document.getElementById("pingbutton").innerHTML='<i class="fas fa-spinner fa-spin"></i> Loading';
						pingbutton.disabled = true;
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
								sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "info");
								document.getElementById("pingbutton").innerHTML='<i class="fas fa-search"></i> Resolve';
								pingbutton.disabled = false;
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=ping",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("pingIP=" + pingName);

						}
							
						function whois()
						{
						var whoisName=$('#whoisName').val();
						document.getElementById("whoisbutton").innerHTML='<i class="fas fa-spinner fa-spin"></i> Loading';
						whoisbutton.disabled = true;
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
								sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "info");
								document.getElementById("whoisbutton").innerHTML='<i class="fas fa-search"></i> Resolve';
								whoisbutton.disabled = false;
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=whois",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("whoisHost=" + whoisName);

						}

						function proxyExtractor()
						{
						var whoisName=$('#proxyName').val();
						document.getElementById("proxybutton").innerHTML='<i class="fas fa-spinner fa-spin"></i> Loading';
						proxybutton.disabled = true;
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
								sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "info");
								document.getElementById("proxybutton").innerHTML='<i class="fas fa-extract"></i> Extract';
								proxybutton.disabled = false;
							}
						  }
						xmlhttp.open("POST","ajax/tools.php?type=proxyextractor",true);
						xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("proxies=" + whoisName);

						}
						</script>
						   
						  
   </div>
  </div>
                    </nav>
    <div class="row flex-grow">
      	    <div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-cloud"></i> CloudFlare Resolver</h4>
                <hr>
				<input type="text" placeholder="example.com" name="CFwebName" id="CFwebName" class="form-control">
				<hr>
                <button type="submit" onclick="cloudflare()" id="cfbutton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fas fa-search"></i> Resolve</button>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-globe"></i> DNS Resolver</h4>
                <hr>
				<input type="text" placeholder="example.com" name="webName" id="webName" class="form-control">
				<hr>
                <button type="submit" onclick="http()" id="dnsbutton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fas fa-search"></i> Resolve</button>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-wifi"></i> Ping</h4>
                <hr>
				<input type="text" placeholder="example.com / 1.1.1.1" name="pingName" id="pingName" class="form-control">
				<hr>
                <button type="submit" onclick="ping()" id="pingbutton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fas fa-search"></i> Resolve</button>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-globe"></i> Whois</h4>
                <hr>
				<input type="text" placeholder="example.com / 1.1.1.1" name="whoisName" id="whoisName" class="form-control">
				<hr>
                <button type="submit" onclick="whois()" id="whoisbutton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fas fa-search"></i> Resolve</button>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-map-marker"></i> GeoIP</h4>
				<hr>
				<input type="text" placeholder="1.1.1.1" name="geoName" value="<?php echo getRealIpAddr(); ?>" id="geoName" class="form-control">
				<hr>
                <button type="submit" onclick="geo()" id="geobutton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fas fa-search"></i> Resolve</button>
            </div>
        </div>
    </div>
	<div class="col-lg-6 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-extract"></i> Proxy Extractor</h4>
				<hr>
				<input type="text" placeholder="Website" name="proxyName" id="proxyName" class="form-control">
				<hr>
                <button type="submit" onclick="proxyExtractor()" id="proxybutton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fas fa-extract"></i> Extract</button>
            </div>
        </div>
    </div>
								
							</div>
								
							</div>
						</div>
		</div>
					</form>
				  </div>
				</div>

	  


</body>

</html>