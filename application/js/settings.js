$(document).ready(function()
{
	var settingsDropdown = $("#settingsDropdown"),
	settingsBox = $("#settingsBox"),
	settingsButton = $("#settingsButton"),
	fadeDiv = $("#fadeDiv"),
	loadedContent = $("#loadedContent");
	
	//--------------------------------------------------------------------------------##
	settingsButton.on("click",function(e)
	{
		e.preventDefault(); 
		settingsDropdown.fadeToggle(500);
		$.fn.getSettings();
		    		
	}); //end of clicking settings button
	//--------------------------------------------------------------------------------##
	$("#closeSettings").on("click" , function()
	{
		$("#settingsDropdown").fadeOut(300);
		return false;
	});

	//-----button that fades in the fade div to black out the website main background##
	
	$('body').on("click", '#changeProfilePhoto' , function(e)
	{
		
		e.preventDefault();
		
			$.ajax(
			{
				url: " http://localhost/authentication/index.php/profile/chooseOrUpload",
				type: 'GET',
				dataType: "html",                             
				success: function(data) 
				{     
					console.log(data); 
					loadedContent.html(data); 
					fadeDiv.fadeIn(500);
					
						loadedContent.slideDown(300 , function()
						{
							loadedContent.animate(
							{
								width: "145px",
								
								height: "170px",
								opacity: "1"
							},600)
						});
					
					console.log("open true"); 
				}
			})
		

	});
	//---------------------------------------------------------------------------##
	//closes
	/*$(fadeDiv).on('click', '#closeLoadedContent',function(e)
	{
		console.log(closeLoadedContent);
		e.preventDefault();
		fadeDiv.fadeOut(500);
	})*/

	

	$(fadeDiv).mouseup(function (e)
	{
    	if (loadedContent.has(e.target).length === 0)
    	{
        fadeDiv.fadeOut(500);
        
    	}
});


	

	//--------------------getting the images to load on the page-------------------##

	$(fadeDiv).on("click", 'a#chooseImg' , function(e){
		console.log("aye aye");

		e.preventDefault();
		$("#chooseOrUpload").fadeOut(200,function(){
			loadedContent.animate(
			{
				width: "700px",
				//margin: "100px auto auto auto",
				height: "480px"
			},1000,function(){
				//get images and load then with an ajax call
				$.fn.getImg();
			});			
		})
	})

	//-------------when user clicks on the image to be their profile picture-----##
	$(fadeDiv).on("click", "#choosenImg", function(e){
		e.preventDefault();

		var imgNum = $(this).attr("href"),
		split = imgNum.split('/');
		console.log(split[3]);
		//-----function call------###
		$.fn.setImg(split);

		$.fn.getSettings();
	});	

	//----------------when user clicks on upload image button--------------------##
	$(fadeDiv).on("click", '#uploadImg' , function(e)
	{
		e.preventDefault();

		$.ajax(
		{
			url: " http://localhost/authentication/index.php/profile/uploadImg",
			type: 'GET',
			dataType: "html",                            
			success: function(data) 
			{
				$("#chooseOrUpload").fadeOut(200,function(){
					loadedContent.animate(
					{
						width: "300px",
						//margin: "100px auto auto auto",
						height: "100px"
					},1000,function(){
						//get images and load then with an ajax call
						loadedContent.append(data);
					})
				})		
			}
		})
	})
	//-------------------uploading a file----------------------------------------##


	$(fadeDiv).on("submit", '#upload_file', function(e) {
		e.preventDefault();
	
		$.ajaxFileUpload({
        	url          :'http://localhost/authentication/index.php/profile/do_upload/', 
         	secureuri    :false,
         	fileElementId:'userfile',
         	dataType     : 'json',
         	/*data       : {
            'title'      : $('#title').val()
         },*/
        	success  : function (data, status)
        {
         		console.log(data.msg, data.status);
            	if(data.status != 'error')
            	{
              		//alert(data.msg);
              		loadedContent.html(data.msg);
              		//$.fn.getSettings();
              		//fadeDiv.fadeOut(500);

            	}
            	else
            	{
           	 	alert(data.msg);
        		console.log("no really, couldn't upload it");
        		}
         	}
      	});

	})
});//end of document.ready


//---------------------------------------------------------------------------------------------------------###
//					functions					   											
//---------------------------------------------------------------------------------------------------------###
	$.fn.setImg = function(split){
		var fadeDiv = $("#fadeDiv");
		$.ajax(
		{
			url: " http://localhost/authentication/index.php/profile/chooseImage",
			type: 'POST',
			dataType: "text",           
			data: 'q='+split[3],                  
			success: function(data) 
			{
				$(fadeDiv).fadeOut(300);
			}
		})
	       // return false;
	}


	$.fn.getImg = function (){
		var loadedContent = $("#loadedContent");
	   	$.ajax(
	   	{
	   		url: "http://localhost/authentication/index.php/profile/displayImage",
	   		type: 'GET',
	   		dataType: "html",                             
	   		success: function(data) 
	   		{     	

	   			loadedContent.html(data);
	   			$('#images-js').hide();
	   			$('#images-js').fadeIn(1000);
	   			
	   			console.log("Getting Images"); 
	   		} 
	   	}) 		

   }

   $.fn.getSettings = function(){

   	var settingsBox = $("#settingsBox");
   	$.ajax(
			{
				url: " http://localhost/authentication/index.php/profile/settings",
				type: 'GET',
				dataType: "html",                             
				success: function(data) 
				{     
					settingsBox.html(data);
					console.log("Open Settings"); 					    
				}
			})
   }
//---------------------------------------------------------------------------------------------------------###
//					end of functions			                                                           
//---------------------------------------------------------------------------------------------------------###