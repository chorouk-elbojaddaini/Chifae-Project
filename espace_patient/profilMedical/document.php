<?php 
session_start();
error_reporting(E_ALL ^ E_WARNING);

include '../../connexionDoc/cnx.php';
include'pagination.php';
include'filter.php';

$display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE email='{$_SESSION['SESSION_EMAIL']}' ");

if (mysqli_num_rows($display) > 0) 
 { 
  $row = mysqli_fetch_assoc($display);

  $_SESSION['idPatient'] =$row['id'];
 }
 //===============function to display content
 function affich_doc($doc,$res) 
{
  echo' 
 <!-- -----------------------AFFICHAGE DES DOCUMENTS------------------------ -->
  <div class="affichage">'.$res;
 while($row = mysqli_fetch_assoc($doc)) 
 { 
    echo"
    <div class='affichage-item border'>
         <h4>".$row["nomDoc"]."
         <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                     <div class='options' data-div='".$row["idDoc"]."'>
                     <p><a href='download.php?file=". $row["nomDoc"]."'><i class='fa-solid fa-file-arrow-down'></i></a></p>
                         <button class='editDoc editHide' value='".$row["idDoc"]."'><i class='fa-solid fa-pen'></i></button>
                         <button class='deleteDoc' id='delete-'".$row["idDoc"]."' value='".$row["idDoc"]."'><i class='fa-solid fa-trash-can'></i></button>
                     </div>
         </h4>
         <p>Date :<span> ".$row["date"]."</span></p>
         <p>Ajouté par :<span>  ".$row["ajoutPar"]."</span></p>
         <p>Catégorie :<span> ". $row["categorieDoc"]."</span></p>
   </div>
   <hr>";
 }
 echo'</div>';
 
}
function table_doc($doc,$res)
{
  echo"
      $res
    <table id='maladie-table'>
    <thead>
      <tr>
        <th>Nom du document</th>
        <th>Date</th>
        <th>Ajouté par</th>
        <th>Catégorie</th>
        <th> Actions</th>
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($doc)) 
    { 
       echo"
           <tr>
           <td>".$row["nomDoc"]."</td>
           <td>".$row["date"]."</td>
           <td>".$row["ajoutPar"]."</td>
           <td>".$row["categorieDoc"]."</td>
           <td class='options'>
                 
                  <p class='btn-optionD'><a href='download.php?file=". $row["nomDoc"]."'><i class='fa-solid fa-file-arrow-down'></i></a></p>
                      <button class='editDoc btn-optionD' value='".$row["idDoc"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteDoc btn-optionD' id='delete-'".$row["idDoc"]."' value='".$row["idDoc"]."'><i class='fa-solid fa-trash-can'></i></button>
                  
                 </td>
            </tr>
         ";       
              
    }
    
echo" 
    </tbody>
    </table> 
    ";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="../accueil/index.php"
              ><img src="./assets/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Shifae</h4>
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
            <img type="image"  src="images/profile.jpg" alt="profile" id="account">
              <h3 id="bienvenu">Bienvenue dans votre Espace de Santé</h3>
                 <a class="pop"href="profil.php" target="_blank" id="monProfil">Mes infos</a>
                 <a class="pop" href="../../connexionPat/logout.php" id="deconnect">Se déconnecter</a>
      </div>
       </div>
      
     </div>
   <!-- ------------------------------------------ -->
<div class="contenaire">
     <!--=====================FIXED CONTENT======================-->
       <!-- --------------------PROFILE------------------->
       <div class="profilDoc border">
        <img src="images/docs.png" id="docs" alt="documents">
       <div class="profil-text">
         <h1 id="profil-medical">Mes documents de Santé</h1>
        <p>J'ajoute mes documents de sante Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia nam ad repellat, fugit magni dicta labore velit inventore commodi</p>
        <button type="button" class="open-form" id="add-doc" onclick="displayForm('doc');">Ajouter un document</button>
       </div>
       
     </div>
     <div class="description " id="doc-desc">

        <div class="text-img">
        <img src="images/docs.png" id="docs" alt="documents">
            <div class="text">
              <h2 id="ajout" class="hover-underline-animation">
              Mes documents de Santé
              </h2>
              <p>
              J'ajoute mes documents de sante Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia nam ad repellat, fugit magni dicta labore velit inventore commodi
              </p>
              <button type="button" class="open-form" id="add-doc" onclick="displayForm('doc');">Ajouter un document</button>
            </div>
        </div>
