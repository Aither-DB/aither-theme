(function ($, root, undefined) {
	$(function () {

		$.fn.scroll_anim = function(item_dist,item_dist_2,both){
			if (item_dist === undefined) {
				item_dist = 0;
			}
			if (both === undefined) {
				both = 0;
			}
			if($(window).width()<768){
				item_dist = item_dist/2;
			}
			var item = $(this);
			function anim_check(){
				item.each( function(i){
					var top_of_object = $(this).offset().top + item_dist;
					var bottom_of_object = $(this).offset().top + $(this).outerHeight() + item_dist_2
					//console.log($(this).outerHeight(true));
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					var this_item = $(this);
					var window_top = $(window).scrollTop();

					if( bottom_of_window > top_of_object ){
						var headerH = $('.header_wrap.white_all').outerHeight();
						
						this_item.addClass('start_anim');
						if(window_top +headerH > top_of_object){
							if($(window).width() > 767){
								//$(this_item).children().each(function (indexChild, child) {

								$(this_item).find('.children_anim').each(function (indexChild, child) {
						            var st = window_top+headerH - $(this).offset().top + 30;
						            $(this).css({ 'opacity': (1 - st / 60) });
						        });

						        $(this_item).find('.children_anim_adv').each(function (indexChild, child) {
						            var st = window_top+headerH - $(this).offset().top + 30;
						            $(this).css({ 'opacity': (1 - st / 100) });
						        });
							}
						} else {
							if($(window).width() > 767){
								$(this_item).find('.children_anim').css({ 'opacity': 1 });
								$(this_item).find('.children_anim_adv').css({ 'opacity': 1 });
							}
						}

						// setTimeout(function(){
						// 	this_item.addClass('start_anim');
						// 	if(window_top > bottom_of_object){
						// 		this_item.addClass('out_anim');
						// 	}else {
						// 		this_item.removeClass('out_anim');
						// 	}
						// }, 100);
					}else if(both==1){
						setTimeout(function(){
							this_item.removeClass('start_anim');
						}, 100);
					}
				})
			}
			$(document).ready(function(){
				anim_check();
			})
			window.addEventListener('scroll',function(){
				anim_check();
			});
		}
		$(window).on('scroll', function () {
		    $('.section').each(function (index, item) {
		        $(item).children().each(function (indexChild, child) {
		            var st = $(window).scrollTop();
		            st = $(window).scrollTop() - $(child).offset().top + 10;
		            $(child).css({ 'opacity': (1 - st / 20) });
		        });

		    });
		});

		// $.fn.scroll_anim = function(item_dist,item_dist_2,both){
		// 	if (item_dist === undefined) {
		// 		item_dist = 0;
		// 	}
		// 	if (both === undefined) {
		// 		both = 0;
		// 	}
		// 	if($(window).width()<768){
		// 		item_dist = item_dist/2;
		// 	}
		// 	var item = $(this);
		// 	function anim_check(){
		// 		item.each( function(i){
		// 			var top_of_object = $(this).offset().top + item_dist;
		// 			var bottom_of_object = $(this).offset().top + $(this).outerHeight() + item_dist_2
		// 			//console.log($(this).outerHeight(true));
		// 			var bottom_of_window = $(window).scrollTop() + $(window).height();
		// 			var this_item = $(this);
		// 			var window_top = $(window).scrollTop();

		// 			if( bottom_of_window > top_of_object ){
		// 				setTimeout(function(){
		// 					this_item.addClass('start_anim');
		// 					if(window_top > bottom_of_object){
		// 						this_item.addClass('out_anim');
		// 					}else {
		// 						this_item.removeClass('out_anim');
		// 					}
		// 				}, 100);
		// 			}else if(both==1){
		// 				setTimeout(function(){
		// 					this_item.removeClass('start_anim');
		// 				}, 100);
		// 			}
		// 		})
		// 	}
		// 	$(document).ready(function(){
		// 		anim_check();
		// 	})
		// 	window.addEventListener('scroll',function(){
		// 		anim_check();
		// 	});
		// }
		$.fn.scroll_function = function(item_dist,funct){
			if (item_dist === undefined) {
				item_dist = 0;
			}
			if($(window).width()<768){
				item_dist = item_dist/2;
			}
			var item = $(this);
			function anim_check(){
				item.each( function(i){
					var top_of_object = $(this).offset().top + item_dist;
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					var this_item = $(this);
					if( bottom_of_window > top_of_object && this_item.attr('data-sf')!='done'){
						funct(this_item);
						this_item.attr('data-sf','done');
					}
				})
			}
			$(document).ready(function(){
				anim_check();
			})
			window.addEventListener('scroll',function(){
				anim_check();
			});
		}

		$.fn.scroll_function_report = function(item_dist,funct){
			if (item_dist === undefined) {
				item_dist = 0;
			}
			if($(window).width()<768){
				item_dist = item_dist/2;
			}
			var item = $(this);
			function anim_check(){
				item.each( function(i){
					var top_of_object = $(this).offset().top + item_dist;
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					var this_item = $(this);
					if( bottom_of_window > top_of_object && this_item.attr('data-sf')!='done'){
						funct(this_item);
						this_item.attr('data-sf','done');
						var styleInterval = setInterval(function(){
							if(this_item.attr('style')!=undefined){
								this_item.removeAttr('style');
								clearInterval(styleInterval);
							}
						},100);
					}
				})
			}
			$(document).ready(function(){
				anim_check();
			})
			window.addEventListener('scroll',function(){
				anim_check();
			});
		}

		$.fn.scroll_to = function(top,has_bot_anim){
			if (top === undefined) {
				top = 0;
			}
			if (has_bot_anim === undefined) {
				has_bot_anim = 0;
			}
			
			var target = $(this);
			if(target!='none'){
				if (target.length) {
					var too = (target.offset().top + top);
					if ( !target.hasClass('start_anim') && has_bot_anim == 1 ) {
						too = too - 100;
					}
					$('html,body').animate({
						scrollTop: too
					}, 1000);
					return false;
				}
			}
		}

		$('[data-action="scroll-to"]').click(function(){
			var id = $(this).attr('scroll-to');
			$(id).scroll_to(0);
		});

		/*========================================
		=            lazy load images            =
		========================================*/
		
		window.lazyBg = function(item){
			//item.removeClass('lazyBg');
			var url = item.attr('data-src');

			if( $(window).width()<1025 ){
				var attr = item.attr('data-src-sm');
				if (typeof attr !== typeof undefined && attr !== false) {
				    url = item.attr('data-src-sm');
				}
			}
			if( $(window).width()<768 ){
				var attr = item.attr('data-src-xs');
				if (typeof attr !== typeof undefined && attr !== false) {
				    url = item.attr('data-src-xs');
				}
			}

			if(url.length){
				item.css('background-image','url('+url+')');
			}
		}
		window.lazyImg = function(item){
			var url = item.attr('data-src');
			
			if( $(window).width()<1025 ){
				var attr = item.attr('data-src-sm');
				if (typeof attr !== typeof undefined && attr !== false) {
				    url = item.attr('data-src-sm');
				}
			}
			if( $(window).width()<768 ){
				var attr = item.attr('data-src-xs');
				if (typeof attr !== typeof undefined && attr !== false) {
				    url = item.attr('data-src-xs');
				}
			}

			item.attr('src',url);
		}

		$('.lazyBg').scroll_function(-300,lazyBg);
		$('.lazyImg').scroll_function(-300,lazyImg);

		

		
		
		
		/*=====  End of lazy load images  ======*/


		/*=====================================================
		=            disable body scroll functions            =
		=====================================================*/
		
		function disableBScroll(bodyItem){
			var pageOffsetTop = $(window).scrollTop();
			bodyItem
			.attr('data-offsettop',pageOffsetTop)
			.addClass('disableScroll')
			.css({
				position:'fixed',
				width: '100%',
				top: -pageOffsetTop+'px'
			});
		}

		function enableBScroll(bodyItem){
			var pageOffsetTop = (bodyItem.attr('data-offsettop')) ? bodyItem.attr('data-offsettop') : 0;
			bodyItem
			.removeAttr('data-offsettop')
			.removeClass('disableScroll')
			.css({
				position:'',
				top: 0
			});
			$(window).scrollTop(pageOffsetTop);
		}

		window.disableBodyScroll = function(){
			var bodyItem = $('body');
			if(!bodyItem.hasClass('disableScroll')){
				disableBScroll(bodyItem);
			}
		}

		window.enableBodyScroll = function(){
			var bodyItem = $('body');
			if(bodyItem.hasClass('disableScroll')){
				enableBScroll(bodyItem);
			}
		}

		window.toggleBodyScroll = function(){
			var bodyItem = $('body');
			if(!bodyItem.hasClass('disableScroll')){
				disableBScroll(bodyItem);
			}else{
				enableBScroll(bodyItem);
			}
		}
		
		/*=====  End of disable body scroll functions  ======*/

		/*================================
		=            Load svg            =
		================================*/
		
		SVGInjector(document.querySelectorAll('img.svg_inject') );
		
		/*=====  End of Load svg  ======*/
		
		/*==============================
		=            fix vh            =
		==============================*/
		
		$(document).ready(function(){
			window.viewportUnitsBuggyfill.init();

			$(window).resize(function(){
				window.viewportUnitsBuggyfill.refresh();
			});
		})
		
		/*=====  End of fix vh  ======*/
		

	});
})(jQuery, this);