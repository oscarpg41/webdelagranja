<?php
  	@(include('../bbdd.php')) or die ("bbdd.php no incluido");

    $select_galeria	= strip_tags($_POST["select_galeria"]);
    $nombre       	= strip_tags($_POST["nombre"]);
    $descripcion  	= strip_tags($_POST["descripcion"]);
	
  
	
    $modo = ""; 
  	if ($_POST["borrar_galeria"] == 1){
		
   		$query=" DELETE FROM galeria_fotografica WHERE id =". $select_galeria;
   		$modo = "EL BORRADO";
   		
	}else{  
   		if (strlen($select_galeria>0)){
  		    $query = "UPDATE galeria_fotografica set nombre='". $nombre ."', descripcion='". $descripcion ."' where id=".$select_galeria;
			$modo ="LA ACTUALIZACION";	  
   	  	}
   	  	else{
  		    $query = "INSERT into galeria_fotografica(nombre, descripcion) ";
  	  		$query .= "values ('". $nombre ."','". $descripcion ."')";
      		$modo ="LA INSERCION";	  
   		}	  
 	}   
    //echo "<br>Query::".$query;	
	
	$result = MYSQL_QUERY($query);  
    if (!$result)
    {
     	echo $sql;
        $msg = "No ha sido posible realizar ".$modo." del Libro.  Error =".mysql_error($IdConexion);
    }   
    else
    {
        mysql_query("COMMIT"); // efectuamos el commit ahora
    }  	
?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
   	document.location.href="index.php?dir=adm_galerias&seleccionado=<?php echo $select_galeria?>";
</script>