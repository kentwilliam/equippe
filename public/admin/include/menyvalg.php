<h3>Menyvalg</h3>

<a href="index.php?side=menyvalg&form=edit" class=knapp>Nytt menyvalg</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="menyvalg";

$cfg[showfields][$utable]=array("navn");
$cfg[hidefields][$utable]=array("id");

$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);


?>
