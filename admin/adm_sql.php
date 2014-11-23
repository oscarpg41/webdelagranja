<?php  
	$error = 0;
	if (isset($_POST["sql"]))
  	{
     	$sql = ($_POST["sql"]);

     	$query = ereg_replace("[\\]", "", $sql);
         
     	$result = MYSQL_QUERY($query);  
     	if (!$result){
       		$msg = "Query[". $_POST["sql"] ."]<br>Error =".mysql_error($IdConexion);
       		$error = 1;
     	}  
     	else
     	{
       		mysql_query("COMMIT"); // efectuamos el commit ahora
       		$msg = "Ejecucci�n correcta";
     	}    
	}
	

?>


<form name="frmdatos" method="post" action="index.php?dir=adm_sql">
<TABLE width="100%" cellpadding="10" class="border" border="0">

	 <TR><TD colspan="4"><div id="titulo1">EJECUTAR SENTENCIA SQL</div></TD></TR>       
	
	 <TR>
	   <TD class="admin" align="left" valign='top' >Sentencia</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="sql" rows="10"></textarea>
	   </TD>
	 </TR>
 	 <TR>
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>	 
</TABLE>   
</form>

<?php
	if (isset($_POST["sql"])){
		if($error == '1')		
			print("<p class='message error'>". $msg ."</p>");
		else
			print("<p class='message success'>". $msg ."</p>");
	} 
?>

