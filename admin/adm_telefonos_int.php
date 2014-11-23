<?php
	@(include('../bbdd.php')) or die ("bbdd.php no incluido");


	$id		= $_POST["select_tlf"];	
    $nombre = $_POST["nombre"];
    $numero	= $_POST["numero"];
	  
  
  
	if ($_POST["borrar_tlf"] == 1){ // Hay que borrar de la agenda
  	
		$sql = "DELETE FROM telefonos WHERE id_telefono =". $id;
  		$modo = "EL BORRADO";
  	}
  	else{
  		if (strlen($id>0)){
         	$sql = "UPDATE telefonos set nombre='". $nombre ."', numero='". $numero ."' where id_telefono=".$id;
         	$modo = "UPDATE";
         	
  		}
  		else{
         	$sql = "INSERT into telefonos(nombre, numero) values ('". $nombre ."','". $numero ."')";
         	$modo = "INSERT";
		}
  	}
	
  	//echo $sql;
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

?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_telefonos&seleccionado=<?php print($id)?>";
</script>