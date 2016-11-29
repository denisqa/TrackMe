$(document).ready(function(){
	var inProgress = false;
	var startFrom = 10;
	$('.moreTracks').click(function() {
        $.ajax({
            url: 'scripts/trackList.php',
            method: 'POST',
            data: {"startFrom" : startFrom},
            beforeSend: function() {
				inProgress = true;
			}
		}).done(function(data){
            data = jQuery.parseJSON(data);
            if (data.length > 0) {
				$.each(data, function(index, data){
					$(".tracks").append(data);
				});
				inProgress = false;
				startFrom += 10;
				initMap();
            }
			if(data.length<10) $(".moreTracks").css("display", "none")
		});  
    });
});