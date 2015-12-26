/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Autocomplete using PHP/MySQL and jQuery
*/

// autocomplet : this function will be executed every time we change the text

function autocomplet() {
	var keyword = $('#s').val();
	

	var n = keyword.length;

	if (n == 0) {
		$('#results_ajax').hide();
		return;
	};
	$.ajax({
		url: 'include/ajax_refresh2.php',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
			$('#results_ajax').show();
			$('#results_ajax').html(data);
		}
	});
}

function adsearch_filter(){
	var filter_location =  $('#e11').val();
	

	$.ajax({
		url: 'include/adsearch_filter.php',
		type: 'POST',
		data: {keyword:keyword, location:location},
		success:function(data){
			$('#results_ajax').show();
			$('#results_ajax').html(data);
		}
	});
}


function pre_fill_form(fill_rest_name,fill_main_address,fill_zomato_link,fill_telephone,fill_postalcode,sub_location,cost_for_2)
{
	$('#results_ajax').hide();

	$('#s').val(fill_rest_name);
	$('.js-example-placeholder-single').val("New Delhi").trigger("change");
	
	$('#address').val(fill_main_address);
	$('#pincode').val(fill_postalcode);
	$('#zomato').val(fill_zomato_link);
	$('#contact').val(fill_telephone);
	$('#sub_location').val(sub_location);
	$('#cost_for_2').val(cost_for_2);

}



function set_location_url(id)
{

	window.location.href = 'public_profile.php?rest_id=' + id;

}
function set_program_url(id)
{
	
	window.location.href = 'ratings.php?program_id=' + id;

}
function set_school_url(id)
{
	
	window.location.href = 'ratings.php?school_id=' + id;

}



// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#s').val(item);

	var id = $('#s').val();
	

	// hide proposition list
	$('#Proffesors_name_id').hide();
}