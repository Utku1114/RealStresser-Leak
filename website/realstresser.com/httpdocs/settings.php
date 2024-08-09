<?php
include("@/header.php");
$paginaname = 'Settings';
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
           				<span data-feather="settings" class="icon-md text-light mr-2"></span>
					  	<span><?php echo htmlspecialchars($paginaname); ?></span>
					</div>

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
					  
					/*function DeleteLogs() {
					  	deletelogsButton.disabled = true;
					  	deletelogsButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
				        $.ajax({
				             type: "POST",
				             url: 'ajax/settings',
				             data:{deletelogs:'all'},
				             success:function(html) {
				               	 //alert(html);
								 if (html.search("success") != -1)
								 {
								 	sweetAlert('<?php //echo $sitename; ?>', html, "success");
								 	deletelogsButton.disabled = false;
								 	deletelogsButton.innerHTML = '<i class="fa fa-trash"></i>';
								 }
								 else
								 {
									 sweetAlert('<?php //echo $sitename; ?>', html, "error");
									deletelogsButton.disabled = false;
								 	deletelogsButton.innerHTML = '<i class="fa fa-trash"></i>';
								 }
				             }
				        });
				    }*/
					</script>
				  
	<!--<div class="col-lg-4 mt-2">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;">
                <h4 style="text-align:center"><i class="fa fa-history"></i> Delete My Logs</h4>
				<hr>
                <button type="submit" onclick="DeleteLogs()" id="deletelogsButton" class="btn btn-effect-ripple btn-primary btn-block"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>-->
				  
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