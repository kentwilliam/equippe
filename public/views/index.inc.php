<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <link rel="stylesheet" href="css/main.css">
  <script src="scripts/vendor/modernizr.min.js"></script>
</head>
<body class="home">
  <!--[if lt IE 7]><p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p><![endif]-->

  <div id="background"></div>

  <div class="container">

    <header>
      <a href="/"><h1>Equippe</h1></a>
      <h2>Film &amp; Media Production Solutions</h2>
      <span>Stavanger Grimstad Gøteborg Aarhus</span>
    </header>

    <div class="row">
      <div class="span6"><a href="">
        <img src="" alt=""></a></div>
      <div class="span3 brown"><a href="">
        <h3>Pakkeløsninger <span>til din produksjon</span></h3></a></div>
      <div class="span3 red"><a href="">
        <h3>Om Equippe <span>booking &amp; kontaktinfo</span></h3></a></div>
    </div>
    
    <div class="row">
      <div class="span12">
        <ol class="articles">
          <?php foreach ($articles as $article) { ?>
            <li> <a href="article.php?id=<?php echo $article['id'] ?>"> <h3><?php echo $article['lenketittel'] ?> <span>Les nå &raquo;</span></h3> </a> </li>
          <?php } ?>
        </ol>
      </div>
    </div>
    
    <div class="row">
      <div class="span2"> <a href=""> <img src=""> <h3>Lys &amp; rigg</h3> </a> </div>
      <div class="span2"> <a href=""> <img src=""> <h3>Linser</h3> </a> </div>
      <div class="span2"> <a href=""> <img src=""> <h3>Kamera</h3> </a> </div>
      <div class="span2"> <a href=""> <img src=""> <h3>Prosess</h3> </a> </div>
      <div class="span2"> <a href=""> <img src=""> <h3>Monitorer</h3> </a> </div>
      <div class="span2"> <a href=""> <img src=""> <h3>Grip</h3> </a> </div>
    </div>

  </div>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="scripts/vendor/jquery.min.js"><\/script>')</script>

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>
