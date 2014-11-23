<script>
	function cambio_vestido()
	{
		if (document.frmdatos.select_vestido.value >0)
     		var_url = "adm_vestidos_get&select_vestido="+document.frmdatos.select_vestido.value;
		else	
			var_url = "adm_vestidos_get&select_vestido=0";
	
		location.href='inicio.php?dir='+var_url;
	}

   function VerifyForm (formulario) 
   {
	     if ( checkField( formulario.nombre, isAlphanumeric, false )&&
	       	  checkField( formulario.tipo, isInteger, false )){
	            if(formulario.descripcion.value.length >0 ){
	                formulario.submit();   
	      		 }
	        }
   }
</script>

<?php
    @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  
	if (!isset ($_GET['select_vestido']))
		die("No llega el select_vestido");

	$site_id = mysql_escape_string($_GET['select_vestido']);
	
// CREAMOS EL COMBO DE vestidos


   $num = 0;
   while ($row=mysql_fetch_array($result)) {
     $optionsVestidos .= "<option value='" .$row["id"]."'>". $row["nombre"] . " " .$row["apellidos"] ."</option>";   
   }
   
   // CREAMOS EL COMBO DE vestidos

   $sql = "select idCostura, nombre from costura order by nombre";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $optionsVestidos ="";
   
   while ($row=mysql_fetch_array($result)) {
   	
      	if ($site_id==$row["idCostura"])	
   			$optionsVestidos .= "<option value='" .$row["idCostura"]."' selected>". $row["nombre"] ."</option>";   
      	else
   			$optionsVestidos .= "<option value='" .$row["idCostura"]."'>". $row["nombre"] ."</option>";   
   }
   
   
   
   
?>
 

<form action="inicio.php?dir=adm_vestidos_insert" method="post" name="frmdatos">
<TABLE width="80%" border="0" cellpadding="10">
<?php if ($actualizados==true) {?>
 <tr>
    <td class="text" align="center" colspan="2" bgcolor="#D85D12">- - - Los datos han sido actualizados - - -</td>
 </tr>
 <tr><td>&nbsp;</td></tr>                  
<?php } ?>

	<TR><TD align='left' width=40%> <h3>Vestidos existentes</h3></TD>
         <td align="left">
            <SELECT name="select_vestido" onchange="javascript:{cambio_vestido()};">
               <option value="-1" selected></option>
               <?php echo $optionsVestidos?>
            </select>
         </td>
    </TR>
</TABLE>  

<?php
	$query = "select nombre, nombre_imagen, tipo, descripcion from costura where idCostura=".$site_id;  
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
	//echo $query."<br>";

    if ($line['tipo'] == 1){
    	$path = "vestidos";
    }else if ($line['tipo'] == 2){
    	$path = "disfraces";
    }else if ($line['tipo'] == 3){
    	$path = "otros";
    }


?>


<div id="divdatos">
<h3>Caracter&iacute;sticas del  Vestido </h3>
<TABLE width="100%" border="1" cellpadding="10" class="border">
     <TR><TD width="15%" align='right'>Nombre</TD>
         <TD><input name='nombre' type='text' size='50' value="<?php echo $line['nombre']?>"></TD>
         <TD width=10% align='right'>Id</TD>
         <TD width=10%><?php echo $site_id?></TD>
     </TR>
     <TR><TD width="15%" align='right'>Tipo de vestido</TD>
        <TD colspan="3">
            <select name="tipo">
          		<option value=1 <?php if ($line['tipo']==1) echo selected?>>Vestido</option>
          		<option value=2 <?php if ($line['tipo']==2) echo selected?>>Disfraz</option>
          		<option value=3 <?php if ($line['tipo']==3) echo selected?>>Otro</option>
       		</select>
		</TD>
     </TR>         
     <TR><TD width="15%" valign='top' align='right'>Descripci&oacute;n</TD>
         <TD colspan=3><textarea name="descripcion" cols="60" rows="10"><?php echo utf8_decode($line['descripcion'])?></textarea></TD>
     </TR>    
   
     
	 <tr>
   		<TD valign='middle' height='30' align='center' bgcolor="#FFFFFF" colspan='4'>
        	<input type='hidden' name='modificar' value='1'>
	      	<a href='javascript:VerifyForm(frmdatos);' class="negro">Modificar Cliente1</a>&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href='javascript:borrar(frmdatos);' class='negro'>Eliminar Cliente</a>
        	<input type='hidden' name='borrar_publicidad' value='0'>
   		</TD>
 	</tr>   	   
  	     
</table>

</div>


</form>
