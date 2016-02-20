jQuery(function($) {
	filterCheckbox( $('#print') );
	filterCheckbox( $('#electronic') );
	filterCheckbox( $('#entertainment') );

	
	function filterCheckbox($container)
	{
		$container.find('input[type="checkbox"]').on('change', function() {
			var filters = [];
			$container.find('input[type="checkbox"]:checked').each(function() {
				this_filter = $(this).val();
				if ( filters.indexOf(this_filter) === -1 && this_filter !== undefined )
				{
					filters.push(this_filter);
				}
			});
			
			
			
		
		});
	}
});