<html>
<head>
<title>Ayuntamiento | La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur </title>
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

<?php @(include('../cabecera_ayuntamiento.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

  <!------------------------>

<div id="titulo1">:: ORDENANZAS MUNICIPALES<img src="images/spacer.gif" width="2" border="0"></a> </div><div id="texto_main_normal">
   Los ficheros que se muestran en este apartado est&aacute;n recogidos de la página web del Ayuntamiento de San Ildefonso.
</div>
<br><br>
<TABLE cellSpacing="0" cellPadding="7" width="68%" align="center" border="0" id="tabla1"> 
  <TR><TD class="celda1" align="left">Fecha</TD>
      <TD class="celda1" align="left">N&uacute;mero</TD>
      <TD class="celda1" align="right">&nbsp;</TD>
  </tr>	


<?php 
     @(include('../bbdd.php')) or die ("bbdd.php no incluido");
     $query = "select tipo, fecha, titulo, enlace from ayuntamiento where tipo=4";  
     $result = MYSQL_QUERY($query);
     //echo $query;
     if (!$result)
     {
	print ("Error al recuperar los enlaces");
     }else{
       if (mysql_num_rows($result) > 0){
           while ($row=mysql_fetch_array($result)){
  	     print ("<TR><TD valign='top' height='30' NOWRAP align='left' class=". $clase .">".$row["fecha"]. "</TD>");
  	     print ("<TD valign='top' height='30' align='left' class=". $clase .">".$row["titulo"]. "</TD>");  	     
  	     print ("<TD valign='top' height='30' align='right' class=". $clase .">");	             
  	     print ("<a href='".$row["id_enlace"]."/' target='_blank' class='naranja'>Documento en .pdf</a></TD></TR>");
           }
       }else echo '<TR><TD colspan=2 align="center" height="40px"><B>No hay Ordenanzas dadas de alta. <br> Busca en la web del Ayuntamiento: <a href="http://www.lagranja-valsain.com/normativa.asp" class="link2">http://www.lagranja-valsain.com/normativa.asp</a></B></TD></TR>';
     }   
?>
</table>  
  
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

