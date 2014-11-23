
<?php
  	@(include('../bbdd.php')) or die ("bbdd.php no incluido");
  	@(include('../funciones.php')) or die ("funciones.php no incluido");

  	$id           = $_POST["select_publicidad"];	
  	$nombre       = $_POST["nombre"];
  	$web  		  = $_POST["web"];
  	$click        = $_POST["click"];
  	$impresiones  = $_POST["impresiones"];
  	$inicio       = $_POST["inicio"];
  	$fin     	  = $_POST["fin"];
  	$txt_enlace   = $_POST["txt_enlace"];
  	$orden        = $_POST["orden"];
  	$activo       = $_POST["activo"];
  	$email        = $_POST["email"];

    list($dia_ini, $mes_ini, $anyo_ini) = explode("/",$inicio);
	$fecha_ini	 = $anyo_ini ."-". $mes_ini ."-". $dia_ini;
    
    list($dia_fin, $mes_fin, $anyo_fin) = explode("/",$fin);
	$fecha_fin	 = $anyo_fin ."-". $mes_fin ."-". $dia_fin;
  	
  	
  	$imagen      = $_FILES['file_img']['name'];
  	$img_antigua = $_POST["img_antigua"];

  	if ($imagen=="")
		$imagen = $img_antigua;  

	$path = '../images/publicidad/';
	 
  
  	if (strlen($click) == 0 )       $click = 0;
  	if (strlen($impresiones) == 0 ) $impresiones = 0;
  	if (strlen($orden) == 0 ) $orden = 0;

  	if ($_POST["borrar_publicidad"] ==1){ // Hay que borrar el cliente
		 unlink($path.$img_antigua);  	
         $sql = "DELETE FROM publicidad WHERE id_cliente =". $id;
         $modo = "EL BORRADO";
         $id="";
  	}
  	else{
     	if (strlen($_POST["select_publicidad"])>0){
	     	/*---------------------------------------------*/
	        // UPDATE  DE LA FOTO DENUNCIA         
	     	/*---------------------------------------------*/
	        if ($imagen == $img_antigua)
	            $sql = "UPDATE publicidad set nombre='". $nombre ."', web='". $web ."',click=".$click.", impresiones=".$impresiones.",fecha_ini='".$fecha_ini."',fecha_fin='".$fecha_fin."',txt_enlace='".$txt_enlace."',orden=".$orden.",activo=".$activo.", email='".$email."' where id_cliente=".$id;
			else{
	           	// Subimos la imagen nueva
	           	ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
	           	//Borramos la imagen antigua
				unlink($path.$img_antigua);
				$sql = "UPDATE publicidad set nombre='". $nombre ."', web='". $web ."',click=".$click.", banner='".$imagen."', impresiones=".$impresiones.",fecha_ini='".$fecha_ini."',fecha_fin='".$fecha_fin."',txt_enlace='".$txt_enlace."',orden=".$orden.",activo=".$activo.", email='".$email."' where id_cliente=".$id;
	         }      
	        $modo = " LA ACTUALIZACION";
		}else{    
	        // Subimos la imagen al directorio.
	         ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],$path);
	           
	         $sql = "insert into publicidad(nombre,web,click,impresiones,fecha_ini,fecha_fin,txt_enlace,orden,activo,email,banner ) ";
	  	     $sql .= "values ('".$nombre."','".$web."',".$click.",".$impresiones.",'".$fecha_ini."','".$fecha_fin."','".$txt_enlace."',".$orden.",".$activo.",'".$email."','".$imagen."')";
	
	  	     $modo = " LA INSERCION ";
		}
	}     
  	$result = MYSQL_QUERY($sql);  
	//echo $sql;

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
	document.location.href="index.php?dir=adm_publicidad&seleccionado=<?php print($id)?>";
</script>
