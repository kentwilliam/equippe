<!DOCTYPE html>
<html>
  <head>
    <link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/navigation.css" type="text/css">
    <link rel="stylesheet" href="css/product.css" type="text/css">
    <link rel="stylesheet" href="css/product_popups.css" type="text/css">
    <link rel="stylesheet" href="css/blog_content.css" type="text/css">
    <script src="js/jquery-1.9.1.js"></script>
  </head>

  <body>

    <div class="page_container home">

      <nav class="contact">
        <a href="REPLACEME">Contact us</a>
        <a href="mailto:booking@equippe.no">booking@equippe.no</a>
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
      </nav>

      <?php # All products detail popups ?>
      <div class="product_popups hidden">
        <?php foreach ($products as $group_id => $group) { ?>
          <?php foreach ($group as $subgroup_id => $subgroup) { ?>
            <?php foreach ($subgroup as $product) { ?>
              <div class="product_popup group<?php echo $group_id ?> subgroup<?php echo $subgroup_id ?>" id="<?php echo $product['id'] ?>">
                <div class="image">
                  <img src="<?php if ($product['bilde2'] != null && $product['bilde2'] != 'jpg') echo $product['bilde2']; else echo "http://www.technoezine.com/wp-content/uploads/HLIC/44bba2f1c2c25ad4f2a74f88c9b645da.jpg" ?>">
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
                <div class="content">
                  <div class="image">
                    <img src="<?php if ($product['bilde2'] != null && $product['bilde2'] != 'jpg') echo $product['bilde2']; else echo "http://www.technoezine.com/wp-content/uploads/HLIC/44bba2f1c2c25ad4f2a74f88c9b645da.jpg" ?>">
                  </div>
                </div>  
                <?php echo $product['navn'] ?>
              </a>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>

      <?php # Blog and other content ?>
      <div class="blog_content">
        Ferske og spennende artikler om siste nytt fra Equippe HQ
      </div>

    </div>


    <script src="js/script.js"></script>
  </body>

</html>
