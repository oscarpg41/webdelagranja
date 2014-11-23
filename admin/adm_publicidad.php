<script>
	function cambio_publicidad()
	{
		if (document.frmdatos.select_publicidad.value >0)
	     var_url = "adm_publicidad_get&select_publicidad="+document.frmdatos.select_publicidad.value;
		else	
			var_url = "adm_publicidad_get&select_publicidad=0";
	
		location.href='index.php?dir='+var_url;
	}

   //iniciar el calendario
   $(document).ready(function() {
       	$("#datepicker").datepicker({
       		maxDate: "+6m",
       		showOn: "button",
       		buttonImage: "../images/calendario.jpg",
       		buttonImageOnly: true
       	});
       	$("#datepicker2").datepicker({
       		maxDate: "+36m",
       		showOn: "button",
       		buttonImage: "../images/calendario.jpg",
       		buttonImageOnly: true
       	});

       	$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
       	$('#datepicker2').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});
</script>

<?php

   $sql = "select id_cliente, nombre, fecha_ini, fecha_fin  from publicidad order by fecha_ini";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   while ($rst=mysql_fetch_array($result)) {
    	$titulo =substr($rst["titulo"],0,70);
    	$cadena_gestion .="<option value='".$rst["id_cliente"]."'>(".$rst["fecha_ini"]."/".$rst["fecha_fin"].") . . . ".$rst["nombre"]."</option>";
   }
?>

<form name="frmdatos" method="post" action="index.php?dir=adm_publicidad_int" enctype='multipart/form-data'>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">PUBLICIDAD</div></TD></TR>       
	
	 <TR>
	    <TD valign='top' align='left'>Clientes</TD>
	    <TD align='left' colspan='3'>
              <SELECT name="select_publicidad" class="control" onchange="javascript:{cambio_publicidad()};">
                 <option value="" selected></option>
                 <?php echo $cadena_gestion?>
              </select>
		</TD>
	 </TR>

     <TR>
     	<TD valign='top' align='left'>Nombre</TD>
     	<TD valign='top' align='left'>
     		<input name='nombre' id='nombre' type='text' class="input_full">
     	</TD>
		<TD valign='top' align='right' >Email</TD>
     	<TD valign='top' align='left'>
			<input name='email' id='email' type='email' class="input_full">
		</TD>
     </TR>			
	 <TR>
		<TD valign='top' align='left' >Página Web</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='web' id='web' type='text' class="input_full">
	     </TD>
     </TR>			

	 <TR>
	   <TD valign='top' align='left'>Fecha Inicio</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="inicio" class="input_small" required="required">
	   </TD>
	   <TD valign='top' align='right' >Fecha Fin</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker2" name="fin" class="input_small" required="required">
	   </TD>
	</TR>    

	 <TR>
	   <TD valign='top' align='left'>Impresiones</TD>
	   <TD valign='top' align='left'>
	       <input name='impresiones' type='text' class="input_small" maxlength="6" onkeypress="return justNumbers(event);" value=''>
	   </TD>
	   <TD valign='top' align='right'>Clicks</TD>
	   <TD valign='top' align='left'>
	       <input name='click' type='text' class="input_small" maxlength="6" onkeypress="return justNumbers(event);" value=''>
	   </TD>   
	</TR>

	<TR>
   		<TD valign='top' align='left'>Activo</TD>
   		<TD valign='top' align='left'>
	   	    <select name="activo">
   		    	<option value="0"> NO Visible</option>
				<option value="1"> Visible </option>';
   	    	</select> 
   		</TD>
   		<TD valign='top' align='right'>Orden</TD>
   		<TD valign='top' align='left'>
	       <input name='orden' type='text' class="input_tiny" maxlength="4" onkeypress="return justNumbers(event);" value=''>
   		</TD>
 	</TR> 

	<TR>
    	<TD align="left" valign='top'>Asignar Imagen</TD>
     	<TD colspan="3" valign='top' align='left'>
        	<input type='file' name='file_img'>
     	</TD>
	 </TR>
	<TR>
   		<TD valign='top' align='left'>Texto del Enlace</TD>
   		<TD valign='top' align='left' colspan='3'>
       		<input name='txt_enlace' type='text' class="input_full">
   		</TD>
 	</TR> 
	 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>   
</TABLE>
</form>

<?php if (isset ($_GET['seleccionado']) && ($_GET['seleccionado'] != "0")){ ?>
	<script>
		document.frmdatos.select_publicidad.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_publicidad();
	</script>
<?php } ?>