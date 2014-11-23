<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="UTF-8">
	
	<!-- Remove this line if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width">
	
	<meta name="description" content="Corte y Confecci&oacute;n en La granja">
	<meta name="author" content="Sylvain Lafitte, sylvainlafitte.com. Adaptado por Webdelagranja.com">
	
	<title>Costura, Corte y Confecci&oacute;n en La Granja de San Ildefonso</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/png" href="favicon.png">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">

	<?php
        $_page = "home"; 
		@ (include ('header.php')) OR goToError(); 
	?>




<div class="home-page main">
	<section class="grid-wrap" >
		<header class="grid col-full">
			<hr>
			<p class="fleft">Home</p>
		</header>
		
		<div class="grid col-one-half mq2-col-full">
			<h1>Costura y confecci&oacute;n</h1>
			<p>
				<b>Confecci&oacute;n de vestidos y prendas de vestir</b><br>
				
				Creamos las prendas en base a tu gusto y necesidad. Comp&aacute;rte tus ideas para 
			    elaborar la prenda que necesitas, ya sea para una ocasi&oacute;n especial como para su
			    uso diario.
			</p>
			
			<p>
				<b>Arreglos</b><br>
				Todo tipo de arreglos y ajustes que te permitiran volver a usar tu prenda.<br>
 			   	Todos aquellos peque&ntilde;os trabajos como son botones, broches,  cierres, dobladillos, ajuste de cintura, 
 			   	ajustes de mangas, descosidos, etc	
			</p>
			
			<p>
				<b>Disfraces</b><br>
				El disfraz que necesites, ya sea para carnavales, para el Mercado Barroco<br>
				o para cualquier otro evento.
			</p>
			
		</div>
			
	
		 <div class="slider grid col-one-half mq2-col-full">
		   <div class="flexslider">
		     <div class="slides">
		       <div class="slide">
		           	<figure>
		                 <img src="img/img2.jpg" alt="">
		                 <figcaption>
		                 	<!-- div>
		                 	<h5>Caption 1</h5>
		                 	<p>Lorem ipsum dolor set amet, lorem, <a href="#">link text</a></p>
		                 	</div-->
		                 </figcaption>
		            </figure>
		       </div>
		           
		       <div class="slide">
		             <figure>
		                     <img src="img/img.jpg" alt="">
		                     <figcaption>
		                     	<!-- div>
		                     	<h5></h5>
		                     	<p>Puedes traer tus propias telas</p>
		                     	</div-->
		                     </figcaption>
		             </figure>
		       </div>
		     </div> <!-- slides -->
		   </div> <!-- flexslider -->
		 </div>
		
		 </section>
	


	</div> <!--main-->

<div class="divide-top">

	<?php @ (include ('footer.php')) OR goToError();?>

</div>

</div>

<!-- Javascript - jQuery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>

<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr.js"></script>
<![endif]-->

<script src="js/jquery.flexslider-min.js"></script>
<script src="js/scripts.js"></script>

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>