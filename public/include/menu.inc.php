<div id=menu>
	
		<div id="cameralogo">
		<a href="<?php echo $this_name ?>"><img src="gfx/logo.png" alt="" border=0></a>
		</div>	

	<ul>
	<li><a href="#" onClick="showmenu('menu-camera')"><img src="gfx/menu-camera.png" border=0></a>
		<ul class=submenu id=menu-camera>
			<?php print_submenu(1,"camera"); ?>
		</ul>
	</li>
	<li><a href="#" onClick="showmenu('menu-light')"><img src="gfx/menu-light.png" border=0></a>
		<ul class=submenu id=menu-light border=0>
			<?php print_submenu(2,"light"); ?>
		</ul>
	</li>
	<li><a href="#" onClick="showmenu('menu-grip')"><img src="gfx/menu-grip.png" border=0></a>
		<ul class=submenu id=menu-grip border=0>
			<?php print_submenu(3,"grip"); ?>
		</ul>
	</li>
	</ul>



<div id=textmenu>

<ul>
	<?php print_textmenu(); ?>
</ul>

</div>

	
</div>
<?php if ($_REQUEST['v']) { ?>

<script type="text/javascript">
showmenu('menu-<?php echo $_REQUEST['v']; ?>');
</script>

<?php } ?>

