<?php
session_start();
include "cnx.php";
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
      href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css"
    />
    <link rel="icon" type="image/png" href="./logo.png" />
    <title>Shifae</title>
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <div class="logo_cont">
          <a href="index.php"
            ><img src="assets/logo.png" alt="logo" class="logo"
          /></a>
          <h4 class="shifae">Shifae</h4>
        </div>
        <ul class="nav-menu">
          <li><a href="index.php">Acceuil</a></li>

          <!-- ../connexionDoc/index.php -->
          <li class="medecin"><a href="<?php if(!empty($_SESSION['SESSION_EM'])){echo "../espace Medecin/page_profil_medecin/php/index.php ";} else{
            echo "../connexionDoc/index.php";
          } ?>">Medecin</a></li>
          <li class="patient"><a href="<?php if(!empty($_SESSION['SESSION_EMAIL'])){echo "../espace_patient/profilMedical/index.php ";} else{
          

       
          <li class="patient"><a href="<?php if(!empty($_SESSION['SESSION_EMAIL'])){echo "../espace_patient/accueil/index.php ";} else{
            echo "../connexionPat/index.php";
          } ?>">Patient</a></li>

          <li><a href="../ContactPage/contact.php">Contact</a></li>
          <li><a href="../aboutUs/about.php" class="iconnav" ><i class="uil uil-info-circle " ></i></a></li>
          <!-- <li >
            <div class="langWrap">
            <a href="#" language="arabe"><img src="assets/maroc.jpg" alt="maroc" class="arabe"> Ar</a>
            <a href="#" language="french"><img src="assets/french.jpg" alt="maroc" class="arabe">Fr</a>
          </div>
        </li> -->
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

    <header>
      <div class="container header_container">
        <div class="header-left">
          <div class="formwithh1">
            <h1 class="title">
              &nbsp; &nbsp; &nbsp;Je prends rendez-vous </br> avec un médecin à proximité
            </h1>
            <!-- start bare de recherche  -->
            <form
              action="../pageRecherche/recherche.php?var1=0&page=1"
              class="boxes"
              method="post"
              enctype="multipart/form-data"
            >
              <div class="box1">
                <label for="cars"></label>
                <select id="villes" name="ville"  value="<?echo $_POST["ville"];?>" >
                  <option value="(ville?)" class="ville">Ville</option>
                  <?php
                  $query = "SELECT DISTINCT ville FROM medecin " ;
                  $result = mysqli_query($conn , $query);
                 $total = mysqli_num_rows($result);
                 echo $total;
                 while($row=mysqli_fetch_array($result)){
                  echo '<option value="'."$row[ville]".'" ';?><?php if(isset($_POST['search'])){if($_POST["ville"] == "$row[ville]"){echo "selected";} } ?> <?php echo '>'."$row[ville]".'</option>'; 
                 }
                 ?>
                </select>
                <!--  start specialite -->
              </div>
              <div class="box2">
                <label for="cars"></label>
                <select id="specialites" name="specialite"  value="<?echo $_POST["specialite"];?>" >
                <?php
                  $query = "SELECT DISTINCT specialite FROM medecin " ;
                  $result = mysqli_query($conn , $query);
                 $total = mysqli_num_rows($result);
                 echo $total;
                 while($row=mysqli_fetch_array($result)){
                  echo '<option value="'."$row[specialite]".'" ';?><?php if(isset($_POST['search'])){if($_POST["specialite"] == "$row[specialite]"){echo "selected";} } ?> <?php echo '>'."$row[specialite]".'</option>'; 

                 }
                 ?>
                </select>
              </div>
              <!-- <div class="box2">
                <label for="typeprise"></label>
                <select id="type_prise" name="cars">
                  <option value="volvo ">Type de prise</option>
                  <option value="volvo">rendez-vous au cabinet</option>
                  <option value="saab">rendez-vous a domicile</option>
                  <option value="fiat">controle medical en ligne</option>
                </select>
              </div> -->
              <!-- <div class="date">
                <label for="birthday"></label>
                <input type="date" id="date" name="birthday" />
              </div> -->
              <!-- <div class="sub"><button name="search" style="margin-bottom : 1px"><i class=" search fa-solid fa-magnifying-glass" ></i></button></div> -->
              <div>
                <button type="submit" name="search" id="search">
                  <i class="uil uil-search"></i>
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- end barre de recherche  -->

        <div class="header-right">
          <div class="header-right-image">
            <img src="./assets/Doctors-pana.svg" />
          </div>
        </div>
      </div>
    </header>
    
   <section class="section1">
    <h2 class="ml12">
    Vous voulez planifier un rendez-vous!</h2>
     
    

       <div class="card-container">
	<div class="card">
		<img src="assets/Mobile inbox-rafiki.svg" alt="img">
		<!-- <img src="assets/line-arrow-png-favpng-2raiLVTxv52r9tBhw0FqS5Ets.jpg" alt="img"> -->
		<h3>1. chercher son rendez-vous</h3>
		<p>Vous pouvez filtrer les résultats pour affiner votre recherche et consulter les informations professionnels des médecins </p>
	</div>

	<div class="card card-two">
    <img src="assets/Timeline-bro.svg" alt="img">
		<!-- <img src="assets/line-arrow-png-favpng-2raiLVTxv52r9tBhw0FqS5Ets.jpg" alt="img"> -->
		<h3>2. Choisir son praticien  </h3>
		<p> choisissez  le médecin et planifier une date</p>
	</div>

	<div class="card card-three">
    <img src="assets/Confirmed-rafiki.svg" alt="img">
		<!-- <img src="assets/line-arrow-png-favpng-2raiLVTxv52r9tBhw0FqS5Ets.jpg" alt="img"> -->
		<h3>3.Valider son choix </h3>
		<p>Remplez vos informations et confirmez votre choix</p>
	</div>
    </div>
   </section>
   <div class="section2">
    <h2 class="ml1" >Vous êtes un praticien .. voici nos services pour vous !</h2>
        <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
          
              <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="assets/calend3.png" alt="">
                </div>
                <div class="blog-slider__content">
                  <span class="blog-slider__code"></span>
                  <div class="blog-slider__title">Son espace personnel </div>
                  <div class="blog-slider__text">accédez à votre espace ,consultez vos informations professionnels   </div>
                  <a href="#" class="blog-slider__button">Se connecter</a>
                </div>
              </div>
              
              <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="assets/calendrier.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <span class="blog-slider__code"></span>
                  <div class="blog-slider__title">Gérer Ses rendez-vous</div>
                  <div class="blog-slider__text"> Modifiez votre temps de disponibilité dans un calendrier, ainsi consultez tout les informations de vos  patients 
                  </div>
                  <a href="#" class="blog-slider__button">Se connecter </a>
                </div>
              </div>
              
              <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="assets/patient2.webp" alt="">
                </div>
                <div class="blog-slider__content">
                  <span class="blog-slider__code"></span>
                  <div class="blog-slider__title">Accéder à son dossier medical</div>
                  <div class="blog-slider__text">Consultez le dossier médical de votre patient , avec la possibilité de le modifier tout le temps.
                  </div>
                  <a href="#" class="blog-slider__button">Consulter </a>
                </div>
              </div>
              
            </div>
            <div class="blog-slider__pagination"></div>
          </div>
    
   </div>
   <div class="categories" >
       <div class="container categories_container">
           <div class="categories_left">
              
                 <h1>Nos services</h1>
                 <h1>Nos services</h1>
                 
               <!-- <h3>Bénificiez de nos services multiples sans vous connecter</h3> -->
           </div>
           <div class="categories_right">
               <article class="category">
                <span class="category_icon"><img src="assets/Fill out-bro.svg" alt="img"></span>
                  <a href="#"> <h5>Dossier médical</h5></a>
                   <a href="#"><p>Tous les historiques médicaux , les documents d'analyses </p></a>
               </article>
               <article class="category">
                <span class="category_icon"><img src="assets/Messaging-bro.svg" alt="img"></span>
                <a href="#"><h5>Espace de messagerie</h5></a>
                <a href="#"><p>Laissez un message pour votre médecin ou patient</p></a>
            </article>
            <article class="category">
                <span class="category_icon"><img src="assets/Doctors-bro.svg" alt="img"></span>
                <a href="#"><h5>Espace medecin </h5></a>
                <a href="#"><p>Espace qui offre au médecins la possibilté de gérer ses rendez-vous </p></a>
            </article>
            <article class="category">
                <span class="category_icon"><img src="assets/Ophthalmologist-rafiki.svg" alt="img"></span>
                <a href="#"><h5>Espace patient</h5></a>
                <a href="#"><p> contient tous les informations personnels et son dossier médical</p></a>
            </article>
           </div>
       </div>
   </div>
   <div class="vid-section">
       <h1> Découvrez notre site Shifae !</h1>
       <div class="vid-container">
    <video width="365px" height=" 500px" controls controls>
        <source src="assets/vid1.mp4" type="video/mp4">
        <source src="assets/vid1.webm" type="video/webm">
        <p>Votre navigateur ne prend pas en charge les vidéos HTML5.
           <!-- Voici <a href="myVideo.mp4">un lien pour télécharger la vidéo</a>.--></p> 
      </video>
      </div>
   </div>
   <div class="QA" id="qa">
       <h1>Les questions les plus fréquentes </h1>
    <div class="container faqs_container">
        <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article>
        <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article> <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article> <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article> <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article> <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article> <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article> <article class="faq">
            <div class="faq_icon"><i class="uil uil-plus"></i></div>
            <div class="question_answer">
                <h4>Comment Ajouter un document dans mon dossier médical</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates eaque voluptate placeat ad, unde, laborum cupiditate quasi inventore quidem nam tempore fugiat aliquam aliquid, quo earum possimus veritatis mollitia reiciendis?</p>
            </div>
        </article>
    </div>
   </div>
   <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="index.php">
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
