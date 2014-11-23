<?php 
	if ($_POST["ordenar"] ==1){
  		$id     = $_POST["id_cliente"];	
	  	$orden	= $_POST["orden"];
	  	
		$sql = "UPDATE publicidad set orden=". $orden ." where id_cliente=".$id;
  		$result = MYSQL_QUERY($sql);  
     	mysql_query("COMMIT");
	}
?>

<TABLE width="100%" cellpadding="10" class="border" border="0">
	<TR><TD colspan="2"><div id="titulo1">ORDENAR PUBLICIDAD</div></TD></TR>       
	<TR>
		<TD align="left" class="text2Bold">Nombre</TD>
    	<TD class="text2Bold" align="center">Orden</TD>
    	<TD>&nbsp;</TD>
	</TR>

<?php
  	$sql="SELECT id_cliente, nombre, orden FROM publicidad ORDER BY orden";

  	$result = MYSQL_QUERY($sql);
	if (mysql_num_rows($result) > 0){
        while ($row=mysql_fetch_array($result)){
			$color=($color=="#edefef"?"#f4f6f6":"#edefef");
?>			
			<form name="frmdatos" method="post" action="index.php?dir=adm_publicidad_ordenar">
			<TR>
				<TD valign='top' align='left' bgcolor="<?php echo $color ?>"><?php echo $row["nombre"]?></TD>
				<TD valign='top' align='left' bgcolor="<?php echo $color ?>">
					<input name='orden' type='text' class="input_tiny" maxlength="4" value='<?php echo $row["orden"]?>'>
				</TD>
				<TD align='center' bgcolor="<?php echo $color ?>">
			        <input type='hidden' name='ordenar' value='1'>
			        <input type='hidden' name='id_cliente' value='<?php echo $row["id_cliente"]?>'>
					<input type="submit" value="Guardar" />
				</TD>
			</TR>
			</form>
<?php  	     
        }
	}

?>
</TABLE>