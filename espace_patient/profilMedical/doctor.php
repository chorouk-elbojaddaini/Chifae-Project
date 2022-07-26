<?php 
session_start();
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
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="./images/logo.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/print.css" />
    <link rel="stylesheet" href="css/modal.css">


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
    <title>Dossier Médical | Chifae</title>
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
    <!-- ================sripts================================================= -->


</head>
<body>
<div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <script>
  var loader = document.querySelector(".loader");

window.addEventListener("load", vanish);

function vanish() {
  loader.classList.add("disppear");
}
</script>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
            <a href="index.php"
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
                      <a class="pop"href="profil.php" tarPOST="_blank" id="monProfil">Mes infos</a>
                      <a class="pop" href="#" id="deconnect">Se déconnecter</a>
           </div>
            </div>
           
          </div>
      
    <div class="main-doctor">
         <!-- --------------------TABS------------------->
       <div class="tabs " id="doctor-tabs">
            <ul id="tabsD">
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
            </ul>
        </div>
        <div id="heading" class="hid">
        <img src="./images/logo1.png" alt="logo" class="logo" width="100px" height="100px"/>
          <p>Dossier Médical :</p>
          <p><?php echo $row['nom']."  ".$row['prenom'];?></p>
          <hr>
        </div>
        
       <h1 hidden id="DM">Dossier Médical</h1>
         <div id="sections">
         
        <div id="downloadDiv" class="border">
          <p>Télécharger le dossier médical</p>
          <button type="button" class="open-form" name="download" id="download" onclick="print()">Télécharger</button>

        </div>
         <h2 class="titlesD t1 pdf" id="profilS">Données personnelles</h2>
         
           <div id="profilD"class="border section" >
                 <div id="photo_name" >
                 <?php
               if(empty($row['photo'] )){
               ?>
              <img  src="images/noprofil.jpg" alt="profile" id="photo">
               <?php
               }
                else{
                  ?>
              <img id="photo" height="100" width="100" border-radius="50%"src="data:image;base64,<?php echo $row['photo'] ;?>">
              
              
              <?php
            }?>
                   
                   <h4 class="data-text pdf" id="nomComplet"><?php echo $row['nom']."  ".$row['prenom'];?></h4>
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
                       
                  <button  class="open-form" id="profilBtn" name="update-profil" value='<?php echo $row['id'] ;?>'>Modifier</button>
                   <!-- ---------------------------update form--------------- -->
       <div class="overlay profil hide over-prof" id="profil" >
                    <form action="" method="POST" name="profil" class="form border update" id="profil-form-update">
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
      
            </div>
            <!-- ========================include tables================================== -->
            <?php
                  include'displayFunctions.php';
                  ?>
           <hr class="hrD">
            
            <h2 class="titlesD t2" id="maladieS">Maladies et sujets de santé</h2>
           <div >
          
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="" method="POST"name="maladie" id="maladF">
                        <input type="hidden" name="maladie">
                        <select name="byDateM" >
                        <option name="tous" value="tous" >Tous</option>
                            <option name="cemois" value="cemois" >ce mois</option>
                            <option name="moisprec" value="moisprec" >mois précédent</option>
                            <option name="6mois" value="6mois" > 6 mois</option>
                            <option name="ans" value="ans" >ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchM" id="search" placeholder='categorie ...' >
                          <button type="submit" name="searchMal" class="searchBtn" >
                            <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                            </button>
                          
                      </form>
                </div>
                
                <button type="button" class="open-form" id="add-maladie" onclick="displayForm('maladie')">Ajouter </button>
                <?php 
                // echo  $_SESSION['date'] ;
                  
                    $num_per_page=03;
                  
                   if(empty( $_SESSION['date']) && empty( $_SESSION['search']))
                   {
                    $_SESSION['date']='tous';
                    $_SESSION['search']='';
                   }
                   if(isset($_POST['searchMal']))
                    {
                     
                      $_SESSION['date'] = $_POST['byDateM'];
                      $_SESSION['search'] = $_POST['searchM'];
                    }
                    // echo "ana session". $_SESSION['date']."<br>";

                    $pageM = isset($_GET["pageM"]) ? (int)$_GET["pageM"] : 1;
                    // echo "ana page".$pageM."<br>";
                    $start_from =   ($pageM-1)*$num_per_page;
                    // echo "ana lbdya".$start_from;
                    $malad_array = filter_by_date("maladies",$_SESSION['date'],$start_from,$num_per_page,"categorie", $_SESSION['search'],$conn);
                    $malad = $malad_array['query'];
                    $total_records=$malad_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_records/$num_per_page);
                    if($total_records>0)
                    {
                      echo"<p class='response'>Il existe ". $total_records." enregistrement</p>";
                     
                      echo"<div class='doctor-tables' id='tableMal'>";
                      table_maladie($malad);
                      echo"</div>"; 
                           
                   
                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 
                 
                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageM=".$i."#maladieS'>".$i."</a>" ;
                              } 
                              echo'</div>';
                   
                    ?>
           </div>
           <hr class="hrD">
           <h2 class="titlesD t3" id="traiteS">Traitements</h2>

           <div  class="section">
                            <!-- -----------------filtring data--------------------------- -->
                            <div class="filters">
                      <form action="doctor.php#traiteS" method="POST" name="traite">
                        <input type="hidden" name="traite">
                        <select name="byDateT">
                        <option name="tous" value="tous">Tous</option>
                        <option name="cemois" value="cemois" >ce mois</option>
                        <option name="moisprec" value="moisprec" >mois précédent</option>
                        <option name="6mois" value="6mois" > 6 mois</option>
                        <option name="ans" value="ans" >ans</option>
                        <option name="plsans" value="plusieursAns" >plus d'un an</option>
                        </select>
                        <input type="text" name="searchT" id="search" placeholder='nom ...'>
                        
                        <button type="submit" name="searchTraite" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-traitement" onclick="displayForm('traitement')">Ajouter </button>
                <?php 

                   
                    $num_per_page=03;

                    if(empty( $_SESSION['dateT']) && empty( $_SESSION['searchT']))
                    {
                    $_SESSION['dateT']='tous';
                    $_SESSION['searchT']='';
                    }
                    if(isset($_POST['searchTraite']))
                    {
                    
                      $_SESSION['dateT'] = $_POST['byDateT'];
                      $_SESSION['searchT'] = $_POST['searchT'];
                    }
                    // echo "ana session". $_SESSION['dateT']."<br>";
                    // echo "ana search". $_SESSION['searchT']."<br>";
                    
                    $pageT = isset($_GET["pageT"]) ? (int)$_GET["pageT"] : 1;
                    // echo "ana page".$pageT."<br>";
                    
                    $start_fromT =   ($pageT-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromT;
                    $traite_array = filter_by_date("traitements",$_SESSION['dateT'],$start_fromT,$num_per_page,"nom", $_SESSION['searchT'],$conn);
                    $traite = $traite_array['query'];
                    $total_recordsT=$traite_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_recordsT/$num_per_page);
                    if($total_recordsT>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsT." enregistrement</p>";
                      echo"<div class='doctor-tables' id='tableT'>";
                      table_traite($traite);
                      echo"</div>"; 
                          

                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 

                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageT=".$i."#traiteS'>".$i."</a>" ;
                              } 
                              echo'</div>';

                    ?>
           </div>
           <hr class="hrD">
           <h2 class="titlesD t4" id="hospitalS">Hospitalisation et chirurgies</h2>

           <div  class="section">
                 <!-- -----------------filtring data--------------------------- -->
                 <div class="filters">
                      <form action="doctor.php#hospitalS" method="POST" name="hospital">
                      <input type="hidden" name="hospital">

                        <select name="byDateH">
                        <option name="tous" value="tous">Tous</option>
                        <option name="cemois" value="cemois" >ce mois</option>
                        <option name="moisprec" value="moisprec">mois précédent</option>
                        <option name="6mois" value="6mois" > 6 mois</option>
                        <option name="ans" value="ans" >ans</option>
                        <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchH" id="search" placeholder='cause...'>
                        <button type="submit" name="searchHospi" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-hospital" onclick="displayForm('hospital')">Ajouter</button>
                <?php 

                      
                    // $total_pages = 0;
                    $num_per_page=03;

                    if(empty( $_SESSION['dateH']) && empty( $_SESSION['searchH']))
                    {
                    $_SESSION['dateH']='tous';
                    $_SESSION['searchH']='';
                    }
                    if(isset($_POST['searchHospi']))
                    {
                    
                      $_SESSION['dateH'] = $_POST['byDateH'];
                      $_SESSION['searchH'] = $_POST['searchH'];
                    }
                    // echo "ana session". $_SESSION['dateH']."<br>";
                    // echo "ana search". $_SESSION['searchH']."<br>";
                    
                    $pageH = isset($_GET["pageH"]) ? (int)$_GET["pageH"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromH =   ($pageH-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromH;
                    $hospi_array = filter_by_date("hospitalisation",$_SESSION['dateH'],$start_fromH,$num_per_page,"cause", $_SESSION['searchH'],$conn);
                    $hospi = $hospi_array['query'];
                    $total_recordsH=$hospi_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_recordsH/$num_per_page);
                    if($total_recordsH>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsH." enregistrement</p>";
                      echo"<div class='doctor-tables' id='tableH'>";
                      table_hospital($hospi);
                      echo"</div>"; 
                          

                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 

                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageH=".$i."#hospitalS'>".$i."</a>" ;
                              } 
                              echo'</div>';

                    ?>
                    
           </div>
           <hr class="hrD">

            <h2 class="titlesD t5" id="allergieS">Allergies</h2>
           <div  class="section">
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#allergieS" method="POST" id="filter"name="allergie">
                      <input type="hidden" name="allergie">
                       
                        <input type="text" name="searchA" id="search" placeholder='nom ...' >
                        <button type="submit" name="searchAlg" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-allergy" onclick="displayForm('allergy')">Ajouter</button>
                                        
                      <?php 

                        $num_per_page=03;

                        if( empty( $_SESSION['searchAl']))
                        {
                        $_SESSION['searchAl']='';
                        }
                        if(isset($_POST['searchAlg']))
                        {

                          $_SESSION['searchAl'] = $_POST['searchA'];
                        }
                        // echo "ana session". $_SESSION['dateH']."<br>";
                        // echo "ana search". $_SESSION['searchAl']."<br>";

                        $pageAl = isset($_GET["pageAl"]) ? (int)$_GET["pageAl"] : 1;
                        // echo "ana page".$pageH."<br>";

                        $start_fromAl =   ($pageAl-1)*$num_per_page;
                        // echo "ana lbdya".$start_fromAl;
                        $allergie = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE '%{$_SESSION['searchAl']}%' limit $start_fromAl,$num_per_page;");

                          $query= mysqli_query($conn,"SELECT * from allergies  where  nom  LIKE '%{$_SESSION['searchAl']}%' ;");
                          $total_recordsAl =mysqli_num_rows($query);
                          // echo 'ana total'.$total_recordsAl;
                        $total_pages=ceil($total_recordsAl/$num_per_page);
                        if($total_recordsAl>0)
                        {
                          echo"<p class='response'>Il existe ". $total_recordsAl." enregistrement</p>";
                          echo"<div class='doctor-tables' id='tableA'>";
                          table_allergie($allergie); 
                          echo"</div>"; 
                              

                        }
                        else
                        {
                        echo"<div class='affichage-item-msg border'>
                        <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                        </div>";
                        } 

                                echo'<div class="pages-btn">';

                                for ($i=1; $i <= $total_pages ; $i++){  
                                    echo "<a class='pagination'href='?pageAl=".$i."#allergieS'>".$i."</a>" ;
                                  } 
                                  echo'</div>';

                        ?>
                   
           </div>
           <hr class="hrD">

            <h2 class="titlesD t6" id="vaccinS">Vaccinations</h2>
           <div class="section">
                    <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="doctor.php#vaccinS" method="POST" name="vaccin">
                      <input type="hidden" name="vaccin">

                        <select name="byDateV">
                        <option name="tous" value="tous" >Tous</option>
                        <option name="cemois" value="cemois" >ce mois</option>
                        <option name="moisprec" value="moisprec" >mois précédent</option>
                        <option name="6mois" value="6mois" > 6 mois</option>
                        <option name="ans" value="ans" >ans</option>
                        <option name="plsans" value="plusieursAns" >plus d'un an</option>
                        </select>
                        <input type="text" name="searchV" id="search" placeholder='cause...'>
                        <button type="submit" name="searchVac" class="searchBtn" >
                           <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-vaccin" onclick="displayForm('vaccin')">Ajouter</button>
                <?php 
                    // $total_pages = 0;
                    $num_per_page=03;
                    if(empty( $_SESSION['dateV']) && empty( $_SESSION['searchV']))
                    {
                    $_SESSION['dateV']='tous';
                    $_SESSION['searchV']='';
                    }
                    if(isset($_POST['searchVac']))
                    {
                    
                      $_SESSION['dateV'] = $_POST['byDateV'];
                      $_SESSION['searchV'] = $_POST['searchV'];
                    }
                    // echo "ana session". $_SESSION['dateV']."<br>";
                    // echo "ana search". $_SESSION['searchV']."<br>";
                    
                    $pageV = isset($_GET["pageV"]) ? (int)$_GET["pageV"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromV =   ($pageV-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromH;
                    $vaccin_array = filter_by_date("vaccins",$_SESSION['dateV'],$start_fromV,$num_per_page,"nom", $_SESSION['searchV'],$conn);
                    $vaccin = $vaccin_array['query'];
                    $total_recordsV=$vaccin_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_recordsV/$num_per_page);
                    if($total_recordsV>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsV." enregistrement</p>";
                      echo"<div class='doctor-tables' id='tableV'>";
                      table_vaccin($vaccin);
                      echo"</div>"; 
                          

                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 

                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageV=".$i."#vaccinS'>".$i."</a>" ;
                              } 
                              echo'</div>';

                    ?>
                    
           </div>
           <hr class="hrD">
            <h2 class="titlesD t7" id="mesureS">Mesures</h2>
           <div  class="section">
                                   <!-- -----------------filtring data--------------------------- -->
                                   <div class="filters">
                      <form action="doctor.php#mesureS" method="POST" name="mesure">
                      <input type="hidden" name="mesure">

                        <select name="byDateMes">
                        <option name="tous" value="tous" >Tous</option>
                        <option name="cemois" value="cemois" >ce mois</option>
                        <option name="moisprec" value="moisprec">mois précédent</option>
                        <option name="6mois" value="6mois" > 6 mois</option>
                        <option name="ans" value="ans">ans</option>
                        <option name="plsans" value="plusieursAns" >plus d'un an</option>
                        </select>
                        <!-- <input type="text" name="search" id="search" placeholder='ordinaire ...'>--> 
                       
                        <button type="submit" name="searchMesure" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                          </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-mesure" onclick="displayForm('mesure')">Ajouter </button>
                    <?php 
                    // $total_pages = 0;
                    $num_per_page=01;
                    if(empty( $_SESSION['dateMes']) )
                    {
                    $_SESSION['dateMes']='tous';
                    }
                    if(isset($_POST['searchMesure']))
                    {
                    
                      $_SESSION['dateMes'] = $_POST['byDateMes'];
                    }
                    $_SESSION['searchMes'] = "";
                    // echo "ana session". $_SESSION['dateM']."<br>";
                    
                    $pageM = isset($_GET["pageMes"]) ? (int)$_GET["pageMes"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromM =   ($pageM-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromM;
                    $mesure_array = filter_by_date("mesures",$_SESSION['dateMes'],$start_fromM,$num_per_page,"poids", $_SESSION['searchMes'],$conn);
                    $mesure = $mesure_array['query'];
                    $total_recordsM=$mesure_array['nb_rows'];
                    // echo $total_recordsM;
                    $total_pages=ceil($total_recordsM/$num_per_page);
                    if($total_recordsM>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsM." enregistrement</p>";
                      echo'<div class="contenu mesure contenue-mes" data-page="6" id="Mesure">
                      <div class="grid-mesure">';
                       affich_mesure($mesure); 
                       echo"</div>"; 

                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 

                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageMes=".$i."#mesureS'>".$i."</a>" ;
                              } 
                              echo'</div>';

                    ?>
                    
                
           </div>
           <hr class="hrD">

            <h2 class="titlesD t8" id="antecedentS">Antécédents familiaux</h2>
           <div  class="section">
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#antecedentS" method="POST" id="filter"name="antecedent">
                      <input type="hidden" name="antecedent">
                       
                      <input type="text" name="searchAn" id="search" placeholder='cause...'>
                       
                        <button type="submit" name="searchAnt" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-antecedent" onclick="displayForm('antecedent')">Ajouter</button>
                <?php 


                    //===============================t=================================

                    // $total_pages = 0;
                    $num_per_page=03;
                    

                    if(empty( $_SESSION['searchAn']))
                    {
                    $_SESSION['searchAn']='';
                    }
                    if(isset($_POST['searchAnt']))
                    {
                    
                      $_SESSION['searchAn'] = $_POST['searchAn'];
                    }
                    // echo "ana session". $_SESSION['dateV']."<br>";
                    // echo "ana search". $_SESSION['searchAn']."<br>";
                    
                    $pageAn = isset($_GET["pageAn"]) ? (int)$_GET["pageAn"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromAn =   ($pageAn-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromH;
                    $antece= mysqli_query($conn , "SELECT * from antecedents  where  nom  LIKE '%{$_SESSION['searchAn']}%' limit $start_fromAn,$num_per_page;");
                    $antece_rows = mysqli_query($conn , "SELECT * from antecedents  where  nom  LIKE '%{$_SESSION['searchAn']}%' ;");

                    $total_recordsAn=mysqli_num_rows($antece_rows);
                    // echo $total_records;
                    $total_pages=ceil($total_recordsAn/$num_per_page);
                    if($total_recordsAn>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsAn." enregistrement</p>";
                      echo"<div class='doctor-tables' id='tableAn'>";
                      table_antecedent($antece);
                      echo"</div>"; 
                          

                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 

                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageAn=".$i."#antecedentS'>".$i."</a>" ;
                              } 
                              echo'</div>';
                    ?>
                   
           </div>
           <hr class="hrD">

            <h2 class="titlesD t9" id="documentS">Documents</h2>
           <div  class="section">
            <!-- -----------------filtring data--------------------------- -->
            <div class="filters">
                      <form action="doctor.php#documentS" method="POST" name="doc">
                      <input type="hidden" name="doc">

                        <select name="byDateD">
                        <option name="tous" value="tous" >Tous</option>
                        <option name="cemois" value="cemois">ce mois</option>
                        <option name="moisprec" value="moisprec" >mois précédent</option>
                        <option name="6mois" value="6mois" > 6 mois</option>
                        <option name="ans" value="ans" >ans</option>
                        <option name="plsans" value="plusieursAns" >plus d'un an</option>
                        </select>
                        <input type="text" name="searchD" id="search" placeholder='nom...'>
                        <button type="submit" name="searchDoc" class="searchBtn">
                           <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-doc" onclick="displayForm('doc');">Ajouter</button>
                    <?php 

                  
                    $num_per_page=03;
                  
                   if(empty( $_SESSION['dateD']) && empty( $_SESSION['searchD']))
                   {
                    $_SESSION['dateD']='tous';
                    $_SESSION['searchD']='';
                   }
                   if(isset($_POST['searchDoc']))
                    {
                     
                      $_SESSION['dateD'] = $_POST['byDateD'];
                      $_SESSION['searchD'] = $_POST['searchD'];
                    }
                    // echo "ana session". $_SESSION['date']."<br>";

                    $pageD = isset($_GET["pageD"]) ? (int)$_GET["pageD"] : 1;
                    // echo "ana page".$pageM."<br>";
                    $start_fromD =   ($pageD-1)*$num_per_page;
                    // echo "ana lbdya".$start_from;
                    $doc_array = filter_by_date("documents",$_SESSION['dateD'],$start_fromD,$num_per_page,"nomDoc", $_SESSION['searchD'],$conn);
                    $doc = $doc_array['query'];
                    $total_recordsD=$doc_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_recordsD/$num_per_page);
                    if($total_recordsD>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsD." enregistrement</p>";
                      echo"<div class='doctor-tables' id='tableDoc'>";
                      table_doc($doc);
                      echo"</div>"; 
                           
                   
                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 
                 
                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?pageD=".$i."#documentS'>".$i."</a>" ;
                              } 
                              echo'</div>';
                   
                    ?>

           </div>
           <hr class="hrD">
            <h2 class="titlesD"  id="diagnosticS">Diagnostique</h2>
           <div  class="section">
             <!-- -----------------filtring data--------------------------- -->
             <div class="filters">
                      <form action="doctor.php#diagnosticS" method="POST" id="filter"name="diagnostic">
                      <input type="hidden" name="diagnostic">
                      <select name="byDateDg">
                      <option name="tous" value="tous" >Tous</option>
                        <option name="cemois" value="cemois" >ce mois</option>
                        <option name="moisprec" value="moisprec" >mois précédent</option>
                        <option name="6mois" value="6mois"> 6 mois</option>
                        <option name="ans" value="ans" >ans</option>
                        <option name="plsans" value="plusieursAns" >plus d'un an</option>
                        </select>
                        <input type="text" name="searchDg" id="search" placeholder='nom du médecin...'>
                        <button type="submit" name="searchDia" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
           <button type="button" class="open-form" id="add-diagno" onclick="displayForm('diagno');">Ajouter </button> 
                            <?php 
               
                  $num_per_page=03;

                  if(empty( $_SESSION['DateDg']) && empty( $_SESSION['searchDg']))
                  {
                  $_SESSION['DateDg']='tous';
                  $_SESSION['searchDg']='';
                  }
                  if(isset($_POST['searchDia']))
                  {
                    $_SESSION['DateDg'] = $_POST['byDateDg'];
                    $_SESSION['searchDg'] = $_POST['searchDg'];
                  }
                  // echo "ana session". $_SESSION['searchDg']."<br>";

                  $pageDg = isset($_GET["pageDg"]) ? (int)$_GET["pageDg"] : 1;
                  // echo "ana page".$pageM."<br>";
                  $start_fromDg =   ($pageDg-1)*$num_per_page;
                  // echo "ana lbdya".$start_from;
                  $diag_array = filter_by_date("diagnostic",$_SESSION['DateDg'],$start_fromDg,$num_per_page,"nomComplet", $_SESSION['searchDg'],$conn);
                  $diag = $diag_array['query'];
                  $total_recordsDg=$diag_array['nb_rows'];
                  // echo $total_records;
                  $total_pages=ceil($total_recordsDg/$num_per_page);
                  if($total_recordsDg>0)
                  {
                    echo"<p class='response'>Il existe ". $total_recordsDg." enregistrement</p>";
                    echo"<div class='doctor-tables' id='tableDiag'>";
                    table_diag($diag);
                    echo"</div>"; 
                  }
                  else
                  {
                  echo"<div class='affichage-item-msg border'>
                  <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                  </div>";
                  } 

                          echo'<div class="pages-btn">';

                          for ($i=1; $i <= $total_pages ; $i++){  
                              echo "<a class='pagination'href='?pageDg=".$i."#diagnosticS'>".$i."</a>" ;
                            } 
                            echo'</div>';

                  ?>
           
            </div>
         </div>
       
    </div>
    <script type="text/javascript">

window.onload = function(){
 $('#download').on('click',function(){
  window.print();
 })
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</script>
<?php 


  include'displayForms.php';
  include'footer.php';
  // destroy the session
// session_destroy();

?>
<script src="js/filter.js"></script>
<script type="text/javascript">
  //=====================toogle to show the options div=============
let options = document.querySelectorAll('.options-btn');
// console.log(options)
for (let i = 0; i < options.length; i++) {
  options[i].addEventListener('click',()=>{
    let div=options[i].nextElementSibling
    // div.style.display="block"
    $(div).toggle()
//     $(div).slideToggle('medium', function() {
//     if ($(this).is(':visible'))
//         $(this).css('display','inline-block');
// });
    // console.log( )
   
  })
}
</script>


<!-- ================sripts================================================= -->
