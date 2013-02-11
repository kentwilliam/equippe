<?php

$id=$_REQUEST['id'];
if ($id) {
	$where="where id=$id";
}
$result=mysql_query("SELECT * FROM konserter $where");

$live=mysql_fetch_object($result);

?>


<?php if ($id) { ?>
<h1><?php echo $live->tittel ?> at <?php echo $live->sted ?></h1><br/>
Date: <?php echo _convdate($live->dato) ?><br/>

<?php echo $live->info ?>

<?php } else { ?>


<br/>

<h1>upcoming live dates</h1>

<br/>

<?php print_live_dates("future"); ?>

<br/>
<br/>
<br/>

<h1>previous live dates</h1>

<br/>

<?php print_live_dates("past"); ?>

<?php } ?>