<script>
	function cambio_cliente()
	{
		if (document.frmdatos.select_cliente.value >0)
	     var_url = "adm_directorio_get&select_cliente="+document.frmdatos.select_cliente.value;
		else	
			var_url = "adm_directorio_get&select_cliente=0";
	
		location.href='index.php?dir='+var_url;
	}

   function borrar(){
     if (window.confirm("�Desea eliminar el Cliente definitivamente?")) {  
        document.frmdatos.borrar_cliente.value = "1";
        document.frmdatos.submit();
     }
   }	
</script>

<?php

	$id_cliente=mysql_escape_string($_GET['select_cliente']);
   	if ($id_cliente =="")
		$id_cliente = 1;


	// CREAMOS EL COMBO DE LAS EMPRESAS YA CREADAS
   	$sql = "SELECT id_cliente, nombre FROM directorio order by nombre";  

   	$result = mysql_query($sql, $IdConexion);
   	$cadena_cliente ="";

   	while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		
		if ($rst["id_cliente"] == $id_cliente){
			$selected = "selected";
		}
   		
   		$titulo =substr($rst["titulo"],0,70);
   		$cadena_cliente .="<option value='".$rst["id_cliente"]."'". $selected .">".$rst["nombre"]."</option>";
   	}


   //RECUPERAMOS LA INFORMACION DEL CLIENTE SELECCIONADO
   $query = "select id_categoria, nombre, direccion, tlf, fax, web, email, texto  FROM directorio where id_cliente=".$id_cliente;  
   $result=mysql_query($query);
   $line=mysql_fetch_array ($result);


	// CREAMOS EL COMBO DE categorias del directorio
   $sql = "select id_categoria, nombre from cat_directorio order by id_categoria";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $optionsCategorias ="";

   while ($row=mysql_fetch_array($result)) {
   	
   	 if ($line["id_categoria"] == $row["id_categoria"])
        $optionsCategorias .= "<option value='" .$row["id_categoria"]."' selected>". ($row["nombre"]) ."</option>";   
     else   
        $optionsCategorias .= "<option value='" .$row["id_categoria"]."'>". ($row["nombre"]) ."</option>";   
   }
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
<FORM name="frmdatos" method="post" action="index.php?dir=adm_directorio_int">

	 <TR><TD colspan="4"><div id="titulo1">DIRECTORIO DE EMPRESAS</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado de Empresas</TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_cliente" class="input_full" onchange="javascript:{cambio_cliente()};">
	         <option value="" selected></option>
	         <?php echo $cadena_cliente?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD class="admin" align="left">Nombre</TD>
     	<TD valign='top' align='left'>
			<input name='nombre' id='nombre' type='text' required="required" class="input_xxlarge" value="<?php echo ($line['nombre'])?>">
			<input type="text" name="id_cliente" value="<?php echo $id_cliente?>" size="3" disabled>
     	</TD>
     	<TD class="admin" align="left">Categoria</TD>
     	<TD valign='top' align='left'>
      		<SELECT name="id_categoria" type="text" onchange="javascript:{cambio_cliente()};">
         		<option value="" selected></option>
         		<?php echo $optionsCategorias?>
      		</SELECT>
   		</TD>   
 	</TR>     
     
     <TR>
     	<TD class="admin" align="left">Direcci�n</TD>
     	<TD valign='top' align='left' colspan="3">
			<input name='direccion' id='direccion' type='text' required="required" class="input_full" value="<?php echo ($line['direccion'])?>">
     	</TD>
 	</TR>

     <TR>
     	<TD class="admin" align="left">Tlf</TD>
     	<TD valign='top' align='left'>
			<input name='tlf' id='tlf' type='text' class="input_medium" value="<?php echo $line['tlf']?>">
     	</TD>
     	<TD class="admin" align="left">Fax</TD>
     	<TD valign='top' align='left'>
			<input name='fax' id='fax' type='text' class="input_medium" value="<?php echo $line['fax']?>">
   		</TD>   
 	</TR>

	<TR>
     	<TD class="admin" align="left">Web</TD>
     	<TD valign='top' align='left'>
			<input class="input_full" type="url" id="web" name="web" placeholder="http://" value="<?php echo $line['web']?>">
     	</TD>
     	<TD class="admin" align="left">Email</TD>
     	<TD valign='top' align='left'>
			<input name='email' id='email' type='email' class="input_full" value="<?php echo $line['email']?>">
   		</TD>   
 	</TR>

	<TR>
		<TD class="admin" align="left" valign='top' >Texto</TD>
	   	<TD colspan="3" valign='top' align='left'>
	      	<textarea name="texto" rows="15"><?php echo ($line['texto'])?></textarea>
	   	</TD>
	</TR> 	

	<TR>    
  		<TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_cliente' value='0'>
  	     </TD>
	</TR> 	  	
</FORM>
</TABLE>
