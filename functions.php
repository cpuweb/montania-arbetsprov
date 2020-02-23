<?php 

//Get products from api
 function getAllProducts() {

	$apiURL = "https://dev14.ageraehandel.se/sv/api/product";


	$result = file_get_contents($apiURL,0,null,null);

	//Decode to json array
	$result = json_decode($result, TRUE); 

	

	return $result;

 }

//Help function for usort. Sortin productnames
 function cmpProductNames($a, $b) {
    return strcmp($a->artiklar_benamning, $b->artiklar_benamning);
}

//Help function for usort. Sortin productnames
 function cmpCategories($a, $b) {
    return strcmp($a, $b);
}

//Get all category names
function getAllCategories() {

	$products = getAllProducts(); 

	foreach ($products as $key => $value) {

		$nrOfProducts = count($value);

		for($i = 0; $i <= $nrOfProducts; $i++) {
	
			$categoryNames[$i] = $value[$i]["artikelkategorier_id"];

		}

	}	

	return $categoryNames;
}

//Show product data fpr a specific category. Takes input from get variable
function showProducts($category) {

	//Writes out top part of table
	echo '
	<section id="specificCategory">
  		<table id="productsTable" class="table table-striped table-bordered" style="width:100%">
    	<thead>
        	<tr>
            	<th>Produkt</th>
			    <th>Pris</th>
			    <th>Kategori</th>
			    <th>I Lager</th>
        	</tr>
    	</thead>
      	<tbody>';
    //Get all products an sort alpabetical by name  	
	$products = getAllProducts(); 
	usort($products, "cmpProductNames");

	//Going over all products and write them out
	foreach ($products as $key => $value) {

		$nrOfProducts = count($value);


	 	for($i = 0; $i <= $nrOfProducts; $i++) {
	 	if($category) {
			//Checking if there are a name for the product and a category
			if($value[$i]["artiklar_benamning"] == true  && $category == $value[$i]["artikelkategorier_id"] ) {
		   		
				echo '<tr>';
				echo '<td>' . $value[$i]["artiklar_benamning"] . '</td>';
				echo '<td>' .  $value[$i]["pris"] .  ' ' . $value[$i]["valutor_id"] . '</td>'; 
				echo '<td>' . $value[$i]["artikelkategorier_id"] . '</td>';
					if($value[$i]["flagga_lagerfor"] == true){
						echo '<td>Ja</td>';
					}else {
						echo '<td>Nej</td>';
					}
					echo '</tr>';

					//Checking if there are a name for the product and category is none
					}else if ($value[$i]["artiklar_benamning"] == true && $category == "none") {
						
						//If category variable is none show products with no category
						if($value[$i]["artikelkategorier_id"] == null){
							echo '<tr>';
							echo '<td>' . $value[$i]["artiklar_benamning"] . '</td>';
							echo '<td>' .  $value[$i]["pris"] .  ' ' . $value[$i]["valutor_id"] . '</td>'; 
							echo '<td>' . $value[$i]["artikelkategorier_id"] . '</td>';
							if($value[$i]["flagga_lagerfor"] == true){
								echo '<td>Ja</td>';
							}else {
								echo '<td>Nej</td>';
							}
							echo '</tr>';
							}
				}

			// If not a specific category or no category. Write out all products. Called by null instead of a category
			}else{

				if($value[$i]["artiklar_benamning"]) {
	   
					echo '<tr>';
					echo '<td>' . $value[$i]["artiklar_benamning"] . '</td>';
					echo '<td>' .  $value[$i]["pris"] .  ' ' . $value[$i]["valutor_id"] . '</td>'; 
					echo '<td>' . $value[$i]["artikelkategorier_id"] . '</td>';
					if($value[$i]["flagga_lagerfor"] == true){
						echo '<td>Ja</td>';
					}else {
						echo '<td>Nej</td>';
					}
					echo '</tr>';
				}
		}

		}

	}
		
	//Writes out bottom part of table
	echo '
	  </tbody>
	  <tfoot>
	        <tr>
	            <th>Produkt</th>
	            <th>Pris</th>
	            <th>Kategori</th>
	            <th>I Lager</th>
	        </tr>
	    </tfoot>
	  </table>
	  </section>';

}

function getCategoriesMenu(){
	//Writes out all categories to menu 
	$categories = getAllCategories();
	$categories = array_unique($categories);

	//Sorting categories alphabetical
	usort($categories, "cmpCategories");
	foreach ($categories as $category) {

		//Make lowercase
		$output_txt = strtolower($category);

		//Checking so category variable is not empty
		if($category){
			//Making output text first letter capitalized
		    echo '<a class="nav-link" href="index.php?category=' . $category . '">'. ucfirst($output_txt) . '</a>';

		}
	}
}

 ?>