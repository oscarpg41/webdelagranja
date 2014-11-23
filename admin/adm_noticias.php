<script>
	function cambio_noticia()
	{
		if (document.frmdatos.select_noticia.value >0)
	     var_url = "adm_noticias_get&select_noticia="+document.frmdatos.select_noticia.value;
		else	
			var_url = "adm_noticias_get&select_noticia=0";
	
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
// CREAMOS EL COMBO DE NOTICIAS
// y buscamos las noticias y eventos de los dos últimos meses
   $mesArray = array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

   $mes = date("m");
   $anyo = date("y");
   if ($mes<2){ 
   		$anyo = $anyo-1;
   		$mes = "12";
   }
   else
       $mes = $mes-1;
       
   $nombre_mes_inicio = $mesArray[$mes-1];
   $nombre_mes_final  = $mesArray[date("m")-1];
   
   $fecha_inicio =$anyo."-".$mes."-"."01";
   $fecha_fin    =date("y")."-".date("m")."-"."31";
   $sql = "select titulo, id_noticia from noticias order by fecha desc LIMIT 30";  

   //echo $sql;
   $result = mysql_query($sql, $IdConexion);
   $cadena_noticias ="";

   while ($rst=mysql_fetch_array($result)) {
   		$titulo =substr($rst["titulo"],0,100);
   		$cadena_gestion .="<option value='".$rst["id_noticia"]."'>".$titulo."</option>";
   }
?>   
   
  

<form name="frmdatos" method="post" action="index.php?dir=adm_noticias_int">
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
     		<input name='autor' id='autor' type='text' required="required" class="input_full">
     	</TD>
     	<TD class="admin" align="left">email</TD>
     	<TD valign='top' align='left' colspan='3'>
     		<input name='email' id='email' type='email' class="input_full">
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
				<option value="0">No</option>
				<option value="1">Si</option>
			</SELECT>
	   </TD>
	   
     </TR>			
     <TR>
	   <TD align="left" class="admin">Titulo</TD>
	   <TD valign='top' align='left' colspan='3'>
			<input type="text" id="titulo" name="titulo" class="input_full">
	   </TD>  
	 </TR> 
	 
	 <TR>
	   <TD class="admin" align="left" valign='top' >Noticia</TD>
	   <TD colspan="3" valign='top' align='left'>
	      <textarea name="noticia" rows="25"></textarea>
	   </TD>
	 </TR>	 
</table>
</form>


<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_noticia.value = <?php echo $_GET['seleccionado'] ?>;
		if(document.frmdatos.select_noticia.value != 0){ cambio_noticia();}	
	</script>
<?php } ?>
