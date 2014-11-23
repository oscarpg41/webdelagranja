<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es"><!-- use class="debug" here if you develope a template and want to check-->
<head>
<link rel="stylesheet" href="admin.css" type="text/css"></link>
<script type="text/javascript" src="jsfiles/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" SRC="../js/funciones.js"></script>

<!-- JQuery.  -->
    <link rel="stylesheet" href="../css/formalize.css" /><!--include that only on pages with forms-->

    <script src="../js/funciones.js" type="text/javascript"></script>
    
    <script src="../js/respond-min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="../scripts/jquery164min.js">\x3C/script>')</script><!--local fallback for JQuery-->
    <script src="../js/jquery.formalize.min.js" type="text/javascript"></script><!--include that only on pages with forms-->
				 
     <!-- jQuery UI style sheet reference. Smoothness is the theme used. -->
    <link href="../css/smoothness/jquery-ui-1.8.23.custom.css" type="text/css" rel="stylesheet">
    
    <!-- HTML5 shim/shiv for HTML5 section element backward compatibility. -->
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    
    <!-- jQuery library reference. Latest is always referenced from jQuery's CDN. -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    
    
    <!-- jQuery UI (datapicker-calendario) JavaScript library reference. -->
    <script type="text/javascript" src="../js/datapicker/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="../js/datapicker/jquery.ui.datepicker-es.js"></script>


	
</head>
<?php
  @(include('../defines.php')) or die ("defines.php no incluido");
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

  $dir = 'index_derecha.php';
  if(isset($_GET["dir"]))
      $dir = $_GET["dir"] .".php";   
   
?>   	

<body>    
<div id="title1" style="padding-top:15px">WebdelaGranja.  Area de Administración</div>
<br>
<TABLE cellSpacing="0" cellPadding="0" border="0" bgcolor="#FFFFFF" align="left">
<TR>
   <TD width="150px" valign="top">
      <?php @(include "izquierda.php"); ?>
   </TD>  
   <TD width="20px" valign="top">&nbsp;</TD>
   <TD valign="top" style="padding: 4px;">
      <?php @(include ($dir)); ?>
   </TD>   
</TR>
</TABLE>
</body>
</html>