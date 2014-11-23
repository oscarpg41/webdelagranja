<script>
   function cambio_galeria()
   {
		if (document.frmdatos.select_galeria.value >0)
	    	var_url = "adm_galerias_get&select_galeria="+document.frmdatos.select_galeria.value;
		else	
			var_url = "adm_galerias_get&select_galeria=0";
	
		location.href='index.php?dir='+var_url;
	}
</script>

<?php
  
	// CREAMOS EL COMBO DE GALERIAS
   	$cadena_gestion ="";
   	$sql = "select id, nombre, descripcion from galeria_fotografica order by id desc";  
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
		$descripcion = "";
		if (strlen($rst["descripcion"])>0) $descripcion = " (". $rst["descripcion"] .")";
		
   		$cadena_gestion .="<option value='".$rst["id"]."'>".$rst["nombre"]. $descripcion ."</option>";
	}
?>

<form name="frmdatos" method="post" action="index.php?dir=adm_galerias_int">
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="2"><div id="titulo1">GALERIAS FOTOGRAFICAS</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado de Galerias</TD>
	    <TD align="left">
	      <SELECT name="select_galeria" onchange="javascript:{cambio_galeria()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Nombre (autor) Galería</TD>
     	<TD valign='top' align='left'>
     		<input name='nombre' type='text' class="input_large">
     	</TD>
     </TR>
     
     <TR>
		<TD align="left" class="admin">Descripción</TD>
	   	<TD valign='top' align='left'>
     		<input name='descripcion' type='text' class="input_full">
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

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_galeria.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_galeria();
	</script>
<?php } ?>