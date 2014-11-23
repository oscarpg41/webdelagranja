<?php
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");

  $id = $_GET['select_pieza'];
  $query = "select id, titulo, texto, imagen from edades where id=".$id;

  //echo $query;
  $result=mysql_query($query);
  
  $line=mysql_fetch_array ($result);
?>   
   
   <div id="desc_piezas">
<?php
     if (strlen($line['imagen'])>0)
       echo '<img src="images/edades/'.$line['imagen'].'"><br><br>';
?>  	  
   	  <B class="text2Bold"><?php echo ($line['titulo'])?></B><br>
   	  <div style="margin-top:10px">
					<?php echo nl2br(($line['texto']))?>
   	  </div>
  </div>