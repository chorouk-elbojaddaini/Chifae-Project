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
    $cin = mysqli_real_escape_string($conn,$_POST['cin']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $motdepasse = mysqli_real_escape_string($conn,($_POST['motdepasse']));
    $motdepasse2 = mysqli_real_escape_string($conn,$_POST['motdepasse2']);
    $genre = mysqli_real_escape_string($conn,$_POST['genre']);
    $specialite = mysqli_real_escape_string($conn,$_POST['specialite']);
    $adresse = mysqli_real_escape_string($conn,$_POST['adresse']);
    $ville = mysqli_real_escape_string($conn,$_POST['ville']);
    $numero = mysqli_real_escape_string($conn,$_POST['numero']);
    $code = mysqli_real_escape_string($conn,md5(rand()));
    $isMobile = preg_match('#^0[6-7]{1}\d{8}$#', $numero);
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM medecin WHERE gmail = '{$email}'"))>0){
        $msg ="<p class='alert'> {$email} -Cet email est déjà inscrit!</p> ";
        
    }
    elseif (!$isMobile){
      $msg ="<p class='alert'> le numero doit contenir 10 chiffres et commence par 07 ou 06! </p> ";
    }
    else{
    if($motdepasse == $motdepasse2 ){
      if (check_mdp_format("$motdepasse") != true)
      {
        $msg ="<p class='alert'> Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, et 8 caractères!</p> ";
      }
      else {
        $sql ="INSERT INTO medecin (nom,prenom ,cin,gmail,motdepasse,sexe,specialite,adresse, ville ,numero,code) VALUES ('{$firstname}' , '{$secondname}' , '{$cin}', '{$email}', '{$motdepasse}', '{$genre}', '{$specialite}', '{$adresse}', '{$ville}', '{$numero}','{$code}') ";
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
                        $mail->Username   = 'ghizlanekassimi8@gmail.com';                     //SMTP username
                        $mail->Password   = 'wvhynniwnjvqraee';           //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('ghizlanekassimi8@gmail.com');
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
                        $mail->Subject = 'Chifae';
                        $mail->Body    = 'Bonjour .. "bienvenue dans  l\'espace medecin de notre site Chifae voici le lien de validation d\'inscription  <b><a href="http://localhost/connexionDoc/?verification='.$code.'">http://localhost/connexionDoc/?verification='.$code.'</a></b>';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
        $msg ="<p class='alert-blue'> nous avons envoyer un email de vérification! </p> ";

        }
        else{
        $msg ="<p class='alert-green'> qlq chose ça marche pas! </p> ";

        }
    
    
}

    }
    else{
      $msg ="<p class='alert'>mot de passe ne correspond pas !</p> ";
  }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link rel="stylesheet" href="css/style.css" />
  <!-- cdn icons link  -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- Font Awesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css" />
  <link rel="icon" type="image/png" href="./assets/Layer1.png" />
  <title>Inscription Médecin | Chifae</title>
</head>

