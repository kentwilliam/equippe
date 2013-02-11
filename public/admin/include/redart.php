<?

$id=$_REQUEST['id'];

if ($id) {

	$sql = "SELECT * FROM $table WHERE id=$id";
	$result = mysql_query($sql);

	$row = mysql_fetch_object($result);

	$tittel = ppr($row->tittel);
	$tekst = ppr($row->tekst);
	$forsidetekst = ppr($row->forsidetekst);
	$kategori = ppr($row->kategori);

}

?>
<h3>Rediger artikkel</h3>
<form method=post action="index.php?side=redart_send">
<input type=hidden name=id value=<? echo $id ?>>
<p>

Kategori:
<br>
<select name=kategori>
<?php
$result=mysql_query("SELECT * FROM menyvalg ORDER BY sortering");
while ($row=mysql_fetch_object($result)) {
	$sel="";
	if ($row->id==$kategori) $sel="selected";
	echo "<option value='$row->id' $sel>$row->navn</option>";
} ?>
</select>

<p>

Tittel:
<br>
<input type="text" name="tittel" size=43 value="<? echo $tittel ?>">

<p>

Forsidetekst (nyheter):
<br>
<input type=text name="forsidetekst" value="<? echo $forsidetekst ?>">

<p>

Tekst:
<br>
<textarea cols=100 rows=30 name="tekst"><? echo $tekst ?></textarea>

<p>

<input type=submit value="Lagre">


</form>

<p>
