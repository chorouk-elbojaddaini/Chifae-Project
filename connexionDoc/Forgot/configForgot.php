<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../inscriptionM/vendor/autoload.php';
include '../cnx.php';
$msg ="";
if (isset ($_POST['submit'])){
$email = mysqli_real_escape_string($conn,$_POST['email']);
$code = mysqli_real_escape_string($conn ,md5(rand()));
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM medecin WHERE gmail = '{$email}'")) > 0 ) {
    if (empty($email)==true){
        $msg ="<p class='alert-red'> veuillez remplir le champ email</p> ";
    }
   else{
$query = mysqli_query($conn, "UPDATE medecin SET code= '{$code}' WHERE gmail = '{$email}'");
if($query){
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
    $mail->addAddress($email);
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Shifae';
    $mail->Body    = '<html><body><img src="https://pic.clubic.com/v1/images/1952781/raw?fit=max&width=1200&hash=3b63d6b709fd07bc7292c61a2ff02cf8fe3d2a62" width="160" height="120" border-radius="10%" alt="logo" /></a><h1> <i> Shifae </i> </h1> </br> <h4 style="color:#fe6686;"> <u> Récupération du mot de passe </u></h4> <p> Voici le lien pour réinitialiser votre mot de passe </p> </br></br><b> <a href="http://localhost/cabinetProject/connexionDoc/Forgot/changePassword.php?reset='.$code.'">http://localhost/cabinetProject/connexionDoc/Forgot/changePassword.php?reset='.$code.'</a></b>
</body>
</html>';
  
    $mail->send();
    echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      echo "</div>";
  $msg ="<p class='alert-blue'> nous avons envoyer un email de récupération ! </p> ";    
    }

}
} else{
$msg = "<div class ='alert-red'> $email - cet email n 'existe pas. </div>";
}
}

?>