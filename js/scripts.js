(function ($, root, undefined) {
	
	$(function () {
		/*=================================
		=            Animation            =
		=================================*/
		
		$('.element_child_anim,.element_anim,.element_anim_1,.element_anim_2,.element_anim_3,.element_anim_4,.element_anim_5,.fade_anim_1,.fade_anim_2,.fade_anim_3, .opacity_anim').scroll_anim(0,-100,0);
		$('.title_anim, .title_anim_2, .position_anim, .qoute_anim, .picture_anim, .line_q_anim, .bar_title_anim, .bar_line_anim, .bar_line_anim_2, .bar_items_anim, .bg_mobile_anim, .title_mobile_anim, .line_mobile_anim, .items_mobile_anim, .slides_bar_anim, .items_anim_1').scroll_anim(0,-100,0);

		/*=====  End of Animation  ======*/

		/*============================
		=            Menu            =
		============================*/
		
		$('.head_menu .menu').append('<div class="underline" style="opacity:0"></div>');
		$('.head_menu .menu-item-has-children > a').each(function () {
			$(this).removeAttr('href');
		})
		function currentPage() {
			if ($(window).width()>767){
				if ($('.head_menu .menu > li.current_page_item ').length) {
					$('.head_menu .menu > li.current_page_item ').mouseenter();
				} else {
					$('.head_menu .underline').stop().animate({
					    opacity: 0,
					})
				}
			}
		}
		
		$('.head_menu .menu > li').mouseenter(function () {
			if ($(window).width()>767) {
				var $this = $(this), 
				left = parseInt($(this).position().left),
				half_width = parseInt($(this).width())/2,
				position = left + half_width;
				//$('.head_menu .underline').css('left',position+'px');
				$('.head_menu .underline').stop().animate({
				    left: position,
				    opacity: 1,
				})
				
				if( $(this).hasClass('menu-item-has-children') ){
					$('.open_sub_menu').removeClass('open_sub_menu').stop().slideUp(200);
					$('.header').addClass('sub_menu');
					//setTimeout(function () {
						$this.find('.sub-menu').addClass('open_sub_menu').stop().slideDown(200);
					//},200)
					//$(this).find('.sub-menu').addClass('open_sub_menu').slideDown(200);
				} else {
					$('.open_sub_menu').removeClass('open_sub_menu').stop().slideUp(200);
					//setTimeout(function () {
						$('.header').removeClass('sub_menu');
					//},200)
				}
			}
		}).mouseleave(function () {

			currentPage()
		})
		currentPage();

		$('.head_menu').mouseleave(function () {
			if ($(window).width()>767){
				$('.open_sub_menu').removeClass('open_sub_menu').stop().slideUp(200);
				//setTimeout(function () {
					$('.header').removeClass('sub_menu');
				//},200)
			}
		})

		$('.head_menu_btn ').click(function (e) {
			$('.header').toggleClass('menu_open');
		})
		
		/*=====  End of Menu  ======*/


		//menu change color

		function getPosition(element) {
		   	var xPosition = 0;
		   	var yPosition = 0;

		   	while (element) {
		       	xPosition += (element.offsetLeft - element.scrollLeft + element.clientLeft);
		       	yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
		       	element = element.offsetParent;
		   	}
		   	return {
		       	x: xPosition,
		       	y: yPosition
		   	};
		}

		function window_width(){
			var window_width = $(window).outerWidth();
			$('.header_wrap .header_width').css('width', window_width+'px');
		}

		window_width();

		$( window ).resize(function() {
			window_width();
		});

		function opacity0(elW,maxW) {

			var allW = $('#menu-header-menu').outerWidth() - parseInt($('#menu-header-menu').css('margin-right'));

			$('#menu-header-menu > li').addClass('opacity_0');
			if (allW > maxW) {
				$('#menu-header-menu > li').each(function () {
					if (allW > maxW) {
						$(this).removeClass('opacity_0');
					}
					allW = allW - $(this).outerWidth();
				})
			}
		}

		var globalW = 0;
		function change_color(){
			var header_bot = $('.header .white_all').offset().top + $('.header .white_all').outerHeight(),
				ww = $(window).outerWidth(),
				window_top = $(window).scrollTop(),
				window_hg = $(window).scrollTop() + $(window).outerHeight(),
				addGrad = 0;
			$('.blue_head_sec').each(function(key){
				var this_top_blue = $(this).offset().top,
					this_bot_blue = $(this).offset().top + $(this).outerHeight(),
					this_width = $(this).outerWidth(),
					pos = getPosition(this);

					//console.log(this_top_blue);
					//$('.header_wrap.blue_all').removeClass('add_grad');

				if (window_top > this_top_blue && header_bot <= this_bot_blue) {
					addGrad++;
				}
				if(header_bot >= this_top_blue && header_bot <= this_bot_blue) {
					$(this).addClass('act_scroll_sec');

					if(!$(this).hasClass('white_all') && !$(this).hasClass('blue_all_sec')){

						if (pos.x > (ww / 10)) { //right_side
							$('header .blue_all, header .add_grad').addClass('right_side');
							$('header .header_width').addClass('right_side');
							$('header .blue_all, header .add_grad').removeClass('left_side');
							$('header .header_width').removeClass('left_side');

							opacity0($('#menu-header-menu').css('margin-right'), this_width);
						}else { //left side
							$('header .blue_all, header .add_grad').addClass('left_side');
							$('header .header_width').addClass('left_side');
							$('#menu-header-menu > li').removeClass('opacity_0');
							$('header .blue_all, header .add_grad').removeClass('right_side');
							$('header .header_width').removeClass('right_side');
							
						}
						$('header .blue_all, header .add_grad').css('width', this_width+'px');
						$('header .blue_all, header .add_grad').removeClass('blue_hid');
						$('header .white_all').addClass('bg_head');

						if($(this).hasClass('nhb')){
							$('header .header_wrap.white_all').addClass('bg_trans');
						}else {
							$('header .header_wrap.white_all').removeClass('bg_trans');
						}
						

					}else if($(this).hasClass('white_all')){

						$('header .blue_all, header .add_grad').removeClass('left_side');
						$('header .blue_all, header .add_grad').removeClass('right_side');
						$('header .header_width').removeClass('left_side');
						$('header .header_width').removeClass('right_side');
						$('header .blue_all, header .add_grad').addClass('blue_hid');
						$('header .white_all').removeClass('bg_head');
						$('header .blue_all, header .add_grad').css('width', '100%');
						$('#menu-header-menu > li').removeClass('opacity_0');

						if($(this).hasClass('nhb')){
							$('header .header_wrap.white_all').addClass('bg_trans');
						}else {
							$('header .header_wrap.white_all').removeClass('bg_trans');
						}


					}else if($(this).hasClass('blue_all_sec')){

						$('header .blue_all, header .add_grad').removeClass('left_side');
						$('header .blue_all, header .add_grad').removeClass('right_side');
						$('header .header_width').removeClass('left_side');
						$('header .header_width').removeClass('right_side');
						$('header .blue_all, header .add_grad').css('width', '100%');
						$('header .white_all').addClass('bg_head');
						$('header .blue_all, header .add_grad').removeClass('blue_hid');
						$('#menu-header-menu > li').addClass('opacity_0');

						if($(this).hasClass('nhb')){
							$('header .header_wrap.white_all').addClass('bg_trans');
						}else {
							$('header .header_wrap.white_all').removeClass('bg_trans');
						}


					}else {
						
						$('header .white_all').addClass('bg_head');
						$('header .blue_all, header .add_grad').removeClass('blue_hid');
						$('header .blue_all, header .add_grad').removeClass('left_side');
						$('header .blue_all, header .add_grad').removeClass('right_side');
						$('header .header_width').removeClass('left_side');
						$('header .header_width').removeClass('right_side');
						$('header .blue_all, header .add_grad').css('width', '100%');
						
						if($(this).hasClass('nhb')){
							$('header .header_wrap.white_all').addClass('bg_trans');
						}else {
							$('header .header_wrap.white_all').removeClass('bg_trans');
						}
					}

				}else {
					$(this).removeClass('act_scroll_sec');
				}
			});
			//console.log(addGrad);
			// if (addGrad>0 && $(window).width()>767) {
			// 	$('.header_wrap.blue_all').addClass('add_grad');
			// } else {
			// 	$('.header_wrap.blue_all').removeClass('add_grad');
			// }
		}

		change_color();

		window.addEventListener('scroll', function(e) {
			change_color();
		});

		$( window ).resize(function() {
			change_color();
		});


		/*==================================
		=            Newsletter            =
		==================================*/
		
		$('.input_wrap_format input').focus(function () {
			$(this).parent().addClass('focus');
		}).blur(function () {
			if( $(this).val().length == 0 ){
				$(this).parent().removeClass('focus');
			}
		}).each(function () {
			if( $(this).val().length > 0 ){
				$(this).parent().addClass('focus');
			}
		})
		
		/*=====  End of Newsletter  ======*/
		
	});
	
})(jQuery, this);