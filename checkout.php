<?php
require_once("include/membersite_config.php");
if(isset($_POST['logsubmitted'])) {
    if($fgmembersite->RestLogin()) // take order
        {
        header('Location:checkout');
    } else {
        echo "<div class='alert alert-danger' style='margin-top: 82px;'>
                                <strong>Oh snap!</strong> Wrong login credentials and try submitting again.
                            </div>";
    }
}

require_once("includes/post_login.php");


if (isset($_COOKIE['cart'])) {
	$cookie = $_COOKIE['cart'];
	$cookie = stripslashes($cookie);
	$savedCartArray = json_decode($cookie, true);
	$tmpArr = array();
	foreach ($savedCartArray as $item) {
		$tmpArr[] = json_encode($item);

	}
	$result_info = implode('##', $tmpArr);

}







// Merchant key here as provided by Payu
$MERCHANT_KEY  = "v0S7pd";
// Merchant Salt as provided by Payu
$SALT          = "1bc9Vwng";
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";
$action        = '';
$posted        = array();
if(!empty($_POST)) {
    //print_r($_POST);
    foreach($_POST as $key=>$value) {
        $posted[$key] = $value;
    }
}
$formError = 0;
if(empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
$hash         = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
    if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
        $formError = 1;
    } else {
        //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }
        $hash_string .= $SALT;
        $hash   = strtolower(hash('sha512', $hash_string));
        if($posted['paymethod']=='payu')
        {
            $action = $PAYU_BASE_URL . '/_payment';
        }
        else{
            $action = 'http://www.adurcup.com/order_success';
        }
        
    }
} elseif(!empty($posted['hash'])) {
    $hash   = $posted['hash'];
    if($posted['paymethod']=='payu')
        {
            $action = $PAYU_BASE_URL . '/_payment';
        }
        else{
            $action = 'http://www.adurcup.com/order_success';
        }
}
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Adurcup.com</title>
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
        <link rel="stylesheet" type="text/css" href="css/component.css" />

    <link href="css/minified.css" rel="stylesheet">
    <link href="css/innerpage.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
	<style type="text/css">
            @media (max-width:1108px) {
            .poster{
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
<body id="page-top" onload="submitPayuForm()">
    
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
    echo $str1 . $fgmembersite->storename() . $str2;
} elseif($fgmembersite->CheckAdLogin()) {
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
    echo $str1 . $fgmembersite->ad_name() . $str2;
} else {
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

<!-- <div class="poster" style="position:absolute;top:71px;z-index:20;right:19%;width:129px;height:174px;background:url('img/home/Poster1.png') no-repeat scroll center center / cover">
                </div> -->



    <!-- // SITE HEADER -->
    
        <!-- BREADCRUMB -->
        <div class="breadcrumb-container">
            <div class="container">
                <div class="relative">
                    <ul class="bc unstyled clearfix">
                        <li><a href="products">Shop</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
             <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
        </div>
        <!-- // BREADCRUMB -->
        
        <!-- SITE MAIN CONTENT -->
        <main id="main-content" role="main">
        
            <div class="container" style="padding-bottom:40px">
                <div class="row">
                    
                    <div class="m-t-b clearfix" style="margin-top:0px;">
                        <!-- SIDEBAR -->
                        
                        
                        
                            <div class="panel-group checkout" id="checkout-collapse" style="margin-top:35px">
                                <?php
                                if(!$fgmembersite->CheckRestLogin()):
                                ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse1">
                                                    <span class="step">01</span>
                                                    Personal Infomation
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="checkout-collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      
                                                            <div class="col-md-6" style="border-right: 1px solid black;">
                                                        
                                                                    <fieldset>
                                                                        <legend class="title">Returning Customer</legend>
                                                                        <div class="inner">
                                                                            <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="login_forum" method="post" name="login_forum">
                                                                                <input id='logsubmitted' name='logsubmitted' type='hidden' value='1'>

                                                                                <div class='col-md-9' style="border:none">
                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="username" name="email" placeholder="Email" required="" style="padding-left:20%" type="text"
                                                                                        value=""> <i class="iconfont-envelope login-field-icon"></i>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <input autocomplete="off" class="form-control login-field" id="login-pass" name="password" placeholder="Password" required="" style="padding-left:20%" type=
                                                                                        "password" value=""> <i class="iconfont-lock login-field-icon"></i>
                                                                                    </div>
                                                                                  
                                                                                        <div class="col-md-6">
                                                                                            <button class="btn btn-success modal-login-btn">Login</button>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <a href="forget_password" style="line-height:3em">Forget password?</a>
                                                                                        </div>
                                                                                </div>
                                                                            </form>
                                                                
                                                                            
                                                                            
                                                                        </div>
                                                                    </fieldset>
                                                            
                                                            </div>
                                                             <div class="col-md-6">
                                                                <fieldset>
                                                                    <legend class="title inner">New Customer</legend>
                                                                    <div class="inner">
                                                                        
                                                                        <p class="light-color">Registration will just take 2-3 minutes.</p>
                                                                    
                                                                        <a href="zone"><button class="btn btn-default btn-round uppercase padder" style="margin-top:10px">Signup</button><a>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        

                                                    

                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse3">
                                                    <span class="step" style="background-color:#828282">02</span>
                                                    Delivery Details
                                                </a>
                                            </h4>
                                        </div>
                                    
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse5">
                                                    <span class="step"  style="background-color:#828282">03</span>
                                                    Payment Method
                                                </a>
                                            </h4>
                                        </div>
                                        
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse4">
                                                    <span class="step"  style="background-color:#828282">04</span>
                                                    Order Summary
                                                </a>
                                            </h4>
                                        </div>
                                        
                                    </div>
                                
                                    


                                <?php
                                else:
                                ?>
                                   <form action="<?php echo $action; ?>" id="order_form" method="post" name="payuForm">

                                   		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
									      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
									      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
     
          
          									<input id="amount" type="hidden" name="amount" value="" />
          									   <input name="surl" type="hidden" value="http://www.adurcup.com/success" size="64" />
     										<input name="curl" value="http://www.adurcup.com/checkout" hidden/>
										    <input name="furl" type="hidden" value="http://www.adurcup.com/failure" size="64" />
										 <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
     
       								<textarea hidden name="productinfo"><?php echo $result_info ?></textarea>
   
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse1">
                                                        <span class="step">01</span>
                                                        Personal Infomation
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="checkout-collapse1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                             <div class="col-md-6">
                                                                    <fieldset>
                                                                        <legend class="title">Welcome <?= $fgmembersite->ownername(); ?>! <a href="logout" style="margin-left:10px;text-decoration:underline">Sign Out</a></legend>
                                                                        <div class="inner">
                                                                            <div class="form-account">
                                                                                <ul class="entry-meta unstyled">
                                                                                    <li><span class="key">Owner:</span> <span class="value"><?= $fgmembersite->ownername(); ?></span></li>
                                                                                    <li><span class="key">Restaurant:</span> <span class="value"><?= $fgmembersite->storename(); ?></span></li>
                                                                                    <li><span class="key">Email:</span> <span class="value"><?= $fgmembersite->rest_email(); ?></span></li>
                                                                                    <input name="email" hidden value="<?= $fgmembersite->rest_email(); ?>" />
                                                                                  
                                                                                </ul>
                                                                            </div>
                                                                            <div class="space20 clearfix"></div>
                                                                            <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse2" class="btn btn-default btn-round uppercase padder">Continue</a>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="space20 clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" style="margin-top:5px">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse2">
                                                        <span class="step">02</span>
                                                        Delivery Details
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="checkout-collapse2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                  
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                                <div class="form-group stylish-input">
                                                                    <label for="firstname" class="col-sm-4 col-lg-4 control-label required">Recipient Name</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control " style="margin-bottom:10px" id="firstname" name="firstname"  value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"/>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group stylish-input">
                                                                    <label for="contact" class="col-sm-4 col-lg-4 control-label required">Phone</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control"  style="margin-bottom:10px" id="contact" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"/>
                                                                    </div>
                                                                </div>
                                                              
                                                                
                                                                
                                                                
                                                            
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                                <div class="form-group stylish-input">
                                                                    <label class="col-sm-4 col-lg-4 control-label required">Address </label>

                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control" style="margin-bottom:10px" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" name="address1"  rows="2" />
                                                                      
                                                                    </div>
                                                                </div>
                                                                  <div class="form-group stylish-input">
                                                                    <label for="pincode" class="col-sm-4 col-lg-4 control-label required">Pincode</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control"  style="margin-bottom:10px" id="pincode" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="space20 clearfix"></div>
                                                        <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse3" class="btn btn-default btn-round uppercase padder">Continue</a>
                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse3">
                                                        <span class="step">03</span>
                                                        Payment Methods
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="checkout-collapse3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    
                                                        <div class="form-group stylish-input">
                                                            <input type="radio" id="paymethod2" value="cod" checked="checked" class="prettyCheckable" name="paymethod" data-label="C.O.D" />
                                                            
                                                        </div>
                                                        <div class="form-group stylish-input">
                                                            <input type="radio" id="paymethod3" value="payu" class="prettyCheckable" name="paymethod" data-label="PayU" />
                                                            
                                                        </div>
                                                        <div class="space20 clearfix"></div>
                                                        <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse4" class="btn btn-default btn-round uppercase padder">Continue</a>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse4">
                                                        <span class="step">04</span>
                                                         Order Summary

                                                         <?php
														    
														?>

                                                        


                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="checkout-collapse4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <table class="tbl-cart">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product Name</th>
                                                                        <th style="width: 15%;">Unit Price</th>
                                                                        <th style="width: 25%;">QTY</th>
                                                                        <th class="hidden-xs" style="width: 15%;">Sub Total</th>
                                                                        <th class="hidden-xs" style="width: 10%;"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="hide empty-cart">
                                                                        <td colspan="5">
                                                                            It seems your shopping cart is empty, try looking our <a href="products">products</a>.
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                            <div class="shopcart-total pull-right clearfix">
                                                                <div class="cart-subtotal text-xs m-b-sm clearfix">
                                                                    <span class="pull-left hidden">Sub Total:</span>
                                                                    <span class="pull-right hidden">₹ 0</span>
                                                                </div>
                                                                <div class="cart-total text-bold m-b-lg clearfix">
                                                                    <span class="pull-left" style="font-size:18px">Amount Payable:</span>
                                                                    <span class="pull-right" style="font-size:18px">₹ 0</span>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-round btn-default uppercase" type="submit" >Place Order</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
endif;
?>
                               
                            </div>
                        
                        
                    </div>
                
                </div>
            </div>
        
        </main>
        <!-- // SITE MAIN CONTENT -->
        
        <!-- SITE FOOTER -->
        <!-- SITE FOOTER -->
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
    <!-- // SITE FOOTER -->
        
</div>
<!-- // PAGE WRAPPER -->

<!-- Essential Javascripts -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



        <!-- Essential Javascripts -->
        <script src="js/minified.min.js"></script>
        <!-- // Essential Javascripts -->

        <script type="text/javascript">
            
            $(document).ready(function() {
            
            	$('#order_form').on('keyup keypress', function(e) {
                  var code = e.keyCode || e.which;
                  if (code == 13) { 
                    e.preventDefault();
                    return false;
                  }
                });

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
                $("#advance").click(function(){
                    $("#advance_content").toggle(500);
                });
                $('.dropdown-toggle').dropdown();

                
            });
        </script>


 
    <script src="js/products.js"></script>
    <script src="js/owl.carousel.js"></script>

<!-- // Essential Javascripts -->




<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

      <?php
include("includes/login_popup.php");
?>

    
</body>


</html>