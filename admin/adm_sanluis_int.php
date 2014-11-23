
<?php
  	@(include('../bbdd.php')) or die ("bbdd.php no incluido");
  	@(include('../funciones.php')) or die ("funciones.php no incluido");

  	$id       = $_POST["id"];	
  	$fecha    = $_POST["fecha"];
  	$texto	  = $_POST["texto"];
  	
	list($dia,$mes,$anyo) = explode("/",$fecha);
	$fecha	 = $anyo ."-". $mes ."-". $dia;
	
	/**
 	* Obtener el día de la semana para una fecha concreta.
 	*/
	// 0->domingo	 | 6->sabado
	$nombresDias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "S&aacute;bado");
	$dia= date("w",mktime(0, 0, 0, $mes, $dia, $anyo));
	
  	if ($_GET["modo"] == "delete"){ // Hay que borrar el cliente
         $sql = "DELETE FROM sanluis WHERE id =". $_GET["id"];
         $modo = "EL BORRADO";
  	}
  	else{
     	if (strlen($_POST["id"])>0){
			$sql = "UPDATE sanluis set dia='". $nombresDias[$dia] ."', fecha='". $fecha ."', texto='". $texto ."' where id=".$id;
	        $modo = " LA ACTUALIZACION";
		}else{    
	         $sql = "insert into sanluis(dia, fecha, texto) ";
	  	     $sql .= "values ('".$nombresDias[$dia]."','".$fecha."','".$texto."')";
	
	  	     $modo = " LA INSERCION ";
		}
	}     
  	$result = MYSQL_QUERY($sql);  

  	if (!$result)
  	{
     	echo $sql;
     	$msg = "No ha sido posible realizar".$modo.".  Error =".mysql_error($IdConexion);
  	}
  	else
  	{
     	mysql_query("COMMIT"); // efectuamos el commit ahora
  	}    
?>
<script>
	<?php if (strlen($msg)>0){ echo "alert('". $msg ."');"; } ?>
	document.location.href="index.php?dir=adm_sanluis";
</script>
