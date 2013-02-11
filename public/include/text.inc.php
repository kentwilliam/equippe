<?php

// henter ut teksten.
// om vi ikke har noe tekst henter vi ut ørste tekst i menygruppa

/*
$text_id=$_REQUEST['t'];

if ($text_id) {
	$result=mysql_query("SELECT * FROM artikler WHERE id=$text_id");	
} else {

	$group_id=$_REQUEST['k'];
	$result=mysql_query("SELECT a.* FROM artikler a, menyvalg m WHERE m.id='$group_id' AND a.kategori=m.id ORDER BY sortering LIMIT 1");
}

$text=mysql_fetch_object($result);

*/
?>
<div id="text">

<h1><?php echo $text->tittel ?></h1>

<?php echo $text->tekst; ?>



</div>