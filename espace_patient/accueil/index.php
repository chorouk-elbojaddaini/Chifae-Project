<?php 
session_start();

include '../../connexionDoc/cnx.php';

$display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE email='{$_SESSION['SESSION_EMAIL']}' ");
if (mysqli_num_rows($display) > 0) 
 { 
   $row = mysqli_fetch_assoc($display);
   $_SESSION['idPatient'] =$row['id'];

 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="icon" type="image/png" href="logo1.png" />
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
    <title>Accueil | Chifae</title>
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
      <!-- Font Awesome CDN Link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Bienvenu</title>
</head>
<body>
   <div class="wrapp">
    <!-- <div class="nav"> -->
        <nav>
            <div class="container nav_container">
              <div class="logo_cont">
                <a href="index.html"
                  ><img src="logo1.png" alt="logo" class="logo"
                /></a>
                <h4>Chifae</h4>
              </div>
              <ul class="nav-menu">
                <li><a href="index.php">Acceuil</a></li>
                <li class="medecin"><a href="../profilMedical/index.php">Mon profil médical</a></li>
                <li class="patient"><a href="../profilMedical/document.php">Documents</a></li>
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
              <?php
               if(empty($row['photo'] )){
               ?>
              <img  src="images/noprofil.jpg" alt="profile" id="user">
               <?php
               }
                else{
                  ?>
              <input type="image" id="user" height="100" width="100" src="data:image;base64,<?php echo $row['photo'] ;?>">
              
              
              <?php
            }?>
              <button class="open_menu_botton"><i class="uis uis-bars"></i></button>
              <button class="close_menu_botton">
                <i class="uis uis-multiply"></i>
              </button> 
              
            
            </div>
          </nav>
    <!-- </div> -->
    <!-----------------PROFIL MODAL------------------>
       <div class="overlay " >
       
         <div id="popup" class="popup">
          <div class="modal-btn"  >
            <button class="close_menu_botton2"> <i class="uis uis-multiply close2" ></i> </button> 
            <?php
               if(empty($row['photo'] )){
               ?>
              <img  src="images/noprofil.jpg" alt="profile" id="account">
               <?php
               }
                else{
                  ?>
              <img id="account" height="100" width="100" src="data:image;base64,<?php echo $row['photo'] ;?>">
              
              
              <?php
            }?>
            
                <h3 id="bienvenu">Bienvenue dans votre Espace de Santé</h3>
               

                   <a class="pop"href="../profilMedical/profil.php" target="_blank" id="monProfil">Mes infos</a>

                   <a class="pop" href="#" id="deconnect">Se déconnecter</a>

                   <a class="pop"href="../profilMedical/index.php" target="_blank" id="monProfil">Mes infos</a>

                   <a class="pop" href="../../connexionPat/logout.php" id="deconnect">Se déconnecter</a>



                   <a class="pop"href="../profilMedical/index.php" target="_blank" id="monProfil">Mes infos</a>
                   <a class="pop" href="../../connexionPat/logout.php" id="deconnect">Se déconnecter</a>

        </div>
         </div>
        
       </div>
    <!-- ------------------------------------------ -->
       <div class="main">
           <!-- ====================WELCOME========================= -->

           <div class="welcome border">
            <div class="hello">
                <p id="salut" class="texte ">Salut,<span id="fullName">&nbsp;<?php echo $row['nom']."  ".$row['prenom'];?></span></p>
                <p class="texte hidden visibility1">Avez une bonne journée et n'oubliez pas de prendre soin de votre santé</p>
                <p class="texte"><a href="../../pageAcceuil/index.php"id="prendre-rdv">Prendre un RDV ></a></p>
              </div>
              
              <img class="" id="hello"src="images/doctor.png" alt="doctor">
              
           </div>
             <!-------------------Schedule2 for Mobile----------------------------->
           <div class="schedule visibility">
                    <h2 class="titre-rdv ">Vos Rendez-vous:</h2>
                    <hr>
           <?php
            $num_per_page=02;
            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
            $start_from =   ($page-1)*$num_per_page;
            $sql = mysqli_query($conn,"SELECT * FROM schedule_list WHERE email='{$_SESSION['SESSION_EMAIL']}' AND DATE_ADD(CURDATE(),INTERVAL -7 DAY) ORDER BY start_datetime DESC limit  $start_from,$num_per_page;");
            $nbRows = mysqli_query($conn,"SELECT * FROM schedule_list WHERE email='{$_SESSION['SESSION_EMAIL']}' AND DATE_ADD(CURDATE(),INTERVAL -7 DAY) ORDER BY start_datetime DESC ;");

            $total_records=mysqli_num_rows($nbRows);
            $total_pages=ceil($total_records/$num_per_page);
               
              
              if ($total_records > 0) 
             { 
              echo "<p class='urRDV'>Vous avez ".$total_records." rendez-vous</p>";

               while($row = mysqli_fetch_assoc($sql))
               {
                
                 $medecin = mysqli_query($conn,"SELECT nom,prenom,specialite FROM medecin WHERE id ='{$row['idMedecin']}';");
                 if((mysqli_num_rows($medecin) > 0))
                 {
                   $result = mysqli_fetch_assoc($medecin);
                    
                    echo ' <div class="rdv border">
                    <img src="images/generaliste.PNG" alt="specialite">
                    <div id="doctor">
                        <p id="specialite">'.$result['specialite'].'</p>
                        <p id="specialiste">Dr.&nbsp;'.$result['nom'].'  '.$result['prenom'].'</p>
                </div>
                    <p id="time">'.$row['start_datetime'].'</p>
                </div>';}
                // else
                // {
                //   echo"<div class='affichage-item-msg-pro border'>
                //     <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun rendez-vous n'est trouvé</p>
                //     </div>";
                // }
                  }
                }
                else
                {
                  echo"<div class='affichage-item-msg-pro border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun rendez-vous n'est trouvé</p>
                    </div>";
                }
                //=======pagination
                echo'<div class="pages-btn">';

                for ($i=1; $i <= $total_pages ; $i++){  
                    echo "<a class='pagination'href='?page=".$i."'>".$i."</a>" ;
                  } 
                  echo'</div>'
           ?>
              </div> 
    
           <!--------------------------------H2----------------------------->
             <h2 class="">Votre Espace de Santé<hr class="hideMe"></h2>
             
           <!--===================FONCTIONNALITES========================-->
           <div class="profil fct">
            <img src="images/profi.png" alt="profil-image" class="imgs">
            <h3 class="hover-underline-animation">Profil Médical</h3>
            <p>Renseignez votre profil médical et le partagez avec ceux qui vous soingnent</p>
           </div>
           <div class="doc fct">
            <img src="images/docy.png" alt="docs-image" class="imgs">
            <h3 class="hover-underline-animation">Documents</h3>
            <p>Stockez ,classez et partagez votre documents de santé </p>
           </div>
          
       </div>
               <!-- ====================Aside========================= -->

       <div class="aside hidden border">
        <img src="images/c10.png" alt="bg" id="bg">
      
        <?php
        $display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE email='{$_SESSION['SESSION_EMAIL']}' ");
        if (mysqli_num_rows($display) > 0) 
         { 
           $row = mysqli_fetch_assoc($display);
         }
               if(empty($row['photo'] )){
               ?>
              <img  src="images/noprofil.jpg" alt="profile" id="profile">
            
               <?php
               }
                else{
                  ?>
                   
               <img id="profile"  src="data:image;base64,<?php echo $row['photo'] ;?>">
              
              <?php
            }?>
        
          <!-------------------Schedule----------------------------->
        <div class="schedule ">
            <p class="titre-rdv hover-underline-animation">Vos Rendez-vous:</p>

            <?php
               $num_per_page=02;
               $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
               $start_from =   ($page-1)*$num_per_page;
               $sql = mysqli_query($conn,"SELECT * FROM schedule_list WHERE email='{$_SESSION['SESSION_EMAIL']}' AND DATE_ADD(CURDATE(),INTERVAL -7 DAY) ORDER BY start_datetime DESC limit  $start_from,$num_per_page;");
               $nbRows = mysqli_query($conn,"SELECT * FROM schedule_list WHERE email='{$_SESSION['SESSION_EMAIL']}' AND DATE_ADD(CURDATE(),INTERVAL -7 DAY) ORDER BY start_datetime DESC ;");
              //  echo  $total_records;
               $total_records=mysqli_num_rows($nbRows);
               $total_pages=ceil($total_records/$num_per_page);
         
                 
                 if ($total_records > 0) 
                { 
                  echo "<p class='urRDV'>Vous avez ".$total_records." rendez-vous";

                  while($row = mysqli_fetch_assoc($sql))
                  {
                    // echo'id'.$row['idMedecin'];
                    $medecin = mysqli_query($conn,"SELECT nom,prenom,specialite FROM medecin WHERE id ='{$row['idMedecin']}';");
                    if((mysqli_num_rows($medecin) > 0))
                    {
                      $result = mysqli_fetch_assoc($medecin);
                    echo ' <div class="rdv border">
                    <img src="images/generaliste.PNG" alt="specialite">
                    <div id="doctor">
                        <p id="specialite">'.$result['specialite'].'</p>
                        <p id="specialiste">Dr'.$result['nom'].'  '.$result['prenom'].'</p>
                </div>
                    <p id="time">'.$row['start_datetime'].'</p>
                </div>';}
                // else
                // {
                //   echo"<div class='affichage-item-msg border'>
                //     <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun rendez-vous n'est trouvé</p>
                //     </div>";
                // }
                  }
                }
                else
                {
                  echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun rendez-vous n'est trouvé</p>
                    </div>";
                }
                //=======pagination
                echo'<div class="pages-btn">';

                for ($i=1; $i <= $total_pages ; $i++){  
                    echo "<a class='pagination'href='?page=".$i."'>".$i."</a>" ;
                  } 
                  echo'</div>'
           ?>
      </div>

       </div>
       <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="../../pageAcceuil/index.php">
              <div class="logo-footer">
            <img src="logo1.png" class="logo" />
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
            <li><a href="../../espace_patient/index.php">Dossier médical</a></li>
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
   </div>


<script src="js/script1.js"></script>
<script src="js/script.js">

</script>
</body>
</html>