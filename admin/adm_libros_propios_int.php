<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('../funciones.php')) or die ("funciones.php no incluido");

    $select_libro = strip_tags($_POST["select_libro"]);
    $autor        = strip_tags($_POST["autor"]);
    $titulo       = strip_tags($_POST["titulo"]);
    $descripcion  = strip_tags($_POST["descripcion"]);
    $fecha        = strip_tags($_POST["fecha"]);
    $anyo         = strip_tags($_POST["anyo"]);
    $tipo         = strip_tags($_POST["tipo"]);

    list($dia,$mes,$ano) = explode("/",$fecha);
	$fecha	 = $ano ."-". $mes ."-". $dia;
     
     
  	$imagen      = $_FILES['file_img']['name'];
  	$img_antigua = $_POST["img_antigua"];

  	if ($imagen=="")
     	$imagen = $img_antigua;  
  	 
  	$path = "../images/librospropios/";
  	 
    
	if ($_POST["borrar_libro"] == 1){ 
  	
   		$query=" DELETE FROM documentacion_propia where id=".$select_libro;
		$modo = "EL BORRADO";
  		
  		//Borrar la imagen
  		unlink($path.$img_antigua);
  		
	}else{  
   		if (strlen($select_libro>0)){
	         if ($imagen == $img_antigua)
     			$query = "UPDATE documentacion_propia set autor='". $autor ."',titulo='". $titulo ."', descripcion='". $descripcion . "', fecha='". $fecha . "', anyo=". $anyo . ", tipo=". $tipo . " where id=".$select_libro;
	         else{
	           // Subimos la imagen nueva
	           $img_correcta = ControlImagen($imagen,$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
	           // Si el control de la imagen es cero, no hacemos el UPDATE del registro
	           if ($img_correcta == 1){
	           //Borramos la imagen antigua
	               unlink($path.$img_antigua);
	               $query = "UPDATE documentacion_propia set autor='". $autor ."',titulo='". $titulo ."', descripcion='". $descripcion . "', fecha='". $fecha . "', anyo=". $anyo . ", tipo=". $tipo . ", imagen='". $imagen . "' where id=".$select_libro;
	           }else
	               $sql ="";    
	         }      
	         $modo = " LA ACTUALIZACION";   			
   			
   	  	}
   	  	else{
    		/*  Alta del libro */
	  		$query = "insert into documentacion_propia(autor, titulo, descripcion, fecha, anyo, imagen, tipo) ";
  	  		$query .= "values ('".$autor."','".$titulo."','".$descripcion."','".$fecha."',".$anyo.",'".$imagen."',".$tipo.")";
      		$modo ="LA INSERCION";
      		
        	// Subimos la imagen al directorio.
        	//Si devuelve un 1, se ha subido correctamente y realizamos el insert en la base de datos
         
         	$img_correcta = ControlImagen($imagen,$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
         	//Si no se ha podido subir la imagen, no hacemos la inserción
         
         	$modo = " LA INSERCION ";      		
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
   	document.location.href="index.php?dir=adm_libros_propios&seleccionado=<?php echo $select_libro?>";
</script>