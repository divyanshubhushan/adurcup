<?php
    require_once("include/membersite_config.php");
    require_once("includes/post_login.php");
        if (isset($_GET['signup'])) {
            if ($_GET['signup'] == 'success') {
                  echo "
         <div class='alert alert-success col-md-7 col-md-offset-3' align='center' style='position:absolute;top:0;z-index:9999'>
        
                                    <strong>Great!</strong> You have been successfully registered. We'll soon notify you via email when your account will be activated!
                                </div>";
             
            }
           
       
    }

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Adurcup.com - Serving made Easy</title>
         <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >
         <meta content="Shop your disposables here.We offer quality - trust - best price." name="description">
        <meta content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com" name="keywords">
        <meta name="author" content="Harshit Mittal" />
        <script src="js/home/modernizr.custom.js"></script>
        <link href="dist/css/bootstrapValidator.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="css/home/jquery.fancybox.css" rel="stylesheet">
        <link href="css/home/flickity.css" rel="stylesheet" >
        <link href="css/home/animate.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/home/styles.css" rel="stylesheet">
        <link href="css/home/queries.css" rel="stylesheet">
        <link href='css/home/font-sans.css' rel="stylesheet" >
       
         <link rel="stylesheet" type="text/css" href="css/login_popup.css">
                 
      
    </head>
    <body>
    
         <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-61830649-1', 'auto');
	  ga('send', 'pageview');
	
	</script>

        <header>
            <section class="hero">
                <div class="row nav-wrapper">
                    <div class="col-sm-12" >
                        <a class="logo" href="#" style="padding-left:100px" ><img src="img/home/logo.png" alt="Adurcup home" ></a>
                        <?php 
                            if($fgmembersite->CheckRestLogin()) {

                                $str1 = "

                                    <div class='btn-group  user' style='float:right;z-index:1001;margin: 20px 50px 10px 0;
                                padding: 4px 12px;'>
                                        <a class='btn btn-mini' href='myzone.php' style='background-color:#F0F0F0'><i class='fa fa-home' style='padding-right:6px;font-size:18px'></i>
                                
                                   ";
                                $str2 = "
                                    </a>
                                        <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                        <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu'>
                                             <li><a href='myzone.php'>Account</a></li>
                                            <li><a href='#'>Settings</a></li>
                                            <li><a href='logout.php'>Logout</a></li>
                                        </ul>
                                    </div>";
                                    echo $str1.$fgmembersite->storename().$str2;



                                
                                }
                            elseif ($fgmembersite->CheckAdLogin()) {
                                     $str1 = "

                                    <div class='btn-group  user' style='float:right;z-index:1001;margin: 20px 50px 10px 0;
                                padding: 4px 12px;'>
                                        <a class='btn btn-mini' href='adsearch.php' style='background-color:#F0F0F0'><i class='fa fa-home' style='padding-right:6px;font-size:18px'></i>
                                
                                   ";
                                $str2 = "
                                    </a>
                                        <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                        <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu'>
                                             <li><a href='adsearch.php'>Account</a></li>
                                            <li><a href='#'>Settings</a></li>
                                            <li><a href='logout.php'>Logout</a></li>
                                        </ul>
                                    </div>";
                                    echo $str1.$fgmembersite->ad_name().$str2;
                            }   
                            else{
                                        echo "<a href='#' class='use-btn user'  data-target='#login-modal' data-toggle='modal' style='float:right;z-index:1001;margin: 20px 50px 10px 0;
                                    padding: 4px 12px;'> LOGIN / SIGNUP </a>";
                                }
                        ?>

                    
                    </div>
                </div>
            
                <div class="container">
                    <div class="row hero-content">
                        <div class="col-md-12">
                            <h1 class="">Servings made easy! <br> Shop your disposables here. <br> We offer quality - trust - best price.</h1>
                            <a href="https://www.youtube.com/watch?v=SG2NrfXJLoI" class="video-btn pc_video youtube-media" align="center"><i class="iconfont-camera" style="padding-right:6px;margin-top:10px;font-size:20px"></i> Watch Our Video</a>
                        </div>
                        <div class="col-md-12 ">
                            <a href="#about" class="use-btn learn ">Learn More<i class="iconfont-arrow-down"></i></a>
                            <a href="products.php" class="learn-btn ">Get Started<i class="iconfont-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <section class="screenshots-intro" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center wp4">
                        <h1>BOOK ADVERTISEMENTS INSTANTLY !</h1>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="features-intro" id="advertiser" >
            <div class="container-fluid" >
                <div class="row" style="background-color:#00AAFF;padding:70px 30px 70px 30px">
