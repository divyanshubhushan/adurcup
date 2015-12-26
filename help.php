<?php
    require_once("include/membersite_config.php");
if(isset($_POST['contact_message']))
{

    if(!$fgmembersite->send_message())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
}
require_once("includes/post_login.php");
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Adurcup.com</title>
    <meta name="description" content="shop your disposables with best quality at affordable prices."/>
    <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link href="css/login_popup.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-select.css">
    <link href="css/select2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="dist/css/magnific-popup.css"> 
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/bootstrapValidator.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/component.css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href="css/minified.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        
    .nav-tabs > li > a{
        padding: 1em 1em;
    }
    
    a, a:active, a:focus {
       outline: none;
    }
                                       
    
	.team-member h3{
		margin:5px 0 0 0;
		color:#08c;
	}
	.mail{
		color:#08c;
	}
	@media screen and (max-width:465px){

	#main-content{
		padding-top: 80px !important;

		}

	}
    </style>
    <script type="text/javascript"></script>

   <!-- PARTICULAR PAGES CSS FILES -->
    <link href="css/innerpage.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
     <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-61830649-1', 'auto');
          ga('send', 'pageview');
        
        </script>

</head>
<body id="page-top">

    <div id="page-wrapper">
        <header id="site-header" role="banner">

            <div class="header-top" style="box-shadow:none;">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                            <div class="container">
                                <div class="navbar-header page-scroll">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                    <div class="logo">
                                        <a href="http://www.adurcup.com">
                                            <img alt="Porto" width="100" height="45" data-sticky-width="100" data-sticky-height="70" src="img/logo.png">
                                        </a>
                                    </div>

                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->

                                <div class="row">

                                    <div class="col-xs-12 col-xs-4  collapse navbar-collapse navbar-ex1-collapse" style="float:right;padding-top:10px;">
                                        <ul class="actions unstyled clearfix" >

                                            <li data-toggle="sub-header" data-target="#sub-social">
                                                <!-- SOCIAL ICONS -->
                                                <a href="#" id="social-icons">
                                                    <i class="iconfont-bell not-round-icon"></i>
                                                </a>


                                                <!-- // SOCIAL ICONS -->
                                            </li>

                                            <li data-toggle="sub-header" data-target="#sub-cart">
                                                <!-- SHOPPING CART -->
                                                <a href="cart" id="total-cart">
                                                    <i class="iconfont-shopping-cart not-round-icon"></i>
                                                </a>

                                                <div id="sub-cart" class="sub-header">
                                                    <div class="cart-header">
                                                        <span>Your cart is currently empty.</span>
                                                        <small><a href="cart">(See All)</a></small>
                                                    </div>
                                                    <ul class="cart-items product-medialist unstyled clearfix"></ul>
                                                    <div class="cart-footer">
                                                        <div class="cart-total clearfix">
                                                            <span class="pull-left uppercase">Total</span>
                                                            <span class="pull-right total">₹ 0</span>
                                                        </div>
                                                        <div class="text-right">
                                                            <a href="cart" class="btn btn-default btn-round view-cart">View Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- // SHOPPING CART -->
                                            </li>
                                            <?php 
                                            if($fgmembersite->CheckRestLogin()) {

                                                $str1 = "

                                                <div class='btn-group  user' >
                                                <a class='btn btn-mini' href='myzone' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>

                                                ";
                                                $str2 = "
                                                </a>
                                                <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                                <span class='caret'></span>
                                                </button>
                                                <ul class='dropdown-menu'>

                                                <li><a href='edit'>Settings</a></li>
                                                <li><a href='logout'>Logout</a></li>
                                                </ul>
                                                </div>";
                                                echo $str1.$fgmembersite->storename().$str2;
                                            }


                                            elseif($fgmembersite->CheckAdLogin()) {

                                              $str1 = "

                                              <div class='btn-group  user' >
                                              <a class='btn btn-mini' href='adsearch' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>

                                              ";
                                              $str2 = "
                                              </a>
                                              <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                              <span class='caret'></span>
                                              </button>
                                              <ul class='dropdown-menu'>

                                              <li><a href='#'>Settings</a></li>
                                              <li><a href='logout'>Logout</a></li>
                                              </ul>
                                              </div>";
                                              echo $str1.$fgmembersite->ad_name().$str2;




                                          }
                                          else{
                                            echo "<li >


                                            <a href='#' class='use-btn user'  data-target='#login-modal' data-toggle='modal' > <i class='iconfont-user not-round-icon'></i></a>


                                            </li>";


                                        }


                                        ?>


                                    </ul>
                                </div>



                                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                                            <ul class="nav navbar-nav">
                                                <li >
                                                    <a href="products">Categories</a>
                                                </li>
                                                <li>
                                                    <a href="zone">Add Your Restaurant</a>
                                                </li>
                                                <li>
                                                    <a  href="contact" >Contact Us</a>
                                                </li>
                                            
                                                <li>
                                                    <a class="active" href="help">Help</a>
                                                </li>
                                               

                                            </ul>
                                        </div>
                                    </div>

                                    <!-- /.navbar-collapse -->

                                   
                                </div>

                                 <div class="cart-notification">
                                        <ul class="unstyled"></ul>
                                    </div>
                                <!-- /.container -->
                            </nav>
                        </div>
                        
                    </div>

                </div>
 
            </header>


		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
				
			<div class="container">
				<div class="row">

					<div class="panel-group checkout" id="checkout-collapse">
					<h3 class="uppercase text-bold" style="padding-left:15px"><span class="text-xs">SOME COMMON QUESTIONS</span></h3>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse1">
										<span class="step">01</span>
										For what minimum time span can I book a restaurant?
									</a>
								</h4>
							</div>
							<div id="checkout-collapse1" class="panel-collapse collapse in">
								<div class="panel-body">
									<p>For every month is divided into 2 halves one from starting to mid of the month and other from mid of month to its end. so you can book for minimum of half a month.</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse2">
										<span class="step">02</span>
										If I wanted to do a booking how early I have to order?
									</a>
								</h4>
							</div>
							<div id="checkout-collapse2" class="panel-collapse collapse">
								<div class="panel-body">
									<p>It should be atleast a month before the time you wanted your advertisement.
									</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse3">
										<span class="step">03</span>
										When would my order be considered as confirmed?

									</a>
								</h4>
							</div>
							<div id="checkout-collapse3" class="panel-collapse collapse">
								<div class="panel-body">
									<p>After a sucessful payment, you will get a confirmation mail. That will be considered as final.
									</p>
								</div>
							</div>
						</div>
					</div>
					
					<section class="section" style="padding-top:40px;">

						<section class="col-xs-12 col-md-12">
							
							<h2 class="uppercase text-bold" ><span class="text-xs"><i class="iconfont-envelope" style="padding-right:10px"></i>Send us a message</span></h2>
							<p>We would love to hear from you. Contact us at <a class="mail" href="mailto:adurcup@gmail.com">adurcup@gmail.com</a> or alternatively fill the form below.</p>
							<div class="alert alert-success alert-dismissible col-md-8 col-md-offset-2" id="contact_success" role="alert" style="display:none">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:-5px"><span aria-hidden="true">&times;</span></button>
		                      <strong>Thanks! We will get in touch with you soon.</strong>
		                    </div>
							<div class="row" style="padding-top:10px" >
								<div id="frm-contact-us">
									<form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="contact_message_form">
        								<input id='contact_message' name='contact_message' type='hidden' value='1'>       
										<div class="col-xs-12 col-sm-12 col-md-5" style="padding-right:30px">
											<div class="form-group stylish-input">
												<label for="contactName" class="required">Name</label>
												<input style="color:#000;border:1px solid #08c;background:#fff;" type="text" class="form-control" id="contactName" name="name" data-validate="^[Ç-í\w\s]{2,30}$" required />
											</div>
											<div class="form-group stylish-input">
												<label for="contactEmail" class="required">Email</label>
												<input style="color:#000;border:1px solid #08c;background:#fff;" type="email" class="form-control" id="contactEmail" name="email" data-validate="^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$" required />
											</div>
											<div class="form-group stylish-input">
												<label for="contactSubject">Subject</label>
												<input style="color:#000;border:1px solid #08c;background:#fff;" type="text" class="form-control" name="subject" id="contactSubject" />
											</div>
										</div>
										<div class="space10 visible-xs visible-sm"></div>
										<div class="col-xs-12 col-sm-12 col-md-7">
											<div class="form-group stylish-input">
												<label for="contactMSG" class="required">Message</label>
												<textarea style="color:#000;border:1px solid #08c;background:#fff;height: 178px;" id="contactMSG" class="form-control" name="message" data-validate=".{2,400}$" required></textarea>
											</div>
										</div>
										<div class="space10"></div>
										<div class="col-xs-12 col-md-12">
											<button class="btn btn-default btn-round pull-right">Send Message</button>
										</div>
									</form>
									
									<div class="space40"></div>
									<div class="clearfix"></div>
									<!-- CONTACT FORM ALERTS -->
									<div class="alert alert-success" id="contact_success" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<div class="alert-inner">
											<strong>Thanks,</strong> your message recieved successfully. We'll get back to you as soon as possible.
										</div>
									</div>
									<!-- /success msg -->
									
									<div class="alert alert-danger" id="contact_fail" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<div class="alert-inner"></div>
									</div>
									<!-- /error msg -->
									<!-- /CONTACT FORM ALERTS -->

								</div>
							</div>
						
						</section>
						
						
						<div class="clearfix"></div>
					</section>
				
				</div>
			</div>
			
		</main>
		<!-- // SITE MAIN CONTENT -->
		
		<!-- SITE FOOTER -->
		<footer class="page-footer">
            <!-- WIDGET AREA -->
            <!-- // WIDGET AREA -->
            <div class="footer-sub">
                <div class="container">
                    <div class="row" >
                        <div class="col-md-12" align="center">
                             © 2015 Adurcup.com . All Rights Reserved.
                        </div>
                       
                    </div>
                </div>
            </div>
        </footer>
	<!-- // SITE FOOTER -->
		
