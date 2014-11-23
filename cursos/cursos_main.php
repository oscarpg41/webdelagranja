<table border="0" cellpadding="0" cellspacing="0" width="96%">
<?php
	 $mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

     @(include('bbdd.php')) or die ("bbdd.php no incluido");

     $queryNewMain = "SELECT id_curso, titulo, DATE_FORMAT(fecha_ini, '%d') dia, DATE_FORMAT(fecha_ini, '%m') mes FROM cursos order by fecha_ini desc LIMIT 8";  
     $resultNewMain = MYSQL_QUERY($queryNewMain);
     //echo $queryNewMain;
     
     $i=0;
     if (!$resultNewMain)
     {
	        print ("Error al recuperar las noticias");
     }else{
       if (mysql_num_rows($resultNewMain) > 0){
           while ($row=mysql_fetch_array($resultNewMain)){
				$clase=($clase=="noticias_2"?"noticias_1":"noticias_2");           
				$mes = 1* $row["mes"];	
				$dia = $row["dia"]." ".$mesArray[$mes-1];	
				$cadena  = "<tr><td align='left' valign='top' class='".$clase."'><span class='textNegroSmall'><b>".$dia."</b></span>&nbsp;&nbsp;&nbsp;";
				$cadena .="<a href='cursos/detalle_curso.php?id_curso=".$row["id_curso"]."' class='negro_submenu'>". $row["titulo"]. "</a>&nbsp;";
				echo $cadena;
				echo '</td></tr>';
           }
       }else echo '<TR><TD class="text2Bold">No hay cursos dadas de alta</TD></TR>';
     }

?>
</table>