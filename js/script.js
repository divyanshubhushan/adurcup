/**
 * Ajax Image Upload with jQuery
 * 
 * Copyright 2013, Resalat Haque
 * http://www.w3bees.com/
 *
 * @see jQuery Form Plugin
 * http://malsup.com/jquery/form/
 */


$(document).ready(function() {
	var f = $('#form');
	var l = $('#loader'); // loder.gif image
	var b = $('#button'); // upload button
	var p = $('#preview'); // preview area
/*	var f2 = $('#form2');

	var b2 = $('#button2');

	var p2 = $('#preview2');*/


	b.click(function(){
		// implement with ajaxForm Plugin
		f.ajaxForm({
			beforeSend: function(){
				l.show();
				b.attr('disabled', 'disabled');
				p.fadeOut();
			},
			success: function(e){
				l.hide();
				$('#hoho').hide();
				f.resetForm();
				b.removeAttr('disabled');
				p.html(e).fadeIn();
				
			},
			error: function(e){
				b.removeAttr('disabled');
				p.html(e).fadeIn();
			}
		});
	});
	/*b2.click(function(){
		// implement with ajaxForm Plugin
		f2.ajaxForm({
			beforeSend: function(){
				l.show();
				b2.attr('disabled', 'disabled');
				p2.fadeOut();
			},
			success: function(e){
				l.hide();
				f2.resetForm();
				b2.removeAttr('disabled');
				p2.html(e).fadeIn();
				$('#yahoo').hide();


				
			},
			error: function(e){
				b2.removeAttr('disabled');
				p2.html(e).fadeIn();
			}
		});
	});
*/

});