<?php include'head.php';
 include'pagination.php';
include '../../connexionDoc/cnx.php';
include'filter.php';

 $num_per_page=01;
 $start_from=($page-1)*$num_per_page;
 
 function affich_mesure($mesure) {
  while ($row = mysqli_fetch_assoc($mesure))
  {  echo"
    <div class='mesure'>
    <img src='images/poid.png' alt='poids' />
    <p >Poids</p>
    <p id='poids'>".$row["poids"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
    </div>
    <div class='mesure'>
     <img src='images/taille.png' alt='taille' />
      <p>Taille</p>
      <p id='taille'>".$row["taille"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
  </div>
    <div class='mesure'>
    <img src='images/imc.png' alt='icm' />
      <p >
        ICM <span>Indice de Masse Corporelle</span></p>
      <p id='icm'>".$row["icm"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
    </div>
    <div class='mesure'>
    <img src='images/tour.png' alt='Tour de taille' />
     <p >
      Tour de taille</p>
      <p id='tour'>".$row["tour"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
  </div>
    <div class='mesure'>
    <img src='images/temperature.png' alt='Température' />
    <p>Température</p>
      <p id='temp'>".$row["temp"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
  </div>
    <div class='mesure'>
    <img src='images/tension.png' alt='Tension artérielle' />
    <p>
      Tension artérielle</p>
     <p id='tension'>".$row["tension"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
  </div>
    <div class='mesure'>
    <img src='images/frq.png' alt='fréquence cardiaque' />
    <p >
      fréquence cardiaque</p>
      <p id='frq'>".$row["frqCard"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
  </div>
    <div class='mesure'>
    <img src='images/glycemie.png' alt='Glycémie' />
    <p>
      Glycémie</p>
      <p id='gly'>".$row["gly"]."</p>
      <span class='mesure-time'>".$row["date"]."</span>
  </div>
  <br>
  <button type='button' id='mesureUpdate' class='open-form editMes' value='".$row["idMes"]."' >Modifier</button>
  ";
 }

echo"</div> ";
 }?>

              <!-- =====================PAGE 6 =========================-->
        <div class="page " data-page="6">
              <!-- -------------------------Descriptions------------------------ -->
                   <div class="description" data-page="6">
                      <div class="text-img">
                        <img src="images/mesurement.png" alt="load-a-file" id="add-file">
                        <div class="text">
                          <h2 id="ajout" class="hover-underline-animation">
                            J'ajoute mes mesures , et Je controle ma santé
                          </h2>
                          <p>
                            Je peux renseigner l'ensemble de mes mesures  
                          </p>
                          <button type="button" class="open-form" id="add-mesure" onclick="displayForm('mesure')">Ajouter les mesures</button>
                        </div>

                     </div>
                     <hr>

                   </div>
            <!-- ---------------------------form to add mesures------------------------- -->
            <div class="overlay mesureForm hide" id="mesure">
                <form action="#" method="post" name="mesure" class="form border insert" id="mesure-form">
                  <button class="close_form" id="mesure-btn" name="close-insert-mesure"> <i class="uis uis-multiply closeF"></i> </button> 
                    <div class="mesure-inputs">
                      <label >
                        Poids
                        <input type="text"  name="poid" id="M1">
                        </label>

                        <label >
                          Taille
                          <input type="text"  name="taille" id="M2">
                        </label>

                        <label >
                          ICM 
                          <input type="text"  name="IMC" id="M3" placeholder="Indice de Masse Corporelle">
                        </label>

                        <label >
                            Tour de taille
                            <input type="text"  name="tour-taille" id="M4">
                        </label>

                        <label >
                          Température
                          <input type="text"  name="temperature" id="M5">
                        </label>
                    
                        <label >
                          Tension artérielle
                          <input type="text"  name="tension-arterielle" id="M6">
                        </label>
                      
                        <label >
                          fréquence cardiaque
                          <input type="text"  name="frq-cardiaque" id="M7">
                        </label>
                    
                        <label >
                          Glycémie
                          <input type="text"  name="glycemie" id="M8">
                        </label>
                        <label >
                     Date
                      <input type="date"  name="date" id="date">
                    </label>
                    </div>
                    
                        <button type="submit" class="form-btn"  name="insert-mesure">Ajouter</button>
               </form>
          </div>
               <!-- ---------------------------form to update mesures------------------------- -->
              <div class="overlay mesureForm hide" id="mesure1">
                <form action="#" method="post" name="mesure" class="form border update" id="mesure-form-update">
                  <button class="close_form" id="mesure-btn-close" name="close-update-mesure"> <i class="uis uis-multiply closeF"></i> </button> 
                    <input type="hidden" name="idM" id="mes" >
                 
                  <div class="mesure-inputs">
                  <label >
                    Poids
                     <input type="text"  name="M1" id="m1">
                    </label>

                    <label >
                      Taille
                      <input type="text"  name="M2" id="m2">
                    </label>

                    <label >
                      ICM 
                      <input type="text"  name="M3" id="m3" placeholder="Indice de Masse Corporelle">
                    </label>

                    <label >
                        Tour de taille
                         <input type="text"  name="M4" id="m4">
                    </label>

                    <label >
                      Température
                      <input type="text"  name="M5" id="m5">
                    </label>
                
                    <label >
                      Tension artérielle
                      <input type="text"  name="M6" id="m6">
                    </label>
                   
                    <label >
                      fréquence cardiaque
                      <input type="text"  name="M7" id="m7">
                    </label>
                 
                    <label >
                      Glycémie
                      <input type="text"  name="M8" id="m8">
                    </label>
                    <label >
                    Date
                      <input type="date"  name="date1" id="date1">
                    </label>
               
                </div>
                
                        <button type="submit" class="form-btn"  id="update-mesure"name="update-mesure">Modifier</button>
               </form>
              </div>
              <!-- -------------------------Contenu------------------------ -->
              <div class="filters">
                      <form action="" method="GET" id="by_date">
                        <select name="byDate">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <!-- <input type="text" name="search" id="search" placeholder='ordinaire ...'>--> 
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <div class="contenu mesure contenue-mes" data-page="6" id="mesure">
                       
                    
                       <div class="grid-mesure">
                      
