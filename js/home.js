(function ($, root, undefined) {
	$(function () {

		/*=============================
		=            Intro            =
		=============================*/
		//set cookie
        if (typeof jQuery.cookie('animLoad') === 'undefined'){
        	var date = new Date();
        	var get_days = parseInt($('#get_days').attr('data-days'));

        	if(get_days == undefined){
        		get_days = 30;
        	}

        	if(jQuery(window).width()>1024){
	        	disableBodyScroll();

	        	$('.intro_vid_cont').addClass('intro_start');
	        	
		  		setTimeout(function(){
		  			jQuery('header').addClass('anim_start');
		  			jQuery('.hpb_desc.anim_intro').addClass('anim_start');
		  			jQuery('.hpb_dots.anim_intro').addClass('anim_start');
		  			jQuery('.intro_vid_cont').addClass('anim_start');
		  		}, 13500);
		  		setTimeout(function(){
		  			enableBodyScroll();
		  		}, 13600);
		  		setTimeout(function(){
					jQuery('.hpb_desc.anim_intro').addClass('overflow');
				}, 14100);
		  	}

			date.setDate(date.getDate() + get_days);
            jQuery.cookie('animLoad', '1', { expires: date });
		}else {
			jQuery('header').addClass('anim_start');
  			jQuery('.hpb_desc.anim_intro').addClass('anim_start');
  			jQuery('.hpb_dots.anim_intro').addClass('anim_start');
  			jQuery('.intro_vid_cont').addClass('novis');
  			jQuery('.hpb_desc.anim_intro').addClass('overflow');
		}
		///

  		//intro stop
  		$('.intro_vid_cont .skip_btn').on('click', function(){
  			//var data_id = "";
  			$('header').addClass('anim_start');
  			$('.intro_vid_cont').addClass('anim_start');
  			$('.hpb_desc.anim_intro').addClass('anim_start');
  			$('.hpb_dots.anim_intro').addClass('anim_start');

			enableBodyScroll();
			setTimeout(function(){
				$('.hpb_desc.anim_intro').addClass('overflow');
			}, 1300);
  		});
  		if ( $(window).width()<1025) {
  			$('header').addClass('anim_start');
  			$('.intro_vid_cont').addClass('anim_start');
  			$('.hpb_desc.anim_intro').addClass('anim_start');
  			$('.hpb_dots.anim_intro').addClass('anim_start');
  		}
  		///end intro

		/*==============================
		=            Banner            =
		==============================*/

		function videoScale() {
			if($('.video_wrap .ban_video').length > 0){
				$('.video_wrap .ban_video').each(function(key){
					var $wrap = $(this).parent(),
					wrapH = $wrap.outerHeight(),
					wrapHP = wrapH/57,
					wrapW = $wrap.outerWidth(),
					wrapWP = wrapW/100,
					$video = $(this);

					if (jQuery(window).width() > 1024) {
						if(wrapH/wrapW > 0.67){
							$video.css({
								'width':'182vh',
								'height': '104vh'
							})
						} else {
							$video.css({
								'width':'calc(100vw + 10px)',
								'height': '57vw'
							})
						}
					} else {
						$video.removeAttr('style');
					}
				});
			}
		}

		videoScale();
		setTimeout(function () {
			videoScale();
			setTimeout(function () {
				videoScale();
			},500)
		},500)

		//var checkStatus = 0;
		// var refreshIntervalId = setInterval(function () {
		// 	//console.log('asd');
		// 	if (checkStatus == 0) {
		// 		videoScale();
		// 	} else {
		// 		clearInterval(refreshIntervalId);
		// 	}
		// }, 10000);
		
		window.addEventListener("resize", videoScale);
		
		$('.hpb_bg').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
		});

		var productsLengthR = $('.hpb_desc .desc_wrap').length;
        var productsLength = productsLengthR-1;

		$('.hpb_desc').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			asNavFor: '.hpb_bg',
			variableWidth: true,
			dots: true,
			appendDots: $('.hpb_dots .container'),
			arrows: false,
			centerMode: false,
			focusOnSelect: true
		});

		// $('.hpb_bg .video_img').scroll_function(-300,lazyBg);
		//console.log(productsLengthR);
		//console.log($('.hpb_bg .video_wrap[data-slick-index="'+productsLengthR+'"] .ban_video '));
		$('.hpb_bg .video_wrap[data-slick-index="'+productsLengthR+'"] .ban_video ').attr('id','hpb_first_copy');

		$('.hpb_desc').on('beforeChange', function(event, slick, currentSlide, nextSlide){
			
			if(currentSlide == productsLength){
				$('.hpb_desc .desc_wrap[data-slick-index="'+currentSlide+'"]').addClass('slick-hide');
				$('.hpb_desc .desc_wrap[data-slick-index="1"]').addClass('slick-hide');
				$('.hpb_desc .desc_wrap[data-slick-index="'+currentSlide+'"]').addClass('slick-last-active');
				$('.hpb_desc .desc_wrap[data-slick-index="'+nextSlide+'"]').addClass('slick-will-active');
			}

		}).on('afterChange', function(event, slick, currentSlide){
			if(currentSlide == 0){
				$('.hpb_desc .desc_wrap').removeClass('slick-hide');
				$('.hpb_desc .desc_wrap').removeClass('slick-last-active');
				$('.hpb_desc .desc_wrap').removeClass('slick-will-active');
			}
		});

		if ($(window).width()<768){
			$('.hpb_bg .video_wrap').each(function () {
				var he = $(this).outerHeight();
				$(this).css('height',he+'px');
			})
		}

		/*=====  End of Banner  ======*/
		

		/*===============================
		=            Avisors            =
		===============================*/
		$('.hpal_select .val').click(function (e) {		
			if($(this).hasClass('slick-current') && !$('.hpal_select').hasClass('opacity_1')){
				$('.hpal_select').addClass('opacity_1');
			} else {
				$('.hpal_select').removeClass('opacity_1');
			}
		})

		$('.hpar_wrap .single_post_wrap').each(function(){
			var $this = $(this);
			var attrs = $(this).attr('data-term');

			$this.addClass('selected_'+attrs);

			// var attrs_array = jQuery.parseJSON(attrs);

			// $.each(attrs_array, function( index, value ) {
			  	
			// 	$this.addClass('selected_'+value);
				
			// });
			
		});

		var max_val = $('.hpal_select').attr('data-count');
		$('.hpal_select').slick({
			slidesToShow: max_val,
			slidesToScroll: 1,
			vertical: true,
			arrows: false,
			focusOnSelect: true,
			dots: false
		}).on('beforeChange', function(event, slick, currentSlide, nextSlide){
			var term_id = $('.hpal_select .val[data-slick-index="'+nextSlide+'"]').attr('data-val');
			sliderFilter(term_id);
			sliderNr();
			$('.hpal_select .val .text').addClass('start_anim');
		});



		$carousel = $('.hpar_wrap').slick({
			variableWidth: true,
			slidesToScroll: 1,
			focusOnSelect: true,
			infinite: false,
			appendArrows: $('.pag_wrap .arrows'),
			// swipe: false,
			prevArrow: '<button type="button" class="slick-prev prev_btn"></button>',
			nextArrow: '<button type="button" class="slick-next next_btn"></button>'
		}).on('afterChange', function(event, slick, currentSlide){
			sliderNr();
		});
		$('.single_post .thub_img').scroll_function(-300,lazyBg);

		var term_id = $('.hpal_select .val.slick-current').attr('data-val');
		sliderFilter(term_id);
		sliderNr();

		function sliderFilter(termId) {

			$carousel.slick('slickUnfilter');
			$carousel.slick('slickFilter', '.selected_'+termId);
			var elNr =$carousel.find('.single_post_wrap').length;
			//console.log(elNr);
			if (elNr<3) {
				$carousel.slick('slickSetOption',"swipe",false);
				$('.hpa_right').addClass('disable_change');
			} else {
				$carousel.slick('slickSetOption',"swipe",true);
				$('.hpa_right').removeClass('disable_change');
			}
		}
		function sliderNr() {
			var all = $('.hpar_wrap .single_post_wrap ').length;
			if(all <= 1){
				$('.hpa_right .pag_wrap').addClass('hidden');
			}else {
				$('.hpa_right .pag_wrap').removeClass('hidden');
				$('#all_slide').html(all);
				var hasClass = 0, nr = 1;
				$('.hpar_wrap .single_post_wrap ').each(function () {
					if( !$(this).hasClass('slick-current') && hasClass == 0 ){
						nr++;
					} else {
						hasClass = 1;
					}
				})
				$('#cur_slide').html(nr);
			}
		}
		$('.hpa_left ').scroll_function(0,function () {
			
			if ($(window).width()<768){
				setTimeout(function () {
					$('.hpa_right').addClass('start_anim');
				},300)
			} else {
				setTimeout(function () {
					$('.hpal_select').slick('slickNext');
				},1300)
				setTimeout(function () {
					$('.hpal_select').slick('slickNext');
				},2000)
				setTimeout(function () {
					$('.hpal_select').slick('slickNext');
				},2700)
				setTimeout(function () {
					$('.hpa_right').addClass('start_anim');
				},3000)
			}
		})

		$('.hpal_select2 select').on('change', function () {
			var term_id = $(this).val();
			sliderFilter(term_id);
			sliderNr();
		})
		$('.hpal_select2 select').selectBoxIt({
			showEffect: "slideDown",
			hideEffect: "slideUp",
			isMobile: function() {
               return false;
               // (/iPhone|iPod|iPad|Android|BlackBerry|Opera Mini|IEMobile/).test(navigator.userAgent);
            }
		});

		
		/*=====  End of Avisors  ======*/
		
		/*================================
		=            Insights            =
		================================*/
		$('.hpir_wrap').slick({
			slidesToScroll: 1,
			arrows: false,
			infinite: true,
			//focusOnSelect: true,
			dots: true,
			variableWidth: true,
			appendDots: $('.hpi_left_bg .dots'),
			responsive: [
			    {
			      breakpoint: 767,
			      settings: {
			        centerMode: true,
					infinite: true,
			      }
			    }
			]

		}).on('afterChange', function(event, slick, currentSlide){
			$('.hpi_left_bg li.slick-active ').mouseenter();
		});
		$('.hpi_left_bg .slick-dots').append('<div class="underline" style="opacity:0"></div>');
		
		$('.hpi_left_bg .slick-dots li').mouseenter(function () {
			//if ($(window).width()>767) {
				var $this = $(this), 
				left = parseInt($(this).position().left),
				half_width = parseInt($(this).width())/2,
				position = left + half_width;
				//$('.head_menu .underline').css('left',position+'px');
				$('.hpi_left_bg .underline').stop().animate({
				    left: position,
				    opacity: 1,
				})
			//}
		}).mouseleave(function () {

			$('.hpi_left_bg li.slick-active ').mouseenter();
		})

		$('.hpir_wrap .lazyBginsight').scroll_function(-300,lazyBg);
		
		$('.hp_insights').scroll_function(0,function () {
			$('.hp_insights').addClass('start_anim');
			setTimeout(function () {
				$('.hpi_left_bg li.slick-active').mouseenter();
			},300)
		})
		if ($(window).width()<768) {
			$('.news_wrap.slick-cloned .lazyBg').scroll_function(-300,lazyBg);
		}
		/*=============================
		=            Vimeo            =
		=============================*/
		var playersV2 = {};

		setTimeout(function(){
			jQuery('.hpir_wrap .vimeo_video').each(function () {
				var $self = jQuery(this), iframe = jQuery(this)[0], key = $self.attr('data-key');
				if(playersV2[key] == undefined){
					var player = new Vimeo.Player(iframe);
					player.setVolume(0);
					player.play();
					player.on('play', function() {
					});
					playersV2[key] = player;
				} else {
					playersV2[key].play();
				}
			})
		});

		/*===============================
		=            Youtube            =
		===============================*/

		if (jQuery('.hpir_wrap .ytplayer').length) {
			var playersY2 = {};

			setTimeout(function () {

				jQuery('.hpir_wrap .ytplayer').each(function () {
					var element = jQuery(this),
					wrap = element.closest('.video_wrap');
					var key = element.data('key');
					var id = element.attr('id');
					playersY2[id] = new YT.Player(id, {
						height: '390',
						width: '640',
						videoId: key,
						playerVars: {
							'controls': 0,
						    'loop': 1,
						    'playlist':key,
						    'autohide': 1,
						    'autoplay': 0,
						    'iv_load_policy': 3,
							'rel': 0,
							'showinfo': 0,
						},
						events: {
							onStateChange: function (event) {
								if (event.data==1) {
									wrap.addClass('video_active');
								}
							}
						}
					});
				})

			},2000)
		}
		$('.hpb_bg .video_wrap[data-slick-index="'+productsLengthR+'"] .ban_video ').attr('id','hpb_first_copy');
		var countVideo = 1; 
		$('.hpir_wrap .news_wrap.slick-cloned .video_wrap').each(function () {
			var $video = $(this).find('> div');
			$video.attr('id','insight_wrap_'+countVideo);
			countVideo++;
		})

		$('.play_btn').on('click', function(){
			if($(this).parent().find('.ytplayer').length > 0){
				var yTId = $(this).parent().find('.ytplayer').attr('id');
			}else {
				var vTId = $(this).parent().find('.vimeo_video').attr('data-key');
			}

			if(!$(this).hasClass('play_vid')){
				$(this).addClass('play_vid')
				$(this).parent().find('.image_video').addClass('vis_hid');
				if($(this).parent().find('.ytplayer').length > 0){
					playersY2[yTId].playVideo();
				}else {
					playersV2[vTId].play();
				}
					
			}else {
				$(this).removeClass('play_vid')
				$(this).parent().find('.image_video').removeClass('vis_hid');

				if($(this).parent().find('.ytplayer').length > 0){
					playersY2[yTId].pauseVideo();
				}else {
					playersV2[vTId].pause();
				}
			}
	
		});
		/*=====  End of Insights  ======*/
		
		/*====================================
		=            Testimonials            =
		====================================*/
		
		$('.hptr_slider').slick({
			slidesToScroll: 1,
			infinite: true,
			focusOnSelect: true,
			//centerMode: true,
			dots: true,
			arrows: false,
			variableWidth: true,
		})

		document.addEventListener("scroll", function(){
			if ($(window).width()>767 && $(window).width()<1024){
				var object_h = $('.hptr_slider').outerHeight();
				var center_of_object = $('.hpt_right').offset().top + object_h/2;
				var center_of_window = $(window).scrollTop() + $(window).height()/2;
				var bot_of_window = $(window).scrollTop() + $(window).height();

				$('.hpt_right').css('height',object_h+'px');
				if (center_of_window>center_of_object) {
					$('.hpt_right_move').addClass('fixed');
					var wrap_bot = $('.hpt_left').offset().top + $('.hpt_left').outerHeight();

					if (wrap_bot < center_of_window + object_h/2) {
						var top = $('.hpt_left').outerHeight() - object_h;
						$('.hpt_right_move').addClass('bot').css('top',top+'px');
					} else {
						$('.hpt_right_move').removeClass('bot').removeAttr('style');
					}

				} else {
					$('.hpt_right_move').removeClass('fixed');
				}
			}
		}); 

		if ($(window).width()<768){
			$('.hpt_left').slick({
				slidesToScroll: 1,
				infinite: true,
				focusOnSelect: true,
				//centerMode: true,
				dots: false,
				arrows: false,
				variableWidth: true,
			});
			$('.hpt_left .slick-cloned .lazyImg').scroll_function(-300,lazyImg);
		}
		

		/*=====  End of Testimonials  ======*/
		
		
	});
})(jQuery, this);


