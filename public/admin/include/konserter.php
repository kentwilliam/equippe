<h3>Konserter</h3>

<a href="index.php?side=konserter&form=edit" class=knapp>Ny konsert</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="konserter";

$cfg[showfields][$utable]=array("dato","tittel","sted");
$cfg[hidefields][$utable]=array("id");

$cfg[type][$utable]['informasjon']="textarea";
$cfg[type][$utable]['dato']="date";

$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);


?>
