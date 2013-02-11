<h3>Diskografi</h3>

<a href="index.php?side=diskografi&form=edit" class=knapp>Ny plate</a>

<br/>
<br/>

<?php

$id=$_REQUEST[id];

$utable="diskografi";

$cfg[showfields][$utable]=array("platetittel","artist","kategori");
$cfg[hidefields][$utable]=array("id");

$cfg[type][$utable]['info']="textarea";
$cfg[type][$utable]['spor']="textarea";
$cfg[type][$utable]['plateomslag']="image";

$cfg[type][$utable]['kategori']="selectlist";
$cfg[options][$utable]['kategori']=array("susannasonata","susannas catalog","collaborations");

$_POST['info']=addslashes($_POST['info']);
$_POST['spor']=addslashes($_POST['spor']);
$_POST['platetittel']=addslashes($_POST['platetittel']);
$_POST['artist']=addslashes($_POST['artist']);

$dbadmin = new simple_db_admin;
$dbadmin->draw($cfg['database'],$utable,$cfg);

echo mysql_error();

?>
