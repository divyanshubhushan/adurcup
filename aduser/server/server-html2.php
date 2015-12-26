<?php
	//added standard php/mysql config file with host, user and password info
	require "config.php";
	
	//models and collections
	require "domain/models/filter-result-model.php";
	require "domain/collection/filter-result-collection.php";
	
	//domain
	require "domain/action.php";
	require "domain/sorting.php";
	require "domain/pagination.php";
	require "domain/filtering.php";
	require "domain/server.php";
	
	//controls
	require "controls/sortdropdown.php";	
	require "controls/textbox.php";	
	require "controls/checkboxgroupfilter.php";
	require "controls/filterdropdown.php";
	require "controls/filterselect.php";
		
	class jPListHTML extends jPListServer{
			
		/**
		* get html for one item
		* @param {Object} $item
		* @return {string} html
		*/
		private function getHTML($item){
		
			$html = "";
		
			$html .= "<div class='list-item box col-lg-4' style='padding:5px 10px'>";
			$html .= "	<div class='panel' style='border:1px solid #e5e5e5'>";
			$html .= "		<div class='panel-body' style='padding:8px 15px'>";
			$html .= "			<div class='profile'>";
			$html .= "				<div style='margin-bottom: 15px' class='row'>";


			$html .= "					<div class='col-xs-12 col-sm-3 text-center' style='padding:0 2px;margin-bottom:5px'>";
			$html .= "						<img src='images/avatar/101.png' alt='' style='display: inline-block;max-width:75px' class='img-responsive img-circle'/>";
			$html .= "					</div>";
			$html .= "					<div class='col-xs-12 col-sm-9'>";
			$html .= "						<h2 style='padding:5px 0;font-size:25px;margin:0;color:#666'>" . $item['restaurant_name'] . "</h2>";
			$html .= "							<p style='padding:0;margin:0;font-size:14px;color:#999'>" . $item['location'] . "</p>";
			$html .= "							<p style='padding:0;margin:0'><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star-o'></span></a></p>";
			$html .= "					</div>";

			$html .= "					<div class='col-xs-12 col-sm-12' style='float:left;border-top:1px solid #f5f5f5;padding-top:5px;font-size:14px'>";
			$html .= "					<div class='col-xs-12 col-sm-3' style='padding:0 2px;margin-bottom:10px'>";
			$html .= "						<p style='padding:0;margin:0;color:#de7047'>Service:</p>
											<p style='padding:0;margin:0;color:#de7047'>Profession:</p>
											<p style='padding:0;margin:0;color:#de7047'>Age:</p>";
			$html .= "					</div>";
			$html .= "					<div class='col-xs-12 col-sm-9'>";
			$html .= "						<p style='padding:0;margin:0'>" . $item['service'] . "</p>";
			$html .= "						<p style='padding:0;margin:0'>" . $item['section'] . "</p>";
			$html .= "						<p style='padding:0;margin:0'>" . $item['age_group'] . "</p>";
			$html .= "					</div>";
			$html .= "					</div>";
			$html .= "				</div>";

			$html .= "				<div class='row text-center' style='border-top:1px solid #f5f5f5'>";
			$html .= "					<div class='col-xs-12 col-sm-12' style='padding-top:10px'>";
			$html .= "						<p style='margin:0'><small>Current Bid</small></p>";
			$html .= "						<h2 style='color:#390'><strong>27,000</strong></h2>";
			$html .= "					</div>";
			$html .= "				</div>";

			$html .= "				<div class='row text-center' style='border-top:1px solid #f5f5f5'>";
			$html .= "					<div class='col-xs-12 col-sm-12' style='padding-top:10px'>";
			$html .= "						<h2 style='color:#333;margin:0'><strong>02 : 33 : 57</strong></h2>";
			$html .= "						<p><small>Bidding Time Left</small></p>";
			$html .= "					</div>";
			$html .= "				</div>";
			$html .= "				<div class='row text-center'>";
			$html .= "					<button class='col-sm-7' style='padding:4px 0;margin:0 0 0 10px;font-size:16px;color:#fff;background:#666;border:none;border-radius:4px;'>You Are Winning!</button>";
			$html .= "					<button class='col-sm-4' style='padding:4px 0;margin:0 0 0 10px;font-size:16px;color:#fff;background:#c33;border:none;border-radius:4px;'>Leave</button>";
			$html .= "				</div>";
			$html .= "			</div>";
			$html .= "		</div>";
			$html .= "	</div>";
			$html .= "</div>";

			return $html;
		}
		
		/**
		* get the whole html
		* @param {string} $itemsHtml - items html
		* @return {string} html
		*/
		private function getHTMLWrapper($itemsHtml){
			
			$html = "";
			
			$html .= "<div data-type='jplist-dataitem' data-count='" . $this->pagination->numberOfPages . "' class='box'>";
			$html .= $itemsHtml;
			$html .= "</div>";		
			
			return $html;
		}
		
		/**
		* constructor
		*/
		public function __construct(){
			
			$html = "";
			
			try{
				parent::__construct();
				
				if(isset($this->statuses)){
					
					$items = $this->getData();
					
					if($items){
						foreach($items as $item){
							$html .= $this->getHTML($item);					
						}
					}
								
					//print html
					echo($this->getHTMLWrapper($html));
				}
				
				//close the database connection
				$this->db = NULL;
			}
			catch(PDOException $ex){
				print "Exception: " . $ex->getMessage();
			}
		}
	}
	
	/**
	* start
	*/
	new jPListHTML();
?>	