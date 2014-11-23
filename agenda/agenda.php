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
<style type="text/css">
      .agendaSelect {
        background-color: #F0E68C; 
      }
</style>
</head>

<?php @(include('../funciones.php')) OR goToError();?>

<body>

<?php @(include('../cabecera_agenda.php')) OR goToError();?>


<div id="resto" style="position:relative;top:0pt;visibility:visible"> 
<TABLE cellSpacing="0" cellPadding="0" width="1002px" border="0" bgcolor="#FFFFFF" align="center">
<TR>
   <TD width="850px" valign="top" style="padding: 4px;">

  <!------------------------>

<?php

$mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$anio = Date("Y");
$mes = Date("m");

if (is_numeric($_GET["mes"]) && is_numeric($_GET["anio"])){
		$mes=1*$_GET["mes"];
		$anio=1*$_GET["anio"];
}	



?>

<div id="titulo1">:: <?php echo $mesArray[$mes-1]?> <?php echo $_GET["anio"]?></div>

<div id="texto_main">
    <table width="99%" border="0" cellspacing="5" cellPadding="2" align="center">
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

   $sql = "select id_agenda, fecha, DATE_FORMAT(fecha, '%d') as dia, titulo, texto, enlace, cine, hora, lugar, imagen from agenda ";
   $sql.= "where DATE_FORMAT(fecha, '%m')=".$mes." and DATE_FORMAT(fecha, '%Y')=".$anio." order by fecha, hora ";  

   
   //echo $sql;
   
   $result = mysql_query($sql, $IdConexion);
   $num = 0;
   $num_rows = mysql_num_rows($result);
   if ($num_rows == 0){
      print("<TR><TD class='textAzulBold'> No tenemos constancia de actividades en este mes </td></Tr>");
   }
   while ($rst=mysql_fetch_array($result)) {
   	
   	 $idia = 1*$rst["dia"]; 
     $dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
     $namedia = $dias[date("N", strtotime($rst["fecha"]))-1];
     $fechaMostrar = $namedia ." ".$idia;
     
   	 if ($num == 0){
   	    print("      <TR>\n");
   	 }   
     
   	 $selected = "";
   	 
   	 if ($_GET["id"]==$rst["id_agenda"]){
   	 	$selected = " class='agendaSelect' ";
   	 }
   	 
   	 print ("    <TD width='50%' valign='top'>\n");
   	 print ("          <table width='100%' ".$selected." cellspacing='0' cellPadding='4' border='0'>\n");
   	 print ("            <tr>\n");
   	 print ("              <td class='text1Bold' valign='middle' height='20px' id='cabtab'><a name=".$rst["id_agenda"]." class='sin_subrayar'></a>".$fechaMostrar."</td>\n");
   	 print ("            </tr>\n");
   	 print ("            <tr>\n");
     print ("          <td style='text-align:justify;padding-top:5px'>");
     print ("             <span class='text2Bold'>".$rst["titulo"]."</span></td>");
   	 print ("            </tr>\n");
   	 print ("            <tr>\n");
     print ("              <td valign='top' style='text-align:justify;padding-top:5px'>");
       
     if (strlen($rst["imagen"]) > 0){
              print("<img src='images/agenda/".$rst["imagen"]."' id='imgRight' align='right' width='100px'>");
     }	
     if ($rst["hora"]=="00:00:00"){
       	$hora_mostrar = "";
     }
     else{
          $horario = explode(':',$rst["hora"]);
		  $hh = $horario[0];
		  $mm = $horario[1];
          $ss = $horario[2];
          
          $hora_mostrar = $hh.":".$mm;
     }   
       
     print ("                 <b>Hora:</b> ".$hora_mostrar."<br>");
     print ("                 <b>Lugar:</b> ".$rst["lugar"]."<br /><br />");
     print ("                 ".nl2br($rst["texto"])."</td>");
   	 print ("            </tr>\n");

     if (strlen($rst["enlace"])>0){
   	      print ("            <tr>\n");
          print ("              <td style='text-align:left;padding-top:5px'>");
          print ("                 <a href='".$rst["enlace"]."' class='link1'><B>M&aacute;s informaci&oacute;n</B></a></td>");
   	      print ("            </tr>\n");
     }   	
     print ("          </table>\n");   	
     print ("        </TD>\n");   

     $num ++;
   	 if ($num == 2){
   	      print("      </TR>\n");
   	      $num=0;
     }   
   }
      
?>  
    </table>
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

