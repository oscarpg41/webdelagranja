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
        $_page = "works"; 
		@ (include ('header.php')) OR goToError(); 
	?>

	<div class="works-page main grid-wrap">

		<header class="grid col-full">
			<hr>
			<p class="fleft">Trabajos</p>
		</header>


		<aside class="grid col-one-quarter mq2-col-full">
			<p class="mbottom">Una peque&ntilde;a muestra de algunos mis "trabajos".</p>
			<menu>
				<a  id="work_all" class="arrow buttonactive">Todos</a><br>
				<a  id="work_1" class="arrow">Vestidos</a><br>
				<a  id="work_2" class="arrow">Disfraces</a><br>
				<a  id="work_3" class="arrow">Otros</a>
			</menu>
		</aside>
		
		<section class="grid col-three-quarters mq2-col-full">
		
			<div class="grid-wrap works">
		
<?php
	@(include('../bbdd.php')) or die ("bbdd.php no incluido"); 

	$nameDir=array(1=> "vestidos",2 => "disfraces",3 => "otros");
	
	$query  = "select idCostura, nombre, nombre_imagen, tipo FROM costura";
	//echo $query ."<br>";

	
	$result=mysql_query($query);
	while (($line=mysql_fetch_array ($result))!=null)
	{	
?>
				<figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_<?php echo $line['tipo']?>">
					<a href="work1.php?r=<?php echo $line['idCostura']?>" >
						<img src="img/<?php echo $nameDir[$line['tipo']]?>/<?php echo $line['nombre_imagen']?>" alt="<?php echo $line['nombre']?>" >
					<span class="zoom"></span>
					</a>
					<figcaption>
						<a href="work1.php?r=<?php echo $line['idCostura']?>" class="arrow"><?php echo utf8_decode($line['nombre'])?></a>
						<!-- p>Lorem ipsum dolor set amet</p-->
					</figcaption>
				</figure>         
         
<?php }?>

		
			</div> <!-- grid inside 3/4-->
		
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