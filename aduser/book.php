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
    <title>Data Grid | Data Grid</title>
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
     <link type="text/css" rel="stylesheet" href="styles/jplist-custom.css">
            <link href="css/jplist.textbox-filter.min.css" rel="stylesheet" type="text/css" />
     <style type="text/css">
        .page-content{
            padding: 0;
        }
        .details{
            font-size: 
        }
     </style>
</head>
<body>
    <div>
    <a id="totop" href="#" style="display: none;"><i class="fa fa-angle-up"></i></a>
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
        
            <!--END MODAL CONFIG PORTLET-->
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
                        <li class="active"><a href="book.php"><i class="fa fa-th-list fa-fw">
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
                       <!--  <li><a href="old.php"><i class="fa fa-th-list fa-fw">
                            <div class="icon-bg bg-blue"></div>
                        </i><span class="menu-title">Previous Associations</span></a>
                               -->
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
                            Book Restaurants</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Data Grid</li>
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
                            
                            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel" style="background-color:#f0f2f5;border:none">
                            <div class="panel-body">
                                <div id="demo" class="box jplist">
                                    <div class="jplist-ios-button"><i class="fa fa-sort"></i>Filter Options</div>
                                    <div class="jplist-panel box panel-top">
                                        <div class="col-md-12">
                                            
                                             <div class="col-md-6 col-sm-6" style="padding:0 10px 0 0;">
                                                <div class="text-filter-box" id="search_rest">
                                                     <button class="btn btn-default" style="min-height:40px" type="button" id="title-search-button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                    <input class="form-control" data-path=".restaurant_name" data-button="#title-search-button" type="text" value="" placeholder="Search by restaurant name.." data-control-type="textbox" data-control-name="title-filter" style="width:85%" data-control-action="filter">
                                                            
                                                   
                                                </div>
                                               
                                                   
                                            </div>
                                       
                                       
                                            <div class="col-md-4 col-sm-4" style="padding:0 10px 0 0;">
                                                <div 
                                                    id="location"
                                                    style="height:40px" 
                                                    class="jplist-drop-down form-control " 
                                                    data-control-type="filter-drop-down" 
                                                    data-control-name="sub_location" 
                                                    data-control-action="filter">
                                                    
                                                    
                                                    <ul class="dropdown-menu" style="border:1px solid #ccc;color:#666;border-radius:4px;background:#f9f9f9">
                                                        <li><span data-path="default">Choose Location</span></li>
                                                        <li><span data-path=".malviya">Malviya Nagar</span></li>
                                                        <li><span data-path=".kailash">Greater Kailash-2</span></li>
                                                        <li><span data-path=".connaught">Connaught Place</span></li>
                                                         <li><span data-path=".hauz">Hauz Khas Village</span></li>
                                                        <li><span data-path=".saket">Saket</span></li>
                                                        <li><span data-path=".noida">Noida</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-2 col-sm-2" style="padding:0;">
                                                <button style="height:40px;background:#069;color:#fff;border:none;width:100%" type="button" data-control-type="reset" data-control-name="reset" data-control-action="reset" class="jplist-reset-btn btn btn-default">Reset<i class="fa fa-share mls"></i></button>
                                            </div>
                                        
                                         </div>


                                         <div class="col-md-12" style="margin-bottom:20px">
                                             <div class="col-md-3" style="padding:0 10px 0 0">
                                                <div 
                                                    class="jplist-drop-down form-control"
                                                    style="font-size:14px;margin:10px 0 0 0;width:100%"
                                                    data-control-type="filter-drop-down" 
                                                    data-control-name="service" 
                                                    data-control-action="filter">
                                                    
                                                   <ul style="border:1px solid #ccc;color:#666;border-radius:4px;background:#f9f9f9">
                                                        <li><span data-path="default">Filter by Service</span></li>
                                                        <li><span data-path=".dine">Dine in</span></li>
                                                        <li><span data-path=".cafe">Cafe</span></li>
                                                        <li><span data-path=".pub">Pub</span></li>
                                                        <li><span data-path=".fine">Fine Dine</span></li>
                                                        <li><span data-path=".casual">Casual Dine</span></li>
                                                        <li><span data-path=".american">American</span></li>
                                                        <li><span data-path=".bakery">Bakery</span></li>
                                                        <li><span data-path=".qsr">QSR</span></li>
                                                     <!--    <li><span data-path=".outdoor-seating">Outdoor-seating</span></li> -->
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-3" style="padding:0 10px 0 0">
                                                <div 
                                                    class="jplist-drop-down font-14  form-control"
                                                    style="font-size:14px;margin:10px 0 0 0;width:100%" 
                                                    data-control-type="filter-drop-down" 
                                                    data-control-name="age_group" 
                                                    data-control-action="filter">
                                                    
                                                    <ul style="border:1px solid #ccc;color:#666;border-radius:4px;background:#f9f9f9">
                                                        <li><span data-path="default">Filter By Age</span></li>
                                                        <li><span data-path=".13-25">13-25</span></li>
                                                        <li><span data-path=".25-35">25-35</span></li>
                                                        <li><span data-path=".35-50">35-50</span></li>
                                                        
                                                       <!--  <li><span data-path=".Lounge">Lounge</span></li>
                                                        <li><span data-path=".Home Delivery">Home Delivery</span></li>
                                                        <li><span data-path=".Take Away">Take Away</span></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- checkbox filters -->
                                            <div class="col-md-5" style="padding:0 10px 0 0">
                                                <div
                                                    class="jplist-group"
                                                    style="font-size:14px;margin:10px 0 0 0;width:100%"
                                                    data-control-type="checkbox-group-filter"
                                                    data-control-action="filter"
                                                    data-control-name="section">

                                                   
                                                        <input
                                                            data-path=".couple"
                                                            id="architecture"
                                                            type="checkbox"
                                                        />

                                                        <label for="architecture" style="margin:0 10px 0 5px">Couple</label>
                                                 

                                                   
                                                        <input
                                                            data-path=".family"
                                                            id="christmas"
                                                            type="checkbox"
                                                        />

                                                        <label for="christmas" style="margin:0 10px 0 5px">Family</label>
                                                 

                                                    
                                                        <input
                                                            data-path=".student"
                                                            id="nature"
                                                            type="checkbox"
                                                        />

                                                        <label for="nature" style="margin:0 10px 0 5px">Student</label>
                                                   
                                                    
                                                        <input
                                                            data-path=".professional"
                                                            id="lifestyle"
                                                            type="checkbox"
                                                        />

                                                        <label for="lifestyle" style="margin:0 0 0 5px">Professional</label>

                                                      <!--   <input
                                                            data-path=".residential"
                                                            id="lifestyle"
                                                            type="checkbox"
                                                        />

                                                        <label for="lifestyle" style="margin:0 0 0 5px">Residential</label> -->
                                              
                                                </div>
                                            </div>

                                            <div data-control-type="items-per-page-drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                                                    <ul class="dropdown-menu">
                                                                        <li><span data-number="12" data-default="true"> 12 per page</span></li>
                                                                        <li><span data-number="24"> 24 per page</span></li>
                                                                        <li><span data-number="48"> 48 per page</span></li>
                                                                        <li><span data-number="all"> view all</span></li>
                                                                    </ul>
                                                                </div>


                                                              
                                                               
                                                                 <div data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                                                
                                                                <div 
                                                                    class="jplist-hide-preloader jplist-preloader"
                                                                    data-control-type="preloader" 
                                                                    data-control-name="preloader" 
                                                                    data-control-action="preloader">
                                                                    <img src="img/common/ajax-loader-line.gif" alt="Loading..." title="Loading..." />
                                                                </div>

                                         </div>

                                        
                                    </div>
                                    <!-- ajax content here -->   
                                    <div class="list box text-shadow"></div>
                                                        
                                    <!-- no result found -->
                                    <div class="box jplist-no-results text-shadow align-center jplist-hidden">
                                        <p class="alert alert-success col-md-9 col-md-offset-1" style="margin-top:20px;text-align:center">No results with these filters.</p>
                                    </div>
                                   
                                    
                                    <div class="jplist-ios-button"><i class="fa fa-sort"></i>More Filters</div>
                                    <div class="jplist-panel box panel-bottom">
                                                            <div data-control-type="items-per-page-drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                                                <ul class="dropdown-menu">
                                                                    <li><span data-number="12" data-default="true"> 12 per page</span></li>
                                                                    <li><span data-number="24"> 24 per page</span></li>
                                                                    <li><span data-number="48"> 48 per page</span></li>
                                                                    <li><span data-number="all"> view all</span></li>
                                                                </ul>
                                                            </div>
                                                            <div data-control-type="sort-drop-down" data-control-name="sort" data-control-action="sort" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                                                <ul class="dropdown-menu">
                                                                    <li><span data-path="default">Sort by</span></li>
                                                                    <li><span data-path=".restaurant_name" data-order="asc" data-type="text">Title A-Z</span></li>
                                                                    <li><span data-path=".restaurant_name" data-order="desc" data-type="text">Title Z-A</span></li>
                                                                    
                                                                
                                                                </ul>
                                                            </div>
                                                            <div data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                                            <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>
                                                        </div>
                                </div>
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
    <script src="script/highcharts.js"></script>
    <script src="script/data.js"></script>
    <script src="script/drilldown.js"></script>
    <script src="script/exporting.js"></script>
    <script src="script/highcharts-more.js"></script>
    <script src="script/charts-highchart-pie.js"></script>
    <script src="script/charts-highchart-more.js"></script>
    <script src="script/modernizr.min.js"></script>
    <script src="script/jplist.min.js"></script>
    <script src="script/jplist.js"></script>

    <!-- JPLIST JS -->

            <!-- jPList core js and css  -->
