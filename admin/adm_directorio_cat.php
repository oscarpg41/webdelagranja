<script language="javascript" src="../js/ajax.js"></script>
<script>
	function cambio_categoria()
	{
		if (document.frmdatos.select_categoria.value >0)
	     var_url = "adm_directorio_cat_get&select_categoria="+document.frmdatos.select_categoria.value;
		else	
			var_url = "adm_directorio_cat_get&select_categoria=0";
	
		location.href='index.php?dir='+var_url;
	}   
</script>

<?php
// CREAMOS EL COMBO DE categorias del directorio

   $sql = "select id_categoria, nombre from cat_directorio order by id_categoria";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $optionsCategorias ="";

   $num = 0;
   while ($row=mysql_fetch_array($result)) {
     $optionsCategorias .= "<option value='" .$row["id_categoria"]."'>". $row["id_categoria"] ." - ". $row["nombre"] ."</option>";   
   }
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_directorio_cat_int">

	 <TR><TD colspan="4"><div id="titulo1">DIRECTORIO DE EMPRESAS -CATEGORIAS-</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Categoria existentes</TD>
	    <TD align="left" colspan="3">
            <SELECT name="select_categoria" class="control" onchange="javascript:{cambio_categoria()};">
               <option value="-1" selected></option>
               <?php echo $optionsCategorias?>
            </select>
	    </TD>
	 </TR>

     <TR><TD valign='top' align='right'>Categoria ID</TD>
         <TD><input name='id_categoria' type='text' class="input_tiny" maxlength="2" onkeypress="return justNumbers(event);" value=''></TD>
	 </TR>
     <TR><TD valign='top' align='right'>Nombre</TD>
         <TD><input name='nombre' type='text' size='50' value=''></TD>
	 </TR>

 	 <TR>    
  	     <TD valign='middle' align='center' colspan="2">
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR> 
</form>
</TABLE>    

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_categoria.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_categoria();
	</script>
<?php } ?>