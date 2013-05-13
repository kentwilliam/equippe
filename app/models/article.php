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
    LIMIT 10';

  return fetch_result_array($articles_query);
}

