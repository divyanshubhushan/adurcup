<div class="different_filters_divbox">                                            
	<ul class="different_filters">
		<?php		
		$sizearray = $db->getResults('tbl_sizes');		
		foreach($sizearray as $size) {
			$sizee = $size['size'];	
			$material_id = $size['id'];
			$number_in_category = $db->number_in_category('tbl_productsizes', $material_id, 'sizeID');	
		?>		
		<ul style="padding:0">
			<input type="checkbox" id="size-<?=strtolower($sizee);?>" name="scheck" class="scheck" value="<?=$size['id']?>"/>
			<label for="size-<?=strtolower($sizee);?>"><?=$sizee?> (<?=$number_in_category?>)</label>
		</ul>
		
		<?php
		}
		?>
	</ul>
</div>