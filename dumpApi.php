<?php 

require 'functions.php';

$result = getAllProducts();


$apiresponse = var_dump(json_decode($result, false)); 

//echo $apiresponse;

echo $apiresponse;

?>