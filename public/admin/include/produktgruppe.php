<h3>Produktgruppe</h3>

<a href="index.php?side=produktgrupper&form=edit" class=knapp>Ny produktgruppe</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="produktgrupper";

$cfg[showfields][$utable]=array("navn");
$cfg[hidefields][$utable]=array("id");

$cfg[type][$utable]['produktgruppeid']="linked";
$cfg[link][$utable]['produktgruppeid']="produktgrupper";

$_POST['navn']=addslashes($_POST['navn']);
$_POST['beskrivelse']=addslashes($_POST['beskrivelse']);

$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);

echo mysql_error();

?>
