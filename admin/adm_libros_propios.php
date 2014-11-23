<script>
   function cambio_libro()
   {
		if (document.frmdatos.select_libro.value >0)
	    	var_url = "adm_libros_propios_get&select_libro="+document.frmdatos.select_libro.value;
		else	
			var_url = "adm_libros_propios_get&select_libro=0";
	
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
		$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});

   
</script>

<?php
  
	// CREAMOS EL COMBO DE CURSOS
   	$cadena_gestion ="";
   	$sql = "select titulo, id from documentacion_propia order by titulo desc";  
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id"]."'>".$titulo."</option>";
	}
?>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_libros_propios_int" enctype='multipart/form-data'>

	 <TR><TD colspan="4"><div id="titulo1">BIBLIOTECA PARTICULAR SOBRE LA GRANJA</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Libros</TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_libro" onchange="javascript:{cambio_libro()};" class="input_full">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan="3" >
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>

     <TR>
     	<TD class="admin" align="left">Autor</TD>
     	<TD valign='top' align='left' colspan="3" >
     		<input name='autor' id='autor' type='text' class="input_full" required="required">
     	</TD>
     </TR>
     
	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripción</TD>
	   <TD valign='top' align='left' colspan="3" >
	      <textarea name="descripcion" rows="15"></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small">
	   </TD>
	   <TD align="left" class="admin">Año</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="anyo" name="anyo" maxlength=4 class="input_tiny" onkeypress="return justNumbers(event);" />
	   </TD>
	</TR>
 	 <TR>
	   <TD align="left" class="admin">Imagen</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
	   </TD>   
	   <TD align="left" class="admin">Tipo</TD>
	   <TD valign='top' align='left'>
			<select name="tipo">
				<?php
					 for ($i = 0; $i <= count($TIPOS_DOCUMENTACION_PROPIA)-1; $i++) {
    					echo "<option value=".$i.">".$TIPOS_DOCUMENTACION_PROPIA[$i]."</option>";
					 }
				?>		
			</select> 
	   </TD>
	 </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>
</form>
</TABLE>   

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_libro.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_libro();
	</script>
<?php } ?>