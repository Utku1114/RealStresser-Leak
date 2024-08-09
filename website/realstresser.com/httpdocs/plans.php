<?php
include("@/header.php");
$paginaname = 'Plans';


?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->

	<head>
		<title><?php $title = htmlspecialchars($sitename); echo ($title); ?> <?php echo " - "; echo($paginaname); ?></title>
	</head>
	
			 <div class="page-wrapper">
			  <div class="page-content">
				  <?php 
								if($alert != "")
								{
									Alert($alert);
								}
						 	?>
		     <div class="alert alert-fill-primary">	
           <span data-feather="shopping-cart" class="icon-md text-light mr-2"></span>
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
												<?php
												$SQLGetPlans = $odb -> query("SELECT * FROM `plans` WHERE `private` = 0 ORDER BY `price` ASC");
												while ($getInfo = $SQLGetPlans -> fetch(PDO::FETCH_ASSOC))
												{
													$name = $getInfo['name'];
													$premium = $getInfo['premium'];
													$api = $getInfo['api'];
							if($premium == 0)
							{
								$premium = "No";
							}
							else 
							{
								$premium = "Yes";
							}
													
							if($api == 0)
							{
								$api = "No";
							}
							else
							{
								$api = "Yes";
							}
													$price = $getInfo['price'];
													$length = $getInfo['length'];
													$unit = $getInfo['unit'];
													$concurrents = $getInfo['concurrents'];
													$mbt = $getInfo['mbt'];
													$ID = $getInfo['ID'];
													echo '
                <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5 class="text-center text-uppercase mt-3 mb-4">'.htmlspecialchars($name).'</h5>
                  <h3 class="text-center font-weight-light">$'.htmlspecialchars($price).'</h3>
                  <p class="text-muted text-center mb-4 font-weight-light">'.htmlspecialchars($length).' '.htmlspecialchars($unit).'</p>
                  <div class="d-flex align-items-center mb-2">
                    <i data-feather="minus" class="icon-md text-primary mr-2"></i>
                    <p>Attack Time: '.htmlspecialchars($mbt).'</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i data-feather="minus" class="icon-md text-primary mr-2"></i>
                    <p>Concurrents: '.htmlspecialchars($concurrents).'</p>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                    <i data-feather="star" class="icon-md text-light mr-2"></i>
                    <p>Premium Methods: '.htmlspecialchars($premium).'</p>
                  </div>
				  <div class="d-flex align-items-center mb-2">
                    <i data-feather="star" class="icon-md text-light mr-2"></i>
                    <p>API Access: '.htmlspecialchars($api).'</p>
                  </div>
                    <a href="bitcoin?id='.$ID.'" class="btn btn-primary d-block mx-auto mt-4">
                     <i class="link-icon" data-feather="pocket"></i>
                     <span class="link-title">Purchase</span>
                   </a>
                </div>
              </div>
            </div>';
												}
												?>
												
							   </div>
							 </div>
						  </div>						
					   </div>
					</div>
</html>
