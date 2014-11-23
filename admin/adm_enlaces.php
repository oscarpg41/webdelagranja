<script>
	function cambio_enlaces()
	{
		if (document.frmdatos.select_enlace.value >0)
	     var_url = "adm_enlaces_get&select_enlace="+document.frmdatos.select_enlace.value;
		else	
			var_url = "adm_enlaces_get&select_enlace=0";
	
		location.href='index.php?dir='+var_url;
	}
</script>

<?php
// CREAMOS EL COMBO

   $sql  = "select id_enlace, nombre from enlaces";

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_enlaces = "";


   while ($rst=mysql_fetch_array($result)) {
	   	$cadena_enlaces .="<option value='".$rst["id_enlace"]."'>". $rst["nombre"] ."</option>";
   }
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
     		<input name='nombre' id='nombre' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
     <TR>
	   <TD align="left" class="admin">Url</TD>
	   <TD valign='top' align='left' colspan='3'>
			<input type="url" id="web" name="web" placeholder="http://" class="input_full">
	   </TD>  
	 </TR> 
	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripcion</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="descripcion" rows="10"></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD align="left" class="admin">Visible</TD>
	   <TD valign='top' align='left'>
			<SELECT name="visible">
				<option value="0">No</option>
				<option value="1">Si</option>
			</SELECT>
	   </TD>
	   <TD align="right">Clicks</TD>
	   <TD valign='top' align='left'>
	       <input name='click' type='text' class="input_tiny" maxlength="4" onkeypress="return justNumbers(event);">
	   </TD>   
	 </TR>

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
		document.frmdatos.select_enlace.value = <?php echo $_GET['seleccionado'] ?>;
		if(document.frmdatos.select_enlace.value != 0){ cambio_enlaces();}	
	</script>
<?php } ?>