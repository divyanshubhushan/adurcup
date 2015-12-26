<?php 
require_once("include/membersite_config.php");
if(!$fgmembersite->CheckRestLogin())
{
    if(!$fgmembersite->CheckAdLogin())
    {
        header('Location: login'); 
        exit();
    }
    else{
     header('Location: adsearch'); 
     exit();
 }
}

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

    <!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/minified.min.js"></script>
  <script src="js/docs.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/jquery.nouislider.js"></script>
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
    <script type="text/javascript" src="js/jquery.wallform.js"></script>
   
   
    <link href="style.css" rel="stylesheet">

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
   
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>

     #map-canvas {
        overflow: hidden;
        height: 160px;
     }  
     .cover-wrapper {
        position: relative;
        width: 100%;
        border-radius: 7px;
        overflow: hidden;
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
        /* use navbar-wrapper to wrap navigation bar, the purpose is to overlay navigation bar above slider */
        .navbar-wrapper {
            position: absolute;
            left: 0;
            width: 100%;
            height: 50px;
        }
        .navbar-wrapper > .container {
            padding: 0;
        }
        .infobar {
            position: absolute;
            top: 418px;
            left: 0;
            width: 100%;
        }
        .infobar > .container {
            padding: 0;
            width: 100%;
        }
        .black {
            position: absolute;
            left: 0;
            width: 100%;
        }
        .black > .container {
            padding: 0;
            width: 100%;
        }

        #circle {
            border-radius: 50% 50% 50% 50%;
            width: 80px;
            height: 80px;
        }

        #icon {
            border-radius: 50% 50% 50% 50%;
            width: 40px;
            height: 40px;
        }

        .wrapper {
        position: relative;
        background: #fff;
        overflow-x: hidden;
        padding:2em 0 0 0;
        }

        .image-wrapper {
            position: relative;
        }

        .image-wrapper .image {
            position: relative;
            z-index: 2;
        }

        .image-wrapper.first:before {
            content: '';
            display: block;
            width: 2000%;
            height: 100%;
            position: absolute;
            left: -1000%;
            top: 0;
            z-index: 1;
            background: #fff url("img/image-wrapper.svg");
        }

        @media all and (max-width: 768px ){
            .navbar-wrapper {
                position: relative;
                top: 0px;
            }
        }


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
    .previeww
    {
    width:150px;
    height: 150px;
    border:solid 1px #dedede;
    padding:10px;
    }
    #previeww
    {
    color:#cc0000;
    font-size:12px
    }

    .more{
        background:#FFEFC3 none repeat scroll 0% 0%;
        color:#6D6D6D;
        line-height:150px;
        font-size:40px;
        text-align:center;
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

        document.getElementById("button").click();
        e.preventDefault(); // Or whatever
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
         $('#cover_form').ajaxForm({
            beforeSend: function(e){
                $('#loader').show();
                $('#button').attr('disabled', 'disabled');
                
            },
            success: function(e){
                $('#loader').hide();

               window.location.reload();
                
            },
            error: function(e){
                 
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
    $("#advance").click(function(){
                    $("#advance_content").toggle(500);
                });
                 

    $('#photoimg').die('click').live('change', function()           { 
                       //$("#preview").html('');
                
                $("#imageform").ajaxForm({target: '#preview', 
                     beforeSubmit:function(){ 
                    
                    console.log('v');
                    $("#imageloadstatus").show();
                     $("#imageloadbutton").hide();
                     }, 
                    success:function(){ 
                    console.log('z');
                     $("#imageloadstatus").hide();
                     $("#imageloadbutton").show();
                    }, 
                    error:function(){ 
                            console.log('d');
                     $("#imageloadstatus").hide();
                    $("#imageloadbutton").show();
                    } }).submit();
                    
        
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

            <div class="header-top" style="box-shadow:none;z-index:999">
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
                                                <a href="javascript:void(0);" id="total-cart">
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
                                              <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown' >
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
                                                    <a href="contact">Contact Us</a>
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
                                
                            </div>
                        </nav>
                    </div>

                </div>

                    <!-- ADD TO CART MESSAGE -->

                    <!-- // ADD TO CART MESSAGE -->
            </div>
                <!-- // MAIN HEADER -->
        </header>

        <main id="main-content" role="main">

            
                    <div class='page-wrapper'  >
                        <div class='timeline-header-wrapper'>
                            <div class='cover-container' id="niktin" style="border-radius: 5px;">

                                <div id="yahoo">
                                    <?= $fgmembersite->cover_pic(); ?> 
                                    
                                </div>

                                <div id='preview' style='display:none'></div>
                                <div id='preview2' style='display:none'></div>
                                <nav class='navbar black_nav ' style='margin-bottom: 0px;background:#000;opacity:0.8;border:none;top:-105px'>
                                    <div class='container'>
                                                        
                                                        <p class='details' style='float:left;color:white;margin:9px 0 10px 0;'>
                                                            <span class='rest_name' style='font-size:30px'><?= $fgmembersite->storename(); ?> </span></br>
                                                            <?= $fgmembersite->address(); ?></br>
                                                            <?= $fgmembersite->sub_location(); ?> , <?= $fgmembersite->location(); ?>
                                                        </p>
                                                        <p  style='color:white;margin:9px 0 10px 0;float:right' align='center'>
                                                            <span class='ratings' style='font-size:42px;'>N.A.</span></br>
                                                            <img class='rating_img' src='img/stars.png'>
                                                        </p>
                                    </div>
                                </nav>

                                
                            </div>
                        </div>
                    </div>
 
                
        

                <div class="wrapper 3buttons" style="padding-left:0;padding-right:0;padding-top:10px;top:-70px">
                    <div class="container" align="center" style="padding:0">
                        <div class="col-md-11" align="center" style="padding:0">
                            <a href="create_event" class="col-sm-2 col-sm-offset-1" style="border-radius:10px;background:#666;color:#fff;height:40px;padding-top:10px">
                                Create Event
                            </a>
                            <a href="edit" class="col-sm-2 col-sm-offset-1" style="border-radius:10px;background:#666;color:#fff;height:40px;padding-top:10px">
                                Edit Profile
                            </a>

                            <a id="jump_to_previous" class="col-sm-2 col-sm-offset-1" style="border-radius:10px;background:#666;color:#fff;height:40px;padding-top:10px">
                                Previous orders
                            </a>
                            <a href="products" class="col-sm-2 col-sm-offset-1" style="border-radius:10px;background:#666;color:#fff;height:40px;padding-top:10px">
                                Order Now
                            </a>

                        </div>
                    </div>
                </div>

              
                <div class="wrapper">
                   <div class="container" align="center">
                        <hr class="featurette-divider">
                        <p style="font-size:18px;margin-top:-32px;color:#999;background:#fff;width:200px">Uploaded Images</p>
                        <!-- The file upload form used as target for the file upload widget -->
                        <form id="fileupload" action="server/php/" method="POST" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar" align="center">
                                <div class="col-lg-12 ">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add Images...</span>
                                        <input type="file" name="files[]" multiple>
                                    </span>
                                    
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->
                            
                        </form>
                        <br>
                        
                    </div>
                    <!-- The blueimp Gallery widget -->
                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                    </div>
                </div>
               

               
                    <div class="container" align="center" id="previous_orders">
                    <hr class="featurette-divider">
                        <p style="font-size:18px;margin-top:-32px;color:#999;background:#fff;width:150px">Previous Orders</p>
                            <table class='table table-hover' style='border-radius:10px;overflow:visible;'>
                                <thead class='well panel-title '>
                                    <tr style='background:#ccc;'>
                                        <td><b>#</b></td>
                                        <td><b>Order Date</b></td>
                                        <td><b>Order No.</b></td>
                                        <td><b>Amount</b></td>
                                      
                                        <td><b>Status</b></td>
                                        <td><b>Action</b></td>
                                    </tr>
                           
                                </thead>
                                <tbody>
                                    <?= $fgmembersite->get_cod_orders(); ?>
                                </tbody>
                            </table>
                                
                        
                    </div>
               
                

            <div id="spinner">
                <img src="images/spinner.gif" alt="Loading" />
            </div>
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
        </main>
    </div>

    <?php include("includes/login_popup.php"); ?>
    
    
    <script type="text/javascript">
            
            $(document).ready(function() {

                $('.dropdown-toggle').dropdown();
            });

    </script>



    <script type="text/javascript" src="js/jquery.wallform.js"></script>


    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
       
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
</script>


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->

<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="js/main.js"></script>


    </body>
    </html>