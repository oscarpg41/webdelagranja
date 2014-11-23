<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

    $id 		= strip_tags($_POST["select_curso"]);
    $autor      = strip_tags($_POST["autor"]);
    $titulo     = strip_tags($_POST["titulo"]);
    $texto    	= strip_tags($_POST["texto"]);
    $fecha_ini  = strip_tags($_POST["inicio"]);
    $fecha_fin  = strip_tags($_POST["fin"]);

    list($dia_ini, $mes_ini, $anyo_ini) = explode("/",$fecha_ini);
	$fecha_ini	 = $anyo_ini ."-". $mes_ini ."-". $dia_ini;
    
    list($dia_fin, $mes_fin, $anyo_fin) = explode("/",$fecha_fin);
	$fecha_fin	 = $anyo_ini ."-". $mes_fin ."-". $dia_fin;
	
    
	if ($_POST["borrar_curso"] == 1){ // Hay que borrar la nota destacada
  	
		$query=" DELETE FROM cursos where id_curso=".$id;
        $modo = "EL BORRADO";
	}
	else{
		if (strlen($id)>0){
	     	
     		$query = "UPDATE cursos set autor='". $autor ."', titulo='". $titulo . "', texto='". $texto . "', fecha_ini='". $fecha_ini . "', fecha_fin='". $fecha_fin . "' where id_curso=".$id;
			$modo = " LA ACTUALIZACION";
	         
	    }else{    
	     
    		//  Alta del curso 
	  		$query = "insert into cursos(autor, titulo, texto, fecha_ini, fecha_fin) ";
  	  		$query .= "values ('".$autor."','".$titulo."','".$texto."','".$fecha_ini."','".$fecha_fin."')";
	    		         
	        $modo = " LA INSERCION ";
	    }
	}     
     
    //echo "<br>Query::".$query;
     
     
	$result = MYSQL_QUERY($query);  
    if (!$result)
    {
     	echo $sql;
        $msg = "No ha sido posible realizar ".$modo." del CURSO.  Error =".mysql_error($IdConexion);
    }   
    else
    {
        mysql_query("COMMIT"); // efectuamos el commit ahora
    }    
?>
<script>
	<?php if (strlen($msg)>0){ print ('alert("'. $msg .'")');} ?>
   	document.location.href="index.php?dir=adm_cursos&seleccionado=<?php print($id)?>";
</script> 