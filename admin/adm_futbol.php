<?php

   $modificado = ""; 

   if (isset($_POST["modificar"])){

		$jornada  	 = $_POST["jornada"];
	    $partido  	 = $_POST["partido"];
	    $puntos  	 = $_POST["puntos"];
	    $clasificacion = $_POST["clasificacion"];
	    $proximo     = $_POST["proximo"];
	
	    $sql = "UPDATE futbol_main set jornada=". $jornada .", partido='".$partido."', puntos=".$puntos.", clasificacion=".$clasificacion.", proximo='".$proximo."'";
	    //echo $sql;
	    $result = MYSQL_QUERY($sql);  
        mysql_query("COMMIT"); // efectuamos el commit ahora
        
        $modificado = "1";
   }	

   $sql = "select jornada, partido, puntos, clasificacion, proximo from futbol_main";

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $rst=mysql_fetch_array($result);
?>

<form name="frmdatos" method="post" action="index.php?dir=adm_futbol">
<TABLE width="100%" cellpadding="10" class="border" border="0">

	 <TR><TD colspan="4"><div id="titulo1">FUTBOL PAGINA PRINCIPAL</div></TD></TR>       
	
     <TR>
     	<TD class="admin" align="left">Jornada</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='jornada' id='jornada' type='text' required="required" value="<?php echo $rst['jornada']?>" class="input_tiny" maxlength="2" onkeypress="return justNumbers(event);">
     	</TD>
     </TR>
     <TR>
     	<TD class="admin" align="left">Partido</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='partido' id='partido' type='text' required="required" value="<?php echo $rst['partido']?>" class="input_3Xlarge" >

     	</TD>
     </TR>
     <TR>
     	<TD class="admin" align="left">Puntos</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='puntos' id='puntos' type='text' required="required" value="<?php echo $rst['puntos']?>" class="input_tiny" maxlength="2" onkeypress="return justNumbers(event);">
     	</TD>
     </TR>
     <TR>
     	<TD class="admin" align="left">Clasificaci&oacute;n</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='clasificacion' id='clasificacion' type='text' required="required" value="<?php echo $rst['clasificacion']?>" class="input_tiny" maxlength="2" onkeypress="return justNumbers(event);">
     	</TD>
     </TR>
     <TR>
     	<TD class="admin" align="left">Pr&oacute;ximo</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='proximo' id='proximo' type='text' required="required" value="<?php echo $rst['proximo']?>" class="input_3Xlarge" >
     	</TD>
     </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="2">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>
</TABLE>
</form>
<br>
<?php if ($modificado=="1") {?>
  			<p class="message success">Los datos han sido actualizados</p>
          			
<?php } ?>
  	       