</div>
      <!-- -----------------------REMPLISSAGE DES docsS------------------------ -->
               
      <div class="overlay docs hide" id="doc">
        <form   class="form border docForm" id="docs-form" enctype="multipart/form-data" >
        <button class="close_form" id="close-add-doc"> <i class="uis uis-multiply closeF"></i> </button> 
                <label >
                    Nom du document : 
                    <input type="text" minlength="3" name="nom-docs" id="nom-doc" placeholder="Entrez le nom du document"  />
                    <!-- add condition about existing file name -->
                </label>
                  <label >
                      Date :
                      <input type="date"id="date-docs"name="docs-date"  />
                  </label>
                  <label >
                    Ajouté par :
                    <input type="text"id="added-by-docs"name="added-by"  />
                </label>
                <label >
                    Catégorie :
                    <select id="category" name="category">
                        <option value="resultats">Résultats de biologie</option>
                        <option value="compte-rendu">Comptes rendu</option>
                        <option value="imagerie">Imageries médicales</option>
                        <option value="certifs">Certificats</option>
                        <option value="piece">Pièces administratives</option>
                        <option value="autres">autres documents</option>
                    </select>
                </label>
                <label id="choisir">
                  Choisir un document
                  <input type="file" name="file" id="add-file"/>
                  <span id="show-name"></span>
                 </label>
                <button  class="form-btn" id="submit-docF" >Ajouter</button>
       </form>
      </div>

      <!-- -----------------------Editer un docsS------------------------ -->
               
      <div class="overlay docs hide" id="editDoc">
        <form   class="form border docForm" id="docs-form-edit" enctype="multipart/form-data"  >
        <button class="close_form" id="close-edit-doc"> <i class="uis uis-multiply closeF"></i> </button> 
        <input type="hidden" name="doc_id" id="doc_id" >
                <label >
                    Nom du document : 
                    <input type="text" minlength="3" name="nomDoc" id="nomDoc" placeholder="Entrez le nom du document"  />
                    <!-- add condition about existing file name -->
                </label>
                  <label >
                      Date :
                      <input type="date"id="dateDoc"name="dateDoc"  />
                  </label>
                  <label >
                    Ajouté par :
                    <input type="text"id="addedDoc"name="addedDoc"  />
                </label>
                <label >
                    Catégorie :
                    <select id="category-doc" name="category-doc">
                        <option value="resultats">Résultats de biologie</option>
                        <option value="compte-rendu">Comptes rendu</option>
                        <option value="imagerie">Imageries médicales</option>
                        <option value="certifs">Certificats</option>
                        <option value="piece">Pièces administratives</option>
                        <option value="autres">autres documents</option>
                    </select>
                </label>
               
                <button  class="form-btn" id="submit-doc-edit" value="Edit" >Modifier</button>
       </form>
      </div>
      
     
      <div class="docs">
        <h2 id="docs-title">Mes derniers documents</h2>
        <div class="affich-docs">
           <!-- -----------------filtring data--------------------------- -->
           <?php
            if(empty( $_SESSION['dateD']) && empty( $_SESSION['searchD']))
            {
             $_SESSION['dateD']='tous';
             $_SESSION['searchD']='';
            }
            if(isset($_POST['searchDoc']))
             {
              
               $_SESSION['dateD'] = $_POST['byDateD'];
               $_SESSION['searchD'] = $_POST['searchD'];
               $_SESSION['searchDoc'] = $_POST['searchDoc'];

             }
           ?>
           <div class="filters">
                      <form action="" method="POST" id="by_date">
                        <select name="byDateD">
                        <option name="tous" value="tous" <?php if(isset($_SESSION['searchDoc'])){if($_SESSION['dateD']=="tous"){echo "selected";} }?>>Tous</option>
                            <option name="cemois" value="cemois" <?php if(isset($_SESSION['searchDoc'])){if($_SESSION['dateD']=="cemois"){echo "selected";} }?>>ce mois</option>
                            <option name="moisprec" value="moisprec" <?php if(isset($_SESSION['searchDoc'])){if($_SESSION['dateD']=="moisprec"){echo "selected";} }?>>mois précédent</option>
                            <option name="6mois" value="6mois" <?php if(isset($_SESSION['searchDoc'])){if($_SESSION['dateD']=="6mois"){echo "selected";} }?>>6 mois</option>
                            <option name="ans" value="ans" <?php if(isset($_SESSION['searchDoc'])){if($_SESSION['dateD']=="ans"){echo "selected";} }?>>ans</option>
                            <option name="plsans" value="plusieursAns" <?php if(isset($_SESSION['searchDoc'])){if($_SESSION['dateD']=="plusieursAns"){echo "selected";} }?>>plus d'un an</option>
                        </select>
                        <input type="text" name="searchD" id="search" placeholder='nom du doc...' value="<?php if(isset($_SESSION['searchDoc'])){echo $_SESSION['searchD'];}?>">
                        <button type="submit" name="searchDoc" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    
                     <?php 

                  
                    $num_per_page=03;
                  
                  
                    // echo "ana session". $_SESSION['date']."<br>";

                    $pageD = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    // echo "ana page".$pageM."<br>";
                    $start_fromD =   ($pageD-1)*$num_per_page;
                    // echo "ana lbdya".$start_from;
                    $doc_array = filter_by_date("documents",$_SESSION['dateD'],$start_fromD,$num_per_page,"nomDoc", $_SESSION['searchD'],$conn,$_SESSION['idPatient']);
                    $doc = $doc_array['query'];
                    $total_recordsD=$doc_array['nb_rows'];
                    // echo $total_records;
                    $res = "<p class='response hideMe'>Il existe ". $total_recordsD." enregistrement<hr></p>";
                    $total_pages=ceil($total_recordsD/$num_per_page);
                    if($total_recordsD>0)
                    {
                      
                      table_doc($doc,$res);
                     
                    }
                    $doc1_array = filter_by_date("documents",$_SESSION['dateD'],$start_fromD,$num_per_page,"nomDoc", $_SESSION['searchD'],$conn,$_SESSION['idPatient']);
                    $doc1 = $doc1_array['query'];
                    $total_recordsD1=$doc1_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_recordsD1/$num_per_page);
                    $res1 = "<p class='response '>Il existe ". $total_recordsD1." enregistrement</p>";
                    if($total_recordsD1>0)
                    {
                    
                      affich_doc($doc1,$res1);
                     
                    }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                    </div>";
                    } 
                 
                            echo'<div class="pages-btn">';

                            for ($i=1; $i <= $total_pages ; $i++){  
                                echo "<a class='pagination'href='?page=".$i."'>".$i."</a>" ;
                              } 
                              echo'</div>';
                   
                    ?>

                  
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

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
   <script src="js/script.js" defer></script>
   <!-- <script src="js/main.js" defer></script> -->
   <script src="js/docDisplay.js" defer></script>
   <script src="js/docEdit.js" defer></script>
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

   <script src="js/modal.js" defer></script>
   <script>

        // console.log("options");
       let options = document.querySelectorAll('.options-btn');
       for (let i = 0; i < options.length; i++) {
         options[i].addEventListener('click',()=>{
         let div=options[i].nextElementSibling
          $(div).toggle()
   
  })
}
   </script>
   
</html>