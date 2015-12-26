<?php 
require_once("include/membersite_config.php");


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
	<script src="js/modernizr.custom2.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

	<script type="text/javascript" src="js/jquery.form.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>

	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-migrate.js"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="dist/js/bootstrapValidator.js" type="text/javascript"></script>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link href="css/minified.css" rel="stylesheet">

	<script type="text/javascript" src="dist/js/bootstrap-select.js"></script>
	<script src="js/modernizr.min.js"></script>
	<script src="js/select2.js"></script>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/harshit.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style>

	.nav-tabs > li > a{
		padding: 1em 1em;
	}


	.wrap{
		width: 700px;
		margin: 10px auto;
		padding: 10px 15px;
		background: white;
		border: 2px solid #DBDBDB;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		text-align: center;
		overflow: hidden;
	}
	#preview {
		color: red;
	}
	#preview img{
		margin-top: 0px;
		max-width: 100%;
		border: 0;
		border-radius: 3px;
		-webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		overflow: hidden;
	}
	input[type="submit"]{
		border-radius: 10px;
		background-color: #61B3DE;
		border: 0;
		color: white;
		font-weight: bold;
		font-style: italic;
		padding: 6px 15px 5px;
		cursor: pointer;
	}
	</style>
	<script type="text/javascript">
	function submitForm() {
        // However you need to submit the form

        document.getElementById("button").click(); // Or whatever
    }
    function submitForm2() {
        // However you need to submit the form

        document.getElementById("button2").click(); // Or whatever
    }
    function submitForm3() {
        // However you need to submit the form

        document.getElementById("button3").click(); // Or whatever
    }
    </script>

    <script>
    function chooseFile() {
    	$("#uploadImage").click();
    }

    function chooseFile2() {
    	$("#uploadImage2").click();
    }
    function upload_images() {
    	$("#uploadImage3").click();
    }

    function checkCaptcha(value, validator) {
        // Determine the numbers which are generated in captchaOperation
        var items = $('#captchaOperation').html().split(' '),
        sum   = parseInt(items[0]) + parseInt(items[2]);
        return value == sum;
    }
    </script>


    <script type="text/javascript">
    function repositionCover() {
    	$('.cover-wrapper').hide();
    	$('.cover-resize-wrapper').show();
    	$('.cover-resize-buttons').show();
    	$('.default-buttons').hide();
    	$('.screen-width').val($('.cover-resize-wrapper').width());
    	$('.cover-resize-wrapper img')
    	.css('cursor', 'move')
    	.draggable({
    		scroll: false,

    		axis: "y",

    		cursor: "move",

    		drag: function (event, ui) {
    			y1 = $('.timeline-header-wrapper').height();
    			y2 = $('.cover-resize-wrapper').find('img').height();

    			if (ui.position.top >= 0) {
    				ui.position.top = 0;
    			}
    			else
    				if (ui.position.top <= (y1-y2)) {
    					ui.position.top = y1-y2;
    				}
    			},

    			stop: function(event, ui) {
    				$('input.cover-position').val(ui.position.top);
    			}
    		});
    }

    function saveReposition() {

    	if ($('input.cover-position').length == 1) {
    		posY = $('input.cover-position').val();
    		$('form.cover-position-form').submit();
    	}
    }

    function cancelReposition() {
    	$('.cover-wrapper').show();
    	$('.cover-resize-wrapper').hide();
    	$('.cover-resize-buttons').hide();
    	$('.default-buttons').show();
    	$('input.cover-position').val(0);
    	$('.cover-resize-wrapper img').draggable('destroy').css('cursor','default');
    }


    $(function(){
    	$('.cover-resize-wrapper').height($('.cover-resize-wrapper').width()*0.3);


    	$('form.cover-position-form').ajaxForm({
    		url:  'includes/c.php',
    		dataType:  'json', 
    		beforeSend: function() {
    			$('.cover-progress').html('Repositioning...').fadeIn('fast').removeClass('hidden');
    		},

    		success: function(responseText) {
    			if ((responseText.status) == 200) {
    				$('.cover-wrapper img')
    				.attr('src', responseText.url + '?' + new Date().getTime())
    				.load(function () {

    					$('.cover-progress').fadeOut('fast').addClass('hidden').html('');
    					$('.cover-wrapper').show();
    					$('.cover-resize-wrapper')
    					.hide()
    					.find('img').css('top', 0);
    					$('.cover-resize-buttons').hide();
    					$('.default-buttons').show();
    					$('input.cover-position').val(0);
    					$('.cover-resize-wrapper img').draggable('destroy').css('cursor','default');

    				});
    			}

    		}
    	});


    	$("#register_form").click(function(){
    		$(".modal-body-left").hide();
    		$(".modal-body-signup-left").show();
    		$(".login-button").show();
    		$(".register-button").hide();
    		$(".modal-title").text('Register Your Account');
    		$(".modal-body-p").text('Just fill up details and get started!');
    		return false;
    	});

        // Going back to Social Forms
        $("#login_form").click(function(){
        	$(".modal-body-signup-left").hide();

        	$(".modal-body-left").show();
        	$(".modal-title").text('Login to Your Account');
        	$(".modal-body-p").text('Just sign in and get started!!');
        	return false;
        });

    });  


</script>






<script type="text/javascript"></script>

