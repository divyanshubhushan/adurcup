<?php
    require_once("../include/membersite_config.php");
 
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Adurcup.com-Editor</title>
        <meta name="description" content="shop your disposables with best quality at affordable prices."/>
        <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon" >
        <link href="../css/login_popup.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap-select.css">
        <link href="../css/select2.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../dist/css/magnific-popup.css"> 
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../dist/css/bootstrapValidator.css" rel="stylesheet">
    <script src="../js/modernizr.custom2.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/jquery-migrate.js"></script>
    <script type="text/javascript" src="../js/jquery.form.min.js"></script>
    <script type="text/javascript" src="../js/jquery.form.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../dist/js/bootstrapValidator.js" type="text/javascript"></script>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../dist/js/bootstrap-select.js"></script>
    <script src="../js/modernizr.min.js"></script>
    <script src="../js/select2.js"></script>


        <script type="text/javascript" src="../js/script.js"></script>
   
          <link rel="stylesheet" href="../css/minified.css">
<!--     <link href="style.css" rel="stylesheet"> -->
    <style>
    .nav-tabs > li > a{
        padding: 1em 1em;
    }
    .container{
        width: 1170px ;
    }
    .m-t-b{
        margin: 10px 0px;
    }
    .col-md-3{
        width: 25%;
    }

    body{
        color: #666;
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

    
    <!-- GENERAL CSS FILES -->
     
    <!-- <link rel="newer stylesheet" href="css/minified_product.css"> -->
        <link href="../dist/css/bootstrapValidator.css" rel="stylesheet">
  
    <!-- // GENERAL CSS FILES -->
    
    <!--[if IE 8]>
        <script src="js/respond.min.js"></script>
        <script src="js/selectivizr-min.js"></script>
    <![endif]-->
    <!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    -->
    <script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>');</script>
    <script src="../js/modernizr.min.js"></script> 
    <!-- PARTICULAR PAGES CSS FILES -->
    <link rel="stylesheet" href="../css/jquery.nouislider_product.css">

    <link rel=" stylesheet" href="../css/isotope_product.css">
    <link rel="old stylesheet" href="../css/innerpage.css">
    <link rel="newer stylesheet" href="../css/innerpage_product.css">
    <link rel="stylesheet" type="text/css" href="../css/login_popup.css">
    <!-- // PARTICULAR PAGES CSS FILES -->
    <link rel="stylesheet" href="../css/responsive_product.css">
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
                                            <a href="index.php">
                                                <img alt="Porto" width="100" height="45" data-sticky-width="100" data-sticky-height="70" src="../img/logo.png">
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
                                                        <small><a href="../cart.php">(See All)</a></small>
                                                    </div>
                                                    <ul class="cart-items product-medialist unstyled clearfix"></ul>
                                                    <div class="cart-footer">
                                                        <div class="cart-total clearfix">
                                                            <span class="pull-left uppercase">Total</span>
                                                            <span class="pull-right total">₹ 0</span>
                                                        </div>
                                                        <div class="text-right">
                                                            <a href="../cart.php" class="btn btn-default btn-round view-cart">View Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- // SHOPPING CART -->
                                            </li>
                                                 <?php 
                                                 if($fgmembersite->CheckRestLogin()) {

                                                    $str1 = "

                                                            <div class='btn-group  user' >
                                                                <a class='btn btn-mini' href='../myzone.php' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>
                                                        
                                                           ";
                                                        $str2 = "
                                                            </a>
                                                                <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                                                <span class='caret'></span>
                                                                </button>
                                                                <ul class='dropdown-menu'>
                                                                   
                                                                    <li><a href='#'>Settings</a></li>
                                                                    <li><a href='../logout.php'>Logout</a></li>
                                                                </ul>
                                                            </div>";
                                                            echo $str1.$fgmembersite->storename().$str2;
                                                        }

                                                     
                                                 elseif($fgmembersite->CheckAdLogin()) {

                                                      $str1 = "

                                                            <div class='btn-group  user' >
                                                                <a class='btn btn-mini' href='../adsearch.php' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>
                                                        
                                                           ";
                                                        $str2 = "
                                                            </a>
                                                                <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                                                <span class='caret'></span>
                                                                </button>
                                                                <ul class='dropdown-menu'>
                                                                   
                                                                    <li><a href='#'>Settings</a></li>
                                                                    <li><a href='../logout.php'>Logout</a></li>
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
                                                    <a class="active" href="../products.php">Categories</a>
                                                </li>
                                                <li>
                                                    <a class="" href="../zone.php"><!-- <i class="iconfont-plus not-round-icon"></i> -->
                                                  Add Your Restaurant</a>
                                                </li>
                                                <li>
                                                    <a href="#contacts" >Contact Us</a>
                                                </li>
                                            
                                                <li>
                                                    <a class="" href="../help.php">Help</a>
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


   

    
    <link href="css/style.css" rel="stylesheet">
<!--     <link href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="css/normalize.css" rel="stylesheet">
    


  <div class="row">
      
        <canvas id="vas" width="473" height="500" hidden ></canvas>
        <canvas id="face" width="473" height="500" hidden></canvas> 
         <canvas id="test" width="473" height="500" hidden></canvas>
         
 </div>
    <div class="container bg" style="width:80%;">
         <div class="bg col-lg-12 col-sm-12 padding_0">
            <div class="col-lg-6 col-sm-6 col-md-offset-3" style="padding-left:20px;">
                <div class="row">

                    <div role="tabpanel">

                      <!-- Nav tabs -->
                      
        

                    </div>

                </div>
            </div>
        </div>

        <div class="bg col-lg-12 col-sm-12 padding_0"  >
            <div class="col-lg-3 col-sm-3 padding_0" style="padding-top:60px;">
                <ul  role="tablist" >
                        <li role="presentation" class="btn show active_stickers"><a target="1">Choose Item</a></li>
                        <li role="presentation" class="btn show" ><a target="2">Upload Image</a></li>
                       
                        <li role="presentation" class="btn show" ><a  target="3">Add Text</a></li>
                        <li role="presentation" class="btn show" ><a target="4">Change Color</a></li>
                        <li role="presentation" class="btn show" onclick = "rasterize()"><a  >Preview</a></li>
                </ul>  
            </div>
                
                <!--<div class="col-lg-12 col-sm-12 center">
                    <script>
                        function upload_fun(){document.getElementById('imgLoader').click();}
                    </script> 
                    <input id="imgLoader" name="imgLoader" style="display:none;" type="file"> 
                    <button class="your_own"onclick="upload_fun()" type="button">Upload Your Own</button> 
                    <input id="data_url" name="data_url" type="hidden">
                </div> -->

            <div class="col-lg-6 col-sm-6" id="container_data" style="padding-left:25px;padding-right:25px">
                <div class=" col-lg-12 col-sm-12 border_right border_bottom padding_0 border_top border_left" style="border-radius:4px;overflow:hidden;height:55px">

                </div>
                <div class=" col-lg-12 col-sm-12 border_right border_bottom padding_0 border_top border_left" style="border-radius:4px;overflow:hidden;margin-top:5px">
                    <div class="main_bg_div">
                        <div style="display: inline-block; position:absolute;z-index:10000;margin-left:50% ;margin-top:400px    ">
                            <label>Object Opacity: </label><input type="range" value="100" step="1" min="0" max="100" id="opacity-slider">
                            
                        </div>
                        <div   id="imageeditor" style="display: inline-block; position:absolute;z-index:10000;margin-left:55% ;margin-top:10px    ">
                              <div class="btn-group" >                                             
                                  <button class="butt" id="bring-front" data-toggle="tooltip" data-placement="bottom" title="Bring to back"><i class="iconfont-fast-backward rotate" style="height:19px;float:left"></i></button>
                                  <button class="butt" id="send-back" data-toggle="tooltip" data-placement="bottom" title="Send to Back"><i class="iconfont-fast-forward rotate" style="height:19px;float:left"></i></button>
                                  <button id="flip" type="button" class="butt" data-toggle="tooltip" data-placement="bottom" title="Flip"><i class="iconfont-retweet" style="height:19px;float:left"></i></button>
                                  
                                  <button id="remove-selected" class="butt" data-toggle="tooltip" data-placement="bottom" title="Remove Selected" onclick="deleteData()"><i class="iconfont-trash" style="height:19px;float:left"></i></button>
                              </div>
                        </div>
                        <canvas height="500" id="c" width="473px" ></canvas>
                        
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-sm-3 padding_0 " style="border-radius:4px;overflow:hidden;padding-top:60px">
                <div class="col-lg-12 col-sm-12 padding_bottom_30 targetDiv stickers" id="div1" style="padding-left:0 ; padding-right:0">
                   <div class="multiple col-lg-12 col-sm-12">
                        <h4>Choose Item</h4>
                    </div>

                    <div class=" nano">
    
                        <div >
                            
                               <a class="product " data-item="1"><img class="active" src="images/papercup2.png" width="82"></a>
                               <a class="product" data-item="2"><img src="images/napkin.jpg" width="82"></a>
                               <a class="product" data-item="3"><img src="images/paperplate.jpg" width="82"></a>
                               <a class="product" data-item="4"><img src="images/plastic_container.jpg" width="82"></a>
                               <a class="product" data-item="5"><img src="images/trans_cup.jpg" width="82"></a>
                                
                        </div>
                        
                        <div style="display:none">
                            <img src="images/logo2.png" id="base64" >
                        </div>
                     
                    </div>
                </div>
                
                <div class="col-lg-12 col-sm-12 padding_bottom_30 targetDiv stickers" id="div4" style="display:none;" >
                   <div class="multiple col-lg-12 col-sm-12">
                        <h4>Change Color</h4>
                    </div>

                    <div class=" nano">
    
                        <div >
                            
                               <div class="btn-group btn-group-justified col-lg-12 col-sm-12 padding_top_15">
                                    <a class="btn btn-primary active_btn" id="btn1">Background</a>
                                    <a class="btn btn-primary" id="btn2">Text</a>
                             </div>


                            <div class="text col-lg-12 col-sm-12">
                                <p><a>
                                <div class="text_bg"></div></a> <a>
                                <div class="text_bg" style="background-color:#204a58;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#d35a49;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#9ad349;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#49d3aa;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#498dd3;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#4956d3;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#be49d3;">
                                </div></a></p>

                                <p><a>
                                <div class="text_bg" style="background-color:#D34983;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#716EE8;">
                                </div></a> <a>
                                <div class="text_bg" style="Backgroundckground-color:#50BFD3;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#2DCE71;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#D6AD1E;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#9B31CC;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#F3BC53;">
                                </div></a> <a>
                                <div class="text_bg" style="background-color:#000000;">
                                </div></a></p>
                            </div>
                            <div class="col-lg-12 col-sm-12 padding_top_15">
                                <div class="col-lg-6 col-sm-6 padding_0">
                                    <input class="color" id="color_paletter1" onchange="changeColor1(this)" style="width:99%;border: none; padding: 5px 0;border-radius:5px 0 0 5px;background-color:#f3d353;">
                                </div>

                                <div class="bg_select_code col-lg-6 col-sm-6 padding_0">
                                    <input id="numbercolor" onkeyup="keyupChangeColor1()" style="border-radius:0 5px 5px 0" type="text" value="#f3d353">
                                </div>
                            </div>

                          <!--   <div class="col-lg-12 col-sm-12 padding_top_15">
                                
                                <div class="well">
                                    <ul class="nav">
                                        <li class="color-preview" title="White" style="background-color:#ffffff;"></li>
                                        <li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
                                        <li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
                                        <li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
                                        <li class="color-preview" title="Black" style="background-color:#222222;"></li>
                                        <li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
                                        <li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
                                        <li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
                                        <li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
                                        <li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
                                        <li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
                                        <li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
                                        <li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
                                        <li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
                                        <li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
                                        <li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
                                        <li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
                                        <li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
                                        <li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
                                        <li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>                          
                                        <li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
                                    </ul>
                                </div>      
                            </div> -->


                                
                        </div>
                     
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 padding_bottom_30 targetDiv stickers" id="div2" style="display:none;" >
                   <div class="multiple col-lg-12 col-sm-12">
                        <h4>Upload Image</h4>

                    </div>

                    <div class=" nano">
    
                        <div >
                            
                              <script>
                                    function upload_fun(){document.getElementById('imgLoader').click();}
                                </script> 
                                <input id="imgLoader" name="imgLoader" style="display:none;" type="file"> 
                                <button class="your_own" onclick="upload_fun()" type="button">Upload Image</button> 
                                <input id="data_url" name="data_url" type="hidden">
                                
                                
                                <button class="your_own" onclick="downloadCanvas(this, 'c')" style=
                                "cursor:pointer;cursor:hand;">Save Image</button>
                       <!--          <hr> 
                            <button type="button" class="btn btn-default" id="image-gray">Grayscale</button>
                            <button type="button" class="btn btn-default" id="image-sepia">Sepia</button>
                            <button type="button" class="btn btn-default" id="image-nofilter">No Filter</button> -->
                            


                            <!-- <div class="btn-group">
                                <button  class="btn btn-default" id="bring-front">Bring Forward</button>
                                <button  class="btn btn-default" id="send-back">Send back</button>
                            </div>
 -->

                        </div>
                     
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 padding_bottom_30 targetDiv stickers" id="div3" style="display:none;">
                    <div class="multiple col-lg-12 col-sm-12">
                        <h4>Enter And Edit Text</h4>
                    </div>

                    <div class="text col-lg-12 col-sm-12 text_editer " id="text_editer_id">
                        <select onchange="FontChnaged(this)">
                            <option value="Open Sans">
                                Open Sans
                            </option>

                            <option value="Georgia">
                                Georgia
                            </option>

                            <option value="serif">
                                serif
                            </option>

                            <option value="Palatino">
                                Palatino
                            </option>

                            <option value="Times New Roman">
                                Times New Roman
                            </option>

                            <option value="Times">
                                Times
                            </option>

                            <option value="Arial">
                                Arial
                            </option>

                            <option value="Helvetica">
                                Helvetica
                            </option>

                            <option value="Courier">
                                Courier
                            </option>
                        </select> 
                        <select onchange="FontStyle(this)">
                            <option value="normal">
                                Normal
                            </option>

                            <option value="light">
                                Light
                            </option>

                            <option value="bold">
                                Bold
                            </option>

                            <option value="italic">
                                Italic
                            </option>

                            <option value="BoldItalic">
                                BoldItalic
                            </option>
                        </select> 
                        <select id="data_size" onchange="FontChange(this)">
                        </select>
                    </div>
                   
                    <div class="form border_right_none">
                        <div class="border_white"></div>

                        

                            <div class="col-lg-12 col-sm-12">
                               <input class="span2" id="text-string" type="text" placeholder="add text here..."> 
                               <button class="your_own" id="add-text" type="button">Add</button>
                               <button class="your_own" type="reset">Reset</button>
                            </div>
                    </div>
                </div>
                
                
                <div class="border_white"></div>
                <div class="col-lg-12 col-sm-12 " id="price_column" style="background-color:#204a58;margin-top:30px;padding-bottom:40px;border-radius:4px;overflow:hidden">
                        <h5 style="margin:0px;color:#fff;padding-top:15px;padding-bottom:10px;"> Unit Price : <span style="font-size:20px;color:#fff">1.50</span></h5>
                        <button class="btn btn-success radius_4" onclick="downloadCanvas(this, 'c')" style=
                                "cursor:pointer;cursor:hand;margin-right:10px"><i class="iconfont-rupee" style="line-height:14px;padding-right:5px"></i>Buy Now</button>
                        <button class="butt radius_4" onclick="downloadCanvas(this, 'c')" style=
                                "cursor:pointer;cursor:hand; "><i class="iconfont-save" style="line-height:14px;padding-right:5px"></i>Save </button>
               
                </div>
                
            </div>

            </div>
         

        </div>


    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script> 
  
    <script src="js/fabric.js"></script> 

    <script src="js/crop.js"></script> 
    <script src="js/test.js" type="text/javascript"></script> 

    <script src="js/jscolor.js" type="text/javascript"></script> 
    
    <script>
        $(function(){
            $('.main_bg_div').css('padding-left',(($('#container_data').width()-520)/2)); 
            $('.show').click(function () { 
                $('.targetDiv').hide(); 
                $('#div' + $(this).find('a').attr('target')).show();$(".show").removeClass("active_stickers");  
                $(this).addClass("active_stickers"); 
            });
            $('#bring-front').tooltip();
            $('#send-back').tooltip();
            $('#flip').tooltip();
            $('#remove-selected').tooltip();
        });
    </script>
    <script>
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show');
        });
         
    </script>

</body>
</html>