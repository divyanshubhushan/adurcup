function submitForm() {
        // However you need to submit the form

        document.getElementById("button").click(); // Or whatever
    }
    function submitForm2() {
        // However you need to submit the form

        document.getElementById("button2").click(); // Or whatever
    }
    function submitForm3() {
        // However you need to submit the form

        document.getElementById("button3").click(); // Or whatever
    }

       function chooseFile() {
      $("#uploadImage").click();
    }

    function chooseFile2() {
      $("#uploadImage2").click();
    }
    function upload_images() {
      $("#uploadImage3").click();
    }

        function checkCaptcha(value, validator) {
        // Determine the numbers which are generated in captchaOperation
        var items = $('#captchaOperation').html().split(' '),
            sum   = parseInt(items[0]) + parseInt(items[2]);
        return value == sum;
    }






     function repositionCover() {
        $('.cover-wrapper').hide();
        $('.cover-resize-wrapper').show();
        $('.cover-resize-buttons').show();
        $('.default-buttons').hide();
        $('.screen-width').val($('.cover-resize-wrapper').width());
        $('.cover-resize-wrapper img')
        .css('cursor', 'move')
        .draggable({
            scroll: false,
            
            axis: "y",
            
            cursor: "move",
            
            drag: function (event, ui) {
                y1 = $('.timeline-header-wrapper').height();
                y2 = $('.cover-resize-wrapper').find('img').height();
                
                if (ui.position.top >= 0) {
                    ui.position.top = 0;
                }
                else
                if (ui.position.top <= (y1-y2)) {
                    ui.position.top = y1-y2;
                }
            },
            
            stop: function(event, ui) {
                $('input.cover-position').val(ui.position.top);
            }
        });
    }

    function saveReposition() {
        
        if ($('input.cover-position').length == 1) {
            posY = $('input.cover-position').val();
            $('form.cover-position-form').submit();
        }
    }

    function cancelReposition() {
        $('.cover-wrapper').show();
        $('.cover-resize-wrapper').hide();
        $('.cover-resize-buttons').hide();
        $('.default-buttons').show();
        $('input.cover-position').val(0);
        $('.cover-resize-wrapper img').draggable('destroy').css('cursor','default');
    }


     $(function(){
        $('.cover-resize-wrapper').height($('.cover-resize-wrapper').width()*0.3);

       
        $('form.cover-position-form').ajaxForm({
            url:  'includes/c.php',
            dataType:  'json', 
            beforeSend: function() {
                $('.cover-progress').html('Repositioning...').fadeIn('fast').removeClass('hidden');
            },
            
            success: function(responseText) {
                     if ((responseText.status) == 200) {
                        $('.cover-wrapper img')
                        .attr('src', responseText.url + '?' + new Date().getTime())
                        .load(function () {
                        
                            $('.cover-progress').fadeOut('fast').addClass('hidden').html('');
                            $('.cover-wrapper').show();
                            $('.cover-resize-wrapper')
                                .hide()
                                .find('img').css('top', 0);
                            $('.cover-resize-buttons').hide();
                            $('.default-buttons').show();
                            $('input.cover-position').val(0);
                            $('.cover-resize-wrapper img').draggable('destroy').css('cursor','default');
                        
                         });
                }

            }
        });



    });  



$(document).ready(function() {

    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false,
    });
    

    $("#ad_register_btn").click(function(){
        $("#ad_login").hide();
        $("#ad_register").show();
        $(".modal-title").text('Sign-up to get started!');
        $(".state_info").text('Already have an acoount?');
        $(".button_info").text('Sign Up');
        $(".register_forgot").hide();
        
        $("#ad_login_btn").show();
        $("#ad_register_btn").hide();

    });
    $("#ad_login_btn").click(function(){
        $("#ad_login").show();
        $("#ad_register").hide();
        $(".modal-title").text('Login to your account ');
        $(".state_info").text("Don't have an account?");
        $(".button_info").text('Log In');
        $("#ad_login_btn").hide();
        $("#ad_register_btn").show();
        $(".register_forgot").show();

    });

    $("form :input").on("keypress", function(e) {
        return e.keyCode != 13;
    });
    
    


    $('#ad_reg_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        
        fields: {
            
            confirmpass: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password does not match'
                    }
                }
            },
            contact: {
                validators: {
                    between: {
                        min: 1000000000,
                        max: 9999999999,
                        message: 'Enter your 10-digit contact number'
                    }
                }
            },
            email:{
                validators:{
                    emailAddress: {
                        message: 'Not a valid email address'
                    }

                }
            }

        } ,  
        onError: function(e) {
            
            $('#error').modal('show')
        }
        
    });


$('#registrationForm').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    
    fields: {
        
        confirmpass: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password does not match'
                }
            }
        },
        contact: {
            validators: {
                between: {
                    min: 1000000000,
                    max: 9999999999,
                    message: 'Enter your 10-digit contact number'
                }
            }
        },
        email:{
            validators:{
                emailAddress: {
                    message: 'Not a valid email address'
                }

            }
        }

    } ,  
    onError: function(e) {
        
        $('#error').modal('show')
    }
    
});
$('#links_edit_form').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    
    fields: {
        
        confirmpass: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password does not match'
                }
            }
        }
    } ,  
    onError: function(e) {
        
        $('#error').modal('show')
    }
    
});


function randomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
};


function generateCaptcha() {
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 100), '='].join(' '));
};

generateCaptcha();


$('.selectpicker').selectpicker({
    style: 'btn-info',
    size: 4   
});  

$("#e10").select2();
$("#e9").select2();
$("#e8").select2();
$("#e7").select2();
$("#e6").select2();
$("#e5").select2();

$(".choose_location").select2({
    placeholder: "Select a state",
    allowClear: true
});

$('#uplload').tooltip();
});