<?php 

require 'functions.php';

?>

<!DOCTYPE html>
<html>
<body>

<h1>Produkter</h1>

<?php 

$products = getAllProducts(); 
usort($products, "cmp");


foreach ($products as $key => $value) {
//$nrOfProducts = count($key);
	$nrOfProducts = count($value);


 	for($i = 0; $i <= $nrOfProducts; $i++) {
	
	if($value[$i]["artiklar_benamning"]) {
    
	
		echo 'Produktnamn: ' .  $value[$i]["artiklar_benamning"] . '&nbsp;';
		echo 'Pris: ' .  $value[$i]["pris"] .  '&nbsp;' . $value[$i]["valutor_id"] . '&nbsp;'; 
		if($value[$i]["flagga_lagerfor"] == true){
			echo 'Finns i lager';
		}else {
			echo 'Finns ej i Lager';
		}
		echo '<br />';
		echo '<br />';
		}
		else{

			$nrOfProducts--;
		}
	}
	echo $nrOfProducts;
}
?>


</body>
</html>