
  function calculate_price(){
    var value= parseInt($('.spinner input').val(), 10);
    var  unit_price = $(".price").text(),
    final_price =  unit_price* value;

    $('.total_price').text('Rs.' + final_price.toFixed(2));
}
$(function(){ $('.btn').button() });

$(function(){



    $('.spinner .btn:first-of-type').on('click', function() {
        var value= parseInt($('.spinner input').val(), 10);
        var temp;
        if (value <= 10 ) {

          temp = 10;
      } 
      if (value >= 10 && value <= 99 ) {
          temp = value - value%10 + 10;
      } 
      if (value >= 100 && value <= 999 ) {
         temp = value - value%50 + 50;
     } 
     if (value >= 1000 && value <= 1999) {
        temp = value - value%100 + 100;
    } 
    if (value >= 2000 && value <= 2999) {
     temp = value - value%200 + 200;
 }
 if (value >= 3000 && value <= 4999) 
 {
    temp = value - value%250 + 250;
}
if (value >= 5000 ) 
{
    temp = value - value%1000 + 1000;
}
$('.spinner input').val( temp);
var  unit_price = $(".price").text(),
final_price =  unit_price* temp;

$('.total_price').text('Rs.' + final_price.toFixed(2));


});
          $('.spinner .btn:last-of-type').on('click', function() {
            
            var value= parseInt($('.spinner input').val(), 10);
            var temp;
                 if (value <= 10 ) {

                      temp = 1;
                } 
                if (value >= 11 && value <= 99 ) {
                  
                      if(value%10 == 0)
                    {
                        temp = value -10;
                    }
                    else
                    {
                        temp = value - value%10;
                    }
                } 
                if (value >= 100 && value <= 999 ) {
                    if(value%50 == 0)
                    {
                        temp = value -50;
                    }
                    else
                    {
                        temp = value - value%50;
                    }
                     
                } 
                if (value >= 1000 && value <= 1999) {
                    
                    if(value%100 == 0)
                    {
                        temp = value -100;
                    }
                    else
                    {
                        temp = value - value%100;
                    }
                } 
                if (value >= 2000 && value <= 2999) {
                    
                     if(value%200 == 0)
                    {
                        temp = value -200;
                    }
                    else
                    {
                        temp = value - value%200;
                    }
                }
                if (value >= 3000 && value <= 4999) 
                {
                    
                    if(value%250 == 0)
                    {
                        temp = value -250;
                    }
                    else
                    {
                        temp = value - value%250;
                    }
                }
                if (value >= 5000 ) 
                {
                    
                    if(value%1000 == 0)
                    {
                       temp = value - 1000;
                    }
                    else
                    {
                        temp = value - value%1000;
                    }
                }
                $('.spinner input').val( temp);
                var  unit_price = $(".price").text(),
                    final_price =  unit_price* temp;

                    $('.total_price').text('Rs.' + final_price.toFixed(2));

          });

});  
