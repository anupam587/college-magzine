// When the DOM is ready...
$(function(){
	
	// Hide stuff with the JavaScript. If JS is disabled, the form will still be useable.
	// NOTE:
	// Sometimes using the .hide(); function isn't as ideal as it uses display: none; 
	// which has problems with some screen readers. Applying a CSS class to kick it off the
	// screen is usually prefered, but since we will be UNhiding these as well, this works.
	 $("#email").focus(function() {
		     	$('#msg').hide();
	 });
	 $("#email").blur(function() {
	     
	     var email=$("#email").val();
	     //alert('sdd'+email);
	     var url='registerlib.php';
	     var func='ajax';
	     $.post(url,{email:email,func:func},function(data){
		     var x=$.trim(data);
		     //alert(x);
		     if(x=='ok')
		     {
		     	$('#msg').css({color:'green'});
		     	$('#msg').html('You can register with this email');
		     	$('#msg').show();
		     }
		     else if(x=='empty'){
		     	$('#msg').css({color:'red'});
		     	$('#msg').html('Enter an email');
		     	$('#msg').show();
		     }
		     else if(x=='invalid'){
		     	$('#msg').css({color:'red'});
		     	$('#msg').html('Invalid Email');
		     	$('#msg').show();
		     	$("#email").val('');
		     }
		     else{
		     	$('#msg').css({color:'red'});
		     	$('#msg').html('Email already exist');
		     	$('#msg').show();
		     	$("#email").val('');
		     }

	     });
	  });
	$('#pass-div').hide();
	//$('#pass-label').hide();
	// Reset form elements back to default values
	
	// Fade out steps 2 and 3 until ready
	$("#step_2").css({ opacity: 0 });
	$("#step_3").css({ opacity: 0 });
	
	//$("#step_1").addClass('active-box');
	$('#email').addClass('active_field');
	
	$('#email').blur(function(){
		if($('#email').val() != ''){
			$('#pass-div').slideDown();
			$('#pass').addClass('active_field');
			}
	});
	
	$("#pass").blur(function(){
	
		var all_complete = true;
				
		$(".active_field").each(function(){
			if ($(this).val() == '' ) {
				all_complete = false;
			};
		});
		
		if (all_complete) {
			$("#step_1")
			.animate({
				paddingBottom: "120px"
			})
			.css({
				"background-image": "url(../../images/check.png)",
				"background-position": "bottom center",
				"background-repeat": "no-repeat"
			});
			$("#step_1").css({
				opacity: 0.3
			});
			$("#step_1 legend").css({
				opacity: 0.3
			});
			$("#step_2").css({
				opacity: 1.0
			});
			$("#step_2 legend").css({
				opacity: 1.0 
			});
			//$("#step_2").addClass('active-box');
		};
	});
	$(".step2field").blur(function(){
	
		var all_complete = true;
				
		$(".step2field").each(function(){
			if ($(this).val() == '' ) {
				all_complete = false;
			};
		});
		
		if (all_complete) {
			$("#step_2")
			.animate({
				paddingBottom: "120px"
			})
			.css({
				"background-image": "url(../../images/check.png)",
				"background-position": "bottom center",
				"background-repeat": "no-repeat"
			});
			
			$("#step_2").css({
				opacity: 0.3
			});
			$("#step_2 legend").css({
				opacity: 0.3 
			});
			$("#step_3").css({
				opacity: 1.0
			});
			$("#step_3 legend").css({
				opacity: 1.0 
			});
			//$("#step_3").addClass('active-box');
		};
	});	
	$(".name_input").blur(function(){
			var all_complete = true;
				
		$(".name_input").each(function(){
			if ($(this).val() == '' ) {
				all_complete = false;
			};
		});
		
		if (all_complete) {
			$("#submit_button").attr("disabled",false);
		}
		else{
			$("#submit_button").attr("disabled",'disabled');
		}
	});
	/*$(".active-box").click(function(){
		//alert($(this).attr('id'));
		$(".active-box").css({
				opacity: 0.3 
			});
		$(".active-box legend").css({
				opacity: 0.3 
			});
		$(this).css({
				opacity: 1 
			});
		$(this).find("legend").css({
				opacity: 1 
			});
	});*/
});
