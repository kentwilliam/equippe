<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
$version = 4;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Equippe - Utleie av digitale filmkamera, pl-optikk, lys, studio og annet filmutstyr til din produksjon.</title>
    <meta description="Equippe tilbyr filmutstyr, RED-kameraer, studio, grip og lys til din filmproduksjon. Equippe provides film equipment, RED cameras, studio, grip and lighting for your film production.">
    <meta keywords="Equipe, filmutstyr, redutleie, red, filmutstyrsutleie, kamerautleie, filmutstyrutleie, studioleie, studioutleie, filmkamera, grimstad, film, filmlys, griputleie, epic, dragon">
    <link rel="stylesheet" href="css/main.css?<?php echo $version ?>" type="text/css">
    <link rel="stylesheet" href="css/navigation.css?<?php echo $version ?>" type="text/css">
    <link rel="stylesheet" href="css/product.css?<?php echo $version ?>" type="text/css">
    <link rel="stylesheet" href="css/product_popups.css?<?php echo $version ?>" type="text/css">
    <link rel="stylesheet" href="css/blog_content.css?<?php echo $version ?>" type="text/css">
    <script src="js/jquery-1.9.1.js"></script>
  </head>

  <body>
    <div class="page_container home">

      <nav class="contact">
        <a class="about_us" href="/about">About Us</a>
        <a class="booking" href="mailto:booking@equippe.no">booking@equippe.no</a>
        <a class="phone" href="tel:+4794792068">+47 94 79 20 68</a>
        <a class="fb_link" href="https://www.facebook.com/EQUIPPE.no" target="_blank">Visit Our Facebook Page</a>
        <a class="paint_toggle"></a>
      </nav>

      <?php # Primary navigation ?>
      <nav class="primary">
        <div class="logo">
          <a class="menu_tile">Equippe</a>
        </div>
        <?php # Groups and subgroups ?>
        <?php foreach ($products as $group_id => $group) { ?>
          <div class="<?php echo to_snake_case($group_index[$group_id]['navn']); ?>">
            <a class="menu_tile" data-group-id="<?php echo $group_id ?>">
              <span><?php echo $group_index[$group_id]['navn']; ?></span>
            </a>
            <nav class="secondary">
              <?php foreach ($group as $subgroup_id => $subgroup) { ?>
                <a data-subgroup-id="<?php echo $subgroup_id ?>"><span><?php echo $group_index[$subgroup_id]['navn'] ?></span></a>
              <?php } ?>
            </nav>
          </div>
        <?php } ?>
        <div class="studio">
          <a class="menu_tile">
            <span>Studio &amp; Lab</span>
          </a>
        </div>
      </nav>

      <?php # All products detail popups ?>
      <div class="product_popups hidden">
        <?php foreach ($products as $group_id => $group) { ?>
          <?php foreach ($group as $subgroup_id => $subgroup) { ?>
            <?php foreach ($subgroup as $product) { ?>
              <div class="product_popup group<?php echo $group_id ?> subgroup<?php echo $subgroup_id ?>" id="<?php echo $product['id'] ?>">
                <div class="image" style="background-image: url(<?php echo $product['popup_image'] ?>)">
                  <img src="<?php echo $product['popup_image'] ?>">
                </div>
                <h2><?php echo $product['navn'] ?></h2>
                <div class="article">
                  <?php echo $product['beskrivelse'] ?>
                </div>
                <a class="close">&times;</a>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>

      <?php # All product links ?>
      <div class="products">
        <?php foreach ($products as $group_id => $group) { ?>
          <?php foreach ($group as $subgroup_id => $subgroup) { ?>
            <?php foreach ($subgroup as $product) { ?>
              <a class="product group<?php echo $group_id ?> subgroup<?php echo $subgroup_id ?>" data-product-id="<?php echo $product['id'] ?>">
                <div class="image" style="background-image: url(<?php echo $product['category_image'] ?>)">
                  <img src="<?php echo $product['category_image'] ?>">
                </div>
                <h3>
                  <?php echo $product['navn'] ?>
                </h3>  
              </a>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>

      <?php # Blog and other content ?>
      <div class="blog_content">
        <?php foreach ($articles as $article) { ?>
          <article id="article_<?php echo $article['id'] ?>">
            <h3><?php echo $article['tittel'] ?></h3>
            <div class="date"><?php echo(strftime("%A<br>%e. %B<br><strong>%Y</strong>", strtotime($article['dato']))); ?></div>
            <div class="content">
              <?php echo $article['tekst'] ?>
            </div>
          </article>
        <?php } ?> 
      </div>

    </div>

    <div id="lightbox"></div>

    <script src="js/script.js?<?php echo $version ?>"></script>

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-21553046-4']);
      _gaq.push(['_setDomainName', 'equippe.no']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
  </body>

</html>
