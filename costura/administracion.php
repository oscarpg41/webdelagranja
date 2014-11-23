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
	
	<script type="text/javascript" SRC="../js/funciones.js"></script>
	
</head>

<body>
<!-- Prompt IE 7 users to install Chrome Frame -->
<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<?php
  $dir = '';
  if(isset($_GET["dir"]))
      $dir = $_GET["dir"] .".php";   
  else    
      $dir = "adm_vestidos.php";    
  //echo $dir;       
  
 @(include('../bbdd.php')) or die ("bbdd.php no incluido");      
?>   	


<body class="admin">
<div class="container">
	<header id="navtop">
		<a href="administracion.php" class="logo fleft">
			<img src="img/logo.jpg" alt="Costura y confección en La Granja" style="padding-right: 10px">
		</a>
		<h3>Costura y confecci&oacute;n en La Granja</h3>
		<h4>Administraci&oacute;n</h4>
		
	</header>
	
	

	<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
	<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" align="center">
	<TR>
   		<TD width="1" valign="top" style="padding: 4px;">
					<?php @(include ($dir)); ?>
   		</TD>   
	</TR>
	</TABLE>
	</div>
</div>	
</body>
</html>


