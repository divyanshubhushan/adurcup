<?php
require_once("include/membersite_config.php");
if (isset($_GET['id'])) {
  if($fgmembersite->product())
  {
    $pro = $fgmembersite->product();
  }
  else
  {
    header('Location: 404.php');
  }
}
else{
  header('Location: 404.php'); 
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
    <base href="http://www.adurcup.com/" />
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" >
    <link href="css/login_popup.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/minified.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>



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



  <script type="text/javascript">


  function calculate_price(){
    var value= parseInt($('.spinner input').val(), 10);
    var  unit_price = $(".price").text(),
    final_price =  unit_price* value;

    $('.total_price').text('Rs.' + final_price.toFixed(2));
}
$(function(){ $('.btn').button() });

$(function(){



    $('.spinner .btn:first-of-type').on('click', function() {
        var value= parseInt($('.spinner input').val(), 10);
        var temp;
        if (value <= 10 ) {

          temp = 10;
      } 
      if (value >= 10 && value <= 99 ) {
          temp = value - value%10 + 10;
      } 
      if (value >= 100 && value <= 999 ) {
         temp = value - value%50 + 50;
     } 
     if (value >= 1000 && value <= 1999) {
        temp = value - value%100 + 100;
    } 
    if (value >= 2000 && value <= 2999) {
     temp = value - value%200 + 200;
 }
 if (value >= 3000 && value <= 4999) 
 {
    temp = value - value%250 + 250;
}
if (value >= 5000 ) 
{
    temp = value - value%1000 + 1000;
}
$('.spinner input').val( temp);
var  unit_price = $(".price").text(),
final_price =  unit_price* temp;

$('.total_price').text('Rs.' + final_price.toFixed(2));


});
          $('.spinner .btn:last-of-type').on('click', function() {
            
            var value= parseInt($('.spinner input').val(), 10);
            var temp;
                 if (value <= 10 ) {

                      temp = 1;
                } 
                if (value >= 11 && value <= 99 ) {
                  
                      if(value%10 == 0)
                    {
                        temp = value -10;
                    }
                    else
                    {
                        temp = value - value%10;
                    }
                } 
                if (value >= 100 && value <= 999 ) {
                    if(value%50 == 0)
                    {
                        temp = value -50;
                    }
                    else
                    {
                        temp = value - value%50;
                    }
                     
                } 
                if (value >= 1000 && value <= 1999) {
                    
                    if(value%100 == 0)
                    {
                        temp = value -100;
                    }
                    else
                    {
                        temp = value - value%100;
                    }
                } 
                if (value >= 2000 && value <= 2999) {
                    
                     if(value%200 == 0)
                    {
                        temp = value -200;
                    }
                    else
                    {
                        temp = value - value%200;
                    }
                }
                if (value >= 3000 && value <= 4999) 
                {
                    
                    if(value%250 == 0)
                    {
                        temp = value -250;
                    }
                    else
                    {
                        temp = value - value%250;
                    }
                }
                if (value >= 5000 ) 
                {
                    
                    if(value%1000 == 0)
                    {
                       temp = value - 1000;
                    }
                    else
                    {
                        temp = value - value%1000;
                    }
                }
                $('.spinner input').val( temp);
                var  unit_price = $(".price").text(),
                    final_price =  unit_price* temp;

                    $('.total_price').text('Rs.' + final_price.toFixed(2));

          });

});  


</script>








<!-- PARTICULAR PAGES CSS FILES -->

<link href="style.css" rel="stylesheet">
<link href="css/innerpage.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
<link href="css/responsive.css" rel="stylesheet">
<link href="css/scrolling-nav.css" rel="stylesheet">

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
                                                <i class="iconfont-bell not-round-icon"></i>
                                            </a>


                                            <!-- // SOCIAL ICONS -->
                                        </li>

                                        <li data-toggle="sub-header" data-target="#sub-cart">
                                            <!-- SHOPPING CART -->
                                            <a href="cart.php" id="total-cart">
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
                                        if($fgmembersite->CheckRestLogin()) {

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
                                            echo $str1.$fgmembersite->storename().$str2;
                                        }


                                        elseif($fgmembersite->CheckAdLogin()) {

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
                                        <a class="active" href="products.php">Categories</a>
                                    </li>
                                    <li>
                                        <a class="" href="zone.php"><!-- <i class="iconfont-plus not-round-icon"></i> -->
                                          Add Your Restaurant</a>
                                      </li>
                                      <li>
                                        <a href="contact.php" >Contact Us</a>    
                                    </li>
                                                <!-- <li>
                                                    <a class="" href="#">Offers</a>
                                                </li> -->
                                                <li>
                                                    <a class="" href="help.php">Help</a>
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
            <main id="main-content" role="main" style="padding-top:50px">
                  <section class="section">
                    <div class="container">
                        <div class="col-xs-12 col-sm-4">



                        </div>
                        <div class="row add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-url=".entry-title > a" data-title=".entry-title" data-price=".entry-price > .price">
                            <!-- PRODUCT PREVIEW -->
                            <div class="col-md-12 product" data-product-id="<?=$pro['id']?>" style=" box-shadow:none">
                                <div class="col-md-12 col-md-5">

                                    <div class="product-preview " >
                                        <div class="images_ss">
                                            <div class="thumbs_ss-container">
                                              
                                             <div class="blowup" style="display:inline-block;width:355px;height:430px;background:#e9e9e9;border-radius:7px;">
                                                <div class="big-image entry-media" style="text-align:left">
                                                 <a style="width:355px;height:430px;" href="<?=$pro['image_src']?>" data-toggle="lightbox">
                                                    <img src="<?=$pro['image_src']?>"  alt="Disposable Image" class="thumb" width="355px" height="430px">
                                                </a>


                                            </div>
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
                                    <a class="hidden" id="hidden_url" href="product.php?id=<?php echo $pro['id'];?>">sdsdf</a>




                                </header>
                                <article class="entry-content">
                                    <figure>


                                        <span class="entry-review-count inline-middle"></span>

                                        <ul class="entry-meta unstyled" style="margin:0">

                                            <li style="border-bottom:1px solid #e9e9e9">
                                                <span class="key" style="width:140px;color:#999;font-size:14px;">Material:</span>
                                                <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['types']?></span>
                                            </li>
                                            <li style="border-bottom:1px solid #e9e9e9">
                                                <span class="key" style="width:140px;color:#999;font-size:14px;">Customziable:</span>
                                                <span class="value" style="color:#0099cc;font-size:14px;"><?=$pro['customizable']?></span>
                                            </li>
                                            <li>
                                                <span class="key" style="width:140px;color:#999;font-size:14px;">Estimated Delivery:</span>
                                                <span class="value" style="color:#0099cc;font-size:14px;">5-7 Days</span>
                                            </li>
                                        </ul>

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
                                                        <div class="input-group spinner">
                                                            <input type="text" class="form-control qty_product" id="qty_number" value="1" required="" onchange="calculate_price()" name="price">
                                                            <div class="input-group-btn-vertical">
                                                              <a class="btn btn-default"><i class="iconfont-caret-up"></i></a>
                                                              <a class="btn btn-default"><i class="iconfont-caret-down"></i></a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-md-12" style="padding-left:0;margin-top:5px">
                                            <div class="form-group" style="padding-left:0">
                                                <label class="col-sm-4 control-label" align="left" style="padding-top:7px;padding-right:0;padding-left:0;font-size:14px;color:#333" for="type">Size</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" required="" name="max_sale">
                                                        <option selected="true"  style="display:none;">
                                                            Select Option
                                                        </option>
                                                        <option>
                                                            Small
                                                        </option>
                                                        <option>
                                                            Medium
                                                        </option>
                                                        <option>
                                                            Large
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12" style="padding-left:0;padding-top:0px;margin-top:5px;padding-bottom:5px">
                                        
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"  style="padding-top:7px;padding-right:0;padding-left:0;font-size:14px;color:#333" for="type">Advertisement</label>
                                                <div class="col-md-6">
                                                    <div id="file1" class="btn-group" data-toggle="buttons" >
                                                        <label class="btn btn-default btn-lg" style="background#fff;width:50px;border-radius:5px;border:none;margin-right:10px">
                                                            <input type="radio" name="option1" /> Yes
                                                        </label>
                                                        <label class="btn btn-default btn-lg" style="background#fff;width:50px;border-radius:5px;border:none">
                                                            <input type="radio" name="option1" /> No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                    </div>

                                    </div>

                                   

                                    

                                     <div class="col-md-12 product_price" style="padding-left:0;margin-top:20px;margin-bottom:10px;background:#fff;border-radius:5px">
                                        <h3 class="total_price" align="center" style="margin:5px 0">Rs. <?=$pro['price_per_unit']?> </h3>
                                    </div>
                                    
                              </div>
                              </div>
                              
                              <div class="col-md-12 col-md-7">
                                <ul class="inline-li li-m-r-l m-t-lg " style="margin-top:10px">
                                    <li style="padding-top:5px">
                                        <a href="#" class="btn btn-default btn-lg btn-round add-to-cart" style="border-radius:5px;background:#0099cc;color:#fff;width:160px">Add to Cart</a>
                                    </li>
                                    <li style="padding-top:5px">
                                    <a href="#" class="btn btn-default btn-lg btn-round " style="border-radius:5px;background:#0099cc;color:#fff;width:250px"><i class="iconfont-edit"></i>Customize Your Own</a>
                                    </li>

                                     <li style="padding-top:5px">
                                        <a href="#" class="btn btn-default btn-lg btn-round buy_now " style="border-radius:5px;background:#0099cc;color:#fff;width:160px"><i class="iconfont-rupee"></i>Buy Now</a>
                                    </li>


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

    <!-- Essential Javascripts -->
    <script src="js/minified.min.js"></script>
    <!-- // Essential Javascripts -->

  <!-- Particular Page Javascripts -->
  <script src="js/jquery.nouislider.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="js/products.js"></script>
  <!-- // Particular Page Javascripts -->

  <?php include("includes/login_popup.php"); ?>
  <!-- // Disqus -->

</body>

</html>