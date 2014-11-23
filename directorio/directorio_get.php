<?php
 header('Content-Type: text/html; charset=UTF-8');  
  @(include('../bbdd.php')) or die ("bbdd.php no incluido");
  
if (!isset ($_GET['select_directorio']))
	die("???");

$site_id=mysql_escape_string($_GET['select_directorio']);
if ($site_id =="")
  $site_id = 1;
  
/* PAGINACION */
  $TAMANO_PAGINA = 10; 
//examino la p�gina a mostrar y el inicio del registro a mostrar 
  $pagina = $_GET["pagina"]; 
  if (!$pagina) { 
     $inicio = 0; 
     $pagina=1; 
  } 
  else { 
     $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
  } 
  
  //echo $inicio."<br>";
  
  
mysql_query("SET NAMES 'utf8'");
$sql = "select nombre from cat_directorio where id_categoria=".$site_id;  
$result = mysql_query($sql, $IdConexion);
$row=mysql_fetch_array($result);
?>
<div id="listado_empresas">
   <span id='name_sector'> <?php echo htmlentities($row['nombre']) ?></span>
<?php
$query = "select id_cliente from directorio where id_categoria=".$site_id;  

$result=mysql_query($query);

//calculo el total de p�ginas 
$num_total_registros = mysql_num_rows($result); 
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 


//muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas 
if ($total_paginas > 1){ 
	  echo "Paginas: ";
    for ($i=1;$i<=$total_paginas;$i++){ 
        if ($pagina == $i) 
               //si muestro el �ndice de la p�gina actual, no coloco enlace 
           echo $pagina . " "; 
        else 
        {
            //si el �ndice no corresponde con la p�gina mostrada actualmente, coloco el enlace para ir a esa p�gina 
            echo "<a class='link3' href='javascript:cambio_empresas(". $site_id .",".$i.")'><U>" . $i . "</U></a> "; 
        }   
    }    
} 

$query = "select id_cliente, nombre, direccion, tlf, fax, web, texto, email from directorio where id_categoria=".$site_id." order by nombre";
$query .= " limit ". $inicio  .",".$TAMANO_PAGINA ;

//echo $query;
$result=mysql_query($query);

while (($line=mysql_fetch_array ($result))!=null)
{
	 if ($line['fax']==0) $_fax="";
   else $_fax=$line['fax'];

	 if ($line['tlf']==0) $_tlf="";
   else $_tlf=$line['tlf'];
   
?>	
   <div id="desc_empr" style="margin-top:10px">
   	  <B class="text2Bold"><?php echo htmlentities($line['nombre'])?></B><br>
   	  <div style="margin-top:10px">
<?php
   	  if (strlen($line['direccion'])>0)
   	     echo "<span class='text1Bold'>Direcci&oacute;n:</span> ".htmlentities($line['direccion'])."<br>";

   	  if (strlen($_tlf)>0)
     	  echo "<span class='text1Bold'>Tel&eacute;fono:</span> ".$_tlf."&nbsp;&nbsp;&nbsp;&nbsp;";

   	  if (strlen($_fax)>0)
     	  echo "<span class='text1Bold'>Fax:</span> ".$_fax."&nbsp;&nbsp;&nbsp;&nbsp;";

   	  if (strlen($line['web'])>0)
   	    echo "<span class=text1Bold>Web:</span> <a href='".$line['web']."' class='link6'>".$line['web']."</a><br>";

   	  if (strlen($line['email'])>0)
   	    echo "<span class=text1Bold>Email:</span> <a href='mailto:".$line['email']."' class='link6'>".$line['email']."</a><br>";
?>     	  
   	  </div>
      <div style="margin-top:10px"><?php echo nl2br(htmlentities($line['texto']))?></div>
  </div>
<?php  
}
?>
</div>