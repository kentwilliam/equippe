<?php

include("include/header.php");


?>
<html>

<head>
	<title><?php echo $name ?> - Admin</title>

<style type="text/css">
	body {
		margin:0px;
		font-size:9pt;
		font-family: arial,helvetica,sans-serif;
		background:#ecede9;
		color:black;
	}
	#header {
		background:#ecede9;
		border-bottom:1px #444 solid;
		height:125px;
		widh:100%;
	}
	#login {
		margin-top:50px;
		margin-left:50px;
		background:#ecede9;
		border:1px #444 solid;
		padding:10px;
		color:black;
	}
	h3 {
		font-size:12pt;
		color:#black;
		margin-top:5px;
		border-bottom:1px #444 solid;
	}
	td {
		font-size:10pt;
		font-family: arial,helvetica,sans-serif;
		color:black;
	}
	a { color:black; }
	a:hover { color:black; }
	
	.menu a { 
		color:#000;
		display:block;
		padding:3px;
		background:#ddd;
		border:1px #ccc solid;
		margin-bottom:2px;
		text-decoration:none;
	}
	
	a.knapp { 
		color:#000;
		padding:3px;
		background:#ecede9;
		border:1px #444 solid;
		margin-bottom:2px;
		text-decoration:none;
	}
	
	.menu a:visited { color:#000; background:#ecede9; }
	.menu a:hover { color:#000; background:#ddd; }
	.menu { font-size:12px; }

	table.list {
		width:750px;
	}
	th.list {
		border-bottom:1px #333 solid;
		font-size:10pt;
		font-weight:bold;
		text-align:left;
	}

	td.list {
		background-color:rgba(0,0,0,.1);
		padding:4px;
		font-size:9pt;
	}
	td.listx {
		padding:4px;
		font-size:9pt;
	}
	td.list a {
		color:black;
		text-decoration:none;		
	}
	td.listx a {
		text-decoration:none;		
	}
	input.text {
		background:#ddd;
		border:1px #555 solid;
		color:black;
		font-size:9pt;
		padding:1px;
		width:450px;
	}
	input {
		background:#ddd;
		color:black;
		border:1px #555 solid;
		font-size:9pt;
		padding:1px;
	}
	textarea {
		background:#ddd;
		color:black;
		border:1px #555 solid;
	}
	select {
		background:#ddd;
		color:black;
		border:1px #555 solid;
		font-size:9pt;
		padding:1px;
	}

</style>


<!-- tinyMCE -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "/susanna.css",

		// Drop lists for link/image/media/template dialogs
		//template_external_list_url : "lists/template_list.js",
		//external_link_list_url : "lists/link_list.js",
		external_image_list_url : "imagelist.php",
		//media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /tinyMCE -->


</head>

<body>

<div id="header">

<div style="float:left;width:300px;margin-top:20px;margin-left:20px;">
<img src="/gfx/equippe.png">
</div>

<div style="float:right;margin-top:95px;width:200px;margin-right:20px;text-align:right">
	<a href='index.php?loggut=1'>Logg ut</a>
</div>
</div>


<?php if ($_SESSION['user']) { ?>
<table width="1000" cellspacing="10" cellpadding="0" border="0">
<tr>
	<td width="200" class="menu" valign=top>

	<A href="index.php?side=listartikler">Artikler</A>
	<A href="index.php?side=redart">Ny artikkel</A>
	<A href="index.php?side=produkter">Produkter</A>
	<A href="index.php?side=produktgrupper">Produktgrupper</A>
	<!--<A href="index.php?side=menyvalg">Menyvalg</A>-->
	<A href="index.php?side=bilder">Bilder</A>

	</td>
	<td valign=top style="border:1px #444 solid">
	<table cellspacing="0" cellpadding="5" border="0">
	<tr>
		<td valign=top align=left>
		<?php 
		
		if (file_exists("include/".$side.".php")) {
			include("include/".$side.".php"); 
		}
			
		?>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<?php } else { ?>

<div align=center>

<form method=post action="index.php">
<table id=login cellspacing=0 cellpadding=5 border=0>
<tr>
<td>Brukernavn</td><td><input type=text class=formtext name="brukernavn"></td>
</tr>
<tr>
<td>Passord</td><td><input type=password class=formtext name="passord"></td>
</tr>
<tr>
<td colspan=2 align=right><input type=submit value="Logg inn" class=formbutton></td>
</tr>
</table>
</form>

</div>

<?php } ?>
</body>

</html>
