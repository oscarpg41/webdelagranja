<script>
	function cambio_denuncia()
	{
		if (document.frmdatos.select_denuncia.value >0)
	     var_url = "adm_fotodenuncia_get&select_denuncia="+document.frmdatos.select_denuncia.value;
		else	
			var_url = "adm_fotodenuncia_get&select_denuncia=0";
	
		location.href='index.php?dir='+var_url;
	}   
   
   function borrar(){
     if (window.confirm("�Desea eliminar la Foto-Denuncia definitivamente?")) {  
        document.frmdatos.borrar_fotodenuncia.value = "1";
        document.frmdatos.submit();
     }
   }	
   
</script>


<?php

	$site_id=mysql_escape_string($_GET['select_denuncia']);
	if ($site_id =="") $site_id = 1;

  
	// CREAMOS EL COMBO DE FOTO DENUNCIA
   $sql = "SELECT id_foto, titulo, fecha FROM foto_denuncia order by fecha desc";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id_foto"] == $site_id){ $selected = " selected"; }
   	
		$titulo =substr($rst["titulo"],0,70);
   		$cadena_gestion .="<option value='".$rst["id_foto"]."'". $selected .">(".$rst["fecha"].") ".$titulo."</option>";
   }
  
  
	$query = "select id_foto, titulo, autor, lugar, fecha, comentario, foto  FROM foto_denuncia where id_foto=".$site_id;  

	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);

	list($anio,$mes,$dia)=explode("-",$line['fecha']);
	//	echo $query."<br>";
?>

<script>
	//iniciar el calendario
	$(document).ready(function() {
		$("#datepicker").datepicker({
	    	maxDate: "+6m",
	       	showOn: "button",
	       	buttonImage: "../images/calendario.jpg",
	       	buttonImageOnly: true
		});

		$('#datepicker').datepicker("setDate", new Date("<?php print($line['fecha'])?>") );  //se inicia con la fecha actual
	});	
</script>

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
			<input name='autor' id='autor' type='text' required="required" class="input_full" value="<?php echo ($line['autor'])?>">
     	</TD>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small">
	   </TD>
	 </TR>
     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan="3">
			<input name='titulo' id='titulo' type='text' required="required" class="input_full" value="<?php echo ($line['titulo'])?>">
     	</TD>
     </TR>			
     <TR>
     	<TD class="admin" align="left">Lugar</TD>
     	<TD valign='top' align='left' colspan="3">
			<input name='lugar' id='lugar' type='text' required="required" class="input_full" value="<?php echo ($line['lugar'])?>">
     	</TD>
     </TR>			
     <TR>
     	<TD class="admin" align="left">Comentario</TD>
     	<TD valign='top' align='left' colspan="3">
			<textarea name="comentario" rows="10"><?php echo ($line['comentario'])?></textarea>
     	</TD>
     </TR>
     <TR>
	   <TD valign='top' align='left'>Imagen Nueva</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
	   </TD>   
	   <TD valign='top' align='left'>Imagen Antigua</TD>
	   <TD valign='top' align='left'>
			<input name='img_antigua' type='hidden' value='<?php echo $line["foto"]?>'>
			<?php if(strlen($line['foto'])>0){ ?>
				<img src="../images/denuncia/<?php echo $line['foto']?>") width='150px'>	    	   
	       	<?php } ?>
	   </TD>    	
	 </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_fotodenuncia' value='0'>
  	     </TD>
  	  </TR>  	  
</form>	 
</TABLE>