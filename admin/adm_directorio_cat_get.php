<script>
	function cambio_categoria()
	{
		if (document.frmdatos.select_categoria.value >0)
	     var_url = "adm_directorio_cat_get&select_categoria="+document.frmdatos.select_categoria.value;
		else	
			var_url = "adm_directorio_cat_get&select_categoria=0";
	
		location.href='index.php?dir='+var_url;
	}   

	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_categoria.value = "1";
	        document.frmdatos.submit();
	    }
	}
</script>

<?php

	$site_id=mysql_escape_string($_GET['select_categoria']);

	//CREAMOS EL COMBO DE categorias del directorio
   	$sql = "select id_categoria, nombre from cat_directorio order by id_categoria";  

   	//echo $sql;
   	$result = mysql_query($sql, $IdConexion);
   	$optionsCategorias ="";

   	$num = 0;
   	while ($row=mysql_fetch_array($result)) {
   		$selected = "";
		
		if ($row["id_categoria"] == $site_id){
			$selected = "selected";
		}
   		
    	$optionsCategorias .= "<option value='" .$row["id_categoria"]."'". $selected .">". $row["id_categoria"] ." - ". $row["nombre"] ."</option>";   
	}
   

	// recuperamos la informacion de la categoria seleccionada
	$query = "select id_categoria, nombre from cat_directorio WHERE id_categoria=".$site_id;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);

	//echo $query."<br>";
   
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_directorio_cat_int">

	 <TR><TD colspan="4"><div id="titulo1">DIRECTORIO DE EMPRESAS -CATEGORIAS-</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Categoria existentes</TD>
	    <TD align="left" colspan="3">
            <SELECT name="select_categoria" onchange="javascript:{cambio_categoria()};">
               <option value="-1" selected></option>
               <?php echo $optionsCategorias?>
            </select>
	    </TD>
	 </TR>

     <TR><TD valign='top' align='right'>Categoria ID</TD>
         <TD><input name='id_categoria' type='text' class="input_tiny" maxlength="2" onkeypress="return justNumbers(event);" value='<?php echo $line['id_categoria']?>'></TD>
	 </TR>
     <TR><TD valign='top' align='right'>Nombre</TD>
         <TD><input name='nombre' type='text' size='50' value='<?php echo ($line['nombre'])?>'></TD>
	 </TR>

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="2">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_categoria' value='0'>
  	     </TD>
  	  </TR>     	  
</form>
</TABLE>  