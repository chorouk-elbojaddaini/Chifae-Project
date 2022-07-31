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
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
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


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
            <a href="index.html"
              ><img src="logo1.png" alt="logo" class="logo"
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
         <!-----------------PROFIL MODAL------------------>
         <div class="prof hide" >
       
       <div id="popup" class="popup">
        <div class="modal-btn"  >
          <button class="close_menu_botton2" type="button"> <i class="uis uis-multiply close2" ></i> </button> 
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
                 <a class="pop"href="profil.php" target="_blank" id="monProfil">Mes infos</a>
                 <a class="pop" href="../../connexionPat/logout.php"  id="deconnect">Se déconnecter</a>
      </div>
       </div>
      
     </div>
  <!-- ------------------------------------------ -->
       <!-- ---------------------------update form--------------- -->
       <div class="overlay profil hide over-prof" id="profil" >
                    <form action="" method="post" name="profil" class="form border update" id="profil-form-update">
                    <button class="close_form" onclick="hideForm()"id="profil-btn-close" name="close-update-profil"  > <i class="uis uis-multiply closeF"></i> </button> 
                                  <input type="hidden" name="idP" id="idP" >
                                
                            <div class="profil-inputs">
                            <label >
                                Nom  : 
                                <input type="text" minlength="3"id="nom"  name="nom"  />
                            </label>
                              <label >
                                   Prénom  :
                                  <input type="text"id="pre"name="pre" minlength="3" />
                              </label>
                              <label >
                              date de naissance : 
                              <input type="date"  id="nais" name="nais"   />
                          </label>
                          <!-- <label >
                            Email : 
                            <input type="email"  id="mail"name="mail"   />
                        </label> -->
                                <label >
                                    Tél :
                                    <input type ="text"name="tel"  id="tel"  pattern="(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}" placeholder="+212 / 0....">
                                </label>
                                <label >
                            Etat civil : 
                            <input type="text"  id="etat"name="etat"   />
                        </label>
                        <label >
                            Adresse : 
                            <input type="text"  id="adr"name="adr"   />
                        </label>
                                <label >
                                    Group Sanguin :
                                    <input type="text" name="grp"  id="grp" >
                                </label>
                                <label >
                                    Sexe :
                                    <input type="text" name="sexe"  id="sexe" >
                                </label>
                                <label >
                                    Mutuelle :
                                    <input name="mutuel"  id="mutuel"  type="text" placeholder="oui, (nom de mutuelle)"  >
                                </label>
                            </div>
                            <button type="submit" class="form-btn"  id="update-profil"name="update-profil" >Modifier</button>
                      </form>
                  </div>
      
       <div class="main-page">
         <!-- --------------------TABS------------------->
       <div class="tabs " id="divOfTabs">
            <ul id="tabs">
              <li class="tab is-active"><a  href="index.php" data-switcher data-tab="1">Maladies et sujets de santé</a></li>
              <li class="tab "><a  href="traite.php" data-switcher data-tab="2">Traitements</a></li>
              <li class="tab "><a  href="hospital.php" data-switcher data-tab="3">Hospitalisation et chirurgies</a></li>
              <li  class="tab "><a href="allergie.php" data-switcher data-tab="4">Allergies</a></li>
              <li class="tab "><a  href="vaccin.php" data-switcher data-tab="5">Vaccinations</a></li>
              <li class="tab " ><a href="mesure.php" data-switcher data-tab="6">Mesures</a></li>
              <li class="tab "><a  href="antecedent.php" data-switcher data-tab="7">Antécédents familiaux</a></li>
              <li class="tab"><a  href="historique.php" data-switcher data-tab="8">Historique des soins</a></li>
              
            </ul>
         </div>
    <div class="pageData">
      <div class="perso-data">
            <div class="header">
                <div class="photo">
                <span id="id"><i class="fa-solid fa-address-card" id="card-id"></i>Votre id :
                        
                           <span id="urId"><?php echo $row['code_patient'] ;?></span>
                         </span>
                        <!-- <img src="images/no.jpg" alt="profil" id="photo"> -->
                        <?php
               if(empty($row['photo'] )){
               ?>
              <img  src="images/noprofil.jpg" alt="profile" id="photo" class="photoProfil">
               <?php
               }
                else{
                  ?>
              <img id="photo" class="photoProfil" height="100" width="100" src="data:image;base64,<?php echo $row['photo'] ;?>">
              
              
              <?php
            }?>
                            <label for="add-photo">
                            <i class="fa-solid fa-camera" id="cam"></i>
                            </label>
                            <form  method="post" enctype="multipart/form-data" id="photo-upload" onsubmit="return false">
                                   <input type="hidden" name="idP" id="idP"  value='<?php echo $_SESSION['idPatient'] ;?>'>
                                  <input type="file" id="add-photo"name="photo" onchange="uploadImage()">
                           </form>
                        
                        
                           
                  </div>
               <div class="info-general">
                    <h1 class="data-text"><?php echo $row['nom']."  ".$row['prenom'];?></h1>
                    <p>Bienvenue dans votre espace de santé , veuillez remplir vos informations personnelles</p>
                <button  class="form-btn" id="profilBtn" name="update-profil" value='<?php echo $_SESSION['idPatient'] ;?>'>Modifier</button>
              </div>
          </div>
         <div class="details">
                <div class='informations'>
                        <p class="titre">Date de naissance :</p>
                        <p class="data-p"> <?php echo $row['dateNaissance'];?></p>

                        </div>
                        <div class='informations'>
                            
                            <p class="titre">Email :</p>
                            <p class="data-p"><?php echo $row['email'];?></p>
                        </div>
                        <div class='informations'>
                        <p class="titre">Sexe :</p>
                        <p class="data-p"> <?php echo $row['sexe'];?></p>

                        </div>
                        <div class='informations'>
                        <p class="titre">Tél :</p>
                        <p class="data-p"> <?php echo $row['tel'];?></p>

                        </div>
                        
                        <div class='informations'>
                        <p class="titre">Etat civil :</p>
                        <p class="data-p"> <?php echo $row['etatCivil'];?></p>

                        </div>
                        <div class='informations'>
                        <p class="titre">Adresse :</p>
                        <p class="data-p"> <?php echo $row['adresse'];?></p>

                        </div>
                        <div class='informations'>
                        <p class="titre">Groupe sanguin:</p>
                        <p class="data-p"> <?php echo $row['groupSanguin'];?></p>

                        </div>
                        <div class='informations'>
                        <p class="titre">Mutuelle :</p>
                        <p class="data-p"> <?php echo $row['mutuelle'];?></p>
                        </div>
         </div>
      </div>
      <?php 
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
   $msg = "";
   if (isset($_POST['changePassword'])) {
            $old_password = mysqli_real_escape_string($conn, $_POST['oldPwd']);
            $new_password = mysqli_real_escape_string($conn, $_POST['newPwd']);

            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmPwd']);
            if(empty($old_password) == true){
              $msg ="<p class='alert-red'> veuillez remplir l'ancien mot de passe</p> ";
            
            }
        
            elseif(empty($new_password) == true){
                $msg ="<p class='alert-red'> veuillez remplir le champ mot de passe</p> ";
              
              }
              elseif(empty($confirm_password) == true){
                $msg ="<p class='alert-red'> veuillez remplir le champ confirmation mot de passe </p> ";
             
              }

            elseif($new_password === $confirm_password ) {
                if (check_mdp_format("$new_password") != true)
                {
                $msg ="<p class='alert-red'> Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, et 8 caractères!</p> ";
                }
                else{
                
                $old =  mysqli_query($conn,"SELECT * FROM patient WHERE email='{$_SESSION['SESSION_EMAIL']}' ");
                if(mysqli_num_rows($old) > 0){
                  $resultat = mysqli_fetch_assoc($old);
                  $oldPwd = $resultat['motdepasse'];
                  if($oldPwd !=  $old_password)
                  {
                    $msg ="<p class='alert-red'>l'ancien mot de passe est erroné</p> ";
                  }
                  else{
                     $query = mysqli_query($conn, "UPDATE patient SET motdepasse='{$new_password}' WHERE email='{$_SESSION['SESSION_EMAIL']}' ");
                if ($query) {
                    echo"<script>
                    alertify.set('notifier','position', 'top-center');
                      alertify.success('Votre mot de passe a été modifié avec succès ✔');
                    </script>";
                }
                  }
                }
               
            }
            } else {
              
                $msg = "<div class='alert-red'>Assurez-vous que le mot de passe a été entré correctement.</div>";
            }
            
        }
        ?>
      <div class="password ">
        <h3 id="pwdH">Changer votre mot de passe :</h3>
        <?php echo $msg; ?>
            <form method="post" action="profil.php#pwdH" id="changePwd">
             <label for="oldPwd">Ancien mot de passe :</label>
             <input type="password" name="oldPwd" class="pwdinput" >
             <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
             <label for="newPwd">Nouveau mot de passe :</label>
             <input type="password" name="newPwd" class="pwdinput">
             <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
             <label for="confirmPwd">Confirme mot de passe :</label>
             <input type="password" name="confirmPwd" class="pwdinput">
             <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
             <button type="submit" class="form-btn" name="changePassword" id="changePassword">Changer</button>
            </form>
        </div>
    </div>
   </div>
   
   <?php include'footer.php';?>
   <script type="text/javascript">
    $(".toggle-password").click(function() {
$(this).toggleClass("fa-eye fa-eye-slash");
let pwd = this.previousElementSibling;

// 
if (pwd.getAttribute("type") == "password") {
  pwd.setAttribute("type", "text");
  console.log('hello')
} else {
  pwd.setAttribute("type", "password");
  console.log('hello2')

}
});
   </script>
   <!-- <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script> -->
   