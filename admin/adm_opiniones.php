<script>
	function cambio_opinion()
	{
		if (document.frmdatos.select_opinion.value >0)
	     var_url = "adm_opiniones_get&select_opinion="+document.frmdatos.select_opinion.value;
		else	
			var_url = "adm_opiniones_get&select_opinion=0";
	
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
   $sql = "select titulo, id_opinion from opiniones order by fecha desc LIMIT 100";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_opiniones ="";

   $_registro = array();
   $array_zona_opiniones = array( "lista_de" =>$_registro);

   while ($rst=mysql_fetch_array($result)) {
		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id_opinion"]."'>".$titulo."</option>";
   }
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_opiniones_int">

	 <TR><TD colspan="2"><div id="titulo1">OPINIONES</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado</TD>
	    <TD valign='top' align="left">
	      <SELECT name="select_opinion" onchange="javascript:{cambio_opinion()};" class="input_full">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>

	 <TR>
	   <TD align="left" class="textAzulBold">Autor</TD>
	    <TD valign='top' align="left">
			<input name='autor' id='autor' type='text' required="required" class="input_full">
	   </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
	    <TD valign='top' align="left">
	   	    <input name="id" type="hidden" value="" size="3">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small">
	   </TD>
	 </TR>
	 <TR>
	   <TD class="admin" align="left" valign='top' >Texto</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="20"></textarea>
	   </TD>
	 </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="2">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>
</table>
</form>


<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_opinion.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_opinion();
	</script>
<?php } ?>