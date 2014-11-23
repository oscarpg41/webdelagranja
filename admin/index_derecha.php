<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD><div id="titulo1">ADMINISTRACION</div></TD></TR>       
	 <TR><TD>Página de Estadísticas: http://www.webdelagranja.com/statics/stats.php?id=xxxxxxx</TD></TR>	 
</TABLE>

<br>

<?php
  	@(include('../bbdd.php')) or die ("bbdd.php no incluido");
  	$query = "select titulo, autor, id_noticia, DATE_FORMAT(fecha, '%d-%m-%Y') as ff from noticias where revisado=0";  
  	//echo $query;
  	$result = MYSQL_QUERY($query);
	if (mysql_num_rows($result) > 0){
?>
		<TABLE width="100%" cellpadding="10" class="border" border="0">
			<TR><TD colspan="4"><div id="titulo1">Noticias no revisadas</div></TD></TR>       
			<TR><TD align="center" class="text2Bold">Id</TD>
		    <TD align="center" class="text2Bold">Autor</TD>
		    <TD class="text2Bold" align="center" >Titulo</TD>
		    <TD class="text2Bold" align="center" >Fecha</TD>
<?php 		
		        while ($row=mysql_fetch_array($result)){
					$color=($color=="#edefef"?"#f4f6f6":"#edefef");
		  	     	print ("<TR><TD valign='top' align='left' bgcolor=". $color ."><a href='index.php?dir=adm_noticias_get&select_noticia=".$row["id_noticia"]."'>".$row["id_noticia"]."</a></TD>");
					print ("<TD valign='top' align='left' bgcolor=". $color .">".$row["autor"]."</b></TD>");
		  	     	print ("<TD valign='top' align='left' bgcolor=". $color .">".$row["titulo"]."</TD>");
		  	     	print ("<TD valign='top' align='left' NOWRAP bgcolor=". $color .">".$row["ff"]."</TD></TR>");
		        }
?>
		</TABLE>
<?php }?>


<br>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">Publicidad</div></TD></TR>       

<?php

  $fecha = date("Y")."-".date("m")."-".date("d");
  $timestamp1 = mktime(0,0,0,date("m"),date("d"),date("Y")); 



  $sql="SELECT nombre, fecha_fin, email FROM publicidad where fecha_fin>'".$fecha."' and activo=1 ORDER BY fecha_fin limit 2";

  $result = MYSQL_QUERY($sql);
  if (!$result)
  {
	   print ("Error al recuperar las noticias");
  }else{
     if (mysql_num_rows($result) > 0){
        print('<TR><TD align="center" class="text2Bold">Nombre</TD>');
        print('<TD class="text2Bold" align="center" >Fecha Fin</TD>');
        print('<TD class="text2Bold" align="center" >Email</TD>');
        while ($row=mysql_fetch_array($result)){
						 list($anyo,$mes,$dia) = explode("-",$row["fecha_fin"]);
						 $timestamp2 = mktime(0,0,0,$mes,$dia,$anyo); 
						 $segundos_diferencia = $timestamp2 - $timestamp1;
						 $dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
						 
			$color=($color=="#edefef"?"#f4f6f6":"#edefef");
				print ("<TR><TD valign='top' height='20' align='left' bgcolor=". $color .">".$row["nombre"]."</TD>");
  	     		 print ("<TD valign='top' height='20' align='left' bgcolor=". $color .">".$row["fecha_fin"]."</TD>");
  	     		 print ("<TD valign='top' height='20' align='left' bgcolor=". $color .">".$row["email"]."</TD>");
  	     		 if ($dias_diferencia < 15)
    	     		   print ("<TD valign='top' height='20' align='left'><b style='color:#ff0000'>Termina en ".$dias_diferencia." dias</b><TD>");
  	     		 print ("</TR>");
  	     
        }
     }
  }

?>
</TABLE>   