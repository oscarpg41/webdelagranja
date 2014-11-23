<script>
	function cambio_curso()
	{
		if (document.frmdatos.select_curso.value >0)
	     var_url = "adm_cursos_get&select_curso="+document.frmdatos.select_curso.value;
		else	
			var_url = "adm_cursos_get&select_curso=0";
	
		location.href='index.php?dir='+var_url;
	}
	
	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_curso.value = "1";
	        document.frmdatos.submit();
	    }
	}	
</script>
<?php

	$site_id=mysql_escape_string($_GET['select_curso']);
	$mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

	
  	$fecha = time();
  	$dia = date("d",$fecha);
  	$mes = date("m",$fecha);
  	$anio = date("Y",$fecha);


  	// CREAMOS EL COMBO
	$sql = "select titulo, id_curso from cursos order by fecha_ini desc LIMIT 30";
   	$result = mysql_query($sql, $IdConexion);
   	$cadena_combo = "";


   	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		
		if ($rst["id_curso"] == $site_id){
			$selected = "selected";
		}	   		
   		
   		$titulo =substr($rst["titulo"],0,70);
	   	$cadena_combo .="<option value='".$rst["id_curso"]."' ". $selected .">".$titulo."</option>";
   		
	}  

    //Recuperamos la informacion del curso seleccionado
	$query  = "SELECT id_curso, autor, titulo, texto,";
	$query .= " DATE_FORMAT(fecha_ini, '%Y-%m-%d') fechaInicial,";
	$query .= " DATE_FORMAT(fecha_fin, '%Y-%m-%d') fechaFinal";
	$query .= " FROM cursos WHERE id_curso=".$site_id;

   	
	//echo "<br>".$query;
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
	       		maxDate: "+6m",
	       		showOn: "button",
	       		buttonImage: "../images/calendario.jpg",
	       		buttonImageOnly: true
		});

		$('#datepicker').datepicker("setDate", new Date("<?php print($line['fechaInicial'])?>") );  //se inicia con la fecha actual
		$('#datepicker2').datepicker("setDate", new Date("<?php print($line['fechaFinal'])?>") );  //se inicia con la fecha actual
	});
	
</script>



<form name="frmdatos" method="post" action="index.php?dir=adm_cursos_int">

<TABLE width="100%" cellpadding="10" class="border" border="0">

	 <TR><TD colspan="4"><div id="titulo1">CURSOS</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Elige un curso</td>
	    <TD align="left" colspan="3">
	      <SELECT name="select_curso" onchange="javascript:{cambio_curso()};">
	         <option value="" selected></option>
	         <?php echo $cadena_combo?>
	      </select>
	    </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Id</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input name="id_curso" type="text" value="<?php echo $line['id_curso']?>" size="4" disabled>
     	</TD>
     </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo ($line['titulo'])?>'>
     	</TD>
     </TR>

     <TR>
     	<TD class="admin" align="left">Autor</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='autor' id='autor' type='text' class="input_full" value='<?php echo ($line['autor'])?>'>
     	</TD>
     </TR>
     
	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripci�n</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="15"><?php echo ($line['texto'])?></textarea>
	   </TD>
	 </TR>
	      
	 <TR>
	   <TD align="left" class="admin">Fecha Inicio</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="inicio" class="input_small" required="required">
	   </TD>
	   <TD align="left" class="admin">Fecha Fin</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker2" name="fin" class="input_small" required="required">
	   </TD>
	</TR>     

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_curso' value='0'>
  	     </TD>
  	  </TR>   
  	  
</TABLE>   
</form>