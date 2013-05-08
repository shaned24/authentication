<div id="uploadImage">
<?php// echo form_open_multipart('profile/do_upload');?>
<form method="post" action="" id="upload_file">
<div style="background:grey; width: 300px; height: 30px; margin: auto;">
<input style="margin:auto; "type="file" id="userfile" name="userfile" size="20" />
</div>
<br />

<input type="submit" value="upload" />

</form>
<?php echo $error;?>
</div>