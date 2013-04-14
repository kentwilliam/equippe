<?php

function pp($str) {
  echo "<pre>";
  print_r($str);
  echo "</pre>";
}

function get_view($str) {
  return "../app/views/$str.php";
}

function to_snake_case($str) {
  return strtolower( preg_replace("/[^A-Za-z_]/", "", preg_replace("/\s+/", "\_", $str) ) );
}

function strip_whitespace($str) {
  return preg_replace('~>\s+<~', '><', $str);  
}
#preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )