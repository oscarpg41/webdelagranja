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
        <TD width='25%'><div id="titulo1">:: Noches Magicas de La Granja</div></TD>
  </TABLE>
 
  <br><br>
  
  <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0" bgcolor="#FFFFFF">
<?php  
  $id_   = strip_tags($_GET["id_"]);
  $id_ = str_replace(" ", "", $id_);
  
  if (strlen($id_)>4){
  	  $cat="Error";
  }	
  
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

  $query = "select nombre, DATE_FORMAT(fecha, '%d-%m-%Y') ff, imagen, hora, texto, lugar, id from noches_magicas where id=".$id_;
  
  //echo $query;
    
  $result = MYSQL_QUERY($query);
  if (!$result)
  {
    print ("Error al recuperar los eventos culturales");
  }
  else{
    if (mysql_num_rows($result) > 0){
      while ($row=mysql_fetch_array($result)){

  		print ("<TR><TD style='align:justify' valign=top>");

        if ( strlen($row["imagen"]) >0 )
			print ("<img src='images/agenda/". $row["imagen"] . "' id='imgRight' align='right' \>");
			
		print ("<span id='titulo2'>". $row["nombre"]. "</span><br><br>");
        
  		print ("<span class='text4Bold'>Fecha:</span>". $row["ff"]. "<br>");
  		
  		print ("<span class='text4Bold'>Hora:</span>". $row["hora"]. "<br>");
  		
  		print ("<span class='text4Bold'>Lugar:</span>". $row["lugar"]. "</br><br>");
  		
  		print ("<p align=justify>".nl2br($row["texto"]). "</p>");
  		
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




