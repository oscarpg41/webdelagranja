<script language="javascript" src="../js/ajax.js"></script>
<script>
   function cambio_vestido()
   {
	if (document.frmdatos.select_vestido.value >0)
        var_url = "adm_vestidos_get&select_vestido="+document.frmdatos.select_vestido.value;
	else	
		var_url = "adm_vestidos_get&select_vestido=0";
	
	location.href='administracion.php?dir='+var_url;
   }
   
	function VerifyForm (formulario) 
	{
	   if ( formulario.nombre.value.length>0){
	     if ( formulario.tipo.value.length>0){
	             formulario.submit();   
	   	 }else{
	             alert(mMessage);
	             formulario.tipo.focus();
	  	 }    
	   }else{
         alert(mMessage);
         formulario.nombre.focus();
	   }  
	}	 

   
</script>

<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");


// CREAMOS EL COMBO DE vestidos

   $sql = "select idCostura, nombre from costura order by nombre";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $optionsVestidos ="";

   $num = 0;
   while ($row=mysql_fetch_array($result)) {
     $optionsVestidos .= "<option value='" .$row["idCostura"]."'>". utf8_decode($row["nombre"]) ."</option>";   
   }
?>

<form action="administracion.php?dir=adm_vestidos_insert" method="post" name="frmdatos" enctype="multipart/form-data">
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
               <option value="" selected></option>
               <?php echo $optionsVestidos?>
            </select>
         </td>
    </TR>
</TABLE>  

<div id="divdatos">
<h3>Nuevo Vestido </h3>
<TABLE width="100%" border="0" cellpadding="10" class="border">
     <TR><TD width="15%" align='left'>Nombre</TD>
         <TD><input name='nombre' type='text' size='50'></TD>
         <TD width=10% align='right'>Id</TD>
         <TD width=10%>&nbsp;</TD>
     </TR>
     <TR><TD width="15%" align='left'>Tipo de vestido</TD>
        <TD colspan="3">
            <select name="tipo">
				<option></option>
          		<option value=1>Vestido</option>
          		<option value=2>Disfraz</option>
          		<option value=3>Otro</option>
       		</select>
		</TD>
     </TR>         
     <TR><TD  width="15%" valign='top' align='left'>Descripci&oacute;n</TD>
         <TD colspan=3><textarea name="descripcion" cols="60" rows="10"></textarea></TD>
     </TR>    
     <TR>
        <TD width="15%" align='left'>Imagen</TD>
   		<TD colspan="3">
       		<input type='file' name='file_img' size='40'>
       	</TD>		
     </TR>
     <TR><TD valign='bottom' align='center' colspan="4">    
             <a href='javascript:VerifyForm(frmdatos);'>Nuevo vestido</a>
         </TD>
     </TR>
</table>
</div>
</form>

<?php
  if (isset ($_GET['seleccionado']))
  {
?>  	
<script>
   document.frmdatos.select_vestido.value = <?php echo $_GET['seleccionado'] ?>;
   cambio_vestido();
</script>
<?php
  }
?>