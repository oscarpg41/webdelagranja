<script>
	function cambio_destacada()
	{
		if (document.frmdatos.select_destacada.value >0)
	     var_url = "adm_zonadestacada_get&select_destacada="+document.frmdatos.select_destacada.value;
		else	
			var_url = "adm_zonadestacada_get&select_destacada=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
	    if (window.confirm("�Desea eliminar la Noticia Destacada definitivamente?")) {  
	       document.frmdatos.borrar_destacada.value = "1";
	       document.frmdatos.submit();
	    }
	  }	
</script>

<?php

	$site_id=mysql_escape_string($_GET['select_destacada']);
	
	// CREAMOS EL COMBO 
   $sql = "SELECT id, titulo FROM nota_destacada order by id";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		if ($rst["id"] == $site_id){ $selected = " selected"; }
   	
		$titulo =substr($rst["titulo"],0,70);
   		$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">".$titulo."</option>";
   }
  
   
	$query = "select id, titulo, texto, enlace, imagen  FROM nota_destacada where id=".$site_id;  
	//echo $query."<br>";

	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
?>

<form name="frmdatos" method="post" action="index.php?dir=adm_zonadestacada_int" enctype='multipart/form-data'>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">AGENDA</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado</TD>
	    <TD align="left" colspan="3">
	      	<SELECT name="select_destacada" onchange="javascript:{cambio_destacada()};">
         		<option value="" selected></option>
         		<?php echo $cadena_gestion?>
      		</select>
	      
	    </TD>
	 </TR>

     <TR>
     	<TD valign='top' align='left'>Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input name="id" type="hidden" value="" size="3">
     		<input name='titulo' id='titulo' type='text' value="<?php echo ($line['titulo'])?>" required="required" class="input_full">
     	</TD>
     </TR>			
	 <TR>
   		<TD valign='top' align='left'>Enlace</TD>
   		<TD valign='top' align='left' colspan="3">
       		<input type="text" name="enlace" id="enlace" value="<?php echo ($line['enlace'])?>" required="required" class="input_full">
   		</TD>   
 	</TR>
	 <TR>
	   <TD valign='top' align='left'>Texto</TD>
	   <TD valign='top' align='left' colspan='3'>
	      <textarea name="texto" rows="20"><?php echo ($line['texto'])?></textarea>
	   </TD>
	 </TR>
	 <TR>
   		<TD valign='top' align='left'>Url imagen</TD>
   		<TD valign='top' align='left'>
       		<input type="text" name="imagenUrl" id="imagenUrl" class="input_full">
       		No permite definir imagenes de otros directorios
   		</TD>   
 	</TR>	 	 
	 <TR>
	   <TD valign='top' align='left'>Cambiar Imagen</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
	   </TD>   
	   <TD valign='top' align='right'>Imagen</TD>
   	   <TD valign='top' align='left'>
   	   		<input name='img_antigua' type='hidden' value='<?php echo $line["imagen"]?>'>
   	   		<img src="../images/<?php echo $line['imagen']?>") width='250px'>
   	   </TD>
 </TR>

 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_destacada' value='0'>	        
  	     </TD>
  	  </TR>
</form>
</TABLE>