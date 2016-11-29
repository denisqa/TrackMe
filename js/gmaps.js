function initMap() {
	var map,map2;
	allOptions=[];
	paths = [];
	tracks = [];
	for(i=0;i<json1.length;i++){
			coords = json1[i]['track_data'];
			coordsARR = coords.split(';');
			var path = [];
			for(j=0;j<coordsARR.length;j++){
				latLONG = coordsARR[j].split(',');
				if(j==0){
					centerLat = latLONG[0];
					centerLongt = latLONG[1];
				}
				path.push(new google.maps.LatLng(latLONG[0], latLONG[1]));
			}			
			paths.push(path);
			tracks.push(new google.maps.Polyline({
				path: paths[i],
				strokeColor: "#FF0000",
				strokeOpacity: 1.0,
				strokeWeight: 2
			}));
			allOptions.push({zoom: 9, center: new google.maps.LatLng(centerLat, centerLongt), mapTypeId: google.maps.MapTypeId.ROADMAP});
	}
	i=0;
	$(".track-map").each(function () { 
		map = new google.maps.Map($(this)[0], allOptions[i]);
		tracks[i].setMap(map);
		i++;
	});
}
