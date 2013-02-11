<?php

// denne fila lister alle bildene i filmappa

include("include/header.php");



$result=mysql_query("SELECT * FROM bilder ORDER BY navn");

echo "var tinyMCEImageList = new Array(\n";


	// Open a known directory, and proceed to read its contents
	while ($row=mysql_fetch_object($result)) {

			if ($notfirst) echo ",\n";

			$file1=$row->id."_thumb.".$row->filnavn;
			$file2=$row->id."_normal.".$row->filnavn;
			$file3=$row->id."_original.".$row->filnavn;

			echo "[\"$row->navn (lite)\", \"/files/$file1\"],";
			echo "[\"$row->navn (middels)\", \"/files/$file2\"],";
			echo "[\"$row->navn (stort)\", \"/files/$file3\"]";

			$notfirst=1;

	}			


echo ");";

?>