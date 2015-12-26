<?php
    require_once("include/membersite_config.php");
    include("includes/post_login.php");
        if (isset($_GET['signup'])) {
            if ($_GET['signup'] == 'success') {
                 echo "
         <div class='alert alert-success col-md-6 col-md-offset-3' align='center' style='position:absolute;top:0;z-index:9999'>
        <a href='#' class='close' data-dismiss='success'>&times;</a>
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
        <base href="http://www.adurcup.com">
        <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >
        <meta content="Shop your disposables here.We offer quality - trust - best price." name="description">
        <meta content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com" name="keywords">
        <meta name="author" content="Harshit Mittal" />
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
            <section>
                <div class="row nav-wrapper">
                    <div class="col-sm-12" >
                        <a class="logo" href="http://www.adurcup.com" style="padding-left:100px" ><img  src="img/home/logo.png" alt="Adurcup home" ></a>

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
                                        <a class='btn btn-mini' href='adsearch' style='background-color:#F0F0F0'><i class='fa fa-home' style='padding-right:6px;font-size:18px'></i>
                                
                                   ";
                                $str2 = "
                                    </a>
                                        <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                        <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu'>
                                             <li><a href='adsearch'>Account</a></li>
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
            
            </section>
        </header>
        <section>
            <div class="container cl404" style="min-height:500px;padding-top:10px">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/minion.png" >

                           </div>

                           <div class="col-md-6 error-box" style="padding-top:80px">
                               <div class="col-md-12 " >
                                    <p class="error-msg" style="font-size:3em;,margin:0em">ERROR (404) </p>
                                    <br><h1>Sorry! We can't find the page you are looking for.</h1>
                                </div>
                                <div class="col-md-12 ">
                                    <a href="http://www.adurcup.com" class="use-btn error-back "><i class="iconfont-arrow-left" style="padding-right:5px"></i>Back to home</a>
                                   
                                </div>
                           </div> 
                           
                        </div>
                    
                    </div>
             </div>
        </section>

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

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="js/home/min/toucheffects-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
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
