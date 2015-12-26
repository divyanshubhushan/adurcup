<?php
  require_once("include/membersite_config.php");
if(isset($_POST['personal_edit']))
{

    if(!$fgmembersite->personal_edit())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
}
if(isset($_POST['links_edit']))
{

    if(!$fgmembersite->links_edit())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
}
if(isset($_POST['serving_edit']))
{

    if(!$fgmembersite->serving_edit())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
}

if(isset($_POST['engagement_edit']))
{

    if(!$fgmembersite->engagement_edit())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
}
$restaurant_details = $fgmembersite->get_rest_details();
  require_once("includes/post_login.php");
  require_once("includes/header.php"); 

?>

                                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                                            <ul class="nav navbar-nav">
                                                <li >
                                                    <a class="" href="products.php">Categories</a>
                                                </li>
                                                <li>
                                                    <a class="active" href="zone.php"><!-- <i class="iconfont-plus not-round-icon"></i> -->
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

              <div class='page-wrapper'  >
                    <nav class='navbar black_nav ' style='margin-bottom: 0px;background:#000;opacity:0.8;border:none;'>
                                    <div class='container'>
                                                        
                                                        <p class='details' style='float:left;color:white;margin:9px 0 10px 0;'>
                                                            <span class='rest_name' style='font-size:30px'><?=$restaurant_details['restaurant_name']?> </span></br>
                                                            <?=$restaurant_details['address']?></br>
                                                           <?=$restaurant_details['sub_location']?> , <?=$restaurant_details['location']?>
                                                        </p>
                                                        <p  style='color:white;margin:9px 0 10px 0;float:right' align='center'>
                                                            <span class='ratings' style='font-size:42px;'>N.A.</span></br>
                                                            <img class='rating_img' src='img/stars.png'>
                                                        </p>
                                    </div>
                    </nav>
                      
                </div>
 
               
      
             
<div class="container" style="margin-top:30px">
    <div class="row" style="background-color:grey;padding-bottom:10px" >
    
        <div class="col-md-12 text-center">
           <h3 style="color:white">PERSONAL DETAILS</h3>
            <div class="alert alert-success alert-dismissible col-md-6 col-md-offset-3" id="alert_personal_edit" role="alert" style="display:none">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:-5px"><span aria-hidden="true">&times;</span></button>
                      <strong>Changes have been made!</strong>
                    </div>
        </div>
        <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="personal_edit_form">
        <input id='personal_edit' name='personal_edit' type='hidden' value='1'>       

            <div class="col-md-5 col-md-offset-1">
               
                    <div class="form-group"></div>
                        <label for="name" style="color:white">Restaurant Name</label>
                        <input type="text" value="<?=$restaurant_details['restaurant_name']?>" class="form-control" id="name" name="restaurant_name" placeholder="Enter Name">
                    
                    <div class="form-group"></div>
                        <label for="location" class="control-label" style="color:white">Location</label>
                        <div class=" location_select">
                                               <select aria-hidden="true" name="location" value="<?=$restaurant_details['location']?>" selected tabindex="-1" class="js-example-placeholder-single js-states select2-hidden-accessible" style="width:428.3px;">
                                                    <option></option>
                                                   <option value="Delhi NCR">Delhi NCR</option>     
                                                   <option value="New Delhi"> New Delhi</option>
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
                
                    <div class="form-group"></div>
                        <label for="address" style="color:white">Address</label>
                        <textarea type="text" id="address" class="form-control" name="address" rows="3" placeholder="Enter Address"><?=$restaurant_details['address']?></textarea>
                   
                    
                   
            </div>
            



            <div class="col-md-5 ">
               
                    <div class="form-group"></div>
                        <label for="owner_name" style="color:white">Owner Name</label>
                        <input type="text" class="form-control" id="owner_name" value="<?=$restaurant_details['owner_name']?>" name="owner_name" placeholder="e.g. Neeraj Kumar">
                    
                    <div class="form-group"></div>
                        <label for="contact" style="color:white">Contact</label>
                        <input type="contact" class="form-control" id="contact" value="<?=$restaurant_details['contact']?>" name="contact" placeholder="Enter Contact">
                    
                   <div class="form-group"></div>
                        <label for="pin" style="color:white">Pincode</label>
                        <input type="text" class="form-control" id="pincode"value="<?=$restaurant_details['pincode']?>" name="pincode" placeholder="Enter Pincode">
                    
                    <div class="form-group"></div>
                        <label for="year" style="color:white">Established In</label>
                        <input type="text" class="form-control" id="year" value="<?=$restaurant_details['year']?>" name="year" placeholder="e.g. 2000">

                     <button class="btn btn-alert" type="submit" style="float:right;margin:10px">Save It </button>
                    
                   <!-- 
                    <div class="form-group"></div>
                        <label for="tag" style="color:white">Tag Line</label>
                        <textarea type="text" id="address" class="form-control" name="tag_line" rows="3" placeholder="Enter Address"></textarea> -->
                   
            </div>
        </form>

    </div>
