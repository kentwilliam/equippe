<?

$id=$_REQUEST['id'];
$confirm=$_REQUEST['confirm'];

if (!isset($confirm)) {
	$result = mysql_query("SELECT tittel FROM $table WHERE id=$id");
	$row = mysql_fetch_object($result);
	$tittel = stripslashes($row->tittel);
	?>
	<form method=post action="?side=slettart&id=<? echo $id ?>">

	Er du sikker på at du vil slette "<? echo $tittel ?>"?

	<input type=hidden name=confirm value=1>
	<input type=submit value="Slett artikkel">

	</form>
	<?
} else {
	if ($id != "") {
		mysql_query("DELETE FROM $table WHERE id=$id");
		if (mysql_error() == "") {
			echo "Artikkelen er slettet.";
		} else {
			echo "En feil oppstod.<br>";
			echo mysql_error();
		}
	}



}
