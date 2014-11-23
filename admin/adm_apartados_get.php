<script>
	function cambio_apartados()
	{
		if (document.frmdatos.select_apartados.value >0)
	     var_url = "adm_apartados_get&select_apartados="+document.frmdatos.select_apartados.value;
		else	
			var_url = "adm_apartados_get&select_apartados=0";
	
		location.href='index.php?dir='+var_url;
	}
	
   function borrar(){
     if (window.confirm("�Desea eliminarlo definitivamente?")) {  
        document.frmdatos.borrar_apartados.value = "1";
        document.frmdatos.submit();
     }
   }	
   
</script>

<?php
	if (!isset ($_GET['select_apartados']))
		die("???");

	$site_id=mysql_escape_string($_GET['select_apartados']);
	
// CREAMOS EL COMBO 
   $sql = "SELECT id, apartado, titulo FROM apartados_main order by apartado, id";  

   $result = mysql_query($sql, $IdConexion);
   $cadena_gestion ="";

   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		
		if ($rst["id"] == $site_id){
			$selected = "selected";
		}	
   	
     	$titulo =substr($rst["titulo"],0,70);
    	$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">(".$rst["apartado"].") ".$titulo."</option>";
   }
   
   
   
	// Recuperamos la informacion del seleccionado
	$query = "select id, titulo, texto, enlace, apartado FROM apartados_main where id=".$site_id;  

	//echo "<br>".$query;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
?>



<TABLE width="100%" cellpadding="10" class="border">
<form name="frmdatos" method="post" action="index.php?dir=adm_apartados_int">


  	 <tr><td colspan="2"><div id="titulo1">APARTADOS PAGINA PRINCIPAL</div></td></tr>       
  	 
 
<?php if ($actualizados==true) {?>
 <tr>
    <td class="text" align="center" colspan="2" bgcolor="#D85D12">- - - Los datos han sido actualizados - - -</td>
 </tr>
 <tr><td>&nbsp;</td></tr>                  
<?php } ?>
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
    	<TD class="admin" align="left">C�digo apartado<br>
    	</TD>
     	<TD valign='top' align='left'>
     		<SELECT name="apartado">
				<option <?php if ($line['apartado'] == 1) print "selected" ?> value="1">Ayuntamiento</option>
		     	<option <?php if ($line['apartado'] == 2) print "selected" ?> value="2">Deporte</option>
		     	<option <?php if ($line['apartado'] == 4) print "selected" ?> value="4">Can�nigos</option>     			
     		</SELECT>
		</TD>
     </TR>
     
     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value="<?php echo $line['titulo']?>">
     	</TD>
     </TR>			
     <TR>
     	<TD class="admin" align="left">Enlace</TD>
     	<TD valign='top' align='left'>
     		<input name='enlace' id='enlace' type='text' class="input_full" value="<?php echo $line['enlace']?>">
     	</TD>
     </TR>			

     <TR><TD class="admin" align="left" valign="top">Texto</TD>
     		<TD valign='top' align='left'>
     		      <textarea name='texto' rows=15><?php echo $line['texto']?></textarea>
				</TD>
     </TR>	

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="2">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_apartados' value='0'>
  	     </TD>
  	  </TR>   
</table>
</form>