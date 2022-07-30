<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cnx.css" />
    <link rel="icon" type="image/png" href="./logo.png" />
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link
  rel="stylesheet"
  href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css"
/>
    <!-- cdn icons link  -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <title>connexion|Shifae</title>
      <!-- Font Awesome CDN Link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
          <a href="../pageAcceuil/index.php">
              <img src="images/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Shifae</h4>
          </div>
          <ul class="nav-menu">
            <li><a href="../pageAcceuil/index.php">Acceuil</a></li>
            <li class="medecin"><a href="<?php if(!empty($_SESSION['SESSION_EM'])){echo "../espace Medecin/page_profil_medecin/php/index.php ";} else{
            echo "../connexionDoc/index.php";
          } ?>">Medecin</a></li>
            <li class="patient"><a href="../connexionPat/index.php">Patient</a></li>
            <li><a href="../ContactPage/contact.php">Contact</a></li>
          <li><a href="../aboutUs/about.php" class="iconnav" ><i class="uil uil-info-circle " ></i></a></li>

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
      <!-- Contact section  -->
      
      <div class="container_contact">
            <!-- <span class="big-circle"></span> -->
            <img src="assets/image.png" class="square" alt="" />
            <div class="form">
              <div class="contact-info">
                <h3 class="title">Espace patient</h3>
                <img src="images/Login-pana.svg"  alt="" />
      
                <div class="info">
                  
                </div>
      
                <div class="social-media">
                  <div class="social-icons">
                    
                  </div>
                </div>
              </div>
      
              <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                </br>
                </br>
               
                <form action=""  method="POST" >
                  <h3 class="title">Se connecter</h3>
                    <?php echo $msg; ?>
                  <div class="input-container">
                  <input class="input" type="email"  name="email" >
                    <label for="">Email</label>
                    <span>Email</span>
                  </div>
                  <div class="input-container">
                  <input class="input" type="password" name="motdepasse" >
                    <label for="">Mot de passe</label>
                    <span>Mot de passe</span>
                  </div>
                  
                  <input type="submit" name="submit" value="se connecter" class="btn" /></br>
                  <p style=" color:white;"><a href="Forgot/forgot.php">mot de passe oublié?</a></p>
                    
                </form>
              
                <p >Vous n'avez pas encore inscrit ? <a class=" btnSign" href="inscriptionPatient/inscription.php">créer mon compte</a> </p>
                

              </div>
            </div>
          </div>

          <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
        <a href="../pageAcceuil/index.php">
              <div class="logo-footer">
            <img src="images/logo.png" class="logo" />
            <p>Shifae</p></div>
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
            <li><a href="../pageAcceuil/index.php">Acceuil</a></li>
            <li><a href="../connexionDoc/index.php">Medecin</a></li>
            <li><a href="../connexionPat/index.php">Patient</a></li>
            <!-- <li><a href="#">testimonial</a></li> -->
            <li><a href="../ContactPage/contact.php">contact</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Services</h6>
          <ul class="links">
            <li><a href="../pageAcceuil/index.php">prise de RDV</a></li>
            <li><a href="../connexionPat/index.php">Dossier médical</a></li>
            <li><a href="../connexionDoc/index.php">calendrier pour medecin</a></li>
            <!-- <li><a href="#">Contacts de Laboratoires</a></li> -->
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Aide &amp; Support</h6>
          <ul class="links">
            <!-- <li><a href="#">support center</a></li> -->
            <!-- <li><a href="#">live chat</a></li> -->
            <li><a href="../pageAcceuil/index.php#qa">FAQ</a></li>
            <li><a href="../condition/condition.php">Conditions Générales d’Utilisation </a></li>
          </ul>
        </div>
      </div>
      <div class="copyright-wrapper">
        <p>
            © 2022 Shifae.com - Tous les droits sont réservés
          <a href="#" target="blank">Shifae</a>
        </p>
      </div>
    </div>
  </footer>
    <script src="cnx.js"></script>
</body>
</html>