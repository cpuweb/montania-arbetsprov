<?php 

 function getAllProducts() {

	$apiURL = "https://dev14.ageraehandel.se/sv/api/product";


	$result = file_get_contents($apiURL,0,null,null);

	$result = json_decode($result, TRUE); 

	

	return $result;

 }

 function cmp($a, $b) {
    return strcmp($a->artiklar_benamning, $b->artiklar_benamning);
}



function getAllCategories() {

	$products = getAllProducts(); 

	foreach ($products as $product) {

		$nrOfProducts = count($product);

		for($i = 0; $i <= $nrOfProducts; $i++) {
	
			$categoryNames[$i] = $product[$i]->artikelkategorier_id;

		}

	}	

	return $categoryNames;
}

function getProductsByCategory() {


}

function getNrOfProducts() {

	$products = getAllProducts(); 
	
	foreach ($products as $product) {

		$nrOfProducts = count($product);

	}

	return $nrOfProducts;
}


	
 ?>