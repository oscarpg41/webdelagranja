<script>
	function cambio_agenda()
	{
		if (document.frmdatos.select_agenda.value >0)
	     var_url = "adm_agenda_get&select_agenda="+document.frmdatos.select_agenda.value;
		else	
			var_url = "adm_agenda_get&select_agenda=0";
	
		location.href='index.php?dir='+var_url;
	}
	
	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_agenda.value = "1";
	        document.frmdatos.submit();
	    }
	}
</script>

<?php

  $site_id=mysql_escape_string($_GET['select_agenda']);
   

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
   		$selected = "";	
		if ($rst["id_agenda"] == $site_id){ $selected = " selected"; }
   	
	   	list($anio2,$mes2,$dia2) = explode("-",$rst["fecha"]);
		$x = $dia2 ."-" .$mes2 ."-" .$anio2;
	   	$titulo =substr($rst["titulo"],0,70);
	   	$cadena_agenda .="<option value='".$rst["id_agenda"]."'". $selected .">".$x." - ".$titulo."</option>";
   	}

	// Recuperamos la informacion del seleccionado
	$query = "select id_agenda, fecha_mostrar, titulo, texto, enlace, imagen, cine, hora, lugar, DATE_FORMAT(fecha, '%Y-%m-%d') fecha "; 
	$query.= " FROM agenda WHERE id_agenda=".$site_id;
   	
	//echo "<br>".$query;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);

	list($hh, $mm) = split('[:/.-]', $line['hora']);

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

		$('#datepicker').datepicker("setDate", new Date("<?php print($line['fecha'])?>") );  //se inicia con la fecha actual
	});	

</script>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_agenda_int" enctype='multipart/form-data'>

	 <tr><td colspan="4"><div id="titulo1">AGENDA</div></td></tr>       
	
	 <tr>
	    <td class="text" align="left">Actividad y fecha</td>
	    <td align="left" colspan="3">
	      <SELECT name="select_agenda" onchange="javascript:{cambio_agenda()};">
	         <option value="" selected></option>
	         <?php echo $cadena_agenda?>
	      </select>
	    </td>
	 </tr>


     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name="id" type="hidden" value="<?php echo $line['id_agenda']?>" size="3">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo $line['titulo']?>'>
     	</TD>
     </TR>			
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="inicio" class="input_small">
	   </TD>
	   <TD align="left" class="admin">Mostrar Fecha</TD>
	   <TD valign='top' align='left'>
	       <input name='fecha_mostrar' type='text' value='<?php echo $line['fecha_mostrar']?>' disabled>
	   </TD>   
	 </TR>
	 <TR>
	   <TD class="admin" align="left" >Hora</TD>
	   <TD valign='top' align='left'>

		<select name="horas">
	   	    <option value=""></option> 
			   <?php for ($j=8;$j<=24;$j++){ 
		   	        	if ($j <10) $j="0".$j;
			        	if ($j== $hh)	
				        	print ("<option selected value=". $j .">". $j ."</option>"); 
			        	else	
				        	print ("<option value=". $j .">". $j ."</option>"); 
			       	 }  
			   ?> 
		</select> hh    
		<select name="minutos"> 
			<option value=""></option> 
			   <?php for ($j=0;$j<60;$j=$j+15){ 
						if ($j <10) $j="0".$j;
				    	if ($j== $mm)
		                	print ("<option selected value='". $j ."'>".$j ."</option>");
						else
		                	print ("<option value='". $j ."'>". $j ."</option>");
			      	}  
			   ?> 
		</select>mm


	   </TD>
	   <TD align="left" class="admin">Lugar</TD>
	   <TD valign='top' align='left'>
	       <input name='lugar' type='text' class="input_full" value='<?php echo $line['lugar']?>'>
	   </TD>  
	 </TR> 
	 <TR>
	   <TD class="admin" align="left" valign='top'>Texto</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="10"><?php echo $line['texto']?></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD align="left" class="admin" valign="top">Cine</TD>
	   <TD valign='top' align='left'>
	   	  <select name="cine"> 
		     <option <?php if ($line['cine'] == 0) print "selected" ?> value="0">No</option>
		     <option <?php if ($line['cine'] == 1) print "selected" ?> value="1">Cine</option>
		     <option <?php if ($line['cine'] == 2) print "selected" ?> value="2">Teatro</option>
    	  </select>
	          
	   </TD>
	   <TD align="left" class="admin" valign="top">Imagen</TD>
	   <TD valign='top' align='left'>
	       <input name='imagen_old' type='hidden' size='40' value="<?php echo $line['imagen']?>">
			<?php if(strlen($line['imagen'])>0){ ?>
	    	   <img src="../images/agenda/<?php echo $line['imagen']?>" width="150px"><br>
	       	<?php } ?>
       	   <input type='file' name='file_img'>
	   </TD>   
	 </TR>

	 <TR>
	   <TD align="left" class="textAzulBold">Enlace</TD>
	   <TD valign='top' colspan='3' align='left'>
	       <input type="text" name="enlace" value="<?php echo $line['enlace']?>" class="input_full">
	   </TD>
	 </TR>
	 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_agenda' value='0'>
  	     </TD>
  	  </TR>
</form>
</table>
