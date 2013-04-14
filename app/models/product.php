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
    if (!array_key_exists($p['gruppe_id'], $products)) {
      $products[$p['gruppe_id']] = array();
      $groups[$p['gruppe_id']] = array('id' => $p['gruppe_id'], 'navn' => $p['gruppe']);
    }
    if (!array_key_exists($p['undergruppe_id'], $products[$p['gruppe_id']])) {
      $products[$p['gruppe_id']][$p['undergruppe_id']] = array();
      $groups[$p['undergruppe_id']] = array('id' => $p['undergruppe_id'], 'navn' => $p['undergruppe']);
    }
    array_push($products[$p['gruppe_id']][$p['undergruppe_id']], $p);
  }

  return array('products' => $products, 'group_index' => $groups);
}

