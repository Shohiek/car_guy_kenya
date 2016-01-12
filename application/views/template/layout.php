<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eazzy.me/html/rentit-multipage/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2015 08:19:33 GMT -->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rent It</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="<?php echo base_url();?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url();?>/assets/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/theme-red-1.css" rel="stylesheet" id="theme-config-link">

    <!-- Head Libs -->
    <script src="<?php echo base_url();?>/assets/plugins/modernizr.custom.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/jquery/jquery-1.11.1.min.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/plugins/iesupport/html5shiv.js"></script>
    <script src="assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
    <script>
    	var base_url = "<?php echo base_url(); ?>";
		$(document).ready(function() {
		//Alerts
			window.timeouterror = function($msg){
				$("#successBox").hide();
				$("#innerError p").html($msg);
				$("#errorBox").show();
				setTimeout(function(){
					$("#errorBox").hide();
				},3000);
			}
			
			window.timeoutsuccess = function($msg){
				$("#errorBox").hide();
				$("#innerSuccess p").html($msg);
				$("#successBox").show();
				setTimeout(function(){
					$("#successBox").hide();
				},3000);
			}
			
			$("#showerror").click(function(){
				timeouterror("Works2");				
			});
			$("#showsuccess").click(function(){
				timeoutsuccess("Works");
				//$("#successBox").show();		
				
			});
		//Alerts
		
		});	
			
	</script>
</head>
<body id="home" class="wide">
<!-- PRELOADER -->
<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div>
<!-- /PRELOADER -->

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header fixed">
        <div class="header-wrapper">
            <div class="container">

                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="<?php echo base_url();?>/assets/img/logo-rentit.png" alt="Rent It"/></a>
                </div>
                <!-- /Logo -->

                <!-- Mobile menu toggle button -->
                <a href="#" class="menu-toggle btn ripple-effect btn-theme-transparent"><i class="fa fa-bars"></i></a>
                <!-- /Mobile menu toggle button -->

                <!-- Navigation -->
                <nav class="navigation closed clearfix">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- navigation menu -->
                            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                            <ul class="nav sf-menu">
                                <li class="active">
                                	<a href="<?php echo base_url('index/home'); ?>">Home</a>
                                </li>
                                <li>
                                	<a href="<?php echo base_url('index/gallery'); ?>">Gallery</a>
                                </li>
                                <li>
                                    <ul class="social-icons">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /navigation menu -->
                        </div>
                    </div>
                    <!-- Add Scroll Bar -->
                    <div class="swiper-scrollbar"></div>
                </nav>
                <!-- /Navigation -->
            </div>
        </div>

    </header>
    <!-- /HEADER -->
    
    <!-- CONTENT AREA -->
    <!-- Alerts -->
	<div class="content-area">
		<!-- PAGE Errors -->
		<div class="message-box" id="errorBox" style="display:none;">
			<div class="message-box-inner" id="innerError">
				<p style="text-align: center;"></p>
			</div>
		</div>
		<div class="message-box alt" id="successBox" style="display:none;">
			<div class="message-box-inner" id="innerSuccess">
				<p style="text-align: center;"></p>
			</div>
		</div>
		<!-- /PAGE  Errors-->
		<?php $this->load->view($content_view); ?>
    </div>
    <!-- Alerts -->
    
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-meta">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="btn-row text-center">
                            <a href="#" class="btn btn-theme ripple-effect btn-icon-left facebook wow fadeInDown" data-wow-offset="20" data-wow-delay="100ms"><i class="fa fa-facebook"></i>FACEBOOK</a>
                        </p>
                        <div class="copyright">&copy; 2015 Rent It — An One Page Rental Car Theme made with passion by jThemes Studio</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
<!-- /WRAPPER -->

<!-- JS Global -->
<script src="<?php echo base_url();?>/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/superfish/js/superfish.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jquery.sticky.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jquery.smoothscroll.min.js"></script>
<!--<script src="assets/plugins/smooth-scrollbar.min.js"></script>-->
<!--<script src="assets/plugins/wow/wow.min.js"></script>-->
<script>
    // WOW - animated content
    //new WOW().init();
</script>
<script src="<?php echo base_url();?>/assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- JS Page Level -->
<script src="<?php echo base_url();?>/assets/js/theme-ajax-mail.js"></script>
<script src="<?php echo base_url();?>/assets/js/theme.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url();?>/assets/plugins/jquery.cookie.js"></script>
<!--<script src="<?php echo base_url();?>/assets/js/theme-config.js"></script>-->
<!--<![endif]-->
</body>

<!-- Mirrored from eazzy.me/html/rentit-multipage/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2015 08:20:22 GMT -->
</html>