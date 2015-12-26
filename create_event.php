<?php
  require_once("include/membersite_config.php");
if(isset($_POST['create_event']))
{

    if(!$fgmembersite->create_event())
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
 
               
      
             
             
<div class="col-md-10 col-md-offset-1" style="margin-top:30px;">
    <div class="row" >
    
        <div class="col-md-12 text-center">
           <h3>Create Event</h3>
            <div class="alert alert-success alert-dismissible col-md-6 col-md-offset-3" id="create_event_success" role="alert" style="display:none">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:-5px"><span aria-hidden="true">&times;</span></button>
                      <strong>Event has been created!</strong>
                    </div>
        </div>
        <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' class="form-horizontal" method='post' id ="create_event_form">
        <input id='create_event' name='create_event' type='hidden' value='1'>       
            <div class="container">
                
                <div class="col-sm-12 well text-center" style="background:#e7e7e7;border:none;border-radius:5px;box-shadow:none">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name" style="float:left;">Event Name</label>
                            <input type="text" required class="form-control" id="event_name" name="event_name" placeholder="Enter Event Name" style="border:none;border-radius:4px;background:#fff;box-shadow:none;font-size:14px">
                        
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description" style="float:left;">Description</label>
                            <textarea type="text" required id="description" class="form-control" name="description" rows="3" placeholder="Enter Description" style="border:none;border-radius:4px;background:#fff;box-shadow:none"></textarea>
                        
                        </div>
                    </div>
                    
                        <div class="col-sm-4" style="padding-left:0">
                            <label for="from" style="float:left;margin-bottom:5px">Start Date</label>
                            <input class="span2" placeholder="click to select" value="" required name="date_from" id="dpd1" type="text" style="width:100%;border:none;border-radius:4px;background:#fff;box-shadow:none;font-size:14px">
                        </div>
                        <div class="col-sm-4">
                            <label for="to" style="float:left;margin-bottom:5px">End Date</label>
                            <input class="span2" placeholder="click to select" value="" required name="date_to" id="dpd2" type="text" style="width:100%;border:none;border-radius:4px;background:#fff;box-shadow:none;font-size:14px">
                        </div>
                        
                    
                     <div class="col-sm-2 col-sm-offset-2" style="float:right;padding:0">
                        <button class="btn btn-info" type="submit" style="background:#0086d4;color:#fff;top:25px;width:100%;border-radius:4px;height:35px"> Create Event </button>
                     </div>

                </div>
            </div>

           
            



        </form>

    </div>

    <div class="col-md-12" style="padding:0;margin:20px 0">
        <div class="col-md-12 text-center" style="padding:0px;margin-bottom:10px">
           <h3>Past Events</h3>
        </div>
        <div class="col-md-12" style="padding:0px">
           <?= $fgmembersite->get_past_events();?>
        </div>
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

         <link href="css/datepicker.css" rel="stylesheet" type="text/css">
        <script src="js/minified.min.js"></script> 
          <script type="text/javascript" src="dist/js/bootstrap-select.js"></script>
         <script src="js/checkbox.js"></script> 
         <script src="js/owl.carousel.js"></script> 
         <script src="js/contact.js"></script>
        
         <script src="js/jquery.easing.min.js"></script> 
         <script src="js/scrolling-nav.js"></script>

        <script src="js/bootstrap-datepicker.js"></script>
    <script>
  
        $(function(){

            // disabling dates
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#dpd1').datepicker({
              onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
              }
              checkin.hide();
              $('#dpd2')[0].focus();
            }).data('datepicker');
            var checkout = $('#dpd2').datepicker({
              onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              checkout.hide();
            }).data('datepicker');


            $('#create_event_form').ajaxForm({
                beforeSubmit:  function() {
                     //Call the reset before the ajax call starts
                },
                success: function(data){
                  $('#create_event_success').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
                     $('#create_event_form').clearForm(); 
                }
            });
            
            });
    </script>
        <?php include("includes/login_popup.php"); ?>
      
    </body>
</html>