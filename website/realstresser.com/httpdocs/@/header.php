<?php 
error_reporting(0);
//if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}
session_start(); 
ob_start();
require_once '@/config.php';
require_once '@/init.php';
if (!(empty($maintaince))) {
die($maintaince);
}
if (!($user -> LoggedIn()) || !($user -> notBanned($odb)))
{
	header('location: welcome');
	die();
}


$SQL = $odb -> prepare("UPDATE `users` SET `membership`='0' WHERE `membership`='0'");
$SQL -> execute(array(':id' => $id));
$update = true;

$SQL = $odb -> prepare("UPDATE `users` SET `expire`='0' WHERE `expire`='0'");
$SQL -> execute(array(':id' => $id));
$update = true;




?>


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo htmlspecialchars($description) ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="favicon/favicon.ico">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">
  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
  <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->
   <link media="all" type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="css/app.css">
  <!-- end common css -->
   
  <!-- base js -->
    <script src="js/app.js"></script>
    <script src="assets/plugins/feather-icons/feather.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
  <script src="assets/plugins/chartjs/Chart.min.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.js"></script>
  <script src="assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
  <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="assets/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="assets/js/template.js"></script>
    <!-- end common js -->

      <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/datepicker.js"></script>
<!--End of Tawk.to Script-->
    </head>
<style>
	::-webkit-scrollbar {
    	width: 15px;
	}
	::-webkit-scrollbar-track {
    	background: transparent;
	}
	::-webkit-scrollbar-thumb {
    	background: #727cf5;
	}
	::selection {
    	background: #54a5d4;
    	text-shadow: 1px 1px 2px #000 aa;
    	color: #fff;
	}
</style>
    <body>
      <nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <ul class="navbar-nav">
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../assets/images/faces/astronaut.png" alt="profile">
		            <div class="indicator">
            <div class="circle"></div>
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="../assets/images/faces/astronaut.png" alt=<?php echo $_SESSION['username'] ?>>
				<div class="info text-center">
              		<p class="name font-weight-bold mb-0"><?php echo $_SESSION['username']; ?></p>
            	</div>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="settings" class="nav-link">
                  <i data-feather="settings"></i>
                  <span>Settings</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
  <script src="assets/js/spinner.js"></script>
  <div class="main-wrapper" id="app">
    <nav class="sidebar">
  <div class="sidebar-header">
    <a href="./" class="sidebar-brand" >
		<?php echo "<i class='fa fa-wifi'></i>" ?>
    	<?php echo htmlspecialchars($sitename); ?>
    </a>	
  </div>
  <div class="sidebar-body">
    <ul class="nav">
	<button type="button" class="btn btn-primary" disabled><i class="link-icon" style="width: 30px; height: 18px;" data-feather="credit-card"></i>User ID: <?php echo $_SESSION['ID']; ?></button>
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="./" class="nav-link">
          <i class="link-icon" data-feather="airplay"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Upgrade</li>
      <li class="nav-item ">
        <a href="plans" class="nav-link">
          <i class="link-icon" data-feather="shopping-cart"></i>
          <span class="link-title">Purchase</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="addons" class="nav-link">
          <i class="link-icon" data-feather="gift"></i>
          <span class="link-title">Addons</span>
        </a>
      </li>
      <li class="nav-item nav-category">Hub</li>
       <li class="nav-item ">
        <a href="hub" class="nav-link">
          <i class="link-icon" data-feather="zap"></i>
          <span class="link-title">Attack Hub</span>
        </a>
      </li>
	  <li class="nav-item ">
        <a href="tools" class="nav-link">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Tools</span>
        </a>
      </li>
       <!--<li class="nav-item ">
        <a href="hubl4" class="nav-link">
          <i class="link-icon" data-feather="wifi-off"></i>
          <span class="link-title">Hub Layer 4 (IPv4)</span>
        </a>
      </li>
	       <li class="nav-item ">
        <a href="hubl7" class="nav-link">
          <i class="link-icon" data-feather="wifi-off"></i>
          <span class="link-title">Hub Layer 7 (WEB)
		  </span>
        </a>
      </li>-->
      <li class="nav-item nav-category">Others</li>
      <li class="nav-item ">     
      <li class="nav-item ">
        <a href="faq" class="nav-link">
          <i class="link-icon" data-feather="book-open"></i>
          <span class="link-title">Methods Explain</span>
        </a>
      </li>
	  <li class="nav-item ">
        <a href="powerproof" class="nav-link">
          <i class="link-icon" data-feather="camera"></i>
          <span class="link-title">Power Proof</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="monitoring" class="nav-link">
          <i class="link-icon" data-feather="server"></i>
          <span class="link-title">Monitoring</span>
        </a>
      </li>
       <li class="nav-item ">
        <a href="api" class="nav-link">
          <i class="link-icon" data-feather="code"></i>
          <span class="link-title">API</span>
        </a>
      </li>
		

	
<li class="nav-item ">
        <a href="settings" class="nav-link">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Settings</span>
        </a>
      </li>
	

	



	
	  <li class="nav-item nav-category">Contact</li>
	  <li class="nav-item ">
        <a href="https://t.me/realstresser" class="nav-link">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Telegram</span>
        </a>
      </li>
	  <li class="nav-item ">
        <a href="https://discord.gg/JkHQsfgGTF" class="nav-link">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Discord</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="javascript:Tawk_API.toggle();" class="nav-link">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Live Support</span>
        </a>
      </li>
								  
   
      						<?php
						if ($user -> isAdmin($odb)) {
						echo '<li class="nav-item nav-category">Admin
						<li class="nav-item ">
                              <a href="admin/" class="nav-link">
                              <i class="link-icon" data-feather="settings"></i>
                              <span class="link-title">Admin Manager</span>
                             </a>
							</li>';
						}
								  
								  
						?>
		</li>
    </ul>
  </div>
</nav>
</body>

