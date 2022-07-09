<?php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
include '../cnx.php';
$msg = "";
// fonction pour la vérification de mot de passe 
function check_mdp_format($mdp)
{
$majuscule = preg_match('@[A-Z]@', $mdp);
$minuscule = preg_match('@[a-z]@', $mdp);
$chiffre = preg_match('@[0-9]@', $mdp);

if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 5)
{
    return false;
}
else 
    return true;
}
if (isset($_POST['submit'])){
$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
$secondname = mysqli_real_escape_string($conn,$_POST['secondname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$motdepasse = mysqli_real_escape_string($conn,($_POST['motdepasse']));
$motdepasse2 = mysqli_real_escape_string($conn,$_POST['motdepasse2']);
$numero = mysqli_real_escape_string($conn,$_POST['numero']);
$date = mysqli_real_escape_string($conn,$_POST['date']);
$genre = mysqli_real_escape_string($conn,$_POST['genre']);
$code = mysqli_real_escape_string($conn,md5(rand()));
$isMobile = preg_match('#^0[6-7]{1}\d{8}$#', $numero);

if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM patient WHERE email = '{$email}'"))>0){
    $msg ="<p class='alert-red'> {$email} -Cet email est déjà inscrit!</p> ";
    

}
elseif (!$isMobile){
  $msg ="<p class='alert-red'> le numero doit contenir 10 chiffres et commence par 07 ou 06! </p> ";
}
elseif(empty($firstname) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ nom </p> ";

}
elseif(empty($secondname) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ prenom </p> ";

}

elseif(empty($email) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ email </p> ";

}
elseif(empty($motdepasse) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ mot de passe</p> ";

}
elseif(empty($motdepasse2) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ confirmation mot de passe </p> ";

}
elseif(empty($genre) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ genre </p> ";

}


elseif(empty($numero) == true){
  $msg ="<p class='alert-red'> veuillez remplir le champ numero </p> ";

}

else{
if($motdepasse == $motdepasse2 ){
  if (check_mdp_format("$motdepasse") != true)
  {
    $msg ="<p class='alert-red'> Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, et 8 caractères!</p> ";
  }
  else {
    $sql ="INSERT INTO patient (nom,prenom ,email,motdepasse,sexe,datenaissace ,numero,code) VALUES ('{$firstname}' , '{$secondname}' ,  '{$email}', '{$motdepasse}', '{$genre}', '{$date}',  '{$numero}','{$code}') ";
    $result=mysqli_query($conn,$sql);
    if ($result) {
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
                    $mail->Body  = '<html><body><img src="https://recruteur.lefigaro.fr/wp-content/uploads/2022/02/FR_welcome_pack.jpg" width="160" height="120" border-radius="10%" alt="logo" /></a><h1> <i> Shifae  </i> </h1> </br> <h4 style="color:#fe6686;"> <u> Bonjour '.$firstname.' </u></h4> <p>bienvenue dans  l\'espace patient de notre site Shifae voici le lien de validation de votre compte    </p> </br></br> <b><a href="http://localhost/cabinetProject/connexionPat/?verification='.$code.'">http://localhost/cabinetProject/connexionPat/?verification='.$code.'</a></b> </body></html>';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
    $msg ="<div class='alert-blue'> nous avons vous envoyer un email de vérification! </div> ";

    }
    else{
    $msg ="<div class='alert-green'> quelque chose ça marche pas! </div> ";

    }


}

}
else{
  $msg ="<p class='alert-red'>Assurez-vous que le mot de passe a été entré correctement.!</p> ";
}
}
}
?>