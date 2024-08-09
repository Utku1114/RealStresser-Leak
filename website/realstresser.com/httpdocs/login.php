<?php
require '@/config.php';
require '@/init.php';
if ($user -> LoggedIn())
{
header('Location: ./');
}
?>

<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<script src="../assets/js/spinner.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js" integrity="sha512-Bqyq/zbzlB7XpUGEHbmjS5ymk1rgC2/5IFpSiZWl7sM0lLKvzow1OkSZTP2Z/rDfecoaj//urmcs6nEzYQaPCg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" integrity="sha512-3QG6i4RNIYVKJ4nysdP4qo87uoO+vmEzGcEgN68abTpg2usKfuwvaYU+sk08z8k09a0vwflzwyR6agXZ+wgfLA==" crossorigin="anonymous" />
		<script>
			
			
		function sweetAlert(title, message, style)
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
			
		function login()
		{
		var loginButton = document.getElementById('loginButton');
		loginButton.disabled = true;
		document.getElementById("loginButton").innerHTML = 'Loading... <i class="fas fa-spinner fa-spin"></i>';
		var username=$('#loginusername').val();
		var password=$('#loginpassword').val();
		//var captcha=$('#recaptchaxd'.val());
		document.getElementById("logindiv").style.display="none";
		document.getElementById("loginimage").style.display="none";
			loginButton.disabled = true;
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
			document.getElementById("logindiv").innerHTML=xmlhttp.responseText;
			document.getElementById("loginimage").style.display="none";
			document.getElementById("logindiv").style.display="none";
			if (xmlhttp.responseText.search("Redirecting") != -1)
			{
				loginButton.disabled = true;
				document.getElementById("loginButton").innerHTML = 'Logging in... <i class="fas fa-spinner fa-spin"></i>';
				setInterval(function(){window.location="/"},3000);
			}
			else
			{
				grecaptcha.reset();
				loginButton.disabled = false;
				document.getElementById("loginButton").innerHTML = 'Login<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>';
				sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, 'error');
			}
			}
		  }
		xmlhttp.open("POST","ajax/login.php?type=login",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("username=" + username + "&password=" + password + "&g-recaptcha-response=" + grecaptcha.getResponse());
		}
		</script>
<head>
 <title><?php echo htmlspecialchars($sitename); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
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
    
    </head>
</head>

	
<body>
	
	
<script src="../assets/js/spinner.js"></script>
  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">
	  
         <div class="col-md-4 stretch-card" id="loginxdd">
			 	<script>
			var cookiesEnabled=(navigator.cookieEnabled)? true : false;
        	if(!cookiesEnabled){
				loginxdd.style = "display: none;";
				loginxdd.disabled = true;
				//document.removeChild(document.documentElement);
			    document.body.innerHTML = '<div style="position: fixed; top: 50%; left: 50%; margin-top: -100px; margin-left: -200px;"><h4>Please enable cookies!</h4><br><h6>RealStresser Protection</h6></div>';
				document.body.style = 'text-align: center; align: center; float: center;';
				//document.removeChild(document.documentElement);
  				//document.write('<h4>Please enable cookies!</h4><br><h6>RealStresser Protection</h6>');
        	}
	</script>
            <div class="card">
              <div class="card-body">
<div id="login-container">
   <h1 class="display-4 text-center mb-3">Sign in</h1>
  	<div id="logindiv" style="display:none"></div>
	<img id="loginimage" class="spinner-border spinner-border-sm" role="status" style="display:none">
		   <h5 class="text-muted font-weight-normal mb-4">Welcome! Log in to your account.</h5>
	<form class="forms-sample" id="LoginForm">
		<h6 class="card-title">Username</h6>
		<div class="form-group">
			<div class="col-xs-12">
				<input type="text" id="loginusername" class="form-control" placeholder="Your username..">
 			</div>
  		</div>
  		<h6 class="card-title">Password</h6>
 		<div class="form-group">
			<div class="col-xs-12">
 				<input type="password" id="loginpassword" class="form-control" placeholder="Your password..">
  			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12" style="text-align: center;">
				<div id="recaptchaxd" class="g-recaptcha" style="display: inline-block;" data-sitekey="6LftH8EZAAAAAJRxeodIR5htk8y-KXQZSANVMzoG"></div>
			</div>
		</div>
 		<div class="form-group form-actions">
			<div class="col-xs-4 text-center">
				<button type="submit" id="loginButton" class="btn btn-effect-ripple btn-sm btn-primary" onclick="login()">Login<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></button>
 			</div>
  		</div>
	</form>
</div>
    </div>
	<h6  class="text-muted text-center"> Don't have an account yet? <a href="register">Sign up</a>.</h6>
     </div>
    </div>
   </div>    
  </div>
    </div>

  
<!-- base js -->
    <script src="../js/app.js"></script>
    <script src="../assets/plugins/feather-icons/feather.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->

    <!-- common js -->
    <script src="../assets/js/template.js"></script>
    <!-- end common js -->
<script src="js/app.js"></script><script src="js/pages/readyLogin.js"></script>
<script type="text/javascript">
      
</script>

</body>
</html>