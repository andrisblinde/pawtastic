(function($) {

    var highestBox = 0;
            $('.service .container').each(function(){  
                    if($(this).height() > highestBox){  
                    highestBox = $(this).height();  
            }
        });    
        $('.service .container').height(highestBox);

    var count = 0;
	$(".next_btn").click(function(event) {

	var form_check_input = $('.form-check-input');
	var form_control = $('.form-control');
	var form_control_file = $('.form-control-file');

	if (form_check_input[0].checked == false && form_check_input[1].checked == false) {
	var y = 0;
	} else {
	var y = 1;
	}

	for (var i = form_control.length; i > count; i--) {
	if (form_control[i - 1].value == '' || form_control_file == '') {
	count = count + 1;
	} else {
	count = 0;
	}
	}

	if (count != 0 || y == 0) {
	event.preventDefault();
	alert("All Fields are mandatory");
	} else {
	$(this).parent().next().fadeIn('slow');
	$(this).parent().css({
	'display': 'none'
	});

	$(this).parent().next().fadeIn('slow');
	$(this).parent().css({
	'display': 'none'
	});

	$('.active').next().addClass('active');

	$('.multi-step-form-progress').css({'background' : 'url("img/cat_01.png") center center no-repeat'});
	}
	});

	$(".back_btn").click(function() {
	$(this).parent().prev().fadeIn('slow');
	$(this).parent().css({
	'display': 'none'
	});

	$('.active:last').removeClass('active');

	$('.multi-step-form-progress').css({'background' : 'url("img/dog_01.png") center center no-repeat'});

	});

	var form_control2 = $('#second .form-control'); 

	$(".submit_btn").click(function(event) {

	for (var i = form_control2.length; i > count; i--) {
	if (form_control2[i - 1].value == '') {
	count = count + 1;
	} else {
	count = 0;
	}
	}

	if (count != 0) {
	alert("All Fields are mandatory");
	event.preventDefault();
	} else {
	return true;
	}
	});

})(jQuery);