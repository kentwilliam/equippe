<h3>Diskografi</h3>

<a href="index.php?side=bater&form=edit" class=knapp>Ny plate</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="diskografi";

$cfg[showfields][$utable]=array("navn");
$cfg[hidefields][$utable]=array("id");

$cfg[type][$utable]['info']="textarea";
$cfg[type][$utable]['spor']="textarea";


$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);


?>
