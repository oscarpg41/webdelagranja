<script>
	function cambio_evento()
	{
		if (document.frmdatos.select_evento.value >0)
	     var_url = "adm_nochesmagicas_get&select_evento="+document.frmdatos.select_evento.value;
		else	
			var_url = "adm_nochesmagicas_get&select_evento=0";
	
		location.href='index.php?dir='+var_url;
	}
	
	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_nochesmagicas.value = "1";
	        document.frmdatos.submit();
	    }
	}	
</script>
<?php

	$site_id=mysql_escape_string($_GET['select_evento']);

	//Creamos el combo
   $sql = "select nombre, fecha, id from noches_magicas order by fecha desc LIMIT 30";  
	
   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_noticias ="";

   $num = 0;
   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		
		if ($rst["id"] == $site_id){
			$selected = " selected";
		}	   		
   		$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">".$rst["fecha"]."::".$rst["nombre"]."</option>";
   }
   
   
    //Recuperamos la informacion seleccionada
	$query  = "SELECT nombre, hora, texto, imagen, id, lugar,";
	$query .= " DATE_FORMAT(fecha, '%Y-%m-%d') fecha ";
	$query .= " FROM noches_magicas WHERE id=".$site_id;

	//echo "<br>".$query;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);
	
	
	$horario = explode(":", $line['hora']);
	$hora = $horario[0];
	$minutos = $horario[1];

?>
<script type="text/javascript">
   //iniciar el calendario
   $(document).ready(function() {
       	$("#datepicker").datepicker({
       		maxDate: "+6m",
       		showOn: "button",
       		buttonImage: "../images/calendario.jpg",
       		buttonImageOnly: true
       	});
       	$('#datepicker').datepicker("setDate", new Date("<?php print($line['fecha'])?>") );  //se inicia con la fecha actual
	});
</script>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_nochesmagicas_int" enctype='multipart/form-data'>

	 <TR><TD colspan="4"><div id="titulo1">NOCHES MAGICAS</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado eventos</TD>
	    <TD align="left" colspan="3">
              <SELECT name="select_evento" class="control" onchange="javascript:{cambio_evento()};">
                 <option value="" selected></option>
                 <?php echo $cadena_gestion?>
              </select>
		</TD>
	 </TR>

     <TR>
     	<TD class="admin" align="left">Titulo</TD>
     	<TD valign='top' align='left'>
     		<input type="hidden" name="id_evento" value="<?php echo $line['id']?>">
     		<input name='nombre' id='nombre' type='text' class="input_full" value='<?php echo ($line['nombre'])?>'>
     	</TD>
     </TR>			
	 <TR>
		<TD class="admin" align="center" >Lugar</TD>
     	<TD valign='top' align='left'>
			<input name='lugar' id='lugar' type='text' class="input_full" value='<?php echo ($line['lugar'])?>'>
		</TD>
     </TR>			
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small" required="required">
	   <TD class="admin" align="left" >Hora</TD>
	   <TD colspan="3" align='left' class="letter_small">
	   	  <select name="horas">
	   	   <option value=""></option> 
	   	   <?php for ($j=8;$j<=24;$j++){ 
	   	        	if ($j <10) $j="0".$j;
	   	        	if ($j==$hora)
		        		print ("<option selected value=". $j .">". $j ."</option>");
		        	else
		        		print ("<option value=". $j .">". $j ."</option>"); 
		       	 }  
		   ?> 
	          </select> hh    
	          <select name="minutos"> 
	     	   <option value=""></option> 
		   <?php for ($j=0;$j<60;$j=$j+15){ 
		      		if ($j <10) $j="0".$j;
	   	        	if ($j==$minutos)
		        		print ("<option selected value=". $j .">". $j ."</option>");
		        	else
		        		print ("<option value=". $j .">". $j ."</option>"); 
		      				      	}  
		   ?> 
	          </select>mm
	   </TD>
	 </TR> 
	<TR>
	   <TD class="admin" align="left" valign='top' >Descripci�n</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="15"><?php echo ($line['texto'])?></textarea>
	   </TD>
	</TR>

 	<TR>
    	<TD valign='top' align='left'>
			Nueva Imagen:<br>
		</TD>
    	<TD valign='top' align='left'>
			<input type='file' name='file_img' size='40'>
		</TD>
		<TD class="admin" align="left" valign='top' >Imagen</TD>
    	<TD valign='top' align='left'>
      
	      	<?php if (strlen($line['imagen'])>0){?>     
	        	<img src="../images/agenda/<?php echo ($line['imagen'])?>" width=200px /> <br><br>
	      	<?php }?>  
	        <input name='imagen_old' type='hidden' value="<?php echo $line['imagen']?>">
		</TD>

	</TR>
	 
 	<TR>    
  		<TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_nochesmagicas' value='0'>
	        
  	    </TD>
  	</TR>   	 
	 
	 
</form>
</TABLE>