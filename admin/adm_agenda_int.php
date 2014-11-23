<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('../funciones.php')) or die ("funciones.php no incluido");

    $id_agenda  = $_POST["id"];	
    $titulo     = $_POST["titulo"];
    $texto    	= $_POST["texto"];
    $fecha      = $_POST["inicio"];
    $cine       = $_POST["cine"];
    $imagen     = $_FILES['file_img']['name'];
    $imagen_old = $_POST["imagen_old"];
    $enlace     = $_POST["enlace"];

    $lugar     = $_POST["lugar"];
    $horas     = $_POST["horas"];
    $minutos   = $_POST["minutos"];

	$hora_evento = $horas.":".$minutos;
     
	if ($hora_evento == "00:00")
       $hora_evento = "";

	list($dia,$mes,$anyo) = explode("/",$fecha);
	$fecha	 = $anyo ."-". $mes ."-". $dia;
	
    $path = "../images/agenda/";
    
    
  	if ($_POST["borrar_agenda"] == 1){ // Hay que borrar de la agenda
  	
		$sql = "DELETE FROM agenda WHERE id_agenda =". $id_agenda;
  		$modo = "EL BORRADO";
  		
  		//Borrar la imagen
  		unlink($path.$imagen_old);
  		
  	}
  	else{
  		
  		$fecha_mostrar = diaSemana($anyo, $mes, $dia);

  		if (strlen($id_agenda>0)){

			if (strlen($imagen)>0){
			   $img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
	        		//Si no se ha podido subir la imagen, no hacemos la inserci�n
	        }
	        else{
	            $img_correcta = 1;
	            $imagen = $imagen_old;
	        }    
	
	        if ($img_correcta == 1){
		        $sql = "UPDATE agenda set fecha_mostrar='". $fecha_mostrar ."',enlace='". $enlace ."', titulo='". $titulo . "', texto='". $texto . "', fecha='". $fecha . "', cine='". $cine . "', imagen='". $imagen . "' , hora='". $hora_evento . "', lugar='". $lugar . "' where id_agenda=".$id_agenda;
				$modo ="ACTUALIZACION";
			}
	        else
				$sql = "";	

		}else{
			
			$modo ="INSERCION";
			    
			if (strlen($imagen)>0){
				$img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
		        //Si no se ha podido subir la imagen, no hacemos la inserci�n
		    }
		    else 		
		        $img_correcta = 1;
		
		    if ($img_correcta == 1){
			    $sql = "insert into agenda(fecha_mostrar, fecha, titulo, texto, enlace, cine, imagen, lugar, hora) ";
		  	    $sql .= "values ('".$fecha_mostrar."','".$fecha."','".$titulo."','".$texto."','".$enlace."','".$cine."','".$imagen."','".$lugar."','".$hora_evento."')";
		    }
		    else
		        $sql = "";	

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
	document.location.href="index.php?dir=adm_agenda&seleccionado=<?php print($id_agenda)?>";
</script>