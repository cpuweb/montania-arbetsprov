<?php 

require 'functions.php';

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="Resources/style.css">

 <title>Mina Produkter</title>
</head>

<body>
   <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Mina Produkter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      
    </div>
  </nav>
</header>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
  <h2>Listan</h2>	
  <?php 

$products = getAllProducts(); 
usort($products, "cmp");


foreach ($products as $key => $value) {
//$nrOfProducts = count($key);
	$nrOfProducts = count($value);


 	for($i = 0; $i <= $nrOfProducts; $i++) {
	
	if($value[$i]["artiklar_benamning"]) {
    
	
		echo '<p>Produktnamn: ' .  $value[$i]["artiklar_benamning"] . '&nbsp;';
		echo 'Pris: ' .  $value[$i]["pris"] .  '&nbsp;' . $value[$i]["valutor_id"] . '&nbsp;'; 
		if($value[$i]["flagga_lagerfor"] == true){
			echo 'Finns i lager';
		}else {
			echo 'Finns ej i Lager';
		}
		echo '</p>';
		}
		else{

			$nrOfProducts--;
		}
	}
	echo $nrOfProducts;
}
?>

  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">cpuweb 2020</span>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>