<div class="col-xs-12 col-sm-3" align="center" style="color:#fff">
                        <img src="img/home/users.png">
                        <h2>Cobranding</h2>
                        <p>Provides an incomparable opportunity to build your brand by associating with established brands</p>
                    </div>
                    <div class="col-xs-12 col-sm-3" align="center" style="color:#fff">
                        <img src="img/home/bullhorn.png">
                        <h2>Effective advertisement </h2>
                         <p>Flexibilty to choose most eye-catching SKU on your selected avenue. We bring tangiblity into picture creating a different level of effectiveness </p>
                        <p></p>
                    </div>
                    <div class="col-xs-12 col-sm-3" align="center" style="color:#fff">
                       <img src="img/home/stats-bars.png">
                        <h2>Accountable Ads</h2>
                        <p>Minimise your risks, get maximum accountability. Prick the right customer bubble from our accountability metrics</p>
                    </div>
                    <div class="col-xs-12 col-sm-3" align="center" style="color:#fff">
                       <img src="img/home/stats-dots.png">
                        <h2>Performance Report</h2>
                        <p>Get to know how your advertisements are performing on SKU's. Allows you to realize where to invest</p>
                    </div>
                    
                    <div class="row" >
                        <div class="col-md-12" style="margin-top:30px" align="center" >
                           <a href="login.php" class="download-btn">Get started! <i class="iconfont-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                    

            </div>
        </section>
         <section class="download" id="assosiation" style="padding:70px 0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center wp4">
                        <h1>OUR CLIENTS</h1>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="screenshots" id="screenshots">
            <div class="container-fluid">
                <div class="row">
                    <ul class="grid">
                        <li>
                            <figure>
                                <img src="img/home/01-screenshot.jpg" alt="Screenshot 01">
                                <figcaption>
                                <div class="caption-content">
                                    <a target="_blank" href="http://www.sattviko.com/" class="single_image">
                                       <i class="iconfont-external-link"></i><br>
                                    </a>
                                </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/home/02-screenshot.jpg" alt="Screenshot 01">
                                <figcaption>
                                <div class="caption-content">
                                    <a target="_blank" href="http://www.scholarkart.com" class="single_image">
                                       <i class="iconfont-external-link"></i><br>
                                   
                                    </a>
                                </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/home/03-screenshot.jpg" alt="Screenshot 01">
                                <figcaption>
                                <div class="caption-content">
                                     <a target="_blank" href="http://tpot.in/" class="single_image">
                                       <i class="iconfont-external-link"></i><br>
                                   
                                    </a>
                                </div>
                                </figcaption>
                            </figure>
                        </li>
                         <li>
                            <figure>
                                <img src="img/home/04-screenshot.jpg" alt="Screenshot 01">
                                <figcaption>
                                <div class="caption-content">
                                     <a target="_blank" href="http://awesomestays.com/" class="single_image">
                                       <i class="iconfont-external-link"></i><br>
                                   
                                    </a>
                                </div>
                                </figcaption>
                            </figure>
                        </li>
                         <li>
                            <figure>
                                <img src="img/home/05-screenshot.jpg" alt="Screenshot 01">
                                <figcaption>
                                <div class="caption-content">
                                     <a target="_blank" href="http://shoptosurprise.com/" class="single_image">
                                       <i class="iconfont-external-link"></i><br>
                                   
                                    </a>
                                </div>
                                </figcaption>
                            </figure>
                        </li>
                
                    </ul>
                </div>
                
            </div>
        </section>
        <section class="download" id="download" style="padding:70px 0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center wp4">
                        <h1>Seen Enough?</h1>
                        <a href="products.php" class="download-btn">Lets get started! <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
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
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/home/min/toucheffects-min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
         <script src="dist/js/bootstrapValidator.js" type="text/javascript"></script>
        <script src="js/home/flickity.pkgd.min.js"></script>
        <script src="js/home/jquery.fancybox.pack.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/home/retina.js"></script>
        <script src="js/home/waypoints.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="js/home/min/scripts-min.js"></script>
         
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

            $("form :input").on("keypress", function(e) {
                return e.keyCode != 13;
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


              /*  function randomNumber(min, max) {
                    return Math.floor(Math.random() * (max - min + 1) + min);
                };

                // Generate a sum of two random numbers
                function generateCaptcha() {
                    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 100), '='].join(' '));
                };

                generateCaptcha();*/
            });
            </script>

        <?php include("includes/login_popup.php"); ?>
        



        
    </body>
</html>