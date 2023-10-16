//Validation Form
(() => {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	const forms = document.querySelectorAll('.needs-validation')

	// Loop over them and prevent submission
	Array.from(forms).forEach(form => {
		form.addEventListener('submit', event => {
			if (!form.checkValidity()) {
				event.preventDefault()
				event.stopPropagation()
			}

			form.classList.add('was-validated')
		}, false)
	})
})()

//Remove $Post Setelah Submit
if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}

//Captcha
$(function(){
  $('#kontak').ebcaptcha();
});

(function($){

	jQuery.fn.ebcaptcha = function(options){

		var element = this; 
		var input = this.find('#ebcaptchainput'); 
		var label = this.find('#ebcaptchatext'); 
				$(element).find('button[type=submit]').attr('disabled','disabled'); 

		var randomNr1 = 0; 
		var randomNr2 = 0;
		var totalNr = 0;


		randomNr1 = Math.floor(Math.random()*10);
		randomNr2 = Math.floor(Math.random()*10);
		totalNr = randomNr1 + randomNr2;
		var texti = "Total Dari "+randomNr1+" + "+randomNr2;
		$(label).text(texti);
		
	
		$(input).keyup(function(){

			var nr = $(this).val();
			if(nr==totalNr)
			{
				$(element).find('button[type=submit]').removeAttr('disabled');				
			}
			else{
				$(element).find('button[type=submit]').attr('disabled','disabled');
			}
			
		});

		$(document).keypress(function(e)
		{
			if(e.which==13)
			{
				if((element).find('button[type=submit]').is(':disabled')==true)
				{
					e.preventDefault();
					return false;
				}
			}

		});

	};

})(jQuery);