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

			},2000)
		}

		$('.play_btn').on('click', function(){
			if($(this).parent().find('.ytplayer').length > 0){
				var yTId = $(this).parent().find('.ytplayer').attr('id');
			}else {
				var vTId = $(this).parent().find('.vimeo_video').attr('data-key');
				console.log(vTId);
			}

			if(!$(this).hasClass('play_vid')){
				$(this).addClass('play_vid')
				$(this).parent().find('.image_video').addClass('vis_hid');
				if($(this).parent().find('.ytplayer').length > 0){
					playersY[yTId].playVideo();
				}else {
					playersV[vTId].play();
				}
					
			}else {
				$(this).removeClass('play_vid')
				$(this).parent().find('.image_video').removeClass('vis_hid');

				if($(this).parent().find('.ytplayer').length > 0){
					playersY[yTId].pauseVideo();
				}else {
					playersV[vTId].pause();
				}
			}
	
		});

		//input animation
        $('input').each(function() {
            CheckVal($(this));
        });


        $('input').focus(function() {
            $(this).parent().parent().addClass('active');
        });
        $('input').blur(function() {
            CheckVal($(this));
        });

        function CheckVal(item) {
            if (item.val().length == 0) {
                item.parent().parent().removeClass('active');
            } else {
                item.parent().parent().addClass('active');
            }
        }


        //select open

		$('.select_fake .select_cur').on('click', function(){
			var parent = $(this).parent();
			$(this).toggleClass('active');
			parent.find('.list_author_wrap').slideToggle('300');
		});

		$('.select_fake .single_select').on('click', function(){
			var thisTxt = $(this).text(),
				parent = $(this).parent().parent();

			parent.find('.cur_author').text(thisTxt);
			parent.find('.cur_author').removeClass('active');
			parent.find('.list_author_wrap').slideUp('300');

		});


		//add dots

		$('.news_list .title_wrap_ps').each(function(){
			var txt_height = $(this).find('.title_hgh').outerHeight();
			var wrap_height = $(this).find('.title').outerHeight();

			if(txt_height > wrap_height){
				$(this).addClass('adots');
			}
		});

		$(window).resize(function(){
			$('.news_list .title_wrap_ps').each(function(){
				var txt_height = $(this).find('.title_hgh').outerHeight();
				var wrap_height = $(this).find('.title').outerHeight();

				if(txt_height > wrap_height){
					$(this).addClass('adots');
				}
			});
		});
		
	});
	
})(jQuery, this);