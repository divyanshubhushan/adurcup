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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tables | Tables</title>
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
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <style>
    
    /* 
    Max width before this PARTICULAR table gets nasty
    This query will take effect for any screen smaller than 760px
    and also iPads specifically.
    */
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
    
        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
            display: block; 
        }
        
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        tr { border: 1px solid #ccc; }
        
        td { 
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee; 
            position: relative;
            padding-left: 50%; 
        }
        
        td:before { 
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%; 
            padding-right: 10px; 
            white-space: nowrap;
        }
        
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "#"; }
        td:nth-of-type(2):before { content: "Restaurant Name"; }
        td:nth-of-type(3):before { content: "Location"; }
        td:nth-of-type(4):before { content: "Advertisement from"; }
        td:nth-of-type(5):before { content: "Advertisement to"; }
        td:nth-of-type(6):before { content: "Total Cost"; }
        td:nth-of-type(7):before { content: "Status"; }
        td:nth-of-type(8):before { content: "More"; }
    }
    
    /* Smartphones (portrait and landscape) ----------- */
    @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 480px) {
        body { 
            padding: 0; 
            margin: 0; 
            width: 320px; }
        }
    
    /* iPads (portrait and landscape) ----------- */
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        body { 
            width: 495px; 
        }
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
                                <li><a href="book.php"><i class="fa fa-envelope"></i>My Bookings<span class="badge badge-danger">3</span></a></li>
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
                        <li class="active"><a href="old.php"><i class="fa fa-th-list fa-fw">
                            <div class="icon-bg bg-blue"></div>
                        </i><span class="menu-title">Previous Associations</span></a>
                              
                        <li ><a href="edit.php"><i class="fa fa-gift fa-fw">
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
                           Previous Associations</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Tables</li>
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
                                    <div class="col-lg-12" style="font-size:14px">
                                        <div class="panel panel-yellow">
                                            <div class="col-lg-12 text-center" style="font-size:18px;padding-top:10px;color:#f2994b">
                                                <p>Advertisement Campaign 1: 1st September to 1st December</p>
                                            </div>
                                            
                                            <div class="panel-body">
                                                <table class="table table-hover" style="margin:0">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Restaurant Name</th>
                                                        <th>Location</th>
                                                        <th>Advertisement from</th>
                                                        <th>Advertisement to</th>
                                                        <th>Total Cost</th>
                                                        <th>Status</th>
                                                        <th>More</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Restaurant 1</td>
                                                        <td>Malviya Nagar</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-success">Approved</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Restaurant 2</td>
                                                        <td>Kadduuu</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-info">Pending</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Restaurant 3</td>
                                                        <td>Bhindii Pura</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Restaurant 4</td>
                                                        <td>Aalooo Nagar</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12" style="font-size:14px">
                                        <div class="panel panel-green">
                                            <div class="col-lg-12 text-center" style="font-size:18px;padding-top:10px;color:#488c6c">
                                                <p>Advertisement Campaign 2: 1st September to 1st December</p>
                                            </div>
                                            
                                            <div class="panel-body">
                                                <table class="table table-hover" style="margin:0">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Restaurant Name</th>
                                                        <th>Location</th>
                                                        <th>Advertisement from</th>
                                                        <th>Advertisement to</th>
                                                        <th>Total Cost</th>
                                                        <th>Status</th>
                                                        <th>More</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Restaurant 1</td>
                                                        <td>Malviya Nagar</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-success">Approved</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Restaurant 2</td>
                                                        <td>Kadduuu</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-info">Pending</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Restaurant 3</td>
                                                        <td>Bhindii Pura</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Restaurant 4</td>
                                                        <td>Aalooo Nagar</td>
                                                        <td>July 2015</td>
                                                        <td>December 2015</td>
                                                        <td>Rs. 20000</td>
                                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                                        <td style="float:left">
                                                            <ul style="float:left;padding-left:0;background:#999;padding:0.2em 0.6em 0.3em;color:#fff;font-size:11px">Advertisement Details</ul>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');


</script>
</body>
</html>
