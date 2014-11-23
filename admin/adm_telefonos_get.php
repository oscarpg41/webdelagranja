<script>
	function cambio_tlf()
	{
		if (document.frmdatos.select_tlf.value >0)
	     var_url = "adm_telefonos_get&select_tlf="+document.frmdatos.select_tlf.value;
		else	
			var_url = "adm_telefonos_get&select_tlf=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("¿Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_tlf.value = "1";
	        document.frmdatos.submit();
	    }
	}
</script>

<?php

	$site_id=mysql_escape_string($_GET['select_tlf']);


// CREAMOS EL COMBO
   $sql = "select id_telefono, nombre from telefonos order by nombre"; 
	
   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion = "";

   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		if ($rst["id_telefono"] == $site_id){ $selected = " selected"; }
   		
		$cadena_gestion .="<option value='".$rst["id_telefono"]."'". $selected .">". $rst["nombre"] ."</option>";
   }
   
   
	// Recuperamos la informacion del seleccionado
	$query = "select id_telefono, nombre, numero from telefonos WHERE id_telefono=".$site_id;
   	
	//echo "<br>".$query;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
   
?>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_telefonos_int">

	 <TR><TD colspan="2"><div id="titulo1">TELEFONOS</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado telefónico</TD>
	    <TD valign='top' align='left'>
	      <SELECT name="select_tlf" onchange="javascript:{cambio_tlf()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD class="admin" align="left">Nombre</TD>
     	<TD valign='top' align='left'>
     		<input name='nombre' id='nombre' type='text' value='<?php echo $line['nombre']?>' required="required" class="input_full">
     	</TD>
     </TR>			
     <TR>
	   <TD align="left" class="admin">Telefono</TD>
	   <TD valign='top' align='left'>
     		<input name='numero' id='numero' type='text' value='<?php echo $line['numero']?>' required="required" class="input_full">
	   </TD>  
	 </TR> 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="2">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_tlf' value='0'>
  	     </TD>
  	  </TR>   
</table>
</form>