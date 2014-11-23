
<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");


  $id           = $_POST["select_cliente"];	
  $nombre       = $_POST["nombre"];
  $id_categoria = $_POST["id_categoria"];
  $direccion    = $_POST["direccion"];
  $tlf          = $_POST["tlf"];
  $fax          = $_POST["fax"];
  $web          = $_POST['web'];
  $email        = $_POST["email"];
  $texto        = $_POST["texto"];
  
/* Si la página web no empieza por http://, se lo añadimos */
  $patron = "^http://";
  
  if (strlen($web) > 0){
  	  if (eregi($patron, $web) ==1)
    		 $web = $web;
  		else
     		$web = "http://".$web;   
  }   		

     
  if ($_POST["borrar_cliente"] == 1){ // Hay que borrar el cliente
  	
     	// Borramos el fichero del directorio
  	
         $sql = "DELETE FROM directorio WHERE id_cliente =". $id;
         $modo = "EL BORRADO";
  }
  else{
     if (strlen($_POST["select_cliente"])>0){
     	/*---------------------------------------------*/
        // UPDATE  EN EL DIRECTORIO         
     	/*---------------------------------------------*/
         $sql = "UPDATE directorio set id_categoria='". $id_categoria ."', nombre='". $nombre ."', direccion='".$direccion."', tlf='".$tlf."', fax='".$fax."', web='".$web."', email='".$email."', texto='".$texto."' where id_cliente=".$id;
         $modo = " LA ACTUALIZACION";
     }else{    
     	/*------------------------*/
        // INSERCION EN EL DIRECTORIO
     	/*------------------------*/
     
         $sql = "insert into directorio(id_categoria, nombre, direccion, tlf, fax, web, email, texto) ";
    	   $sql .= "values ('".$id_categoria."','".$nombre."','".$direccion."','".$tlf."','".$fax."','".$web."','".$email."','".$texto."')";
         $modo = " LA INSERCION ";
     }
  }     

  $result = MYSQL_QUERY($sql);  
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
	document.location.href="index.php?dir=adm_directorio&seleccionado=<?php print($id)?>";
</script>
