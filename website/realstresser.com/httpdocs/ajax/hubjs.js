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
						sweetAlert('<?php echo $sitename; ?>', "Host is not a valid IPv4.", "error");
					}
					else
					{
						xmlhttp.open("GET","ajax/hub.php?type=start" + "&host=" + host + "&port=" + port + "&time=" + time + "&method=" + method,true);
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
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "success");
							attacks();
							window.setInterval(ping(host),10000);
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=stop" + "&id=" + id,true);
					xmlhttp.send();
					}

					function start2()
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
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "success");
							attacks();
							window.setInterval(ping(host),10000);
						}
						{
							document.getElementById("hit2").innerHTML = '<i class="fa fa-bolt"></i> SEND ATTACK';
							sweetAlert('<?php echo $sitename; ?>', xmlhttp.responseText, "error");
						}
						}
					  }
					xmlhttp.open("GET","ajax/hub.php?type=start" + "&host=" + host + "&port=" + port + "&reqtype=" + reqtype + "&time=" + time + "&method=" + method,true);
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