
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
                if (value < 100 ) {

                  temp = value + 1;
              } 
              if (value >= 100 ) {
                  temp = value - value%100 + 100;
              } 
              
        $('.spinner input').val( temp);
        var  unit_price = $(".price").text(),
        final_price =  unit_price* temp;

        $('.total_price').text('Rs.' + final_price.toFixed(2));


        });

          $('.spinner .btn:last-of-type').on('click', function() {
            
            var value= parseInt($('.spinner input').val(), 10);
            var temp;
                 if (value <= 100 ) {

                      if(value <= 1){
                            temp = 1;
                        }
                        else{
                            temp = value - 1;
                        }
                } 
                if (value >100 ) {
                  
                      if(value%100 == 0)
                    {
                        temp = value -100;
                    }
                    else
                    {
                        temp = value - value%100;
                    }
                } 
                                $('.spinner input').val( temp);
                var  unit_price = $(".price").text(),
                    final_price =  unit_price* temp;

                    $('.total_price').text('Rs.' + final_price.toFixed(2));

          });

});  