<?php

session_start();


if ($_REQUEST['brukernavn'] && $_REQUEST['passord']) {

	$brukernavn=$_REQUEST['brukernavn'];
	$passord=$_REQUEST['passord'];

	$query="SELECT * FROM brukere WHERE brukernavn='$brukernavn' AND passord='$passord'";


	$result=mysql_query($query);

	if (mysql_num_rows($result)>0) {


		$row=mysql_fetch_object($result);
		$_SESSION['user']=$row->id;
	
	} else {
	
		$_SESSION['user']="";
		
	}

}

if ($_SESSION['user']) {

	$query="SELECT * FROM brukere WHERE id=".$_SESSION['user'];
	$result=mysql_query($query);
	
	$userinfo=mysql_fetch_array($result);

}


if ($_REQUEST['loggut']) {
	$_SESSION['user']="";
	$userinfo=array();
}

?>