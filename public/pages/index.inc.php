<div id="rightcol">

	<div class=box id=box1>
	
	<a href="mailto:booking@equippe.no"><img src="gfx/booking.png" class=heading border=0/></a>
	
	<p><a href="mailto:booking@equippe.no">booking@equippe.no</a></p>
	
	</div>

	<div class=box id=box2>
	
		<a href="http://equippe.no/<?php echo $this_name ?>?view=article&t=91"><img src="gfx/info.png" border=0 class=heading/></a>

		<p><a href="http://equippe.no/<?php echo $this_name ?>?view=article&t=91">about us, contact</a></p>
	
	</div>


	<div class="tweet"></div> 

	<div style="text-align:right;margin-top:5px;">
	<a target="_blank" href="https://twitter.com/#!/equippeno" style="margin-right:3px"><img src="gfx/twitter.png" border=0 alt="follow us on twitter"></a>
	<a target="_blank" href="https://www.facebook.com/EQUIPPE.no" style="margin-right:3px"><img src="gfx/facebook.png" border=0 alt="follow us on facebook"></a>
	</div>

</div>

<div id="container">
		<div id="example">

			<div id="slides">
				<div class="slides_container">
					<img src="gfx/slider/fant.jpg" width="600" height="300" alt="fant">
					<a href="http://Www.art-on-wires.org" target="_blank"><img src="gfx/slider/aow.jpg" width="600" height="300" alt="aow" border=0></a>
					<a href="http://equippe.no/index.php?view=product&p=3&v=camera"><img src="gfx/epic.jpg" width="600" height="300" alt="epic" border=0></a>
					<img src="gfx/slider/terje_vigen.jpg" width="600" height="300" alt="terje_vigen">
					<img src="gfx/slider/4Bank4.jpg" width="600" height="300" alt="4bank4">
				</div>
				<!--
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
				-->
			</div>
			<img src="gfx/frame.png" width=608 height=308 alt="Example Frame" id="frame">


	</div>
</div>


<div id=news>
<?php

print_news(25);

?>
</div>