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
                      <form action="" method="POST" id="by_date">
                        <select name="byDateM">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <!-- <input type="text" name="search" id="search" placeholder='ordinaire ...'>--> 
                        <button type="submit" name="searchMes" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <div class="contenu mesure contenue-mes" data-page="6" id="mesure">
                       
                    
                      
                       <?php 
                    // $total_pages = 0;
                    $num_per_page=01;
                    if(empty( $_SESSION['dateM']) )
                    {
                    $_SESSION['dateM']='tous';
                    }
                    if(isset($_POST['searchMes']))
                    {
                    
                      $_SESSION['dateM'] = $_POST['byDateM'];
                    }
                    $_SESSION['searchM'] = "";
                    // echo "ana session". $_SESSION['dateM']."<br>";
                    
                    $pageM = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromM =   ($pageM-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromM;
                    $mesure_array = filter_by_date("mesures",$_SESSION['dateM'],$start_fromM,$num_per_page,"poids", $_SESSION['searchM'],$conn);
                    $mesure = $mesure_array['query'];
                    $total_recordsM=$mesure_array['nb_rows'];
                    // echo $total_recordsM;
                    $total_pages=ceil($total_recordsM/$num_per_page);
                    if($total_recordsM>0)
                    {
                      echo"<p class='response'>Il existe ". $total_recordsM." enregistrement</p>";
                       echo'<div class="grid-mesure">';
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
                                echo "<a class='pagination'href='?page=".$i."'>".$i."</a>" ;
                              } 
                              echo'</div>';
                              echo'</div>';
                              echo'</div>';

                    ?>

<?php include'footer.php';?>
<script type="text/javascript">
  //=====================toogle to show the options div=============
let options = document.querySelectorAll('.options-btn');
console.log(options)
for (let i = 0; i < options.length; i++) {
  options[i].addEventListener('click',()=>{
    let div=options[i].nextElementSibling
    // div.style.display="block"
    $(div).toggle()
    console.log( )
   
  })
}
</script>