<?php
  require_once("include/membersite_config.php");
if(isset($_POST['zone_submitted']))
{

    if($fgmembersite->Addzone())
    {

        header('Location: index.php?signup=success');  
    }
    else
    {
        echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
    }
  
}
  require_once("includes/post_login.php");
  

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Adurcup.com</title>
    <meta name="description" content="shop your disposables with best quality at affordable prices."/>
    <meta name="keywords" content="shop your disposables, disposables,disposables at affordable prices, adurcup, adurcup.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link href="css/login_popup.css" rel="stylesheet"><!--for login popup css -->
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" ><!-- -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-select.css"><!-- multiple select and search-->
    <link href="css/select2.css" rel="stylesheet" type="text/css"><!-- for multiple inputs-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"> -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/bootstrapValidator.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="jquery.validate.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  

    
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NGPKJQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NGPKJQ');
    </script>
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
                                        <a href="http://www.adurcup.com">
                                            <img alt="logo" width="100" height="45" data-sticky-width="100" data-sticky-height="70" src="img/logo.png">
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
                                            if($fgmembersite->CheckRestLogin()) { ?>
                                                <div class='btn-group  user' >
                                                    <a class='btn btn-mini' href='myzone' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>
                                                    </a>
                                                    <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                                        <span class='caret'></span>
                                                    </button>
                                                    <ul class='dropdown-menu'>
                                                        <li><a href='edit'>Settings</a></li>
                                                        <li><a href='logout'>Logout</a></li>
                                                    </ul>
                                                </div>
                                                
                                            <?php  }
                                            elseif($fgmembersite->CheckAdLogin()) { ?>
                                                <div class='btn-group  user' >
                                                    <a class='btn btn-mini' href='myzone' style='background-color:#F0F0F0'><i class='iconfont-home' style='font-size:16px'></i>
                                                    </a>
                                                    <button class='btn btn-mini dropdown-toggle' data-toggle='dropdown'>
                                                        <span class='caret'></span>
                                                    </button>
                                                    <ul class='dropdown-menu'>
                                                        <li><a href='#'>Settings</a></li>
                                                        <li><a href='logout'>Logout</a></li>
                                                    </ul>
                                                </div>
                                              
                                            <?php }
                                            else{ ?>
                                                <li >
                                                    <a href='#' class='use-btn user'  data-target='#login-modal' data-toggle='modal' > <i class='iconfont-user not-round-icon'></i></a>
                                                </li>
                                            <?php  }?>
                                        </ul>
                                    </div>
                                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                                            <ul class="nav navbar-nav">
                                                <li >
                                                    <a class="" href="products">Categories</a>
                                                </li>
                                                <li>
                                                    <a class="active" href="zone"><!-- <i class="iconfont-plus not-round-icon"></i> -->
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
            <div class="container main_container" style="margin-top: 40px; margin-bottom: 0px;">
                <h1 style="font-family: 'FontAwesome';color:#08c;margin-bottom:0px">
                    ADD YOUR ZONE
                </h1>
                <div class="row" style="margin:0px 0px 15px 0px" id="crmaco">
                    <div class="row step">
                        <div class="col-sm-4 i_step activestep" id="div1" onclick="javascript: resetActive(event, 33.3, 'step-1'); " style="cursor:pointer">
                            <p style="font-size:20px">
                                CRUST
                            </p>
                        </div>
                        <div class="col-sm-4 i_step" id="div2" onclick="javascript: resetActive(event, 66.6, 'step-2');" style="cursor:pointer">
                            <p style="font-size:20px">
                                MANTLE
                            </p>
                        </div>
                        <div class="col-sm-4 i_step" id="div3" onclick="javascript: resetActive(event, 100, 'step-3');" style="cursor:pointer">
                            <p style="font-size:20px">
                                CORE
                            </p>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="progress" id="progress1">
                        <div class="progress progress-striped active">
                            <div class="bar" style="width: 33.3%;">
                                <span style="font-size:">Overall Progress</span>
                            </div>
                        </div>
                    </div>
                </div> 
              <!--  <div class="progress">
                  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>-->
                <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" onsubmit="return requireval();" method='post' id ="registrationForm">
                    <input id='zone_submitted' name='zone_submitted' type='hidden' value='1'>
                    <div class="row setup-content step activeStepInfo" id="step-1">
                        <div class="col-sm-12">
                            <div class="col-sm-12 well text-center">
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <label class="col-sm-4 control-label">Restaurant</label>
                                        <div class="col-sm-8">
                                           
                                                <input class="form-control" autocomplete="off" placeholder="Start typing your restaurant name.." name="restaurant_name" id="restaurant_name" onkeyup="autocomplet()" type="text" required="required">
                                                <ul id="results_ajax" style="padding-left:0px"></ul>
                                            
                                      
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Owner</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="owner_name" name="owner_name" placeholder="eg: Nitin Prakash" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Location</label>
                                        <div class="col-md-8 location_select">
                                           <select aria-hidden="true" tabindex="-1" class="js-example-placeholder-single js-states select2-hidden-accessible" style="width:315px;">
                                                <option></option>
                                               <option value="Delhi NCR">Delhi NCR</option>     
                                               <option value="New Delhi"> New Delhi</option>
                                               <option value="Chennai"> Chennai</option>
                                               <option value="Bangalore"> Bangalore</option>
                                               <option value="Mumbai"> Mumbai</option>
                                               <option value="Pune"> Pune</option>
                                                <option value="ABU ROAD">ABU ROAD</option>
                                                <option value="Agra Cantt">Agra Cantt</option>
                                                <option value="AGRA FORT">AGRA FORT</option>
                                                <option value="AHMEDABAD JN">AHMEDABAD JN</option> 
                                                <option value="AJMER">AJMER</option>
                                                <option value="AKOLA JN">AKOLA JN</option>
                                                <option value="ALLAHABAD JN">ALLAHABAD JN</option>
                                                <option value="Ambala Cantt Junction">Ambala Cantt Junction</option>
                                                <option value="BALHARSHAH">BALHARSHAH</option>
                                                <option value="Bhopal Junction">Bhopal Junction</option>
                                                <option value="BHUBANESWAR">BHUBANESWAR</option>
                                                <option value="Bhusaval Junction">Bhusaval Junction</option>
                                                <option value="BILASPUR JN">BILASPUR JN</option>
                                                <option value="DAUND JN">DAUND JN</option>
                                                <option value="Delhi Hazrat Nizamuddin">Delhi Hazrat Nizamuddin</option>
                                                <option value="GONDIA JN">GONDIA JN</option>
                                                <option value="GULBARGA">GULBARGA</option>
                                                <option value="Gwalior Junction">Gwalior Junction</option>
                                                <option value="Itarsi Junction">Itarsi Junction</option>
                                                <option value="JABALPUR">JABALPUR</option>
                                                <option value="JAIPUR">JAIPUR</option>
                                                <option value="Jhansi Junction">Jhansi Junction</option>
                                                <option value="KANPUR CENTRAL">KANPUR CENTRAL</option>
                                                <option value="KATNI">KATNI</option>
                                                <option value="Khandwa Junction">Khandwa Junction</option>
                                                <option value="Kota Junction">Kota Junction</option>
                                                <option value="Madgaon Junction">Madgaon Junction</option>
                                                <option value="Mathura Junction">Mathura Junction</option>
                                                <option value="Nasik Road">Nasik Road</option>
                                                <option value="Panvel">Panvel</option>
                                                <option value="PATHANKOT CANTT">PATHANKOT CANTT</option>
                                                <option value="PUNE JN">PUNE JN</option>
                                                <option value="RAIPUR JN">RAIPUR JN</option>
                                                <option value="Ratlam Junction">Ratlam Junction</option>
                                                <option value="Ratnagiri">Ratnagiri</option>
                                                <option value="REWARI">REWARI</option>
                                                <option value="ROURKELA">ROURKELA</option>
                                                <option value="Sawai Madhopur Junction">Sawai Madhopur Junction</option>
                                                <option value="Vadodara Junction">Vadodara Junction</option>
                                                <option value="Surat">Surat</option>
                                                <option value="VARANASI JN">VARANASI JN</option>
                                                <option value="VIJAYAWADA JN">VIJAYAWADA JN</option>
                                                <option value="VISHAKAPATNAM">VISHAKAPATNAM</option>
                                                <option value="Warangal JN">Warangal JN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Sublocation</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="sub_location" name="sub_location">
                                                
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="address" name="address" placeholder="eg:M13, Connaught Place , New Delhi" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Pincode</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="pincode" name="pincode" maxlength="6" placeholder="eg:  201308" type="text">
                                        </div>
                                    </div>
                                </div>
                                 
                 
                                
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <label class="col-sm-4 control-label">Contact</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="contact" name="contact" maxlength="10" placeholder="eg: 9621259774 (dont add 0 or +91)" required="required" >
                                        </div>
                                    </div>
                                </div>
                                
                               

                                
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <label class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="password" name="password" placeholder="Choose a password" required="" type="password" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required">
                                        <label class="col-sm-4 control-label" style="padding-left:0">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" required="" >
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="col-sm-6">
                                    <div class="form-group required">
                                        <label class="col-sm-4 control-label">Email-Id</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="email" name="email" placeholder="eg: adurcup@gmail.com" required="" type="email" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Zomato Link</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="zomato" name="zomato" type="url" placeholder="eg: https://www.zomato.com/your_location/your_restaurant_name"  type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Facebook page</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="facebook" name="facebook" type="url" placeholder="eg: https://www.facebook.com/your_restaurant_name"  type="text">
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="neur action btn-sky text-capitalize next btn" onclick="set2Active(event, 67, 'step-2');" style="float:right;margin:10px 15px;cursor: pointer;">Next</button>
                              <!--  <label class="col-sm-4 control-label" style="padding-left:0">Please fill all the required fields to continue</label>
                                 <a class="neur" onclick="javascript: set2Active(event, 67, 'step-2');" style="float:right;margin:10px 15px;cursor: pointer;">Next &rarr;</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content step hiddenStepInfo" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12 well text-center">
                                <div class="row">
                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="type">Established</label>
                                            <div class="col-sm-7">
                                                <input class="form-control" id="year" name="year" placeholder="eg: 2010" required="" type="text">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="type">No. of Outlets</label>
                                            <div class="col-sm-7">
                                                <div class="input-group outlet_spinner" style="width:100px">
                                                    <input type="text" class="form-control" value="1" required="" id="outlets" name="outlets">
                                                    <div class="input-group-btn-vertical">
                                                      <a class="btn btn-default"><i class="iconfont-caret-up"></i></a>
                                                      <a class="btn btn-default"><i class="iconfont-caret-down"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="type">Cost for two</label>
                                            <div class="col-sm-7">
                                                <div class="input-group spinner">
                                                    <input type="text" class="form-control" value="100" required="" id="cost_for_2" name="cost_for_2">
                                                    <div class="input-group-btn-vertical">
                                                      <a class="btn btn-default"><i class="iconfont-caret-up"></i></a>
                                                      <a class="btn btn-default"><i class="iconfont-caret-down"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="e9">Cuisine</label>
                                            <div class="col-sm-7" style="padding-left:0">
                                                <select id="e9" class="col-sm-7 select2min" multiple name="taste[]" required="" style="width:315px;display: none;">
                                                    <option value="fast-food">
                                                        Fast food
                                                    </option>
                                                    <option value="desserts">
                                                        Desserts
                                                    </option>
                                                    <option value="street-food">
                                                        Street Food
                                                    </option>
                                                    <option value="bakery">
                                                        Bakery
                                                    </option>
                                                    <option value="icecream">
                                                        Ice-cream
                                                    </option>
                                                    <option value="cafe">
                                                       Café
                                                    </option>
                                                    <option value="north-indian">
                                                        North Indian
                                                    </option>
                                                    <option value="south-indian">
                                                        South Indian
                                                    </option>
                                                    <option value="beverage">
                                                        Beverage
                                                    </option>
                                                    <option value="italian">
                                                        Italian
                                                    </option>
                                                    <option value="chinese">
                                                        Chinese
                                                    </option>
                                                    <option value="biryani">
                                                        Biryani
                                                    </option>
                                                    <option value="mughlai">
                                                        Mughlai
                                                    </option>
                                                    <option value="pizza">
                                                        Pizza
                                                    </option>
                                                     <option value="thai">
                                                        Thai
                                                    </option>
                                                     <option value="gujarati">
                                                        Gujarati
                                                    </option>
                                                     <option value="rajasthani">
                                                        Rajasthani
                                                    </option>
                                                     <option value="continental">
                                                        Continental
                                                    </option>
                                                     <option value="italian">
                                                        Italian
                                                    </option>
                                                    <option value="asian">
                                                        Asian
                                                    </option>
                                                    <option value="european">
                                                        European
                                                    </option>
                                                    <option value="lebanese">
                                                        Lebanese
                                                    </option>
                                                    <option value="mediterranean">
                                                         Mediterranean
                                                    </option>
                                                    <option value="japanese">
                                                        japanese
                                                    </option>



                                                    
                                                    
                                                    <option value="finger-food">
                                                        Finger Food
                                                    </option>
                                                    <option value="mexican">
                                                        Mexican
                                                    </option>
                                                    <option value="indonesian">
                                                        Indonesian
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="e10">Service Offered</label>
                                            <div class="col-sm-7">
                                                <select id="e10" multiple name="service[]" class="select2min"   style="width:315px; float:left;display: none;" >
                                                    <option value="dine-in">
                                                        Dine in
                                                    </option>
                                                    <option value="outdoor-seating">
                                                        Outdoor seating
                                                    </option>
                                                    <option value="lounge">
                                                         Lounge
                                                    </option>
                                                    <option value="pub-bar">
                                                         Pub &amp; Bar
                                                    </option>
                                                    <option value="home-delivery">
                                                        Home delivery
                                                    </option>
                                                    <option value="take-away">
                                                        Take away
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="col-md-12 well text-center">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-4" for="type">Your general servings:</label>
                                        <div class="col-sm-12" style="margin-top:7px;">
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e1">(a) Age Group</label>
                                                    <div class="col-sm-7">
                                                        <select id="e1" multiple class="select2min" name="age_group[]" style="width:260px; display: none;" >
                                                            <option value="1-12">
                                                                1-12
                                                            </option>
                                                            <option value=" 13-25">
                                                                13-25
                                                            </option>
                                                            <option value="25-35">
                                                                25-35
                                                            </option>
                                                            <option value="35-50">
                                                                35-50
                                                            </option>
                                                            <option value="50-above">
                                                                50-above
                                                            </option>
                                                           
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e2">(b) Acquainted with</label>
                                                    <div class="col-sm-7">
                                                        <select id="e2" multiple class="select2min" name="section[]" style="width:260px; display: none;" >
                                                            <option value="Couple">
                                                                Couple
                                                            </option>
                                                            <option value="Family">
                                                                Family
                                                            </option>
                                                            <option value="Student">
                                                                Student
                                                            </option>
                                                            <option value="Professional">
                                                                Professional
                                                            </option>
                                                           
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e3">(c) Peak Season</label>
                                                    <div class="col-sm-7">
                                                        <select id="e3" multiple class="select2min" name="max_sale[]" style="width:260px; display: none;" >
                                                            <option value="Summer(May-Jun)">
                                                                Summer (May-Jun)
                                                            </option>
                                                            <option value="Rainy(Jul-Sep)">
                                                                Rainy (Jul-Sep)
                                                            </option>
                                                            <option value="Autumn(Oct-Nov)">
                                                                Autumn (Oct-Nov)
                                                            </option>
                                                            <option value="Winter(Dec-Feb)">
                                                                Winter (Dec-Feb)
                                                            </option>
                                                            <option value="Spring(Mar-Apr)">
                                                              Spring (Mar-Apr)
                                                            </option>
                                                        
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e4">(d) Peak Hours</label>
                                                    <div class="col-sm-7">
                                                        <select id="e4" multiple class="select2min" name="busy_hours[]" style="width:260px; display: none;" >
                                                        
                                                            <option value="07:00 AM-10:00 AM">
                                                                07:00 AM-10:00 AM
                                                            </option>
                                                            <option value="10:00 PM-12:00 PM">
                                                                10:00 PM-12:00 PM
                                                            </option>
                                                            <option value="12:00 PM-03:00 PM">
                                                                12:00 PM-03:00 PM
                                                            </option>
                                                            <option value="03:00 PM-06:00 PM">
                                                               03:00 PM-06:00 PM
                                                            </option>
                                                            <option value="06:00 PM-08:00 PM">
                                                                06:00 PM-8:00 PM
                                                            </option>
                                                            <option value="08:00 PM-11:00 PM">
                                                                08:00 PM-11:00 PM
                                                            </option>
                                                            <option value="11:00 PM-05:00 AM">
                                                               11:00 PM-05:00 AM
                                                            </option>
                                                            
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="type">(e) Billing</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="sale_type">
                                                            <option selected="true" style="display:none;">
                                                                Select Option
                                                            </option>
                                                            <option>
                                                                Software
                                                            </option>
                                                            <option>
                                                                Manual
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <a class="neur next" onclick="javascript: set3Active(event, 100, 'step-3');" style="float:right;margin:10px 15px;cursor: pointer;">Next &rarr;</a> 
                                <a class="neur" onclick="javascript: reset1Active(event, 33, 'step-1');" style="float:right;margin:10px 15px;cursor: pointer;">&larr; Prev</a> -->
                                
                                <button type="button" class="neur action btn-sky text-capitalize next btn" onclick="set3Active(event, 100, 'step-3');" style="float:right;margin:10px 15px;cursor: pointer;">Next</button>
                                <button type="button" class="neur action btn-sky text-capitalize back btn" onclick="reset1Active(event, 33, 'step-1');" style="float:right;margin:10px 15px;cursor: pointer;">Back</button>
                            </div>
                        </div>
                    </div>
                    <div class="row step display" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12 well text-center">
                                <div class="row">
                                
                                    <div class="col-md-12" style="text-align:center;padding-bottom:20px">
                                        <label style="font-size:18px" >Customer Engagements</label>
                                    </div>
                                        
                                    
                                
                                    
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e8">Print options</label>
                                                    <div class="col-sm-7">
                                                        <select id="e8" multiple class="select2min" name="print[]" style="width:260px; display: none;" >
                                                            <option value="Newspapers">
                                                                Newspapers
                                                            </option>
                                                            <option value="Magazines">
                                                                Magazines
                                                            </option>
                                                            <option value="Books">
                                                                Books
                                                            </option>
                                                            <option value="None">
                                                                None
                                                            </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                              <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e8">Electronic Options</label>
                                                    <div class="col-sm-7">
                                                        <select id="e6" multiple class="select2min" name="electronic[]" style="width:260px; display: none;" >
                                                            <option value="TV">
                                                                TV
                                                            </option>
                                                            <option value="Projector">
                                                                Projector
                                                            </option>
                                                            <option value="Radio">
                                                                Radio
                                                            </option>
                                                            <option value="Music System">
                                                                Music System
                                                            </option>
                                                            <option value="None">
                                                                None
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group" style="margin-bottom:5px">
                                                    <label class="col-sm-4 control-label" for="e8">Entertainment</label>
                                                    <div class="col-sm-7">
                                                        <select id="e5" multiple class="select2min" name="entertainment[]"style="width:260px; display: none;" >
                                                            <option value="Live music performances">
                                                                Live music performances
                                                            </option>
                                                            <option value="Juggling shows">
                                                                Juggling shows
                                                            </option>
                                                            <option value="Karaoke">
                                                                Karaoke
                                                            </option>
                                                            <option value="None">
                                                                None
                                                            </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" >Other(optional)</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" class="select2min" style="width:260px;margin-left:10px" align="right "id="other" name="other" type="text"  > 
                                                </div>
                                            </div>
                                        </div>
                                        
                                    

                                </div>

                             
                                     
                            
                                <div class="row" style="margin-top:10px;">
                                     <div class="col-md-10" >
                                        <div class="form-group required">
                                            <label class="col-sm-8 control-label" for="type" style="padding-top:4px;text-align:left;padding-left:45px">Would you like new services/options in your restaurant? Eg: gaming</label>
                                            <div class="col-sm-3" align="left">
                                                <label class="radio-inline"><input id="new_services" name="new_services" required="" type="radio" value="yes">Yes</label> <label class="radio-inline"><input id="new_services" name="new_services" type="radio" value="no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="row" style="padding-top:15px;">
                                    <div class="col-md-10" >
                                        <div class="form-group" style="margin-bottom:5px">
                                            <label class="col-md-3 control-label" id="captchaOperation" style="font-size:14px;padding-top:7px"></label>

                                            <div class="col-md-3" style="padding-left:0;padding-right:0;padding-bottom:10px">
                                                <input class="form-control" data-bv-callback="true" data-bv-callback-callback="checkCaptcha" data-bv-callback-message="Wrong answer" name="captcha"
                                                placeholder="Enter Captcha" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Error submitting form</h4>
                                      </div>
                                      <div class="modal-body">
                                        We have found some errors in your form. Please review it again.
                                        Its either incomplete or incorrect entries.
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Got it!</button>
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="signup_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">FORM Successfully submitted</h4>
                                      </div>
                                      <div class="modal-body">
                                        Your form is submitted. Now sit-back and relax.
                                        Let us now redirect you to your profile page.
                                      </div>
                                      <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Got it!</button> 
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <!-- <button class="neur" type="submit" style="float:right;margin:10px 15px">Submit </button> 
                                <a class="neur" onclick="javascript: set2Active(event, 67, 'step-2');" style="float:right;margin:10px 15px;cursor: pointer;">&larr; Prev</a> -->
                                
                                <button type="submit" class="neur action btn-hot text-capitalize submit btn" style="float:right;margin:10px 15px">Submit</button>
                                <button type="button" class="neur action btn-sky text-capitalize back btn" onclick="set2Active(event, 67, 'step-2');" style="float:right;margin:10px 15px;cursor: pointer;">Back</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-sm-12">
                          <div class="pull-right">
                            <button type="button" class="action btn-sky text-capitalize back btn" >Back</button>
                            <button type="button" class="action btn-sky text-capitalize next btn" >Next</button>
                            <button type="button" class="action btn-hot text-capitalize submit btn">Submit</button>
                          </div>
                      </div>
                    </div> -->
                </form>
            </div>
        </div>
        <br>
        <footer class="page-footer">
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
        <style>
            .form-horizontal .control-label {

            font-size: 15px;
            font-weight: 130%;
            color: #08c;
            }
            
         /*   .navbar-nav li:nth-child(1) > a.active{  
              color: #ccc;
            }
    */

            @media screen and (max-width:640px){

                .main_container{
                    margin-top: 80px !important;

                }
                h1{
                    font-size: 29px;
                }
                .cuisiness{
                    width: 247px !important;

                }
                .servicee{
                    width: 247px !important;
                }

            }

            .hiddenStepInfo {
            display: none;
            }

            .activeStepInfo {
            display: block !important;
            }

            .underline {
            text-decoration: underline;
            }

            .step {
            margin-top: 27px;
            }

            .progress {
            position: relative;
            height: 25px;
            }

            .progress > .progress-type {
            position: absolute;
            text-align: center;
            width: 33.3%;
            left: 0px;
            font-weight: 800;
            padding: 3px 30px 2px 10px;
            color: rgb(255, 255, 255);
            background-color: rgba(25, 25, 25, 0.2);
            }

            .progress > .progress-completed {
            position: absolute;
            right: 0px;
            font-weight: 800;
            padding: 3px 10px 2px;
            }

            .step {
            text-align: center;
            }

            .i_step {
            line-height: 50px;
            background-color: #fff;
            border: 1px solid #C0C0C0;
            border-right: none;
            }

            .step .col-sm-4:last-child {
            border: 1px solid #C0C0C0;
            }

            .step .col-md-4:first-child {
            border-radius: 5px 0 0 5px;
            }

            .step .col-md-4:last-child {
            border-radius: 0 5px 5px 0;
            }

            .step .col-md-2:hover {

            cursor: pointer;
            }

            .step .activestep {
            color: #fff;
            height:53px;
            background: #88BECF;

            vertical-align: middle;
            border-radius: 5px
            }

            .form-group.required .control-label:after {
              content:"*";
              color:red;
            }

            .step .fa {
            padding-top: 15px;
            font-size: 40px;
            }
            
            #page-wrapper{
            
            overflow:visible;
            }
        </style>
    </body>
    <script type="text/javascript">
    
        var current = 1;
        
        var widget      = $(".step");
        var btnnext     = $(".next");
        var btnback     = $(".back"); 
        var btnsubmit   = $(".submit");

        // Init buttons and UI
        widget.not(':eq(0)').hide();
       // hideButtons(current);
        setProgress(current);

        

        // Next button click action
      /*  function btnnxt(){
            if(current < widget.length){
                // Check validation
                if($("#registrationForm").valid()){
                    widget.show();
                    widget.not(':eq('+(current++)+')').hide();
                    setProgress(current);
                }
            }
          //  hideButtons(current);
        } */

        /* Submit button click
        btnsubmit.click(function(){
            alert("Submit button clicked");
        });*/


        // Back button click action
       /* function btnbck(){
            if(current > 1){
                current = current - 2;
                if(current < widget.length){
                    widget.show();
                    widget.not(':eq('+(current++)+')').hide();
                    setProgress(current);
                }
            }
           // hideButtons(current);
        }*/

        $('#registrationForm').validate({ // initialize plugin
            ignore:":not(:visible)",            
            rules: {
                restaurant_name     : "required",
                email    : {required : true, email:true},
                sub_location  : "required",
                contact  : "required",
                address  : "required",
                owner_name : "required",
                password : "required",
                confirmpassword: { required : true, equalTo: "#password"},
            },
        });

    function set2Active(event, percent, step) {
            $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
            $(".progress-completed").text(percent + "%");

            //next button functionality
            if(current < widget.length){
                // Check validation
                if($("#registrationForm").valid()){
                    widget.show();
                    $('#step-3').hide();
                    current++;
                   // widget.not(':eq('+(current++)+')').hide();
                    setProgress(current);
                }
            }
            // it ends here

            $("div").each(function () {
                if ($(this).hasClass("activestep")) {
                    $(this).removeClass("activestep");
                }
            });
             $('#div2').addClass("activestep");
             $('#step-1').hide();
            hideSteps();
            showCurrentStepInfo(step);
        }

    function set3Active(event, percent, step) 
        {
            $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
            $(".progress-completed").text(percent + "%");

            //next button functionality
          /*  if(current < widget.length){
                // Check validation
                if($("#registrationForm").valid()){
                    widget.show();
                    widget.not(':eq('+(current++)+')').hide();
                    setProgress(current);
                }
            }*/
            // it ends here

            $("div").each(function () {
                if ($(this).hasClass("activestep")) {
                    $(this).removeClass("activestep");
                }
            });
            $('#div3').addClass("activestep");
            
            $('#step-1').hide();
            $('#step-2').hide();
            $('#crmaco').show();
            hideSteps();
            showCurrentStepInfo(step);
        }

        function resetActive(event, percent, step) {
            $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
            $(".progress-completed").text(percent + "%");
            $("div").each(function () {
                if ($(this).hasClass("activestep")) {
                    $(this).removeClass("activestep");
                }
            });
            if (event.target.className == "col-md-2") {
                $(event.target).addClass("activestep");
            }
            else {
                $(event.target.parentNode).addClass("activestep");
            }
            hideSteps();
            showCurrentStepInfo(step);
        }
        function reset1Active(event, percent, step) {
            $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
            $(".progress-completed").text(percent + "%");

            //back button functionality
            if(current > 1){
                current = current - 2;
                if(current < widget.length){
                    widget.show();
                    widget.not(':eq('+(current++)+')').hide();
                    //$('#step-2').hide();
                    setProgress(current);
                }
            }
            //it ends here

            $("div").each(function () {
                if ($(this).hasClass("activestep")) {
                    $(this).removeClass("activestep");
                }
            });

                $('#div1').addClass("activestep");


            hideSteps();
            showCurrentStepInfo(step);
        }
        
        function reset2Active(event, percent, step) {
            $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
            $(".progress-completed").text(percent + "%");

            //back button functionality
            if(current > 1){
                current = current - 2;
                if(current < widget.length){
                    widget.show();
                    widget.not(':eq('+(current++)+')').hide();
                    setProgress(current);
                }
            }
            //it ends here

            $("div").each(function () {
                if ($(this).hasClass("activestep")) {
                    $(this).removeClass("activestep");
                }
            });
            $('#div2').addClass("activestep");
            hideSteps();
            showCurrentStepInfo(step);
        }

        function hideSteps() {
            $("div").each(function () {
                if ($(this).hasClass("activeStepInfo")) {
                    $(this).removeClass("activeStepInfo");
                    $(this).addClass("hiddenStepInfo");
                }
            });
        }

        
        function showCurrentStepInfo(step) {        
            var id = "#" + step;
            $(id).addClass("activeStepInfo");
        }


        // Change progress bar action
        function setProgress(currstep){
            var percent = parseFloat(100 / widget.length) * currstep;
            percent = percent.toFixed();
            $(".progress-bar").css("width",percent+"%").html(percent+"%");      
        }

        function requireval(){
            document.getElementById('email').innerHTML="*Please enter a username*";
            return false;
        }

    // Hide buttons according to the current step
      /*function hideButtons(current){
        var limit = parseInt(widget.length); 

        $(".action").hide();

        if(current < limit) btnnext.show();
        if(current > 1) btnback.show();
        if (current == limit) { 
            // Show entered values
            $(".display label.lbl").each(function(){
                $(this).html($("#"+$(this).data("id")).val());  
            });
            btnnext.hide(); 
            btnsubmit.show();
        }
    }*/
