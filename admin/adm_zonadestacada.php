<script>
	function cambio_destacada()
	{
		if (document.frmdatos.select_destacada.value >0)
	     var_url = "adm_zonadestacada_get&select_destacada="+document.frmdatos.select_destacada.value;
		else	
			var_url = "adm_zonadestacada_get&select_destacada=0";
	
		location.href='index.php?dir='+var_url;
	}


</script>

<?php
// CREAMOS EL COMBO 

   $sql = "SELECT id, titulo FROM nota_destacada order by id";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   while ($rst=mysql_fetch_array($result)) {
		$titulo =substr($rst["titulo"],0,70);
   		$cadena_gestion .="<option value='".$rst["id"]."'>".$titulo."</option>";
   }
  
  
  
?>

<form name="frmdatos" method="post" action="index.php?dir=adm_zonadestacada_int" enctype='multipart/form-data'>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="2"><div id="titulo1">AGENDA</div></TD></TR>       
	
	 <TR>
	    <TD valign='top' align='left'>Listado</TD>
	    <TD valign='top' align='left'>
	      	<SELECT name="select_destacada" onchange="javascript:{cambio_destacada()};">
         		<option value="" selected></option>
         		<?php echo $cadena_gestion?>
      		</select>
	      
	    </TD>
	 </TR>

     <TR>
     	<TD valign='top' align='left'>Titulo</TD>
     	<TD valign='top' align='left'>
	       <input name="id" type="hidden" value="" size="3">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
	 <TR>
   		<TD valign='top' align='left'>Enlace</TD>
   		<TD valign='top' align='left'>
       		<input type="text" name="enlace" id="enlace" required="required" class="input_full">
   		</TD>   
 	</TR>
	 <TR>
	   <TD class="admin" align="left" valign='top' >Texto</TD>
	   <TD valign='top' align='left'>
	      <textarea name="texto" rows="20"></textarea>
	   </TD>
	 </TR>
	 <TR>
   		<TD valign='top' align='left'>Url imagen</TD>
   		<TD valign='top' align='left'>
       		<input type="text" name="imagenUrl" id="imagenUrl" class="input_full">
   		</TD>   
 	</TR>	 
	 <TR>
	   <TD align="left" class="admin">Nueva Imagen</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
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
		document.frmdatos.select_destacada.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_destacada();
	</script>
<?php } ?>