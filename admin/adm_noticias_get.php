<script>
	function cambio_noticia()
	{
		if (document.frmdatos.select_noticia.value >0)
	     var_url = "adm_noticias_get&select_noticia="+document.frmdatos.select_noticia.value;
		else	
			var_url = "adm_noticias_get&select_noticia=0";
	
		location.href='index.php?dir='+var_url;
	}

	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_noticia.value = "1";
	        document.frmdatos.submit();
	    }
	}
</script>

<?php
$site_id=mysql_escape_string($_GET['select_noticia']);

// CREAMOS EL COMBO DE NOTICIAS
// y buscamos las noticias y eventos de los dos �ltimos meses
   $mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

   $mes = date("m");
   $anyo = date("Y");
   if ($mes<4){ 
   		$anyo = $anyo-1;
   		$mes = "12";
   }
   else{
       $mes = $mes-4;
   }    
       
   $nombre_mes_inicio = $mesArray[$mes-1];
   $nombre_mes_final  = $mesArray[date("m")-1];
   
   if ($mes <10)
     $mes = "0".$mes;
     
   $fecha_inicio =$anyo."-".$mes."-"."01";
   
   $sql = "select titulo, id_noticia from noticias where fecha>'". $fecha_inicio ."' order by fecha desc";  
   $result = mysql_query($sql, $IdConexion);
   $cadena_noticias ="";

   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";	
		if ($rst["id_noticia"] == $site_id){ $selected = "selected"; }
   	
   		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id_noticia"]."'". $selected .">".$titulo."</option>";
   }
   

   
$query  = "SELECT AUTOR, TITULO, ID_NOTICIA, NOTICIA, EMAIL, FECHA, REVISADO, IMAGEN";
$query .= " FROM noticias WHERE ID_NOTICIA=".$site_id;

$result=mysql_query($query);
$line=mysql_fetch_array ($result);
   
?>   
   
<script>

//iniciar el calendario
$(document).ready(function() {
	$("#datepicker").datepicker({
    	maxDate: "+6m",
       	showOn: "button",
       	buttonImage: "../images/calendario.jpg",
       	buttonImageOnly: true
	});

	$('#datepicker').datepicker("setDate", new Date("<?php print($line['FECHA'])?>") );  //se inicia con la fecha actual
	
});	

</script>
  

<form name="frmdatos" method="post" action="index.php?dir=adm_noticias_int" enctype='multipart/form-data'>
<TABLE width="100%" cellpadding="10" class="border" border="0">
	 <TR><TD colspan="4"><div id="titulo1">NOTICIAS</div></TD></TR>       
	
	 <TR>
	    <TD class="letter_small" align="left">
	    	Las noticias que se muestran son 
	    	<br>de los meses de: <?php echo $nombre_mes_inicio?> y <?php echo $nombre_mes_final?>
	    	
	    </TD>
	    <TD align="left" colspan="3">
	      <SELECT name="select_noticia" class="input_full" onchange="javascript:{cambio_noticia()};">
	         <option value="" selected></option>
	         <?php echo $cadena_gestion?>
	      </select>
	    </TD>
	 </TR>


     <TR>
     	<TD class="admin" align="left">Colaborador</TD>
     	<TD valign='top' align='left'>
     		<input name="site_id" type="hidden" value="<?php echo $site_id?>" size="3">
     		<input name='autor' id='autor' type='text' required="required" class="input_full" value='<?php echo ($line['AUTOR'])?>'>
     	</TD>
     	<TD class="admin" align="left">email</TD>
     	<TD valign='top' align='left'>
     		<input name='email' id='email' type='email' class="input_full" value='<?php echo $line['EMAIL']?>'>
     	</TD>
     </TR>			
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small">
	   </TD>
	   <TD align="left" class="admin">Revisado</TD>
	   <TD valign='top' align='left'>
			<SELECT name="revisado">
				<option <?php if ($line['REVISADO'] == 0) print "selected" ?> value="0">No</option>
		     	<option <?php if ($line['REVISADO'] == 1) print "selected" ?> value="1">Si</option>
			</SELECT>
	   </TD>
	   
     </TR>			
     <TR>
	   <TD align="left" class="admin">Titulo</TD>
	   <TD valign='top' align='left' colspan='3'>
			<input type="text" id="titulo" name="titulo" class="input_full" value='<?php echo ($line['TITULO'])?>'>
	   </TD>  
	 </TR> 
	 
	 <TR>
	   <TD class="admin" align="left" valign='top'>
	   		Noticia
	   		<br>
	   		<span class="letter_small" style="padding-left:30px">Id:&nbsp;<?php echo ($line['ID_NOTICIA'])?></span>
	   	</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="noticia" rows="25"><?php echo ($line['NOTICIA'])?></textarea>
	   </TD>
	 </TR>
 	 <TR>    
	   <TD align="left" class="admin" valign="top">Imagen</TD>
	   <TD valign='top' align='left'>
       	   <input type='file' name='file_img' size='40'>
	   </TD>
	   <TD valign='top' align='left' colspan="2">
	       <input name='imagen_old' type='hidden' value="<?php echo $line['IMAGEN']?>">
			<?php if(strlen($line['IMAGEN'])>0){ ?>
	    	   <img src="../images/noticias/<?php echo $line['IMAGEN']?>" width="250px"><br>
	       	<?php } ?>
	   </TD>   
	 </TR>	 
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_noticia' value='0'>
  	     </TD>
  	  </TR>  	  
</table>
</form>