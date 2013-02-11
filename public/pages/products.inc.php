<div id="products">

<?php


$pg=$_REQUEST['i'];


$groupinfo=get_product_group($pg);

if ($groupinfo->beskrivelse) {

	echo "<div class=description>";
	echo $groupinfo->beskrivelse;
	echo "</div>";

}

?>

<ul class=list>

	<?php
	
	
	$result=mysql_query("SELECT * FROM produkter WHERE produktgruppeid=$pg ORDER BY navn");
	while ($row=mysql_fetch_object($result)) {

		if ($row->bilde2) {
			$bilde="files/produkter_".$row->id."_2_thumb.".$row->bilde2;		
		} elseif ($row->bilde) {
			$bilde="files/produkter_".$row->id."_1_thumb.".$row->bilde;
		} else {
			$bilde="gfx/thumb.png";
		}
	
		?>

	<li>

		<?php if ($bilde) { ?>
		<img src="<?php echo $bilde ?>" width=60 height=60 class=thumb/>
		<?php } else { ?>
		<img src="gfx/pixel.gif" width=60 height=60 class=thumb/>
		
		<?php } ?>
		<div style="float:right;width:670px;">

			<h4><a href="<?php echo $this_name ?>?view=product&p=<?php echo $row->id ?>&v=<?php echo $_REQUEST['v']; ?>"><?php echo $row->navn ?></a></h4>
			<p class="description"><?php echo $row->kort_beskrivelse ?></p>

		</div>
	
	</li>
		
		
		<?php
	}
	
	?>

</ul>

</div>
