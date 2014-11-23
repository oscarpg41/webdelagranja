<script>
	function cambio_novedades()
	{
		if (document.frmdatos.select_novedades.value >0)
	     var_url = "adm_novedades&select_novedades="+document.frmdatos.select_novedades.value;
		else	
			var_url = "adm_novedades&select_novedades=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("¿Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_novedad.value = "1";
	        document.frmdatos.submit();
	    }
	}	
</script>




<?php

	$site_id=mysql_escape_string($_GET['select_novedades']);
	
   	$action = 0;   	
  	if ($_POST["borrar_novedad"] == 1){ 
  	
		$sql = "DELETE FROM novedades WHERE id_novedad=". $_POST["select_novedades"];
  		$modo = "EL BORRADO";
  		$action = 1;
  	}
  	else{
  		if ($_POST["modificar"] == 1){
  			$action = 1;
    		$titulo = $_POST["titulo"];
    		$enlace	= $_POST["enlace"];
    		$id	= $_POST["id"];
  			
	  		if (strlen($id>0)){
	        	$sql = "UPDATE novedades set titulo='". $titulo ."', enlace='". $enlace ."' where id_novedad=".$id;
	         	$modo = "UPDATE";
			}
	  		else{
	         	$sql = "INSERT into novedades(titulo, enlace) values ('". $titulo ."','". $enlace ."')";
	         	$modo = "INSERT";
			}
  		}
  	}

  	if ($action == 1){
		$result = MYSQL_QUERY($sql);
	    if (!$result)
	    {
			echo $sql;
	     	$msg = "No ha sido posible realizar ".$modo.".  Error =".mysql_error($IdConexion);
		}   
	    else
	    {
	        mysql_query("COMMIT"); // efectuamos el commit ahora
	        //$msg = "Se ha realizado la ". $modo ." correctamente.";
	    }
  	}
  	
	// CREAMOS EL COMBO
   	$sql  = "select id_novedad, titulo from novedades";

   	$result = mysql_query($sql, $IdConexion);
   	$cadena_gestion = "";


   	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		if ($rst["id_novedad"] == $site_id){ $selected = " selected";}
		
	   	$cadena_gestion .="<option value='".$rst["id_novedad"]."'". $selected .">". $rst["titulo"] ."</option>";
   	}
  	
  	
  	
?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
</script>

<?php   	
  	
   	$titulo = "";
   	$enlace = "";
   	if (strlen($site_id)> 0){
		// Recuperamos la informacion del seleccionado
		$query = "select id_novedad, titulo, enlace from novedades WHERE id_novedad=".$site_id;
   	
		//echo "<br>".$query;
		$result=mysql_query($query);
		$line=mysql_fetch_array ($result);

		$titulo = $line['titulo'];
		$enlace = $line['enlace'];   		
   	}
   	
   	
   	
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_novedades">

	 <TR><TD colspan="4"><div id="titulo1">NOVEDADES</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado de novedades</TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_novedades" onchange="javascript:{cambio_novedades()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD class="admin" align="left">Nombre</TD>
     	<TD valign='top' align='left' colspan='3'>
     	    <input type="hidden" id="id" name="id" value='<?php echo $site_id?>'>
     		<input name='titulo' id='titulo' type='text' required="required" class="input_full" value='<?php echo $titulo?>'>
     	</TD>
     </TR>			
     <TR>
	   <TD align="left" class="admin">Url</TD>
	   <TD valign='top' align='left' colspan='3'>
			<input type="text" id="enlace" name="enlace" required="required" class="input_full" value='<?php echo $enlace?>'>
	   </TD>  
	 </TR> 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
			<input type='hidden' name='modificar' value='1'>  	     
	        <input type="submit" value="Guardar" />
<?php
   		if (strlen($site_id)> 0){
?>	        
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_novedad' value='0'>
<?php	}?>	        
  	     </TD>
  	  </TR>   
</table>
</form>

<?php if (isset ($id)) { ?>  	
	<script>
		document.frmdatos.select_novedades.value = <?php echo $id ?>;
		cambio_novedades();
	</script>
<?php } ?>