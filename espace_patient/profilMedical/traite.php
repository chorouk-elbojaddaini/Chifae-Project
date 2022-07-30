<?php include'head.php';
include'filter.php';

include'pagination.php';
include '../../connexionDoc/cnx.php';
function affich_traite($traite,$res) {
  // output data of each row
  echo' 
  <!-- -----------------------AFFICHAGE DES TRAITEMENTS------------------------ -->
   <div class="affichage">'.$res;
  while($row = mysqli_fetch_assoc($traite)) 
  { 
     echo"
     <div class='affichage-item border'id='traite'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idT"]."'>
                          <button class='editT editHide' value='".$row["idT"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteT' id='delete-'".$row["idT"]."' value='".$row["idT"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Date de début <span>".$row["date"]."</span></p>
          <p>Durée: <span>".$row["duree"]."</span></p>
          <p>Dose: <span>".$row["dose"]."</span></p>
          <p>Decription<span>".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
// =========================================

}
function table_traite($traite,$res) {
      echo
      "$res
      <div class='table-scroll'>
      <table id='traitement-table'>
    <thead>
    <tr>
      <th>Nom du traitement</th>
      <th>Date de début</th>
      <th>Durée</th>
      <th>Dose</th>
      <th>Description</th>
      <th> Actions</th>
    </tr>
    </thead>
    <tbody>";
    while($row = mysqli_fetch_assoc($traite)) 
    { 
    echo"
        <tr>
              <td>".$row["nom"]."</td>
              <td>".$row["date"]."</td>
              <td>".$row["duree"]."</td>
              <td>".$row["dose"]."</td>
              <td>".$row["description"]."</td>
              <td class='options'>
            
                    <button class='editT btn-option' value='".$row["idT"]."'><i class='fa-solid fa-pen'></i></button>
                    <button class='deleteT btn-option' id='delete-'".$row["idT"]."' value='".$row["idT"]."'><i class='fa-solid fa-trash-can'></i></button>
                
              </td>
          </tr>
      ";       
            
    }

    echo" 
    </tbody>
    </table> 
    </div>
    ";
}?>
<!-- =====================PAGE 2 =========================-->
<div class="page " data-page="2">
                  <!-- -------------------------Descriptions------------------------ -->
                  <div class="description" data-page="2">
                      <div class="text-img">
                        <img src="images/traitement.png" alt="medicament" id="add-file">
                          <div class="text">
                          <h2 id="ajout" class="hover-underline-animation">
                            J'ajoute mes traitements
                          </h2>
                          <p>
                            Je peux renseigner l'ensemble de mes traitements 
                          </p>
                          <button type="button" class="open-form" id="add-traitement" onclick="displayForm('traitement')">Ajouter un traitement</button>
                          </div>
                      </div>
                      
                      <!-- -----------------------REMPLISSAGE DES TARAITEMENTS------------------------ -->
                  
                <div class="overlay traitement hide" id="traitement" >
                  <form action="#" method="post" name="traitement" class="form border insert" id="traitement-form">
                    <button class="close_form" id="traitement-btn-close" name="close-insert-traitement" > <i class="uis uis-multiply closeF"></i> </button> 
                  
                            <label >
                              Nom du traitement : 
                              <input type="text" minlength="3" name="nom-traitement"  placeholder="Entrez le nom du traitement" />
                          </label>
                            <label >
                                Date début  :
                                <input type="date"id="date-traitement"name="traitement-date" />
                            </label>
                            <label >
                              Durée du Traitement : 
                              <input type="text" minlength="3" name="duree-traitement"  placeholder="exp: 3 mois ....." />
                          </label>
                          <label >
                            Dose : 
                            <input type="text" minlength="3" name="dose-traitement"  placeholder="exp: 2 fois par jour ....." />
                        </label>
                              <label >
                                  Description :
                                  <textarea name="desc-traitement"  id="desc-traitement"  rows="4" placeholder=""></textarea>
                              </label>
                              
                          <button type="submit" class="form-btn"  name="insert-traitement">Ajouter</button>
                  </form>
                </div>
                  <!-- -----------------------UPDATE DES TARAITEMENTS------------------------ -->
                  
                  <div class="overlay traitement hide" id="traitement1" >
                    <form action="#" method="post" name="traitement" class="form border update" id="traitement-form-update">
                    <button class="close_form" id="traitement-btn-close" name="close-update-traitement" > <i class="uis uis-multiply closeF"></i> </button> 
                                  <input type="hidden" name="idT" id="traite" >
                                
                              <label >
                                Nom du traitement : 
                                <input type="text" minlength="3"id="nomT"  name="nomT"  placeholder="Entrez le nom du traitement" />
                            </label>
                              <label >
                                  Date début  :
                                  <input type="date"id="dateT"name="dateT" />
                              </label>
                              <label >
                              Durée du Traitement : 
                              <input type="text" minlength="3" id="dureeT"name="dureeT"  placeholder="exp: 3 mois ....." />
                          </label>
                          <label >
                            Dose : 
                            <input type="text" minlength="3" id="doseT"name="doseT"  placeholder="exp: 2 fois par jour ....." />
                        </label>
                                <label >
                                    Description :
                                    <textarea name="descT"  id="descT"  rows="4" placeholder=""></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn"  id="update-traitement"name="update-traitement">Modifier</button>
                      </form>
                  </div>
                  </div>
                  <!-- -------------------------Contenu------------------------ -->

                  <div class="contenu" data-page="2">
                  
                  <?php
                    if(empty( $_SESSION['dateT']) && empty( $_SESSION['searchT']))
                    {
                    $_SESSION['dateT']='tous';
                    $_SESSION['searchT']='';
                    }
                    if(isset($_POST['searchT']))
                    {
                    
                      $_SESSION['dateT'] = $_POST['byDate'];
                      $_SESSION['searchT'] = $_POST['searchT'];
                      $_SESSION['searchTr'] = $_POST['searchTr'];

                    }
                  ?>
                          <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="" method="POST" id="by_date">
                        <select name="byDate">
                        <option name="tous" value="tous" <?php if(isset($_SESSION['searchTr'])){if($_SESSION['dateT']=="tous"){echo "selected";} }?>>Tous</option>
                            <option name="cemois" value="cemois" <?php if(isset($_SESSION['searchTr'])){if($_SESSION['dateT']=="cemois"){echo "selected";} }?>>ce mois</option>
                            <option name="moisprec" value="moisprec" <?php if(isset($_SESSION['searchTr'])){if($_SESSION['dateT']=="moisprec"){echo "selected";} }?>>mois précédent</option>
                            <option name="6mois" value="6mois" <?php if(isset($_SESSION['searchTr'])){if($_SESSION['dateT']=="6mois"){echo "selected";} }?>>6 mois</option>
                            <option name="ans" value="ans" <?php if(isset($_SESSION['searchTr'])){if($_SESSION['dateT']=="ans"){echo "selected";} }?>>ans</option>
                            <option name="plsans" value="plusieursAns" <?php if(isset($_SESSION['searchTr'])){if($_SESSION['dateT']=="plusieursAns"){echo "selected";} }?>>plus d'un an</option>
                        </select>
                        <input type="text" name="searchT" id="search" placeholder='nom du traitement...' value="<?php if(isset($_SESSION['searchTr'])){echo $_SESSION['searchT'];}?>">
                       
                        <button type="submit" name="searchTr" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div><hr class="hideMe">
  <?php 

                  
                  $num_per_page=03;

                  if(empty( $_SESSION['dateT']) && empty( $_SESSION['searchT']))
                  {
                  $_SESSION['dateT']='tous';
                  $_SESSION['searchT']='';
                  }
                  if(isset($_POST['searchT']))
                  {
                  
                    $_SESSION['dateT'] = $_POST['byDate'];
                    $_SESSION['searchT'] = $_POST['searchT'];
                  }
                  // echo "ana session". $_SESSION['dateT']."<br>";

                  $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                  // echo "ana page".$page."<br>";
                  $start_from =   ($page-1)*$num_per_page;
                  // echo "ana lbdya 0".$start_from;
                  $traite_array = filter_by_date("traitements",$_SESSION['dateT'],$start_from,$num_per_page,"nom", $_SESSION['searchT'],$conn,$_SESSION['idPatient']);
                  $traite = $traite_array['query'];
                  $total_records=$traite_array['nb_rows'];
                  // echo "ana total".$total_records;
                  $total_pages=ceil($total_records/$num_per_page);
                  $res = "<p class='response hideMe'>Il existe ". $total_records." enregistrement</p>";
                  if($total_records>0)
                  {
                   
                    table_traite($traite,$res);
                        

                  }//====================small devices================
                  $traite1_array = filter_by_date("traitements",$_SESSION['dateT'],$start_from,$num_per_page,"nom", $_SESSION['searchT'],$conn,$_SESSION['idPatient']);
                  $traite1 = $traite1_array['query'];
                  $total_records1=$traite1_array['nb_rows'];
                  $res1 = "<p class='response'>Il existe ". $total_records1." enregistrement</p>";
                  if($total_records1>0)
                  {
                    
                    affich_traite($traite1,$res1);
                    // echo"</div>"; 
                        

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
 