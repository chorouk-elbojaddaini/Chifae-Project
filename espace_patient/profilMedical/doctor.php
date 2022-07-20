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
                   <img  id="photo"  height="100" width="100" border-radius="50%"src="data:image;base64,<?php echo $row['photo'] ;?>">
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
                    <form action="" method="GET" name="profil" class="form border update" id="profil-form-update">
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
                      <form action="" method="POST"name="maladie">
                        <input type="hidden" name="maladie">
                        <select name="byDateM">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchM" id="search" placeholder='categorie ...'>
                          <button type="submit" name="searchMal" class="searchBtn" >
                            <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                            </button>
                          
                      </form>
                </div>
                <button type="button" class="open-form" id="add-maladie" onclick="displayForm('maladie')">Ajouter </button>
                <?php 
                 
                    // $date = 'tous';
                    // $search = "";
                    //--------maladies-------------
                  
                    
                    // if(isset($_POST['searchMal'])==false)
                    // {
                    //   $date =  'tous';
                    //   $search =  '';
                    //   $dfcha = 'dfcha1';
                    //   }
                  


                   if(isset($_POST['searchMal']))
                    {
                     
                      $_SESSION['date'] = $_POST['byDateM'];
                       $_SESSION['search'] = $_POST['searchM'];
                       $date =  $_SESSION['date'];
                       $search =  $_SESSION['search'];
                      $dfcha = 'dfcha li bghit';
                      
                    }
                    elseif(!isset($_POST['searchMal']))
                    {
                      $date =  'tous';
                      $search =  '';
                     $dfcha = 'dfcha li mabghitch';
                    }
                    $num_per_page=03;
                    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    $start_from = ($page-1)*$num_per_page ;
                            //=================afficher le tableau============================
                            
                        $malad_array = filter_by_date("maladies",$date,$start_from,$num_per_page,"categorie",$search,$conn);
                         $malad = $malad_array['query'];
                         $_SESSION['total_records']=$malad_array['nb_rows'];
                         $total_pages=ceil($_SESSION['total_records']/$num_per_page);
                         
                            if($_SESSION['total_records']>0)
                            {
                              echo $dfcha;
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
                            // echo'<div class="pages-btn">';
                        
                      

                 
                   
                
                   
                        //     if($page>1)
                        //     {
                        //         echo "<a class='pagination'href='doctor.php?pageM=".($page-1)."#maladieS'>Précédent</a>" ;
    
                        //     }
                        //     for($i=1;$i<=$total_pages;$i++)
                        //     {
                        //         echo "<a class='pagination'href='doctor.php?pageM=".$i."#maladieS'>".$i."</a>" ;
                        //     }
                        //     if($page<$i)
                        //     {
                        //         echo "<a class='pagination'href='doctor.php?pageM=".($page+1)."#maladieS'>Suivant</a>" ;
    
                        //     }
                        // echo'</div>';
                   
                    // elseif(!isset($_GET['byDateM'])&& !isset($_GET['searchM']))
                    // {
                    //         //=================afficher le tableau============================
                    //         $malad = mysqli_query($conn,"SELECT * FROM maladies limit $start_from,$num_per_page");
                    //         $_SESSION['total_records']=mysqli_num_rows($malad);

                         
                    //           echo"<div class='doctor-tables' id='tableMal'>";

                    //           table_maladie($malad); 
                    //           echo"</div>";
                          
                           
                    // } 
                   
                   
                    ?>
           </div>
           <hr class="hrD">
           <h2 class="titlesD t3" id="traiteS">Traitements</h2>

           <div  class="section">
                            <!-- -----------------filtring data--------------------------- -->
                            <div class="filters">
                      <form action="doctor.php#traiteS" method="GET" name="traite">
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
                    if(isset($_GET["pageT"]))
                        {
                            $page=$_GET["pageT"];
                        }
                        else
                        {
                            $page=1;
                        }
                        $num_per_pageT=03;

                        $start_fromT=($page-1)*$num_per_pageT;
                    $date = 'tous';
                    $search = "";
                    
                    if(isset($_GET['byDateT'])||isset($_GET['searchT']))
                    {
                     
                      $date = $_GET['byDateT'];
                      $search = $_GET['searchT'];
                      //=================afficher le tableau============================
                            $traite_array = filter_by_date("traitements",$date,$start_fromT,$num_per_pageT,"nom",$search,$conn);
                            $traite =  $traite_array['query'];

                            if ($traite_array['nb_rows'] > 0) 
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
                            $traite = mysqli_query($conn , "SELECT * from traitements  where nom  LIKE'%$search%' limit $start_fromT,$num_per_pageT;");

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
                   

                        $sql="SELECT * FROM traitements";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageT=".($page-1)."#traiteS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageT=".$i."#traiteS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageT=".($page+1)."#traiteS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
           <h2 class="titlesD t4" id="hospitalS">Hospitalisation et chirurgies</h2>

           <div  class="section">
                 <!-- -----------------filtring data--------------------------- -->
                 <div class="filters">
                      <form action="doctor.php#hospitalS" method="GET" name="hospital">
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
                    if(isset($_GET["pageH"]))
                        {
                            $page=$_GET["pageH"];
                        }
                        else
                        {
                            $page=1;
                        }
                        $num_per_pageH=03;

                        $start_fromH=($page-1)*$num_per_pageH;
                    $date = 'tous';
                    $search = "";
                    
                    if(isset($_GET['byDateH'])||isset($_GET['searchH']))
                    {
                     
                      $date = $_GET['byDateH'];
                      $search = $_GET['searchH'];
                            //=================afficher le tableau============================
                            $hospital_array = filter_by_date("hospitalisation",$date,$start_fromH,$num_per_pageH,"cause",$search,$conn);
                            $hospital =  $hospital_array['query'];

                            if ($hospital_array['nb_rows'] > 0)  
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
                            $hospital = mysqli_query($conn , "SELECT * from hospitalisation  where cause  LIKE'%$search%' limit $start_fromH,$num_per_pageH;");
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
           

                        $sql="SELECT * FROM hospitalisation";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageH=".($page-1)."#hospitalS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageH=".$i."#hospitalS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageH=".($page+1)."#hospitalS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD t5" id="allergieS">Allergies</h2>
           <div  class="section">
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#allergieS" method="GET" id="filter"name="allergie">
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
                    if(isset($_GET["pageA"]))
                        {
                            $page=$_GET["pageA"];
                        }
                        else
                        {
                            $page=1;
                        }
                        $num_per_pageA=03;

                        $start_fromA=($page-1)*$num_per_pageA;
                   
                    $search = "";
                   
                    
                    if(isset($_GET['searchA']))
                    {
                      $search = $_GET['searchA'];
                      //=================afficher le tableau============================
                            $allergie = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE'%$search%' limit $start_fromA,$num_per_pageA;");
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
                            $allergie = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE'%$search%' limit $start_fromA,$num_per_pageA;");
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
               

                        $sql="SELECT * FROM allergies";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageA=".($page-1)."#allergieS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageA=".$i."#allergieS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageA=".($page+1)."#allergieS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD t6" id="vaccinS">Vaccinations</h2>
           <div class="section">
                    <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="doctor.php#allergieS" method="GET" name="vaccin">
                      <input type="hidden" name="vaccin">

                        <select name="byDateV">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchV" id="search" placeholder='nom du vaccin....'>
                        <button type="submit" name="submit-searchV" class="searchBtn" >
                           <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-vaccin" onclick="displayForm('vaccin')">Ajouter</button>
                <?php 


                    //================================display the fixed content=================================
                    if(isset($_GET["pageV"]))
                    {
                        $page=$_GET["pageV"];
                    }
                    else
                    {
                        $page=1;
                    }
                    $num_per_pageV=03;

                    $start_fromV=($page-1)*$num_per_pageV;
                    $date = 'tous';
                    $search = "";
                    //--------maladies-------------
                    
                    if(isset($_GET['searchV'])||isset($_GET['searchV']))
                    {
                      $date = $_GET['byDateV'];
                      $search = $_GET['searchV'];
                            //=================afficher le tableau============================
                            $vaccin_array = filter_by_date("vaccins",$date,$start_fromV,$num_per_pageV,"nom",$search,$conn);
                            $vaccin =  $vaccin_array['query'];

                            if ($vaccin_array['nb_rows'] > 0)  
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
                            $vaccin = mysqli_query($conn,"SELECT * FROM vaccins limit $start_fromV,$num_per_pageV");
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
          

                        $sql="SELECT * FROM vaccins";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageV=".($page-1)."#vaccinS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageV=".$i."#vaccinS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageV=".($page+1)."#vaccinS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
            <h2 class="titlesD t7" id="mesureS">Mesures</h2>
           <div  class="section">
                                   <!-- -----------------filtring data--------------------------- -->
                                   <div class="filters">
                      <form action="doctor.php#mesureS" method="GET" name="mesure">
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
                    if(isset($_GET["pageMes"]))
                    {
                        $page=$_GET["pageMes"];
                    }
                    else
                    {
                        $page=1;
                    }
                    $num_per_pageMes=01;

                    $start_fromMes=($page-1)*$num_per_pageMes;
                    
                    if(isset($_GET['byDateMes']))
                      {
                        $date = $_GET['byDateMes'];
                        $search = "";
                        $mesure_array = filter_by_date("mesures",$date,$start_fromMes,1,"date",$search,$conn);
                        $mesure =  $mesure_array['query'];

                            if ($mesure_array['nb_rows'] > 0)   
                            { 
                             echo'<div class="contenu mesure contenue-mes" data-page="6" id="Mesure">
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
                            $mesure = mysqli_query($conn,"SELECT * FROM mesures limit $start_fromMes,1");
                            if (mysqli_num_rows($mesure) > 0) 
                            { 
                              echo'<div class="contenu mesure contenue-mes" data-page="6" id="Mesure">
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
                     
                    echo'<div class="pages-btn">';
                    // pagination_sections($conn,"mesures","doctor.php",1,$page,'#mesure');
       

                        $sql="SELECT * FROM mesures";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageMes=".($page-1)."#mesureS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageMes=".$i."#mesureS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageMes=".($page+1)."#mesureS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD t8" id="antecedentS">Antécédents familiaux</h2>
           <div  class="section">
               <!-- -----------------filtring data--------------------------- -->
               <div class="filters">
                      <form action="doctor.php#antecedentS" method="GET" id="filter"name="antecedent">
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
                    if(isset($_GET["pageAnt"]))
                    {
                        $page=$_GET["pageAnt"];
                    }
                    else
                    {
                        $page=1;
                    }
                    $num_per_pageAnt=03;

                    $start_fromAnt=($page-1)*$num_per_pageAnt;
                    
                    if(isset($_GET['searchAnt']))
                    {
                    
                      $search = $_GET['searchAnt'];
                      $antecedent = mysqli_query($conn , "SELECT * from antecedents  where  nom  LIKE'%$search%' limit $start_fromAnt,$num_per_pageAnt;");
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
                            $antecedent = mysqli_query($conn,"SELECT * FROM antecedents limit $start_fromAnt,$num_per_pageAnt");
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
            

                        $sql="SELECT * FROM antecedents";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageAnt=".($page-1)."#antecedentS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageAnt=".$i."#antecedentS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageAnt=".($page+1)."#antecedentS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">

            <h2 class="titlesD t9" id="documentS">Documents</h2>
           <div  class="section">
            <!-- -----------------filtring data--------------------------- -->
            <div class="filters">
                      <form action="doctor.php#documentS" method="GET" name="doc">
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
                      
                    if(isset($_GET["pageDoc"]))
                    {
                        $page=$_GET["pageDoc"];
                    }
                    else
                    {
                        $page=1;
                    }
                    $num_per_pageDoc=03;

                    $start_fromDoc=($page-1)*$num_per_pageDoc;
                    if(isset($_GET['byDateD'])||isset($_GET['searchD']))
                      {
                        $date = $_GET['byDateD'];
                        $search = $_GET['searchD'];
                       $doc_array = filter_by_date("documents",$date,$start_fromDoc,$num_per_pageDoc,"nomDoc",$search,$conn);
                       $doc =  $doc_array['query'];

                            if ($doc_array['nb_rows'] > 0)  
                            { 
                              echo"<div class='doctor-tables' id='tableDoc'>";
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
                            $doc = mysqli_query($conn,"SELECT * FROM documents limit $start_fromDoc,$num_per_pageDoc");
                            if (mysqli_num_rows($doc) > 0) 
                            { 
                              echo"<div class='doctor-tables' id='tableD'>";

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
                  

                        $sql="SELECT * FROM documents";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageDoc=".($page-1)."#documentS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageDoc=".$i."#documentS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageDoc=".($page+1)."#documentS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
           </div>
           <hr class="hrD">
            <h2 class="titlesD"  id="diagnosticS">Diagnostique</h2>
           <div  class="section">
             <!-- -----------------filtring data--------------------------- -->
             <div class="filters">
                      <form action="doctor.php#diagnosticS" method="GET" id="filter"name="diagnostic">
                      <input type="hidden" name="diagnostic">
                      <select name="byDateDia">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchDia" id="search" placeholder='nom du médecin...'>
                       
                        <button type="submit" name="submit-searhDia" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
           <button type="button" class="open-form" id="add-diagno" onclick="displayForm('diagno');">Ajouter </button> 
           
            <?php
            
            $date = 'tous';
            $search = "";
              
            if(isset($_GET["pageD"]))
             {
                 $page=$_GET["pageD"];
             }
             else
             {
                 $page=1;
             }
             $num_per_pageD=03;

             $start_fromD=($page-1)*$num_per_pageD;

            if(isset($_GET['byDateDia'])||isset($_GET['searchDia']))
              {
                $date = $_GET['byDateDia'];
                $search = $_GET['searchDia'];
               $diag_array = filter_by_date("diagnostic",$date,$start_fromDoc,$num_per_pageDoc,"nomComplet",$search,$conn);
               $diag =  $diag_array['query'];

                            if ($diag_array['nb_rows'] > 0)   
                    { 
                      echo"<div class='doctor-tables' id='tableD'>";
                      table_diag($diag);
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
                    $diag = mysqli_query($conn,"SELECT * FROM diagnostic limit $start_fromDoc,$num_per_pageDoc");
                    if (mysqli_num_rows($diag) > 0) 
                    { 
                      echo"<div class='doctor-tables' id='tableD'>";

                      table_diag($diag);


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
                   
                        $sql="SELECT * FROM diagnostic";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='doctor.php?pageD=".($page-1)."#diagnosticS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='doctor.php?pageD=".$i."#diagnosticS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='doctor.php?pageD=".($page+1)."#diagnosticS'>Suivant</a>" ;

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
?>



<!-- ================sripts================================================= -->

