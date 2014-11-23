<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

    $select_libro = strip_tags($_POST["select_libro"]);
    $titulo       = strip_tags($_POST["titulo"]);
    $descripcion  = strip_tags($_POST["descripcion"]);
    $fecha        = strip_tags($_POST["fecha"]);
     
     
    $modo = ""; 
  	if ($_POST["borrar_libro"] == 1){ // Hay que borrar de la agenda
		
   		$query=" DELETE FROM ediciones_populares where id=".$select_libro;
   		$modo = "EL BORRADO";
	}else{  
   		if (strlen($select_libro>0)){
     		$query = "UPDATE ediciones_populares set titulo='". $titulo ."', descripcion='". $descripcion . "', fecha='". $fecha . "' where id=".$select_libro;
   			$modo ="LA ACTUALIZACION";	  
   	  	}
   	  	else{
    		/*  Alta del libro */
	  		$query = "insert into ediciones_populares(titulo, descripcion, fecha) ";
  	  		$query .= "values ('".$titulo."','".$descripcion."','".$fecha."')";
      		$modo ="LA INSERCION";	  
   		}	  
 	}   
    echo "<br>Query::".$query;
     
     
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
   	document.location.href="index.php?dir=adm_ediciones&seleccionado=<?php echo $select_libro?>";
</script>