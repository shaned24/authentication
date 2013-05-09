<div id="im_users">
	<?php  foreach ($rows as $r) : ?>
		<li>
		<?php echo $r->first_name; echo " ";echo $r->last_name?>
		</li>
	<?php endforeach ?>
</div>