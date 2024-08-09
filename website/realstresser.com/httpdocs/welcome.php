<?php include("@/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RealStresser - The Best Cheap & Powerful Stresser Service.</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico">
    <meta name="description"
        content="RealStresser - The Best Cheap &amp; Powerful Stresser Service.">
    <meta name="author" content="xr4zz3rs - RealStresser">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="RealStresser - The Best Cheap &amp; Powerful Stresser Service.">
    <meta property="og:site_name" content="RealStresser.com Quality Stresser Service">
    <meta property="og:url" content="https://realstresser.com">
    <meta property="og:description"
        content="RealStresser - The Best Cheap &amp; Powerful Stresser Service.">
    <meta property="article:tag" content="realstresser">
    <meta property="article:tag" content="stresser">
    <meta property="article:tag" content="best stresser service">
    <meta property="article:tag" content="layer 7 stresser">
    <meta property="article:tag" content="disposable stresser">
    <meta property="og:type" content="website">
    <meta property="og:image" content="./assets/img/favicon.ico">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@RealStresser">
    <meta name="twitter:title" content="RealStresser - The Best Cheap &amp; Powerful Stresser Service.">
    <meta name="twitter:description"
        content="RealStresser - The Best Cheap &amp; Powerful Stresser Service.">
    <link rel="stylesheet" href="./indexsrc/bootstrap.min.css">
    <link rel="stylesheet" href="./indexsrc/css">
    <link rel="stylesheet" href="./indexsrc/aos.css">
    <link rel="stylesheet" href="./indexsrc/home.css">
    <link rel="stylesheet" href="./indexsrc/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css"
        integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">
        
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155071382-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-155071382-2');
    </script>
	
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5e9908e869e9320caac47210/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
    

    <noscript>
        <div>Please allow JavaScript on this website!</div>
    </noscript>

</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    <section class="header-area header-one">
        <div class="navbar-area navbar-one navbar-transparent py-3 aos-init aos-animate" data-aos="fade">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="">
                                <!--<img src="./indexsrc/logo.png" alt="RealStresser">-->
                                <h3 style="color: #fff;"><i style="color: #fff;" class="fa fa-bolt"></i> RealStresser</h3>
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne"
                                aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a class="active" href="">
                                            <i style="color: #fff;" class="fa fa-home"></i> Home Page </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="active" href="#faq">
                                            <i style="color: #fff;" class="fa fa-book"></i> Faq
                                        </a>
                                    </li>
									<?php
									if(isMobile())
									{
										echo '
										<li class="nav-item">
                                        	<a class="active" href="/login">
                                            	<i style="color: #fff;" class="fa fa-sign-in"></i> Login
                                        	</a>
                                    	</li>';
										echo '
										<li class="nav-item">
                                        	<a class="active" href="/register">
                                            	<i style="color: #fff;" class="fa fa-user-plus"></i> Register
                                        	</a>
                                    	</li>';
									}
									?>
                                </ul>
                            </div>

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <ul>
                                    <li><a class="light" href="/login"><i style="color: #fff;" class="fa fa-sign-in"></i> Login</a>
                                    </li>
                                    <li><a class="solid" href="/register"><i style="color: #0067f4;" class="fa fa-user-plus"></i> Register</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-content-area d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-wrapper">
                            <div class="header-content aos-init aos-animate" data-aos="fade-right">
                                <h1 class="header-title">RealStresser / Free 2020</h1>
                                <p class="text mt-4">Powerful stresser, the cheapest stresser & free method!</p>
                                <p class="text mt-4" style="display: none;">Register today and buy a package easily!</p>
                                <div class="header-btn rounded-buttons">
                                    <a class="main-btn rounded-one" href="/register">
                                        Start Using </a>
                                </div>

                            </div>

                            <div class="header-image d-none d-lg-block aos-init aos-animate" data-aos="fade-left">
                                <div class="image">
                                    <img src="./indexsrc/privacy.png" alt="Stresser Service">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header-shape">
                <img src="./indexsrc/header-bottom.svg" alt="shape">
            </div>
        </div>
    </section>
    <section id="features" class="features-area pt-60 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9 p-2 aos-init aos-animate" data-aos="fade-up">
                    <div class="text-center bg-white p-4 mt-40 rounded shadow-sm">
                        <div class="d-flex align-items-center justify-content-center mb-4 mt-2">
                            <i class="fas fa-money-bill-alt fa-3x text-primary"></i>
                            <img class="shape position-absolute" src="./indexsrc/f-shape.svg">
                        </div>
                        <div class="features-content pt-2">
                            <h4 class="features-title text-primary">
                                Very Cheap </h4>
                            <p class="text mt-3">
                                We provide you best prices. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9 p-2 aos-init aos-animate" data-aos="fade-up">
                    <div class="text-center bg-white p-4 mt-40 rounded shadow-sm">
                        <div class="d-flex align-items-center justify-content-center mb-4 mt-2">
                            <i class="fas fa-rocket fa-3x text-primary"></i>
                            <img class="shape position-absolute" src="./indexsrc/f-shape.svg">
                        </div>
                        <div class="features-content pt-2">
                            <h4 class="features-title text-primary">
                                Very Powerful </h4>
                            <p class="text mt-3">
                                RealStresser's attack power is extremely powerful! </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9 p-2 aos-init aos-animate" data-aos="fade-up">
                    <div class="text-center bg-white p-4 mt-40 rounded shadow-sm">
                        <div class="d-flex align-items-center justify-content-center mb-4 mt-2">
                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                            <img class="shape position-absolute" src="./indexsrc/f-shape.svg">
                        </div>
                        <div class="features-content pt-2">
                            <h4 class="features-title text-primary">
                                Easy Usage </h4>
                            <p class="text mt-3">
                                We have a simple and useful web panel. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services-area services-one bg-white my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
                    <div class="section-title pb-10">
                        <h4 class="title">Features</h4>
                        <p class="text">We provide a lot of features for you.</p>
                    </div>
                    <div class="mt-3 mb-1">
                        <i class="fas fa-lock" style="color:gray;"></i>
                        Privacy </div>
                    <div class="mb-1">
                        <i class="fab fa-bitcoin" style="color:gray;"></i>
                        Anonymous </div>
                    <div class="mb-1">
                        <i class="fas fa-money-bill" style="color:gray;"></i>
                        Free Methods </div>
                    <div class="mb-1">
                        <i class="fa fa-bolt" style="color:gray;"></i>
                        Powerful Servers & Methods </div>
                </div>
            </div>
        </div>

        <div class="services-image d-lg-flex align-items-center overflow-hidden">
            <div class="image aos-init aos-animate" data-aos="fade-left">
                <img src="./indexsrc/services.png">
            </div>
        </div>
    </section>
<div id="faq">
    <div class="container mb-3">
        <div class="card">
            <h1 class="card-header" style="font-size: 20px;">RealStresser / Article 1</h1>
            <div class="card-body">
                <h2 class="card-title" style="font-size: 16px;">Is there any free method?</h2>
                <p class="card-text">There are free methods as <a href="">RealStresser</a>, Layer 7 and Layer 4.</p>
            </div>
        </div>
    </div>
</div>
    <section class="coming-soon-area coming-soon-two mt-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="coming-soon-content">
                        <div class="coming-soon-image image-one d-none d-md-block">
                            <img src="./indexsrc/c-image-1.png" data-aos="fade-right" class="aos-init aos-animate">
                        </div>
                        <div class="coming-soon-image image-two">
                            <img src="./indexsrc/c-image-2.png" data-aos="fade-down" class="aos-init aos-animate">
                        </div>
                        <div class="coming-soon-image image-three d-none d-md-block">
                            <img src="./indexsrc/c-image-4.png" data-aos="fade-left" class="aos-init aos-animate">
                        </div>
                        <div class="coming-soon-content-wrapper text-center">
                            <div data-aos="fade" class="aos-init aos-animate">
                                <img src="./indexsrc/c-image-3.svg">
                                <h3 class="coming-soon-title">
                                    Start Using</h3>
                                <a href="/register"
                                    class="main-btn semi-rounded-three">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-copyright bg-primary py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text-light">
                                Copyright ©
                                RealStresser.com - All Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="./indexsrc/jquery-1.12.4.min.js"></script>
    <ym-measure class="ym-viewport"
        style="display: block; top: 0px; right: 0px; bottom: 0px; left: 0px; height: 100vh; width: 100vw; position: fixed; transform: translate(0px, -100%); transform-origin: 0px 0px;">
    </ym-measure>
    <ym-measure class="ym-zoom" style="bottom: 100%; position: fixed; width: 100vw;"></ym-measure>
    <script src="./indexsrc/bootstrap.min.js"></script>
    <script src="./indexsrc/home.js"></script>
    <script src="./indexsrc/aos.js"></script>


</body>

</html>