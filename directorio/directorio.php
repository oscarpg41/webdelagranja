<html>
<head>
<title>Empresas | Directorio Empresas | La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur </title>
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
<script language="javascript" src="js/ajax.js"></script>
</head>

<?php @(include('../funciones.php')) OR goToError();?>  

<body>

<?php @(include('../cabecera_directorio.php')) OR goToError();?>
<script>
 function cambio_empresas(x,pag)
 {
     replacedivcontents ("cambiar", "directorio/directorio_get.php?select_directorio="+x+"&pagina="+pag);
 }
</script>

<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">
     <div id="titulo1">:: Directorio de Servicios y Empresas  &nbsp;&nbsp; </div>       
     
		 <form name="frmdatos" method="post" enctype='multipart/form-data'>
		 <div id="texto_main">
		 	<div id="sectores">
		 		<div class="text2Bold">Sectores<br></div>
		 		<?php
		   		@(include('../bbdd.php')) or die ("bbdd.php no incluido");
		 
		 		    $sql = "select id_categoria, nombre from cat_directorio order by nombre";  
		 
		    		$result = mysql_query($sql, $IdConexion);
		 
		    		while ($row=mysql_fetch_array($result)) {
		 ?>     	
		         <li><a href="javascript:{cambio_empresas(<?php echo $row["id_categoria"]?>,1)}" class="link1"><?php echo $row["nombre"]?></a></li>
		 <?php          
		         if ($row["posicion"] == 1){
		           $nombre_1      = $row["nombre"];
		           $descripcion_1 = $row["descripcion"];
		           $imagen_1      = $row["imagen"];
		         }   
		      }     
		 		?>
		   	</div>
		   </div>

		   <div id="cambiar">  	
			 	<div id="empresa" align="left"> 
			 		 <h5>El portal comercial y empresarial de San Ildefonso. Una gu&iacute;a de negocios de San Ildefonso.</h5>
			 		Si quieres que tu negocio aparezca en esta gu&iacute;a, env&iacute;a un correo a info@webdelagranja.com, e indica como asunto:
			 		Directorio de Empresas Webdelagranja.com.<br><br>
			 		
			 		Aparecer en este directorio es GRATUITO.<br><br>
			 		
			 		<span style="font-size:10px">Nota: Si tu empresa aparec&iacute;a antes en este directorio, y ahora ya no, ha sido debido a problemas 
			 	t&eacute;cnicos. Por favor, m&aacute;ndame de nuevo la informaci&oacute;n de tu negocio.</span>
			 		
			   </div>  	
		   </div>

		 </div>
		 </form>




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