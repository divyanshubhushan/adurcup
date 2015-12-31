    
        $(document).ready(function() {
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false,
            });
            
            $("#register_form").click(function(){
                $(".modal-body-left").hide();
                $(".modal-body-signup-left").show();
                $(".login-button").show();
                $(".register-button").hide();
                $(".modal-title").text('Register Your Account');
                $(".modal-body-p").text('Just fill up details and get started!');
                return false;
            });
            // Going back to Social Forms
            $("#login_form").click(function(){
                $(".modal-body-signup-left").hide();
                $(".modal-body-left").show();
                $(".modal-title").text('Login to Your Account');
                $(".modal-body-p").text('Just sign in and get started!!');
                return false;
            });  
            function randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            };

            // Generate a sum of two random numbers
            function generateCaptcha() {
                $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 100), '='].join(' '));
            };
            generateCaptcha();
            
            
            $('.selectpicker').selectpicker({
                style: 'btn-info',
                size: 4   
            });     

            $("#e9").select2();
            $("#e8").select2();
            $("#e7").select2();
            $("#e6").select2();
            $("#e5").select2();
            $("#e4").select2();
            $("#e3").select2();
            $("#e2").select2();
            $("#e1").select2();

            $("#e11").select2({
                placeholder: "Select location",
                allowClear: true
            });
            $(".js-example-placeholder-single").select2({
                placeholder: "Select location",
                allowClear: true
            });
            $("#advance").click(function(){
                $("#advance_content").toggle(500);
            });

            $( ".navbar-nav li:nth-child(1) > a" ).removeClass("active");
            $( ".navbar-nav li:nth-child(2) > a" ).addClass("active");
        });
        (function ($) {
            $('.dropdown-toggle').dropdown();
            $('.outlet_spinner .btn:first-of-type').on('click', function() {
                var value= parseInt($('.outlet_spinner input').val(), 10);
                if (value < 1 ) {
                    $('.outlet_spinner input').val( 1);
                } 
                if (value >= 1 ) {
                    $('.outlet_spinner input').val( value + 1);
                } 
            });
            $('.outlet_spinner .btn:last-of-type').on('click', function() {
                var value= parseInt($('.outlet_spinner input').val(), 10);
                if (value <= 1 ) {
                    $('.outlet_spinner input').val( 1);
                } 
                if (value > 1 ) {
                    $('.outlet_spinner input').val( value - 1);
                } 
            });
            $('.spinner .btn:last-of-type').on('click', function() {
                var value= parseInt($('.spinner input').val(), 10);
                if (value >= 150 && value <= 1000 ) {
                    $('.spinner input').val( value - value%50 - 50);
                } 
                if (value >= 1100 && value <= 2000) {
                    $('.spinner input').val( value - value%100 - 100);
                } 
                if (value >= 2200 && value <= 3000) {
                    $('.spinner input').val( value - value%200 - 200);
                }
                if (value >= 3250 && value <= 5000) 
                {
                    $('.spinner input').val( value - value%250 - 250);
                }
            });
        })(jQuery);
        function checkCaptcha(value, validator) {
            // Determine the numbers which are generated in captchaOperation
            var items = $('#captchaOperation').html().split(' '),
            sum   = parseInt(items[0]) + parseInt(items[2]);
            return value == sum;
        }
    

        
        
        


        

        

            

       
        
    