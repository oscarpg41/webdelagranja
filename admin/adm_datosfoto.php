<?php

  $optionsCategorias="";
  $query = "select id_categoria, nombre from categorias order by id_categoria";
     
  $result = MYSQL_QUERY($query);
  if (!$result){
	print ("<span class='textNaranjaBold'>Error al recuperar las imágenes de la Categoria: $nombre_categorias[$cat]</span>");
  }else{
    $optionsCategorias .= "<select name='id_categoria'><option value='-1'></option>";
    if (mysql_num_rows($result) > 0){
      while ($row=mysql_fetch_array($result)){
       $optionsCategorias .= "<option value='" .$row["id_categoria"]."'>". $row["id_categoria"] ." - ". $row["nombre"] ."</option>";
      }
      $optionsCategorias .= "</select>";
    }
  }
?>
</head>

<body>
<TABLE width="100%" border="0">
 <TR>
   <TD width='55%'><div id="tituloenRojo">:: INTRODUCIR FOTO</div></TD>
 </TR>       
</TABLE>   

<div id="divdatos">
<table width="100%" align="center" cellpadding="5" cellspacing="1" bgcolor="#ffffff">
     <form name="insert_foto" method="post" action="int_foto.php" enctype='multipart/form-data'>

     <TR><TD valign='top' align='right'> Categoria </TD>
         <TD bgcolor="#CED4E8"> <?php echo  $optionsCategorias ?> </TD>
     <TR><TD valign='top' align='right'>Nombre</TD>
         <TD bgcolor="#CED4E8"><input name='nombre' type='text' size='50' value=''></TD>
     <TR>
   	 <TD valign='top' align='right'>Imagen</TD>
   	 <TD bgcolor="#CED4E8"><input type='file' name='file_img' size='40'></TD>
     </TR>         
     <TR><TD valign='top' align='right'>Comentario</TD>
         <TD bgcolor="#CED4E8"><input name='comentario' type='text' size='50' value=''></TD>
     <TR><TD valign='top' align='right'>Autor</TD>
         <TD bgcolor="#CED4E8"><input name='autor' type='text' size='30' value=''></TD>
     <TR><TD valign='top' align='right'>Width</TD>
         <TD bgcolor="#CED4E8"><input name='width' type='text' size='30' value=''></TD>
     <TR><TD valign='top' align='right'>Height</TD>
         <TD bgcolor="#CED4E8"><input name='height' type='text' size='30' value=''></TD>
     <TR><TD valign='top' align='right'>Orden</TD>
         <TD bgcolor="#CED4E8"><input name='orden' type='text' size='30' value=''></TD>
     <TR><TD valign='bottom' align='center' colspan="2" height="50px">    
             <a href='javascript:document.insert_foto.submit();'><IMG src='../images/flecha0.gif' border='0'></a>
         </TD>
     </TR>
     </form>
</table>
</div>      
</form>
<?php
  if (isset ($_GET['seleccionado']))
  {
?>  	
<script>
   document.frmdatos.select_agenda.value = <?php echo $_GET['seleccionado'] ?>;
   //cambio_agenda();
</script>
<?php
  }
?>
