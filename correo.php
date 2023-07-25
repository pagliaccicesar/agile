<?php 
if(isset($_POST['email'])) { 
    $email_to = "contacto@azagile.ar"; 
    $email_subject = "Te quiero contactar desde wwww.azagile.ar";   
 
    function died($error) {
        echo '<body style="background-color:#fe4040;text-align:center;font-family: Trebuchet MS, sans-serif";>';
        echo '<img src="img/azagile.png" width="100" height="160" />';       
        echo "<h1>AZAGILE</h1><h2>Existe un error en el dato ingresado.</h2>";         
        echo $error."<br /><br />"; 
        echo "<h2>Presione aquí debajo para volver al formulario.</h2><br />";
		echo "<button style=background-color:gold;border-radius:20%><p><a href='https://azagile.ar/index.html'>VOLVER</a></p></button>";  
    
        die(); 
    }
    $email_from = $_POST['email']; // required    
    
    $error_message = ""; 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) { 
    $error_message .= '<li><h1>La dirección de correo electrónico es incorrecta<h1></li>'; 
  }
 
   
 
  if(strlen($error_message) > 0) { 
    died($error_message); 
  } 
    $email_message = "Estos son datos enviados desde la web.\n\n"; 

    
    function clean_string($string) { 
      $bad = array("content-type","bcc:","to:","cc:","href"); 
      return str_replace($bad,"",$string); 
    }
    
    $email_message .= "Email Adress: ".clean_string($email_from)."\n";    
 
$headers = 'From: '.$email_from."\r\n". 
'Reply-To: '.$email_from."\r\n" . 
'X-Mailer: PHP/' . phpversion(); 
@mail($email_to, $email_subject, $email_message, $headers);   
?>

<?php
header("Location: https://www.azagile.ar/index.html"); // Redirecionamos a Baulphp
exit(); //terminamos la ejecución del script php, ya que si redirecionamos ya no nos interesa seguir con el codigo PHP anterior.
 
//<!-- include your own success html here --> 
//<!--<h1 style="backgrund-color: red">Thank you for your message!</h1> <h2>We will contact you as soon as possible.</h2>-->
//<br>//
//<br>//

//<button><a href="./index.html">Home</a></button> 
 
//<?php 
}
 //?>