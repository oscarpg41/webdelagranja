<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

     $texto = $_POST["texto"];
     $sql = "DELETE FROM agenda_alcalde";
     $result = MYSQL_QUERY($sql);  
     
     $sql   = "INSERT INTO agenda_alcalde(id, texto) values (1, '".$texto."')";
     $result = MYSQL_QUERY($sql);
       
     if (!$result)
     {
     	echo $sql;
        $msg = "No ha sido posible realizar la actualización de la Agenda del Alcalde.  Error =".mysql_error($IdConexion);
     }   
     else
     {
        mysql_query("COMMIT"); // efectuamos el commit ahora
     }    
?>
<script>
	<?php if (strlen($msg)>0){ print ('alert("'. $msg .'")');} ?>
	document.location.href="index.php?dir=adm_agendaalcalde";
</script>   