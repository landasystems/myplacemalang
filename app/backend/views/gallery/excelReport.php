<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      image		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      gallery_category_id		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->image; ?>
		</td>
       		<td>
			<?php echo $row->description; ?>
		</td>
       		<td>
			<?php echo $row->gallery_category_id; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