</script>
<script type="text/javascript">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-19096935-1', 'auto'); ga('send', 'pageview');
</script>
    <script type="text/javascript" src="js/jquery.min.js"></script>     
    
    <script src="js/modernizr.custom2.js"></script>
    
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery-migrate.js"></script>
    <script type="text/javascript" src="js/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/script_ajax.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="jquery.validate.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dist/js/bootstrapValidator.js" type="text/javascript"></script>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href="css/minified.css" rel="stylesheet"><!-- main css -->

    <script type="text/javascript" src="dist/js/bootstrap-select.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/select2.js"></script>

    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="signupjs.js"></script>
    <script type="text/javascript" src="js/harshit.js"></script>
    <script type="text/javascript" src="js/ajax_script2.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
         function checkCaptcha(value, validator) {
            // Determine the numbers which are generated in captchaOperation
            var items = $('#captchaOperation').html().split(' '),
            sum   = parseInt(items[0]) + parseInt(items[2]);
            return value == sum;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.next').prop('disabled',true);
            $('#contact,#email,#restaurant_name,#password,#confirmpassword').keyup(function(){
                if($('#contact').val().length !=0 && $('#email').val().length !=0 && $('#restaurant_name').val().length !=0 && $('#password').val().length !=0 && $('#confirmpassword').val().length !=0){
                    $('.next').prop('disabled', false);
                               
                }
                else{
                    $('.next').prop('disabled',true);
                    
                }
            })

            $('#confirmpassword').on('keyup', function () {
                if ($(this).val() == $('#password').val()) {
                    $('#message').html('matching').css('color', 'green');
                } else $('#message').html('not matching').css('color', 'red');
            });
        });
    </script>
</html>  


