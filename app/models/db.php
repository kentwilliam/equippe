<?php

# TODO: This is generally a bad idea for scaling performance
# Might be OK in this case because the site is low-traffic
$db_connection = mysql_connect(
  $_CONFIG['db']['host'], 
  $_CONFIG['db']['user_name'], 
  $_CONFIG['db']['password']
);
mysql_select_db($_CONFIG['db']['name']);

# Utility function
function fetch_result_array($query) {
  $raw_result = mysql_query($query);
  $results = array();
  while ($result = mysql_fetch_assoc($raw_result)) {
    array_push($results, $result);
  }
  return $results;
}


