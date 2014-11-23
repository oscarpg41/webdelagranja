<?php
 $query = "select id_prin, titulo, texto, imagen, img_width, align_img, txt_enlace, enlace, align_enlace, class_enlace, orden, columna, visible from principal where columna='". $identificadorColumna ."' order by orden";  
 $result = MYSQL_QUERY($query);
 echo $query;
 mysql_num_rows($result);
 while ($row=mysql_fetch_array($result)){
?>
<form name='main<?php echo $row["id_prin"]?>' method='POST' action='index.php?dir=adm_principal_int' enctype='multipart/form-data'>
<TABLE width="100%" class="border" border="0" style="margin-bottom:10px">
	<TR><TD colspan="4">
		<div id="titulo1"><?php echo $row["titulo"]?></div>
	<TR>
		<TD colspan="4" class='tdPrincipal'>

	<?php
	$imagenBD = "";
	if(strlen($row['imagen'])>0){

		if ( (preg_match('#^http://.*#s', $row['imagen'])) || (preg_match('#^https://.*#s', $row['imagen'])) ) 
		{
	    	print ('<img src="'. $row['imagen']. '" align="'.$row["align_img"].'" id="img'.$row["align_img"].'" width="100px">');
		}
		else{
    		echo '<IMG src="../images/'.$row["imagen"].'" align="'.$row["align_img"].'" id="img'.$row["align_img"].'" width="100px">';
		}	
	}	

	print($row["texto"]);

	if (Strlen($row["enlace"])>0)
    	echo '<br><A href="'.$row["enlace"].'" class="negro">'.$row["txt_enlace"].'</a>';	
	?>
		</TD>
	</TR>
	<TR>
    	<TD valign='top' align='left' class='tdPrincipal'>Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
	    	<input type="hidden" name="id_prin" value='<?php echo $row["id_prin"]?>'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo $row["titulo"]?>'>
		</TD>
	</TR>
     <TR>
		<TD valign='top' align="left" class='tdPrincipal'>Imagen</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input name='imagen_old' type='hidden' value="<?php echo $row['imagen'] ?>">
			<?php //if(strlen($row['imagen'])>0){ ?>
	    	   <!-- img src="<?php print($path); ?><?php print($row['imagen'])?>" width="150px"><br-->
	       	<?php //} ?>
       	   <input type='file' name='file_img'>
	   </TD>   
     </TR>

     <TR>
		<TD valign='top' align="left" class='tdPrincipal'>Enlazar Imagen</TD>
     	<TD valign='top' align='left' colspan='3'>
		<?php
			$linkImagen = "";
			if(strlen($row['imagen'])>0){	    							
				if ( (preg_match('#^http://.*#s', $row['imagen'])) || (preg_match('#^https://.*#s', $row['imagen'])) ){
	    			$linkImagen = $row['imagen'];
				}
			}	
     	?>
	        <input type="text" name="linkImage" class="input_full" value="<?php print($linkImagen)?>">
	   </TD>   
     </TR>     

     
	 <TR>
	   <TD valign='top' align="left"  class='tdPrincipal'>Width Image</TD>
	   <TD valign='top' align='left'>
			<input type="text" id="img_width" name="img_width" maxlength=3 class="input_tiny" onkeypress="return justNumbers(event);" value='<?php echo $row["img_width"]?>' />
	   </TD>   
	   <TD valign='top' align="right"  class='tdPrincipal'>Align image</TD>
	   <TD valign='top' align='left'>
			<select name="align_img">
		    	<option <?php if ($row["align_img"]=="left") print "selected" ?> value="left">Left/Izquierda</option>
		     	<option <?php if ($row["align_img"]=="right") print "selected" ?> value="right">Right/Derecha</option>
			</select>	   
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left"  class='tdPrincipal'>Texto</TD>
	   <TD  valign='top' align="left" colspan="3">
	      <textarea name="texto" rows="10"><?php echo $row["texto"]?></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align="left"  class='tdPrincipal'>Enlace (link)</TD>
	   <TD valign='top' align="left" colspan='3'>
	       <input type="text" name="enlace" value='<?php echo $row["enlace"]?>' class="input_full">
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align="left"  class='tdPrincipal'>Texto del enlace</TD>
	   <TD valign='top' align="left">
			<input type="text" id="txt_enlace" value='<?php echo $row["txt_enlace"]?>' name="txt_enlace" class="input_full" />
	   </TD>   
	   <TD valign='top' align="right"  class='tdPrincipal'>Align link</TD>
	   <TD  valign='top' align="left">
			<select name="align_enlace">
		    	<option <?php if ($row["align_enlace"]=="left") print "selected" ?> value="left">Left/Izquierda</option>
		     	<option <?php if ($row["align_enlace"]=="right") print "selected" ?> value="right">Right/Derecha</option>
			</select>
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left"  class='tdPrincipal'>Orden</TD>
	   <TD valign='top' align='left'>
			<input type="text" id="orden" name="orden" value='<?php echo $row["orden"]?>' required="required" maxlength=6 class="input_tiny" />
	   </TD>   
	   <TD valign='top' align="right"  class='tdPrincipal'>Columna</TD>
	   <TD valign='top' align='left'>
	   		<select name="columna">
	   			<option value="I" selected>Izquierda</option>
	   			<option value="D">Derecha</option>
		    	<option <?php if ($row["columna"]=="I") print "selected" ?> value="I">Izquierda</option>
		     	<option <?php if ($row["columna"]=="D") print "selected" ?> value="D">Derecha</option>
	   		</select>
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left"  class='tdPrincipal'>Visible</TD>
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
		    <a class="button" href="javascript:delete_main(<?php echo $row["id_prin"]?>);" style="margin-left:40px">Borrar Registro</a>
		    <a class="button" href="javascript:borrarImagenPrincipal(main<?php echo $row["id_prin"]?>);" style="margin-left:40px">Borrar Imagen</a>
  	     </TD>
  	  </TR>
</TABLE>  
</form>
<?php          	
 }
?>



