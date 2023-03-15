(function ($, root, undefined) {
	
	$(function () {

		/*=============================
		=            Vimeo            =
		=============================*/
		var playersV = {};

		setTimeout(function(){
			jQuery('.vimeo_video').each(function () {
				var $self = jQuery(this), iframe = jQuery(this)[0], key = $self.attr('data-key');
				if(playersV[key] == undefined){
					var player = new Vimeo.Player(iframe);
					player.setVolume(0);
					player.play();
					player.on('play', function() {
					});
					playersV[key] = player;
				} else {
					playersV[key].play();
				}
			})
		});

		/*===============================
		=            Youtube            =
		===============================*/

		if (jQuery('.ytplayer').length) {
			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			var playersY = {};

			setTimeout(function () {

				jQuery('.ytplayer').each(function () {
					var element = jQuery(this),
					wrap = element.closest('.video_wrap');
					var key = element.data('key');
					var id = element.attr('id');
					playersY[id] = new YT.Player(id, {
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

			},3000)
		}

		$('.play_btn').on('click', function(){
			if($(this).parent().find('.ytplayer').length > 0){
				var yTId = $(this).parent().find('.ytplayer').attr('id');
			}else {
				var vTId = $(this).parent().find('.vimeo_video').attr('data-key');
			}

			if(!$(this).hasClass('play_vid')){
				$(this).addClass('play_vid')
				$(this).parent().addClass('active');

				if($(this).parent().find('.ytplayer').length > 0){
					playersY[yTId].playVideo();
				}else {
					playersV[vTId].play();
				}

			}else {
				$(this).removeClass('play_vid')
				$(this).parent().removeClass('active');

				if($(this).parent().find('.ytplayer').length > 0){
					playersY[yTId].pauseVideo();
				}else {
					playersV[vTId].pause();
				}
			}
		});

		if($('.gallery_section .single_gallery').length > 0){
		    var swiper_gallery = new Swiper('.gallery_section.swiper-container', {
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
		    });

		    swiper_gallery.on('slideChange', function () {
	    		var activeSlide = swiper_gallery.activeIndex + 1;
			  	$('#cur_slide').text(activeSlide);
			  	$('#cur_slide_2').text(activeSlide);
			});
		}

	});
	
})(jQuery, this);