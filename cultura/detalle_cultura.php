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

<?php @(include('../cabecera_inicio.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

  <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0" bgcolor="#FFFFFF">
     <TR>
        <TD width='25%'><div id="titulo1">:: Cultura</div></TD>
  </TABLE>

  <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0" bgcolor="#FFFFFF">
<?php  
  $id_   = strip_tags($_GET["id_"]);
  $id_ = str_replace(" ", "", $id_);
  
  if (strlen($id_)>4){
  	  $cat="Error";
  }	
  
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

  $diaSemana = array(0=> "Domingo", 1=> "Lunes", 2 => "Martes", 3 => "Miercoles", 4 => "Jueves", 5 => "Viernes", 6 => "S&aacute;bado");
  $nombremes = array(0=> "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");
  
  $query = "select tipo, titulo, autor, detalles, imagen, organizador, lugar, url, DATE_FORMAT(fecha, '%d de XXX del %Y') fecha, DATE_FORMAT(fecha, '%H:%i')hora, DATE_FORMAT(fecha, '%c') mes, DATE_FORMAT(fecha, '%w') dia, DATE_FORMAT(fecha_fin, '%d de XXX del %Y') fecha_fin, DATE_FORMAT(fecha_fin, '%c') mes_fin from cultura where Id=".$id_;

  //echo $query;
    
  $result = MYSQL_QUERY($query);
  echo $row["imagen"];
  if (!$result)
  {
    print ("Error al recuperar los eventos culturales");
  }else{
    if (mysql_num_rows($result) > 0){
      while ($row=mysql_fetch_array($result)){

      	$_fecha = str_replace("XXX", $nombremes[$row["mes"]-1], $row["fecha"]);
      	$_fecha_fin = str_replace("XXX", $nombremes[$row["mes_fin"]-1], $row["fecha_fin"]);
      	
  		print ("<TR><TD colspan='2' valign='middle' height='35' align='left' class='text3Bold'>". $row["tipo"]." :: ".$row["titulo"]. "</TD>");
      	
  		print ("<TR><TD style='align:justify'> <span class='text4Bold'>Autor:</span>". $row["autor"]. "<br>");
       
  		print ("<span class='text4Bold'>Organizador:</span>". $row["organizador"]. "<br>");

  		print ("<span class='text4Bold'>Fecha Inauguraci&oacute;n:</span>". $diaSemana[$row["dia"]].", ".$_fecha. "<br>");

  		if ($row["hora"]!="00:00")
  		   print ("<span class='text4Bold'>Hora:</span>". $row["hora"]. "<br>");

  		print ("<span class='text4Bold'>Final Exposici&oacute;n:</span>". $_fecha_fin ."<br>");
  		
  		print ("<span class='text4Bold'>Lugar:</span>". $row["lugar"]. "<br>");
  		
  		if ( strlen($row["url"]) >0 )
			print ("<span style='margin-left:5px'><a href='". $row["url"]. "' target='_blank'>Enlace externo</a></span><br>");
  		
  		print("<br><br>");
		
        if ( strlen($row["imagen"]) >0 )
			print ("<img src='images/cultura/". $row["imagen"] . "' id='imgRight' align='right' \>");

  		print ("<p align=justify>".nl2br($row["detalles"]). "</p>");
		
  		
		print ("</TD></TR>");
		
      }
    }else echo '<TR><TD class="text4Bold">No hay eventos culturales dadas de alta';
  }
  
  mysql_close();
?>
  </TABLE>

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




