<?php
	@(include('../bbdd.php')) or die ("bbdd.php no incluido");


	$id_enlace   = $_POST["select_enlace"];	
    $nombre      = $_POST["nombre"];
    $web         = $_POST["web"];
    $descripcion = $_POST["descripcion"];
    $visible     = $_POST["visible"];
    $click       = $_POST["click"];
    
    if (strlen($click) == 0)
      $click = "0";
  
  
  
	if ($_POST["borrar_enlace"] == 1){ // Hay que borrar de la agenda
  	
		$sql = "DELETE FROM enlaces WHERE id_enlace =". $id_enlace;
  		$modo = "EL BORRADO";
  	}
  	else{
  		if (strlen($id_enlace>0)){
			$sql = "UPDATE enlaces set nombre='". $nombre ."', web='". $web ."', descripcion='". $descripcion . "', click=". $click . ", visible=". $visible . " where id_enlace=".$id_enlace;
         	$modo = "UPDATE";
  		}
  		else{
         	$sql = "INSERT into enlaces(nombre, web, descripcion, click, visible) values ('". $nombre ."','". $web ."','". $descripcion . "',". $click.",1)";
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
	document.location.href="index.php?dir=adm_enlaces&seleccionado=<?php print($id_enlace)?>";
</script>