<?php

$view=$_REQUEST['view'];

if ($_REQUEST['k']==21) {
	$view="live";
	unset($_REQUEST['k']);
}
if ($_REQUEST['k']==24) {
	$view="releases";
	unset($_REQUEST['k']);
	
	$_REQUEST['category']="susannas catalog";
}

if ($_REQUEST['k'] OR $_REQUEST['t']) {
	$view="text";
} elseif (!$view) {
	$view="index";
}

if (file_exists("pages/".$view.".inc.php")) {
	include("pages/".$view.".inc.php");
}



?>