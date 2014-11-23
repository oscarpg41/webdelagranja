
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");


  $id          = $_POST["select_apartados"];	
  $titulo      = $_POST["titulo"];
  $enlace      = $_POST["enlace"];
  $texto       = $_POST["texto"];
  $apartado    = $_POST["apartado"];
  
     
  if ($_POST["borrar_apartados"] ==1){ // Hay que borrar la nota destacada
  	
         $sql = "DELETE FROM apartados_main where id=".$id;
         $modo = "EL BORRADO";
  }
  else{
     if (strlen($id)>0){
     	
         $sql = "UPDATE apartados_main set enlace='". $enlace ."', titulo='". $titulo ."', texto='".$texto."', apartado=".$apartado." where id=".$id;
         $modo = " LA ACTUALIZACION";
         
     }else{    
     
         $sql = "insert into apartados_main(enlace, titulo, texto, apartado) ";
    	 $sql .= "values ('".$enlace."','".$titulo."','".$texto."',".$apartado.")";
         
         $modo = " LA INSERCION ";
     }
  }     

  $result = MYSQL_QUERY($sql);
  $msg = "";
  
  //echo $sql;

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
	<?php if (strlen($msg)>0){ print ('alert("'. $msg .'")');} ?>
	document.location.href="index.php?dir=adm_apartados&seleccionado=<?php print($id)?>";   	
</script>   