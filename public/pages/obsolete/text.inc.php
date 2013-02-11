<div id="text">
<?php

// er det en eller flere tekster i gruppa?

if ($_REQUEST['k']) {

	$result=mysql_query("SELECT * FROM artikler WHERE kategori=".$_REQUEST['k']." ORDER BY id DESC");


	if (mysql_num_rows($result)==1) {
		$text_id=mysql_result($result,0,"id");
	} else {

		$r=mysql_query("SELECT * FROM menyvalg WHERE id=".$_REQUEST['k']);
		$menyvalg=mysql_result($r,0,"navn");
		
		echo "<h1>".$menyvalg."</h1>";
		echo "<br/><br/>";

		
		while ($t=mysql_fetch_object($result)) {


			if ($_REQUEST['k']== 19) echo "<div class=newsdate>"._convdate($t->dato)."</div>";
			echo "<div class=articlehead><a href='index.php?t=$t->id'>".$t->tittel."</a></div>";
			if ($t->forsidetekst) {
				echo "<div class=articletext>$t->forsidetekst</div>";			
			} else {
				echo "<div class=aarticletext>&nbsp;</div>";
			}
			echo "<br/>";


			unset($text_id);
		
		}




	}
	
}

if ($_REQUEST['t']) {
	$text_id=$_REQUEST['t'];
}

if ($text_id) {

	print_text($text_id,1);

}




?>
</div>