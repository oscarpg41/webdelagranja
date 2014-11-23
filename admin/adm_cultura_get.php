<script>
	function cambio_evento()
	{
		if (document.frmdatos.select_evento.value >0)
	     var_url = "adm_cultura_get&select_evento="+document.frmdatos.select_evento.value;
		else	
			var_url = "adm_cultura_get&select_evento=0";
	
		location.href='index.php?dir='+var_url;
	}
	
	function borrar(){
		if (window.confirm("�Desea eliminarlo definitivamente?")) {  
	        document.frmdatos.borrar_cultura.value = "1";
	        document.frmdatos.submit();
	    }
	}	
</script>
<?php

	$site_id=mysql_escape_string($_GET['select_evento']);

    $sql = "select titulo, id, tipo, autor from cultura order by fecha desc LIMIT 30";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_noticias ="";

   $num = 0;
   while ($rst=mysql_fetch_array($result)) {
   		$selected = "";
		
		if ($rst["id"] == $site_id){
			$selected = " selected";
		}	   		
   		$titulo =substr($rst["titulo"],0,70);
   		$cadena_gestion .="<option value='".$rst["id"]."'". $selected .">".$rst["tipo"].":".$titulo.":".$rst["autor"]."</option>";
   }
   
   
    //Recuperamos la informacion seleccionada
	$query  = "SELECT tipo, titulo, autor, detalles, imagen, id, organizador, lugar, url,";
	$query .= " DATE_FORMAT(fecha, '%Y-%m-%d') inicio, DATE_FORMAT(fecha_fin, '%Y-%m-%d') fin,";
	$query .= " DATE_FORMAT(fecha, '%H') hora2, DATE_FORMAT(fecha, '%i') minutos2 ";
	$query .= " FROM cultura WHERE id=".$site_id;

	//echo "<br>".$query;
	$result=mysql_query($query);
	$line=mysql_fetch_array ($result);

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
       	$("#datepicker2").datepicker({
       		maxDate: "+6m",
       		showOn: "button",
       		buttonImage: "../images/calendario.jpg",
       		buttonImageOnly: true
       	});

       	$('#datepicker').datepicker("setDate", new Date("<?php print($line['inicio'])?>") );  //se inicia con la fecha actual
       	$('#datepicker2').datepicker("setDate", new Date("<?php print($line['fin'])?>") );  //se inicia con la fecha actual
	});
</script>


<TABLE width="100%" cellpadding="10" class="border" border="0">
<form name="frmdatos" method="post" action="index.php?dir=adm_cultura_int" enctype='multipart/form-data'>

	 <TR><TD colspan="4"><div id="titulo1">EXPOSICIONES</div></TD></TR>       
	
	 <TR>
	    <TD class="text" align="left">Listado exposiciones</TD>
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
     		<input name='titulo' id='titulo' type='text' class="input_full" value='<?php echo $line['titulo']?>'>
     	</TD>
		<TD class="admin" align="center" >Tipo</TD>
     	<TD valign='top' align='left'>
	      	<SELECT name="tipo_evento">
	         	<option <?php if ($line['tipo'] == "Exposicion") print "selected" ?> value="Exposicion">Exposici&oacute;n</option>
	      	</SELECT>	       
	    </TD>
     	
     </TR>			
     <TR>
     	<TD class="admin" align="left">Autor</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='autor' id='autor' type='text' class="input_full" value='<?php echo $line['autor']?>'>
     	</TD>
     </TR>			
	 <TR>
		<TD class="admin" align="center" >Organizador</TD>
     	<TD valign='top' align='left'>
     		<input name='organizador' id='organizador' type='text' class="input_full" value='<?php echo $line['organizador']?>'>
	     </TD>
		<TD class="admin" align="center" >Lugar</TD>
     	<TD valign='top' align='left'>
			<input name='lugar' id='lugar' type='text' class="input_full" value='<?php echo $line['lugar']?>'>
		</TD>
     </TR>
     
	 <TR>
		<TD class="admin" align="center" >Enlace externo (url)</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='url' id='url' type='text' class="input_full" value='<?php echo $line['url']?>'>
	     </TD>
     </TR>
          
	 <TR>
	   <TD align="left" class="admin">Fecha Inicio</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="inicio" class="input_small" required="required">
	   </TD>
	   <TD align="left" class="admin">Fecha Fin</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker2" name="fin" class="input_small" required="required">
	   </TD>
	</TR>    
	 
	 <TR>
	   <TD class="admin" align="left" >Hora</TD>
	   <TD colspan="3" align='left' class="letter_small">
	   	  <select name="horas">
	   	   <option value=""></option> 
	   	   <?php for ($j=8;$j<=24;$j++){ 
	   	        	if ($j <10) $j="0".$j;
	   	        	if ($j==$line['hora2'])
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
	   	        	if ($j==$line['minutos2'])
		        		print ("<option selected value=". $j .">". $j ."</option>");
		        	else
		        		print ("<option value=". $j .">". $j ."</option>"); 
		      				      	}  
		   ?> 
	          </select>mm
	   </TD>
	 </TR> 
	<TR>
	   <TD class="admin" align="left" valign='top' >Descripci&oacute;n</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="detalles" rows="15"><?php echo $line['detalles']?></textarea>
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
	        	<img src="../images/cultura/<?php echo $line['imagen']?>" width=200px /> <br><br>
	      	<?php }?>  
	        <input name='imagen_old' type='hidden' value="<?php echo $line['imagen']?>">
		</TD>

	</TR>
	 
 	<TR>    
  		<TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
		    <a class="button" href="javascript:borrar();" style="margin-left:140px">Borrar Registro</a>
        	<input type='hidden' name='borrar_cultura' value='0'>
	        
  	    </TD>
  	</TR>   	 
	 
	 
</form>
</TABLE>