<table border="0" cellpadding="0" cellspacing="5" width="96%">
<?php
					
     @(include('bbdd.php')) or die ("bbdd.php no incluido");

     $queryExpo = "select id, autor, titulo, imagen, organizador,lugar  from cultura where fecha_fin>now()";
     
     
     $resultExpo = MYSQL_QUERY($queryExpo);
     //echo $queryExpo;
     
     $i=0;
     if (!$resultExpo)
     {
	        print ("Error al recuperar las exposiciones");
     }else{
       if (mysql_num_rows($resultExpo) > 0){
           while ($row=mysql_fetch_array($resultExpo)){
              $clase=($clase=="noticias_2"?"noticias_1":"noticias_2");	
              $i++;	

              $imagen = "Imagen_no_disponible.jpg";

              if ( strlen($row["imagen"]) >0){
                  $imagen =  $row["imagen"];               
              }

		          $cadena  = "<tr><td align='left' valign='top' class='".$clase."'>";
	            $cadena .= "<a href='cultura/detalle_cultura.php?id_=".$row["id"]."' class='negro_submenu'><img src='images/cultura/". $imagen ."' width='100px' border=0 id=imgLeft></a></td>";
	            $cadena .= "<td align='left' valign='top' class='".$clase."'><b>".$row["titulo"]."</b><br>";
              if (strlen($row["autor"])>0){
                  $cadena .= $row["autor"]."<br>";
              }
              if (strlen($row["lugar"])>0){
                  $cadena .= $row["lugar"]."<br>";
              }
              if (strlen($row["organizador"])>0){
                  $cadena .= "Organiza: ". $row["organizador"];
              }
              $cadena .= "</td></tr>";

	            echo $cadena;
           }
       }else echo '<TR><TD class="text2Bold">No hay informaci&oacute;n sobre exposiciones en la actualidad</TD></TR>';
     }

    //mysql_close();
?>
</table>





