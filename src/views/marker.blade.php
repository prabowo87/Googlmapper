@if ($options['user'] && $options['place'])

	var service = new google.maps.places.PlacesService({{ $options['map'] }});
	var request = {
		placeId: '{{ $options['place'] }}'
	};

	service.getDetails(request, function(placeResult, status) {
		if (status != google.maps.places.PlacesServiceStatus.OK) {
			alert('Unable to find the Place details.');
			return;
		}

@endif

var markerPosition_{{ $id }} = new google.maps.LatLng({{ $options['latitude'] }}, {{ $options['longitude'] }});

var marker_{{ $id }} = new google.maps.Marker({
	position: markerPosition_{{ $id }},
	@if ($options['user'] && $options['place'])
		place: {
			placeId: '{{ $options['place'] }}',
			location: { lat: {{ $options['latitude'] }}, lng: {{ $options['longitude'] }} }
		},
		attribution: {
			source: document.title,
			webUrl: document.URL
		},
	@endif
	title: '{{ $options['title'] }}',
	animation: @if (empty($options['animation']) || $options['animation'] == 'NONE') '' @else google.maps.Animation.{{ $options['animation'] }} @endif,
	@if ($options['symbol'])
		icon: {
			path: google.maps.SymbolPath.{{ $options['symbol'] }},
			scale: {{ $options['scale'] }}
		}
	@else
		icon: '{{ $options['icon'] }}'
	@endif
});

bounds.extend(marker_{{ $id }}.position);

marker_{{ $id }}.setMap({{ $options['map'] }});

@if (!empty($options['content']) && !$options['user'])

	var infowindow_{{ $id }} = new google.maps.InfoWindow({
		content: '{{ $options['content'] }}'
	});

	google.maps.event.addListener(marker_{{ $id }}, 'click', function() {
		infowindow_{{ $id }}.open(map, marker_{{ $id }});
	});

@endif

@if ($options['user'] && $options['place'])

		marker_{{ $id }}.addListener('click', function() {
			infowindow.setContent('<a href="' + placeResult.website + '">' + placeResult.name + '</a>');
			infowindow.open(map, this);
		});
	});

@endif