<?

$sql = "SELECT tekst FROM $table WHERE id=1";
$result = mysql_query($sql);

$row = mysql_fetch_object($result);

$tekst = ppr($row->tekst);

?>
<h3>Rediger "Hovedsiden"</h3>

<form method="post" action="index.php">

<input type="hidden" name="side" value="redart_send">
<input type="hidden" name="id" value="1">
<input type="hidden" name="kategori" value="info">
<input type="hidden" name="tittel" value="hovedsiden">

Tekst:
<br>
<textarea cols=80 rows=25 name="tekst"><? echo $tekst ?></textarea>

<p>

<input type=submit value="Oppdater">

&nbsp;

<input type=reset value="Tilbakestill">

</form>

<p>
