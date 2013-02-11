<?


# Forbred input for database

#$tittel = addslashes(trim($_REQUEST[tittel]));
#$tekst = addslashes(trim($tekst));

# Sjekk input
if (!$tittel) {
	$error .= "Tittel feltet må fylles ut<br>\n";
}


# Legg til info
if (!isset($error)) {
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
	<b>Artikkelen er lagt til.</b>
	<p>
	: <a href="index.php?side=nyartikkel">Legg til ny artikkel</a><br>
	: <a href="index.php?side=redart&id=<? echo $id ?>">Rediger denne artikkelen</a><br>
	: <a href="index.php?side=listartikler">Rediger andre artikler</a>
<?
}
?>
