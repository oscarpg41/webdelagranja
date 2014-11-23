<script>
	function cambio_opinion()
	{
		if (document.frmdatos.select_opinion.value >0)
	     var_url = "adm_opiniones_get&select_opinion="+document.frmdatos.select_opinion.value;
		else	
			var_url = "adm_opiniones_get&select_opinion=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_opinion.value = "1";
	        document.frmdatos.submit();
	    }
	}
</script>
	

<?php
	$site_id=mysql_escape_string($_GET['select_opinion']);

	//COMBO
	$sql = "select titulo, id_opinion from opiniones order by fecha desc LIMIT 100";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_opiniones ="";

   $_registro = array();
   $array_zona_opiniones = array( "lista_de" =>$_registro);

   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id_opinion"] == $site_id){ $selected = " selected"; }
   	
		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id_opinion"]."'". $selected .">".$titulo."</option>";
   }
   
   

   //INFORMACION SELECCIONADA
	$query  = "SELECT ID_OPINION, AUTOR, TITULO, TEXTO, FECHA";
	$query .= " FROM opiniones WHERE ID_OPINION=".$site_id;

	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
	
	//echo $query."<br>";
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

		$('#datepicker').datepicker("setDate", new Date("<?php print($line['FECHA'])?>") );		
	});
	
</script>



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
			<input name='autor' id='autor' type='text' required="required" class="input_full" value='<?php echo ($line['AUTOR'])?>'>
	   </TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
	    <TD valign='top' align="left">Id:<?php echo $line['ID_OPINION']?>
	   	    <input name="id" type="hidden" value="<?php echo $line['ID_OPINION']?>">
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo ($line['TITULO'])?>'>
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
	      <textarea name="texto" rows="20"><?php echo ($line['TEXTO'])?></textarea>
	   </TD>
	 </TR>
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_opinion' value='0'>
  	     </TD>
  	  </TR>
</table>
</form>