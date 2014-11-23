<script>
	function cambio_pelicula()
	{
		if (document.frmdatos.select_cine.value >0)
	     	var_url = "adm_cine_get&select_cine="+document.frmdatos.select_cine.value;
		else	
			var_url = "adm_cine_get&select_cine=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_pelicula.value = "1";
	        document.frmdatos.submit();
	    }
	}	

</script>

<?php

  	$site_id=mysql_escape_string($_GET['select_cine']);

	// 	CREAMOS EL COMBO

   	$sql  = "select id, nombre from cine order by nombre";

   	//echo $sql;
   	$result = mysql_query($sql, $IdConexion);
   	$cadena_gestion = "";


   	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id"] == $site_id){ $selected = " selected"; }
   	
	   	$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">". $rst["nombre"] ."</option>";
   	}
   
   
   
	$query  = "select id, nombre, anyo, descripcion, disponible from cine WHERE id=".$site_id;

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

		$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});
	
</script>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_cine_int">

	 <TR><TD colspan="4"><div id="titulo1">CINE</div></TD></TR>       
	
	 <TR>
	    <TD valign='top' align='left'>Listado de pel�culas</TD>
	    <TD valign='top' align='left' colspan='3'>
	      <SELECT name="select_cine" onchange="javascript:{cambio_pelicula()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD valign='top' align='left'>T�tulo</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='nombre' id='nombre' type='text' required="required" class="input_full" value='<?php echo $line['nombre']?>'>
     	</TD>
     </TR>			
	 <TR>
	   <TD valign='top' align='left'>Descripcion</TD>
	   <TD valign='top' align='left' colspan='3'>
	      <textarea name="descripcion" rows="20"><?php echo ($line['descripcion'])?></textarea>
	   </TD>
	 </TR>
	 <TR>
	   <TD valign='top' align='left'>A�o</TD>
	   <TD valign='top' align='left'>
	   		<input name='anyo' type='text' class="input_tiny" value='<?php echo $line['anyo']?>' maxlength="4" onkeypress="return justNumbers(event);">
	   </TD>
	   <TD valign='top' align='right'>Disponible</TD>
	   <TD valign='top' align='left'>
			<SELECT name="visible">
		     	<option <?php if ($line['disponible'] == 0) print "selected" ?> value="0">No</option>
		     	<option <?php if ($line['disponible'] == 1) print "selected" ?> value="1">Si</option>
			</SELECT>
	   </TD>

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_pelicula' value='0'>	        
  	     </TD>
  	  </TR>   
</table>
</form>


<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_cine.value = <?php echo $_GET['seleccionado'] ?>;
		if(document.frmdatos.select_cine.value != 0){ cambio_pelicula();}	
	</script>
<?php } ?>