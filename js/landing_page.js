(function ($, root, undefined) {
	$(function () {

		$('div[data-href]').on('click', function(){
			var thisHref = $(this).attr('data-href');
			var root = $('html, body');
			var scrollLg = $(this).attr('data-scroll-to');
			var scrollLgSm = $(this).attr('data-scroll-to-lg-sm');
			var scrollLgXs = $(this).attr('data-scroll-to-lg-xs');
			var scrollSm = $(this).attr('data-scroll-to-sm');
			var scrollXs = $(this).attr('data-scroll-to-xs');
			var scorllTo = scrollLg;

			if($(window).width() < 1601 && $(window).width() > 1441){
				scorllTo = scrollLgSm;
			}
			if($(window).width() < 1441 && $(window).width() > 1323){
				scorllTo = scrollLgXs;
			}
			if($(window).width() < 1324 && $(window).width() > 1024){
				scorllTo = scrollLgSm;
			}
			if($(window).width() < 1025 && $(window).width() > 767){
				scorllTo = scrollSm;
			}
			if($(window).width() < 768){
				scorllTo = scrollXs;
			}

			$('#iframe_page').attr('src',$('#iframe_page').attr('data-src')+thisHref);

			root.stop().animate({
                scrollTop: scorllTo
            }, 1000);
		});

		function setHeightSec(){
			var heightSec = $('.landing_page .main_content').outerHeight();
			var bannerHeight = $('.landing_page .banner_template').outerHeight();
			var setHeight = heightSec - bannerHeight;
			if($(window).width() > 1024){
				$('.iframe_wrap').css('height', setHeight+'px');
			}else {
				$('.iframe_wrap').removeAttr('style');
			}
		}
		// setHeightSec();
		// window.addEventListener('resize', setHeightSec);
		// var iframe = document.querySelector('#iframe_page');
		// function resizeIframe(obj) {
		// 	obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
		// }
		// iframe.addEventListener("load", resizeIframe(iframe));

		///scroll magic///

		var controller = new ScrollMagic.Controller();
		var pinedEl = $(this).find('.blue_bar_wrap');
		var durationEl = $(this).find('.blue_head_sec');
		var headerHeight = $('header').outerHeight() + 80;

		if(durationEl !== null && pinedEl !== null){
			var pinedElHeight = pinedEl.outerHeight();
			var durationElHeight = $('#iframe_page').attr('height');
			var offset = $('.banner_template').outerHeight() - headerHeight;

			var scene = new ScrollMagic.Scene({
					triggerElement: '.blue_head_sec', 
					duration: durationElHeight-pinedElHeight,
					triggerHook: 0,
				})
				.offset(offset)
				.setPin('.blue_bar_wrap')
				.addTo(controller);
		}

		///end scroll magic///
	});
})(jQuery, this);