<!--         <link href="css/jplist.core.min.css" rel="stylesheet" type="text/css" />      -->   
            <script src="js/jplist.core.min.js"></script>
                
        <!-- sort bundle -->
        <script src="js/jplist.sort-bundle.min.js"></script>
        
        <!-- Textbox Control -->            
        <!-- textbox filter control -->
        <script src="js/jplist.textbox-filter.min.js"></script>
<!--         <link href="css/jplist.textbox-filter.min.css" rel="stylesheet" type="text/css" /> -->
        
        <!-- jplist pagination bundle -->
        <script src="js/jplist.pagination-bundle.min.js"></script>
   <!--      <link href="css/jplist.pagination-bundle.min.css" rel="stylesheet" type="text/css" />   -->     
        
        <!-- jplist history bundle -->
        <script src="js/jplist.history-bundle.min.js"></script>
<!--         <link href="css/jplist.history-bundle.min.css" rel="stylesheet" type="text/css" /> -->
        
        <!-- jplist toggle bundle -->
        <script src="js/jplist.filter-toggle-bundle.min.js"></script>
<!--         <link href="css/jplist.filter-toggle-bundle.min.css" rel="stylesheet" type="text/css" /> -->
        
        <!-- jplist views control -->
        <script src="js/jplist.views-control.min.js"></script>
   <!--      <link href="css/jplist.views-control.min.css" rel="stylesheet" type="text/css" /> -->
        
        <!-- filter dropdown control -->
        <script src="js/jplist.filter-dropdown-bundle.min.js"></script>


        <!-- preloader -->
        <script src="js/jplist.preloader-control.min.js"></script>
        <link href="css/jplist.preloader-control.min.css" rel="stylesheet" type="text/css" />
        
        <script>
        $('document').ready(function () {
            $('#demo').jplist({
                debug: true,
                 itemsBox: '.list'
                , itemPath: '.list-item'
                , panelPath: '.jplist-panel'
                ,redrawCallback: ''
                //save plugin state with storage
                 ,storage: 'localstorage' //'', 'cookies', 'localstorage'           
                 ,storageName: 'jplist'
                 ,cookiesExpiration: -1 //cookies expiration in minutes (-1 = cookies expire when browser is closed)
                 ,effect: 'fade' //'', 'fade'
                 ,duration: 300         
                 ,fps: 24
                //data source
                , dataSource: {

                    type: 'server'
                    , server: {

                        //ajax settings
                        ajax: {
                            url: 'server/server-html.php'
                            , dataType: 'html'
                            , type: 'POST'
                        }
                    }
                }

            });



        });
        </script>
        <script>
        function show_interest(outlet_id,rest_id) {
            var btn_text_success = "Cancel Request";
            var idd = 'outlet_id_'+ outlet_id;
            $.ajax({
                type: "POST",
                url: "server/show_interest.php",
                data:{"rest_id":rest_id,"outlet_id":outlet_id},
                success:function() {
                    $('#'+idd).text(btn_text_success);
                    $('#'+idd).attr('onclick', 'delete_interest('+outlet_id+','+rest_id+')');
                    $('#'+idd).css("background-color", "#dc6767", "important");
                },
                error:function(){
                    alert('error submitting interest');
                }
            });
        }
        function delete_interest(outlet_id,rest_id) {
           var btn_text_success = "Show Interest";
            var idd = 'outlet_id_'+ outlet_id;
            $.ajax({
                type: "POST",
                url: "server/delete_interest.php",
                data:{"rest_id":rest_id,"outlet_id":outlet_id},
                success:function(html) {
                    $('#'+idd).text(btn_text_success);
                    $('#'+idd).attr('onclick', 'show_interest('+outlet_id+','+rest_id+')');
                    $('#'+idd).css("background-color", "#5BC0DE", "important");

                },
                error:function(){
                    alert('error deleting interest');
                }
            });
        }
        </script>

    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
   
</body>
</html>