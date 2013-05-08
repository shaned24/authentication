
<div id="AJAXsettings" style="height:auto; width: 100%; height : 100%;padding:10px;">
	<h1 class="pageHeading"> Settings :</h1>

	<?php  foreach ($rows as $r) : ?>	
	<?php endforeach ?>


	<div class="settingsImgContainer" >
		<img class="settingsImg" src="http://localhost/authentication/application/img/<?php echo $r->userIMG;?>"/>
	</div>

	<div class="settingsName">
		<a><?php echo $r->first_name, " ",$r->last_name; ?></a>
	</div>

	<div class="buttons"></div>
	<div class="profilePhotoButtonPosition"></div>

		<table id="settingsTable">
			<tr>
				<td><li><?php echo anchor("profile/chooseOrUpload", 'Change profile pic','id="changeProfilePhoto" class="changeProfilePhoto"'); ?></li></td>
			</tr>
			<tr>
				<td><li><?php echo anchor("#", 'Change password','class="changeProfilePhoto"'); ?></li></td>
			</tr>
		</table>
	<?php if(isset($success))
			echo $success ;
	?>

</div>


