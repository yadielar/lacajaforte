/* General Srcipts */
$(function() {
	
	// AutoSelect
	$('#secretcode :input').bind("focus click", function() {
		$(this).select();
	});
	
	// AutoFocus
	$('input[autofocus]').trigger('focus');
	
	// AutoTab
	$('#k1, #k2, #k3, #k4, #k5').autotab_magic().autotab_filter('alphanumeric');
	
	
	/* Safe Object */
	var safe = new Object();
	
	safe.lock = $('#lock');
	safe.output = $('#output span');
	safe.indicators = $('#lock, #output');
	safe.loader = $('#progress #switch');
	
	safe.startLoader = function() {
		this.loader.addClass('on');
	}
	safe.stopLoader = function() {
		this.loader.removeClass('on');
	}
	safe.set = function(status, outputMsg) {
		if (status == 'incorrect') {
			this.indicators.addClass('incorrect');
			if (outputMsg) { this.output.html(outputMsg) };
			this.stopLoader();
		}
		else if (status == 'correct') {
			this.indicators.removeClass('incorrect');
			this.indicators.addClass('correct');
			if (outputMsg) { this.output.html(outputMsg) };
			this.stopLoader();
		}
	}
	safe.reset = function() {
		this.indicators.removeClass('incorrect');
		this.output.html('');
		this.stopLoader();
	}
	
	// Show Prize
	function showPrize(message, prize, wincode) {
		$('#win').fadeIn('slow');
		$('.message').html(message);
		$('.prize').html(prize);
		$('.wincode span').html(wincode);
	}
	
	/* Code Submit */
	var handler = function() {
		// Prevent clicking while function runs
		var button = $(this);
		button.unbind('click', handler);
		function bindAgain() {
			button.bind('click', handler);
		};
		
		var form = $('#secretcode'),
			values = form.find(':input').serialize(),
			action = form.attr('action'),
			method = form.attr('method'),
			validation;
			
		safe.reset();
		safe.startLoader();
		
		// Validation
		form.find(':input').each(function(index) {
		    var value = $(this).val();
		    if (value.length > 0) {
		    	validation = true;
		    }
		    else {
		    	validation = false;
		    	return false;
		    }
		});
		
		// Ajax call
		if (validation == true) {
			$.ajax({
				type: method,
				dataType: "json",
				url: action,
				data: values,
				success: function(data){
					if (data) {
						if (data.valid == true) {
							safe.set('correct', data.output);
							setTimeout(function () {
								safe.output.fadeOut();
								$('#interface').fadeOut(function(){
									$(this).remove();
									showPrize(data.winner.msg, data.winner.prize, data.winner.code);
								});
							}, 1000);
						} else {
							safe.set('incorrect', data.output);
							bindAgain();
						}
					} else {
						safe.set('incorrect', 'Hubo un error. Intente de nuevo.');
						bindAgain();
					}
				},
				error: function(){
					safe.set('incorrect', 'Error de conexi&oacute;n');
					bindAgain();
				}
			});
			return false;
		} else {
			safe.set('incorrect', 'Debes llenar todos los campos');
			bindAgain();
		}
	};
	
	$('#code-enter').bind('click', handler);

});