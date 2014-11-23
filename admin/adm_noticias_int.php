<body>
<?php
  	@(include('../bbdd.php')) or die ("bbdd.php no incluido");
	@(include('../funciones.php')) or die ("funciones.php no incluido");
  	
    $id_noticia = $_POST["select_noticia"];
    $site_id    = $_POST["site_id"];
    $autor      = $_POST["autor"];
    $email      = $_POST["email"];
    $titulo     = $_POST["titulo"];
    $noticia    = $_POST["noticia"];
    $revisado   = $_POST["revisado"];
    $imagen     = $_FILES['file_img']['name'];
    $imagen_old = $_POST["imagen_old"];
    $fecha      = $_POST["fecha"];
	list($dia,$mes,$anyo) = explode("/",$fecha);
	$fecha	 = $anyo ."-". $mes ."-". $dia;
     
    $path = "../images/noticias/";
    
    if (strlen($id_noticia) == 0) $id_noticia = $site_id;
    
    if ($_POST["borrar_noticia"] == 1){ 
    	
		$sql = "DELETE FROM noticias WHERE id_noticia =". $id_noticia;
  		$modo = "EL BORRADO";
  		
  		//Borrar la imagen
  		unlink($path.$imagen_old);
  		
  	}
  	else{
  		if (strlen($imagen)>0){  		
  			//Borrar la imagen
  			@unlink($path.$imagen_old);
  			ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
  		}
  		else{
  			$imagen = $imagen_old;
  		}
  		
		$sql = "UPDATE noticias set email='". $email ."', autor='". $autor ."', titulo='". $titulo . "', noticia='". $noticia . "', imagen='". $imagen . "', revisado=". $revisado . ", fecha='". $fecha . "' where id_noticia=".$id_noticia;
  	}
  	
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
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_noticias&seleccionado=<?php echo $id_noticia?>";
</script>
