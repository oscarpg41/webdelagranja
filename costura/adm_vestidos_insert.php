
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('../funciones.php')) or die ("funciones.php no incluido");

  $id            = $_POST["select_vestido"];	
  $nombre        = $_POST["nombre"];
  $descripcion   = $_POST["descripcion"];
  $tipo          = $_POST["tipo"];

  $imagen        = $_FILES['file_img']['name'];
  $imagen_old    = $_POST["imagen_old"];

  //echo "<br>".$imagen;
  //echo "<br>".$imagen_old;
  if ($imagen==""){
     $imagen = $img_antigua;  
  }   
  
  
  if ($tipo == 1){
    	$path = "img/vestidos/";
  }else if ($tipo == 2){
    	$path = "img/disfraces/";
  }else if ($tipo == 3){
    	$path = "img/otros/";
  }
  //echo "<br>".$path;
  
  
  if ($_POST["borrar_vestido"] ==1){
     	// Borramos el fichero del directorio
   	     $sql = "SELECT nombre_imagen FROM costura WHERE idCostura =". $id;
         $result = MYSQL_QUERY($sql);
         $row=mysql_fetch_array($result);
		 unlink($path.$row["nombre_imagen"]);  	
         
         $sql = "DELETE FROM costura WHERE idCostura =". $id;
         $modo = "EL BORRADO";
  }
  else{
     if (strlen($_POST["select_vestido"])>0){

     	if (strlen($imagen)>0){
     		//borramos la imagen anterior
     		unlink($path.$imagen_old); 
     		
     		//subimos la nueva imagen
     		$destino_new = $path.$imagen;
     		echo $destino_new;
	        move_uploaded_file ($_FILES['file_img']['tmp_name'], $destino_new);
	        chmod($destino_new,0777);
     		
     	}else{
     		$imagen = $imagen_old;
     	}
        $sql = "UPDATE costura set nombre='". utf8_encode($nombre) ."', descripcion='". utf8_encode($descripcion) ."', tipo=".$tipo.", nombre_imagen='".$imagen."'  where idCostura=".$id;
        $modo = " LA ACTUALIZACION";
        
     }else{    
     	
     	 if (strlen($imagen)>0){
     	 	$destino_new = $path.$imagen;
	        move_uploaded_file ($_FILES['file_img']['tmp_name'], $destino_new);
	        chmod($destino_new,0777);
         }

         $sql  = "insert into costura(nombre, tipo, descripcion, nombre_imagen ) ";
         $sql .= "values ('".utf8_encode($nombre)."',".$tipo.",'".utf8_encode($descripcion)."','".$imagen."')";
         $modo = " LA INSERCION ";
     }
  }     
  $result = MYSQL_QUERY($sql);

  //echo "<br>".$sql;
  
  $msg="";
  if (!$result)
  {
     echo $sql;
     $msg = "No ha sido posible realizar".$modo." del Vestido.  Error =".mysql_error($IdConexion);
  }   
  else
  {
     mysql_query("COMMIT"); // efectuamos el commit ahora
  }
  
  if (($_POST["borrar_vestido"] == 1) || (strlen($_POST["select_vestido"]) == 0)){
  	$url = "administracion.php";
  }
  else{
  	$url = "administracion.php?dir=adm_vestidos_get&select_vestido=".$id;
  }
  
  
?>
<script>
   var mensaje = "<?php echo $msg?>";
   if (mensaje.length>0) {
   		alert("<?php echo $msg?>");
   }

   document.location.href="<?php echo $url?>";
   
</script>   