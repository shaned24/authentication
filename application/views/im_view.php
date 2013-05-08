<?php if (isset($rows)) foreach ($rows as $r) : ?>
<div class="im">
<p><?php echo $r->message;?></p>
</div>    
<?php endforeach; ?>