<script id="script_e9">
$(document).ready(function() {

	$('#myModal').modal({
		backdrop: 'static',
		keyboard: false,
	});




	function randomNumber(min, max) {
		return Math.floor(Math.random() * (max - min + 1) + min);
	};

                // Generate a sum of two random numbers
                function generateCaptcha() {
                	$('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 100), '='].join(' '));
                };

                generateCaptcha();

                

                $('#reg_forum').bootstrapValidator({
                	feedbackIcons: {
                		valid: 'glyphicon glyphicon-ok',
                		invalid: 'glyphicon glyphicon-remove',
                		validating: 'glyphicon glyphicon-refresh'
                	},
                	fields: {

                		confirmPassword: {
                			validators: {
                				identical: {
                					field: 'password',
                					message: 'The password and its confirm are not the same'
                				}
                			}
                		}
                	}
                });

                $('.selectpicker').selectpicker({
                	style: 'btn-info',
                	size: 4   
                });     

                $("#e9").select2();
                $("#e8").select2();
                $("#e7").select2();
                $("#e6").select2();
                $("#e5").select2();
                $("#e11").select2({
                	placeholder: "Select location",
                	allowClear: true
                });

                $('#uplload').tooltip();

                $("#advance").click(function(){
                	$("#advance_content").toggle(500);
                });


            });
</script>




<!-- PARTICULAR PAGES CSS FILES -->


<link href="css/innerpage.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
<link href="css/responsive.css" rel="stylesheet">
<link href="css/scrolling-nav.css" rel="stylesheet">
</head>
<body id="page-top">
	
	 <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-61830649-1', 'auto');
	  ga('send', 'pageview');
	
	</script>

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
										<a href="index.php">
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
												<a href="javascript:void(0);" id="total-cart">
													<i class="iconfont-shopping-cart not-round-icon"></i>
												</a>

												<div id="sub-cart" class="sub-header">
													<div class="cart-header">
														<span>Your cart is currently empty.</span>
														<small><a href="cart.php">(See All)</a></small>
													</div>
													<ul class="cart-items product-medialist unstyled clearfix"></ul>
													<div class="cart-footer">
														<div class="cart-total clearfix">
															<span class="pull-left uppercase">Total</span>
															<span class="pull-right total">₹ 0</span>
														</div>
														<div class="text-right">
															<a href="cart.php" class="btn btn-default btn-round view-cart">View Cart</a>
														</div>
													</div>
												</div>
												<!-- // SHOPPING CART -->
											</li>
											<?php 
											if($fgmembersite->CheckRestLogin()) {

												$str1 = "

												<div class='btn-group  user' >
												<a class='btn btn-mini' href='myzone.php' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>

												";
												$str2 = "
												</a>
												<button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
												<span class='caret'></span>
												</button>
												<ul class='dropdown-menu'>

												<li><a href='#'>Settings</a></li>
												<li><a href='logout.php'>Logout</a></li>
												</ul>
												</div>";
												echo $str1.$fgmembersite->storename().$str2;
											}


											elseif($fgmembersite->CheckAdLogin()) {

												$str1 = "

												<div class='btn-group  user' >
												<a class='btn btn-mini' href='myzone.php' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>

												";
												$str2 = "
												</a>
												<button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
												<span class='caret'></span>
												</button>
												<ul class='dropdown-menu'>

												<li><a href='#'>Settings</a></li>
												<li><a href='logout.php'>Logout</a></li>
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
												<a class="active" href="products.php">Categories</a>
											</li>
											<li>
												<a class="" href="zone.php"><!-- <i class="iconfont-plus not-round-icon"></i> -->
													Add Your Restaurant</a>
												</li>
												<li>
													<a href="contact.php" >Contact Us</a>
												</li>
												
												<li>
													<a class="" href="help.php">Help</a>
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

					<!-- ADD TO CART MESSAGE -->

					<!-- // ADD TO CART MESSAGE -->
				</div>
				<!-- // MAIN HEADER -->
			</header>



			<main id="main-content" role="main">
				<div id="scroll-wrap"  >
					<header class="codrops-header" style="background-image:url(<?= $fgmembersite->public_cover_pic(); ?>)">

						<h1>T'Pot Cafe<span>A Fresh Cup of Conversation</br>7 , Main Shivalik Road, Malviya Nagar,</br> New Delhi</span></h1>
					</header>

				</div>
				<div class="container demo-3">
					<div class="row" >
						<h3 style="padding-top:20px;margin-bottom:0px">Disposables Offered :</h3>
					</div>

					<ul class="grid cs-style-3">
						<li>
							<figure class="well">
								<img src="images/150ml.png" alt="img04">
								<figcaption>
									<h3>Papercup</h3>
									<p>150 ml</p></br>
									<a href="#">Take a look</a>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure class="well">
								<img src="images/250ml.png"  alt="img01">
								<figcaption>
									<h3>Papercup</h3>
									<p>250 ml</p></br>
									<a href="#">Take a look</a>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure class="well">
								<img src="images/kullad_prev.jpg" alt="img02">
								<figcaption>
									<h3>Kullad</h3>
									<p>Trending</p></br>
									<a href="#">Take a look</a>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure class="well">
								<img src="images/Tpot_box_6.png" alt="img05">
								<figcaption>
									<h3>Box</h3>
									<p>New</p></br>
									<a href="#">Take a look</a>
								</figcaption>
							</figure>
						</li>
						
					</ul>
				</div><!-- /container -->

				<script src="js/toucheffects.js"></script>
			</main>
			<div id="spinner">
				<img src="images/spinner.gif" alt="Loading" />
			</div>
			 <footer class="page-footer">
            <!-- WIDGET AREA -->
            <!-- // WIDGET AREA -->
            <div class="footer-sub">
                <div class="container">
                    <div class="row" >
                        <div class="col-md-6" align="center">
                             © 2015 Adurcup.com . All Rights Reserved.
                        </div>
                        <div class="col-md-6" align="center">
                             <a href="http://accelerate.businessworld.in/"><img src="img/home/BW.png"></a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </footer>
		</div>

		<?php include("includes/login_popup.php"); ?>
	</body>
	</html>

