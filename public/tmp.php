<?php

include("include/header.inc.php");
$this_name="index.php";

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
            username: "neilhimself",
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

	<div id=menu>
	
		<div id="cameralogo">
		<a href="<?php echo $this_name ?>"><img src="gfx/camera.png" alt="" border=0></a>
		</div>	

	
		<br/>
		
		Our online catalog is availble from April 1. 2012.
	
	
	</div>

	<div id="main">

	<a href="<?php echo $this_name ?>"><img src="gfx/equippe.png" alt="Equippe" border=0></a><br/>

	<div class=slogan>
	
	Your rental facility for film and media productions in the southmost part of Norway.
	
	</div>

	
	
	<div id="rightcol">

		<div class="tweetx"></div> 

	</div>

	<div id="container">
			<div id="example">
	
				<div id="slides">
					<div class="slides_container">
						<img src="gfx/scarlet.jpg" width="600" height="300" alt="Red Scarlet">
						<img src="gfx/epic.jpg" width="600" height="300" alt="Red Epic">
					</div>
					<!--
					<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
					<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
					-->
				</div>
				<img src="gfx/frame.png" width=608 height=308 alt="Frame" id="frame">


		</div>
	</div>

	<div id=footer>
	
	contact: <a href="mailto:booking@equippe.no">booking@equippe.no</a>
	
	</div>


	</div>

</div>





</body>


</html>
