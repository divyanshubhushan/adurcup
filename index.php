<?php
    require_once("include/membersite_config.php");
    include("includes/post_login.php");
        if (isset($_GET['signup'])) {
            if ($_GET['signup'] == 'success') {
                 echo "
         <div class='alert alert-success col-md-6 col-md-offset-3' align='center' style='position:absolute;top:0;z-index:9999'>
        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Great!</strong> Your form is successfully submitted. Your account will be activated soon!
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
        <meta name="google-site-verification" content="VsqyH3Wqm4bptCTH6XF6_uZah1tgUczOc6MYLdU3eR8" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/home/styles.css" rel="stylesheet">
        <link href="css/home/queries.css" rel="stylesheet">
        <link href='css/home/font-sans.css' rel="stylesheet" >
        <link rel="stylesheet" type="text/css" href="css/login_popup.css">
	<style type="text/css">
            @media (max-width:1108px) {
            .poster{
                            top:51px !important;
                            right:0 !important ;
                             width: 97px !important;
                             height: 125px !important;
                        }
                }
                

        </style>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-61830649-1', 'auto');
          ga('send', 'pageview');
        
        </script>
    
    </head>
    <body>
        <header>
            <section class="hero">
                <div class="row nav-wrapper">
                    <div class="col-sm-12" >
                        <a class="logo" href="http://www.adurcup.com" style="padding-left:100px" ><img  src="img/home/Christ1.png" alt="Adurcup home" ></a>

                        <?php 
                            if($fgmembersite->CheckRestLogin()) {

                                $str1 = "

                                    <div class='btn-group  user' style='float:right;z-index:1001;margin: 20px 50px 10px 0;
                                padding: 4px 12px;'>
                                        <a class='btn btn-mini' href='myzone' style='background-color:#F0F0F0'><i class='fa fa-home' style='padding-right:6px;font-size:18px'></i>
                                
                                   ";
                                $str2 = "
                                    </a>
                                        <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                        <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu'>
                                             <li><a href='myzone'>Account</a></li>
                                            <li><a href='edit'>Settings</a></li>
                                            <li><a href='logout'>Logout</a></li>
                                        </ul>
                                    </div>";
                                    echo $str1.$fgmembersite->storename().$str2;



                                
                                }
                            elseif ($fgmembersite->CheckAdLogin()) {
                                     $str1 = "

                                    <div class='btn-group  user' style='float:right;z-index:1001;margin: 20px 50px 10px 0;
                                padding: 4px 12px;'>
                                        <a class='btn btn-mini' href='aduser/index.php' style='background-color:#F0F0F0'><i class='fa fa-home' style='padding-right:6px;font-size:18px'></i>
                                
                                   ";
                                $str2 = "
                                    </a>
                                        <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                        <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu'>
                                             <li><a href='aduser/index.php'>Account</a></li>
                                            <li><a href='#'>Settings</a></li>
                                            <li><a href='logout'>Logout</a></li>
                                        </ul>
                                    </div>";
                                    echo $str1.$fgmembersite->ad_name().$str2;
                            }   
                            else{

                                        echo "<a href='#' class='use-btn user'  data-target='#login-modal' data-toggle='modal' style='float:right;z-index:1001;margin: 20px 50px 10px 0;border-radius:2px;
                                    padding: 4px 12px;'> Login / Signup </a>
                                    <a href='#' class='use-btn user'  data-target='#hiring' data-toggle='modal' style='background-color:#fff;float:right;border:1.5px solid #73D0DA;border-radius:5px; z-index:1001;margin: 20px 20px 10px 0;color:#08C;
                                    padding: 4px 12px;'> We are Hiring! </a>
                                            ";
                                }
                        ?>

                    
                    </div>
                </div>
            	<!-- <div class="poster" style="position:absolute;top:0;z-index:999;right:23%;width:129px;height:174px;background:url('img/home/Poster1.png') no-repeat scroll center center / cover">
                </div> -->
                <div class="container">
                    <div class="row hero-content">
                        <div class="col-md-12">
                            <h1 class="">Servings made easy! <br> Shop your disposables here. <br> We offer quality - trust - best price.</h1>
                            <a href="https://www.youtube.com/watch?v=SG2NrfXJLoI" class="video-btn pc_video youtube-media" align="center"><i class="iconfont-camera" style="padding-right:6px;margin-top:10px;font-size:20px"></i> Watch Our Video</a>
                        </div>
                        <div class="col-md-12 ">
                            <a href="#about" class="use-btn learn ">Learn More<i class="iconfont-arrow-down"></i></a>
                            <a href="products" class="learn-btn ">Get Started<i class="iconfont-arrow-right"></i></a>
                        </div>
                          <div class="col-md-12">
                            <div class="col-sm-3 offer">
                                <img src="images/christ_offer.png" class="img-responsive" >
                            </div>
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
        <section class="features-intro"  >
            <div class="container-fluid" >
                <div class="row" style="background-color:#0099cc;padding:70px 30px 70px 30px">
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
                        <div class="col-md-12" style="margin-top:30px;" align="center" >
                           <a href="login" class="download-btn" style="background:#fff;color:#0099cc">Get started! <i class="iconfont-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                    

            </div>
        </section>
         <section class="download" id="assosiation" style="padding:70px 0px;background:#fff">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center wp4">
                        <h1 style="color:#999">OUR CLIENTS</h1>
                        
                    </div>
                </div>
            </div>
        </section>

    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden;margin-bottom:20px">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px; height: 100px; overflow: hidden;">
            <div><img u="image" alt="CHAITHELA" src="img/logo/ct.jpg" /></div>
            <div><img u="image" alt="VIVAHYDERABAD" src="img/logo/vh.jpg" /></div>
            <div><img u="image" alt="TRAVELKHANA" src="img/logo/tk.jpg" /></div>
            <div><img u="image" alt="SHOP2SURPRISE" src="img/logo/s2.jpg" /></div>
            <div><img u="image" alt="SCHOLARKART" src="img/logo/sk.jpg" /></div>
            <div><img u="image" alt="SATVIKO" src="img/logo/st.jpg" /></div>
            <div><img u="image" alt="TPOT" src="img/logo/tp.jpg" /></div>
            <div><img u="image" alt="AWESOMESTAYS" src="img/logo/as.jpg" /></div>
        </div>
        <a style="display: none" href="http://www.jssor.com">Image Slider</a>
    </div>

    <footer class="page-footer" style="border-top:1px solid #999">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-migrate.js"></script>
        <script type="text/javascript" src="js/jquery.form.min.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
   
    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 0,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 4,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseLinear,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 4000,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 140,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 100,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 7,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="js/home/min/toucheffects-min.js"></script>
 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
       
        <script src="js/home/min/scripts-min.js"></script>
        <script src="js/home/snowstorm.js"></script>
        
         
        <script type="text/javascript">

               $(document).ready(function() {

                $('#rest_reset_form').ajaxForm({
                success: function(res) { 
                  if(res==true){

                   $('#mail_sent').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
                    }
                    else{
                      $('#email_not_found').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
                         }
                },
                        error: function () {
                            $('#reset_failure').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
                        } 
                
            });
               $('#ad_reset_form').ajaxForm({ 
                success: function(res) { 
                    $('#contact_success').html(res).fadeIn( "slow" ).show().delay(5000).fadeOut(400);
                },
                        error: function () {
                            alert("error found");
                        } 
            });

                 $("#ad_register_btn").click(function(){
                    $("#ad_login").hide();
                     $("#ad_register").show();
                     $("#ad_reset").hide();
                     $(".modal-title").text('Sign-up to get started!');
                     $(".state_info").text('Already have an account?');
                     $(".button_info").text('Sign Up');
                     $(".register_forgot").hide();
                  
                     $("#ad_login_btn").show();
                     $("#ad_register_btn").hide();

                 });

                 $("#rest_reset_link").click(function(){
                    $("#rest_login").hide();
                     $("#rest_reset").show();
                     $(".modal-title").text('Reset Password');
                     $(".state_info").text('Already have an account?');
                 
                     $(".register_forgot").hide();
                  
                     $("#rest_login_btn").show();
                     $("#rest_register_btn").hide();

                 });

                 $("#rest_login_btn").click(function(){
                    $("#rest_login").show();
                     $("#rest_reset").hide();
                     $(".modal-title").text('Login to your account ');
                     $(".state_info").text("Don't have an account?");
                     $(".button_info").text('Log In');
                     $("#rest_login_btn").hide();
                     $("#rest_register_btn").show();
                     $(".register_forgot").show();

                 });

                 $("#ad_reset_link").click(function(){
                    $("#ad_login").hide();
                     $("#ad_reset").show();
                     $(".modal-title").text('Reset Password');
                     $(".state_info").text('Already have an account?');
                 
                     $(".register_forgot").hide();
                  
                     $("#ad_login_btn").show();
                     $("#ad_register_btn").hide();

                 });

                 $("#ad_login_btn").click(function(){
                    $("#ad_login").show();
                     $("#ad_register").hide();
                     $("#ad_reset").hide();
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

            });
            </script>

        <?php include("includes/login_popup.php"); ?>
        <div id="hiring" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog hiring_content" style="width:60%">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">We are Hiring!</h4>
                    </div>
                <div class="modal-body" style="padding:0">
                    <img src="images/hiring.jpg" class="img-responsive">
                </div>
            </div>
          </div>
        </div>


           
    </div></div></div>



        
    </body>
</html>