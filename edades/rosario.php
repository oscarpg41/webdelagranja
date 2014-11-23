<html>
<head>
<title>Las Edades del Hombre | La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur </title>
<META name="verify-v1" content="7vDs3B9sxvwrXL0929HFifbH5sSod5C6Tb0NzIA8L6c=" />
<meta name="title" content="La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur">
<meta name="DC.Title" content="La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur">
<meta http-equiv="title" content="La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur">
<meta name="DC.Creator" content="www.altas-buscadores.com">
<meta name="keywords" content="Segovia La Granja Real Sitio San Ildefonso Jardines y Palacio Real de La Granja de San Ildefonso Valsaín Fundación Centro Nacional de Vidrio Fotos Imagenes CENEAM">
<meta http-equiv="keywords" content"Segovia La Granja Real Sitio San Ildefonso Jardines y Palacio Real de La Granja de San Ildefonso Valsaín Fundación Centro Nacional de Vidrio Fotos Imagenes CENEAM">
<meta name="description" content="La Granja de San Ildefonso. Pagina no oficial de un pequeño pueblo de la provincia de Segovia, a los pies de la Sierra de Guadarrama">
<meta http-equiv="description" content="La Granja de San Ildefonso. Pagina no oficial de un pequeño pueblo de la provincia de Segovia, a los pies de la Sierra de Guadarrama">
<meta http-equiv="DC.Description" content="La Granja de San Ildefonso. Pagina no oficial de un pequeño pueblo de la provincia de Segovia, a los pies de la Sierra de Guadarrama">
<meta name="author" content="Oscar Pérez Gómez">
<meta name="DC.Creator" content="Oscar Pérez Gómez">
<meta name="vw96.objectype" content="Homepage">
<meta name="resource-type" content="Homepage">
<meta http-equiv="Content-Type" content="ISO-8859-1">
<meta name="distribution" content="all">
<meta name="robots" content="all">
<meta name="revisit" content="30 days">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php @(include('../base.php')) OR goToError();?>  
<link rel="stylesheet" href="css/lagranja.css" type="text/css"></link>
<script language="javascript" type="text/javascript" SRC="js/funciones.js"></script>
<script language="javascript" src="js/ajax.js"></script>

</head>

<?php @(include('../funciones.php')) OR goToError();?>  

<body>
<script>
 function cambio_pieza(x)
 {
 	   replacedivcontents ("detalle_edades", "edades/pieza_get.php?select_pieza="+x);
 }
</script>
<?php @(include('../cabecera_monumentos.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

  <!------------------------>
<div id="titulo1">:: La Granja presente en Las Edades del Hombre. "El Árbol de la Vida". Año 2003</div>


<?php @(include('menu_edades.php')) OR goToError();?>  


<div id="titulo_h3">:: Piezas de la Parroquia Ntra. Sra. del Rosario (El Cristo)"</div>


<div id="texto_main">
	<div id="piezas_edades">
		<div class="text2Bold">Piezas<br></div>
		  <li><a href="javascript:{cambio_pieza(10)}" class="link1">Virgen de la Soledad</a></li>
		  <li><a href="javascript:{cambio_pieza(11)}" class="link1">Descenso a los Infiernos</a></li>
		  <li><a href="javascript:{cambio_pieza(12)}" class="link1">Santa Inés</a></li>
		  <li><a href="javascript:{cambio_pieza(13)}" class="link1">Santa Rita de Casia</a></li>
		  <li><a href="javascript:{cambio_pieza(14)}" class="link1">San Francisco Javier</li>
		  <li><a href="javascript:{cambio_pieza(15)}" class="link1">Portaviáticos</a></li>
		  <li><a href="javascript:{cambio_pieza(16)}" class="link1">Cristo del Perdón</a></li>
  	</div>
  </div>  	
	<div id="detalle_edades"> 
		 La Iglesia del Rosario, aportó 6 piezas a la exposición, destacando las obras en Madera Policromada
		 de Luis Salvador Carmona
  </div>  	
</div>

  <!------------------------>

   </TD>   
   <TD width="150px" valign="top" class="right">
      <?php
	 @(include('../main/derecha.php')) OR goToError();
      ?>
    </TD>   
</TR>
</TABLE>
<br>
   <?php   @(include('../main/pie.php')) OR goToError();  ?>

</div>

</body>
</html>

