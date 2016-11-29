$(document).ready(function(){
	$(".editableInput").css('display', 'none');
	$(".editInf").click(function(){
		$(".editableInf").css('display', 'none');
		$(".editableInput").css('display', 'inline-block');
	});

	$("#editableBtn").click(function(e){
		e.preventDefault();
		formData = new FormData();
		formData.append('city', $("#city").val());
		formData.append('email', $("#email").val());
		formData.append('phone', $("#phone").val());
		formData.append('image', $('input[type=file]')[0].files[0]);
		$.ajax({
			type: "POST",
			url: 'scripts/editInf.php',
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				if (data) {   //true
					if(data=="editTrue") location.reload(true);
					else{
						$(".message").css('display', 'inline');
						$(".message").html(data);
					}
				}
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(xhr.status);
				alert(thrownError);
			} 
		});
		return false;
	});
});