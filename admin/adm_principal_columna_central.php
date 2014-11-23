<?php
     $query = "select id_prin, titulo, texto, imagen, img_width, align_img, txt_enlace, enlace, align_enlace, class_enlace, orden, columna, visible from principal where columna='C' order by orden";  
     $result = MYSQL_QUERY($query);
     //echo $query;
     $i=0;
     mysql_num_rows($result);
     $row=mysql_fetch_array($result);
?>



<form name="frmdatos2" method="post" action="index.php?dir=adm_principal_int" enctype='multipart/form-data'>
<TABLE width="100%" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">APARTADO CENTRAL. Por encima de las columnas</div></TD></TR>       

     <TR>
     	<TD valign='top' align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
	        <input type="hidden" name="id_prin" value='<?php echo $row["id_prin"]?>'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo $row["titulo"]?>'>
     	</TD>
     </TR>
     <TR>
		<TD valign='top' align="left">Imagen</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input name='imagen_old' type='hidden' value="<?php echo $row['imagen']?>">
			<?php if(strlen($line['imagen'])>0){ ?>
	    	   <img src="<?php print($path); ?><?php print($row['imagen'])?>" width="150px"><br>
	       	<?php } ?>
       	   <input type='file' name='file_img'>
	   </TD>   
     </TR>
     <TR>
		<TD valign='top' align="left">Enlazar Imagen</TD>
     	<TD valign='top' align='left' colspan='3'>
		<?php
			if(strlen($row['imagen'])>0){
	    		$linkImagen = "";					
				if(preg_match('#^http://.*#s', $row['imagen'])){
	    			$linkImagen = $row['imagen'];
				}
			}	
     	?>
	        <input type="text" name="linkImage" class="input_full" value="<?php print($linkImagen)?>">
	   </TD>   
     </TR>     
	 <TR>
	   <TD valign='top' align="left">Width Image</TD>
	   <TD valign='top' align='left'>
			<input type="text" id="img_width" name="img_width" maxlength=3 class="input_tiny" onkeypress="return justNumbers(event);" value='<?php echo $row["img_width"]?>' />
	   </TD>   
	   <TD valign='top' align="right">Align image</TD>
	   <TD valign='top' align='left'>
			<select name="align_img">
		    	<option <?php if ($row["align_enlace"]=="left") print "selected" ?> value="left">Left/Izquierda</option>
		     	<option <?php if ($row["align_enlace"]=="right") print "selected" ?> value="right">Right/Derecha</option>
			</select>	   
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Texto</TD>
	   <TD  valign='top' align="left" colspan="3">
	      <textarea name="texto" rows="10"><?php echo $row["texto"]?></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Enlace (link)</TD>
	   <TD valign='top' align="left" colspan='3'>
	       <input type="text" name="enlace" value='<?php echo $row["enlace"]?>' class="input_full">
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Texto del enlace</TD>
	   <TD valign='top' align="left">
			<input type="text" id="txt_enlace" value='<?php echo $row["txt_enlace"]?>' name="txt_enlace" class="input_full" />
	   </TD>   
	   <TD valign='top' align="right">Align link</TD>
	   <TD  valign='top' align="left">
			<select name="align_enlace">
		    	<option <?php if ($row["align_enlace"]=="left") print "selected" ?> value="left">Left/Izquierda</option>
		     	<option <?php if ($row["align_enlace"]=="right") print "selected" ?> value="right">Right/Derecha</option>
			</select>
		</TD>   
	 </TR>




	 <TR>
	   <TD valign='top' align="left">Orden</TD>
	   <TD valign='top' align='left'>
			<input type="text" id="orden" name="orden" value='<?php echo $row["orden"]?>' required="required" maxlength=5 class="input_tiny" onkeypress="return justNumbers(event);" />
	   </TD>   
	   <TD valign='top' align="right">Columna</TD>
	   <TD valign='top' align='left'>
	   		<select name="columna">
	   			<option value="I">Izquierda</option>
	   			<option value="D">Derecha</option>
	   			<option value="C" selected>Central</option>
	   		</select>
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Visible</TD>
	   <TD valign='top' align="left" colspan='3'>
			<select name="visible">
				<option value="1">Si</option>
				<option value="0"  >No</option>
		    	<option <?php if ($row["visible"]=="1") print "selected" ?> value="1">Si</option>
		     	<option <?php if ($row["visible"]=="0") print "selected" ?> value="0">No</option>
			</select>
	   </TD>
	 </TR>

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
  	     	<input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrarImagenPrincipal(document.frmdatos2);" style="margin-left:140px">Borrar Imagen</a>
        	<input type='hidden' name='borrar_registro' value='0'>
  	     </TD>
  	  </TR>


</TABLE>  
</form>