</div>



<div class="container" style="background-color:grey; margin-top:30px" >
    <div class="row" style="margin-bottom:10px">
    
        <div class="col-md-12 text-center">
           <h3 style="color:white">LINKS AND PASSWORD</h3>
           <div class="alert alert-success alert-dismissible col-md-6 col-md-offset-3" id="alert_links_edit" role="alert" style="display:none">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:-5px"><span aria-hidden="true">&times;</span></button>
                      <strong>Changes have been made!</strong>
                    </div>
        </div>
         <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="links_edit_form">
        <input id='links_edit' name='links_edit' type='hidden' value='1'>       
        <div class="col-md-5 col-md-offset-1">
            
                <div class="form-group"></div>
                    <label for="zomato" style="color:white">Zomato Link</label>
                    <input type="text" class="form-control" value="<?=$restaurant_details['zomato']?>" name="zomato" id="zomato" placeholder="Enter Zomato Link">
               
                <div class="form-group"></div>
                    <label for="pass" style="color:white">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                
            
        </div>
        



        <div class="col-md-5 ">
            
                <div class="form-group"></div>
                    <label for="fb" style="color:white">Facebook Link</label>
                    <input type="text" value="<?=$restaurant_details['facebook']?>" class="form-control" id="fb" name="fb" placeholder="Enter FB link">
                
                <div class="form-group"></div>
                    <label for="pass" style="color:white">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpass" placeholder="Enter password again">

                 <button class="btn btn-alert" type="submit" style="float:right;margin:10px">Save It </button>
            

        </div>
        </form>
    </div>
</div>

