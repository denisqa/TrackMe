$(document).ready(function(){
	function loginClose(){
		$(".registerButton").css('display', 'inline');
		$(".loginButton").css('display', 'inline');
		$(".loginClose").css('display', 'none');
		$("#login").css('display', 'none');
		$("#overlay").css('display', 'none');
	}
	$(".registrBtn").click(function(){
		$("#overlay").fadeIn(400,
             function(){
                 $("#login").css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
				 $(".loginBack").css("display", "block");
				 $(".loginButton").css('display', 'none');
				 $("#loginForm").css("display", "block");
				 $(".loginBtn").css('display', 'none');
				 $(".registrBtn").css('display', 'none');
         });
	});
	$(".loginBtn").click(function(){
		$("#overlay").fadeIn(400,
             function(){
                 $("#login").css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
				 $(".loginBack").css("display", "block");
				 $(".registerButton").css('display', 'none');
				 $("#loginForm").css("display", "block");
				 $(".loginBtn").css('display', 'none');
				 $(".registrBtn").css('display', 'none');
         });
	});
	$(".loginBack").click(function(){
				 $("#loginForm").css("display", "none");
				 $(".loginBtn").css('display', 'block');
				 $(".registrBtn").css('display', 'block');
				 $(".loginButton").css('display', 'inline-block');
				 $(".registerButton").css('display', 'inline-block');
				 $(".loginBack").css("display", "none");
	});
	
	$(".loginButton").click(function(){
		$.ajax({
			type: "POST",
			url: 'scripts/login.php',
			data: { 'login': $(".loginValue").val(), 'pass': $(".passValue").val() },
			success: function(data) {
				if (data) {   //true
					if(data=="authTrue") location.reload(true);
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
	});
	
	$(".registerButton").click(function(){
		$.ajax({
			type: "POST",
			url: 'scripts/registrate.php',
			data: { 'login': $(".loginValue").val(), 'pass': $(".passValue").val() },
			success: function(data) {
				if (data) {   //true
					$(".message").css('display', 'inline');
					$(".message").html(data);
					if(data=="Registration ok") location.reload(true);
				}
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(xhr.status);
				alert(thrownError);
			} 
		});
	});
	$(".logout").click(function(){
		$.ajax({
			type: "POST",
			url: 'scripts/logout.php',
			success: function() {
				location.reload(true);
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(xhr.status);
				alert(thrownError);
			} 
		});
	});
});