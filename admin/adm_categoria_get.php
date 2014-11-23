<script>
   function cambio_categoria()
   {
		if (document.frmdatos.select_categoria.value >0)
	    	var_url = "adm_categoria_get&select_categoria="+document.frmdatos.select_categoria.value;
		else	
			var_url = "adm_categoria_get&select_categoria=0";
	
		location.href='index.php?dir='+var_url;
	}
	
	function borrar(){
		if (window.confirm("¿Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_categoria.value = "1";
	        document.frmdatos.submit();
	    }
	}		
</script>

<?php

	$site_id=mysql_escape_string($_GET['select_categoria']);
   
	// CREAMOS EL COMBO DE CATEGORIAS
   	$cadena_gestion ="";
   	$sql = "select id_categoria, nombre from categorias order by id_categoria";  
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id_categoria"] == $site_id){ $selected = " selected"; }
		
   		$cadena_gestion .="<option value='".$rst["id_categoria"]."'". $selected .">".$rst["id_categoria"].":".$rst["nombre"]."</option>";
	}
	
	
	//informacion seleccionada
	$query = "select id_categoria, nombre from categorias WHERE id_categoria=".$site_id;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
?>

<form name="frmdatos" method="post" action="index.php?dir=adm_categoria_int">
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="2"><div id="titulo1">CATEGORIAS EXISTENTES</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Categorías</TD>
	    <TD align="left">
	      <SELECT name="select_categoria" onchange="javascript:{cambio_categoria()};"  class="input_3Xlarge">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>
     <TR>
		<TD align="left" class="admin">Categoría (ID)</TD>
	   	<TD valign='top' align='left'>
	       <input name='id_categoria' type='text' class="input_tiny" value='<?php echo $line['id_categoria']?>' maxlength="4" onkeypress="return justNumbers(event);">
	   	</TD>  
     </TR>
     <TR>
     	<TD class="admin" align="left">Nombre</TD>
     	<TD valign='top' align='left'>
     		<input name='nombre' type='text' class="input_3Xlarge" value='<?php echo $line['nombre']?>'>
     	</TD>
     </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="2">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_categoria' value='0'>
  	     </TD>
  	  </TR>
</TABLE>   
</form>

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_categoria.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_libro();
	</script>
<?php } ?>