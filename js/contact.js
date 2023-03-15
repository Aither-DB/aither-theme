(function ($, root, undefined) {
	$(function () {

		//anchors
		$('a[href^="#"]').click(function() {
			var href = $.attr(this, 'href'),
				head_height = $('.header .white_all').outerHeight(),
			    hrefTop = $(href).offset().top - head_height,
			    $root = $('html, body');

			$root.stop();

			$root.animate({
		        scrollTop: hrefTop
		    }, 1000, function () {
		        //window.location.hash = href;
		    });

		    return false;
		});

		if($('.pag_office_cont .single_pag').length>0){
			var nr_items = $('.pag_office_wrap').attr('data-nr');

		 	$('.pag_office_wrap').slick({
				slidesToShow: nr_items,
				slidesToScroll: 1,
				vertical: true,
				arrows: false,
				focusOnSelect: true,
				dots: false,
				centerMode: false,
				infinite: false,
				asNavFor: '.slider_office_wrap',
				centerPadding: '23px',
				speed: 500,
				responsive: [
				    {
				    breakpoint: 767,
					    settings: {
					        slidesToShow: 1,
					   		centerPadding: '0px',
					   		vertical: false,
					   		centerMode: false,
					   		infinite: false,
					   		variableWidth: true,
					    }
				    },
				]
			})
		}


		if($('.slider_office_cont .single_office').length>0){
		
		 	$('.slider_office_wrap').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: true,
				arrows: false,
				focusOnSelect: true,
				dots: false,
				infinite: true,
				asNavFor: '.pag_office_wrap',
				speed: 400,
				cssEase: 'ease-in-out',
				adaptiveHeight: true,
				draggable: false,
				touchMove: false,
				responsive: [
				    {
				    breakpoint: 767,
					    settings: {
					   		infinite: false,
					    }
				    },
				]
			}).on('beforeChange', function(event, slick, currentSlide, nextSlide){
				var id = $('.slider_office_wrap .single_office[data-slick-index="'+nextSlide+'"]').find('.map').attr('id');
				if(!$('.slider_office_wrap .single_office[data-slick-index="'+nextSlide+'"]').hasClass('active_map')){
					initializeMap(id);
				}
				$('.slider_office_wrap .single_office[data-slick-index="'+nextSlide+'"]').addClass('active_map');
			});

			setTimeout(function(){
				initializeMap('map_0');
			}, 300);
		}

		if($(window).width() < 768){
			if($('.advs_items_wrap .single_adv').length > 0){
				var mySwiper = new Swiper('.advs_items_cont.swiper-container', {
				    slidesPerView: 'auto',
	                freeMode: true,
	                speed: 1500,
	                spaceBetween: 22,
				});
			}

			if($('.jobs_wrap .single_job').length > 0){
				var mySwiper2 = new Swiper('.jobs_cont.swiper-container', {
				    slidesPerView: 'auto',
	                freeMode: true,
	                speed: 1500,
	                spaceBetween: 25,
	                pagination: {
				        el: '.swiper-pagination',
				        clickable: true,
				    },
				});
			}
		}

		/*=======================================
        =            Input animation            =
        =======================================*/

        function CheckVal(item) {
            if (item.val().length == 0) {
                item.parent().parent().removeClass('active');
            } else {
                item.parent().parent().addClass('active');
            }
        }


        //input animation
        $('.input_wrap input, textarea').each(function() {
            CheckVal($(this));
        });


        $('.input_wrap input, textarea').focus(function() {
            $(this).parent().parent().addClass('active');
        });
        $('.input_wrap input, textarea').blur(function() {
            CheckVal($(this));
        });

        /*=====  End of Input animation  ======*/
        /*====================================
        =            Numbers only            =
        ====================================*/
        
        $("input[name='contact_tel']").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
        
        /*=====  End of Numbers only  ======*/

        //click submit

        $('.btn_send_wrap input').on('click', function(){
            $('.ajax_loader_wrap').addClass('active');
        });

        /*=======================================
        =            Form no success            =
        =======================================*/

        function isValidEmailAddress(emailAddress) {
		    var pattern = new RegExp (/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i);
		    return pattern.test(emailAddress);
		};

		function validateEmail(){

			if (!isValidEmailAddress($("#contact_email").val())) {
				$("#contact_email").parent().parent().addClass('active_valid');
		    }else {
		    	$("#contact_email").parent().parent().removeClass('active_valid');
		    }
		}

		function validateInputs(item){
			if (item.val().length == 0) {
                item.parent().parent().addClass('active_valid');
            } else {
                item.parent().parent().removeClass('active_valid');
            }
		}

        $(".right_wrap .wpcf7").on('wpcf7invalid', function(event){
            var inputName = $('#contact_name'),
            	inputPhone = $('#contact_tel'),
            	inputMsg = $('#contact_msg');

            $('.ajax_loader_wrap').removeClass('active');

            validateEmail();
            validateInputs(inputName);
            validateInputs(inputPhone);
            validateInputs(inputMsg);
        });

        /*=======================================
        =            Form on success            =
        =======================================*/

        $(".right_wrap .wpcf7").on('wpcf7:mailsent', function(event){
        	var inputName = $('#contact_name'),
            	inputPhone = $('#contact_tel'),
            	inputMsg = $('#contact_msg');

        	validateEmail();
        	validateInputs(inputName);
            validateInputs(inputPhone);
            validateInputs(inputMsg);

        	$('.input_wrap, .textarea_wrap').each(function() {
	            $(this).removeClass('active');
	        });

            $('.ajax_loader_wrap').removeClass('active');

          	setTimeout(function(){
	            $('.form_wrap').slideUp('400');
	        },300);

	        setTimeout(function(){
	        	$('.ty_message_cont').slideDown('400');
	        }, 600);
        });



	});
})(jQuery, this);