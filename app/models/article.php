<?php

# DB setup
require_once("db.php");

function get_articles() {
  $articles_query = '
    SELECT 
      a.* 
    FROM 
      artikler a
    ORDER BY
      dato DESC
    LIMIT 1000';

  $articles_raw = fetch_result_array($articles_query);

  #$articles = array();
  foreach ($articles_raw as $i => $article) {
    #print_r($articles_raw[$i]);
    $articles_raw[$i]['tekst'] = str_replace('<p>&nbsp;</p>', '', $article['tekst']);
  }

  return $articles_raw;
}

