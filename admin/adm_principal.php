

<script>
  	function delete_main(id){
    	if(confirm("Esta seguro de Borrar el contenido de la página principal?")) {
  			location.href='index.php?dir=adm_principal_int&modo=delete&id='+id;
    	}
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

<form name="frmdatos" method="post" action="index.php?dir=adm_principal_int" enctype='multipart/form-data'>
<TABLE width="100%" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">INTRODUCE UN NUEVO CONTENIDO EN LA PAGINA PRINCIPAL</div></TD></TR>       
	

     <TR>
     	<TD valign='top' align='left'>Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input name="id" type="hidden" value="" size="3">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>
     <TR>
		<TD valign='top' align="left">Subir Imagen</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input type='file' name='file_img'>
	   </TD>   
     </TR>
     <TR>
		<TD valign='top' align="left">Enlazar Imagen</TD>
     	<TD valign='top' align='left' colspan='3'>
	        <input type="text" name="linkImage" class="input_full">
	   </TD>   
     </TR>
	 <TR>
	   <TD valign='top' align="left">Width Image</TD>
	   <TD valign='top' align='left'>
			<input type="text" id="img_width" name="img_width" maxlength=3 class="input_tiny" onkeypress="return justNumbers(event);" />
	   </TD>   
	   <TD valign='top' align="right">Align image</TD>
	   <TD valign='top' align='left'>
			<select name="align_img">
				<option value="left">Left/Izquierda</option>
				<option value="right">Right/Derecha</option>
			</select>	   
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Texto</TD>
	   <TD  valign='top' align="left" colspan="3">
	      <textarea name="texto" rows="10"></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Enlace (link)</TD>
	   <TD valign='top' align="left" colspan='3'>
	       <input type="text" name="enlace" value="" class="input_full">
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Texto del enlace</TD>
	   <TD valign='top' align="left">
			<input type="text" id="txt_enlace" name="txt_enlace" class="input_full" />
	   </TD>   
	   <TD valign='top' align="right">Align link</TD>
	   <TD  valign='top' align="left">
			<select name="align_enlace">
				<option value="left">Left/Izquierda</option>
				<option value="right">Right/Derecha</option>
			</select>
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Orden</TD>
	   <TD valign='top' align='left'>
			<input type="text" id="orden" name="orden" required="required" maxlength=6 class="input_tiny"  />
	   </TD>   
	   <TD valign='top' align="right">Columna</TD>
	   <TD valign='top' align='left'>
			<select name="columna">
				<option value="I">Izquierda</option>
				<option value="D">Derecha</option>
				<option value="C">Central</option>
			</select>  
		</TD>   
	 </TR>
	 <TR>
	   <TD valign='top' align="left">Visible</TD>
	   <TD valign='top' align="left" colspan='3'>
			<select name="visible">
				<option value="1">Si</option>
				<option value="0"  >No</option>
			</select>
	   </TD>
	 </TR>
	 

 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='insertar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>
</table>
</form>


<!------------------------------------------------------->
<br>
<?php 
	@(include('adm_principal_columna_central.php')) or print("adm_principal_columna_central.php no incluido");
?>
<br>


<TABLE cellSpacing="10" cellPadding="0" width="100%" border="0">
<TR>
  <TD width="50%" valign="top">
	<?php
	    $identificadorColumna = "I"; 
		@(include('adm_principal_columnas.php')) or print("adm_principal_columnas.php no incluido");
	?>
  </TD>

  <TD width="50%" valign="top">
	<?php 
	    $identificadorColumna = "D"; 
		@(include('adm_principal_columnas.php')) or print("adm_principal_columnas.php no incluido");
	?>
  </TD>
</TR>
</TABLE>



