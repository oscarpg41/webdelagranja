<script>
   function cambio_libro()
   {
		if (document.frmdatos.select_libro.value >0)
	    	var_url = "adm_ediciones_get&select_libro="+document.frmdatos.select_libro.value;
		else	
			var_url = "adm_ediciones_get&select_libro=0";
	
		location.href='index.php?dir='+var_url;
	}
</script>

<?php
  
	// CREAMOS EL COMBO DE CURSOS
   	$cadena_gestion ="";
   	$sql = "select titulo, id from ediciones_populares order by titulo desc";  
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id"]."'>".$titulo."</option>";
	}
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_ediciones_int" enctype='multipart/form-data'>

	 <TR><TD colspan="2"><div id="titulo1">EDICIONES POPULARES</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Libros</TD>
	    <TD align="left">
	      <SELECT name="select_libro" onchange="javascript:{cambio_libro()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left'>
     		<textarea name="titulo" rows="3"></textarea>
     	</TD>
     </TR>
     <TR>
		<TD align="left" class="admin">Año</TD>
	   	<TD valign='top' align='left'>
	       <input name='fecha' type='text' class="input_tiny" maxlength="4" onkeypress="return justNumbers(event);">
	   	</TD>  
     </TR>

	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripción</TD>
	   <TD valign='top' align='left'>
	      <textarea name="descripcion" rows="10"></textarea>
	   </TD>
	 </TR>

 	 <TR>
  	     <TD valign='middle' align='center' colspan="2">
	        <input type='hidden' name='modificar' value='1'>
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