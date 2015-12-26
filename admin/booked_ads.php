<?PHP
require_once("include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Adurcup Admin panel</title>
	<meta name="description" content="Adurcup Database Dashboard">
	<meta name="author" content="Harshit Mittal">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

		<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="datatable/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="datatable/resources/demo.css">
	<style type="text/css" class="init">

	table.dataTable tr td:first-child {
		text-align: center;
	}
	
	table.dataTable tr td:first-child:before {
		content: "\f096"; /* fa-square-o */
		font-family: FontAwesome;
	}

	table.dataTable tr.selected td:first-child:before {
		content: "\f046"; /* fa-check-square-o */
	}

	table.dataTable tr td.dataTables_empty:first-child:before {
		content: "";
	}

	.dataTables_wrapper{
				white-space : pre-wrap;
				overflow-x: scroll;
			}

	</style>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" language="javascript" src="examples_support/jquery.jeditable.js"></script>
	<script type="text/javascript" language="javascript" src="examples_support/jquery.dataTables.js"></script>

	<script type="text/javascript" language="javascript" src="datatable/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="datatable/resources/demo.js"></script>

	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"sAjaxSource": "server_side/scripts/booked_ad_server.php",
					"aaSorting": [ [0,'desc'] ],
					"sPaginationType": "full_numbers",
					"fnDrawCallback": function () {
						$('#example tbody td').editable( 'examples_support/booked_ad_editable_ajax.php', {
							
							
							"callback": function( sValue, y ) {
								/* Redraw the table from the new data on the server */
								sValue = JSON.parse(sValue);
								var aPos1 = oTable.fnGetPosition( this )[0];
								var aPos2 = oTable.fnGetPosition( this )[1];
                     			oTable.fnUpdate( sValue, aPos1, aPos2 );
                  
							},
							"submitdata": function ( value, settings ) {
							var sort = $(this).parent().find('.sorting_1').html();
		                        return {
		                            "row": oTable.fnGetPosition( this )[0],
		                            "column": oTable.fnGetPosition( this )[2],
		                            "edit_id": sort,

		                        };
		                    },
							"height": "14px"
						} );
					}
				} );
			} );
		</script>

	
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="dashboard.php"><span>AdUrCup</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								2 </span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 2 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">1 min</span> 
                                    </a>
                                </li>
							
								<li>
                                    <a href="#">
										<span class="icon yellow"><i class="icon-shopping-cart"></i></span>
										<span class="message">New Order Received</span>
										<span class="time">1 hour</span> 
                                    </a>
                                </li>
								
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
						</li>
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i><?= $fgmembersite->UserName() ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li><a  href="restaurant_signup.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Restaurant Signups</span></a></li>
						<li ><a  href="orders.php" ><i class="icon-dashboard"></i><span class="hidden-tablet"> Restaurant Orders</span></a></li>
						<li class="active"><a  href="booked_ads.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Advertiser Booking</span></a></li>
						<li ><a  href="brand_signup.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Advertiser Signups</span></a></li>

						
					
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10" style="padding-right:0px" >
			
			
			
				
					<div class="box-header" style="margin-bottom:10px">
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Advertisement Booking</h2>
						
					</div>
					

						<table id="example" class="table table-striped table-bordered bootstrap-datatable datatable display" cellspacing="0" width="100%">
							<thead>
									<tr>
							
										<th>Id</th>
										<th>Name</th>
										<th>Company Name</th>
										<th>Nature of Biz.</th>
										<th>Designation</th>
										<th>Email</th>
										<th>Contact</th>
										<th>Restaurant Id</th>
										<th>Restaurant name</th>
										<th>Status</th>
										<th>Updated Time </th>
									
										
										
									</tr>
							</thead>
						</table>
				


    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	
	<div class="clearfix"></div>
	
<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 <a href="http://www.adurcup.com" alt="Bootstrap_Metro_Dashboard">Adurcup.com</a></span>
			
		</p>

	</footer>
	
	
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	


	
	<!-- end: JavaScript-->
	
</body>
</html>