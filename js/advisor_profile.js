(function ($, root, undefined) {
	
	$(function () {

		if($(window).width() < 1025){

			$('.spec_wrap').slick({
				infinite: false,
				slidesToShow: 3,
				slidesToScroll: 1,
				variableWidth: true,
				dots: false,
				arrows: false
			});

		}

		if($(window).width() < 768){
			if($('.pep_rel_cont .single_rel_pep').length > 0){
				var mySwiper = new Swiper('.pep_rel_cont .swiper-container', {
				    slidesPerView: 'auto',
	                freeMode: true,
	                speed: 1500,
	                spaceBetween: 30,
				});
			}


			if($('.rel_ins_cont .single_rel_ins').length > 0){
				var mySwiper2 = new Swiper('.rel_ins_cont .swiper-container', {
				    slidesPerView: 'auto',
	                freeMode: true,
	                speed: 1500,
	                spaceBetween: 30,
				});
			}
		}

	});
	
})(jQuery, this);