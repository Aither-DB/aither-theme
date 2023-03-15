	window.initializeMap = function(id) {
		var mapCanvas = document.getElementById(id);
		if (mapCanvas != null) {
			var start_location = ['49.6122606','20.6838766'];
			var lat = jQuery(mapCanvas).data('lat');
			var lng = jQuery(mapCanvas).data('lng');
			if(lat && lng){
				start_location[0] = lat;
				start_location[1] = lng;
			}
			var myCenter=new google.maps.LatLng(start_location[0],start_location[1]);
			var mapOptions = {
				zoomControl: false,
				panControl: false,
				scrollwheel : false,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				rotateControl: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}

			var map = new google.maps.Map(mapCanvas, mapOptions);

			map.set(
				"styles",[
				    {
				        "featureType": "administrative.country",
				        "elementType": "geometry.fill",
				        "stylers": [
				            {
				                "saturation": "-35"
				            }
				        ]
				    }
				]
			);

			var infowindow = new google.maps.InfoWindow();

			var bounds = new google.maps.LatLngBounds();

			var url = jQuery(mapCanvas).data('marker');

			var icon = {
				url: url,
				size: new google.maps.Size(169, 54),
				//origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(23,54),
			}

			marker = new google.maps.Marker({
				position: new google.maps.LatLng(start_location[0],start_location[1]),
				map: map,
				//icon: icon
			});
			bounds.extend(marker.position);

			map.fitBounds(bounds);

			var listener = google.maps.event.addListener(map, "idle", function () {
				map.setZoom(15);
				map.setCenter(myCenter);
				google.maps.event.removeListener(listener);
			});

		}

	}

	jQuery(window).resize(function(){
	 	//initialize();
	})

	jQuery(document).ready(function(){
		//loadScript();
		//jQuery('#map').scroll_function(-300,initialize);
	})

	function loadScript() {
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDOmczG69yIMGlPzHzpnOkGcKhMU_bti2w&sensor=false';
		document.body.appendChild(script);
	}