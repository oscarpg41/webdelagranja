<?php
	@(include('../bbdd.php')) or die ("bbdd.php no incluido");
	@(include('../funciones.php')) or die ("funciones.php no incluido");

	$id          = $_POST["select_destacada"];	
	$titulo      = $_POST["titulo"];
	$enlace      = $_POST["enlace"];
	$texto       = $_POST["texto"];
	$imagen      = $_FILES['file_img']['name'];
	$img_antigua = $_POST["img_antigua"];
	$imagenUrl   = $_POST["imagenUrl"];
	  
	$imagen_final = "";
	
	//Si viene relleno el campo imagen, esta información prevalece
	if (strlen($imagen)>0)
		$imagen_final = $imagen;
	else
		$imagen_final = $imagenUrl;
	
	
	if ($imagen_final=="")
		$imagen_final = $img_antigua;  
  
	$path = "../images/destacada/";

	
  	if ($_POST["borrar_destacada"] ==1){ // Hay que borrar la nota destacada
  	
         $sql = "DELETE FROM nota_destacada WHERE id =". $id;
         $modo = "EL BORRADO ";
         $img_antigua = str_replace('destacada/', '', $img_antigua);
         unlink($path.$img_antigua);
  	}
  	else{
	
  		//Subimos la imagen
  		if (strlen($imagen)>0){
  			$img_antigua = str_replace('destacada/', '', $img_antigua);
	        @unlink($path.$img_antigua);
  			// Subimos la imagen nueva
	    	ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
	    	$imagen_final='destacada/'.$imagen_final;
  		}
  		
  		if (strlen($id>0)){
	        $sql = "UPDATE nota_destacada set enlace='". $enlace ."', titulo='". $titulo ."', imagen='".$imagen_final."',texto='".$texto."' where id=".$id;
	        $modo = " LA ACTUALIZACION ";
   		}
  		else{
            $sql = "insert into nota_destacada(enlace,titulo,texto, imagen) ";
       	    $sql .= "values ('".$enlace."','".$titulo."','".$texto."','".$imagen_final."')";
       	    $modo = " LA INSERCION ";
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
    }  

?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_zonadestacada&seleccionado=<?php print($id_enlace)?>";
</script>