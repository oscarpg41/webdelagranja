<script>
	function cambio_galeria()
	{
		if (document.frmdatos.select_galeria.value >0)
	    	var_url = "adm_galerias_get&select_galeria="+document.frmdatos.select_galeria.value;
		else	
			var_url = "adm_galerias_get&select_galeria=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("¿Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_galeria.value = "1";
	        document.frmdatos.submit();
	    }
	}	
</script>

<?php
	$site_id=mysql_escape_string($_GET['select_galeria']);
   
	// CREAMOS EL COMBO DE GALERIAS
   	$cadena_gestion ="";
   	$sql = "select id, nombre, descripcion from galeria_fotografica order by id desc";  
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		if ($rst["id"] == $site_id){ $selected = " selected"; }
		
		$descripcion = "";
		if (strlen($rst["descripcion"])>0) $descripcion = " (". $rst["descripcion"] .")";
		
   		$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">".$rst["nombre"]. $descripcion ."</option>";
	}
	
	
	// recuperamos la informacion de la galeria_fotografica
	$query  = "select id, nombre, descripcion from galeria_fotografica WHERE id=".$site_id;
	//echo $query."<br>";

	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
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
     		<input name='nombre' type='text' class="input_large" value="<?php echo $line['nombre']?>">
     	</TD>
     </TR>
     
     <TR>
		<TD align="left" class="admin">Descripción</TD>
	   	<TD valign='top' align='left'>
     		<input name='descripcion' type='text' class="input_full" value="<?php echo $line['descripcion']?>">
	   	</TD>  
     </TR>

 	 <TR>
  	     <TD valign='middle' align='center' colspan="2">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_galeria' value='0'>
  	     </TD>
  	  </TR>  	  
</TABLE>
</form>  