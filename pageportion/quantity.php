<div class="different_filters_divbox">                                            
	<ul class="different_filters">
		<?php		
		$sizearray = $db->getResults('volume');		
		foreach($sizearray as $size) {
			$sizee = $size['volumesize'];	
			//$material_id = $size['Brand'];
			$number_in_category = $db->number_in_category('updatedtables',$sizee, 'volume');	
		?>		
		<ul style="padding:0">
			<input type="checkbox" id="size-<?=strtolower($sizee);?>" name="quancheck" class="quancheck" value="<?=$size['id']?>"/>
			<label for="size-<?=strtolower($sizee);?>"><?=$sizee?> (<?=$number_in_category?>)</label>
		</ul>
		
		<?php
		}
		?>
	</ul>
</div>