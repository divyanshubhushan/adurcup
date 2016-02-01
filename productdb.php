<?php require_once("include/membersite_config.php");
if (isset($_GET['id'])) {
  if($fgmembersite->product())
  {
    $pro = $fgmembersite->product();
    $material = $fgmembersite->product_material();
  }
  else
  {
    header('Location: http://www.adurcup.com/404');
  }
}
else{
  header('Location: http://www.adurcup.com/404'); 
}
require_once("includes/post_login.php");
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?=$pro['item_name']?> - Shop at Adurcup.com</title>
    <meta name="description" content="shop your disposables with best quality at affordable prices."/>
    <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- <base href="http://www.adurcup.com/" /> -->
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >

      <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login_popup.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
        
        
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
    <link href="css/slick-theme.css" rel="stylesheet">
    <!-- <link href="css/slick.css" rel="stylesheet"> -->

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

    @media (max-width: 768px) {
       /* .mulimages { display: none; }
        .imgma{width:300px;}*/
        .product-preview{width:300px;}
    }
    
    .ad_info{
      margin-left:5px;
      width:20px;
      height:20px;
    line-height:20px !important;
      background-color : rgb(0, 136, 204);
      color : rgb(255, 255, 255);
      border-radius : 50% !important;
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


  /*.slick-prev:before, .slick-next:before { font-family: "slick"; font-size: 40px; line-height: 1; color: red; opacity: 0.75; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }   

.slick-prev:before { content: "‹"; }
[dir="rtl"] .slick-prev:before { content: "›"; }

[dir="rtl"] .slick-next { left: -10px; top: 70px; right: auto; }
.slick-next:before { content: "›"; }
[dir="rtl"] .slick-next:before { content: "‹"; }*/

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

                                            $restloggedin = 1;
                                            $adloggedin = 0;
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

                                          $restloggedin = 1;
                                          $adloggedin = 0;

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

                                        $restloggedin = 0;
                                        $adloggedin = 0;
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
            <main id="main-content" role="main" >
                  <section class="section">
                    <div class="container">
                        <div class="col-xs-12 col-sm-4">



                        </div>
                        <div class="row add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-url=".entry-title > a" data-title=".entry-title" data-price=".entry-price > .price">
                            <!-- PRODUCT PREVIEW -->
                            <div class="col-md-12 product" data-product-id="<?=$pro['id']?>" style=" box-shadow:none">
                                <div class="col-md-12 col-md-5" style="margin: 0 220px 0 0;width:22%">

                                    <div class="product-preview" >
                                        <div class="images_ss">
                                            <div class="thumbs_ss-container">
                                              
                                             <div class="blowup" style="display:inline-block;background:#fff;border-radius:7px;width:350px;">
                                                <div class="big-image entry-media" style="text-align:left;background:#fff;">
                                                 <a style="width:350px;height:400px;" href="images/product/<?=$pro['image_src']?>" data-toggle="lightbox">
                                                    <img src="img/small/<?=$pro['image_src']?>" id="zoom_03" class="imgma" alt="Disposable Image" data-zoom-image="img/big/<?=$pro['image_src']?>">
                                                  </a>


                                                </div>
                                            
                                            <?php
                                              //require_once("include/membersite_config.php");
                                              if($fgmembersite->productImages())
                                              {
                                                $proimg = $fgmembersite->productImages();
                                                //print_r($proimg);
                                                echo "<div id='gallery_01' class='mulimages' style='width=350px;float=left;'>";
                                                foreach ($proimg as $imagepro => $value) {
                                                  # code...
                                                  echo "
                                                    
                                                      <a href='#' class='elevatezoom-gallery' data-update='' data-image='img/small/".$value."' data-zoom-image='img/big/".$value."'>
                                                      <img src='img/small/".$value."' width='80'></a>
                                                    
                                                  ";
                                                }
                                                echo "</div>";
                                                /*<a href="#" class="elevatezoom-gallery" data-update="" data-image="img/small/<?=$pro['image_src']?>" data-zoom-image="img/big/<?=$pro['image_src']?>">
                                                  <img src="img/small/<?=$pro['/'image_src'/']?>" width="80"></a>*/
                                              }else{
                                                echo "<div id='elseTest'>
                                                  No image return
                                                </div>";
                                              }

                                            ?>
                                              <!-- <a href="#" class="elevatezoom-gallery" data-update="" data-image="img/small/PI6A3264.jpg" data-zoom-image="img/big/PI6A3264.jpg">
                                              <img src="img/small/PI6A3264.jpg" width="80"></a>

                                              <a href="#" class="elevatezoom-gallery" data-update="" data-image="img/small/PI6A3264.jpg" data-zoom-image="img/big/PI6A3264.jpg">
                                              <img src="img/small/PI6A3264.jpg" width="80"></a> -->

                                             <!--  <a href="#" class="elevatezoom-gallery" data-update="" data-image="img/small/PI6A3264.jpg" data-zoom-image="img/big/PI6A3264.jpg">
                                              <img src="img/small/PI6A3264.jpg" width="100"></a>
 -->

                                                  
                                            
                                        </div>

                                    </div>

                                </div>




                            </div>

                        </div>

                        <div class="space40 visible-xs"></div>

                        <div class="col-md-12 col-md-7">

                              <section class="product-details " style="margin-left:0">
                                <header class="entry-header ">
                                    <h2 class="entry-title uppercase" style="color:#666;margin-bottom:-10px"><?=$pro['item_name']?></h2>
                                    <!-- <p style="color:#999;margin-left:2px">A Sub-heading here</p>  -->
                                    <div class="entry-price hidden">
                                        <strong class="price"><?=$pro['price_per_unit']?></strong>

                                    </div>
                                    <a class="hidden" id="hidden_url" href="products/<?php echo $pro['id'];?>">sdsdf</a>




                                </header>
                                <article class="entry-content">
                                    <figure>


                                        <span class="entry-review-count inline-middle"></span>
                                        <div class="col-md-12" style="padding:10px 0 0 0">
                                          <div class="col-md-6" style="padding:0">
                                            <ul class="entry-meta unstyled" style="margin:0">

                                                <li style="border-bottom:1px solid #e9e9e9">
                                                    <span class="key" style="width:140px;color:#999;font-size:14px;">Description:</span>
                                                    <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['description']?></span>
                                                </li>
                                                <li style="border-bottom:1px solid #e9e9e9">
                                                    <span class="key" style="width:140px;color:#999;font-size:14px;">Customization:</span>
                                                    <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['customizable']?></span>
                                                </li>
                                                <?php 
                                                  if($restloggedin == 1) {
                                                    echo " <li style='border-bottom:1px solid #e9e9e9'>
                                                          <span class='key' style='width:140px;color:#999;font-size:14px;'>Unit Price:</span>
                                                          <span class='value' style='color:#0099cc;font-size:14px;'>".$pro['price_per_unit']."</span>
                                                      </li>";
                                                      
                                                  }
                                                  else{
                                                     echo " <li style='border-bottom:1px solid #e9e9e9'>
                                                          <span class='key' style='width:140px;color:#999;font-size:14px;'>Unit Price:</span>
                                                          <span class='value' style='color:#0099cc;font-size:14px;'><i data-toggle='tooltip' data-placement='top' title='Please login to see the prices' class='iconfont-lock'></i></span>
                                                      </li>";
                                                  }
                                              ?>
                                                <li>
                                                    <span class="key" style="width:140px;color:#999;font-size:14px;">Delivery Time:</span>
                                                    <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['delivery']?></span>
                                                </li>
                                            </ul>
                                          </div>
                                          <div class="col-md-6" style="padding:0">
                                            <ul class="entry-meta unstyled" style="margin:0">

                                                <li style="border-bottom:1px solid #e9e9e9">
                                                    <span class="key" style="width:140px;color:#999;font-size:14px;">Specification:</span>
                                                    <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['types']?></span>
                                                </li>
                                                <li style="border-bottom:1px solid #e9e9e9">
                                                    <span class="key" style="width:140px;color:#999;font-size:14px;">Material:</span>
                                                    <span class="value" style="color:#0099cc;font-size:14px;"><?=$material?></span>
                                                </li>
                                                <li style="border-bottom:1px solid #e9e9e9">
                                                    <span class="key" style="width:140px;color:#999;font-size:14px;">Unit Description:</span>
                                                    <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['unit_description']?></span>
                                                </li>                                    
                                              </ul>
                                          </div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <figcaption class="m-b-sm" style="margin:30px 0 0 0">
                                            <p style="color:#666;font-size:16px">PURCHASE DESCRIPTION</p>
                                        </figcaption>
                                        
                                        <div class="col-md-12" style="background:#ccc;border-radius:7px;padding-bottom:10px"> 
                                        <div class="col-md-12 " style="padding-left:0;">

                                            <div class="col-md-12" style="padding-left:0;margin-top:10px">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label"  align="left" style="padding-top:7px;padding-right:0;padding-left:0;font-size:14px;color:#333" for="type">Quantity</label>
                                                    <div class="col-md-6" style="padding-left:15px">
                                                    <?php
                                                      if($restloggedin == 1) {
                                                          echo "<div class='input-group spinner'>
                                                            <input type='text' class='form-control qty_product' id='qty_number' value='".$pro['min_quantity']."' required='' onchange='calculate_price()' name='price' min='".$pro['min_quantity']."'>
                                                            <div class='input-group-btn-vertical'>
                                                              <a class='btn btn-default'><i class='iconfont-caret-up'></i></a>
                                                              <a class='btn btn-default'><i class='iconfont-caret-down'></i></a>
                                                            </div>
                                                        </div>";
                                                            
                                                        }
                                                        else{
                                                           echo "<div class='input-group ' style='width:100px'>
                                                            <input type='text' class='form-control qty_product' id='qty_number' value='".$pro['min_quantity']."' required=''  name='price' min='".$pro['min_quantity']."'>
                                                            <div class='input-group-btn-vertical'>
                                                              <a class='btn btn-default'><i class='iconfont-caret-up'></i></a>
                                                              <a class='btn btn-default'><i class='iconfont-caret-down'></i></a>
                                                            </div>
                                                        </div>";
                                                        }
                                                      ?>
                                                        
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-md-12" style="padding-left:0;margin-top:5px">
                                            <div class="form-group" style="padding-left:0">
                                                <label class="col-sm-4 control-label" align="left" style="padding-top:7px;padding-right:0;padding-left:0;font-size:14px;color:#333" for="type">Size</label>
                                                <div class="col-md-6">
                                                    <label style="padding-top:7px;padding-right:0;padding-left:0;font-size:14px;color:#333" >
                                                      <?=$pro['Sizes']?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="col-md-12" style="padding-left:0;padding-top:0px;margin-top:5px;padding-bottom:5px">
                                        
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"  style="padding-top:7px;padding-right:0;padding-left:0;font-size:14px;color:#333" for="type">Open for ads</label>
                                                 <div class="col-md-6">
                                                      <label class="radio-inline">
                                                        <input type="radio" name="ad_option" value="yes">Yes
                                                      </label>
                <label class="radio-inline">
                  <input type="radio" name="ad_option" value="no">No
                </label>
                                                           
                                                   
                                                </div>
                                            </div>
                                       
                                        </div>
                                      

                                    </div>

                                   

                                    
                                                <?php 
                                                  if($restloggedin == 1) {
                                                    echo " <div class='col-md-12 product_price' style='padding-left:0;margin-top:20px;margin-bottom:10px;background:#fff;border-radius:5px'>
                                                        <h3 class='total_price' align='center' style='margin:5px 0'>Rs. ".$pro['min_quantity']*$pro['price_per_unit']."</h3>
                                                    </div>";
                                                      
                                                  }
                                                  else{
                                                     echo " <div class='col-md-12 product_price' style='padding-left:0;margin-top:20px;margin-bottom:10px;background:#fff;border-radius:5px'>
                                                        <h3 class='total_price' align='center' style='margin:5px 0'><i data-toggle='tooltip' data-placement='top' title='Please login to see the prices' class='iconfont-lock'></i></h3>
                                                    </div>";
                                                  }
                                              ?>
                                  
                              </div>
                              </div>
                              
                              <div class="col-md-12">
                                <ul class="inline-li li-m-r-l m-t-lg " style="margin-top:10px; margin-left:460px;">
                                  <?php 
                                  if($restloggedin == 1)
                                  {
                                    echo "<li style='padding-top:5px'>
                                        <a href='#' class='btn btn-default btn-lg btn-round add-to-cart' style='border-radius:5px;background:#0099cc;color:#fff;width:160px'>Add to Cart</a>
                                    </li>
                                     <li style='padding-top:5px'>
                                    <a href='#' class='btn btn-default btn-lg btn-round add-to-sample' style='border-radius:5px;background:#0099cc;color:#fff;width:250px'><i class='iconfont-edit'></i>Get Sample</a>
                                    </li>


                                     <li style='padding-top:5px'>
                                        <a href='#' class='btn btn-default btn-lg btn-round buy_now ' style='border-radius:5px;background:#0099cc;color:#fff;width:160px'><i class='iconfont-rupee'></i>Buy Now</a>
                                    </li>";
                                  }
                                  else{
                                    echo "<li style='padding-top:5px' data-toggle='tooltip' data-placement='top' title='Please login to place the order'>
                                        <button class='btn btn-default btn-lg btn-round' style='border-radius:5px;background:#ABABAB;color:#fff;width:160px'>Add to Cart</button>
                                    </li>
                                     <li style='padding-top:5px' data-toggle='tooltip' data-placement='top' title='Please login to place the order'>
                                    <button class='btn btn-default btn-lg btn-round' style='border-radius:5px;background:#ABABAB;color:#fff;width:250px'><i class='iconfont-edit'></i>Get Sample</button>
                                    </li>


                                     <li style='padding-top:5px' data-toggle='tooltip' data-placement='top' title='Please login to place the order'>
                                        <button class='btn btn-default btn-lg btn-round' style='border-radius:5px;background:#ABABAB;color:#fff;width:160px'><i class='iconfont-rupee'></i>Buy Now</button>
                                    </li>";
                                  }
                                  ?>


                                </ul>
                            </div>

                        </figure>
                    </article>
                </section>
            </div>
        </div>
        <!-- // PRODUCT DETAILS -->
                        <!-- <div class="m-t-lg">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#product-description" data-toggle="tab">Description</a></li>
                                <li><a href="#product-reviews" data-toggle="tab">Reviews</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="product-description">
                                    <p>The McDonald's Corporation is the world's largest chain of hamburger fast food restaurants, serving around 68 million customers daily in 119 countries across 35,000 outlets.</p>
                                    <ul>
                                        <li>Mc French Fries </li>
                                        <li>Mc Cafe</li>
                                        <li>Mc Wrap</li>
                                        <li>Mc Double Cheese Burger</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade in" id="product-reviews">
                                    <div class="comments-list">
                                        <div id="disqus_thread"></div>
                                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                        <p>Some information about individual charges of products avilable with the package.</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

            <!-- FEATURED PRODUCTS -->
            
            <!-- // FEATURED PRODUCTS -->
            
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
        <script src="js/select2.js"></script>
        <script type="text/javascript" src="js/ajax_script2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.3/js/bootstrap-select.js"></script>
          <script src="dist/js/bootbox.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js"></script>
        <script src='js/elevatezoom.js'></script>
        <script src='js/validate.js'></script>
        <script src='js/slick.js'></script>
        <!-- Essential Javascripts -->
        <script src="js/minified.min.js"></script>
        <!-- // Essential Javascripts -->


        <style type="text/css">
            #gallery_01 img{border:2px solid white;} 
            .active img{
              border:2px solid #333 !important;
            } 
          </style>
          
          
          <script type="text/javascript">
            $(document).ready(function () {
              if (Modernizr.mq('only screen and (min-width: 768px)')) {
                $("#zoom_03").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active", imageCrossfade: true, loadingIcon: "img/home/fancybox_loading.gif"}); 

                $("#zoom_03").bind("click", function(e) {  
                  var ez =   $('#zoom_03').data('elevateZoom');
                  ez.closeAll(); //NEW: This function force hides the lens, tint and window 
                  $.fancybox(ez.getGalleryList());
                  return false;
                }); 
              }else{
                if(Modernizr.mq('only screen and (max-width: 768px)')){
                  $("#zoom_03").bind("click", function(e) {  
                  var ez =   $('#zoom_03').data('elevateZoom');
                  ez.closeAll(); //NEW: This function force hides the lens, tint and window 
                  $.fancybox(ez.getGalleryList());
                  return false;
                });  
                }
              }
          }); 

        </script>
        <script type="text/javascript">
            
            $(document).ready(function() {
            
              var mq = window.matchMedia( "(min-width: 768px)" );
                  if (!mq.matches) {

                      var wi = $(".entry-media").find('img');
                      var width = wi.width();
                      wi.width(300);

                      $("#main-content").css("padding-top",70);
                  }
                  else{
                    $("#main-content").css("padding-top",50)
                  }
                 

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

                 $("#ad_reset_link").click(function(){
                    $("#ad_login").hide();
                     $("#ad_reset").show();
                     $(".modal-title").text('Reset Password');
                     $(".state_info").text('Already have an account?');
                 
                     $(".register_forgot").hide();
                  
                     $("#ad_login_btn").show();
                     $("#ad_register_btn").hide();

                 });


                 $('#gallery_01').slick({
                    infinite: true,
                    dots: true,
                    arrows:true,
                    slidesToShow: 3,
                    slidesToScroll: 3
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
    $('#ad_info').tooltip();
    
    $('.dropdown-toggle').dropdown();
                
            });
        </script>
        <!-- Particular Page Javascripts -->
        <script src="js/jquery.nouislider.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/products.js"></script>
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
        <!-- // Particular Page Javascripts --> 
  <script src="js/product_spinner.js"></script>

  <?php include("includes/login_popup.php"); ?>
  <!-- // Disqus -->

</body>

</html>