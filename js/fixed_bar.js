(function ($, root, undefined) {
	
	$(function () {

		function add_top_to_sidebar(){
			var banner_height = $('.bar_top_pos').offset().top - 22;

			$('.blue_bar.fixed_bar').css('top', banner_height+"px");
		}

		add_top_to_sidebar();

		$( window ).resize(function() {
			add_top_to_sidebar();
		});

		function position_sidebar(){
			var sidebar_top = $('.blue_bar.fixed_bar').offset().top,
				header_height = $('header .header_wrap.white_all').outerHeight(true) + 21,
				items_top = $('.bar_top_pos').offset().top - 22,
				window_top = $(window).scrollTop();

			if((items_top - header_height) <= window_top){
				$('header .header_cont').addClass('active_grad');
				$('.blue_bar.fixed_bar').addClass('pos_fixed');
			}else {
				$('.blue_bar.fixed_bar').removeClass('pos_fixed');
				$('header .header_cont').removeClass('active_grad');
			}
		}

		position_sidebar();

		$(window).scroll(function(){
			position_sidebar();
		});

		$('.blue_bar .bar_fixed_menu').on('click', function(){
			$(this).toggleClass('active_filter');
			$(this).parent().toggleClass('active_filter');
			$('.advisors_page .posts_cont, .advisors_page .contact_bot_wrap,.index .news_cont_outer').toggleClass('active_filter');
		});

	});
	
})(jQuery, this);