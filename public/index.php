<?php

include('include/header.inc.php');

$image_carousel = array(

);

$about_us = db_fetch("SELECT * FROM artikler WHERE id = 91 LIMIT 1");

$skip_ids = array(91);

$articles = db_fetch("SELECT * FROM artikler WHERE id NOT IN (" . implode(',', $skip_ids) . ") ORDER BY dato LIMIT 0, 10");
foreach ($articles as &$a) {
  #debug($a['forsidetekst'] != null . "\n");
  #debug(strlen($a['forsidetekst']) . "\n");
  if ($a['forsidetekst'] != null && strlen($a['forsidetekst']) > 0)
    $a['lenketittel'] = $a['forsidetekst'];
  else
    $a['lenketittel'] = $a['tittel'];
}

#print_r($articles);

$product_categories = array(
  'camera'   => 1,
  'light'    => 2,
  'grip'     => 3,
  'monitors' => 34,
  'matte'    => 14,
  'misc'     => 27
);

include('views/index.inc.php');

/*

Hva trenger vi her i fremtiden:

- en produktkategorivisning med underkategorier, fint animert in og stilfullt fargelagt
- en artikkelvisning som er tilsvarende
-> spesial-produktkategori: 'produktpakker' som gjør det enklere å booke
- finne ut hva man gjør med gallerivisningen













*/

#include('views/menu.inc.php');


#include("include/header.inc.php");

#include("include/menu.inc.php");
#include("include/content.inc.php");

