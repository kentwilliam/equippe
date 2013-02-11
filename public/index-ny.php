<?php

include("include/header.inc.php");
$this_name="index-ny.php";

?>
<html>

<head>

	<title>Equippe</title>

	<link rel="stylesheet" href="site.css" media="all"/>
	<link href="css/jquery.tweet.css" media="all" rel="stylesheet" type="text/css"/> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
	<script src="js/slides.min.jquery.js"></script>
	<script src="js/jquery.tweet.js"></script>
	<script src="js/functions.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
		
		jQuery(function($){
        $(".tweet").tweet({
            username: "equippeno",
            join_text: "auto",
            avatar_size: 32,
            count: 3,
            auto_join_text_default: "we said,",
            auto_join_text_ed: "we",
            auto_join_text_ing: "we were",
            auto_join_text_reply: "we replied to",
            auto_join_text_url: "we were checking out",
            loading_text: "loading tweets..."
        });
    });
		
	</script>
	

</head>

<body>



<div id="content">

	<?php include("include/menu.inc.php"); ?>

	<div id="main">

	<a href="<?php echo $this_name ?>"><img src="gfx/equippeno.png" alt="Equippe" border=0></a><br/>

	<div class=slogan>
	
	Your rental facility for film and media productions in the southmost part of Norway.
	
	</div>

	
	
	<?php
		include("include/content.inc.php");
	?>

	</div>

</div>





</body>


</html>
