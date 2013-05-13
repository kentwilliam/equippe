<?php

# DB setup
require_once("db.php");

function get_products_and_group_index() {
  $main_categories = array(
    1  => 'camera',
    5  => 'lenses',
    2  => 'light',
    19 => 'light_grip',
    3  => 'grip', # grip, stands and dolly
    40 => 'sound'
  ); 
  $products_query = '
    SELECT
      og.navn AS gruppe,
      og.id AS gruppe_id,
      g.navn AS undergruppe,
      g.id AS undergruppe_id,
      p.*
    FROM
      produkter p,
      produktgrupper g,
      produktgrupper og
    WHERE
      p.produktgruppeid = g.id AND 
      g.undergruppe_til = og.id AND 
      og.undergruppe_til = 0 
    ORDER BY 
      og.navn,
      g.navn,
      p.navn;
  ';
  $products_raw = fetch_result_array($products_query);
  
  # Organize results in hierarchy
  $products = array();
  $groups = array();
  foreach ($products_raw as $p) {

    # Ensure group and subgroup existence
    if (!array_key_exists($p['gruppe_id'], $products)) {
      $products[$p['gruppe_id']] = array();
      $groups[$p['gruppe_id']] = array('id' => $p['gruppe_id'], 'navn' => $p['gruppe']);
    }
    if (!array_key_exists($p['undergruppe_id'], $products[$p['gruppe_id']])) {
      $products[$p['gruppe_id']][$p['undergruppe_id']] = array();
      $groups[$p['undergruppe_id']] = array('id' => $p['undergruppe_id'], 'navn' => $p['undergruppe']);
    }

    # Prepare images
    # Thumb (category view) images prefer bilde2
    if ($p['bilde2']) 
      $category_image = get_link($p, 2, $p['bilde2']); 
    elseif ($p['bilde']) 
      $category_image = get_link($p, 1, $p['bilde']); 
    else 
      $category_image = "images/no_image.jpg";
    $p['category_image'] = $category_image;

    # Popup images prefer bilde1
    if ($p['bilde']) 
      $popup_image = get_link($p, 1, $p['bilde']); 
    elseif ($p['bilde2']) 
      $popup_image = get_link($p, 2, $p['bilde2']); 
    else 
      $popup_image = "images/no_image.jpg";
    $p['popup_image'] = $popup_image;

    $p['beskrivelse'] = str_replace('<p>&nbsp;</p>', '', $p['beskrivelse']);
    
    array_push($products[$p['gruppe_id']][$p['undergruppe_id']], $p);
  }

  return array('products' => $products, 'group_index' => $groups);
}

function get_link($product, $number, $extension) {
  return "files/produkter_" . $product['id'] . "_" . $number . "_normal." . ($number == 1 ? $product['bilde'] : $product['bilde' . $number]);
}

