

<table style="border: solid 1px;">
	<?php
	//foreach ($rows as $r) : 
		for($i=2;$i<count($rows);$i++)
		{
		 	$urows[]= $rows[$i];		
		}		
	?>

    <?php foreach ($urows as $r) :?> 	
		<tr>
	        <td> <?php echo $r; ?></td>
	        <td><img style="height : 100px;width 100px; float:left;" src="http://localhost/authentication/application/img/<?php echo $r;?>" />
    	</td>
	<?php endforeach; ?>
</table>