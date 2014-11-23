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


	<div class="work-page main grid-wrap">

		<header class="grid col-full">
			<hr>
			<p class="fleft">Trabajos</p>
		</header>


<?php
	@(include('../bbdd.php')) or die ("bbdd.php no incluido");

	if (!isset ($_GET['r']))
		die("???");
		
	$nameDir=array(1=> "vestidos",2 => "disfraces",3 => "otros");
		
	$query  = "select idCostura, nombre, nombre_imagen, tipo, descripcion, comentarios FROM costura where idCostura=".$_GET['r'];


	//echo $query ."<br>";

	$result=mysql_query($query);
	while (($line=mysql_fetch_array ($result))!=null)
	{	
?>


		<aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">

<?php 
        if (strlen($line['descripcion'])>0){
?>		

		<h6>Detalles</h6>
		<p class="mbottom">
				<?php echo nl2br(utf8_decode($line['descripcion']))?>
		</p>
<?php 
        }
        
        if (strlen($line['comentarios'])>0){
?>		
		<h6>Comentarios</h6>
		<blockquote><?php echo nl2br(utf8_decode($line['comentarios']))?></blockquote>
		
<?php   }?>		
		
	</aside>
	
		<section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
	
		<figure class="">
			<a href="#" >
			<img src="img/<?php echo $nameDir[$line['tipo']]?>/<?php echo $line['nombre_imagen']?>" alt="<?php echo $line['nombre']?>" >
			</a>
			<figcaption>
				<p><?php echo utf8_decode($line['nombre'])?></p>
			</figcaption>
		</figure>
		
	
		</section>	
		
<?php }?>		
		
		
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