<body>
  <div class="content">
  <nav>
    <div class="container nav_container">
      <div class="logo_cont">
        <a href="index.html"><img src="assets/Layer1.png" alt="logo" class="logo" /></a>
        <h4>Chifae</h4>
      </div>
      <ul class="nav-menu">
        <li><a href="index.html">Acceuil</a></li>
        <li class="medecin"><a href="index.html">Medecin</a></li>
        <li class="patient"><a href="index.html">Patient</a></li>
        <li><a href="index.html">Contact</a></li>
      </ul>
      <!-- drop down medecin  -->
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"></button>
        <div id="myDropdown" class="dropdown-content">
          <hr class="solid" />
          <a href="#">Mon espace </a>
          <hr class="solid" />
          <a href="#">Mes blogs</a>
          <hr class="solid" />
          <a href="#">Se déconnecter</a>
          <hr class="solid" />
        </div>
      </div>
      <!-- end  drop down medecin  -->
      <!-- drop down patient -->
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"></button>
        <div id="myDropdown" class="dropdown-content">
          <hr class="solid" />
          <a href="#">Mon dossier medical</a>
          <hr class="solid" />
          <a href="#">Prendre un rendez-vous</a>
          <hr class="solid" />
          <a href="#">Se déconnecter</a>
          <hr class="solid" />
        </div>
      </div>
      <!-- end drop down patient -->
      <button class="open_menu_botton"><i class="uis uis-bars"></i></button>
      <button class="close_menu_botton">
        <i class="uis uis-multiply"></i>
      </button>
    </div>
  </nav>


  <!--=================MAIN SECTION======================-->
  <main>
    <div class="box">
        <p class="p1 p">Bienvenue sur Chifae</p>

        <p class="p2 p">Inscription</p>
        <img src="assets/f.png" alt="doctorAvatar" id="avatarDoc">
         <?php echo $msg; ?>
        <form action="" method="post">
        <div class="box-infos">
            <input type="text"  name="firstname" placeholder="Entrer votre nom" value ="<?php if(isset($_POST['submit'])){ echo $firstname ;} ?>" required class="input" >
            <input type="text" name = "secondname" placeholder="Entrer votre prenom" class="input" value ="<?php if(isset($_POST['submit'])){ echo $secondname ;} ?>" required >
            <input type="text" name= "cin" placeholder="Entrer votre CIN" class="input" value ="<?php if(isset($_POST['submit'])){ echo $cin ;} ?>" required >
            <input type="email" name="email" placeholder="Entrer votre email" class="input" value ="<?php if(isset($_POST['submit'])){ echo $email ;} ?>" required >
            <input type="password" name="motdepasse" placeholder="mot de passe" class="input" required>
            <input type="password" name="motdepasse2" placeholder="confirmation du mot de passe" class="confirmation input" required>
            <div class="genre">
                <select name=genre value ="<?php if(isset($_POST['submit'])){ echo $genre ;} ?>" required >
                    <option value="homme">homme</option>
                    <option value="femme">femme</option>
                </select>
            </div>
            <p class="infos-pro">Informations profesionnelles</p>
            <div class="infos">
                <div class="specialite"  >
                    <select name="specialite" id="" class="specialite"  required>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">gtedbjbdddddd</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">genkeraliste</option>
                        <option value="generaliste">generaliste</option>
                        <option value="generaliste">generaliste</option>
                    </select>
                </div>
                <input type="text" name="adresse" class="input adr-ville" id="adress" placeholder="adresse professionnelle" value ="<?php if(isset($_POST['submit'])){ echo $adresse ;} ?>" required>
                <input type="text" name="ville" class="input adr-ville" placeholder="ville" value ="<?php if(isset($_POST['submit'])){ echo $ville ;} ?>" required>
                <input type="tel" name="numero" class="input" placeholder="+212X XX-XX-XX-XX" value ="<?php if(isset($_POST['submit'])){ echo $numero ;} ?>" required>
                <div class="submit">
                    <input type="submit" value="Soumettre" name="submit" class="soumettre">
                    <p class="se-connecter">Avez-vous déjà un compte ?</p>
                    <input type="submit" value="connexion" class="soumettre connexion" onclick="location.href='../index.php'">
                </div>
            </div>

        </div>
</form>

    </div>

    <img src="assets/Doctors-pana.svg" alt="" id="doctor">
</main>

  <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="#">
            <div class="logo-footer">
              <img src="assets/Layer1.png" class="logo" />
              <p>Chifae</p>
            </div>
          </a>
          <p class="desc">
          </p>
          <ul class="socials">
            <li>
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>des liens rapides</h6>
          <ul class="links">
            <li><a href="#">Acceuil</a></li>
            <li><a href="#">Se connecter</a></li>
            <li><a href="#">services</a></li>
            <!-- <li><a href="#">testimonial</a></li> -->
            <li><a href="#">contact</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Services</h6>
          <ul class="links">
            <li><a href="#">SOS</a></li>
            <li><a href="#">livraison de médicaments</a></li>
            <li><a href="#">Pharmacies de garde</a></li>
            <li><a href="#">Contacts de Laboratoires</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Aide &amp; Support</h6>
          <ul class="links">
            <!-- <li><a href="#">support center</a></li> -->
            <!-- <li><a href="#">live chat</a></li> -->
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Conditions Générales d’Utilisation </a></li>
          </ul>
        </div>
      </div>
      <div class="copyright-wrapper">
        <p>
          © 2022 Chifae.com - Tous les droits sont réservés
          <a href="#" target="blank">Chifae</a>
        </p>
      </div>
    </div>
  </footer>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="main.js"></script>
</body>

</html>