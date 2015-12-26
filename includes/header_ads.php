<!DOCTYPE html>
<html class="noIE" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Adurcup.com</title>
        <meta name="description" content="shop your disposables with best quality at affordable prices."/>
        <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <link href="css/login_popup.css" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-select.css">
        <link href="css/select2.min.css" rel="stylesheet" type="text/css">
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
        <script type="text/javascript" src="js/ajax_script.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    <link href="style.css" rel="stylesheet">

        <style>

    
    
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
        $(document).ajaxStart(function(){
            $('#spinner').show();
         }).ajaxStop(function(){
            $('#spinner').hide();
         });


    </script>




        <script id="script_e9">
    $(document).ready(function() {



                /*$(".makemodel a").bind("click", function(event){
                    var div_id=$(this).attr("id");
                    $.ajax({
                        type:'POST',
                        url: 'getinventory.php',
                        success: function(data){
                            changeContent($('#sort').val(), div_id);
                        }
                    });
                });*/


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

        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NGPKJQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NGPKJQ');</script>
        <!-- End Google Tag Manager -->

        
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
                                                        <i class="iconfont-search not-round-icon"></i>
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
                                                /* if($fgmembersite->CheckRestLogin()) {

                                                     $str1 = "<li class='dropdown'>
                                                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>";
                                                    $str2 = "<span class='caret'></span></a>
                                                    <ul class='dropdown-menu' role='menu'>
                                                      
                                                      <li><a href='#'>Settings</a></li>
                                                      <li><a href='logout.php'>Logout</a></li>
                                                      
                                                      
                                                      
                                                    </ul>
                                                    </li>";
                                                    echo $str1.$fgmembersite->storename().$str2;
                                                   
                                                    
                                                    
                                                    
                                                 }*/
                                                 if($fgmembersite->CheckAdLogin()) {

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
                                                    echo "<li data-toggle='sub-header' data-target='#sub-social'>
                                                    
                                                        <a href='#login-modal' id='modal-launcher'  data-toggle='modal' data-target='#login-modal'>
                                                            <i class='iconfont-user not-round-icon'></i>
                                                     
                                                        </a>
                                                    
                                                    
                                                   
                                                    </li>";
                                                    

                                                 }
                                                
                                                
                                                ?>

                                            </ul>
                                        </div>
                                        

                                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                                            <ul class="nav navbar-nav">
                                                <li >
                                                    <a class="active" href="products.php">Start Advertising</a>
                                                </li>
                                                <li>
                                                    <a class="" href="zone.php"><!-- <i class="iconfont-plus not-round-icon"></i> -->
                                                  How It Works</a>
                                                </li>
                                                <li>
                                                    <a href="contact.php" >Contact Us</a>
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
 
            </header>


                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header login_modal_header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h2 class="modal-title" id="myModalLabel">Login to Your Account</h2>
                            </div>
                            <div class="modal-body login-modal">
                                <p class="modal-body-p">Just sign in and get started!!</p>
                                
                                <br/>
                                <div class="clearfix"></div>
                                <div id='social-icons-conatainer'>
                                    <form action="<?php echo $fgmembersite->GetSelfScript(); ?>" id="login_forum" method="post">
                                        <input type='hidden' name='logsubmitted' id='logsubmitted' value='1'/>
                                        <div class='modal-body-left'>
                                            <div class="form-group">
                                                <input type="text" id="username" name="email" placeholder="Email" autocomplete="off" required value="" class="form-control login-field" style="padding-left:20%">
                                                <i class="iconfont-envelope login-field-icon"></i>
                                            </div>
                            
                                            <div class="form-group">
                                                <input type="password" id="login-pass" name="password" placeholder="Password" autocomplete="off" required value="" class="form-control login-field" style="padding-left:20%">
                                                <i class="iconfont-lock login-field-icon"></i>
                                            </div>
                            
                                            <button class="btn btn-success modal-login-btn"class="btn btn-success modal-login-btn">Login</button>
                                            <a href="#" class="login-link text-center">Lost your password?</a>
                                        </div>
                                    </form>
                                    <form action="<?php echo $fgmembersite->GetSelfScript(); ?>" id="reg_forum" method="POST">
                                        <input type='hidden' name='regsubmitted' id='regsubmitted' value='1'/>
                                        <div class='modal-body-signup-left'>
                                            <div class="form-group">
                                                <input type="text" id="username" name="username" autocomplete="off"  placeholder="Your Name " value="" class="form-control login-field" style="padding-left:20%"  data-bv-notempty="true" data-bv-notempty-message="Please enter your full name." >
                                                <i class="iconfont-user login-field-icon"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="email" name="email" autocomplete="off" required placeholder="Email" value="" class="form-control login-field" style="padding-left:20%" data-bv-emailaddress="true"
                                                data-bv-emailaddress-message="Not a valid email address" data-bv-notempty-message="Email is required">
                                                <i class="iconfont-envelope login-field-icon"></i>
                                            </div>
                            
                                            <div class="form-group">
                                                 <input type="password" id="login-pass" name="password" required autocomplete="off" placeholder="Password" value="" class="form-control login-field" style="padding-left:20%"                 data-bv-notempty="true"
                                                    data-bv-notempty-message="The password is required">
                                                 <i class="iconfont-lock login-field-icon"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="login-pass" name="confirmPassword" required autocomplete="off" placeholder="Confirm Password" value="" class="form-control login-field" style="padding-left:20%" data-bv-notempty="true"
                                                data-bv-notempty-message="The confirm password is required">
                                                <i class="iconfont-lock login-field-icon"></i>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label" id="captchaOperation" style="font-size:14px;padding-top:7px"></label>
                                                <div class="col-lg-7" style="padding-left:0;padding-right:0;padding-bottom:10px">
                                                    <input type="text" class="form-control" name="captcha"  placeholder="Enter Captcha"
                                                        data-bv-callback="true"
                                                        data-bv-callback-message="Wrong answer"
                                                        data-bv-callback-callback="checkCaptcha" />
                                                </div>
                                            </div>
                            
                                            <button type="submit" class="btn btn-success modal-login-btn">Register</button>
                                            
                                        </div>
                                    </form>
                                    
                                        <div class='modal-body-right'>
                                            <div class="modal-social-icons">
                                                <a href='#' class="btn  facebook"> <i class="iconfont-facebook"></i> Sign In with Facebook </a>
                                                <a href='#' class="btn  google"> <i class="iconfont-google-plus"></i> Sign In with Google </a>
                                                <a href='#' class="btn linkedin"> <i class="iconfont-linkedin"></i> Sign In with Linkedin </a>
                                            </div> 
                                        </div>  
                                    <div id='center-line'> OR </div>
                                </div>



                                <div class="clearfix"></div>
                                <div class="form-group modal-register-btn login-button">
                                    
                                    <a href="#" class="btn btn-success modal-login-btn"  id="login_form">Already a User? Login</a>
                                
                                </div>
                                
                                <div class="form-group modal-register-btn register-button" >
                                    
                                    <a href="#" class="btn btn-success modal-login-btn"  id="register_form">New User? Register</a>
                                
                                </div>
                                
                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer login_modal_footer">
                            </div>
                        </div>
                    </div>
                </div>

                

	<!-- // SITE HEADER -->
	
		<!-- BREADCRUMB -->
		
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->