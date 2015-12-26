<?php
require_once("include/membersite_config.php");
require_once("includes/post_login.php");
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Cart - Adurcup.com</title>
    <meta name="description" content="shop your disposables with best quality at affordable prices."/>
    <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >
     <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login_popup.css">
        <link rel="stylesheet" type="text/css" href="css/component.css" />

    <link href="css/minified.css" rel="stylesheet">


    <style>
    .product{
        border: none;
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
        margin-top: 30px;
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
    .spinner {
      width: 100px;
  }
  .spinner input {
      text-align: right;
  }
  .input-group-btn-vertical {
      position: relative;
      white-space: nowrap;
      width: 1%;
      vertical-align: middle;
      display: table-cell;
  }
  .input-group-btn-vertical > .btn {
      display: block;
      float: none;
      width: 100%;
      max-width: 100%;
      padding: 8px;
      margin-left: -1px;
      position: relative;
      border-radius: 0;
  }
  .input-group-btn-vertical > .btn:first-child {
      border-top-right-radius: 4px;
  }
  .input-group-btn-vertical > .btn:last-child {
      margin-top: -2px;
      border-bottom-right-radius: 4px;
  }
  .input-group-btn-vertical i{
      position: absolute;
      top: 0;
      left: 4px;
  }
  </style>



<link href="css/innerpage.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
<link href="css/responsive.css" rel="stylesheet">


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
                                                    <span class="cart_number">0</span>
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

                                            <li><a href='#'>Settings</a></li>
                                            <li><a href='logout'>Logout</a></li>
                                            </ul>
                                            </div>";
                                            echo $str1.$fgmembersite->storename().$str2;
                                        }


                                        elseif($fgmembersite->CheckAdLogin()) {

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
                                        <a class="active" href="products">Categories</a>
                                    </li>
                                    <li>
                                        <a class="" href="zone"><!-- <i class="iconfont-plus not-round-icon"></i> -->
                                          Add Your Restaurant</a>
                                      </li>
                                      <li>
                                        <a href="contact" >Contact Us</a>    
                                    </li>
                                              
                                                <li>
                                                    <a class="" href="help">Help</a>
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
		 <div class="breadcrumb-container">
              <div class="container">
                  <div class="relative">
                      <ul class="bc unstyled clearfix">
                          <li><a href="products">Shop</a></li>
                          <li class="active">Cart</li>
                      </ul>
                  </div>
              </div>
            
          </div>
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
				
			<section class="section">
				<div class="container">
					
					<table class="tbl-cart" style="padding-bottom:30px">
						<thead>
							<tr>
								<th>Product Name</th>
								<th style="width: 15%;">Unit Price</th>
								<th style="width: 25%;">QTY</th>
								<th class="hidden-xs" style="width: 15%;">Sub Total</th>
								<th class="hidden-xs" style="width: 10%;"></th>
							</tr>
						</thead>
						<tbody>
							<tr class="hide empty-cart">
								<td colspan="5">
									It seems your shopping cart is empty, try looking our <a href="products">products</a>.
								</td>
							</tr>
							
						</tbody>
					</table>
<div class="col-md-7">
  <a class="btn btn-round btn-default uppercase clear_cart" href="#"><i class="iconfont-remove"></i> Clear Cart</a>
              
 
          <div id="note" style="padding-top:30px">
              </div>

            
          </div>
					
					<div class="shopcart-total pull-right clearfix">
						<div class="cart-subtotal text-xs m-b-sm clearfix">
							<span class="pull-left hidden">Sub Total:</span>
							<span class="pull-right hidden">₹ 0</span>
						</div>
            <div class="total_minus_delivery text-xs m-b-sm clearfix">
              <span class="pull-left ">Total:</span>
              <span class="pull-right ">₹ 0</span>
            </div>
             <div class="discount hidden text-xs m-b-sm clearfix" id="discount">
              <span class="pull-left ">Discount: <span data-toggle="tooltip" title="Independence Day Week Offer" style="background-color:green;color:#fff;padding:3px">20% off</span></span>
              <span class="pull-right ">₹ 0</span>
            </div>
            <div class="delivery_charges text-xs m-b-sm clearfix">
              <span class="pull-left ">Delivery Charges:</span>
              <span class="pull-right ">₹ 0</span>
            </div>

						<div class="cart-total text-bold m-b-lg clearfix">
							<span class="pull-left" style="font-size:18px">Grand Total:</span>
							<span class="pull-right" style="font-size:18px">₹ 0</span>
						</div>
            
						<div class="text-center">
							<a class="btn btn-round btn-default uppercase" href="checkout">Proceed to checkout</a>
						</div>
					</div>
					
				</div>
			</section>
			

			<!-- RELATED PRODUCTS -->
			
		</main>
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
	<!-- // SITE FOOTER -->
		
</div>


<style type="text/css">

.page-footer{
  margin-top: 120px;
}

</style>
  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



        <!-- Essential Javascripts -->
        <script src="js/minified.min.js"></script>
        <!-- // Essential Javascripts -->

        <script type="text/javascript">
            
            $(document).ready(function() {

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


 
	<script src="js/products.js"></script>
	<script src="js/owl.carousel.js"></script>


<script src="js/product_spinner.js"></script>



	  <?php include("includes/login_popup.php"); ?>

	
</body>


</html>