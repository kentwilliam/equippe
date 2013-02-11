<div style="background:#555;color:white;padding:10px;">

	<?php
	// print neste søndagsgolf
	print_text(35);
	?>
</div>



<?php

if ($vis=="resultater") {

	if ($_REQUEST['t']==3) {
	
	} else {

	?>
	<!--<a href='index.php'>Siste runde</a><br/>
	<a href='index.php?rankings=1&class=1'>Topplister</a><br/>-->

	<!--<H4>Seriemesterskap</H4>
	<br>
	<br>-->
	<br/>
	<b>Open - Topp 5</b>
	<br>
	<br/>
	<?php print_rankings($tournament,1,5); ?>
	<br/>
	<a href='index.php?vis=resultater&rankings=1&class=1&t=<?php echo $tournament ?>'>Se hele listen</a>
	<br/>
	<br/>
	<b>Dame - Topp 5</b>
	<br>
	<br>
	<?php print_rankings($tournament,2,5); ?><br>
	<a href='index.php?vis=resultater&rankings=1&class=2&t=<?php echo $tournament ?>'>Se hele listen</a>

	<br/>
	<br/>
	<br/>

	<?php
	$pot=get_current_ace_pot($tournament);
	if ($pot>0) {
	?>
	<h4>Ace-pot: <?php echo $pot ?>,-</h4>
	<?php } ?>
	<br/>
	<br/>

	<h4>Tidligere runder</h4>
	<br/>
	<?php
	$result=mysql_query("SELECT * FROM frisbee_tournament_rounds WHERE tournament_id=$tournament AND publish_scores=1 ORDER BY tournament_date desc");
	while ($row=mysql_fetch_object($result)) {
		echo "<li><a href='?t=$tournament&vis=resultater&dato=$row->tournament_date'>".convdate($row->tournament_date)."</a></li>";
	}

	}


} elseif ($_REQUEST['vis']==36 || $_REQUEST['vis']==37) {?>
	
	<br/>
	<br/>
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FOslo-Presidents-Cup%2F124784850917710&amp;width=250&amp;colorscheme=dark&amp;connections=10&amp;stream=false&amp;header=false&amp;height=255" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:255px;" allowTransparency="true"></iframe>
	
	<?php
} else {
	?>
	
	<br/>
	
	<div style="background:#555;color:white;padding:10px;text-align:center">

	<a href='http://www.sunesport.no/'><img src="files/sunesport.png" alt="Sune Sport" border=0 width=200></a>
	
	</div>

	
	<br/>

	<div style="background:#555;color:white;padding:10px;" align=center>
	<div style="text-align:left">

	<?php
	// print terminlista
	print_text(34);
	?>

	</div>
	
	</div>
	</div>

	<!--<img src="gfx/SuneSportOrange.jpg">-->
	
	<?php
}


?>