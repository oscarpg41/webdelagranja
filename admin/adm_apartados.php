<script>
	function cambio_apartados()
	{
		if (document.frmdatos.select_apartados.value >0)
	     var_url = "adm_apartados_get&select_apartados="+document.frmdatos.select_apartados.value;
		else	
			var_url = "adm_apartados_get&select_apartados=0";
	
		location.href='index.php?dir='+var_url;
	}	
</script>

<?php

// CREAMOS EL COMBO 

   $sql = "SELECT id, apartado, titulo FROM apartados_main order by apartado, id";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   $_registro = array();
   $array_destacada = array( "lista_de" =>$_registro);

   while ($rst=mysql_fetch_array($result)) {
    
     	$titulo =substr($rst["titulo"],0,70);
    	$cadena_gestion .="<option value='".$rst["id"]."'>(".$rst["apartado"].") ".$titulo."</option>";

   }
?>

<TABLE width="100%" cellpadding="10" class="border">
<form name="frmdatos" method="post" action="index.php?dir=adm_apartados_int">

 <tr><td colspan="2"><div id="titulo1">APARTADOS PAGINA PRINCIPAL</div></td></tr>       

	<tr>
	    <td class="text" align="left">Apartados</td>
	    <td align="left">
	      <SELECT name="select_apartados" onchange="javascript:{cambio_apartados()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </td>
	</tr>

	<TR>
    	<TD class="admin" align="left">Código apartado<br>
    	</TD>
     	<TD valign='top' align='left'>
     		<SELECT name="apartado">
     			<option value="1">Ayuntamiento</option>
     			<option value="2">Deporte</option>
     			<option value="4">Canónigos</option>
     		</SELECT>
		</TD>
     </TR>
     
     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full">
     	</TD>
     </TR>			
     <TR>
     	<TD class="admin" align="left">Enlace</TD>
     	<TD valign='top' align='left'>
     		<input name='enlace' id='enlace' type='text' class="input_full">
     	</TD>
     </TR>			

     <TR><TD class="admin" align="left" valign="top">Texto</TD>
     		<TD valign='top' align='left'>
     		      <textarea name='texto' rows=15></textarea>
				</TD>
     </TR>	

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="2">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
        	<input type='hidden' name='borrar_apartados' value='0'>
  	     </TD>
  	  </TR>   
</table>
</form>
<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_apartados.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_apartados();
	</script>
<?php } ?>