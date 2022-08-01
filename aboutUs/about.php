<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="./assets/logo.png" />
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
    <title>ABOUTUS|Shifae</title>
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
  <link rel="icon" type="image/png" href="./logo.png" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
          <a href="../pageAcceuil/index.php">
              <img src="./assets/logo.png" alt="logo" class="logo"
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
      <!-- end nav  -->
      <div class="container-up">
        <h4>ABOUT US </h4>
        <p>Bienvenue sur notre site Shifae ! </p>
        <p>Le projet Shifae représente une plateforme de gestion des rendez-vous en ligne entre les médecins et les patients  </p>
      
      <div class="container-about">
        <div class="img-about">
            <img src="assets/Consulting-rafiki.svg" alt="img ">
        </div>
        <div class="text-about">
            <p>
            elle comporte un espace patient qui permet à ce dernier d’avoir son dossier médical accessible par ses médecins
            </p>
              <p>  ajouter ses informations personnelles ainsi que son historique de soin , ses traitements, ses maladies, ses mesures , ses antécédents familiaux de plus ses vaccinations et allergies, comme il a la possibilité d’importer ses documents médicaux à titre d’exemple résultats de biologies, comptes rendus, imageries médicales...
Comme elle comporte un espace médecin contenant les fonctionnalités nécessaires aux médecins pour une efficiente gestion de leurs rendez-vous en utilisant un calendrier qui leurs permet de visualiser leurs rendez-vous .
</p>          
               <div class="icon-with">
                <img src="assets/check.png" alt="imgee" class="icons">
                <p class="white">Prise de RDV</p>
            </div>
            <div class="icon-with">
                <img src="assets/check.png" alt="imgee" class="icons">
                <p class="white">Espace Patient</p>
            </div>
            <div class="icon-with">
                <img src="assets/check.png" alt="imgee" class="icons">
                <p class="white">Dossier Médical</p>
            </div>
          
            <!-- <p class="class">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p> -->
            <p class="class">les visiteurs du site cherchant de prendre un rendez-vous.</p>
            
        </div>
      </div>
      </div>
      <!-- start footer  -->
      <footer>
        <div class="container">
          <div class="wrapper">
            <div class="footer-widget">
            <a href="../pageAcceuil/index.php">
                  <div class="logo-footer">
                <img src="assets/logo.png" class="logo" />
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
    <script src="main.js"></script> 
</body>
</html>