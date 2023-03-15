(function ($, root, undefined) {
	$(function () {

		function addGraph($this,el,$chartBarHeight){
			if($this.find('.graph_data_bar').length){

				var plt = Bokeh.Plotting;
				var bar_data = $this.find('.graph_data_bar').attr('data-graph');
				var bar_data_to_graph = JSON.parse(bar_data);
				var charWidth = $this.width();
				var chartHeight = $chartBarHeight['desktop'];

				if($(window).width() > 767 && $(window).width() < 1025){
					chartHeight = $chartBarHeight['tablet'];;
				}else if($(window).width() <= 767){
					chartHeight = $chartBarHeight['mobile'];;
				}
			
				var p4 = Bokeh.Charts.bar(bar_data_to_graph, {
				    axis_number_format: "0.[00]a",
				    orientation: "vertical",
				    stacked: true,
				    palette: ['#182F57','#4190E9','$7693B4']
				});

				plt.show(plt.gridplot([[p4]], {plot_width:charWidth, plot_height:chartHeight}),el);

			}else if($this.find('.graph_data_pie').length){
				var thisWidth = $this.width()/2;

				if($(window).width() <= 1024){
					thisWidth = $this.width();
				}

				var plt = Bokeh.Plotting;
				var pie_data = {
				    labels: ['Work', 'Eat', 'Commute', 'Sport', 'Watch TV', 'Sleep'],
				    values: [8, 2, 2, 4, 0, 8],
				};

				var p2 = Bokeh.Charts.pie(pie_data, {
				    inner_radius: 0.2,
				    start_angle: Math.PI / 2
				});

				// add the plot to a document and display it
				plt.show(plt.gridplot([[p2]], {plot_width:thisWidth, plot_height:thisWidth}),el);
			}
		}

		///add graph///
		$('.full_graph').each(function(key,el){
			var $this = $(this);
			var chartBarHeight = {desktop:600, tablet:400, mobile:200};
			addGraph($this,el,chartBarHeight);
		});
		///end add graph///

		////graph slider/////
		if($('.gi_slider').length){
			$('.gi_slider').each(function(){
				///graph///
				$(this).find('.graph_slider').each(function(key,el){
					var $this = $(this);
					var chartBarHeight = {desktop:300, tablet:200, mobile:120};
					addGraph($this,el,chartBarHeight);
				});
				///end graph///

				if($(this).find('.single_nav_gs').length > 0){
					$(this).find('.gi_slider_wrap').slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false,
						dots: false,
						asNavFor: '.nav_gi_slider_wrap',
						variableWidth: true,
						draggable: false,
						focusOnSelect: true,
						lazyLoad: 'progressive',
						responsive: [
						    {
						    breakpoint: 1024,
						      	settings: {
						        	draggable: true,
						      	}
						    },
						]
					});
				}

				if($(this).find('.single_gs').length > 0){
					$(this).find('.nav_gi_slider_wrap').slick({
					  	slidesToScroll: 1,
					  	asNavFor: '.gi_slider_wrap',
					  	arrows: false,
					  	dots: true,
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

					$('.lazyImgSlider').scroll_function(-300,lazyImg);
				}
			});
		}
		////end graph slider/////

	});
})(jQuery, this);