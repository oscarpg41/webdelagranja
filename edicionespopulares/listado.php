<html>
<head>
<title>La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur </title>
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
</head>

<?php @(include('../funciones.php')) OR goToError();?>  

<body>

<?php @(include('../cabecera_conocer.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

<div id="titulo1">:: Ediciones Populares El Laberinto de La Granja</div>

<div id="texto_main">
<img src='images/misc/PB140073.JPG' id='imgRight' width ="300px" align='right'>
<b>LIBROS –raros- DE LA GRANJA-LA PRADERA DE NAVAELHORNO-VALSAÍN</b><br><br>

Son libros -casí inéditos, en muchos casos- que aparecieron por estos contornos a partir del siglo XVIII, 
y que acaban -de momento- con el que acaba de publicar sobre el "Aserradero de Valsaín". <br><br>

Sus tiradas son a veces tan limitadas, que se realizan de manera artesanal, a razón de, a veces, no más de 
una docena de ejemplares.<br><br>

Más información: pedragua@hotmail.com


<h3>Indice de libros publicados</h3>

	<TABLE cellSpacing="0" cellPadding="7" width="98%" align="center" border="0" id="tabla1"> 
<?php 
     @(include('../bbdd.php')) or die ("bbdd.php no incluido");
     $query = "select titulo, id, descripcion, fecha from ediciones_populares order by id";  
     $result = MYSQL_QUERY($query);
     //echo $query;
     if (!$result)
     {
	print ("Error al recuperar los enlaces");
     }else{
       if (mysql_num_rows($result) > 0){
           print('<TR><TD align="left" class="celda1" >Nombre</TD>');
           print('<TD class="celda1" align="right">Año</TD>');
           while ($row=mysql_fetch_array($result)){
		  	     print ("<TR><TD valign='top' height='30'>");	             
  			     print ("<B>". $row["titulo"]. "</B><br>");
  	    		 print (nl2br($row["descripcion"])."</TD>");
  	     		 print ("<TD valign='top' height='30' NOWRAP align='right'>".$row["fecha"]. "</TD></TR>");  	     
           }
       }else echo '<TR><TD class="text2Bold">No hay enlaces dadas de alta';
     }   
?>
</TABLE>
</div>


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












