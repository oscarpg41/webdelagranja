<?php
   $sql = "SELECT id, texto FROM agenda_alcalde WHERE id=1";

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $rst=mysql_fetch_array($result);
?>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_agendaalcalde_update" >

	 <tr><td colspan="4"><div id="titulo1">AGENDA DEL ALCALDE</div></td></tr>       
	
     <TR>
     	<TD class="admin" align="left">Id</TD>
     	<TD valign='top' align='left'>
	       <input type="text" name="id" value="<?php echo $rst['id']?>" size="3" disabled>       
     	</TD>
     </TR>		

	 <TR>
	   <TD class="admin" align="left" valign="top">Texto</TD>
	   <TD colspan="3" valign='top' align='left'>
	       <textarea name="texto" rows="25"><?php echo $rst['texto']?></textarea>
	   </TD>
	 </TR>


	 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="2">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>   
</form>
</TABLE>