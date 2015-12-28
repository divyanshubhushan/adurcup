<?php
require_once("include/membersite_config.php");
if($fgmembersite->CheckRestLogin())
{

   header('Location: myzone'); 


}
if(isset($_POST['rest_logsubmitted']))
{


       if($fgmembersite->RestLogin())  // take order
       {

         header('Location:myzone');  

     }
     else{
       echo "


       <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
       <a href='#'' class='close' data-dismiss='alert'>&times;</a>
       <strong>Oh snap!</strong> Wrong login credentials and try submitting again.
       </div>";

   }

}

if(isset($_POST['ad_logsubmitted']))
{


       if($fgmembersite->AdLogin())  // take order
       {

         header('Location:adsearch');  

     }
     else{
       echo "


       <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
       <a href='#'' class='close' data-dismiss='alert'>&times;</a>
       <strong>Oh snap!</strong> Wrong login credentials and try submitting again.
       </div>";

   }

}
if(isset($_POST['ad_regsubmitted']))
{

    if($fgmembersite->AdRegister())
    {
        echo "


        <div class='alert alert-success' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
        <strong>Great!</strong> You have successfully registered.
        </div>";

    }
    else{
       echo "


       <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
       <a href='#'' class='close' data-dismiss='alert'>&times;</a>
       <strong>Sorry!</strong> Something went wrong! Please try Again.
       </div>";

   }

}
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login - Adurcup.com</title>
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

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-61830649-1', 'auto');
          ga('send', 'pageview');
        
        </script>


    <link rel="stylesheet" href="dist/css/magnific-popup.css"> 
    <link rel="stylesheet" type="text/css" href="css/component.css" />

   

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href="css/minified.css" rel="stylesheet">



    <style>
    .product{
        border: none;
    }
    .nav-tabs > li > a{
        padding: 1em 1em;
    }
     @media (min-width:768px) {

            .container{
                    width: 1170px ;
                }
                .m-t-b{
                    margin: 10px 0px;
                }
                .col-md-3{
                    width: 25%;
                }

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
.fragment {
    font-size: 12px;
    font-family: tahoma;
    height: 140px;
    border: 1px solid #ccc;
    color: #555;
    display: block;
    padding: 10px;
    box-sizing: border-box;
    text-decoration: none;
}

.fragment:hover {
    box-shadow: 2px 2px 5px rgba(0,0,0,.2);

}

.fragment img { 
    float: left;
    margin-right: 10px;
}


.fragment h3 {
    padding: 0;
    margin: 0;
    color: #369;
}
.fragment h4 {
    padding: 0;
    margin: 0;
    color: #000;
}
#close {
    float:right;
    display:inline-block;
    padding:2px 5px;
    background:#ccc;
}
    </style>








<!-- PARTICULAR PAGES CSS FILES -->


