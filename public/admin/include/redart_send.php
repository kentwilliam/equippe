<?php

$id=$_REQUEST['id'];
$tittel=addslashes($_REQUEST['tittel']);
$tekst=addslashes($_POST['tekst']);
$forsidetekst=addslashes($_POST['forsidetekst']);
$kategori=$_REQUEST['kategori'];

# Forbred input for database

if (!$tittel) {
	$error .= "Du må fylle ut 'tittel' feltet<br>\n";
}

# Legg til info
if (!isset($error)) {


	if ($id) {


		$sql = "UPDATE $table SET tittel='$tittel', tekst='$tekst',forsidetekst='$forsidetekst', kategori='$kategori' WHERE id=$id";
		mysql_query($sql);
		if (mysql_error() != "") {
			$mysql_error = mysql_error();
			$error = "En feil har oppstått: " . $mysql_error . "<br>\n";
		}

	
	} else {


		$dato = date("Y-m-d");
		$sql = "INSERT INTO $table (tittel,tekst,forsidetekst,kategori,dato) values('$tittel','$tekst','$forsidetekst','$kategori','$dato')";
		mysql_query($sql);

		echo mysql_error();
	
		$id = mysql_insert_id();
		if (mysql_error() != "") {
			$mysql_error = mysql_error();
			$error = "En feil har oppstått: " . $mysql_error . "<br>\n";
		}
	}
}

# Print resultat
if (isset($error)) {
?>

<b>Feil har oppstått:</b><p>
<? echo $error ?>

<p>

<a href="javascript:history.go(-1)">Gå tilbake</a>

<?
} else {
?>
	<b>Artikkelen er oppdatert.</b>
	<p>
	: <a href="index.php?side=listartikler">Rediger annen artikkel</a>
<?
}
?>
