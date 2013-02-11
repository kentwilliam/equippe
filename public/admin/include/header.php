<?

$cfg['database']="equippe_temp";

mysql_connect("localhost","equippe_temp","equippe_temp");
mysql_select_db($cfg['database']);

include("include/functions.inc.php");
include("include/dbadmin.inc.php");
include("include/session.php");

$table="artikler";
$name="Equippe";

$cfg[imagedir]="/home/equippe/public_html/files/";
$cfg[imageurl]="/files/";

$cfg[image_thumb_size]=100;
$cfg[image_normal_size]=600;

$side=$_REQUEST['side'];
if ($_REQUEST['table']) $side=$_REQUEST['table'];


if (!isset($side))
	$side = "redart";

function ppr($text) {
	return trim(stripslashes(ereg_replace('"',"&quot;",$text)));
}

?>
