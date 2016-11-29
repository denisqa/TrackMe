function initMap() {

	var map = new google.maps.Map(document.getElementById('map'), {
	center: {lat: -34.397, lng: 150.644},
		zoom: 14
	});
	var infoWindow = new google.maps.InfoWindow({map: map});
/*	var flightPlanCoordinates = [
		{lat: 37.772, lng: -122.214},
		{lat: 21.291, lng: -157.821},
		{lat: -18.142, lng: 178.431},
		{lat: -27.467, lng: 153.027}
	];
	var flightPath = new google.maps.Polyline({
		path: flightPlanCoordinates,
		geodesic: true,
		strokeColor: '#FF0000',
		strokeOpacity: 1.0,
		strokeWeight: 2
	});
	flightPath.setMap(map);*/
	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
	
			infoWindow.setPosition(pos);
			infoWindow.setContent('Location found.');
			map.setCenter(pos);
			
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
}

/*var myLatLng = new google.maps.LatLng(data[0].coords.latitude, data[0].coords.longitude);
 
// Google Map options
var myOptions = {
  zoom: 15,
  center: myLatLng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
 
// Create the Google Map, set options
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
var trackCoords = [];
 
// Add each GPS entry to an array
for(i=0; i<data.length; i++){
    trackCoords.push(new google.maps.LatLng(data[i].coords.latitude, data[i].coords.longitude));
}
 
// Plot the GPS entries as a line on the Google Map
var trackPath = new google.maps.Polyline({
  path: trackCoords,
  strokeColor: "#FF0000",
  strokeOpacity: 1.0,
  strokeWeight: 2
});
 
// Apply the line to the map
trackPath.setMap(map);*/