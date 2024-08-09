<?php
include("@/header.php");
$paginaname = 'Methods FAQ';


?>
<!DOCTYPE html>
<html>
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
	
	<head>
  <title><?php $title = htmlspecialchars($sitename); echo ($title); ?> <?php echo " - "; echo($paginaname); ?></title>
	</head>
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
          <span data-feather="file-text" class="icon-md text-light mr-2"></span>
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
?>
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">                                   
                        <div class="block-content tab-content">
							<div style="overflow-x:auto;">
                          <table class="table table-bordered">
                             <tr>
                    <th>Method</th>
					<th>Descriptions</th>
                  </tr>
                <tbody>
<?php
$SQLGetFAQ = $odb -> query("SELECT * FROM `faq`");
while($getInfo = $SQLGetFAQ -> fetch(PDO::FETCH_ASSOC))
{
 $id = $getInfo['id'];
 $method = $getInfo['method'];
 $description = $getInfo['description'];
 echo '<tr><td>'.htmlspecialchars($method).'</td><td>'.htmlspecialchars($description).'</td></tr>';
}
if (isset($_POST['deletefaq']))
{
$delete = $_POST['deletefaq'];
$SQL = $odb -> query("DELETE FROM `faq` WHERE `id` = '$delete'");
echo success('FAQ has been removed <meta http-equiv="refresh" content="1;url=mfaq.php">');
}
?>
</tbody>
</form> 		          
	  </div>
				  </div>
     </div>
   </div>
  </div>
 </div>