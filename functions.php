<?php 

 function getAllProducts() {

	$apiURL = "https://dev14.ageraehandel.se/sv/api/product";


	$result =file_get_contents($apiURL,0,null,null);


	return $result;

 }

	
 ?>