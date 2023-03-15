(function ($, root, undefined) {
	$(function () {

		var timeShow = 30000;
		if (typeof jQuery.cookie('animLoad') === 'undefined'){
			timeShow = 44000;
		}
		if(localStorage.getItem('newsletterSend') != 'true' && localStorage.getItem('newsletterSend') == null){
			if($.cookie('newsletterClose') != 'true' || typeof $.cookie('newsletterClose') == 'undefined'){
				setTimeout(function(){
					$('.pop_up_cont').addClass('active');
				},timeShow);
			}
		}

		$('.pop_up_cont .overlay').on('click', function(){
			$('.pop_up_cont').removeClass('active');
			$.cookie("newsletterClose", 'true', { expires : 1, path : '/' });
			setTimeout(function(){
				$('.pop_up_cont').find('.thank_you_message').css('display', 'none');
			}, 300);
		});

	});
})(jQuery, this);