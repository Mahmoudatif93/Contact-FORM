/* global $, alert,console */

$(function(){
	'use strict';
	var userErrors=true;
	var mailErrors=true;
	var messageErrors=true;

	
	//ERROR VALIDATIONS
	$('.username').blur(function(){  ///blur refer to text when go far appear function 
		if ($(this).val().length <4) {
			$(this).css('border','1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn(200);
			$(this).parent().find('.asterisx').fadeIn(100);
			userErrors =true;
		}else{
			$(this).css('border','1px solid #0f0');
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).parent().find('.asterisx').fadeOut(200);
			userErrors=false;
		}

	});

		$('.email').blur(function(){  ///blur refer to text when go far appear function 
		if ($(this).val()=='') {
			$(this).css('border','1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn(200);
			$(this).parent().find('.asterisx').fadeIn(100);
			mailErrors=true;
		}else{
			$(this).css('border','1px solid #0f0');
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).parent().find('.asterisx').fadeOut(100);
			mailErrors=false;
		}

	});


		$('.message').blur(function(){  ///blur refer to text when go far appear function 
		if ($(this).val().length<10) {
			$(this).css('border','1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn(200);
			messageErrors=true;
		}else{
			$(this).css('border','1px solid #0f0');
			$(this).parent().find('.custom-alert').fadeOut(200);
			messageErrors=false;

		}

	});

	



});


