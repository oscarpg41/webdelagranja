<script>
	function cambio_agenda()
	{
		if (document.frmdatos.select_agenda.value >0)
	     var_url = "adm_agenda_get&select_agenda="+document.frmdatos.select_agenda.value;
		else	
			var_url = "adm_agenda_get&select_agenda=0";
	
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

		$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});
	
</script>

<?php
  $mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

  $hora = date("H");      
  $minutos = date("i");      
  $minutos = (round($minutos /5))*5;

  $fecha = time();
  $dia = date("d",$fecha);
  $mes = date("m",$fecha);
  $anio = date("Y",$fecha);
  $fecha2 =date("Y-m-d",$fecha);
  
  
// CREAMOS EL COMBO

   $sql  = "select id_agenda, fecha, titulo from agenda ";
   $sql .= "where date_format(fecha,'%Y-%m-%d') >='".$fecha2."' order by fecha desc";

   //   $sql = "select id_agenda, fecha, fecha_mostrar, titulo, texto, enlace from agenda order by fecha desc limit 30";  
//   $sql .= 'where date_format(fecha,"%Y") >='.$anio.' and date_format(fecha,"%m") >='.$mes;
//   $sql .= ' and date_format(fecha,"%d") >='.$dia.' order by fecha desc';

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_agenda = "";


   while ($rst=mysql_fetch_array($result)) {
		list($anio2,$mes2,$dia2) = explode("-",$rst["fecha"]);
		$x = $dia2 ."-" .$mes2 ."-" .$anio2;
	   	$titulo =substr($rst["titulo"],0,70);
	   	$cadena_agenda .="<option value='".$rst["id_agenda"]."'>".$x." - ".$titulo."</option>";
	
   }
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_agenda_int" enctype='multipart/form-data'>

	 <TR><TD colspan="4"><div id="titulo1">AGENDA</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Actividad y fecha</TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_agenda" onchange="javascript:{cambio_agenda()};">
	         <option value="" selected></option>
	         <?php echo $cadena_agenda?>
	      </select>
	    </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
	       <input name="id" type="hidden" value="" size="3">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="inicio" class="input_small">
	   </TD>
	   <TD align="left" class="admin">Mostrar Fecha</TD>
	   <TD valign='top' align='left'>
	       <input name='fecha_mostrar' type='text' value='' disabled>
	   </TD>   
	 </TR>
	 <TR>
	   <TD class="admin" align="left" >Hora</TD>
	   <TD align='left' class="letter_small">
	   	  <select name="horas" required="required">
	   	   <option value=""></option> 
	   	   <?php for ($j=8;$j<=24;$j++){ 
	   	        	if ($j <10) $j="0".$j;
		        		print ("<option value=". $j .">". $j ."</option>"); 
		       	 }  
		   ?> 
	          </select> hh    
	          <select name="minutos" required="required"> 
	     	   <option value=""></option> 
		   <?php for ($j=0;$j<60;$j=$j+15){ 
		      		if ($j <10) $j="0".$j;
	                   print ("<option value='". $j ."'>". $j ."</option>");
		      	}  
		   ?> 
	          </select>mm
	   </TD>
	   <TD align="left" class="admin">Lugar</TD>
	   <TD valign='top' align='left'>
	       <input name='lugar' type='text' class="input_full" value=''>
	   </TD>  
	 </TR> 
	 <TR>
	   <TD class="admin" align="left" valign='top' >Texto</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="10"></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD align="left" class="admin">Cine</TD>
	   <TD valign='top' align='left'>
	    	  <select name="cine"> 
	    	     <option selected value="0">No</option>
	    	     <option value="1">Cine</option>
	    	     <option value="2">Teatro</option>
	          </select>
	   </TD>
	   <TD align="left" class="admin">Imagen</TD>
	   <TD valign='top' align='left'>
	       <input type='file' name='file_img'>
	   </TD>   
	 </TR>

	 <TR>
	   <TD align="left" class="textAzulBold">Enlace</TD>
	   <TD valign='top' colspan='3' align='left'>
	       <input type="text" name="enlace" value="" class="input_full">
	   </TD>
	 </TR>
	 
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>
</table>
</form>


<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_agenda.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_agenda();
	</script>
<?php } ?>