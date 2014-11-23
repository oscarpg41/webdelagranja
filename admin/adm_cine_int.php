<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

	$id          = $_POST["select_cine"];	
    $nombre      = $_POST["nombre"];
    $anyo        = $_POST["anyo"];
    $descripcion = $_POST["descripcion"];
    $disponible  = $_POST["disponible"];
  
    
  	if ($_POST["borrar_pelicula"] == 1){ // Hay que borrar de la agenda
  	
		$sql = "DELETE FROM cine WHERE id =". $id;
  		$modo = "EL BORRADO";
  	}
  	else{
  		
  		if (strlen($id>0)){

	    	$sql = "UPDATE cine set nombre='". $nombre ."', anyo='". $anyo . "', descripcion='". $descripcion . "', disponible='". $disponible . "' where id=".$id;
  			$modo ="ACTUALIZACION";
		}else{
			
     		$sql = "insert into cine(nombre, anyo, descripcion, disponible) ";
      		$sql .= "values ('".$nombre."','".$anyo."','".$descripcion."','".$disponible."')";
			$modo ="INSERCION";
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
     }  

?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_cine&seleccionado=<?php print($id)?>";
</script>