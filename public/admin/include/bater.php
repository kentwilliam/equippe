<h3>B&aring;ter</h3>

<a href="index.php?side=bater&form=edit" class=knapp>Ny b&aring;t</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="bater";

$cfg[showfields][$utable]=array("navn");
$cfg[hidefields][$utable]=array("id");

$cfg[type][$utable]['les_mer']="textarea";
$cfg[type][$utable]['introduksjon']="textarea";
$cfg[type][$utable]['tekniske_spesifikasjoner']="textarea";


$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);


?>
