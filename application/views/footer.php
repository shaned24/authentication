</div><!-- end of post container -->
<?php include('sideheading.php'); ?>
</div><!-- end of underheading -->
<div id="chat_bar">
	<div id="chat_box_closed"  class="chat_box_closed"></div>
	<div id="chat_box_open" style="display:none" class="chat_box_open">
		<div id="conversation" style="overflow:scroll"></div>

		<div id="conversation_input">
			<form id="conversation_form">
				<input id="conversation_message" type="text" placeholder="Write a message..." name="message"/>
			</form>
		</div>
	</div>
	
</div>
<div id="bottomLine"></div>
</div><!-- end of container -->

<script type="text/javascript">

$("document").ready(function(){
	
			
	$("#chat_box_closed").on("click", function(){
		$("#chat_box_closed").hide();
		$("#chat_box_open").show();
	})

	$("#conversation_form").on("submit" ,function(e){
			e.preventDefault();

			var form_data = {
				message : $("#conversation_message").val()
			};
			$('#conversation').append('<div class="im"><p>' + $("#conversation_message").val() + '</p></div>');
			
			$.ajax({

				url: 'http://localhost/authentication/index.php/profile/post_im/',
				type: 'POST',			
				dataType: 'html',
				data : form_data,
				success : function(data){
					console.log("Posted IM");
					console.log(data);
					$("#conversation_message").val("");
				}
			})
	})

	setInterval(function() {
      console.log("Getting messages");
      $.ajax({
				url: 'http://localhost/authentication/index.php/profile/get_im/',
				type: 'GET',			
				dataType: 'html',
				success : function(data){		
					$('#conversation').append(data);
					var str = $('#conversation').text()
					$("#conversation").scrollTop($("#conversation")[0].scrollHeight);
				}
			})

	}, 5000);

});

function scroll_to_bottom(){
                var objDiv = document.getElementById("divExample");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
</script>
</body>

</html>