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

<body>

<?php @(include('../cabecera_inicio.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

  <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0" bgcolor="#FFFFFF">
<?php  
  $id_curso  = strip_tags($_GET["id_curso"]);
  $id_curso  = str_replace(" ", "", $id_curso);
  
  if (strlen($id_curso)>4){
  	  $cat="Error";
  }	

  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

  $query = "SELECT id_curso, autor, titulo, texto, DATE_FORMAT(fecha_ini, '%d-%m-%Y') fecha_ini, DATE_FORMAT(fecha_fin, '%d-%m-%Y') fecha_fin FROM cursos WHERE id_curso=".$id_curso;
  $result = MYSQL_QUERY($query);
  
  //echo $query;
  
  if (!$result)
  {
    print ("Error al recuperar las noticias");
  }else{
    if (mysql_num_rows($result) > 0){
      $row=mysql_fetch_array($result);
      
?>
      
        <TR><TD colspan='2' valign='middle' height='55' align='left' class='text4Bold'><?php echo $row["titulo"]?></TD>
        <TR><TD NOWRAP valign='top' class='text3Bold' width='15%'>Autor/Ponente</TD>
        <TD NOWRAP valign='top'><?php echo $row["autor"]?> </TD>
        <TR>
        	<TD NOWRAP valign='top' class='text3Bold' width='15%'>Fechas </TD>
	  		<TD NOWRAP valign='bottom' align='left'>del <b><?php echo $row["fecha_ini"]?></b> al <b><?php echo $row["fecha_fin"]?></b></TD>
	  	</TR>
		<TR><TD colspan='2' align='left'>
	      <p align='justify'><br><div id='texto_main'><?php echo nl2br($row["texto"])?></div></p></TD>
	    </TR>

<?php       
      
    }else echo '<TR><TD class="text4Bold">No hay Cursos dados de alta';
  }
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




