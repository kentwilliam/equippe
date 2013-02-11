<h3>Bilder</h3>

<a href="index.php?side=bilder&form=edit" class=knapp>Nytt bilde</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="bilder";

$cfg[showfields][$utable]=array("navn","filnavn");
$cfg[hidefields][$utable]=array("id","albumid","filtype");


$cfg[type][$utable]['filnavn']="image";
$cfg[vname][$utable]['filnavn']="Bildefil";

$_POST['navn']=addslashes($_POST['navn']);

$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);

echo mysql_error();

?>
