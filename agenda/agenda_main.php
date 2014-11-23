<table border="0" cellpadding="2" cellspacing="0" width="95%">
<?php					
     $fecha = time (); 
     $ff=date( "Y-m-d", $fecha );

     $sQuery = "select id_agenda, hora, fecha, fecha_mostrar, titulo, DATE_FORMAT(fecha, '%d') dia, DATE_FORMAT(fecha, '%m') mes, DATE_FORMAT(fecha, '%Y') anyo, DATE_FORMAT(fecha, '%y') anyo2 from agenda";
     $sQuery.= " where fecha >='".$ff."' order by fecha, hora limit 8";  
     

     $rs = MYSQL_QUERY($sQuery);
     //echo $query;
     $i=0;
     if (!$rs)
     {
	print ("Error al recuperar las noticias");
     }else{
       if (mysql_num_rows($rs) > 0){
           while ($row=mysql_fetch_array($rs)){
	     $date = $row["dia"]."/".$row["mes"]."/".$row["anyo"];
             $clase=($clase=="noticias_2"?"noticias_1":"noticias_2");           	
             $i++;	
	     $cadena  = "<tr><td align='left' valign='top' class='".$clase."'><span class='textNegroSmall'><b>".$date."</b></span>&nbsp;&nbsp;&nbsp;";
	     $cadena .= " <a href='agenda/agenda.php?mes=".$row["mes"]."&anio=".$row["anyo"]."&id=".$row["id_agenda"]."#".$row["id_agenda"]."' class='negro_submenu'>".$row["titulo"]. "</a>&nbsp;&nbsp;";
	     echo $cadena;
	     echo '</td></tr>';
           }
       }else echo '<TR><TD class="text2Bold">No hay noticias dadas de alta</TD></TR>';
     }

?>
</table>