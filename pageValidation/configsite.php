<?php 
error_reporting(E_ALL);
 session_start();
 $_SESSION["id"] = "$_GET[medecin]";
include('../pageAcceuil/cnx.php'); 
$query = mysqli_query($conn, "SELECT * FROM medecin WHERE id='{$_SESSION['id']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION["medecinnom"]=$row['nom'];
        $_SESSION["medecinprenom"]=$row['prenom'];
        $_SESSION["adresse"]=$row['adresse'];
        $_SESSION["ville"]=$row['ville'];
    }
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../connexionDoc/inscriptionM/vendor/autoload.php';
$msg = "";
function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    if(isset($_POST["sub"])){
     if (empty($_POST["date"])){
      echo "<script> aler('helo')</script>";
     }
      $date = test_input($_POST["date"]);
      $heure = test_input($_POST["heure"]);
      $nom = test_input($_POST["nom"]);
      $prenom = test_input($_POST["prenom"]);
      $email = test_input($_POST["email"]);
      $phone = test_input($_POST["phone"]);
     
       
     $_SESSION["date"] = "$date";
     $_SESSION["heure"] = "$heure";
     $_SESSION["prenom"] = "$prenom";
     $_SESSION["email"] = "$email";
     $_SESSION["phone"] = "$phone";
    $_SESSION["nom"] = "$nom";
   
      
   
  
//   $input = "$_POST[date]  $_POST[heure]";
  $_SESSION["dateTime"]= "$_SESSION[date]"." "."$_SESSION[heure]";
  $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0,6);
  $_SESSION["code"]=$verification_code;
 
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
      $mail->addAddress($_SESSION["email"]);
      $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
          );
      //Content
         
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Validation  de Rendez-vous Chez SHIFAE';
      $mail->Body    = '<html><body><h2> Bonjour '.$_SESSION["prenom"].'  '.$_SESSION["nom"].'</h2> </br><h2>  Code de validation  Shifae</h2></br>
      <p> Le code de validation de votre  rendez-vous est : </br>
      <b style="font-size :30px;">'.$verification_code.'</b></p>
      
  </body>
  </html>';
      
 
  
      $mail->send();
      echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "</div>";
    $msg ="<p class='alert-blue'> Message bien envoyé .</br> Merci d'avoir nous contacter ! </p> "; 

    
    }
  
  
    
    // isset submit
  if (isset($_POST['submit'])){
    $codee =$_POST["codeverif"];
 
       
    $_SESSION["codee"] = "$codee";
    // $email = mysqli_real_escape_string($conn ,$_POST['email']);
    if (empty($codee)==true){
        $msg ="<p class='alert-red'> Saisez le code de validation  </p> ";
    }
    
    elseif( $_SESSION["codee"] === $_SESSION["code"]){
        $query = mysqli_query($conn, "SELECT * FROM patient WHERE email='$_SESSION[email]'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION["idpat"] = $row["id"];
        $div ="INSERT INTO rendezvous (nom, prenom, email,code,telephone,idMedecin,dateTime,idPatient)
        VALUES ('$_SESSION[nom]', '$_SESSION[prenom]','$_SESSION[email]','$_SESSION[code]', '$_SESSION[phone]', '$_SESSION[id]','$_SESSION[dateTime]','$_SESSION[idpat]')";
              $result = mysqli_query ($conn , $div);
            header("location: final.php");
    }
    else {
      $div ="INSERT INTO rendezvous (nom, prenom, email,code,telephone,idMedecin,dateTime)
      VALUES ('$_SESSION[nom]', '$_SESSION[prenom]','$_SESSION[email]','$_SESSION[code]', '$_SESSION[phone]', '$_SESSION[id]','$_SESSION[dateTime]')";
            $result = mysqli_query ($conn , $div);
          header("location: final.php");
    }
    
    
      
    }
    else{
        $msg="<p class='alert-red'>Assurez-vous que le code est  correct!</p>";

    }

}

?>


