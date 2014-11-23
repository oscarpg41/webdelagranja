<script>
	function cambio_publicidad()
	{
		if (document.frmdatos.select_publicidad.value >0)
	     var_url = "adm_publicidad_get&select_publicidad="+document.frmdatos.select_publicidad.value;
		else	
			var_url = "adm_publicidad_get&select_publicidad=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("¿Desea eliminar el Cliente definitivamente?")) {  
	        document.frmdatos.borrar_publicidad.value = "1";
	        document.frmdatos.submit();
		}
	}	
</script>

<?php
	$site_id=mysql_escape_string($_GET['select_publicidad']);

	//COMBO
   	$sql = "select id_cliente, nombre, fecha_ini, fecha_fin  from publicidad order by fecha_ini";  

   	$result = mysql_query($sql, $IdConexion);
   	$cadena_gestion ="";

   	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id_cliente"] == $site_id){ $selected = "selected"; }
   	
    	$titulo =substr($rst["titulo"],0,70);
    	$cadena_gestion .="<option value='".$rst["id_cliente"]."'". $selected .">(".$rst["fecha_ini"]."/".$rst["fecha_fin"].") . . . ".$rst["nombre"]."</option>";
   	}
   	
   	
	//Recuperar informacion del cliente seleccionado   	 
	$query = "select id_cliente, nombre, web, fecha_ini, fecha_fin, click, impresiones, txt_enlace, orden, activo, email, banner from publicidad where id_cliente=".$site_id;  
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
		$("#datepicker2").datepicker({
	       		maxDate: "+36m",
	       		showOn: "button",
	       		buttonImage: "../images/calendario.jpg",
	       		buttonImageOnly: true
		});

		$('#datepicker').datepicker("setDate", new Date("<?php print($line['fecha_ini'])?>") );
		$('#datepicker2').datepicker("setDate", new Date("<?php print($line['fecha_fin'])?>") );
	});
	
</script>

<form name="frmdatos" method="post" action="index.php?dir=adm_publicidad_int" enctype='multipart/form-data'>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">PUBLICIDAD</div></TD></TR>       
	
	 <TR>
	    <TD valign='top' align='left'>Clientes</TD>
	    <TD align='left' colspan='3'>
              <SELECT name="select_publicidad" class="control" onchange="javascript:{cambio_publicidad()};">
                 <option value="" selected></option>
                 <?php echo $cadena_gestion?>
              </select>
		</TD>
	 </TR>

     <TR>
     	<TD valign='top' align='left'>Nombre</TD>
     	<TD valign='top' align='left'>
     		<input name='nombre' id='nombre' type='text' class="input_full" value="<?php echo $line['nombre']?>">
     	</TD>
		<TD valign='top' align='right' >Email</TD>
     	<TD valign='top' align='left'>
			<input name='email' id='email' type='email' class="input_full" value="<?php echo $line['email']?>">
		</TD>
     </TR>			
	 <TR>
		<TD valign='top' align='left' >Página Web</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='web' id='web' type='text' class="input_full" value="<?php echo $line['web']?>">
	     </TD>
     </TR>			

	 <TR>
	   <TD valign='top' align='left'>Fecha Inicio</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="inicio" class="input_small" required="required">
	   </TD>
	   <TD valign='top' align='right'>Fecha Fin</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker2" name="fin" class="input_small" required="required">
	   </TD>
	</TR>    

	 <TR>
	   <TD valign='top' align='left'>Impresiones</TD>
	   <TD valign='top' align='left'>
	       <input name='impresiones' type='text' class="input_small" maxlength="6" onkeypress="return justNumbers(event);" value="<?php echo $line['impresiones']?>">
	   </TD>
	   <TD valign='top' align='right'>Clicks</TD>
	   <TD valign='top' align='left'>
	       <input name='click' type='text' class="input_small" maxlength="6" onkeypress="return justNumbers(event);" value="<?php echo $line['click']?>">
	   </TD>   
	</TR>

	<TR>
   		<TD valign='top' align='left'>Activo</TD>
   		<TD valign='top' align='left'>
	   	    <select name="activo">
				<option <?php if ($line['activo'] == 0) print "selected" ?> value="0">NO visible</option>
		     	<option <?php if ($line['activo'] == 1) print "selected" ?> value="1">Visible</option>
   	    	</select> 
   		</TD>
   		<TD valign='top' align='right'>Orden</TD>
   		<TD valign='top' align='left'>
	       <input name='orden' type='text' class="input_tiny" maxlength="4" value="<?php echo $line['orden']?>" onkeypress="return justNumbers(event);" value=''>
   		</TD>
 	</TR> 

	<TR>
   		<TD valign='top' align='left'>Cambiar Imagen</TD>
     	<TD valign='top' align='left'>
        	<input type='file' name='file_img'>
     	</TD>
   		<TD valign='top' align='right'>Imagen</TD>
		<TD valign='top' align='left'>
			<input name='img_antigua' type='hidden' value='<?php echo $line["banner"]?>'>
			<img src="../images/publicidad/<?php echo $line['banner']?>") width='150px' border=1>
		</TD>
	 </TR>
	<TR>
   		<TD valign='top' align='left'>Texto del Enlace</TD>
   		<TD valign='top' align='left' colspan='3'>
       		<input name='txt_enlace' type='text' class="input_full" value='<?php echo $line['txt_enlace']?>'>
   		</TD>
 	</TR> 
	<TR>
   		<TD valign='top' align='left'>P&aacute;gina de Estad&iacute;sticas: </TD>
   		<TD valign='top' align='left' colspan='3'>
       		<a href="http://www.webdelagranja.com/statics/stats.php?id=<?php echo $line['txt_enlace']?>" target="_blank">http://www.webdelagranja.com/statics/stats.php?id=<?php echo $line['txt_enlace']?></a> 
   		</TD>
 	</TR> 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
	        <input type='hidden' name='borrar_publicidad' value='0'>
  	     </TD>
  	  </TR>   
</TABLE>
</form>