<?php 
$date = 'tous';
  //--------mesures-------------
 
 if(isset($_GET['byDate']))
  {
    $date = $_GET['byDate'];
    $search = "";
    $mesure = filter_by_date("mesures",$date,$start_from,$num_per_page,"date",$search,$conn);
    if (mysqli_num_rows($mesure) > 0) 
    { // output data of each row
          affich_mesure($mesure);
         
    }
        //=================afficher le tableau============================
 
        else
        {
          echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
        } 
        $referer_host = $_SERVER[ "HTTP_HOST" ];
        $referer_uri = explode( "?", $_SERVER[ "REQUEST_URI" ] );
        $referer = $referer_host . $referer_uri[ 0 ];
  }
  else
  {
        $mesure = mysqli_query($conn,"SELECT * FROM mesures limit $start_from,$num_per_page");
      if (mysqli_num_rows($mesure) > 0) 
    { // output data of each row
          affich_mesure($mesure);
    }
        //=================afficher le tableau============================
       
        else
        {
          echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
        } 
  } 
  //--------mesures-------------
  $mesure = mysqli_query($conn,"SELECT * FROM mesures  limit $start_from,$num_per_page");
  if (mysqli_num_rows($mesure) > 0) 
 { // output data of each row
 
 }
    
    
    else
    {
      echo"<div class='affichage-item border'>
      <p>Aucun résultat n'est trouv</p>
      </div>";
    }  
   
    ?>


</div>
<?php 
echo'<div class="pages-btn">';
pagination($conn,"mesures","mesure.php",1,$page);
echo'</div>';

?>
</div>

<?php include'footer.php';?>