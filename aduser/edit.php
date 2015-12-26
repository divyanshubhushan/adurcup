<?php 
require_once("server/membersite_config.php");
if(!$fgmembersite->CheckAdLogin())
{
    if(!$fgmembersite->CheckRestLogin())
    {
        header('Location: http://www.adurcup.com/login'); 
        exit();
    }
}
if(isset($_POST['pass_edit']))
{

    if(!$fgmembersite->aduser_edit_pass())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
} 
if(isset($_POST['name_edit']))
{

    if(!$fgmembersite->aduser_edit_name())
    {
          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";
        
    }
    
}   
$ad_details = $fgmembersite->ad_details(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Extras | Extras</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link href="../dist/css/bootstrapValidator.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <style type="text/css">
    .control-label{
        text-align: left !important;
    }
    </style>
</head>
<body>
    <div>
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a id="logo" href="index.php" class="navbar-brand"><span class="fa fa-rocket"></span><img src="images/adurcup.png" style="width:90px"><span style="display: none" class="logo-text-icon">µ</span></a>
                </div>
                <div class="topbar-main">
                    <ul class="nav navbar navbar-top-links navbar-right mbn">
                        <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><!-- <span class="badge badge-green">3</span> --></a>
                            
                        </li>
                        <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><!-- <span class="badge badge-orange">7</span> --></a>
                            
                        </li>

                            
                        </li>
                        <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/profile.png" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?= $fgmembersite->ad_name(); ?> </span>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-user pull-right">
                                <li><a href="index.php"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="interests.php"><i class="fa fa-envelope"></i>My Bookings<span class="badge badge-danger">3</span></a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-key"></i>Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro=""
                data-position="right" class="navbar-default navbar-static-side">
                <div class="sidebar-collapse menu-scroll">
                    <ul id="side-menu" class="nav">
                        
                        <div class="clearfix"></div>
                        <li ><a href="index.php"><i class="fa fa-tachometer fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i><span class="menu-title">Dashboard</span></a></li>
                        </li>
                        <li><a href="book.php"><i class="fa fa-th-list fa-fw">
                            <div class="icon-bg bg-blue"></div>
                        </i><span class="menu-title">Book Restaurants</span></a>
                              
                        </li>
                        <li><a href="interests.php"><i class="fa fa-database fa-fw">
                            <div class="icon-bg bg-red"></div>
                        </i><span class="menu-title">Your Interests</span></a>
                          
                        </li>
                    <!--     <li><a href="bidding.html"><i class="fa fa-database fa-fw">
                            <div class="icon-bg bg-red"></div>
                        </i><span class="menu-title">Bidding Portal</span></a>
                          
                        </li> -->
                     <!--    <li><a href="old.php"><i class="fa fa-th-list fa-fw">
                            <div class="icon-bg bg-blue"></div>
                        </i><span class="menu-title">Previous Associations</span></a> -->
                              
                        <li class="active"><a href="edit.php"><i class="fa fa-gift fa-fw">
                            <div class="icon-bg bg-grey"></div>
                        </i><span class="menu-title">Edit Profile</span></a>
                          
                        </li>
                    </ul>
                </div>
            </nav>
          
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Edit Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Extras</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Extras</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                
                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>
                                
                            </div>

                            <div class="col-lg-12">
                              
                                    
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="row mtl">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="text-center mbl" style="border-radius:5px;overflow:hidden"><img src="./images/profile.png" alt="" height="250px" class="img-responsive" style="border-radius:50% !important" /></div>
                                                    <div class="text-center mbl"><a href="#" class="btn btn-green"><i class="fa fa-upload"></i>&nbsp;
                                                        Upload New Image</a></div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-8">
                                                <div class="col-md-12">
                                                     <div class="alert alert-success alert-dismissible col-md-12" id="alert_edit_pass" role="alert" style="display:none;text-align:center;position:absolute;top:-22px;left:0">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:-5px"><span aria-hidden="true">&times;</span></button>
                                                      <strong>Changes have been made!</strong>
                                                    </div>
                                                </div>
                                                   
                                                <div id="generalTabContent" class="tab-content">
                                                    <div id="tab-edit" class="tab-pane fade in active">
                                                     
                                                        <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' class="form-horizontal" id="edit_aduser_form">
                                                            <h3 style="text-align:center;padding-bottom:20px;">Change Password</h3>
                                                            <input id='pass_edit' name='pass_edit' type='hidden' value='1'>    
                                                            <div class="form-group"><label class="col-sm-3 control-label">New Password</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><input type="password" name="password" placeholder="password" class="form-control"/></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           <!--  <div class="form-group"><label class="col-sm-3 control-label">Confirm Password</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><input type="password" name="confirmPassword" placeholder="confirm password" class="form-control"/></div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <hr/>
                                                            <button type="submit" class="btn btn-green btn-block">Change Password</button>
                                                        </form>
                                                    </div>
                                                </div>
                                               
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                                     <div class="alert alert-success alert-dismissible col-md-8 col-md-offset-2" id="alert_edit_name" role="alert" style="display:none;text-align:center;position:absolute;top:-12px;left:0">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="right:-5px"><span aria-hidden="true">&times;</span></button>
                                                      <strong>Changes have been made!</strong>
                                                    </div>
                                                </div>
                                         <div id="generalTabContent" class="tab-content">
                                            <div id="tab-edit" class="tab-pane fade in active">
                                                <form action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' class="form-horizontal" id="name_aduser_form">
                                                           
                                                            <input id='name_edit' name='name_edit' type='hidden' value='1'>    
                                                    <h3 style="text-align:center;padding-bottom:20px;">Profile Settings</h3>
                                                    <div class="col-md-6">
                                                         <div class="form-group"><label class="col-sm-5 control-label">Name</label>

                                                            <div class="col-sm-7 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-12"><input type="text" placeholder="" value="<?=$ad_details['name']?>" name="name" class="form-control"/></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group"><label class="col-sm-5 control-label">Company Name</label>

                                                            <div class="col-sm-7 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-12"><input type="text" placeholder=""  value="<?=$ad_details['company_name']?>" name="company_name" class="form-control"/></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                         <div class="form-group"><label class="col-sm-5 control-label">Nature of Business</label>

                                                            <div class="col-sm-7 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-12"><input type="text" name="nature_of_biz"  value="<?=$ad_details['nature_of_biz']?>" placeholder="" class="form-control"/></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group"><label class="col-sm-5 control-label">Designation</label>

                                                            <div class="col-sm-7 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-12"><input type="text" placeholder=""  value="<?=$ad_details['designation']?>" name="designation" class="form-control"/></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group"><label class="col-sm-5 control-label">Email</label>

                                                            <div class="col-sm-7 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-12"><input type="text" placeholder="" name="email"  value="<?=$ad_details['email']?>" disabled class="form-control" value="" /></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group"><label class="col-sm-5 control-label">Contact</label>

                                                            <div class="col-sm-7 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-12"><input type="text" name="contact"  value="<?=$ad_details['contact']?>" placeholder="" class="form-control"/></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <hr/>
                                                    <button type="submit" class="btn btn-green btn-block">Update Profile</button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                              
                            </div>
                                
                            
                     
                            
                        </div>
                    </div>
                </div>
                <!--END CONTENT-->
                
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    <script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="../dist/js/bootstrapValidator.js" type="text/javascript"></script>
    <script src="script/html5shiv.js"></script>
    <script src="script/respond.min.js"></script>
    <script src="script/jquery.metisMenu.js"></script>
    <script src="script/jquery.slimscroll.js"></script>
    <script src="script/jquery.cookie.js"></script>
    <script src="script/icheck.min.js"></script>
    <script src="script/custom.min.js"></script>
    <script src="script/jquery.news-ticker.js"></script>
    <script src="script/jquery.menu.js"></script>
    <script src="script/pace.min.js"></script>
    <script src="script/holder.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <script src="script/jquery.flot.js"></script>
    <script src="script/jquery.flot.categories.js"></script>
    <script src="script/jquery.flot.pie.js"></script>
    <script src="script/jquery.flot.tooltip.js"></script>
    <script src="script/jquery.flot.resize.js"></script>
    <script src="script/jquery.flot.fillbetween.js"></script>
    <script src="script/jquery.flot.stack.js"></script>
    <script src="script/jquery.flot.spline.js"></script>
    <script src="script/zabuto_calendar.min.js"></script>
    <script type="text/javascript" src="../js/jquery.form.min.js"></script>
    <script src="script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="script/highcharts.js"></script>
    <script src="script/data.js"></script>
    <script src="script/drilldown.js"></script>
    <script src="script/exporting.js"></script>
    <script src="script/highcharts-more.js"></script>
    <script src="script/charts-highchart-pie.js"></script>
    <script src="script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            /*$('#edit_aduser_form').bootstrapValidator({
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
*/
            

        });
    
    </script>
    <script type="text/javascript">
        $(function(){
            $('#edit_aduser_form').ajaxForm(function() { 
                $('#alert_edit_pass').fadeIn( "slow" ).show().delay(2000).fadeOut(400);
                $('#edit_aduser_form').trigger("reset");
            }); 
            $('#name_aduser_form').ajaxForm(function() { 
                $('#alert_edit_name').fadeIn( "slow" ).show().delay(2000).fadeOut(400);
            }); 
        });    
     </script>


</body>
</html>
