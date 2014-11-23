<?php

$EmailFrom = $_REQUEST['email']; 
$EmailTo = "maria_marpg@hotmail.com, info@webdelagranja.com"; // Your email address here
$Subject = "Correo desde la web de Corte y Costura";
$Name = Trim(stripslashes($_POST['name'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  echo "Error";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= "\n";
$Body .= "\n";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  $msg = "Gracias por contactar conmigo. Me pondré en contacto con usted muy pronto";
}
else{
  $msg = "Se ha producido un error en el envío del email. Siento las molestias";
}
?>
<script>
   alert("<?php echo $msg?>");
   document.location.href="contact.php";
</script>