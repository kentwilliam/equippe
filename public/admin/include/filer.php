<?php

$fdir="../files/";

if ($_FILES['userfile']['name']) {

	echo "hAR FIL";

	if (!ereg("(.php)",$_FILES['uploadedfile']['name'])) {

		$name=$_FILES['userfile']['name'];
		$name=str_replace(" ","_",$name);
		$name=strtolower($name);

		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $fdir.$name)) {
    		echo "The file ".  basename( $_FILES['userfile']['name']). 
   			 " has been uploaded";
		} else{
    		echo "There was an error uploading the file, please try again!";
		}

	} else {
		echo "Ugyldig filformat.";
	}
}

if ($delete && $confirm) {
	$delete=str_replace("/","",$delete);
	echo "Sletter <b>$delete</b>.";
	unlink($fdir.$delete);
} elseif ($delete) {
	?>
	<h3>Er du sikker på at du vil slette <?php echo $delete ?>?</h3>
	<b><a href="index.php?side=filer&confirm=1&delete=<?php echo $delete ?>">JA, slett fila</a></b>
	-
	<a href="index.php?side=filer">Nei, avbryt</a>
	<?php
}

?>
<h3>Ny fil</h3>

<form method=post action="index.php?side=filer" enctype="multipart/form-data">

Fil:
<input type="file" name="userfile" size=43>
<p>
<input type="submit" value="Last opp">

</form>

<h3>Opplastede filer</h3>

<table cellspacing=0 cellpadding=0 border=0 width=800>
<tr>
	<td class=list><b>Filnavn</b>
	<td class=list><b>Kode for å linke opp fila</b></td>
	<td class=list>&nbsp;</td>
</tr>
<?php

if (is_dir($fdir)) {
	if ($dh = opendir($fdir)) {
	while (($file = readdir($dh)) !== false) {
		if ($file != "." && $file != "..") {
			echo "<tr><td class=list><b>$file</b></td>";
			echo "<td class=list>&lt;a href='/files/$file'&gt;tekst for link&lt;/a&gt;</td>";
			echo "<td class=list align=right><a href='index.php?side=filer&delete=$file'>slett</a></td></tr>\n";
		}
	}
	closedir($dh);
	}
}

?>
