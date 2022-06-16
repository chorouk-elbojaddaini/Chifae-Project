<?php
  // $file_new_name = $_POST["nom-docs"];
  if (isset($_POST['upload']))
  {
    // $file = $_FILES["file"];
    $file_size = $_FILES["file"]["size"];
    $file_name = $_FILES["file"]["name"];
    $file_temp = $_FILES["file"]["tmp_name"];

    $location = "telecharge/";
    //condition sur la taille de fichier :10 MB max
    if($file_size>10485760)
    { 
           echo "<script>alert('Tres grande taille: taille maximale 10MB')</script>";

    }
    else
    {
      move_uploaded_file( $file_temp ,$location. $file_name);
      // move_uploaded_file( $file_temp ,$location. $file_new_name);

    }
     
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
    <title>Mes Documents| Chifae</title>
</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
            <a href="index.html"
              ><img src="./assets/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Shifae</h4>
          </div>
          <ul class="nav-menu">
            <li><a href="../accueil/index.html">Acceuil</a></li>
            <li class="medecin"><a href="index.html">Mon profil médical</a></li>
            <li class="patient"><a href="document.html">Documents</a></li>

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
       <div class="overlay " >
       
        <div id="popup" class="popup">
         <div class="modal-btn"  >
           <button class="close_menu_botton2"> <i class="uis uis-multiply close2" ></i> </button> 
             <img type="image"  src="images/profile.jpg" alt="profile" id="account">
               <h3 id="bienvenu">Bienvenue dans votre Espace de Santé</h3>
                  <a class="pop"href="profil.html" target="_blank" id="monProfil">Mon Profil</a>
                  <a class="pop" href="#" id="deconnect">Se déconnecter</a>
       </div>
        </div>
       
      </div>
   <!-- ------------------------------------------ -->
   <div class="contenaire">
     <!--=====================FIXED CONTENT======================-->
       <!-- --------------------PROFILE------------------->
       <div class="profil border">
        <img src="images/docs.png" id="docs" alt="documents">
       <div class="profil-text">
         <h1 id="profil-medical">Mes documents de Santé</h1>
        <p>J'ajoute mes documents de sante Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia nam ad repellat, fugit magni dicta labore velit inventore commodi</p>
        <button type="button" class="open-form" id="add-doc" onclick="displayForm('doc');">Ajouter un document</button>
       </div>
       
     </div>
      <!-- -----------------------REMPLISSAGE DES docsS------------------------ -->
               
      <div class="overlay-form docs" id="doc">
        <form action="#" method="post" name="docs" class="form border" id="docs-form">
        
                  <label >
                    Nom du document : 
                    <input type="text" minlength="3" name="nom-docs"  placeholder="Entrez le nom du document"/>
                </label>
                  <label >
                      Date :
                      <input type="date"id="date-docs"name="docs-date" required/>
                  </label>
                  <label >
                    Ajouté par :
                    <input type="text"id="added-by-docs"name="added-by" required/>
                </label>
                <label >
                    Catégorie :
                    <select id="category">
                        <option value="resultats">Résultats de biologie</option>
                        <option value="compte-rendu">Comptes rendu</option>
                        <option value="imagerie">Imageries médicales</option>
                        <option value="certifs">Certificats</option>
                        <option value="piece">Pièces administratives</option>
                        <option value="autres">autres documents</option>
                    </select>
                </label>
                <button type="button" class="form-btn" id="doc-btn">choisir un document</button>
       </form>
      </div>
      <!-- =================================FILE UPLOAD==================================== -->
      <div class="overlay-file " >
      <div class="file__upload">
        <div class="header">
          <p><i class="fa fa-cloud-upload fa-2x"></i><span id="telecharge">Télecharger</span></p>			
        </div>
        <form class="body" action=""  method="post"  enctype="multipart/form-data">
          <input type="file" id="upload" name="file" required>
          <label for="upload">
            <i class="fa fa-file-text-o fa-3x"></i>
            <p>
              <strong>Glisser et Déposer</strong> Fichier ici<br>
              ou <span>parcourir </span><br> pour commencer le téléchargement
            </p>
          </label>
          <button class="ajout-fichier" name="upload">Ajouter </button> 

          <!-- <button class="fermer">Fermer </button>  -->
        </form>
      </div>
    </div>
       <!-- =================================FIN -FILE UPLOAD==================================== -->
     <div class="docs">
        <h2 id="docs-title">Mes derniers documents</h2>
        <div class="affich-docs">
          <!-- =======================samll devices============================== -->
          <div class="affichage">
                 
            <div class="affichage-item border">
                <h4>Nom du document</h4>
                <p>Date :<span>Date de la maladie</span></p>
                <p>Ajouté par :<span>Dr.Benrhou jalil</span></p>
                <p>Catégorie : scanner - radio ............</p>
                <div class="modif-suprim">
                 <img src="images/update.PNG" alt="modifier-icon">
                 <img src="images/delete.PNG" alt="supprimer-icon">
                </div>
            </div>
        </div>
        <!-- ===================================big devices=============================== -->
          <table id="docs-table">
            <thead>
              <tr>
                <th>Nom du document</th>
                <th>Date</th>
                <th>Ajouté par</th>
                <th>Catégorie</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ordonnence pour la maladie X</td>
                <td>12 juillet 2020</td>
                <td>Dr.Benrhou jalil</td>
                <td>Certificats</td>
              </tr>
              <tr>
                <td>Ordonnence pour la maladie X</td>
                <td>12 juillet 2020</td>
                <td>Dr.Benrhou jalil</td>
                <td>Certificats</td>
              </tr>
              <tr>
                <td>Ordonnence pour la maladie X</td>
                <td>12 juillet 2020</td>
                <td>Dr.Benrhou jalil</td>
                <td>Certificats</td>
              </tr>
              <tr>
                <td>Ordonnence pour la maladie X</td>
                <td>12 juillet 2020</td>
                <td>Dr.Benrhou jalil</td>
                <td>Certificats</td>
              </tr>
            </tbody>
          </table>
          <button type="button" class="modif-table" id="modif-docs">Modifier</button>
        </div>
     </div>
   </div>
   <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="#">
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
            <li><a href="#">Acceuil</a></li>
            <li><a href="#"></a>Se connecter</li>
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
            © 2022 Shifae.com - Tous les droits sont réservés
          <a href="#" target="blank">Shifae</a>
        </p>
      </div>
    </div>
  </footer>    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
   <script src="js/script.js" defer></script>
   <script src="js/main.js" defer></script>
   <script src="js/modal.js" defer></script>
   <script>
    const affichage =document.querySelector('.affichage');
const modif_table =document.querySelector('.modif-table');
const table =document.querySelector('table');
let query2 = window.matchMedia("(max-width:767px)");


    if (query2.matches) {
    
        table.style.display = 'none';
        modif_table.style.display = 'none';
        document.querySelector('.affich-docs').style.background = 'transparent';
        document.querySelector('.affich-docs').style.padding = 0;
        // document.querySelector('.affich-docs').style.boxshadow = 'none';


      }
      else{
          affichage.style.display = 'none';
      }
        
   </script>
</body>
</html>