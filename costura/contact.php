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
        $_page = "contacto"; 
		@ (include ('header.php')) OR goToError(); 
	?>


	<div class="contact-page main grid-wrap">

		<header class="grid col-full">
			<hr>
			<p class="fleft">Contacto</p>
		</header>

		
		
		<aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">

			<p class="mbottom">Me encantar&iacute;a hablar contigo y responder a todas tus preguntas</p>
			
			<!-- address class="mbottom">
				<h5>DESIGNA studio </h5>
				3615 Fake Street <br >
				Level 5, Door 123 <br >
				1010 WHATEVER<br >
				<a href="http://maps.google.com">Get directions</a>
			</address-->
		
			<p class="mbottom">
				<h6>Mar&iacute;a del Mar: 635 54 97 05 </h6></p>
			<!-- p class="mbottom">
				<a href="#">costura@webdelagranja.com</a><br >
				<a href="#">Designa Studio on Facebook</a><br >
				<a href="#">@designstudio on Twitter</a><br >
				<a href="#">Designa Studio on Google+</a>
			</p>
			< p>
				<h6>Openning hours: </h6>
				Monday to Friday <br >
				09h00 to 17h00
			</p-->
		
		</aside>
		
		<section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
			<h2>Env&iacute;ame un mensaje</h2>
			<!-- p class="warning">Don't forget to put your own email address in the php file!</p-->
			
			<form id="contact_form" class="contact_form" action="sendemail.php" method="post" name="contact_form">	
				<ul>
					<li>
						<label for="name">Tu nombre:</label>
						<input type="text" name="name" id="name" required placeholder="Escribe tu nombre" class="required" >
					</li>
					<li>
						<label for="email">Email:</label>
						<input type="email" name="email" id="email" required placeholder="Escribe tu correo electr&oacute;nico" class="required email">
					</li>	
					<li>
						<label for="message">Mensaje:</label>
						<textarea name="message" id="message" cols="100" rows="6" required  class="required" ></textarea>
					</li>
					<li>
						<button type="submit" id="submit" name="submit" class="button fright">Enviar</button>
					</li>	
				</ul>			
			</form>
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
<script src="js/jquery.validate.min.js"></script>

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>