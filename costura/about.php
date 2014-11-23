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
        $_page = "about"; 
		@ (include ('header.php')) OR goToError(); 
	?>

	<div class="about-page main grid-wrap">

		<header class="grid col-full">
		<hr>
			<p class="fleft">&iquest;Quien soy&#63;</p>
		</header>

		
		
		<aside class="grid col-one-quarter mq2-col-full">
			<p class="mbottom">Hola, me llamo Mar&iacute;a del Mar. <br>Soy de La Granja y vivo en La Granja.</p>
		</aside>
		
		<section class="grid col-three-quarters mq2-col-full">
			<img src="img/team.jpg" alt="" >
			
			<article id="navteam">
			<h2>&nbsp;</h2>
			<p>
				Empec&eacute; a coser con un curso de corte y confecci&oacute;n hace ya m&aacute;s de 20 a&ntilde;os.<br>
				Y desde entonces se puede decir que no he parado de coser y de hacer mis propias creaciones.<br>
				He confeccionado vestidos para m&iacute;, para mis amigas, para mi hija, trajes de tuno para mi hermano, cazadoras vaqueras,
				disfraces de todo tipo...
			</p>
			<p>		
				Y c&oacute;mo no, tambi&eacute;n he retocado vestidos, "cogido" el bajo de pantalones, "cogido" las mangas de chaquetas, he cambiado cremalleras....<br>
				es decir, los arreglos y ajustes m&aacute;s comunes que se dan en nuestros vestidos y trajes.
			</p>
			<p>
				Si necesitas retocar cualquier prenda, y no te ves con mucha habilidad, puedes contar con mi experiencia.<br>
				Si necesitas un vestido a medida, un disfraz para el Mercado Barroco, habla conmigo y veremos que se puede hacer.
			</p>
			</article>
			
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