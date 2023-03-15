(function ($, root, undefined) {
	
	$(function () {

		$('.lazyImgInline').scroll_function_report(-300,lazyImg);

		function getMeta(url,el){
		    $("<img/>",{
		        load : function(){
		            el.css('height',this.height+'px');
		        },
		        src  : url
		    });
		}

		$('.inline_image .lazyImgInline').each(function(){
			var self = $(this);
			var thisUrl = $(this).attr('data-src');
			getMeta(thisUrl,self);
		});

		///---scroll bar---///
		var lastScrollTop = 0;
		function scroll_bar(){
			var bar = $('.fixed_bar'),
				top_bar = $('.fixed_bar').offset().top,
				bot_bar = top_bar + $('.fixed_bar').outerHeight();
				top_scroll = $(window).scrollTop(),
				bottom_title_bar = $('.fixed_bar .blue_title').outerHeight() + $('.fixed_bar .blue_title').offset().top;
				banner_bot = $('.banner_template').outerHeight(),
				fot_top = $('footer').offset().top,
				bottom_bar = bar.offset().top + bar.outerHeight(),
				bottom_win = top_scroll + $(window).outerHeight(),
				fixed_bar_blue = $('.fixed_bar_blue').offset().top;

			if($(window).width() > 767){
				///bar position fixed///
				if(fot_top >= bottom_win){
					bar.removeClass('bot');
					if(top_scroll >= 236){
						bar.addClass('fixed');
					}else {
						bar.removeClass('fixed');
					}
				}
				else if(fot_top <= bottom_win){
					bar.addClass('bot');
					bar.removeClass('fixed');
				}
				///end bar position fixed///

				///title visibe///
				if(banner_bot <= top_scroll){
					$('.fixed_bar .top_desc').addClass('vis');
				}else {
					$('.fixed_bar .top_desc').removeClass('vis');
				}
				///end title visibe///
			}else {
				if($('.fixed_bar_blue .btn_bar').hasClass('active')){
					setHeightMenu();
				}
				if(fixed_bar_blue <= (top_scroll + 43)){
					$('.fixed_bar_blue').addClass('fixed');
					if(banner_bot > top_scroll + 43){
						$('.fixed_bar_blue').removeClass('fixed');
					}
				}
			}
		}

		scroll_bar();
		window.addEventListener("scroll", scroll_bar, false);


		function scroll_section(){
			var windowScroll = $(window).scrollTop();
			$('.scrl_sec').each(function(key){
				var thisTop = $(this).offset().top,
					thisId = $(this).attr('id');

				if(windowScroll >= thisTop){
					$('.fixed_bar .item_anch').each(function(){
						var self = $(this);
						var anchTarget = $(this).attr('data-target');
						if(anchTarget == thisId){
							self.find('.add_act').addClass('active');
						}else{
							self.find('.add_act').removeClass('active');
						}
					});
				}

			});
		}

		scroll_section();
		window.addEventListener("scroll", scroll_section, false);


		///mobile anchor elements height///
		function setHeightMenu(){
			var menuBarOffsetTop = $('.fixed_bar_blue').offset().top - $(document).scrollTop();
			var btnMenuHeight = $('.fixed_bar_blue .btn_bar').outerHeight();
			var heightMenu = menuBarOffsetTop + btnMenuHeight;

			if($(window).width() < 768){
				$('.fixed_bar_wrap').css('height','calc(100vh - '+heightMenu+'px)');
			}
		}

		setHeightMenu();
		///---end scroll bar---///

		///anchor scroll to section///
		$('.anchors_wrap .item_anch').on('click',function(){
			var $root = $('html,body'),
				href = $.attr(this, 'href'),
		    	scrollTopOff = $(href).offset().top,
		    	self = $(this),
		    	timeOut = 0;

		    if($(window).width() < 768){
		    	timeOut = 300;
		    	$('.fixed_bar_wrap').slideUp(300);
		    	$('.fixed_bar_blue .btn_bar').removeClass('active');
		    }
		    setTimeout(function(){
		    	$root.stop();

			    $root.animate({
			        scrollTop: scrollTopOff
			    }, 1000, function () {
			        window.location.hash = href;
			        self.siblings().find('.add_act').removeClass('active');
			    	self.find('.add_act').addClass('active');
			    });
		    },timeOut)
				
		    return false;
		});

		$('.raport_sec_banner .single_sub').on('click', function(){
			var $root = $('html,body'),
				href = $.attr(this, 'href'),
		    	scrollTopOff = $(href).offset().top,
		    	self = $(this);
		    
	    	$root.stop();

		    $root.animate({
		        scrollTop: scrollTopOff
		    }, 500, function () {
		        window.location.hash = href;
		    });
		    
		    return false;
		});
		///end anchor scroll to section///

		///open mobile menu///
		$('.fixed_bar_blue .btn_bar').on('click', function(){
			if($(window).width()<768){
				setHeightMenu();
				$(this).toggleClass('active');
				$('.fixed_bar_wrap').slideToggle(300);
			}
		});
		///end open mobile menu///

		///gallery section///
		var swiperArr = [];
		$('.gallery_section').each(function(key){

			if($(this).find('.single_gallery').length > 0){
				var thisPag1 = $(this).find('.cur_slide');
				var thisPag2 = $(this).find('.cur_slide_2');

				swiperArr[key] = new Swiper('.gallery_section.swiper-container', {
			    	spaceBetween: 30,
			    	speed: 600,
			    	pagination: {
			    		el: '.swiper-pagination',
			    		clickable: true,
			    	},
			    	navigation: {
				    	nextEl: '.swiper-button-next',
				        prevEl: '.swiper-button-prev',
				    },
				    on: {
					    slideChange: function () {
					    	var activeSlide = swiperArr[key].activeIndex + 1;
						  	thisPag1.text(activeSlide);
						  	thisPag2.text(activeSlide);
					    },
					},
			    }); 
			}
		});
		///end gallery section///

	});
	
})(jQuery, this);