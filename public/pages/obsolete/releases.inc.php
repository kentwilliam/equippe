<div id="releasemenu">
<div id="releasecontent">

<?php

mysql_select_db("susannasonata");


$category=$_REQUEST['category'];
if (!$category) {
	$category="susannasonata";
}

$album=$_REQUEST['album'];

if ($album) {
	$query="SELECT * FROM diskografi WHERE id=$album";
} else {
	$query="SELECT * FROM diskografi WHERE kategori='$category' ORDER BY ar DESC limit 1";
}

$result=mysql_query($query);
$album=mysql_fetch_object($result);


$result=mysql_query("SELECT * FROM diskografi WHERE kategori='$category' ORDER BY ar DESC");

$antall=mysql_num_rows($result);



echo "<div id=productmenu class=flexcroll onMouseOver=\"document.getElementById('morealbums').style.visibility='hidden';\">";

if ($antall>4) {
	echo "<div id='morealbums' style='position:absolute;height:200px;width:45px;left:850px;'><img src='gfx/pil_hoyre.png'></div>";
}	

echo "<table><tr>";
while ($row=mysql_fetch_object($result)) {

	if ($album->id==$row->id) {
		$class1="albumcover2";
		$class2="albumcover2";
	} else {
		$class1="albumcover";
		$class2="albumcover2";	
	}
	
	$p++;

	echo "<td align=center class=albumlist><a href='/index.php?view=releases&album=$row->id&category=".urlencode($category)."&c=".$p."'><img onMouseOver=\"this.className='$class2'\"  onMouseOut=\"this.className='$class1'\" class=$class1 border=0 height=200 src='http://www.susannasonata.com/files/".$row->id."_thumb.".$row->plateomslag."'></a><br/>$row->platetittel</td>";
}
echo "</tr></table>";
echo "</div>";

$scroll_c=$_REQUEST['c'];

if ($scroll_c>4) {
	$scroll_pixels=$scroll_c*210;
	?>
	<script type="text/javascript">
	
	document.getElementById('productmenu').scrollLeft=<?php echo $scroll_pixels ?>;
	
	</script>
	<?php
}


?>



<div id=releasecategories>

<a href="index.php?view=releases&category=susannasonata">Released on SusannaSonata</a>
&nbsp;
&nbsp;
&nbsp;
<a href="index.php?view=releases&category=susannas+catalog">Susanna's Catalog</a>
&nbsp;
&nbsp;
&nbsp;
<a href="index.php?view=releases&category=collaborations">Collaborations</a>

</div>

</div>
</div>

<h1><?php echo $album->platetittel ?> - <?php echo $album->artist ?></h1><br/>
<?php echo "<img align=right border=0 src='http://www.susannasonata.com/files/".$album->id."_normal.".$album->plateomslag."'>"; ?>
<?php echo $album->label ?> <?php echo $album->ar ?><br/><br/>
<?php echo $album->info ?><br/><br/>
<?php

if ($album->spor) {
	echo "<h2>Tracklist:</h2>";
	echo $album->spor;
}	

if ($album->link_kjop) {
	echo "<a href='$album->link_kjop' target='_blank'>Buy album</a>";
}

?>