$(document).ready(function (){

	var create_post = $("#create_post");
	var mainContent = $("#mainContent");
	var postContainer = $("#postContainer");
	var i = 1;

	create_post.on("click", function(e){
			e.preventDefault();
						
			$.ajax(
			{
				url: " http://localhost/authentication/index.php/welcome/create",
				type: 'GET',
				dataType: "html",                            
				success: function(data) 
				{
								
					if(i< 2)
					{
					console.log(data);
					$('.posts').prepend(data);
					
					i=2;
					}
					$("#create_post_ajax").slideToggle(500);
				}
				
			})			
	})

	postContainer.on("click", '#submit_post', function(e){
		e.preventDefault();
		//slide up
		var create_data = { 
				title : $('#inputTitle').val(),
				contents  :$('#textarea').val()
				};

			$.ajax
			({
				url: "http://localhost/authentication/index.php/welcome/createPost",
				type: 'POST',
				dataType: "text",
				data: create_data,                            
				success: function(data) 
				{								
					console.log(data);
					$("#create_post_ajax").slideUp(500);
					$.fn.update_home();
				}				
			})	
		//reload content, slide down first child
	})

	/*setInterval(function() {
      console.log("hahaha");
	}, 2000);*/

	$("#chat_box").on("click", function(){
		$("#chat_box").removeClass("chat_box_closed");
		$("#chat_box").addClass("chat_box_open");

	})
}) //end

$.fn.update_home = function () {

	$.ajax
	({
		url : "http://localhost/authentication/index.php/welcome/refresh_home",
		type : "GET",
		dataType : "html",
		success : function(data)
		{
			console.log(data);
			$('#postContainer').prepend(data);
			$('#posts_ajax').slideDown(500);

		}
	})
}

