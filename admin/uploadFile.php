	<script type="text/javascript">	
		var ficheros = [{'id_fichero':'images','fichero':'images'},{'id_fichero':'files','fichero':'files'}];
		var directorios	=  [{'id_directorio':'agenda','id_fichero':'images','directorio':'agenda'},
							{'id_directorio':'canonigos','id_fichero':'images','directorio':'canonigos'},
							{'id_directorio':'cine','id_fichero':'images','directorio':'cine'},
							{'id_directorio':'cineverano','id_fichero':'images','directorio':'cineverano'},
							{'id_directorio':'cultura','id_fichero':'images','directorio':'cultura'},
							{'id_directorio':'deportes','id_fichero':'images','directorio':'deportes'},
							{'id_directorio':'denuncia','id_fichero':'images','directorio':'denuncia'},
							{'id_directorio':'misc','id_fichero':'images','directorio':'misc'},
							{'id_directorio':'noticias','id_fichero':'images','directorio':'noticias'},
							{'id_directorio':'canonigos','id_fichero':'files','directorio':'canonigos'},
							{'id_directorio':'cultura','id_fichero':'files','directorio':'cultura'},
							{'id_directorio':'deportes','id_fichero':'files','directorio':'deportes'},
							{'id_directorio':'plenos','id_fichero':'files','directorio':'plenos'}];

		$(document).ready(function() {
		var sficheros = '<option value=""></option>';
		$(ficheros).each(function(i){
			sficheros += '<option value="'+this.id_fichero+'">'+this.fichero+'</option>';
		});
		$('#ficheros').html(sficheros);
		$('#ficheros').change(function(){ // evento que al ser modificado el select ficheros es llamado
			var fichero = $('#ficheros').val(); //obtenemos el fichero seleccionado
			var pdirectorios = $.grep(directorios,function(n,i){return (n.id_fichero == fichero); }); //filtramos por fichero
			var sdirectorios = '<option value=""></option>';
			$(pdirectorios).each(function(i){ //recorremos cada uno de los directorios previamente filtrados
				sdirectorios += '<option value="'+this.id_directorio+'">'+this.directorio+'</option>'; //vamos  creando el select
			});
			$('#directorios').html(sdirectorios); //el html generado se asigna al select de directorios
		});
	});
	</script>

<form name="frmdatos" method="post" action="uploadFile2.php" enctype='multipart/form-data'>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">SUBIR FICHERO</div></TD></TR>       
	 <TR>
	   <TD valign='top' align='left'>Eliga fichero</TD>
	   <TD valign='top' align='left' colspan='3'>
	       <input type='file' name='file_img'>
	   </TD>   
	 </TR>
     <TR>
     	<TD valign='top' align='left' width='25%'>Tipo de fichero</TD>
        <TD valign='top' align='left' width='25%'>
         		<select id='ficheros' name='ficheros'></select>
         </TD>
     	<TD valign='top' align='left' width='25%'>Directorio</TD>
        <TD valign='top' align='left' width='25%'>
				<select id='directorios' name='directorios'></select>
         </TD>
     </TR>                  
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>
</TABLE>
</form>
<?php
	if (isset($_GET['error'])){
		if($_GET['error'] == '1')		
			pritn("<p class='message error'>Se ha producido un error al subir el fichero</p>");
		else
			print("<p class='message success'>Subida correcta</p>");
	} 
?>