<link href="css/innerpage.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
<link href="css/responsive.css" rel="stylesheet">
<link href="css/scrolling-nav.css" rel="stylesheet">
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
                                                <!-- <li>
                                                    <a class="" href="#">Offers</a>
                                                </li> -->
                                                <li>
                                                    <a class="" href="help">Help</a>
                                                </li>
                                                <!-- <li>
                                                    <a class="" href="#">Pre-Book Ad</a>
                                                </li> -->

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

            <!-- // SITE HEADER -->

            <!-- SITE MAIN CONTENT -->
            <main id="main-content" role="main" style="padding-top:10px">


            <div id="login-modal">

                                            <div class="modal-dialog sign_up_modal" >

                                                <div class="modal-content">
                                                    <div class="modal-header login_modal_header " style="background-color:#F5F5F5">
                                                      <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>x</span>

                                                        <h2 class="modal-title" id="myModalLabel" style="font-size:1.5em">Login to your account </h2>
                                                        <?php echo isset($response) ? $response: '';?>
                                                        <!-- CONTACT FORM ALERTS -->
                                                        <div class="alert alert-success" id="mail_sent" style="display: none;">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <div class="alert-inner">
                                                            <strong>Thanks,</strong> Your Password is reset successfully. Check your mail.
                                                          </div>
                                                        </div>
                                                        <!-- /success msg -->
                                                        <!-- CONTACT FORM ALERTS -->
                                                        <div class="alert alert-warning" id="email_not_found" style="display: none;">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <div class="alert-inner">
                                                            <strong>Sorry!</strong> Email not found.
                                                          </div>
                                                        </div>
                                                        <!-- /success msg -->
                                                        <!-- CONTACT FORM ALERTS -->
                                                        <div class="alert alert-danger" id="reset_failure" style="display: none;">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <div class="alert-inner">
                                                            <strong>Error!</strong>Please try again.
                                                          </div>
                                                        </div>
                                                        <!-- /success msg -->
                                                    </div>

                                                    <div class="modal-body login-modal" >
                                                        <div class="tabbable">
                                                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                                                <li class="active"><a href="#pane1" data-toggle="tab" style="font-size:14px;text-transform:none;font-weight:400">I am a Restaurant</a></li>
                                                                <li><a href="#pane2" data-toggle="tab" style="font-size:14px;text-transform:none;font-weight:400">I am an Advertiser</a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div id="pane1" class="tab-pane active">
                                                                    <div id='rest_login' style="padding-top:15px">
                                                                         <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="login_forum" method="post" name="login_forum">
                                                                            <input id='rest_logsubmitted' name='rest_logsubmitted' type='hidden' value='1'>

                                                                            <div class='modal-body-center'>
                                                                                <div class="form-group">
                                                                                    <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                    value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <input autocomplete="off" class="form-control login-field" id="login-pass" name="password" placeholder="Password" required="" style="padding-left:20%" type=
                                                                                    "password" value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                </div><button class="btn btn-success modal-login-btn">Log In</button> <a class=" text-center" id="rest_reset_link" style="text-decoration:underline" href="#">Lost your password?</a>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                     <div id='rest_reset'  style="padding-top:15px;display:none">
                                                                             <form action="post_reset.php" id="rest_reset_form" method="post" name="rest_reset_form">
                                                                                <input id='rest_resetsubmitted' name='rest_resetsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center' style="padding:10% 4% 7% 4%">
                                                                                    <div class="form-group" style="margin-bottom:26px">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                   <button class="btn btn-success modal-login-btn">Reset Password</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                

                                                                    <div class="form-group">
                                                                        <p class="state_info" style="float:left;margin-top:10px;padding-left:30px;font-size:14px">Don't have an account?</p>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px;display:none" href="#" id="rest_login_btn">Login</a>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px" href="zone" id="rest_register_btn">Register</a>
                                                                    </div>
                                                                </div>
                                                                <div id="pane2" class="tab-pane">
                                                                     
                                                                        <div id='ad_login'  style="padding-top:15px">
                                                                             <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="ad_login_form" method="post" name="ad_login_form">
                                                                                <input id='ad_logsubmitted' name='ad_logsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center'>
                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="login-pass" name="password" placeholder="Password" required="" style="padding-left:20%" type=
                                                                                        "password" value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                    </div><button class="btn btn-success modal-login-btn">Log In</button> <a class=" text-center" id="ad_reset_link" style="text-decoration:underline" href="#">Lost your password?</a>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                         <div id='ad_reset'  style="padding-top:15px;display:none">
                                                                             <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="ad_reset_form" method="post" name="ad_reset_form">
                                                                                <input id='ad_resetsubmitted' name='ad_resetsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center' style="padding:10% 4% 7% 4%">
                                                                                    <div class="form-group" style="margin-bottom:26px">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                   <button class="btn btn-success modal-login-btn">Reset Password</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div id='ad_register'  style="padding-top:15px;display:none">
                                                                             <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="ad_reg_form" method="post" name="ad_reg_form">
                                                                                <input id='ad_regsubmitted' name='ad_regsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-center'>

                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="name" name="name" placeholder="Full Name" required="" style="padding-left:20%" type="text"
                                                                                        value=""> <i class="iconfont-user login-field-icon"></i>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="email" name="email" placeholder="Email" required="" style="padding-left:20%" type="email"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                
                                                                                 
                                                                                        <div class="form-group">
                                                                                           <input autocomplete="off" class="form-control login-field" id="contact" name="contact" placeholder="Mobile no." required="" style="padding-left:20%" type="number"
                                                                                            value=""> <i class="iconfont-mobile login-field-icon"></i>
                                                                                        
                                                                                        </div>
                                                                                    
                                                                                        <div class="form-group">
                                                                                           <input autocomplete="off" class="form-control login-field" id="password" name="password" placeholder="Password" type="password" required="" style="padding-left:20%"
                                                                                            value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                        
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                           <input autocomplete="off" class="form-control login-field" id="confirmpassword" name="confirmpass" type="password" placeholder="Confirm Password" required="" style="padding-left:20%" type="text"
                                                                                            value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                        
                                                                                        </div>

                                                                                    


                                                                                    <button class="btn btn-success modal-login-btn button_info" type="submit">Log In</button> <a class="login-link register_forgot text-center" style="text-decoration:underline" href="#">Lost your password?</a>
                                                                                </div>
                                                                            </form>
                                                                        </div>


                                                                     <div class="form-group">
                                                                        <p class="state_info" style="float:left;margin-top:10px;padding-left:30px;font-size:14px">Don't have an account?</p>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px;display:none" href="#" id="ad_login_btn">Login</a>
                                                                        <a class="btn btn-success  modal-register-btn register-button" style="margin-right:20px" href="#" id="ad_register_btn">Register</a>
                                                                    </div>

                                                                </div>
                                                               
                                                            </div>
                                                           
                                                        </div>
                                                       

                                                        
                                                       
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div class="modal-footer login_modal_footer"></div>
                                                </div>
                                            </div>
                                        </div>



            
            </main>
            <!-- // SITE MAIN CONTENT -->
            
            <!-- SITE FOOTER -->

        <!-- // SITE FOOTER -->
        
    </div>
    <!-- // PAGE WRAPPER -->

 <footer class="page-footer" style="margin-top:40px">
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

                 $("#rest_reset_link").click(function(e){
                  e.preventDefault();
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

                 $("#ad_reset_link").click(function(e){
                 e.preventDefault();
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
        <!-- Particular Page Javascripts -->
        <script src="js/jquery.nouislider.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/products.js"></script>
        <!-- // Particular Page Javascripts --> 
  <script src="js/product_spinner.js"></script>


  <!-- // Disqus -->

</body>

</html>