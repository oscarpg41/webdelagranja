<body>
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('../funciones.php')) or die ("funciones.php no incluido");  
  
    $id_evento   = $_POST["select_evento"];	
    $autor       = $_POST["autor"];
    $tipo_evento = $_POST["tipo_evento"];
    $titulo      = $_POST["titulo"];
    $detalles    = $_POST["detalles"];
    $organizador = $_POST["organizador"];
    $lugar       = $_POST["lugar"];
    $url         = $_POST["url"];
    

    $hora        = $_POST["horas"];
    $minutos     = $_POST["minutos"];

    list($dd,$mm,$yy)= split('[/.-]', $_POST['inicio']);
 	$inicio = $yy."-".$mm."-".$dd;
    $fecha2 = $inicio ." ".$hora .":". $minutos .":00";

 	list($dd,$mm,$yy)= split('[/.-]', $_POST['fin']);
 	$fin = $yy."-".$mm."-".$dd;


    $imagen      = $_FILES['file_img']['name'];
    $imagen_old  = $_POST["imagen_old"];
	$path = "../images/cultura/";

	if ($_POST["borrar_cultura"] == 1){ // Hay que borrar
  	
		$sql  = "DELETE FROM cultura WHERE id =". $id_evento;
        $modo = " EL BORRADO";

        //Borrar la imagen
  		//unlink($path.$imagen_old);        
	}
	else{
		
		$img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
		//Si no se ha podido subir la imagen, no hacemos la inserción
		
		
		if (strlen($id_evento)>0){
	     	
			if (strlen($imagen)<1){
            	$imagen = $imagen_old;
        	}     	 	
  	 	
     		$sql =  "UPDATE cultura set autor='". $autor ."', titulo='". $titulo . "', tipo='". $tipo_evento . "', imagen='". $imagen . "', url='". $url .
     			"', detalles='". $detalles . "', fecha='". $fecha2 . "', fecha_fin='". $fin . "', organizador='". $organizador . "', lugar='". $lugar . 
     			"' where id=".$id_evento;
			$modo = " LA ACTUALIZACION";
	         
	    }else{    
	     
       		$sql = "insert into cultura(autor, titulo, tipo, organizador, fecha, fecha_fin, lugar, imagen, detalles, url) ";
      		$sql .= "values ('".$autor."','".$titulo."','".$tipo_evento."','".$organizador."','".$fecha2."','".$fin."','".$lugar."','".$imagen."','".$detalles."','".$url."')";
	    	
      		$modo = " LA INSERCION ";
	    }
	}     
     
  	
    //echo $sql;
    $result = MYSQL_QUERY($sql);  
    if (!$result)
    {
    	echo $sql;
        $msg = "No ha sido posible realizar la actualización de la Imagen.  Error =".mysql_error($IdConexion);
    }   
    else
    {
       mysql_query("COMMIT"); // efectuamos el commit ahora
    }    
?>
<script>
	<?php if (strlen($msg)>0){ print ('alert("'. $msg .'")');} ?>
	document.location.href="index.php?dir=adm_cultura&seleccionado=<?php echo $id_evento?>";
</script> 
