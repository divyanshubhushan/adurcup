	<?php
require_once("include/membersite_config.php");
if(isset($_POST['logsubmitted'])) {
    if($fgmembersite->RestLogin()) // take order
        {
        header('Location:checkout.php');
    } else {
        echo "<div class='alert alert-danger' style='margin-top: 82px;'>
                                <strong>Oh snap!</strong> Wrong login credentials and try submitting again.
                            </div>";
    }
}
if(isset($_POST['ordersubmitted'])) {
    if($fgmembersite->OrderSubmit()) // take order
        {
        echo "<div class='alert alert-success' style='margin-top: 82px;'>
                                <strong>Great!</strong> Your order has been received. We would get in touch with you shortly.
                            </div>";
    } else {
        echo "<div class='alert alert-danger' style='margin-top: 82px;'>
                                <strong>Oh snap!</strong> Something went wrong. Please try again.
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
        $action = $PAYU_BASE_URL . '/_payment';
    }
} elseif(!empty($posted['hash'])) {
    $hash   = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
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

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <script src="js/modernizr.custom2.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery-migrate.js"></script>
    <script type="text/javascript" src="js/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/script_ajax.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dist/js/bootstrapValidator.js" type="text/javascript"></script>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href="css/minified.css" rel="stylesheet">

    <script type="text/javascript" src="dist/js/bootstrap-select.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/select2.js"></script>

    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/harshit.js"></script>
     <script type="text/javascript" src="js/ajax_script2.js"></script>
     <script src="js/minified.min.js"></script>

    <script src="js/products.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    
    <script type="text/javascript">
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



    </script>
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
    <link href="css/innerpage.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet"><!-- // PARTICULAR PAGES CSS FILES -->
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
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

                                                <li><a href='edit.php'>Settings</a></li>
                                                <li><a href='logout.php'>Logout</a></li>
                                                </ul>
                                                </div>";
    echo $str1 . $fgmembersite->storename() . $str2;
} elseif($fgmembersite->CheckAdLogin()) {
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
                                                    <a class="active" href="products.php">Categories</a>
                                                </li>
                                                <li>
                                                    <a class="" href="zone.php"><!-- <i class="iconfont-plus not-round-icon"></i> -->
                                                  Add Your Restaurant</a>
                                                </li>
                                                <li>
                                                    <a href="contact.php" >Contact Us</a>
                                                </li>
                                            
                                                <li>
                                                    <a class="" href="help.php">Help</a>
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






    <!-- // SITE HEADER -->
    
        <!-- BREADCRUMB -->
        <div class="breadcrumb-container">
            <div class="container">
                <div class="relative">
                    <ul class="bc unstyled clearfix">
                        <li><a href="product.php">Shop</a></li>
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
        
            <div class="container">
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
                                                        <!-- <form> -->
                                                        
                                                            <div class="col-md-6">
                                                                <fieldset>
                                                                    <legend class="title">New Customer</legend>
                                                                    <div class="inner">
                                                                        <p>Checkout Options:</p>
                                                                        <div class="form-account">
                                                                            <div class="radio">
                                                                                <input type="radio" name="customer" id="radio-register" class="prettyCheckable" checked="checked" data-label="Register Account" />
                                                                            </div>
                                                                            <div class="radio">
                                                                                <input type="radio" name="customer" disabled="true" id="radio-guest" class="prettyCheckable" data-label="Guest Checkout" />
                                                                            </div>
                                                                        </div>
                                                                        <p class="light-color">Registration will just take 3-5 minutes.</p>
                                                                    
                                                                        <a href="zone.php"><button class="btn btn-default btn-round uppercase padder">Continue</button><a>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <!-- </form> -->
                                                        
                                                            <div class="col-md-6">
                                                        
                                                                    <fieldset>
                                                                        <legend class="title">Returning Customer</legend>
                                                                        <div class="inner">
                                                                            <form action="<?= $fgmembersite->GetSelfScript(); ?>" id="login_forum" method="post" name="login_forum">
                                                                                <input id='logsubmitted' name='logsubmitted' type='hidden' value='1'>

                                                                                <div class='modal-body-left' style="width:65%;border:none">
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
                                                                                            <a href="forget_password.php" style="line-height:3em">Forget password?</a>
                                                                                        </div>
                                                                                </div>
                                                                            </form>
                                                                
                                                                            
                                                                            
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
                                                <a data-toggle="collapse" data-parent="#checkout-collapse" href="#checkout-collapse4">
                                                    <span class="step"  style="background-color:#828282">03</span>
                                                    Order Summary
                                                </a>
                                            </h4>
                                        </div>
                                        
                                    </div>
                                
                                    


                                <?php
else:
?>
                                   <form action="<?php echo $action; ?>" method="post" name="payuForm">

                                   		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
									      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
									      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
     
          
          									<input id="amount" type="hidden" name="amount" value="" />
          									   <input name="surl" type="hidden" value="http://www.adurcup.com/success.php" size="64" />
     										<input name="curl" value="http://www.adurcup.com/checkout.php" hidden/>
										    <input name="furl" type="hidden" value="http://www.adurcup.com/failure.php" size="64" />
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
                                                                        <legend class="title">Welcome <?= $fgmembersite->ownername(); ?>! <a href="logout.php" style="margin-left:10px;text-decoration:underline">Sign Out</a></legend>
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
                                                                        <input type="text" class="form-control" id="firstname" name="firstname"  value="<?= $fgmembersite->ownername(); ?>"/>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group stylish-input">
                                                                    <label for="contact" class="col-sm-4 col-lg-4 control-label required">Phone</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control" id="contact" name="phone" value="<?= $fgmembersite->contact(); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group stylish-input">
                                                                    <label for="inputCity" class="col-sm-4 col-lg-4 control-label required">Location</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control" id="location"  name="state" value="<?= $fgmembersite->location(); ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group stylish-input">
                                                                    <label for="inputCountry" class="col-sm-4 col-lg-4 control-label required">Sublocation</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <select class="form-control" name="city" id="sublocation">    
                                                                            <option>
                                                                                Central Delhi
                                                                                </option>
                                                                            <option>
                                                                                East Delhi
                                                                            </option>
                                                                            <option>
                                                                                North Delhi
                                                                            </option>
                                                                            <option>
                                                                                South Delhi
                                                                            </option>
                                                                            <option>
                                                                                West Delhi
                                                                            </option>
                                                                            <option>
                                                                                Ghaziabad
                                                                            </option>
                                                                            <option>
                                                                                Noida
                                                                            </option>
                                                                            <option>
                                                                                Faridabad
                                                                            </option>
                                                                            <option>
                                                                                Gurgaon
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                            
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                                <div class="form-group stylish-input">
                                                                    <label for="inputAddress1" class="col-sm-4 col-lg-4 control-label required">Address 1</label>

                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control" id="inputAddress1" name="address1" value="<?= $fgmembersite->address(); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group stylish-input">
                                                                    <label for="inputAddress2" class="col-sm-4 col-lg-4 control-label">Address 2</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control" id="inputAddress2" name="address2" value="" />
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group stylish-input">
                                                                    <label for="inputPostcode" class="col-sm-4 col-lg-4 control-label required">Pincode</label>
                                                                    <div class="col-sm-8 col-lg-8">
                                                                        <input type="text" class="form-control" id="pincode" name="zipcode" value="<?= $fgmembersite->pincode(); ?>" />
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
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
                                                        <span class="step">03</span>
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
                                                                            It seems your shopping cart is empty, try looking our <a href="products.php">products</a>.
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


<!-- // Essential Javascripts -->

 <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-61830649-1', 'auto');
      ga('send', 'pageview');
    
    </script>
<script type="text/javascript">
	
	
	
	
	$(document).ready(function(){  
			total_amount();
	
		
	});
</script>

      <?php
include("includes/login_popup.php");
?>

    
</body>


</html>
