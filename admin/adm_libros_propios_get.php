<script>
   function cambio_libro()
   {
		if (document.frmdatos.select_libro.value >0)
	    	var_url = "adm_libros_propios_get&select_libro="+document.frmdatos.select_libro.value;
		else	
			var_url = "adm_libros_propios_get&select_libro=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_libro.value = "1";
	        document.frmdatos.submit();
	    }
	}</script>


<?php
  
	$site_id=mysql_escape_string($_GET['select_libro']);

	// CREAMOS EL COMBO DE CURSOS
   	$cadena_gestion ="";
   	$sql = "select titulo, id from documentacion_propia order by titulo desc";  
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id"] == $site_id){ $selected = "selected"; }
		
		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">".$titulo."</option>";
	}
	
	$query  = "select titulo, id, descripcion, autor, imagen, fecha, anyo, tipo from documentacion_propia WHERE id=".$site_id;

	//echo $query."<br>";

	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
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

		$('#datepicker').datepicker("setDate", new Date("<?php print($line['fecha'])?>") );
	});	
</script>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_libros_propios_int" enctype='multipart/form-data'>

	 <TR><TD colspan="4"><div id="titulo1">BIBLIOTECA PARTICULAR SOBRE LA GRANJA</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Libros</TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_libro" onchange="javascript:{cambio_libro()};" class="input_full">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>

     <TR>
     	<TD align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan="3">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo ($line['titulo'])?>'>
     	</TD>
     </TR>

     <TR>
     	<TD align="left">Autor</TD>
     	<TD valign='top' align='left' colspan="3">
     		<input name='autor' id='autor' type='text' class="input_full" required="required" value='<?php echo ($line['autor'])?>'>
     	</TD>
     </TR>
     
	 <TR>
	   <TD align="left" valign='top'>Descripci�n</TD>
	   <TD valign='top' align='left' colspan="3" >
	      <textarea name="descripcion" rows="15"><?php echo ($line['descripcion'])?></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD align="left" valign='top'>Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small">
	   </TD>
	   <TD align="left" valign='top'>A�o</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="anyo" name="anyo" class="input_tiny" maxlength=4 value='<?php echo $line['anyo']?>' onkeypress="return justNumbers(event);"/>
	   		 
	   </TD>
	</TR>
 	 <TR>
	   <TD align="left" valign='top'>Imagen</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
	       <input name='img_antigua' id='img_antigua' type='hidden' value='<?php echo $line['imagen']?>'>
	
	       <?php if (strlen($line['imagen']) > 0){?>	
		     	<br><br>
		       <b>Imagen actual:</b>
	    	   <br><br>
	       	   <img src="../images/librospropios/<?php echo $line['imagen']?>" width="200px">   
	       <?php }?>	
	       
	   </TD>
	   <TD align="left" valign='top'>Tipo</TD>
	   <TD valign='top' align='left'>
			<select name="tipo">
				<?php
					 for ($i = 0; $i <= count($TIPOS_DOCUMENTACION_PROPIA)-1; $i++) {
					 	$selected = "";
						if ($i==$line["tipo"])
							$selected = " selected ";
						 
    					echo "<option value=".$i.$selected.">".$TIPOS_DOCUMENTACION_PROPIA[$i]."</option>";
					 }
				?>		
			</select> 
	   </TD>
	 </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_libro' value='0'>
  	     </TD>
  	  </TR>  	  
</form>
</TABLE>   

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_libro.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_libro();
	</script>
<?php } ?>