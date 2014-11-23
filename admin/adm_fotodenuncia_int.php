
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('../funciones.php')) or die ("funciones.php no incluido");


  $id          = $_POST["select_denuncia"];	
  $autor       = $_POST["autor"];
  $comentario  = $_POST["comentario"];
  $lugar       = $_POST["lugar"];
  $fecha       = $_POST["fecha"];
  $titulo      = $_POST["titulo"];
  $imagen      = $_FILES['file_img']['name'];
  $img_antigua = $_POST["img_antigua"];

  list($dia,$mes,$anyo) = explode("/",$fecha);
  $fecha	 = $anyo ."-". $mes ."-". $dia;
  
  $path = "../images/denuncia/";
  
  if ($imagen=="")
     $imagen = $img_antigua;
     
  if ($_POST["borrar_fotodenuncia"] ==1){ // Hay que borrar la foto denuncia
  	
  		//Borrar la imagen
  		 unlink($path.$img_antigua);
  	  	
         $sql = "DELETE FROM foto_denuncia WHERE id_foto =". $id;
         $modo = "EL BORRADO";
  }
  else{
     if (strlen($_POST["select_denuncia"])>0){
     	/*---------------------------------------------*/
        // UPDATE  DE LA FOTO DENUNCIA         
     	/*---------------------------------------------*/
		if ($_FILES['file_img']['name'] ==""){
			$sql = "UPDATE foto_denuncia set autor='". $autor ."', titulo='". $titulo ."', lugar='".$lugar."', comentario='".$comentario."' where id_foto=".$id;
		}else{
           // Subimos la imagen nueva
           $img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'], $path);
           // Si el control de la imagen es cero, no hacemos el UPDATE del registro
           if ($img_correcta == 1){
           //Borramos la imagen antigua
               unlink('../images/fotos/denuncia/'.$img_antigua);
               $sql = "UPDATE foto_denuncia set autor='". $autor ."', titulo='". $titulo ."',lugar='".$lugar."', foto='".$imagen."',comentario='".$comentario."' where id_foto=".$id;
           }else
               $sql ="";    
         }  
         $modo = " LA ACTUALIZACION";
     }else{    
     	/*------------------------*/
        // INSERCION DE FOTO DENUNCIA
     	/*------------------------*/
     
        // Subimos la imagen al directorio.
        // Si devuelve un 1, se ha subido correctamente y realizamos el insert en la base de datos
         
         $img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'], $path);
         //Si no se ha podido subir la imagen, no hacemos la inserción
         
         if ($img_correcta == 1){
            $sql = "insert into foto_denuncia(autor, titulo, comentario, lugar, foto, fecha) ";
       	    $sql .= "values ('".$autor."','".$titulo."','".$comentario."','".$lugar."','".$imagen."','".$fecha."')";
         }else
             $sql = "";   
         
         $modo = " LA INSERCION ";
     }
  }     

  $result = MYSQL_QUERY($sql);  
  if (!$result)
  {
		echo $sql;
     	$msg = "No ha sido posible realizar".$modo." de la Foto Denuncia.  Error =".mysql_error($IdConexion);
  }   
  else
  {
     mysql_query("COMMIT"); // efectuamos el commit ahora
  }    
?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_fotodenuncia&seleccionado=<?php print($id)?>";
</script>