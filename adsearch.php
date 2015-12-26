<?php 
require_once("include/membersite_config.php");

if(!$fgmembersite->CheckAdLogin())
{
	if(!$fgmembersite->CheckRestLogin())
	{
		header('Location: login.php'); 
		exit();
	}
	else{
		header('Location: adsearch.php'); 
		exit();
	}
}		
require_once("includes/header_ads.php") 
?>
<main id="main-content" role="main">
	<div id="scroll-wrap" style="margin-top:-15px" >
		<header class="codrops-header23">
			<div class="row">	
				<div class="search_content col-md-12 ">
					<form class="form-inline" action="search.php" method="get">
						<div class="col-xs-5" style="padding:0px;">
							<div class="form-group input-group-lg" style="float:right;font-size:18px" >
								<select id="e11"  name="location" style="width:315px; display: none;">
									<option></option>
									<option value="new_delhi">
										New Delhi
									</option>
									<option value="noida">
										Noida
									</option>
									<option value="gurgaon">
										Gurgaon
									</option>


								</select>
							</div>
						</div>
						<div class="col-xs-7" style="padding-left:12px;">
							<div class="col-xs-6" style="padding:0" >
								<div class="input-group input-group-lg" style="float:left;width: 100%">
									<input class="form-control" autocomplete="off" placeholder="Search here..." name="s" id="s" onkeyup="autocomplet()" type="text" required="required">
									<ul id="results_ajax"></ul>
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary btn-lg"><i class="iconfont-search"></i></button>
									</span>

								</div>
							</div>
							<div class="col-xs-6" style="text-align:left;font-size:20px;padding-top:5px">
								<a href="#" id="advance" class="btn btn-default btn-lg btn-round  " style="font-size:15px	">Advance Search</a>
							</div>
						</div>
					<!-- 	<div class="col-xs-12">
							<div id="advance_content" style="display:none;background:white;padding:10px 0;">
								<div class="col-xs-12" style="background:white">
									<div class="form-group stylish-input col-xs-6" style="Padding:0 10px 15px 10px;text-align:left">
										<label for="dd1" style="font-size:18px;padding:0 15px 0 32%">Peak Time:</label>
										<select id="dd1" class="form-control" style="width:275px">
											<option>Morning</option>
											<option>AfterNoon</option>
											<option>Evening</option>
											<option>Night</option>
										</select>
									</div>
									<div class="form-group stylish-input col-xs-6" style="Padding:0 10px;text-align:left">
										<label for="dd1" style="font-size:18px;padding:0 15px 15px 0">Targeted Customer:</label>
										<select id="dd1" class="form-control" style="width:275px">
											<option>Business Person</option>
											<option>Faimly</option>
											<option>Students</option>
											<option>Teenagers</option>
										</select>
									</div>
								</div>

								<div class="col-xs-12" style="background:white">
									<div class="form-group stylish-input col-xs-6" style="Padding:0 10px 0 10px;text-align:left">
										<label for="dd1" style="font-size:18px;padding:0 37px 0 32%">Delivery:</label>
										<select id="dd1" class="form-control" style="width:275px">
											<option>Pickup</option>
											<option>Home Delivery</option>
										</select>
									</div>
									<div class="form-group stylish-input col-xs-6" style="Padding:0 10px;text-align:left">
										<label for="dd1" style="font-size:18px;padding:0 28px 15px 0">Customer per day:</label>
										<select id="dd1" class="form-control" style="width:275px">
											<option>less than 100</option>
											<option>101 to 200</option>
											<option>201 to 300</option>
											<option>more than 300</option>
										</select>
									</div>
								</div>

							</div>
						</div> -->


					</form>

				</div>
			</div>	
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
				</div>
			</div>
		</header>

	</div>

	<div class="results row" style="padding-top:20px;padding-bottom:20px">
		<div class="singleresult well col-md-8 col-md-offset-2 " style="border:2px" >
			<img src="images/tpot_small.png" class="col-sm-2 col-md-2" style="float:left;padding-right:10px;">
			<div class="col-sm-8 col-md-8" >
				<a href="public_profile.php?rest_id=20"><h3 style="color:#666">T'Pot Cafe </h3></a>
				<p style="margin-bottom:2px">Location: <code> 7 , Main Shivalik Road, Malviya Nagar, New Delhi</code></p>
				<div style="width:100%">
					<p style="float:left;width:50%;height:20px;margin:0">Peak Time: <code> Spring (Mar-Jun)</code> </p>
					<p style="float:left;width:50%;height:20px;margin:0">Targeted Section: <code> Family</code> </p>
				</div>
				<div style="width:100%">
					<p style="float:left;width:50%;height:20px;margin:0">Service:<code> Dine-in</code> </p>
					<p style="float:left;width:50%;height:20px;margin:0">Age Group:<code>25-50 yrs</code> </p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2" style="margin-top:50px">
				<a href="public_profile.php?rest_id=20" style="background:#08c;color:#fff;padding:7px 10px;">Visit Store</a>
			</div>
		</div>



	</div>


	<!-- /container -->

</main>
<div id="spinner">
	<img src="images/spinner.gif" alt="Loading" />
</div>
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
</div>
<style type="text/css">
footer {
	
	width:100%;
	height:36px;
	position:absolute;
	bottom:0;
	left:0;
}
.entryy{
	color: #666;
}
</style>

</body>
</html>
