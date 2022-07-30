<?php

include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cnx.css" />
    <link rel="icon" type="image/png" href="images/logo.png" />
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
    <title>Inscription|Shifae</title>
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
          <a href="../../pageAcceuil/index.php"
              ><img src="images/logo.png" alt="logo" class="logo"
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
      <!-- Contact section  -->
      
      <div class="container_contact">
            <!-- <span class="big-circle"></span> -->
            <img src="assets/image.png" class="square" alt="" />
            <div class="form">
              <div class="contact-info">
                <h3 class="title" style="color:#fe6686;">Espace patient</h3>
                <img src="images/Sign up-amico.svg"  alt="" />
                <h2 class="title" style=" padding-left:10%; padding-top:20%;">Bienvenue sur Shifae!</h2>

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
                <form action=""  method="POST" >
                  <h3 class="title">Rejoignez nous maintenant!</h3>
                    <?php echo $msg; ?>
                    <!-- nom -->
                  <div class="input-container">
                  <input type="text" class="input" name="firstname" value ="<?php if(isset($_POST['submit'])){ echo $firstname ;} ?>">
                    <label for="">Nom</label>
                    <span>Nom</span>
                  </div>
                  <!-- prénom -->
                  <div class="input-container">
                  <input type="text"  class="input"  name="secondname" value ="<?php if(isset($_POST['submit'])){ echo $secondname ;} ?>">
                    <label for="">prénom</label>
                    <span>prénom</span>
                  </div>
                  <!-- email -->
                  <div class="input-container">
                  <input type="email" class="input"  name="email" value ="<?php if(isset($_POST['submit'])){ echo $email ;} ?>">
                    <label for="">Email</label>
                    <span>Email</span>
                  </div>
                  <!-- mot de passe -->
                  <div class="input-container">
                  <input type="password" name="motdepasse" id="psw" class="input">
                    <label for="">mot de passe</label>
                    <span>mot de passe</span>
                  </div>
                  <!-- verif mot de passe -->
                  <div class="input-container">
                  <input type="password" name="motdepasse2" id="psw2" class="input">
                    <label for="">Confirmation  de  mot de passe</label>
                    <span>Confirmation de mot de passe</span>
                  </div>
                  <div class="input-container">
                  <input type="date" name="date"  class="input" value ="<?php if(isset($_POST['submit'])){ echo $date ;} ?>">
                    <!-- <label for="">Date de naissance</label> -->
                    <!-- <span>Date de naissanc</span> -->
                  </div>
                  <!-- numero -->
                  <div class="input-container">
                  <input type="tel" class="input" name="numero" value ="<?php if(isset($_POST['submit'])){ echo $numero ;} ?>">
                    <label for="">Numéro</label>
                    <span>Numéro</span>
                  </div>
                  <div class="input-container">
                  <select  class="input" id="genre" name="genre" >
                            <option value="homme"  <?php if(isset($_POST["genre"])){if($_POST["genre"]=="homme"){echo "selected";} }?>>homme</option>
                            <option value="femme" <?php if(isset($_POST["genre"])){if($_POST["genre"]=="femme"){echo "selected";}} ?>>femme</option>
                        </select>
                                            
                  </div>
                  <input type="submit" name="submit" value="Soumettre" class="btn" /></br>
                  
                    
                </form>

                <p >Avez-vous déjà un compte ?<a class=" btnSign" href="../index.php">connectez-vous</a> </p>
                

              </div>
            </div>
          </div>

          <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
        <a href="../../pageAcceuil/index.php">
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
   
    <script src="cnx.js"></script>
</body>
</html>