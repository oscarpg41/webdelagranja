<script language="javascript" src="../js/ajax.js"></script>
<script>
	function cambio_denuncia()
	{
		if (document.frmdatos.select_denuncia.value >0)
	     var_url = "adm_fotodenuncia_get&select_denuncia="+document.frmdatos.select_denuncia.value;
		else	
			var_url = "adm_fotodenuncia_get&select_denuncia=0";
	
		location.href='index.php?dir='+var_url;
	}   
	//iniciar el calendario
	$(document).ready(function() {
		$("#datepicker").datepicker({
	    	maxDate: "+6m",
	       	showOn: "button",
	       	buttonImage: "../images/calendario.jpg",
	       	buttonImageOnly: true
		});

		$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});   

</script>

<?php

// CREAMOS EL COMBO DE FOTO DENUNCIA

   $sql = "SELECT id_foto, titulo, fecha FROM foto_denuncia order by fecha desc";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   while ($rst=mysql_fetch_array($result)) {
		$titulo =substr($rst["titulo"],0,70);
   		$cadena_gestion .="<option value='".$rst["id_foto"]."'>(".$rst["fecha"].") ".$titulo."</option>";
   }
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_fotodenuncia_int" enctype='multipart/form-data'>
	 <TR><TD colspan="4"><div id="titulo1">FOTO DENUNCIA</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado de fotos</TD>
	    <TD align="left" colspan="3">
      		<SELECT name="select_denuncia" class="control" onchange="javascript:{cambio_denuncia()};">
         		<option value="" selected></option>
         		<?php echo $cadena_gestion?>
      		</SELECT>
	    </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Autor</TD>
     	<TD valign='top' align='left'>
			<input name='autor' id='autor' type='text' required="required" class="input_full">
     	</TD>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small">
	   </TD>
	 </TR>
     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan="3">
			<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
     <TR>
     	<TD class="admin" align="left">Lugar</TD>
     	<TD valign='top' align='left' colspan="3">
			<input name='lugar' id='lugar' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
     <TR>
     	<TD class="admin" align="left">Comentario</TD>
     	<TD valign='top' align='left' colspan="3">
			<textarea name="comentario" rows="10"></textarea>
     	</TD>
     </TR>			
     <TR>
	   <TD valign='top' align='left'>Imagen Nueva</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
	   </TD>
	   <TD colspan="2">&nbsp;</TD>   
	 </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>	 
</form>	 
</TABLE>	 

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_denuncia.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_denuncia();
	</script>
<?php } ?>