<?php 

require 'functions.php';

$products = getAllProducts();

$products = json_decode($products, FALSE); 

foreach ($products as $product) {

	$nrOfProducts = count($product);

	for($i = 0; $i <= $nrOfProducts; $i++) {
	
	echo $product[$i]->artiklar_enhet . '<br />';

	}

	echo '<br />';
	echo $nrOfProducts;
}


?>