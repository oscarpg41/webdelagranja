<script>
   function cambio_libro()
   {
		if (document.frmdatos.select_libro.value >0)
	    	var_url = "adm_ediciones_get&select_libro="+document.frmdatos.select_libro.value;
		else	
			var_url = "adm_ediciones_get&select_libro=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("¿Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_libro.value = "1";
	        document.frmdatos.submit();
	    }
	}	
</script>

<?php
	$site_id=mysql_escape_string($_GET['select_libro']);
   
	// CREAMOS EL COMBO DE CURSOS
   	$cadena_gestion ="";
   	$sql = "select titulo, id from ediciones_populares order by titulo desc";  

   	$result = mysql_query($sql, $IdConexion);

   	$num_rows = mysql_num_rows($result);

	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		if ($rst["id"] == $site_id){ $selected = " selected"; }
		
		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">".$titulo."</option>";
	}

	// recuperamos la informacion del libro
	$query  = "select titulo, id, descripcion, fecha from ediciones_populares WHERE id=".$site_id;
	//echo $query."<br>";

	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
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
     		<textarea name="titulo" rows="3"><?php echo $line['titulo']?></textarea>
     	</TD>
     </TR>
     <TR>
		<TD align="left" class="admin">Año</TD>
	   	<TD valign='top' align='left'>
	       <input name='fecha' type='text' class="input_tiny" maxlength="4" onkeypress="return justNumbers(event);" value='<?php echo $line['fecha']?>' >
	   	</TD>  
     </TR>

	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripción</TD>
	   <TD valign='top' align='left'>
	      <textarea name="descripcion" rows="10"><?php echo $line['descripcion']?></textarea>
	   </TD>
	 </TR>

 	 <TR>
  	     <TD valign='middle' align='center' colspan="2">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_libro' value='0'>
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