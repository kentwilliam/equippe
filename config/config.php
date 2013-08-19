<?php

error_reporting(E_ALL);

date_default_timezone_set('Europe/Oslo');

setlocale(LC_ALL, 'no_NO');

$_CONFIG = array(
  "db" => array(
    "host"       => "localhost",
    "name"       => "equippe_temp",
    "user_name"  => "equippe_temp",
    "password"   => "equippe_temp"
  )
  /*
  "db" => array(
    "host"       => "localhost",
    "name"       => "equippe",
    "user_name"  => "equippe",
    "password"   => "equippe!"
  )
  */
);