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
				<a class="brand" href="index.php"><span>AdUrCup</span></a>
								
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
				
				<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li ><a  href="restaurant_signup.php" ><i class="icon-tasks"></i><span class="hidden-tablet"> Restaurant Signups</span></a></li>
						<li class="active"><a  href="orders.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Restaurant Orders</span></a></li>
						<li><a  href="booked_ads.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Advertiser Booking</span></a></li>
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
						<h2><i class="halflings-icon white user" ></i><span class="break"></span>Restaurants Orders</h2>
						
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delItem" style="float:right;">Delete Item</button>

						<!-- Modal -->
							<div id="delItem" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Delete Item</h4>
							      </div>
							      <div class="modal-body">
							        <p>Are you sure want to delete item?</p>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
							        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
							      </div>
							    </div>

							  </div>
							</div>

						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addItem" style="float:right;">Add Item</button>

						<!-- Modal -->
							<div id="addItem" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							      	<div class="alert alert-success" id="mail_sent" style="display: none;">
															  <button type="button" class="close" data-dismiss="alert">&times;</button>
															  <div class="alert-inner">
																<strong>Thanks,</strong> Item has been added.
															  </div>
                                                        </div>
														<div class="alert alert-warning" id="err_msg" style="display: none;">
															  <button type="button" class="close" data-dismiss="alert">&times;</button>
															  <div class="alert-inner">
																<strong>Sorry!</strong> Something went wrong, please try again later.
															  </div>
														 </div>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Add Item</h4>
							      </div>
							      <div class="modal-body">
							        
							      
							      
							            <div class="itemadform">
							                <form class="form-horizontal" id="addite" action="insertitem.php" method="post" >
							                 <p>
							                  <label for="proid">Product Id</label>
							                  <input name="proid" type="text" id="proid" size="30" class="form-control" style="width:100%;" />
							                 </p>
							                 <p>
							                  <label for="proname">Title</label>
							                  <input name="proname" type="text" id="proname" size="30" class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="brandid">Brand Id</label>
							                  <input name="brandid" type="text" id="brandid" size="30" class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="category">Category</label>
							                  <input name="category" type="text" id="category" size="30" class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="shape">Shape</label>
							                  <input name="shape" type="text" id="shape" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 
							                 <p>
							                  <label for="material">Material</label>
							                  <input name="material" type="text" id="material" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="color">Color</label>
							                  <input name="color" type="text" id="color" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="qual">Quality</label>
							                  <input name="qual" type="text" id="qual" size="30 " class="form-control" style="width:100%;"/>
							                 </p>

							                 
							                 <p>
							                  <label for="sized">Size D</label>
							                  <input name="sized" type="text" id="sized" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="sizea">Size A</label>
							                  <input name="sizea" type="text" id="sizea" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="sizel">Size L</label>
							                  <input name="sizel" type="text" id="sizel" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="vol">Volume</label>
							                  <input name="vol" type="text" id="vol" size="30 " class="form-control" style="width:100%;"/>
							                 </p>

							                 <p>
							                  <label for="manu">Manufacture</label>
							                  <input name="manu" type="text" id="manu" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="desc1">Description 1</label>
							                  <input name="desc1" type="text" id="desc1" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="desc2">Description 2</label>
							                  <input name="desc2" type="text" id="desc2" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="spec">Specification</label>
							                  <input name="spec" type="text" id="spec" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="design">Design</label>
							                  <input name="design" type="text" id="design" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="type">Type</label>
							                  <input name="type" type="text" id="type" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="venprice">Vendor's Price</label>
							                  <input name="venprice" type="text" id="venprice" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="oprice">Our price</label>
							                  <input name="oprice" type="text" id="oprice" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="moq">MOQ</label>
							                  <input name="moq" type="text" id="moq" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="act">Active</label>
							                  <input name="act" type="text" id="act" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="add">Advertisement Option</label>
							                  <input name="add" type="text" id="add" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <label for="image_src">Product Image</label>
							                  <input name="image_src" type="text" id="image_src" size="30 " class="form-control" style="width:100%;"/>
							                 </p>
							                 <p>
							                  <input name="submit" type="submit" value="Save"/>
							                 </p>
							                </form>
							            </div>
							        </div>  
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>
						
					</div>
					

						<table id="example" class="table table-striped table-bordered bootstrap-datatable datatable display" cellspacing="0" width="100%">
							<thead>
									<tr>
										<!-- <th><input type="checkbox" id="bulkdelete"/> -->
										<th>Id</th>
										<th>Product Id</th>
										<th>Title</th>
										<th>Category</th>
										<th>Shape</th>
										<th>Material</th>
										<th>Quality</th>
										<th>Size D</th>
										<th>Size A</th>
										<th>Size L</th>
										<th>Volume</th>
										<th>Manufacture</th>
										<th>Description 1</th>
										<th>Description 2</th>
										<th>Specification</th>
										<th>Design</th>
										<th>Type</th>
										<th width="8%">Our Price</th>
										<th>MOQ</th>
										<th>Active</th>
										<th>Image Src</th>
										<!-- th>Delivery</th>
										<th>Unit Description</th>
										<th>Advertisement</th> -->
										
										
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
					"sAjaxSource": "server_side/scripts/inventory_processing.php",
					"aaSorting": [ [0,'desc'] ],
					"sPaginationType": "full_numbers",
					"fnDrawCallback": function () {
						$('#example tbody td').not(":nth-child(1)").not(":nth-child(9)").not(":nth-child(4)").not(":nth-child(10)").not(":nth-child(12)").not(":nth-child(17)").editable( 'examples_support/item_editable.php', {
							
							
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
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.form.min.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	<script>
		$(document).ready(function() {
					/*$('#login_forum').bootstrapValidator({
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
						},
						onError: function(e) {
							$('#error').modal('show')
						}
					});*/
					
					$('#addite').ajaxForm({
						success: function(res) { 
							if(res==0){
								$('#mail_sent').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
							}
							else{
								$('#err_msg').fadeIn( "slow" ).show().delay(5000).fadeOut(400);
							}
					}
				});
	});
			
	</script>
	
	<!-- end: JavaScript-->
	
</body>
</html>