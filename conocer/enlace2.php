<html>
<head>
<?php 
     @(include('../bbdd.php')) or die ("bbdd.php no incluido");
     $id = $_GET["id"];
     
     $query = "select web, click from enlaces where id_enlace=".$id;  
     $result = MYSQL_QUERY($query);
//     echo $query;
     $row=mysql_fetch_array($result);
     $num_click = $row["click"];
     $url = $row["web"];
     
     $num_click ++;
     
     $query = "update enlaces set click=".$num_click." where id_enlace=".$id;
     $result = MYSQL_QUERY($query);
?>
<script>document.location="<?php echo $url?>";</script>
</body>
</html>