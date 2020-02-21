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


function showAllProducts() {

echo '<section id="allProducts">
  <table id="productsTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Pris</th>
            <th>I Lager</th>
        </tr>
    </thead>
      <tbody>';
      	
$products = getAllProducts(); 
usort($products, "cmp");


foreach ($products as $key => $value) {

	$nrOfProducts = count($value);


 	for($i = 0; $i <= $nrOfProducts; $i++) {
	
	if($value[$i]["artiklar_benamning"]) {
   
		echo '<tr>';
		echo '<td>' . $value[$i]["artiklar_benamning"] . '</td>';
		echo '<td>' .  $value[$i]["pris"] .  ' ' . $value[$i]["valutor_id"] . '</td>'; 
		if($value[$i]["flagga_lagerfor"] == true){
			echo '<td>Ja</td>';
		}else {
			echo '<td>Nej</td>';
		}
		echo '</tr>';
		}
		else{

			$nrOfProducts--;
		}
		
	}
	
}
echo '
  </tbody>
    <tfoot>
        <tr>
            <th>Produkt</th>
            <th>Pris</th>
            <th>I Lager</th>
        </tr>
    </tfoot>
  </table>
  </section>';
}

	
 ?>