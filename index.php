<?php 

require 'functions.php';

?>

<!DOCTYPE html>
<html>
<body>

<h1>Produkter</h1>

<?php 

$products = getAllProducts(); 

foreach ($products as $product) {

	$nrOfProducts = count($product);

 	for($i = 0; $i <= $nrOfProducts; $i++) {
	
		echo 'Produktnamn: ' .  $product[$i]->artiklar_benamning . '&nbsp;';
		echo 'Pris: ' .  $product[$i]->pris .  '&nbsp;' . $product[$i]->valutor_id . '&nbsp;'; 
		if($product[$i]->flagga_lagerfor == true){
			echo 'Finns i lager';
		}else {
			echo 'Finns ej i Lager';
		}
		echo '<br />';
		echo '<br />';

	}
}
?>


</body>
</html>