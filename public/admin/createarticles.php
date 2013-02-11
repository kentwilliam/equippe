<?php

include("include/header.php");

mysql_query("INSERT INTO $table (id,tittel,kategori) values(1,'hovedsiden','info')");
mysql_query("INSERT INTO $table (id,tittel,kategori) values(2,'omklubben','info')");


?>