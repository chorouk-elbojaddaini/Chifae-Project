<?php 
include '../../connexionDoc/cnx.php';



$display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE id=1 ");
if (mysqli_num_rows($display) > 0) 
 { 
   $row = mysqli_fetch_assoc($display);
 }
 include'displayFunctions.php';
 include'displayForms.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="icon" type="image/png" href="./images/logo.png" />
  
    <title>Profil Médical | Chifae</title>
      <!-- Font Awesome CDN Link -->
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
 <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    




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
         <img  id="user"  height="100" width="100" src="data:image;base64,<?php echo $row['photo'] ;?>">

          <button class="open_menu_botton"><i class="uis uis-bars"></i></button>
          <button class="close_menu_botton">
            <i class="uis uis-multiply"></i>
          </button> 
          
        
        </div>
</nav>
          <!-----------------PROFIL MODAL------------------>
          <div class="overlay hide" >
       
            <div id="popup" class="popup">
             <div class="modal-btn"  >
               <button class="close_menu_botton2"> <i class="uis uis-multiply close2" ></i> </button> 
                 <!-- <img type="image"  src="images/noprofil.jpg" alt="profile" id="account"> -->
                 <img  id="account"  height="100" width="100" src="data:image;base64,<?php echo $row['photo'] ;?>">
                   <h3 id="bienvenu">Bienvenue dans votre Espace de Santé</h3>
                      <a class="pop"href="profil.html" tarGET="_blank" id="monProfil">Mes infos</a>
                      <a class="pop" href="#" id="deconnect">Se déconnecter</a>
           </div>
            </div>
           
          </div>
       <!-- ---------------------------update form--------------- -->
       <div class="overlay profil hide over-prof" id="profil" >
                    <form action="#" method="GET" name="profil" class="form border update" id="profil-form-update">
                    <button class="close_form" id="profil-btn-close" name="close-update-profil" > <i class="uis uis-multiply closeF"></i> </button> 
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
                          <label >
                            Email : 
                            <input type="email"  id="mail"name="mail"   />
                        </label>
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
      
    <div class="main-doctor">
         <!-- --------------------TABS------------------->
       <div class="tabs " id="doctor-tabs">
            <ul id="tabs">
            <li class="tab "><a  href="#profilS" data-switcher data-tab="0">Données personnelles</a></li>
              <li class="tab "><a  href="#maladieS" data-switcher data-tab="1">Maladies et sujets de santé</a></li>
              <li class="tab "><a  href="#traiteS" data-switcher data-tab="2">Traitements</a></li>
              <li class="tab "><a  href="#hospitalS" data-switcher data-tab="3">Hospitalisation et chirurgies</a></li>
              <li  class="tab "><a href="#allergieS" data-switcher data-tab="4">Allergies</a></li>
              <li class="tab "><a  href="#vaccinS" data-switcher data-tab="5">Vaccinations</a></li>
              <li class="tab " ><a href="#mesureS" data-switcher data-tab="6">Mesures</a></li>
              <li class="tab "><a  href="#antecedentS" data-switcher data-tab="7">Antécédents familiaux</a></li>
              <li class="tab "><a  href="#documentS" data-switcher data-tab="8">Documents</a></li>
              <li class="tab "><a  href="#diagnosticS" data-switcher data-tab="9">Ajouter une diagnostique</a></li>


              <!-- <li class="tab"><a  href="historique.php" data-switcher data-tab="8">Historique des soins</a></li>
              <li  class="tab "><a href="info.php" data-switcher data-tab="9">Mon dossier global</a></li> -->
            </ul>
        </div>
         <div id="sections">
         <h2 class="titlesD" id="profilS">Données personnelles</h2>

           <div id="profilD"class="border section" >
                 <div id="photo_name" >
                   <img  id="photo"  height="100" width="100" border-radius="50%"src="data:image;base64,<?php echo $row['photo'] ;?>">
                   <h4 class="data-text"><?php echo $row['nom']."  ".$row['prenom'];?></h4>
                  </div>
                    <div id="info-profilP">
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
                       
                  <button  class="form-btn profilP_btn" id="profilBtn" name="update-profil" value='<?php echo $row['id'] ;?>'>Modifier</button>
                  <?php insert_maladie();?>
            </div>
           <hr class="hrD">
            
            <h2 class="titlesD" id="maladieS">Maladies et sujets de santé</h2>
           <div id="maladie">
          
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#maladie" method="GET"name="maladie">
                        <input type="hidden" name="maladie">
                        <select name="byDateM">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchM" id="search" placeholder='ordinaire ...'>
                          <button type="submit" name="maladie" class="searchBtn" >
                            <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                            </button>
                          
                      </form>
                </div>
                <button type="button" class="open-form" id="add-maladie" onclick="displayForm('maladie')">Ajouter </button>
                <?php 
                  

                    //================================display the fixed content=================================

                    $date = 'tous';
                    $search = "";
                    //--------maladies-------------
                    
                    if(isset($_GET['byDateM'])||isset($_GET['searchM']))
                    {
                     
                      $date = $_GET['byDateM'];
                       $search = $_GET['searchM'];
                            //=================afficher le tableau============================
                        $malad = filter_by_date("maladies",$date,$start_from,$num_per_page,"categorie",$search,$conn);

                            if (mysqli_num_rows($malad) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableMal'>";
                              table_maladie($malad);
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $malad = mysqli_query($conn,"SELECT * FROM maladies limit $start_from,$num_per_page");
                            if (mysqli_num_rows($malad) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableMal'>";

                              table_maladie($malad); 
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"maladies","doctor.php",3,$page,'#maladie');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
           <h2 class="titlesD " id="traiteS">Traitements</h2>

           <div id="traite" class="section">
                            <!-- -----------------filtring data--------------------------- -->
                            <div class="filters">
                      <form action="doctor.php#traite" method="GET" name="traite">
                        <input type="hidden" name="traite">
                        <select name="byDateT">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchT" id="search" placeholder='nom ...'>
                        
                        <button type="submit" name="submit-searchT" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-traitement" onclick="displayForm('traitement')">Ajouter </button>
                <?php 


                    //================================display the fixed content=================================

                    $date = 'tous';
                    $search = "";
                    
                    if(isset($_GET['byDateT'])||isset($_GET['searchT']))
                    {
                     
                      $date = $_GET['byDateT'];
                      $search = $_GET['searchT'];
                      //=================afficher le tableau============================
                            $traite = filter_by_date("traitements",$date,$start_from,$num_per_page,"nom",$search,$conn);


                            if (mysqli_num_rows($traite) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableT'>";
                              table_traite($traite); 
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $traite = filter_by_date("traitements",$date,$start_from,$num_per_page,"nom",$search,$conn);

                            if (mysqli_num_rows($traite) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableT'>";

                              table_traite($traite);  
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"traitements","doctor.php",3,$page,'#traite');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
           <h2 class="titlesD" id="hospitalS">Hospitalisation et chirurgies</h2>

           <div id="hospital" class="section">
                 <!-- -----------------filtring data--------------------------- -->
                 <div class="filters">
                      <form action="doctor.php#hospital" method="GET" name="hospital">
                      <input type="hidden" name="hospital">

                        <select name="byDateH">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchH" id="search" placeholder='cause ...'>
                        <button type="submit" name="submit-searchH" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-hospital" onclick="displayForm('hospital')">Ajouter</button>
                <?php 


                    //================================display the fixed content=================================

                    $date = 'tous';
                    $search = "";
                    
                    if(isset($_GET['byDateH'])||isset($_GET['searchH']))
                    {
                     
                      $date = $_GET['byDateH'];
                      $search = $_GET['searchH'];
                            //=================afficher le tableau============================
                            $hospital = filter_by_date("hospitalisation",$date,$start_from,$num_per_page,"cause",$search,$conn);
                           if (mysqli_num_rows($hospital) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableH'>";
                              table_hospital($hospital); 
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $hospital = filter_by_date("hospitalisation",$date,$start_from,$num_per_page,"cause",$search,$conn);
                            if (mysqli_num_rows($hospital) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableH'>";

                              table_hospital($hospital);   
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"hospitalisation","doctor.php",3,$page,'#hospital');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD" id="allergieS">Allergies</h2>
           <div id="allergie" class="section">
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#allergie" method="GET" id="filter"name="allergie">
                      <input type="hidden" name="allergie">
                       
                        <input type="text" name="searchA" id="search" placeholder='nom ...'>
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-allergy" onclick="displayForm('allergy')">Ajouter</button>
                
                <?php 


                    //================================display the fixed content=================================

                   
                    $search = "";
                   
                    
                    if(isset($_GET['searchA']))
                    {
                      $search = $_GET['searchA'];
                      //=================afficher le tableau============================
                            $allergie = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");
                            if (mysqli_num_rows($allergie) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableAlg'>";
                              table_allergie($allergie); 
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $allergie = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");
                            if (mysqli_num_rows($allergie) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableAlg'>";

                              table_allergie($allergie);   
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"allergies","doctor.php",3,$page,'#allergie');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD" id="vaccinS">Vaccinations</h2>
           <div id="vaccin" class="section">
                    <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="doctor.php#allergie" method="GET" name="vaccin">
                      <input type="hidden" name="vaccin">

                        <select name="byDateV">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchV" id="search" placeholder='nom de vaccin....'>
                        <button type="submit" name="submit-searchV" class="searchBtn" >
                           <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-vaccin" onclick="displayForm('vaccin')">Ajouter</button>
                <?php 


                    //================================display the fixed content=================================

                    $date = 'tous';
                    $search = "";
                    //--------maladies-------------
                    
                    if(isset($_GET['searchV'])||isset($_GET['searchV']))
                    {
                      $date = $_GET['byDateV'];
                      $search = $_GET['searchV'];
                            //=================afficher le tableau============================
                            $vaccin = filter_by_date("vaccins",$date,$start_from,$num_per_page,"nom",$search,$conn);
                            if (mysqli_num_rows($vaccin) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableV'>";
                              table_vaccin($vaccin); 
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $vaccin = mysqli_query($conn,"SELECT * FROM vaccins limit $start_from,$num_per_page");
                           if (mysqli_num_rows($vaccin) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableV'>";

                              table_vaccin($vaccin);   
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"vaccins","doctor.php",3,$page,'#vaccin');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
            <h2 class="titlesD" id="mesureS">Mesures</h2>
           <div id="mesure" class="section">
                                   <!-- -----------------filtring data--------------------------- -->
                                   <div class="filters">
                      <form action="doctor.php#mesure" method="GET" name="mesure">
                      <input type="hidden" name="mesure">

                        <select name="byDateMes">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <!-- <input type="text" name="search" id="search" placeholder='ordinaire ...'>--> 
                       
                        <button type="submit" name="submit-searchMes" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                          </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-mesure" onclick="displayForm('mesure')">Ajouter </button>
                <?php 


                    //================================display the fixed content=================================

                    $date = 'tous';
                    $num_per_page=01;
                    $start_from=($page-1)*$num_per_page;
                    
                    if(isset($_GET['byDateMes']))
                      {
                        $date = $_GET['byDateMes'];
                        $search = "";
                        $mesure = filter_by_date("mesures",$date,$start_from,1,"date",$search,$conn);
                        if (mysqli_num_rows($mesure) > 0) 
                            { 
                             echo'<div class="contenu mesure contenue-mes" data-page="6" id="mesure">
                             <div class="grid-mesure">';
                              affich_mesure($mesure); 
                              echo"</div>"; 
                               }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $mesure = mysqli_query($conn,"SELECT * FROM mesures limit $start_from,1");
                            if (mysqli_num_rows($mesure) > 0) 
                            { 
                              echo'<div class="contenu mesure contenue-mes" data-page="6" id="mesure">
                              <div class="grid-mesure">';
                              affich_mesure($mesure);
                              echo"</div>"; 

                              }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    
                    <?php 
                     $start_from=($page-1)*$num_per_page;
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"mesures","doctor.php",1,$page,'#mesure');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD" id="antecedentS">Antécédents familiaux</h2>
           <div id="antecedent" class="section">
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#antecedent" method="GET" id="filter"name="antecedent">
                      <input type="hidden" name="antecedent">
                       
                        <input type="text" name="searchAnt" id="search" placeholder='nom ...'>
                       
                        <button type="submit" name="submit-searhAnt" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-antecedent" onclick="displayForm('antecedent')">Ajouter</button>
                <?php 


                    //===============================t=================================

                    $date = 'tous';
                    $search = "";
                    $num_per_page=03;
                    $start_from=($page-1)*$num_per_page;
                   
                    
                    if(isset($_GET['searchAnt']))
                    {
                    
                      $search = $_GET['searchAnt'];
                      $antecedent = mysqli_query($conn , "SELECT * from antecedents  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");
                      if (mysqli_num_rows($antecedent) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableAnt'>";
                              table_antecedent($antecedent); 
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $antecedent = mysqli_query($conn,"SELECT * FROM antecedents limit $start_from,$num_per_page");
                           if (mysqli_num_rows($antecedent) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableAnt'>";

                              table_antecedent($antecedent); 
  
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"antecedents","doctor.php",3,$page,'#antecedent');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD" id="documentS">Documents</h2>
           <div id="document" class="section">
            <!-- -----------------filtring data--------------------------- -->
            <div class="filters">
                      <form action="doctor.php#document" method="GET" name="doc">
                      <input type="hidden" name="doc">

                        <select name="byDateD">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchD" id="search" placeholder='nom du doc....'>
                        <button type="submit" name="submit-searhD" class="searchBtn">
                           <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-doc" onclick="displayForm('doc');">Ajouter</button>
                <?php 


                    //===============================t=================================

                    $date = 'tous';
                    $search = "";
                      
                    $num_per_page=03;
                    $start_from=($page-1)*$num_per_page;
                    if(isset($_GET['byDateD'])||isset($_GET['searchD']))
                      {
                        $date = $_GET['byDateD'];
                        $search = $_GET['searchD'];
                       $doc = filter_by_date("documents",$date,$start_from,$num_per_page,"nomDoc",$search,$conn);
                        if (mysqli_num_rows($doc) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableAnt'>";
                              table_doc($doc);
                              echo"</div>"; }
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    }
                    else
                    {
                            //=================afficher le tableau============================
                            $doc = mysqli_query($conn,"SELECT * FROM documents limit $start_from,$num_per_page");
                            if (mysqli_num_rows($doc) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableAnt'>";

                              table_doc($doc);
 
  
                              echo"</div>";}
                            else
                            {
                            echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
                            } 
                    } 
                    ?>
                    <?php 
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"documents","doctor.php",3,$page,'#document');
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
            <h2 class="titlesD" id="diagnosticS">Ajouter une diagnostique</h2>
           <div id="diagnostic" class="section">
           <button type="button" class="open-form" id="add-diagno" onclick="displayForm('diagno');">Ajouter </button> 
           
            <?php
                //=================afficher le tableau============================
                $diag = mysqli_query($conn,"SELECT * FROM diagnostic limit $start_from,$num_per_page");
                if (mysqli_num_rows($diag) > 0) 
                { 
                  echo"<div class='doctor-tables' id='tableDiag'>";

                  table_diag($diag);


                  echo"</div>";}
                else
                {
                echo"<div class='affichage-item-msg border'>
                <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                </div>";
                } 
            ?>
            </div>
         </div>
       
    </div>
    
<?php 

include'footer.php';?>
<!-- ================sripts================================================= -->

