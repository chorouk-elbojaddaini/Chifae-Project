<?php 
include '../../connexionDoc/cnx.php';
$display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE id=1 ");
if (mysqli_num_rows($display) > 0) 
 { 
   $row = mysqli_fetch_assoc($display);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="icon" type="image/png" href="./images/logo.png" />
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
    <title>Profil Médical | Chifae</title>
      <!-- Font Awesome CDN Link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!---------------------------BOX ICONS ------------------------------>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <!-- ================sripts================================================= -->




</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
            <a href="index.html"
              ><img src="./assets/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Chifae</h4>
          </div>
          <ul class="nav-menu">
            <li><a href="../accueil/index.php">Acceuil</a></li>
            <li class="medecin"><a href="index.php">Mon profil médical</a></li>
            <li class="patient"><a href="document.php">Documents</a></li>
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
          <!-------------------------------------------------->
         <input type="image"  src="images/profile.jpg" alt="profile" id="user">
          <button class="open_menu_botton"><i class="uis uis-bars"></i></button>
          <button class="close_menu_botton">
            <i class="uis uis-multiply"></i>
          </button> 
          
        
        </div>
      </nav>
          <!-----------------PROFIL MODAL------------------>
          <div class="prof hide" >
       
            <div id="popup" class="popup">
             <div class="modal-btn"  >
               <button class="close_menu_botton2"> <i class="uis uis-multiply close2" ></i> </button> 
                 <img type="image"  src="images/profile.jpg" alt="profile" id="account">
                   <h3 id="bienvenu">Bienvenue dans votre Espace de Santé</h3>
                      <a class="pop"href="profil.php" target="_blank" id="monProfil">Mes infos</a>
                      <a class="pop" href="#" id="deconnect">Se déconnecter</a>
           </div>
            </div>
           
          </div>
       <!-- ------------------------------------------ -->
   <div class="wrapp">
 <!--=====================FIXED CONTENT======================-->
       <!-- --------------------PROFILE------------------->
        <div class="profil border">
           <img src="images/profi.png" id="profil" alt="profil">
          <div class="profil-text">
            <h1 id="profil-medical">Profil Médical</h1>
           <p>Je complète mon profil médical pour retrouver facilement toutes les informations importantes qui caractérisent ma santé</p>
           <a href="#" id="prendre-rdv">Prendre un Rendez-vous ></a>
          </div>
          
        </div>
       <!-- --------------------TABS------------------->
       <div class="tabs" >
            <ul id="tabs">
              <li class="tab is-active"><a  href="maladie.php" data-switcher data-tab="1">Maladies et sujets de santé</a></li>
              <li class="tab "><a  href="traite.php" data-switcher data-tab="2">Traitements</a></li>
              <li class="tab "><a  href="hospital.php" data-switcher data-tab="3">Hospitalisation et chirurgies</a></li>
              <li  class="tab "><a href="allergie.php" data-switcher data-tab="4">Allergies</a></li>
              <li class="tab "><a  href="vaccin.php" data-switcher data-tab="5">Vaccinations</a></li>
              <li class="tab " ><a href="mesure.php" data-switcher data-tab="6">Mesures</a></li>
              <li class="tab "><a  href="antecedent.php" data-switcher data-tab="7">Antécédents familiaux</a></li>
              <li class="tab"><a  href="historique.php" data-switcher data-tab="8">Historique des soins</a></li>
              
            </ul>
         </div>