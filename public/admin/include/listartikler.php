<h3>Finn eksisterende artikler</h3>
<p>

<p>
<?

	$message = "De 20 siste";
	$sql = "SELECT a.tittel,a.id,a.kategori,b.navn as menyvalg FROM $table a "
		. " LEFT JOIN menyvalg b on (a.kategori = b.id) "
		. "ORDER BY b.sortering, a.id ";

$result = mysql_query($sql);

echo "<table cellspacing=0 cellpadding=3 border=0 width='800'>";
//echo "<tr><th class=list style='text-align:left'>Tittel</th><th colspan=2 class=list>&nbsp;</th>";


for ($n=0;$n<mysql_num_rows($result);$n++) {
	$row = mysql_fetch_object($result);
	$tittel = stripslashes($row->tittel);
	$id = $row->id;
	$menyvalg=$row->menyvalg;
	if ($menyvalg != $forrige_menyvalg) {
		echo "<tr><th  style='text-align:left' colspan=3 class=list>$menyvalg</th></tr>";
	}
	$forrige_menyvalg=$menyvalg;
	?>


	<tr>
		<td class=list><a href="index.php?side=redart&id=<? echo $id ?>"><? echo $tittel ?></a></td>
		<td class=list width=50><a href="index.php?side=redart&id=<? echo $id ?>">Rediger</a></td>
		<td class=list width=50><a href="index.php?side=slettart&id=<? echo $id ?>" class=list width=50>Slett</a></td>
	</tr>
	<?
}

echo "</table>";

?>
