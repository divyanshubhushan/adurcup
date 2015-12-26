/**
 * Ajax Image Upload with jQuery
 * 
 * Copyright 2013, Resalat Haque
 * http://www.w3bees.com/
 *
 * @see jQuery Form Plugin
 * http://malsup.com/jquery/form/
 */
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}
var images = Array("images/back2.png",
					"images/background_2.jpg",
                   "images/background_3.jpg");

$([images[0],images[1],images[2]]).preload();

// Usage:

var currimg = 0;


$(document).ready(function() {
	var f = $('form');
	var l = $('#loader'); // loder.gif image
	var b = $('#button'); // upload button
	var p = $('#preview'); // preview area



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
				
			
				window.location.reload();
			},
			error: function(e){
				b.removeAttr('disabled');
				p.html(e).fadeIn();
			}
		});
	});
	function loadimg(){
        
       $('#background').animate({ opacity: 1 }, 500,function(){

            //finished animating, minifade out and fade new back in           
            $('#background').animate({ opacity: 0.7 }, 100,function(){
                
                currimg++;
                
                if(currimg > images.length-1){
                    
                    currimg=0;
                    
                }
                
                var newimage = images[currimg];
            
                //swap out bg src                
                $('#background').css("background-image", "url("+newimage+")"); 
            
                //animate fully back in
                $('#background').animate({ opacity: 1 }, 400,function(){

                    //set timer for next
                    setTimeout(loadimg,3000);

                });

            });
        
        });

     }
     setTimeout(loadimg,3000);
});