</div>
<!-- // PAGE WRAPPER -->
 
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-migrate.js"></script>
        <script type="text/javascript" src="js/jquery.form.min.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script src="js/select2.js"></script>
        <script type="text/javascript" src="js/ajax_script2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.js"></script>

         <script src="js/jquery.easing.min.js"></script> 
         <script src="js/scrolling-nav.js"></script>



        <!-- Essential Javascripts -->
        <script src="js/minified.min.js"></script>


	<script type="text/javascript">

	  $(function(){
		  $('#contact_message_form').ajaxForm(function() { 
                $('#contact_success').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
            });

		   $("#ad_register_btn").click(function(){
                    $("#ad_login").hide();
                     $("#ad_register").show();
                     $(".modal-title").text('Sign-up to get started!');
                     $(".state_info").text('Already have an acoount?');
                     $(".button_info").text('Sign Up');
                     $(".register_forgot").hide();
                  
                     $("#ad_login_btn").show();
                     $("#ad_register_btn").hide();

                 });
                 $("#ad_login_btn").click(function(){
                    $("#ad_login").show();
                     $("#ad_register").hide();
                     $(".modal-title").text('Login to your account ');
                     $(".state_info").text("Don't have an account?");
                     $(".button_info").text('Log In');
                     $("#ad_login_btn").hide();
                     $("#ad_register_btn").show();
                     $(".register_forgot").show();

                 });

                $('#ad_reg_form').bootstrapValidator({
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    
                    fields: {
                        
                        confirmpass: {
                            validators: {
                                identical: {
                                    field: 'password',
                                    message: 'The password does not match'
                                }
                            }
                        },
                        contact: {
                            validators: {
                                between: {
                                    min: 1000000000,
                                    max: 9999999999,
                                    message: 'Enter your 10-digit contact number'
                                }
                            }
                        },
                        email:{
                            validators:{
                                emailAddress: {
                                message: 'Not a valid email address'
                                }

                            }
                        }

                    } ,  
                    onError: function(e) {
                        
                        $('#error').modal('show')
                    }
                  
                });
				$('.dropdown-toggle').dropdown();



		 });

	</script>
	<!-- Particular Page Javascripts -->
	<script src="js/products.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/contact.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script src="js/gmap3.min.js"></script>
	<!-- // Particular Page Javascripts -->
	 <?php include("includes/login_popup.php"); ?>
	
</body>


</html>
