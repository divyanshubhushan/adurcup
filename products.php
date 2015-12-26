<?php
  require_once("include/membersite_config.php");
require_once("includes/post_login.php");
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Shop Disposables - Adurcup.com</title>
        <meta name="description" content="shop your disposables with best quality at affordable prices."/>
        <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >
        <link href="css/login_popup.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
        

        <link rel="stylesheet" href="css/jquery.nouislider_product.css">

        <link rel=" stylesheet" href="css/isotope_product.css">
       
        <link rel="newer stylesheet" href="css/innerpage_product.css">

        <link rel="stylesheet" href="css/responsive_product.css">
        <link rel="stylesheet" href="css/minified.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" type="text/css" href="css/default_hover.css" />
        <link rel="stylesheet" type="text/css" href="css/component_hover.css" />
         <script src="js/modernizr.custom_hover.js"></script>

    
    <style>
    

    
#top-link-block.affix-top {
    position: absolute; /* allows it to "slide" up into view */
    bottom: -82px;
    right: 10px;
}
#top-link-block.affix {
    position: fixed; /* keeps it on the bottom once in view */
     bottom: 8%;
    right: 10px;
}
</style>
   

    <style>
    .nav-tabs > li > a{
        padding: 1em 1em;
    }
    .panel{
        margin-bottom: 0px;
        border: none;
    }
    #loader-icon {position: relative;top: 50%;width:100%;height:100%;text-align:center;display:none;}
     @media (min-width:768px) {

            .container{
                    width: 1170px ;
                }
                .m-t-b{
                    margin: 10px 0px;
                }
                
                .col-md-3{
                    width: 23%;
                    margin:1%;
                }
    }

    }
     @media (max-width:768px) {
    .col-xs-6{
                    width: 48%;
                    margin:1%;
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
<body class="products-view">
            
    <!-- PAGE WRAPPER -->

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
                                            <img alt="Adurcup Logo" width="100" height="45" data-sticky-width="100" data-sticky-height="70" src="img/logo.png">
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
                                                        <span class="cart_number"></span>
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

                                                            <div class='btn-group user' >
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
                                                                <a class='btn btn-mini' href='aduser/index.php' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>
                                                        
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

                </div>
 
            </header>



            <main id="main-content" role="main">
                <div class="container">
                    <div class="row">
                        
                        <div class="m-t-b clearfix">
                            <!-- SIDEBAR -->
                            <aside class="col-xs-12 col-md-3" style="padding-left:0">
                                <section class="sidebar push-up">
                                
                                    <!-- CATEGORIES -->
                                    <section class="side-section bg-white">
                                        <header class="side-section-header" style="background:#0099cc;border-radius:7px 7px 0 0">
                                            <h3 class="side-section-title">PRODUCT FILTERS</h3>
                                        </header>
                                        <div class="divbox divbox1" style="background:#f9f9f9">
                                            <div style="display:none;" class="productCategoryLeftPanel"></div>
                                            <form name="frm_filter" id="frm_filter" method="post" action="">
                                            <div class="productCategoryLeftPanel" id="productCategoryLeftPanel">
                                                        
                                                        <div style="padding-top:10px">
                                                            <?php include 'pageportion/show-filters.php';  ?>
                                                        </div>
                                                        
                                                            

                                                            
                                                       
                                                        
                                                        <div class="pro_cat_title" style="padding:10px 0px 0 0px">                   
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseBrand">
                                                                     <h4 class="panel-title">
                                                                        <a href="#">
                                                                            CATEGORIES<span class="iconfont-chevron-down " id="brand_arrow_up_down" style="float:right;line-height:20px"></span>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseBrand" class="panel-collapse collapse " style="background:#F9F9F9 none repeat scroll 0% 0%">
                                                                     <span class="spanbrandcls" style="float:right;margin-right:10px;visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span>
                                                                    <?php include 'pageportion/brands.php';  ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pro_cat_title" style="padding:10px 0px 0 0px">                   
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSize">
                                                                     <h4 class="panel-title">
                                                                        <a href="#">
                                                                            MATERIAL  <span class="iconfont-chevron-down" id="size_arrow_up_down" style="float:right;line-height:20px"></span>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseSize" class="panel-collapse collapse" style="background:#F9F9F9 none repeat scroll 0% 0%">
                                                                     <span class="spansizecls" style="float:right;margin-right:10px;visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span>
                                                                    <?php include 'pageportion/sizes.php';  ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="pro_cat_title" style="padding:10px 0px 0 0px">                   
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsePrice">
                                                                     <h4 class="panel-title">
                                                                        <a href="#">
                                                                            PRICE  <span class="iconfont-chevron-down " id="price_arrow_up_down" style="float:right;line-height:20px"></span>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapsePrice" class="panel-collapse collapse">
                                                                     <span class="spanpricecls" style="float:right;margin-right:10px;visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span>
                                                                    <?php include 'pageportion/prices.php';  ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                       
                                              </div>
                                              </form>
                                        </div>
                                    
                                      

                                        
                                        <footer class="side-section-footer text-center hide">
                                            <button type="button" id="btn-filter-cat" class="btn btn-primary btn-round uppercase">Clear Filters</button>
                                        </footer>
                                    </section>
                                    
                                </section>
                            </aside>
                            <!-- // SIDEBAR -->
                            <section class="col-xs-12 col-md-9" style="padding-left:0">
                                
                                <section class="products-wrapper">
                              
                                    
                                  
                                    <!-- PRODUCT LAYOUT -->
                                            
                                    <div id="loaderID" style="position:absolute; top:20%; left:45%; z-index:2; opacity:0"><img src="img/loading.gif" /></div>
                                                                      
                                    <div class="products-layout grid add-cart" id="productContainer">
                                        
                                        
                                        <?php include('getresult.php'); ?>
                                        
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div id="loader-icon"><img src="loader.gif" /><div>   
                                    <!-- // PRODUCT LAYOUT -->
                                </section>
                                
                            </section>
                        </div>
                        
                    </div>
                </div>
            </main>
            <footer class="page-footer">
               
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
        </div>
        <span id="top-link-block" class="hidden">
            <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;" style="background-color:#0088CC;color:#fff;border-radius:6px">
                <i class="iconfont-chevron-up"></i>Top
            </a>
        </span>

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
        <script src="js/home/min/scripts-min.js"></script>


        <!-- Essential Javascripts -->
        <script src="js/minified.min.js"></script>
        <!-- // Essential Javascripts -->

        <script type="text/javascript">
            
            $(document).ready(function() {
            
            	var scrollTop = localStorage.getItem('scrollTop');
			if (scrollTop !== null) {
			        $(window).scrollTop(Number(scrollTop));
			        localStorage.removeItem('scrollTop');
			    }
			    


                function getresult(url) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        data:  {rowcount:$("#rowcount").val()},
                        beforeSend: function(){
                        $('#loader-icon').show();
                        },
                        complete: function(){
                        $('#loader-icon').hide();
                        },
                        success: function(data){
                        $("#productContainer").append(data);
                        },
                        error: function(){
                           
                        }             
                   });
                }
                $(window).scroll(function(){
                    if ($(window).scrollTop() == $(document).height() - $(window).height()){
                         if(! $.active){
                             var pagenumber = $(".pagenum:last").val();
                            var totalpage = $(".rowcount").val();
                            var pagenum = parseInt(pagenumber) + 1;
                          
                            if(pagenum-1 <= totalpage) {
                               
                                getresult('getresult.php?page='+pagenum);
                            }

                         }
                       
                    }
                }); 

            

                    $("#collapseBrand").on("hide.bs.collapse", function(){

                    $("#brand_arrow_up_down").addClass( "iconfont-chevron-down" );
                    $("#brand_arrow_up_down").removeClass( "iconfont-chevron-up" );
                  });
                  $("#collapseBrand").on("show.bs.collapse", function(){
                    $("#brand_arrow_up_down").addClass( "iconfont-chevron-up" );
                    $("#brand_arrow_up_down").removeClass( "iconfont-chevron-down" );
                  });
                   $("#collapsePrice").on("hide.bs.collapse", function(){

                    $("#price_arrow_up_down").addClass( "iconfont-chevron-down" );
                    $("#price_arrow_up_down").removeClass( "iconfont-chevron-up" );
                  });
                  $("#collapsePrice").on("show.bs.collapse", function(){
                    $("#price_arrow_up_down").addClass( "iconfont-chevron-up" );
                    $("#price_arrow_up_down").removeClass( "iconfont-chevron-down" );
                  });
                   $("#collapseSize").on("hide.bs.collapse", function(){

                    $("#size_arrow_up_down").addClass( "iconfont-chevron-down" );
                    $("#size_arrow_up_down").removeClass( "iconfont-chevron-up" );
                  });
                  $("#collapseSize").on("show.bs.collapse", function(){
                    $("#size_arrow_up_down").addClass( "iconfont-chevron-up" );
                    $("#size_arrow_up_down").removeClass( "iconfont-chevron-down" );
                  });
                 
               
                    

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

                $('.dropdown-toggle').dropdown();
                
                
                
                    function showValues() {
        $("#productContainer").css("opacity",0.5);
        $("#loaderID").css("opacity",1);
        
        //e.css('visibility','visible');
        
                
        var mainarray = new Array();
        
        var brandarray = new Array();       
        $('input[name="bcheck"]:checked').each(function(){          
            brandarray.push($(this).val());     
            $('.spanbrandcls').css('visibility','visible');         
            //alert($(this).attr("checkboxname"));  
        });
        if(brandarray=='') $('.spanbrandcls').css('visibility','hidden');
        var brand_checklist = "&bcheck="+brandarray;
                
        var sizearray = new Array();        
        $('input[name="scheck"]:checked').each(function(){          
            sizearray.push($(this).val());  
            $('.spansizecls').css('visibility','visible');  
        });
        if(sizearray=='') $('.spansizecls').css('visibility','hidden');
        var size_checklist = "&scheck="+sizearray;
        
        
        var colorarray = new Array();       
        $('input[name="ccheck"]:checked').each(function(){          
            colorarray.push($(this).val());
            $('.spancolorcls').css('visibility','visible');     
        });
        if(colorarray=='') $('.spancolorcls').css('visibility','hidden');
        var color_checklist = "&ccheck="+colorarray;
        
        
        var pricearray = new Array();       
        $('input[name="price_range"]:checked').each(function(){         
            pricearray.push($(this).val());
            $('.spanpricecls').css('visibility','visible');     
        });
        if(pricearray=='') $('.spanpricecls').css('visibility','hidden');
        var price_checklist = "&price_range="+pricearray;
        
        var main_string = brand_checklist+size_checklist+color_checklist+price_checklist;
        main_string = main_string.substring(1, main_string.length)
        //alert(main_string);
        
        
        $.ajax({
            type: "POST",
            url: "filter_products.php",
            data: main_string, 
            cache: false,
            success: function(html){
                //alert(html);
                $("#productContainer").html(html);      
                $("#productContainer").css("opacity",1);
                $("#loaderID").css("opacity",0);
                
                
                
            }
            });
        
        
    }
    
    $(document).ready(function() {
    function showValues() {
        $("#productContainer").css("opacity",0.5);
        $("#loaderID").css("opacity",1);
        
        //e.css('visibility','visible');
        
                
        var mainarray = new Array();
        
        var brandarray = new Array();       
        $('input[name="bcheck"]:checked').each(function(){          
            brandarray.push($(this).val());     
            $('.spanbrandcls').css('visibility','visible');         
            //alert($(this).attr("checkboxname"));  
        });
        if(brandarray=='') $('.spanbrandcls').css('visibility','hidden');
        var brand_checklist = "&bcheck="+brandarray;
                
        var sizearray = new Array();        
        $('input[name="scheck"]:checked').each(function(){          
            sizearray.push($(this).val());  
            $('.spansizecls').css('visibility','visible');  
        });
        if(sizearray=='') $('.spansizecls').css('visibility','hidden');
        var size_checklist = "&scheck="+sizearray;
        
        
        var colorarray = new Array();       
        $('input[name="ccheck"]:checked').each(function(){          
            colorarray.push($(this).val());
            $('.spancolorcls').css('visibility','visible');     
        });
        if(colorarray=='') $('.spancolorcls').css('visibility','hidden');
        var color_checklist = "&ccheck="+colorarray;
        
        
        var pricearray = new Array();       
        $('input[name="price_range"]:checked').each(function(){         
            pricearray.push($(this).val());
            $('.spanpricecls').css('visibility','visible');     
        });
        if(pricearray=='') $('.spanpricecls').css('visibility','hidden');
        var price_checklist = "&price_range="+pricearray;
        
        var main_string = brand_checklist+size_checklist+color_checklist+price_checklist;
        main_string = main_string.substring(1, main_string.length)
        //alert(main_string);
        
        
        $.ajax({
            type: "POST",
            url: "filter_products.php",
            data: main_string, 
            cache: false,
            success: function(html){
                //alert(html);
                $("#productContainer").html(html);      
                $("#productContainer").css("opacity",1);
                $("#loaderID").css("opacity",0);
                
                
                
            }
            });
        
        
    }


        var checkbox = $("input[type=checkbox]");
                for (var i = 0; i < checkbox.length; i++) {
                    var box = checkbox[i];
                    if (box.hasAttribute("checkboxname")) {
                        setupBox(box);
                    }
                }
                function setupBox(box) {
                    var storageId = box.getAttribute("checkboxname");
                    var oldVal    = localStorage.getItem(storageId);

                    box.checked = oldVal === "true" ? true : false;
                    
                    box.addEventListener("change", function() {
                        localStorage.setItem(storageId, this.checked); 
                    });
                        var is_checkbox = $("input[type=checkbox]:checked").length;
                        if(is_checkbox>0){
                            showValues();
                        }
                   
                       
                        
                    
                }


    
    $("input[type='checkbox'], input[type='radio']").on( "click", showValues );
    $("select").on( "change", showValues );
    
    
    $(".spanbrandcls").click(function(){
        $('.bcheck').removeAttr('checked');             
        showValues();
        $('.spanbrandcls').css('visibility','hidden');
    });
    $(".spansizecls").click(function(){
        $('.scheck').removeAttr('checked'); 
        showValues();
        $('.spansizecls').css('visibility','hidden');
    });
    $(".spancolorcls").click(function(){
        $('.ccheck').removeAttr('checked'); 
        showValues();
        $('.spancolorcls').css('visibility','hidden');
    });
    $(".spanpricecls").click(function(){
        $('.price_range').removeAttr('checked'); 
        showValues();
        $('.spanpricecls').css('visibility','hidden');
    });
    $(".clear_filters").click(function(){
        $('#productCategoryLeftPanel').find('input[type=checkbox]:checked').removeAttr('checked');
        $('#productCategoryLeftPanel').find('input[type=radio]:checked').removeAttr('checked');
        showValues();
    });
    
}); 
    
    $("input[type='checkbox'], input[type='radio']").on( "click", showValues );
    $("select").on( "change", showValues );
    
    
    $(".spanbrandcls").click(function(){
        $('.bcheck').removeAttr('checked'); 
        localStorage.clear();            
        showValues();
        $('.spanbrandcls').css('visibility','hidden');
    });
    $(".spansizecls").click(function(){
        $('.scheck').removeAttr('checked'); 
        showValues();
        $('.spansizecls').css('visibility','hidden');
    });
    $(".spancolorcls").click(function(){
        $('.ccheck').removeAttr('checked'); 
        showValues();
        $('.spancolorcls').css('visibility','hidden');
    });
    $(".spanpricecls").click(function(){
        $('.price_range').removeAttr('checked'); 
        showValues();
        $('.spanpricecls').css('visibility','hidden');
    });
    $(".clear_filters").click(function(){
        $('#productCategoryLeftPanel').find('input[type=checkbox]:checked').removeAttr('checked');
        $('#productCategoryLeftPanel').find('input[type=radio]:checked').removeAttr('checked');
        localStorage.clear();
        showValues();
    });
                
                

                
            });
        </script>
            <script>
// Only enable if the document has a long scroll bar
// Note the window height + offset
if ( ($(window).height() + 100) < $(document).height() ) {
    $('#top-link-block').removeClass('hidden').affix({
        // how far to scroll down before link "slides" into view
        offset: {top:100}
    });
}
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/55c290633bebe0ba0d40e7e3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        <!-- Particular Page Javascripts -->
        <script src="js/jquery.nouislider.js"></script>

        <script src="js/products.js"></script>
       
        <!-- // Particular Page Javascripts -->

        <?php include("includes/login_popup.php"); ?>
                                        
</body>


</html>