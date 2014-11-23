<?php 
 	@(include('../bbdd.php')) or die ("bbdd.php no incluido");

 	$select_categoria = strip_tags($_POST["select_categoria"]);
 	$id_categoria     = strip_tags($_POST["id_categoria"]);
 	$nombre           = strip_tags($_POST["nombre"]);
  
 	$msg  = ""; 
 	
  	if ($_POST["borrar_categoria"] == 1){
  	
		$sql=" DELETE FROM categorias where id_categoria=".$id_categoria;
  		$modo = "EL BORRADO";
  	}
  	else{
   		if (strlen($select_categoria>0)){
      		$sql = "UPDATE categorias set nombre='". $nombre ."', id_categoria=". $id_categoria ." where id_categoria=".$select_categoria;
      		$modo ="LA ACTUALIZACION";	  
   		}
   		else{
			$sql = "insert into categorias(id_categoria, nombre) ";
  	  		$sql .= "values (".$id_categoria.",'".$nombre."')";
      		$modo ="LA INSERCION";	  
   		}	  
 	}   
  		
     echo $sql;
	 $result = MYSQL_QUERY($sql);
     if (!$result)
     {
		echo $sql;
     	echo "<br>No ha sido posible realizar ".$modo.".  Error =".mysql_error($IdConexion);
	 }   
     else
     {
        mysql_query("COMMIT"); // efectuamos el commit ahora
     }  

?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
   	document.location.href="index.php?dir=adm_categoria&seleccionado=<?php echo $id_categoria?>";
</script>