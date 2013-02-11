<h3>Produkter</h3>

<a href="index.php?side=produkter&form=edit" class=knapp>Nytt produkt</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="produkter";

$cfg[showfields][$utable]=array("navn");
$cfg[hidefields][$utable]=array("id");

$cfg[type][$utable]['beskrivelse']="textarea";

$cfg[type][$utable]['bilde']="image";
$cfg[type][$utable]['bilde2']="image";
$cfg[type][$utable]['bilde3']="image";

$cfg['vname'][$utable]['bilde2']="Thumbnail (kvadratisk)";



$cfg[type][$utable]['produktark']="file";

$cfg[type][$utable]['produktgruppeid']="linked";
$cfg[link][$utable]['produktgruppeid']="produktgrupper";
$cfg[namefield]["produktgrupper"]="navn";

$cfg['vname'][$utable]['produktgruppeid']="Produktgruppe";

$cfg[size][$utable]['beskrivelse']="rows=30";

$cfg['filefield']="produktark";

$_POST['navn']=addslashes($_POST['navn']);
$_POST['beskrivelse']=addslashes($_POST['beskrivelse']);

$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);

echo mysql_error();

?>
