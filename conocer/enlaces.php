<html>
<head>
<title>La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur </title>
<META name="verify-v1" content="7vDs3B9sxvwrXL0929HFifbH5sSod5C6Tb0NzIA8L6c=" />
<meta name="title" content="La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur">
<meta name="DC.Title" content="La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur">
<meta http-equiv="title" content="La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur">
<meta name="DC.Creator" content="www.altas-buscadores.com">
<meta name="keywords" content="Segovia La Granja Real Sitio San Ildefonso Jardines y Palacio Real de La Granja de San Ildefonso Valsa�n Fundaci�n Centro Nacional de Vidrio Fotos Imagenes CENEAM">
<meta http-equiv="keywords" content"Segovia La Granja Real Sitio San Ildefonso Jardines y Palacio Real de La Granja de San Ildefonso Valsa�n Fundaci�n Centro Nacional de Vidrio Fotos Imagenes CENEAM">
<meta name="description" content="La Granja de San Ildefonso. Pagina no oficial de un peque�o pueblo de la provincia de Segovia, a los pies de la Sierra de Guadarrama">
<meta http-equiv="description" content="La Granja de San Ildefonso. Pagina no oficial de un peque�o pueblo de la provincia de Segovia, a los pies de la Sierra de Guadarrama">
<meta http-equiv="DC.Description" content="La Granja de San Ildefonso. Pagina no oficial de un peque�o pueblo de la provincia de Segovia, a los pies de la Sierra de Guadarrama">
<meta name="author" content="Oscar P�rez G�mez">
<meta name="DC.Creator" content="Oscar P�rez G�mez">
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

<div id="titulo1">:: Enlaces </div>
<div id="texto_main">
	<TABLE cellSpacing="0" cellPadding="7" width="98%" align="center" border="0" id="tabla1"> 
<?php 
     @(include('../bbdd.php')) or die ("bbdd.php no incluido");
     $query = "select id_enlace, nombre, web, descripcion, click from enlaces where visible=1 order by nombre";  
     $result = MYSQL_QUERY($query);
     //echo $query;
     if (!$result)
     {
	print ("Error al recuperar los enlaces");
     }else{
       if (mysql_num_rows($result) > 0){
           print('<TR><TD align="left" class="celda1" >Nombre</TD>');
           print('<TD class="celda1" align="right">Accesos</TD>');
           while ($row=mysql_fetch_array($result)){
		  	     print ("<TR><TD valign='top' height='30'>");	             
  			     print ("<a href='conocer/enlace2.php?id=".$row["id_enlace"]."' target='_blank' class='link3'><B>". $row["nombre"]. "</B></a><br>");
  	    		 print (nl2br($row["descripcion"])."</TD>");
  	     		 print ("<TD valign='top' height='30' NOWRAP align='right'>".$row["click"]. "</TD></TR>");  	     
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