<div class="container" style="background-color:grey; margin-top:30px" >
    <div class="row" style="margin-bottom:10px">
    
        <div class="col-md-12 text-center">
           <h3 style="color:white">SERVING DETAILS</h3>
        </div>
         <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="serving_edit_form">
        <input id='serving_edit' name='serving_edit' type='hidden' value='1'>       
        <div class="col-md-5 col-md-offset-1">
            
                <div class="form-group"></div>
                    <label for="cuisine" style="color:white">Cuisine</label>
                    <select id="e9" class="select2min" multiple name="taste[]" style="width:428.3px;display: none;">
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
                                                    <option value="chinese">
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
               
                <div class="form-group"></div>
                    <label for="age" style="color:white">Age Group</label>
                    <select class="form-control"  name="age_group">
                                                             <option selected="true" style="display:none;">
                                                                Select Option
                                                            </option>
                                                            <option>
                                                                1-12
                                                            </option>
                                                            <option>
                                                                13-24
                                                            </option>
                                                            <option>
                                                                25-50
                                                            </option>
                                                            <option>
                                                                50-above
                                                            </option>
                                                        </select>
                
                 <div class="form-group"></div>
                    <label for="aq" style="color:white">Aquainted With</label>
                    <select class="form-control"   name="section">
                                                             <option selected="true"  style="display:none;">
                                                                Select Option
                                                            </option>
                                                            <option>
                                                                Couple
                                                            </option>
                                                            <option>
                                                                Family
                                                            </option>
                                                            <option>
                                                                Student
                                                            </option>
                                                            <option>
                                                                Professional
                                                            </option>
                    </select>

                 <div class="form-group"></div>
                    <label for="peak" style="color:white">Peak Hours</label>
                    <div >
                                                        <select class="form-control" name="busy_hours">
                                                            <option selected="true" style="display:none;">
                                                                Select Option
                                                            </option>
                                                            <option>
                                                                 05:00 AM-07:59 AM
                                                            </option>
                                                            <option>
                                                                08:00 AM-11:59 AM
                                                            </option>
                                                            <option>
                                                                12:00 PM-01:59 PM
                                                            </option>
                                                            <option>
                                                                02:00 PM-04:59 PM
                                                            </option>
                                                            <option>
                                                                05:00 PM-07:59 PM
                                                            </option>
                                                            <option>
                                                                08:00 PM-10:59 PM
                                                            </option>
                                                            <option>
                                                                11:00 PM-04:59 AM
                                                            </option>
                                                        </select>
                                                    </div>
                
        </div>
        



        <div class="col-md-5">
            
                <div class="form-group"></div>
                    <label for="cost" style="color:white">Cost For Two</label>
                    <div class="input-group spinner" style="width:140px">
                        <input type="text" class="form-control" value="100" id="cost_for_2" name="cost_for_2">
                            <div class="input-group-btn-vertical">
                                <a class="btn btn-default"><i class="iconfont-caret-up"></i></a>
                                <a class="btn btn-default"><i class="iconfont-caret-down"></i></a>
                            </div>
                        </div>
                
                <div class="form-group"></div>
                    <label for="service" style="color:white">Service Offered</label>
                    <select id="e10" multiple name="service[]" class="select2min"   style="width:428.3px; float:left;display: none;" >
                                                    <option value="dine-in">
                                                        Dine in
                                                    </option>
                                                    <option value="outdoor-seating">
                                                        Outdoor seating
                                                    </option>
                                                    <option value="lounge">
                                                         Lounge
                                                    </option>
                                                    <option value="home-delivery">
                                                        Home delivery
                                                    </option>
                                                    <option value="take-away">
                                                        Take away
                                                    </option>
                                                </select>
                
                <div class="form-group"></div>
                    <label for="peak_s" style="color:white">Peak Season</label>
                    <select class="form-control" name="max_sale">
                                                            <option selected="true"  style="display:none;">
                                                                Select Option
                                                            </option>
                                                            <option>
                                                                Summer (May-Jul)
                                                            </option>
                                                            <option>
                                                                Rainy (Aug-Sep)
                                                            </option>
                                                            <option>
                                                                Autumn (Oct-Nov)
                                                            </option>
                                                            <option>
                                                                Winter (Dec-Feb)
                                                            </option>
                                                            <option>
                                                                Spring (Mar-Jun)
                                                            </option>
                                                        </select>
                
                <div class="form-group"></div>
                    <label for="billing" style="color:white">Billing</label>
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
                <!--  <button class="btn btn-alert" type="submit" style="float:right;margin:10px">Save It </button> -->

        </div>
        </form>

    </div>
</div>


