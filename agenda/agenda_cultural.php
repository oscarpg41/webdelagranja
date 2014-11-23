<html>
<head>
<title>Agenda Cultural | La Granja | San Ildefonso | Valsain | Palacio Real | Jardines y Fuentes | Sierra de Guadarrama |Segovia Sur </title>
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

<?php @(include('../cabecera_agenda.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

  <!------------------------>

<script>
  function go_agenda(x){
  	
  	switch (x) {
    case 2014:
   			salto = document.form_agenda.agenda_2014.value;
        break;
    case 2013:
   			salto = document.form_agenda.agenda_2013.value;
        break;
    case 2012:
   			salto = document.form_agenda.agenda_2012.value;
        break;
    case 2011:
   			salto = document.form_agenda.agenda_2011.value;
        break;
    case 2010:
   			salto = document.form_agenda.agenda_2010.value;
        break;
    case 2009:
   			salto = document.form_agenda.agenda_2009.value;
        break;
    case 2008:
   			salto = document.form_agenda.agenda_2008.value;
        break;
    case 2007:
   			salto = document.form_agenda.agenda_2007.value;
        break;
	}

  	var navegador = navigator.appName 
  	if (navegador == "Microsoft Internet Explorer"){
    	document.location=salto.toLowerCase();
	}
	else{
    	document.location="agenda/"+salto.toLowerCase();
	}		
  }	
</script>
<form name="form_agenda">
<div id="titulo1">:: Agenda Cultural </div>
<?php
  $mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $fecha = time();
  $mes = date("n",$fecha);
  
  $year_actual = date("Y",$fecha);
  $top_agenda=12;



  for ($year=$year_actual;$year>=2009; $year--){
?>  	

<div class="menu2"> <b>Año <?php echo $year?></b> &nbsp;
   <select name="agenda_<?php echo $year?>" onChange="go_agenda(<?php echo $year?>)"> 
      <option selected>Elige un mes</option>
      <?php for ($j=1;$j<$top_agenda+1;$j++){ 
           print ("<option value='agenda.php?mes=". $j ."&anio=".$year."'>". $mesArray[$j-1] ."</option>");
	 }  
      ?> 
   </select>
</div>

<br><br>
<?php  	
  }	 
?>

<!--div class="menu2"> <b>Año 2007</b> &nbsp;
   <select name="agenda_2007" onChange="go_agenda(2007)"> 
      <option selected>Elige un mes</option>
      <?php for ($j=1;$j<$top_agenda+1;$j++){ 
	   if ($j <8) 
              print ("<option value='". $mesArray[$j-1] ."_2007'>". $mesArray[$j-1] ."</option>");
           else{   
	       if ($j <10) $j="0".$j;
               print ("<option value='agenda.php?mes=". $j ."&anio=2007'>". $mesArray[$j-1] ."</option>");
	   }
	 }  
      ?> 
   </select>
</div>

<br><br>


<div class="menu2"> <b>Año 2006</b> &nbsp;
   <select name="agenda_2006" onChange="go_agenda(2006)"> 
      <option selected>Elige un mes</option>
      <option value='julio_2006'>Julio</option>
      <option value='agosto_2006'>Agosto</option>
      <option value='diciembre_2006'>Diciembre </option>
   </select>      
</div-->
</form>

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

