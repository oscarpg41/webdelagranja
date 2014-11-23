<?php
function GD_informacion(){   
     echo "Soporte a GD en tu servidor: ";   
     // Comprobamos si la funcion gd_info existe   
     // lo cual nos asegurara que el paquete gd esta instalado   
     if(function_exists("gd_info")){   
               echo "SI";   
               $gd = gd_info();   
               // Mostramos todos los valores de gd_info   
               foreach($gd as $key => $valor){   
                    echo "<br />" . $key . ": ";   
                    if($valor)   
               echo "SI";   
          else   
               echo "NO";   
          }   
     }   
     else   
          echo "NO";   
}   
// Llamamos a la funcion   
GD_informacion();  

?>


<?php phpinfo(); ?>

