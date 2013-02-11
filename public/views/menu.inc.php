<?php include "include/header.inc.php" ?>

<ul id="sitemap">
  <li>
    <h2>Camera</h2>
    <?php print_submenu(1,"camera"); ?>
  </li>
  <li>
    <h2>Light</h2>
    <?php print_submenu(2,"light"); ?>
  </li>
  <li>
    <h2>Grip</h2>
    <?php print_submenu(3,"grip"); ?>
  </li>
</ul>

<?php /*if ($_REQUEST['v']) { ?>

<script type="text/javascript">
showmenu('menu-<?php echo $_REQUEST['v']; ?>');
</script>

<?php } */ ?>

