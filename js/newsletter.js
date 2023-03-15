(function ($, root, undefined) {

	var forms = $('.newsletter_form, #popUpNews');

		forms.parsley();

		function sendNews(form){
			jQuery.ajax({
				url: newsletterHandle.url,
				type: "POST",
				data: form.serialize()+'&action=epic_newsletter',
				success: function(response) {
					if (response.status == 200) {
						form.addClass('succes');
						form.find('input').val('');
						form.find('.input_wrap_format').removeClass('focus');
						form.removeClass('error_exist');
						setTimeout(function function_name(argument) {
							form.removeClass('succes');
						},15000)
						if(form.attr('id') == 'popUpNews'){
							if(localStorage.getItem('newsletterSend') == null){
								localStorage.setItem('newsletterSend', 'true');
							}
							form.find('.thank_you_message').slideDown(300);
						}
					}
				},
				error: function (response) {
					if (response.status == 400) {
						form.addClass('error_exist');
						form.removeClass('succes');
						form.find('input[name="email"]').addClass('parsley-error');
					}
				} 
			});
		}

		$('.newsletter_form').on('submit', function(e) {
			var form = $(this);
			sendNews(form);
			return false;
			e.preventDefault();
		});
		$('#popUpNews').on('submit', function(e) {
			var form = $(this);
			sendNews(form);
			return false;
			e.preventDefault();
		});

})(jQuery, this);