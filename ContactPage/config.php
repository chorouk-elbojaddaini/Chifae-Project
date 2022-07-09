<?php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../connexionDoc/inscriptionM/vendor/autoload.php';
include '../connexionDoc/cnx.php';
$msg = "";
if (isset ($_POST['submit'])){
    $nom = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $numero = mysqli_real_escape_string($conn,$_POST['phone']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);
    if (empty($email)==true){
        $msg ="<p class='alert-red'> veuillez remplir le champ email</p> ";
    }
    elseif (empty($nom)==true){
        $msg ="<p class='alert-red'> veuillez remplir le champ nom</p> ";
    }
    elseif (empty($numero)==true){
        $msg ="<p class='alert-red'> veuillez remplir le champ numero</p> ";
    }
    elseif (empty($message)==true){
        $msg ="<p class='alert-red'> veuillez remplir le champ message </p> ";
    }

    else{
    
echo "<div style='display: none;'>";
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'chifae091@gmail.com';                     //SMTP username
    $mail->Password   = 'ckeptwienqsqhiaz';           //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('chifae091@gmail.com');
    $mail->addAddress('chifae091@gmail.com');
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ContactUS';
    $mail->Body    = '<html><body><h1>Contact Shifae</h1>
    <h4> from : '.$nom.'</h4>
    </br> <h4> email : '.$email.'</h4></br>
    <h4> numero : '.$numero.'</h4></br>
    <h4> message : '.$message.'</h4></br></b>
</body>
</html>';
  
    $mail->send();
    echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      echo "</div>";
  $msg ="<div class='alert-blue'> Message bien envoyé .</br> Merci d'avoir nous contacter ! </div> ";    
    
    }
}
?>