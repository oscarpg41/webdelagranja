<script>
	function cambio_curso()
	{
		if (document.frmdatos.select_curso.value >0)
	     var_url = "adm_cursos_get&select_curso="+document.frmdatos.select_curso.value;
		else	
			var_url = "adm_cursos_get&select_curso=0";
	
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
		$("#datepicker2").datepicker({
	       		maxDate: "+6m",
	       		showOn: "button",
	       		buttonImage: "../images/calendario.jpg",
	       		buttonImageOnly: true
		});

		$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
		$('#datepicker2').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});

</script>


<?php
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
   		$titulo =substr($rst["titulo"],0,70);
   		$cadena_combo .="<option value='".$rst["id_curso"]."'>".$titulo."</option>";
	}  
?>

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
	       <input name="id" type="text" value="" size="4" disabled>
     	</TD>
     </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>

     <TR>
     	<TD class="admin" align="left">Autor</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='autor' id='autor' type='text' class="input_full">
     	</TD>
     </TR>
     
	 <TR>
	   <TD class="admin" align="left" valign='top' >Descripción</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="15"></textarea>
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
  	    </TD>
  	</TR>
</TABLE>   
</form>

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
	   document.frmdatos.select_curso.value = <?php echo $_GET['seleccionado'] ?>;
	   cambio_curso();
	</script>
<?php } ?>