/*=============================
=            Vimeo            =
=============================*/
var productsLengthR = jQuery('.hpb_desc .desc_wrap').length;
var playersV = {};

function playVimeo(target) {
	if ( target.length && jQuery(window).width() > 1024 ) {
		jQuery('.vimeo_video').each(function () {
			var $self = jQuery(this), iframe = jQuery(this)[0], key = $self.attr('data-key');
			if(playersY[key] == undefined){
				var player = new Vimeo.Player(iframe);
				player.setVolume(0);
				player.play();
				player.on('play', function() {
					$self.closest('.video_wrap').addClass('video_active');
					// $self.closest('.video_wrap').addClass('active_overlay');
					// $self.closest('.video_wrap').siblings().addClass('active_overlay');
				});
				playersV[key] = player;
			} else {
				playersV[key].play();
			}
		})
	}
}
setTimeout(function(){
	playVimeo(jQuery('.video_wrap.slick-active .vimeo_video'));
	playVimeo( jQuery('.video_wrap[data-slick-index="'+productsLengthR+'"] .vimeo_video') );
},1000);
/*=====  End of Vimeo  ======*/


/*===============================
=            Youtube            =
===============================*/


var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


var playersY = {};
function playYouTube(target) {
	if ( target.length && jQuery(window).width() > 1024 ) {
		
		target.each(function () {
			var element = jQuery(this),
			wrap = element.closest('.video_wrap');

			var key = element.data('key');
			var id = element.attr('id');

			if(playersY[id] == undefined){
				playersY[id] = new YT.Player(id, {
					height: '390',
					width: '640',
					videoId: key,
					playerVars: {
						'controls': 0,
					    'loop': 1,
					    'playlist':key,
					    'autohide': 1,
					    'autoplay': 1,
					    'iv_load_policy': 3,
						'rel': 0,
						'showinfo': 0,
					},
					events: {
						onStateChange: function (event) {
							if (event.data==1) {
								wrap.addClass('video_active');
							}
						},
						onReady: function(e) {
							e.target.mute();
							// wrap.addClass('active_overlay');
							// wrap.siblings().addClass('active_overlay');
						}
					}
				});
			} else {
				playersY[id].playVideo();
			}
		})
	}
}

setTimeout(function () {
	playYouTube( jQuery('.video_wrap.slick-active .ytplayer') );
	playYouTube( jQuery('.video_wrap[data-slick-index="'+productsLengthR+'"] .ytplayer') );
},2000)


jQuery('.hpb_bg').on('beforeChange', function(event, slick, currentSlide, nextSlide){
	jQuery.each(playersY, function (argument) {
		playersY[argument].pauseVideo();
	});
	jQuery.each(playersV, function (argument) {
		playersV[argument].pause();
	});
	//console.log(nextSlide);

	playYouTube( jQuery('.hpb_bg .video_wrap[data-slick-index="'+nextSlide+'"] .ytplayer') );
	playVimeo( jQuery('.hpb_bg .video_wrap[data-slick-index="'+nextSlide+'"] .vimeo_video') );
	if (nextSlide == 0) {
		playVimeo( jQuery('.hpb_bg .video_wrap[data-slick-index="'+productsLengthR+'"] .vimeo_video') );
		playYouTube( jQuery('.hpb_bg .video_wrap[data-slick-index="'+productsLengthR+'"] .ytplayer') );

	}
})

/*=====  End of Youtube  ======*/


///intro video