<?php require 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags and styles needed for datatables-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" crossorigin="anonymous"	>

    <!-- Projectspecific css style-->
    <link rel="stylesheet" type="text/css" href="Resources/style.css" >

 <title>Mina Produkter</title>
</head>

<body class="bg-light">
	<div id="page-wrap">
		<header>
	  		<!-- Main navigation and top bar -->
	  		<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">

	  			<!-- Logo text-->
	    		<a class="navbar-brand  mr-auto mr-lg-0" href="#">Mina Produkter</a>
	    		
	    		<!-- Settings for lower sizes devices menu-->
	    		<button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	      			<span class="navbar-toggler-icon"></span>
	    		</button>
	    		
	    		<div class="collapse navbar-collapse" id="navbarCollapse">
	      			<!-- Main menu items -->
	      			<ul class="navbar-nav mr-auto">
	       				<li class="nav-item">
	          				<a class="nav-link" href="index.php?page=start">Startsida</a>
	        			</li>
	          			<li class="nav-item active">
	          				<a class="nav-link" href="index.php?page=categories">Kategorier <span class="sr-only">(current)</span></a>
	        			</li>
	      			</ul>     
	    		
	    		</div>
	  		</nav>
		</header>
		 <!-- Check if on the categories page or on any specific category page. If true show categories menu  -->
		<?php if(isset($_GET['category']) || $_GET['page'] == "categories") { ?>
		<div class="nav-scroller bg-white shadow-sm">
		  <nav class="nav nav-underline">
		    <a class="nav-link" href="index.php?page=categories">Alla Produkter</a>
		    <?php getCategoriesMenu(); ?>
		    
		    <a class="nav-link" href="index.php?category=none">Ingen Kategori</a>
		  </nav>
		</div>
		<?php }?>  <!--End if of categories menu -->

		<!-- Begin page content -->
		<main role="main" class="flex-shrink-0">
		  <div class="container">
		  	<section id="main-content">
				
				<?php 
				//Add category if there are any to variable and see if its set.
				$category = $_GET['category'];

				if(isset($category)) {

					//If set trigger function to show products table for specific category
		    		//showCategory($category);
					showProducts($category);
		    	//If category is not set. See instead if page is set.	
				}else if(isset($_GET['page'])){
					
					// Inner If checking if startpage is chosen. Show that content
					if($_GET['page'] == "start"){
						echo '<h1>Mina Produkter</h1>';
						echo '<p>Hej och välkommen till min lilla produktlista. Kolla gärna runt och se om du hittar något.</p>';

					}else{
						//inner if checking if page is not start. Trigger Show all products function
						showProducts(null);

					}

				}
				else{

					//if not a specific category. Trigger showallproducts
					showProducts(null);
				}

				 ?>
		  	
		  
		  

		</main>

		<!-- Footer content-->
		<footer class="footer mt-auto py-3">
		  <div class="container">
		    <span class="text-muted">cpuweb 2020</span>
		  </div>
		</footer>

<!--Adds script needded for the page-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"  crossorigin="anonymous"></script>	
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"  crossorigin="anonymous"></script>

<!-- Initiating tables and setting it to responsive so that it works on all sizes. Also translating the table to swedish -->
<script>
		$('#productsTable').DataTable( {
    		"responsive": true,
   			"language": {
            	"lengthMenu": "Visar _MENU_ rader per sida",
            	"zeroRecords": "Inga rader",
            	 "info": "Visar _END_ av _TOTAL_ produkter",
            	"infoEmpty": "Inga rader tillgängliga",
            	"infoFiltered": "(filtrerade från _MAX_ totala rader)",
            	"search": "Sök",
            	"paginate": {
        			"first":      "Första",
        			"last":       "Sista",
        			"next":       "Nästa",
        			"previous":   "Tidigare"
    },
        	}
			 });

      	</script>

</div>
</body>
</html>


  
       
  
