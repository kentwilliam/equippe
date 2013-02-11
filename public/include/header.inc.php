<?php

require_once "../config/config.php";

mysql_connect("localhost",$_CONFIG['db_user'], $_CONFIG['db_password']);
mysql_select_db("equippe_temp");

$group_id=$_REQUEST['k'];
$text_id=$_REQUEST['vis'];

$cfg['news_group']=25;

if (!$group_id) $group_id=19;

if (!$text_id) {
	$result=mysql_query("SELECT a.* FROM artikler a, menyvalg m WHERE m.id='$group_id' AND a.kategori=m.id ORDER BY sortering LIMIT 1");
	$row=mysql_fetch_object($result);
	$text_id=$row->id;
}


if ($text_id) {

		if (!$text_id) $text_id=$_REQUEST[vis];
			
		$result=mysql_query("SELECT tittel FROM artikler WHERE id=".$text_id);
		$row=mysql_fetch_object($result);
		$page_title=$row->tittel;
		
		if ($group_id==19) {
			$page_title="";
		}
} else {

	$titles=array();

	if ($text_id) {
		$page_title=$titles[$text_id];
	}

}

function print_text($id,$title=0) {
	$result=mysql_query("SELECT * FROM artikler WHERE id=$id");

	$t=mysql_fetch_object($result);


	if ($title) {
		echo "<h1>".$t->tittel."</h1>";
	}
	echo "<p>".$t->tekst."</p>";

}

function get_product($id) {
	$result=mysql_query("SELECT * FROM produkter WHERE id=$id");
	return mysql_fetch_object($result);
}

function get_product_group($id) {

	$result=mysql_query("SELECT * FROM produktgrupper WHERE id=$id");
	
	echo mysql_error();
	
	return mysql_fetch_object($result);
}

function print_news($id) {
	global $cfg;
	$result=mysql_query("SELECT * FROM artikler WHERE kategori=$cfg[news_group] ORDER BY dato DESC,id DESC LIMIT 4");
	while ($t=mysql_fetch_object($result)) {
		echo "<div class=news>";
		echo "<div class=newshead>".$t->tittel."</div>";
		echo "<div class=newstext><i>"._convdate($t->dato)."</i><br/><br/>".$t->tekst."</div>";
		echo "</div>";
	}

}

function print_submenu($parentid,$section) {
	$result=mysql_query("SELECT * FROM produktgrupper WHERE undergruppe_til=$parentid ORDER BY id");
	while ($row=mysql_fetch_object($result)) {
		echo "<li><a href='?view=products&i=$row->id&v=$section'>".$row->navn."</a>";
		
		$res2=mysql_query("SELECT * FROM produktgrupper WHERE undergruppe_til=$row->id ORDER BY id");
				
		if (mysql_num_rows($res2)>0) {
			echo "<ul class=subsubmenu>";
			while ($row2=mysql_fetch_object($res2)) {
				echo "<li>";
				echo "<a href='?view=products&i=$row2->id&v=$section'>".$row2->navn."</a>";
				echo "</li>";
			}
			echo "</ul>";
		}
		
		echo "</li>";
	}
}

function print_textmenu() {
	$result=mysql_query("SELECT * FROM artikler WHERE kategori=26 ORDER BY id");

	
	while ($row=mysql_fetch_object($result)) {
		echo "<li><a href='?view=article&t=$row->id'>".$row->tittel."</a></li>";
	}
	
	
}

function print_live_dates($pf) {
	
	if ($pf=="future") {
		$where="dato > now()";
		$order_by="dato";
	} else {
		$where="dato <= now()";	
		$order_by="dato desc";
	}

	$result=mysql_query("SELECT * FROM konserter WHERE $where ORDER BY $order_by");
	while ($row=mysql_fetch_object($result)) {
		echo "<div class=livedate>"._convdate($row->dato)."</div>";
		echo "<div class=livehead><a href='index.php?view=live&id=$row->id'>".$row->tittel." at $row->sted</a></div>";
	}
}

function _convdate($date) {
	list($y,$m,$d)=explode("-",$date);
	return $d.".".$m.".".$y;
}

?>
