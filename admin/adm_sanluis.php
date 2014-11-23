<script type="text/javascript">
function borrar(id){
	if (window.confirm("¿Desea eliminarlo definitivamente?")) {  
		document.location.href="index.php?dir=adm_sanluis_int&modo=delete&id="+id;
	}	
}
</script>

<TABLE width="100%" cellpadding="10" class="border">
	 <TR><TD colspan="4"><div id="titulo1">PROGRAMA DE FIESTAS</div></TD></TR>       

	 <TR>
	    <TH align="left">Fecha</TD>
	    <TH align="center">Dia</TD>
	    <TH align="center">Actos</TD>
	    <TH align="center">&nbsp;</TD>
	 </TR>

<?php
  
	// CREAMOS EL COMBO DE CURSOS
   	$cadena_gestion ="";
	$sql = "select id, dia, texto, fecha, DATE_FORMAT(fecha, '%d/%m/%Y') fecha2 from sanluis";
	$sql.= " order by fecha";
   	$result = mysql_query($sql, $IdConexion);

	while ($rst=mysql_fetch_array($result)) {
		$color=($color=="#edefef"?"#f4f6f6":"#edefef");
?>


<script>
	//iniciar el calendario
	$(document).ready(function() {
		$("#datepicker<?php echo $rst["id"]?>").datepicker({
	    	maxDate: "+6m",
	       	showOn: "button",
	       	buttonImage: "../images/calendario.jpg",
	       	buttonImageOnly: true
		});

		$('#datepicker<?php echo $rst["id"]?>').datepicker("setDate", new Date("<?php print($rst['fecha'])?>") );  //se inicia con la fecha actual
	});	
</script>


	<form name="frmdatos<?php echo $rst["id"]?>" method="post" action="index.php?dir=adm_sanluis_int">

    <TR>
     	<TD class="admin" align="left" valign="top" <?php echo "bgcolor=".$color ?>><?php echo $rst["dia"]?></TD>
     	<TD class="admin" align="center" valign="top" <?php echo "bgcolor=".$color?>>
			<input type="text" id="datepicker<?php echo $rst["id"]?>" name="fecha" class="input_small">     		
     	</TD>
     	<TD class="admin" align="left" valign="top" <?php echo "bgcolor=".$color?>>
     		<textarea name="texto" id="texto" rows=8 cols=60><?php echo $rst["texto"]?></textarea>
     	</TD>
		<TD valign='middle' align='center' <?php echo "bgcolor=".$color?>>
	        <input type="submit" value="Guardar" />
	        <input type="hidden" id="id" name="id" value="<?php echo $rst["id"]?>" /><br>
		    <a class="button" href="javascript:borrar(<?php echo $rst["id"]?>);">Borrar Registro</a>
  	    </TD>
	</TR>
	
	</form>
<?php
 	} 
?>
</TABLE>

<script>
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

<br><br>

<TABLE width="100%" cellpadding="10" class="border">
	 <TR><TD colspan="4"><div id="titulo1">INTRODUCIR PROGRAMA</div></TD></TR>       

	 <TR>
	    <TH align="center">Dia</TD>
	    <TH align="center">Actos</TD>
	    <TH align="center">&nbsp;</TD>
	 </TR>


	<form name="frmdatos" method="post" action="index.php?dir=adm_sanluis_int">

    <TR>
     	<TD class="admin" align="center" valign="top" <?php echo "bgcolor=".$color?>>
			<input type="text" id="datepicker" name="fecha" class="input_small">     		
     	</TD>
     	<TD class="admin" align="left" valign="top" <?php echo "bgcolor=".$color?>>
     		<textarea name="texto" id="texto" rows=10 cols=60><?php echo $rst["texto"]?></textarea>
     	</TD>
		<TD valign='middle' align='center' <?php echo "bgcolor=".$color?>>
	        <input type="submit" value="Guardar" />
  	    </TD>
	</TR>
	
	</form>

</TABLE>   

<?php if (isset ($_GET['seleccionado'])) { ?>  	
	<script>
		document.frmdatos.select_libro.value = <?php echo $_GET['seleccionado'] ?>;
		cambio_libro();
	</script>
<?php } ?>