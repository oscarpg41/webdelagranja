<?php
  @(include('../funciones.php')) or die ("funciones.php no incluido");
  
  if ($_GET["modo"] == "delete"){

  		$sql = "DELETE FROM principal WHERE id_prin =". $_GET["id"];
  		
  }else{
    $id_prin    	= $_POST["id_prin"];
    $titulo     	= $_POST["titulo"];
    $texto      	= $_POST["texto"];
    $img_width  	= $_POST["img_width"];
    $align_img 	 	= $_POST["align_img"];
    $txt_enlace 	= $_POST["txt_enlace"];
    $enlace     	= $_POST["enlace"];
    $align_enlace  	= $_POST["align_enlace"];
    $class_enlace  	= $_POST["class_enlace"];
    $orden      	= $_POST["orden"];
    $columna    	= $_POST["columna"];
    $visible    	= $_POST["visible"];
    
    $imagenUpload 	= $_FILES['file_img']['name'];
    $linkImage    	= trim($_POST['linkImage']);
    
     //directorio de las imagenes
	$path = "../images/principal/";
    $directorio = "principal/";
    
    if (strlen($_POST['imagen_old'])>0){
    	$img  = $_POST['imagen_old'];
    }
	
	if (strlen($img_width) == 0){
    	$img_width = 0;
    }	

    //La imagen externa tiene preferencia
    if (strlen($linkImage)>0){
    	$img = $linkImage;
    }else{
    	if (strlen($imagenUpload)>0){

			ControlImagen($imagenUpload, $_FILES["file_img"]["type"], $_FILES["file_img"]["size"], $_FILES['file_img']['tmp_name'], $path);
    		
			/**
			 * RedimensionarImagen(dir, nombre, ancho maximo imagen, alto maximo imagen).
			 * Devuelve el nombre final de la imagen almacenada
			 */    		
    		//$nombreFinalImagen = RedimensionarImagen($path, $imagenUpload, 200, 200);
    		//$img = $directorio.$nombreFinalImagen;
    		
    		$img = $directorio.$imagenUpload;
    	}
    }

    if (isset($_POST["modificar"]))
    {
		$sql  = "UPDATE principal set titulo='". $titulo . "', texto='".$texto ."', imagen='". $img."', img_width='". $img_width;
		$sql .="', align_img='". $align_img ."', txt_enlace='". $txt_enlace ."', enlace='". $enlace."', align_enlace='". $align_enlace;
		$sql .="', class_enlace='".$class_enlace."', orden=". $orden .", columna='". $columna ."', visible='". $visible ."' where id_prin=".$id_prin;
    }      	    
    if (isset($_POST["insertar"]))
    {
		$sql  = "insert into principal(titulo, texto, imagen, img_width, align_img, txt_enlace, enlace, align_enlace, class_enlace, orden, columna, visible)";
      	$sql .= " values ('".$titulo."','".$texto."','".$img."','".$img_width."','".$align_img."','".$txt_enlace."','".$enlace."','".$align_enlace."','".$class_enlace."','".$orden."','".$columna."','".$visible."')";
    } 
  }
  
  //echo "<br>".$sql;
  
  $result = MYSQL_QUERY($sql);
  
    
  mysql_query("COMMIT"); // efectuamos el commit ahora
?>

<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
   	document.location.href="index.php?dir=adm_principal";
</script>



