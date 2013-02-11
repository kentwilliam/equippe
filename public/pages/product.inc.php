<?php

$id=$_REQUEST['p'];

if ($id) {
	$product=get_product($id);
} else {
	echo "no product specified";
}

?>

<div id=product>

<?php if ($product->bilde) { ?>

<div class=frame>
<img src="/files/produkter_<?php echo $product->id ?>_1_normal.<?php echo $product->bilde ?>" border=0>
</div>

<?php } ?>

<?php

if ($product->produktark) {
	echo "<div style='float:right;width:300px;text-align:right;margin-right:20px;margin-top:10px;'><a href='/files/".$product->produktark."'>Download product sheet</a></div>";
}

?>

<h1><?php echo $product->navn; ?></h1>

<div class=text>
	<?php echo $product->beskrivelse; ?>
</div>


</div>