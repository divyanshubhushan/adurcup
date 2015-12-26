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
    <title>Dashboard | Dashboard</title>
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
                        <li class="active"><a href="index.php"><i class="fa fa-tachometer fa-fw">
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
                      <!--   <li><a href="old.php"><i class="fa fa-th-list fa-fw">
                            <div class="icon-bg bg-blue"></div>
                        </i><span class="menu-title">Previous Associations</span></a> -->
                              
                        <li ><a href="edit.php"><i class="fa fa-gift fa-fw">
                            <div class="icon-bg bg-grey"></div>
                        </i><span class="menu-title">Edit Profile</span></a>
                          
                        </li>
                    </ul>
                </div>
            </nav>
            <!--END SIDEBAR MENU-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Welcome <?= $fgmembersite->ad_name();?>!</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div id="sum_box" class="row mbl">
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-shopping-cart" style="color:#5BC0DE"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>NA</span></h4>
                                        <p class="description">
                                            Coupons Distributed</p>
                                        <!-- <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;" class="progress-bar progress-bar-success">
                                                <span class="sr-only">80% Complete (success)</span></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel income db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-money" style="color :#5CB85C"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>NA</span></h4>
                                        <p class="description">
                                            Coupons Redeemed</p>
                                        <!-- <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 60%;" class="progress-bar progress-bar-info">
                                                <span class="sr-only">60% Complete (success)</span></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-glass" style="color :#D9534F"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>NA</span></h4>
                                        <p class="description">
                                            Active Outlets</p>
                                        <!-- <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 50%;" class="progress-bar progress-bar-danger">
                                                <span class="sr-only">50% Complete (success)</span></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-group" style="color :#F0AD4E"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>NA</span></h4>
                                        <p class="description">
                                            Overall Footfall</p>
                                        <!-- <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 70%;" class="progress-bar progress-bar-warning">
                                                <span class="sr-only">70% Complete (success)</span></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                        <h3 style="margin:10px 0">Footfalls in top places</h3>
                                                        </br>
                                                    <div class="col-lg-10">   
                                                    	<p style="
    font-size: 25px;
    text-align: center;
">Sample</p> 
                                                        <canvas id="canvas" height="100" style="float:left"></canvas>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <h4>Restaurants</h4>
                                                        <table style="font-size:smaller;color:#545454">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5cb85c;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Restaurant 1</td>
                                                                </tr>
                                                                <tr><td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5bc0de;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Restaurant 2</td>
                                                                </tr>
                                                                <tr><td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #d9534f;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Restaurant 3</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        </br>
                                                        <h4>Male/Female</h4>
                                                        <div style="height:90px;width:90px">
                                                        	
                                                            <canvas id="chart-area" width="84" height="84"/>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                        <h3 style="margin:10px 0">Coupons Data</h3>
                                                        </br>
                                                    <div class="col-lg-10">  
                                                    	<p style="
    font-size: 25px;
    text-align: center;
">Sample</p>   
                                                        <canvas id="canvas-bar" height="100"></canvas>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <h4>Coupons</h4>
                                                        <table style="font-size:smaller;color:#545454">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5bc0de;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Coupons Distributed</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5cb85c;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Coupons Redeemed</td>
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
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                        <h3 style="margin:10px 0">Location based statistics</h3>
                                                        </br>
                                                    <div class="col-lg-10">   
                                                    	<p style="
    font-size: 25px;
    text-align: center;
">Sample</p>  
                                                        <canvas id="canvas-polar" height="100"></canvas>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <h4>Location Data</h4>
                                                        <table style="font-size:smaller;color:#545454">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5bc0de;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Location A</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5cb85c;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Location B</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5cb85c;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Location C</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5cb85c;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Location D</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #5cb85c;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Location E</td>
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
    <script src="script/Chart.js"></script>
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
    <script>
            var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
            var lineChartData = {
                labels : ["January","February","March","April","May","June","July"],
                datasets : [
                    {
                        label: "My Second dataset",
                        fillColor : "rgba(217,83,79,0.5)",
                        strokeColor : "rgba(217,83,79,1)",
                        pointColor : "rgba(217,83,79,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(217,83,79,1)",
                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                    },
                    {
                        label: "My First dataset",
                        fillColor : "rgba(92,204,92,0.5)",
                        strokeColor : "rgba(92,204,92,1)",
                        pointColor : "rgba(92,204,92,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(92,204,92,1)",
                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                    },
                    {
                        label: "My Second dataset",
                        fillColor : "rgba(91,192,222,0.5)",
                        strokeColor : "rgba(91,192,222,1)",
                        pointColor : "rgba(91,192,222,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(91,192,222,1)",
                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                    }
                ]

            }

    </script>

    <script>
    var polarData = [
                {
                    value: 300,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Red"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Yellow"
                },
                {
                    value: 40,
                    color: "#949FB1",
                    highlight: "#A8B3C5",
                    label: "Grey"
                },
                {
                    value: 120,
                    color: "#4D5360",
                    highlight: "#616774",
                    label: "Dark Grey"
                }

            ];
    </script>

    <script>
            var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

            var barChartData = {
                labels : ["January","February","March","April","May","June","July"],
                datasets : [
                    {
                        fillColor : "rgba(91,192,222,0.9)",
                        strokeColor : "rgba(91,192,222,0.9)",
                        highlightFill: "rgba(91,192,222,0.9)",
                        highlightStroke: "rgba(91,192,222,1)",
                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                    },
                    {
                        fillColor : "rgba(92,204,92,0.9)",
                        strokeColor : "rgba(92,204,92,0.9)",
                        highlightFill: "rgba(92,204,92,0.9)",
                        highlightStroke: "rgba(92,204,92,1)",
                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                    }
                ]

            }

    </script>

    <script>

        var doughnutData = [
                {
                    value: 300,
                    color:"#FFCE54",
                    highlight: "#FF5A5E",
                    label: "Male"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#01B6AD",
                    label: "Female"
                }
            ];

            window.onload = function(){
                var ctx1 = document.getElementById("canvas").getContext("2d");
                window.myLine = new Chart(ctx1).Line(lineChartData, {
                    responsive: true
                });

                var ctx2 = document.getElementById("chart-area").getContext("2d");
                window.myDoughnut = new Chart(ctx2).Doughnut(doughnutData, {responsive : true});

                var ctx3 = document.getElementById("canvas-bar").getContext("2d");
                window.myBar = new Chart(ctx3).Bar(barChartData, {
                    responsive : true
                });

                var ctx4 = document.getElementById("canvas-polar").getContext("2d");
                window.myPolarArea = new Chart(ctx4).PolarArea(polarData, {
                    responsive:true
                });
            };



    </script>
</body>
</html>