<div class="container" style="background-color:grey; margin-top:30px" >
    <div class="row" style="margin-bottom:10px">
    
        <div class="col-md-12 text-center">
           <h3 style="color:white">ENGAGEMENTS</h3>
        </div>
         <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="engagement_edit_form">
        <input id='engagement_edit' name='engagement_edit' type='hidden' value='1'>       
        <div class="col-md-5 col-md-offset-1">
           
                <div class="form-group"></div>
                <label for="print" style="color:white">Print Options</label>
                <div >
                     <select id="e8" multiple class="select2min" name="print[]" style="width:428px; display: none;" >
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
            
                <div class="form-group"></div>
                <label for="name" style="color:white">Entertainment</label>
                <div >
                                                        <select id="e5" multiple class="select2min" name="entertainment[]"style="width:428.3px; display: none;" >
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



        <div class="col-md-5">
            
                <div class="form-group"></div>
                <label  style="color:white" for="e8">Electronic Options</label>
                                                    <div >
                                                        <select id="e6" multiple class="select2min" name="electronic[]" style="width:428px; display: none;" >
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
            
                <div class="form-group"></div>
                <label for="other" style="color:white">Other(optional)</label>
                <input type="text" class="form-control" id="other" placeholder="">
             
               <!--   <button class="btn btn-alert" type="submit" style="float:right;margin:10px">Save It </button>
 -->
        </div>
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

        .step .fa {
        padding-top: 15px;
        font-size: 40px;
        }
        
        #page-wrapper{
        
        overflow:visible;
        }
        </style>

    <script type="text/javascript">

        (function ($) {

        



          $('.spinner .btn:first-of-type').on('click', function() {
            var value= parseInt($('.spinner input').val(), 10);
                if (value <= 100 ) {
                      $('.spinner input').val( 100);
                } 
                if (value >= 100 && value <= 999 ) {
                      $('.spinner input').val( value - value%50 + 50);
                } 
                if (value >= 1000 && value <= 1999) {
                     $('.spinner input').val( value - value%100 + 100);
                } 
                if (value >= 2000 && value <= 2999) {
                     $('.spinner input').val( value - value%200 + 200);
                }
                if (value >= 3000 && value <= 4999) 
                {
                    $('.spinner input').val( value - value%250 + 250);
                }
           
          });
          $('.spinner .btn:last-of-type').on('click', function() {
            
            var value= parseInt($('.spinner input').val(), 10);
                if (value >= 150 && value <= 1000 ) {
                      $('.spinner input').val( value - value%50 - 50);
                } 
                if (value >= 1100 && value <= 2000) {
                     $('.spinner input').val( value - value%100 - 100);
                } 
                if (value >= 2200 && value <= 3000) {
                     $('.spinner input').val( value - value%200 - 200);
                }
                if (value >= 3250 && value <= 5000) 
                {
                    $('.spinner input').val( value - value%250 - 250);
                }

          });
        })(jQuery);


         function checkCaptcha(value, validator) {
        // Determine the numbers which are generated in captchaOperation
        var items = $('#captchaOperation').html().split(' '),
            sum   = parseInt(items[0]) + parseInt(items[2]);
        return value == sum;
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

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

            $('#div1').addClass("activestep");


        hideSteps();
        showCurrentStepInfo(step);
        }
        function set2Active(event, percent, step) {


        $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });


            $('#div2').addClass("activestep");


        hideSteps();
        showCurrentStepInfo(step);
        }
        function reset2Active(event, percent, step) {
        $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

         $('#div2').addClass("activestep");

        hideSteps();
        showCurrentStepInfo(step);
        }

        function set3Active(event, percent, step) 
        {
        $(".bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

          $('#div3').addClass("activestep");
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

        $(document).ready(function() {

            $('#links_edit_form').bootstrapValidator({
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

            $( ".navbar-nav li:nth-child(1) > a" ).removeClass("active");
            $( ".navbar-nav li:nth-child(2) > a" ).addClass("active");

        });
     </script> 
     <script type="text/javascript">
        $(function(){
            $('#personal_edit_form').ajaxForm(function() { 
                $('#alert_personal_edit').fadeIn( "slow" ).show().delay(2000).fadeOut(400);
            }); 
            $('#links_edit_form').ajaxForm(function() { 
                $('#alert_links_edit').fadeIn( "slow" ).show().delay(2000).fadeOut(400);
            });
            $('#personal_edit_form').ajaxForm(function() { 
                $('#personal_edit').fadeIn( "slow" ).show().delay(2000).fadeOut(400);
            });
            $('#personal_edit_form').ajaxForm(function() { 
                $('#personal_edit').fadeIn( "slow" ).show().delay(2000).fadeOut(400);
            });
        });    
     </script>

    
        <script src="js/minified.min.js"></script> 
          <script type="text/javascript" src="dist/js/bootstrap-select.js"></script>
         <script src="js/checkbox.js"></script> 
         <script src="js/owl.carousel.js"></script> 
         <script src="js/contact.js"></script>
        
         <script src="js/jquery.easing.min.js"></script> 
         <script src="js/scrolling-nav.js"></script>
         <?php include("includes/login_popup.php"); ?>
      
    </body>
</html>