<script>
	function cambio_evento()
	{
		if (document.frmdatos.select_evento.value >0)
	     var_url = "adm_nochesmagicas_get&select_evento="+document.frmdatos.select_evento.value;
		else	
			var_url = "adm_nochesmagicas_get&select_evento=0";
	
		location.href='index.php?dir='+var_url;
	}
	

   //iniciar el calendario
   $(document).ready(function() {
       	$("#datepicker").datepicker({
       		maxDate: "+6m",
       		showOn: "button",
       		buttonImage: "../images/calendario.jpg",
       		buttonImageOnly: true
       	});
       	$('#datepicker').datepicker("setDate", new Date() );  //se inicia con la fecha actual
	});
</script>

<?php

	//Creamos el combo
   $sql = "select nombre, fecha, id from noches_magicas order by fecha desc LIMIT 30";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_noticias ="";

   $num = 0;
   while ($rst=mysql_fetch_array($result)) {
   		$titulo =substr($rst["titulo"],0,70);
   		$cadena_gestion .="<option value='".$rst["id"]."'>".$rst["fecha"]."::".$rst["nombre"]."</option>";
   }
?>
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
     	<TD valign='top' align='left' colspan='3'>
     		<input name='nombre' id='nombre' type='text' class="input_full">
     	</TD>
     </TR>			
	 <TR>
		<TD class="admin" align="center" >Lugar</TD>
     	<TD valign='top' align='left' colspan='3'>
			<input name='lugar' id='lugar' type='text' class="input_full">
		</TD>
	 </TR>
	 
	 <TR>
	   <TD align="left" class="admin">Fecha</TD>
	   <TD valign='top' align='left'>
	   		<input type="text" id="datepicker" name="fecha" class="input_small" required="required">
	   </TD>
	   <TD class="admin" align="left" >Hora</TD>
	   <TD colspan="3" align='left' class="letter_small">
	   	  <select name="horas">
	   	   <option value=""></option> 
	   	   <?php for ($j=8;$j<=24;$j++){ 
	   	        	if ($j <10) $j="0".$j;
		        		print ("<option value=". $j .">". $j ."</option>"); 
		       	 }  
		   ?> 
	          </select> hh    
	          <select name="minutos"> 
	     	   <option value=""></option> 
		   <?php for ($j=0;$j<60;$j=$j+15){ 
		      		if ($j <10) $j="0".$j;
	                   print ("<option value='". $j ."'>". $j ."</option>");
		      	}  
		   ?> 
	          </select>mm
	   </TD>
	 </TR> 
	<TR>
	   <TD class="admin" align="left" valign='top' >Descripción</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="texto" rows="15"></textarea>
	   </TD>
	</TR>

 	<TR>
     <TD class="admin" align="left" valign='top' >Imagen</TD>
     <TD colspan="3" valign='top' align='left'>
        <input type='file' name='file_img' size='40' >
     </TD>
	 </TR>
 	 <TR>    
  	     <TD valign='middle' align='center' colspan="4">
	        <input type='hidden' name='modificar' value='1'>
	        <input type="submit" value="Guardar" />
  	     </TD>
  	  </TR>   
</form>
</TABLE>

<?php if (isset ($_GET['seleccionado'])){ ?>
	<script>
		document.frmdatos.select_evento.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_evento();
	</script>
<?php } ?>