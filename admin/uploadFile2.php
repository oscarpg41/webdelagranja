<?php 
  @(include('../funciones.php')) or die ("funciones.php no incluido");

  $type_file   = strip_tags($_POST["ficheros"]);
  $directorio  = strip_tags($_POST["directorios"]);
  $imagen      = $_FILES['file_img']['name'];
  $error = 0;
  $msg = "";
  
  $path = "../".$type_file."/";
  
  if (strlen($directorio) > 0)
     $path .= $directorio."/";
  
//  echo "<br>img_correcta=".$type_file;  
//  echo "<br>directorio=".$directorio;  
//  echo "<br>imagen=".$imagen;  
//  echo "<br>path=".$path;


  // Subimos la imagen al directorio.
  // Si devuelve un 1, se ha subido correctamente y realizamos el insert en la base de datos
         
  $img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
  //Si no se ha podido subir la imagen, no hacemos la inserción
        
  echo "<br>img_correcta=".$img_correcta;
  if ($img_correcta != 1){
        $msg = 'Error al subir el fichero'; 
        $error = 1;
  }
  echo "<br>error=".$error;
?>   

<script>
	<?php if (strlen($msg)>0){ print ('alert("'. $msg .'")');} ?>
   	document.location.href="index.php?dir=uploadFile&error=<?php print($error)?>";
</script>