<script>
	function cambio_pelicula()
	{
		if (document.frmdatos.select_cine.value >0)
	     	var_url = "adm_cine_get&select_cine="+document.frmdatos.select_cine.value;
		else	
			var_url = "adm_cine_get&select_cine=0";
	
		location.href='index.php?dir='+var_url;
	}
</script>

<?php
// CREAMOS EL COMBO

   $sql  = "select id, nombre from cine order by nombre";

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion = "";


   while ($rst=mysql_fetch_array($result)) {
	   	$cadena_gestion .="<option value='".$rst["id"]."'>". $rst["nombre"] ."</option>";
   }
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_cine_int">

	 <TR><TD colspan="4"><div id="titulo1">CINE</div></TD></TR>       
	
	 <TR>
	    <TD valign='top' align='left'>Listado de películas</TD>
	    <TD valign='top' align='left' colspan='3'>
	      <SELECT name="select_cine" onchange="javascript:{cambio_pelicula()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD valign='top' align='left'>Título</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='nombre' id='nombre' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
	 <TR>
	   <TD valign='top' align='left'>Descripcion</TD>
	   <TD valign='top' align='left' colspan='3'>
	      <textarea name="descripcion" rows="20"></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align='left'>Año</TD>
	   <TD valign='top' align='left'>
	   		<input name='anyo' type='text' class="input_tiny" maxlength="4" onkeypress="return justNumbers(event);">
	   </TD>
	   <TD valign='top' align='right'>Disponible</TD>
	   <TD valign='top' align='left'>
			<SELECT name="visible">
				<option value="0">No</option>
				<option value="1">Si</option>
			</SELECT>
	   </TD>

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>   
</table>
</form>


<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_cine.value = <?php echo $_GET['seleccionado'] ?>;
		if(document.frmdatos.select_cine.value != 0){ cambio_pelicula();}	
	</script>
<?php } ?>