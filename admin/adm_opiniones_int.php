<?php
	@(include('../bbdd.php')) or die ("bbdd.php no incluido");
  	@(include('../funciones.php')) or die ("funciones.php no incluido");

     $id_opinion = $_POST["id"];	
     $autor      = $_POST["autor"];
     $titulo     = $_POST["titulo"];
     $texto    	 = $_POST["texto"];
     $fecha      = $_POST["fecha"];
     
	list($dia,$mes,$anyo) = explode("/",$fecha);
	$fecha	 = $anyo ."-". $mes ."-". $dia;
	
    
    
  	if ($_POST["borrar_opinion"] == 1){ // Hay que borrar de la agenda
  	
		$sql = "DELETE FROM opiniones WHERE id_opinion =". $id_opinion;
  		$modo = "EL BORRADO";
  		
  	}
  	else{
  		
  		if (strlen($id_opinion>0)){

     		$sql = "UPDATE opiniones set autor='". $autor ."', titulo='". $titulo . "', texto='". $texto . "', fecha='". $fecha . "' where id_opinion=".$id_opinion;
  			$modo ="ACTUALIZACION";

		}else{
			
			    
			$sql = "insert into opiniones(autor, fecha, titulo, texto) ";
		  	$sql .= "values ('".$autor."','".$fecha."','".$titulo."','".$texto."')";
			$modo ="INSERCION";
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
	document.location.href="index.php?dir=adm_opiniones&seleccionado=<?php print($id_opinion)?>";
</script>
