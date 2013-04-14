<?php

require_once "../config/config.php";
require_once "../app/models/product.php";
require_once "../app/helpers/helpers.php";

# Fetch data to be presented in the view
$data = get_products_and_group_index();
$products = $data['products'];
$group_index = $data['group_index'];

include get_view('index');


