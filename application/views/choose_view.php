<div class="chooseContainer">
	<div id="chooseHeading" >
		<p id="chooseHeadingP">Select a new Profile Image</p>
	</div>

<div id="images-js" style="overflow:scroll; height:410px; float:left;" >
	<?php foreach ($rows as $r) :?>
	<div class="LayoutDivision" > 	
		<div class="picLayout">
			<li>
				<a  id="choosenImg" href="../profile/chooseImage/<?php echo $r;?>" >
					<img style="height : 100px;width 100px; float:left;" src="http://localhost/authentication/application/img/<?php echo $r;?>" />
				</a>
			</li>
		</div>
	</div>
<?php endforeach; ?>
</div>

</div>

