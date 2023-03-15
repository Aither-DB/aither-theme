(function ($, root, undefined) {
	
	$(function () {

		if($('.tiles_wrap').length > 0){

			$('.tiles_wrap').slick({
			  	slidesToScroll: 1,
			  	asNavFor: '.desc_ext_wrap',
			  	arrows: false,
			  	dots: false,
			  	focusOnSelect: true,
			  	variableWidth: true,
			  	draggable: false,
			  	responsive: [
				    {
				    breakpoint: 1024,
				      	settings: {
				        	draggable: true,
				      	}
				    },
				]
			});

			// var tiles_thumbs = new Swiper('.tiles_cont.swiper-container', {
			//     spaceBetween: 80,
			//     slidesPerView: 3,
			//     loop: true,
			//     loopedSlides: 5,
		 //      	watchSlidesVisibility: true,
		 //      	watchSlidesProgress: false,
			//     //freeMode: true,
			//     // freeModeSticky: true,
			//     //slideToClickedSlide: true,
			//     preventClicks: false,
			//     speed: 1500,
			//     breakpoints: {
			// 	    1366: {
			// 	    	spaceBetween: 80,
			// 	    },
			// 	    1180: {
			// 	    	spaceBetween: 50,
			// 	    },
			// 	    1024: {
			// 	    	spaceBetween: 76,
			// 	    }
			// 	}
		 //    });

		 //    $( window ).resize(function() {
			// 	tiles_thumbs.update();
			// });

		 //    $('.tiles_cont .single_tile').on('click', function(){
			// 	var indexNav = $(this).attr('data-index');
			// 	var thisParen = $(this).parent();

			// 	$(this).siblings().removeClass('active');
			// 	$(this).addClass('active');

			// 	tiles_thumbs.slideTo(indexNav, 1000, true);
			// 	desc_slider.slideTo(indexNav, 1000, true);

			// });
		}

		if($('.desc_ext_wrap').length > 0){

			$('.desc_ext_wrap').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				dots: false,
				asNavFor: '.tiles_wrap',
				variableWidth: true,
				draggable: false,
				focusOnSelect: true,
				responsive: [
				    {
				    breakpoint: 1024,
				      	settings: {
				        	draggable: true,
				      	}
				    },
				    //{
				    // breakpoint: 767,
				    //   	settings: {
				    //   		draggable: true,
				    //     	infinite: false,
				    //   	}
				    // }
				]
			});

		
		 //    var desc_slider = new Swiper('.desc_ext_cont.swiper-container', {
		 //    	slidesPerView: 1,
		 //    	loop: true,
   //    			loopedSlides: 5,
			//     spaceBetween: 153,
			//     slideToClickedSlide: true,
			//     speed: 1500,
			//     thumbs: {
   //      			swiper: tiles_thumbs,
   //      			slideThumbActiveClass: 'active',
   //    			},
			//     breakpoints: {
			// 	    1180: {
			// 	    	spaceBetween: 70,
			// 	    },
			// 	    1024: {
			// 	    	spaceBetween: 83,
			// 	    },
			// 	    767: {
			// 	    	slidesPerView: 'auto',
			// 	    	freeMode: true,
			//     		freeModeSticky: false,
			//     		spaceBetween: 17,
			//     		speed: 600,
			//     		pagination: {
			// 	        	el: '.swiper-pagination',
			// 	        	clickable: true,
			// 	      	},
			// 	    }
			// 	}
			// });

			//desc_slider.on('slideChange', function () {
			  	// var activeSliderIndex = desc_slider.activeIndex;

			  	// tiles_thumbs.slideTo(activeSliderIndex, 1000, true);

			  	// $('.tiles_cont .single_tile').each(function(){
			  	// 	var indexNav = $(this).attr('data-index');

			  	// 	if(activeSliderIndex == indexNav){
			  	// 		$(this).addClass('active');
			  	// 		$(this).siblings().removeClass('active');
			  	// 	}
			  	// });
			//});
		}

		if($('.spe_wrap').length>0){

			var swiper_spe = new Swiper('.spe_wrap.swiper-container', {
				spaceBetween: 63,
			    slidesPerView: 2,
			    // slidesPerGroup: 2,
			    //freeMode: true,
			    freeModeSticky: true,
			    slideToClickedSlide: true,
			    speed: 500,
		      	pagination: {
		        	el: '.swiper-pagination',
		        	clickable: true,
		      	},
		      	breakpoints: {
				    1024: {
				    	freeModeSticky: false,
				    	slidesPerView: 1,
				    	spaceBetween: 60,
				    },
				    767: {
				    	freeModeSticky: false,
				    	slidesPerView: 1,
				    	spaceBetween: 31,
				    }
				}
		    });
		}

		if($(window).width() < 768){

			// if($('.ser_wrap .single_simple').length > 0){
			// 	var mySwiper = new Swiper('.ser_simple_cont.swiper-container', {
			// 	    slidesPerView: 'auto',
			// 	    direction: 'vertical',
	  //               freeMode: true,
	  //               speed: 1500,
	  //               spaceBetween: 44,
			// 	});
			// }

			if($('.pep_rel_cont .single_rel_pep').length > 0){
				var mySwiper = new Swiper('.pep_rel_cont .swiper-container', {
				    slidesPerView: 'auto',
	                freeMode: true,
	                speed: 1500,
	                spaceBetween: 30,
				});
			}


			if($('.rel_ins_slider .single_rel_ins').length > 0){
				var mySwiper2 = new Swiper('.rel_ins_slider.swiper-container', {
				    slidesPerView: 'auto',
	                freeMode: true,
	                speed: 1500,
	                spaceBetween: 30,
				});
			}
		}

	});
	
})(jQuery, this);