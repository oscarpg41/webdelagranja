<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../css/lagranja.css" type="text/css"></link>

</head>
<body>
<TABLE width="100%" border="0">
 <TR>
   <TD width='55%'><div id="tituloenRojo">:: FOTOS INTRODUCIR</div></TD>
 </TR>       
</TABLE>   
<?php 
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  @(include('funciones.php')) or die ("funciones.php no incluido");

  $id_categoria = strip_tags($_POST["id_categoria"]);
  $id_imagen    = "";
  $nombre      = strip_tags($_POST["nombre"]);
  $comentario  = strip_tags($_POST["comentario"]);
  $autor       = strip_tags($_POST["autor"]);
  $width       = strip_tags($_POST["width"]);
  $height      = strip_tags($_POST["height"]);
  $orden       = strip_tags($_POST["orden"]);
  $imagen      = $_FILES['file_img']['name'];
  
  $msg  = ""; 
  $msg2 = ""; 
  $altaCorrecta = false; 
  
  
  // busco el identificador de la imagen 
  
  $sql = "select max(id_imagen) from fotos where id_categoria=".$id_categoria ;
  $rs = MYSQL_QUERY($sql);
  $rw=mysql_fetch_array($rs);
  $id_imagen = $rw[0] + 1;

  if ($orden =='')
     $orden       = $id_imagen;
  
  // Subimos la imagen al directorio.
  // Si devuelve un 1, se ha subido correctamente y realizamos el insert en la base de datos
         
  $img_correcta = ControlImagen($_FILES["file_img"]["name"],$_FILES["file_img"]["type"],$_FILES["file_img"]["size"],$_FILES['file_img']['tmp_name'],"../images/fotos/".$id_categoria."/");
  //Si no se ha podido subir la imagen, no hacemos la inserción
        
  if ($img_correcta == 1){
      /*  Alta de la noticia */
	$query = "insert into fotos(id_categoria, id_imagen, nombre, comentario, autor, width, height, orden) ";
  	$query .= "values (".$id_categoria.", ".$id_imagen.", '".$nombre."', '".$comentario."','".$autor."',". $width .", ".$height.", ".$orden.")";
	echo $query ."<br>";
	
        $result = MYSQL_QUERY($query);  
  	if (!$result)
  	{
      	   $msg = "No ha sido posible realizar la inserción de la foto.  Error =".mysql_error($IdConexion);
  	}
  	else
  	{
     	   mysql_query("COMMIT"); // efectuamos el commit ahora
           $msg = "Se ha realizado el alta correctamente. ";
           $altaCorrecta = true;
  	}      	     	
        print ("<script>alert('".$msg. "');</script>"); 
  }
?>   

<script>window.history.back();</script>
</body>
</html>
