<?php


include '../cnx.php';
$msg ="";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForgotPassword-Shifae</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="../images/logo.png" />
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
      <!-- Font Awesome CDN Link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
  />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
          <a href="../../pageAcceuil/index.php"
              ><img src="../images/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Shifae</h4>
          </div>
          <ul class="nav-menu">
            <li><a href="../../pageAcceuil/index.php">Acceuil</a></li>
            <li class="medecin"><a href="../../connexionDoc/index.php">Medecin</a></li>
            <li class="patient"><a href="../../connexionPat/index.php">Patient</a></li>
            <li><a href="../../ContactPage/contact.php">Contact</a></li>
          <li><a href="../../aboutUs/about.php" class="iconnav" ><i class="uil uil-info-circle " ></i></a></li>

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
      <!-- end nav  -->




 <!--The container section-->
    
 <div class="login-container">
       <div class="contenu ">
        <h4 style="color:var(--color-pink);" > Votre nouveau mot de passe a bien été enregistré ! </h4>
<p> vous pouvez maintenant vous connecter à votre<a href="../index.php" style="color:blue;">&nbsp; espace medecin.</a></p>
       </div>

   </div>


   <!-- start footer  -->
   <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="../../pageAcceuil/index.php">
              <div class="logo-footer">
            <img src="logo.png" class="logo" />
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
            <li><a href="../../pageAcceuil/index.php">Acceuil</a></li>
            <li><a href="../../connexionDoc/index.php">Medecin</a></li>
            <li><a href="../../connexionPat/index.php">Patient</a></li>
            <!-- <li><a href="#">testimonial</a></li> -->
            <li><a href="../../ContactPage/contact.php">contact</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Services</h6>
          <ul class="links">
            <li><a href="../../pageAcceuil/index.php">prise de RDV</a></li>
            <li><a href="../../connexionPat/index.php">Dossier médical</a></li>
            <li><a href="../../connexionDoc/index.php">calendrier pour medecin</a></li>
            <!-- <li><a href="#">Contacts de Laboratoires</a></li> -->
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Aide &amp; Support</h6>
          <ul class="links">
            <!-- <li><a href="#">support center</a></li> -->
            <!-- <li><a href="#">live chat</a></li> -->
            <li><a href="../../pageAcceuil/index.php#qa">FAQ</a></li>
            <li><a href="../../condition/condition.php">Conditions Générales d’Utilisation </a></li>
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
    <script src="main.js"></script> 
</body>
</html>