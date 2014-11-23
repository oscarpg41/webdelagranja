<body>
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('../funciones.php')) or die ("funciones.php no incluido");  
  
    $id_evento   = $_POST["select_evento"];	
    $nombre      = $_POST["nombre"];
    $texto       = $_POST["texto"];
    $lugar       = $_POST["lugar"];

    $hora        = $_POST["horas"];
    $minutos     = $_POST["minutos"];

    list($dd,$mm,$yy)= split('[/.-]', $_POST['fecha']);
 	$fecha = $yy."-".$mm."-".$dd;
    $horario = $hora .":". $minutos;

 	list($dd,$mm,$yy)= split('[/.-]', $_POST['fin']);
 	$fin = $yy."-".$mm."-".$dd;


    $imagen      = $_FILES['file_img']['name'];
    $imagen_old  = $_POST["imagen_old"];
	$path = "../images/agenda/";

	if ($_POST["borrar_nochesmagicas"] == 1){ // Hay que borrar
  	
		$sql  = "DELETE FROM noches_magicas WHERE id =". $id_evento;
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
  	 	
     		$sql =  "UPDATE noches_magicas set nombre='". $nombre ."', texto='". $texto . "', imagen='". $imagen .
     			"', fecha='". $fecha . "',  hora='". $horario . "', lugar='". $lugar . "' where id=".$id_evento;
			$modo = " LA ACTUALIZACION";
	         
	    }else{    
	     
       		$sql = "insert into noches_magicas(nombre, imagen, hora, texto, lugar, fecha) ";
      		$sql .= "values ('".$nombre."','".$imagen."','".$hora."','".$texto."','".$lugar."','".$fecha."')";
	    	
      		$modo = " LA INSERCION ";
	    }
	}     
     
  	
    echo $sql;
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
	<?php if (strlen($msg)>0){ print ('alert("'. $msg .'");');} ?>
	document.location.href="index.php?dir=adm_nochesmagicas&seleccionado=<?php echo $id_evento?>";
</script> 
