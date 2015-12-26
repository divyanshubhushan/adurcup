jQuery(function($) {
	
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - Remove Row on click Close button
	| ----------------------------------------------------------------------------------
	*/
	$(document).on('click', '.tbl-cart .close', function() {
		var $this = $(this),
			$item = $this.closest('tr'),
			id = $item.data('product-id');
			
		cookie = getCookie();
		cookie = toJSON(cookie);
		
		for ( var x in cookie )
		{
			if ( cookie[x].id == id )
			{
				cookie.splice(x,1);
			}
		}
		
		setCookie(cookie);
		
		$(this).closest('tr').fadeOut(500, function() {
			$(this).remove();
			update_cart_total();
			updateCart();
			
			if ( $('.tbl-cart tbody tr:not(.empty-cart)').length == 0 ) {
				$('.tbl-cart .empty-cart').removeClass('hide');
			}
		});
		
	});
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - Fetch Cookie data and display cart items
	| ----------------------------------------------------------------------------------
	*/
	function output_cookie()
	{
		var cookie = $.cookie('cart');	
		if ( cookie === undefined ) {
			$('#empty-cart').show();
			$('#my-cart').hide();
			return;
		} else {
			$('#empty-cart').hide();
			$('#my-cart').show();
		}
		cookie = $.parseJSON(cookie);
		if ( cookie.length === 0 ) {
			$('#empty-cart').show();
			$('#my-cart').hide();
			return;
		} else {
			$('#empty-cart').hide();
			$('#my-cart').show();
		}
		var sample_count = 0;
		var sample;
		var button;
		
		
		for ( var x in cookie )
		{
			temp = cookie[x].price;
			temp = temp.replace( /^\D+/g, '');
			if (temp == 0 ) {
				sample_count++;
				sample = "sample";
				button = "disabled";


			}
			else{
				sample = "";
				button = "";
			}
			temp = parseFloat(temp).toFixed(2);
			temp *= cookie[x].qty;
			
			
			var $new = $('<tr> \
							<td> \
								<a class="entry-thumbnail" href="' + cookie[x].thumbnail + '" data-toggle="lightbox">\
									<img src="' + cookie[x].thumbnail + '" alt="' + cookie[x].title + '" /> \
								</a> \
								<a class="entry-title" href="' + cookie[x].url + '">' + cookie[x].title + '</a> \
								<code style="float:right;margin-top:30px">' + sample + '</code> \
							</td> \
							<td><span class="unit-price">₹' + cookie[x].price + '</span></td> \
							<td> \
								<div class="qty-btn-group"> \
									<button type="button"' + button + ' class="down"><i class="iconfont-caret-down inline-middle"></i></button> \
									<input type="text"' + button + ' value="' + cookie[x].qty + '" /> \
									<button type="button"' + button + ' class="up"><i class="iconfont-caret-up inline-middle"></i></button> \
								</div> \
							</td> \
							<td class="hidden-xs"><strong class="text-bold row-total">₹' + Math.round(temp) + '</strong></td> \
							<td class="hidden-xs"><button type="button" class="close" aria-hidden="true">×</button></td> \
						</tr>');
			
			$new.data('product-id', cookie[x].id);
			$new.appendTo( $('.tbl-cart tbody') );
			$new.find('[data-toggle="lightbox"]').magnificPopup({
				type: 'image'
			});

		}
		
		update_cart_total();

		if(sample_count>0 && sample_count<=10){
			console.log(sample_count);
			var e = $('<div class="alert alert-warning fade in" align="center"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Note:</strong>Total of Rs.50 will be charged for ordering samples. </div>');
			$('#note').append(e);   
		}
		if(sample_count>10){
			console.log(sample_count);
			var e = $('<div class="alert alert-warning fade in " align="center"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Note:</strong>Total of Rs.100 will be charged for ordering samples. </div>');
			$('#note').append(e);   
		}
		

	}

	output_cookie();
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - QTY
	| ----------------------------------------------------------------------------------
	*/
	$('.qty-btn-group button').on('click', function() {
		var $this = $(this),
			$input = $this.siblings('input'),
			val = parseInt($input.val());
		
		val = ( $this.hasClass('up') ) ? ++val : --val;
		if ( isNaN(val) || val < 0 ) val = 0;
		
		$input.val(val);
		
		var $row = $this.closest('tr'),
			unit_price = $row.find('.unit-price').text(),
			row_total = unit_price.replace( /^\D+/g, '') * val,
			id = $row.data('product-id');
		
		$row.find('.row-total').text('₹' + row_total.toFixed(2));
		
		cookie = getCookie();
		cookie = toJSON(cookie);
		
		for ( var x in cookie )
		{
			if ( cookie[x].id == id )
			{
				cookie[x].qty = val;
			}
		}
		
		setCookie(cookie);

		updateCart();
		update_cart_total();
	});

	//  Return Total Amount

	function total_amount()
	{	
		var total = 0;
			delivery = 0;
			sample_count_total = 0;
			sample_amount=0;

		$('.tbl-cart .row-total').each(function() {
			temp = $(this).text();
			temp = temp.replace( /^\D+/g, '');
			if(temp==0){
				sample_count_total++;
			}

			temp = parseFloat(temp);
			
			if ( ! isNaN(temp) )
			{
				total += temp;
			}
			
		});
		if (total==0) {

				if (sample_count_total >0 && sample_count_total<=10) {
					sample_amount = 50;
			

				}
				if (sample_count_total>10) {
					sample_amount = 100;
				
				}
		
			delivery = 0;
		}

		if(total > 0 && total<10000)
		{		

				delivery = 300;
				sample_amount = 0;

		}
		if(total>=10000){
				delivery = 0;
				sample_amount = 0;

			}
		/* if (total>=5000) {
			total = total*0.8;
		} */

		

		total = Math.round(total+delivery+sample_amount);

	

		$('input[name=amount]').val(total);



		
	}

	/*function product_info()
	{	
		var total = 0;

		$('.tbl-cart .row-total').each(function() {
			temp = $(this).text();
			temp = temp.replace( /^\D+/g, '');
			temp = parseFloat(temp);
			
			if ( ! isNaN(temp) )
			{
				total += temp;
			}
			$('input[name=amount]').val(total);
		});

		
	}*/
		
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - Update Total & Sub Total
	| ----------------------------------------------------------------------------------
	*/
	function update_cart_total()
	{
		var total = 0,
			subtotal = 0;
			sample_count_total = 0;
			sample_amount = 0;
			delivery = 0;			
		$('.tbl-cart .row-total').each(function() {
			temp = $(this).text();
			temp = temp.replace( /^\D+/g, '');
			if(temp==0){
				sample_count_total++;
			}

			temp = parseFloat(temp);
			
			if ( ! isNaN(temp) )
			{
				total += temp;
			}
		});

		if (total==0) {

				if (sample_count_total >0 && sample_count_total<=10) {
					sample_amount = 50;
			

				}
				if (sample_count_total>10) {
					sample_amount = 100;
				
				}
		
			delivery = 0;
		}

		if(total > 0 && total<10000)
		{		

				delivery = 300;
				sample_amount = 0;

		}
		if(total>=10000){
				delivery = 0;
				sample_amount = 0;

			}

		/* if (total>=5000) {
			
			var discount = total*0.2;
			
		}
		else{
			discount = 0;

		}
 */
 	
 		discount = 0;
		


		total = Math.round(total+delivery+sample_amount);


		$('.tbl-cart .unit-price').each(function() {
			temp = $(this).text();
			temp = temp.replace( /^\D+/g, '');
			temp = parseFloat(temp);
			
			if ( ! isNaN(temp) )
			{
				subtotal += temp;
			}
		});
		var total_minus_delivery = Math.round( total - delivery );
		discount = Math.round(discount);
		subtotal = Math.round(subtotal);
		total = Math.round(total-discount);
		
		$('.shopcart-total .delivery_charges > .pull-right').text('₹' + delivery.toFixed(2));
		$('.shopcart-total .total_minus_delivery > .pull-right').text('₹' + total_minus_delivery.toFixed(2));
		$('.shopcart-total .discount > .pull-right').text('- ₹' + discount.toFixed(2));
		if (discount==0) {
		
			$( ".discount" ).toggleClass( "hidden", true );
		}
		else{
			$( ".discount" ).toggleClass( "hidden", false );
		}
		
		$('.shopcart-total .cart-subtotal > .pull-right').text('₹' + subtotal.toFixed(2));
		$('.shopcart-total .cart-total > .pull-right').text('₹' + total.toFixed(2));
		total_amount();
	}
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Product Single Page - Change Product Preview Image
	| ----------------------------------------------------------------------------------
	*/
	$('.product-preview .thumbs > li > a').on('click', function(e) {
		e.preventDefault();
		var $preview = $('.product-preview .big-image');
		$preview.find('a').attr( 'href', $(this).attr('href') );
		$preview.find('img').attr( 'src', $(this).children().attr('src') );
	});
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Setup Product Grid Layout
	| ----------------------------------------------------------------------------------
	*/
	

	$('[data-layout="list"], [data-layout="grid"]').on('click', function(e) {
		e.preventDefault();
		$product_layout.toggleClass('grid').toggleClass('list').isotope('reLayout');
		$(this).closest('ul').find('.active').removeClass('active');
		$(this).addClass('active');
	});
	
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Add Helper Classes to Vertical Menu
	| ----------------------------------------------------------------------------------
	*/
	$('.vmenu li').each(function() {
		if ( $(this).find('ul').length )
		{
			$(this).addClass('has-submenu');
		}
	});
	


});