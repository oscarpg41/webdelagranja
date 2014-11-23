<script>
	function cambio_enlaces()
	{
		if (document.frmdatos.select_enlace.value >0)
	     var_url = "adm_enlaces_get&select_enlace="+document.frmdatos.select_enlace.value;
		else	
			var_url = "adm_enlaces_get&select_enlace=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_enlace.value = "1";
	        document.frmdatos.submit();
	    }
	}
</script>

<?php

	$site_id=mysql_escape_string($_GET['select_enlace']);


  	// CREAMOS EL COMBO
   	$sql  = "select id_enlace, nombre from enlaces";

   	//echo $sql;
   	$result = mysql_query($sql, $IdConexion);
   	$cadena_enlaces = "";

   	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		if ($rst["id_enlace"] == $site_id){ $selected = " selected"; }
   		
	   	$cadena_enlaces .="<option value='".$rst["id_enlace"]."'". $selected .">". $rst["nombre"] ."</option>";
	}

   
	// Recuperamos la informacion del seleccionado
	$query = "select id_enlace, nombre, web, descripcion, click, visible from enlaces WHERE id_enlace=".$site_id;
   	
	//echo "<br>".$query;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
   
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_enlaces_int">

	 <TR><TD colspan="4"><div id="titulo1">ENLACES</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado de enlaces</TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_enlace" onchange="javascript:{cambio_enlaces()};">
	         <option value="" selected></option>
	         <?php echo $cadena_enlaces?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD class="admin" align="left">Nombre</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='nombre' id='nombre' type='text' required="required" class="input_full" value='<?php echo ($line['nombre'])?>'>
     	</TD>
     </TR>			
     <TR>
	   <TD align="left" class="admin">Url</TD>
	   <TD valign='top' align='left' colspan='3'>
			<input type="url" id="web" name="web" placeholder="http://" class="input_full" value='<?php echo $line['web']?>'>
	   </TD>  
	 </TR> 
	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripcion</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="descripcion" rows="10"><?php echo ($line['descripcion'])?></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD align="left" class="admin">Visible</TD>
	   <TD valign='top' align='left'>
			<SELECT name="visible">
				<option <?php if ($line['visible'] == 0) print "selected" ?> value="0">No</option>
			    <option <?php if ($line['visible'] == 1) print "selected" ?> value="1">Si</option>
			</SELECT>
	   </TD>
	   <TD align="right">Clicks</TD>
	   <TD valign='top' align='left'>
	       <input name='click' type='text' class="input_tiny" maxlength="4" onkeypress="return justNumbers(event);" value='<?php echo ($line['click'])?>'>
	   </TD>   
	 </TR>

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_enlace' value='0'>
  	     </TD>
  	  </TR>  	  
</table>
</form>


<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_enlace.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_enlaces();
	</script>
<?php } ?>