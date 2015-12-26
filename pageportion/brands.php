<div class="different_filters_divbox">                                           
	<ul class="different_filters">
		<?php		
		$brandarray = $db->getResults('tbl_brands');		
		foreach($brandarray as $brand) {
			$brandname = $brand['brand'];		
			$brand_id = $brand['id'];
			$number_in_category = $db->number_in_category('tbl_products',$brand_id, 'Brand');
		?>		
		<ul style="padding:0">
			<input type="checkbox" id="brand-<?=strtolower($brandname);?>" name="bcheck" class="bcheck" value="<?=$brand['id']?>" checkboxname="<?=$brandname?>" />
			<label for="brand-<?=strtolower($brandname);?>"><?=$brandname?> (<?=$number_in_category?>)</label>
		</ul>
		
		<?php
		}
		?>
		
	</ul>
</div>