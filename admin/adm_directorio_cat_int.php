<?php 
 @(include('../bbdd.php')) or die ("bbdd.php no incluido");

 $select_categoria = strip_tags($_POST["select_categoria"]);
 $id_categoria     = strip_tags($_POST["id_categoria"]);
 $nombre           = strip_tags($_POST["nombre"]);
  
 $msg  = ""; 
  
 if ($_POST["borrar_categoria"] ==1){ // Hay que borrar la foto denuncia
 	
   $query=" DELETE FROM cat_directorio where id_categoria=".$id_categoria;
   $modo = "EL BORRADO";
   $id_categoria = -1;
 }else{  
   if (strlen($select_categoria>0)){
      $query = "UPDATE cat_directorio set id_categoria=". $id_categoria .", nombre='". $nombre ."' where id_categoria=".$select_categoria;
      $modo ="LA ACTUALIZACION";	  
   }
   else{
    /*  Alta de la categoria */
	  $query = "insert into cat_directorio(id_categoria, nombre) ";
  	  $query .= "values (".$id_categoria.",'".$nombre."')";
      $modo ="LA INSERCION";	  
   }	  
 }   
 //echo "<br>".$query;
 $result = MYSQL_QUERY($query);  
 if (!$result)
    $msg = "No ha sido posible realizar la inserción de la categoria.  Error =".mysql_error($IdConexion);
 else{
    mysql_query("COMMIT"); // efectuamos el commit ahora
 }   
?>   

<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_directorio_cat&seleccionado=<?php print($id_categoria)?>";
</script>