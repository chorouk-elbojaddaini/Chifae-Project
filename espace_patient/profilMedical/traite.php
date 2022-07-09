<?php include'head.php';
include'filter.php';

include'pagination.php';
include '../../connexionDoc/cnx.php';
function affich_traite($traite) {
  // output data of each row
  echo' 
  <!-- -----------------------AFFICHAGE DES TRAITEMENTS------------------------ -->
   <div class="affichage">';
  while($row = mysqli_fetch_assoc($traite)) 
  { 
     echo"
     <div class='affichage-item border'id='traite'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idT"]."'>
                          <button class='editT' value='".$row["idT"]."'><i class='fa-solid fa-pen'></i></button>
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
function table_traite($traite) {
      echo
      "
    <table id='traitement-table'>
    <thead>
    <tr>
      <th>Nom du traitement</th>
      <th>Date de début</th>
      <th>Durée</th>
      <th>Dose</th>
      <th>Description</th>
      <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
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
                <td>
                <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                <div class='options' data-div='".$row["idT"]."'>
                    <button class='editT' value='".$row["idT"]."'><i class='fa-solid fa-pen'></i></button>
                    <button class='deleteT' id='delete-'".$row["idT"]."' value='".$row["idT"]."'><i class='fa-solid fa-trash-can'></i></button>
                </div>
              </td>
          </tr>
      ";       
            
    }

    echo" 
    </tbody>
    </table> 
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
                  <hr>
                          <!-- -----------------filtring data--------------------------- -->
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
                        <input type="text" name="search" id="search" placeholder='nom ...'>
                        <label for="searchBtn"><i class="fa-solid fa-magnifying-glass " id="search_icon"></i></label>
                        <input type="submit" name="submit-searh" id="searchBtn">
                      </form>
                    </div>

<?php 


//================================display the fixed content=================================

$date = 'tous';
$search = "";
  //--------traitements-------------
 
 if(isset($_GET['byDate'])||isset($_GET['search']))
  {
    $date = $_GET['byDate'];
    $search = $_GET['search'];
    $traite = filter_by_date("traitements",$date,$start_from,$num_per_page,"nom",$search,$conn);
    if (mysqli_num_rows($traite) > 0) 
    { // output data of each row
          affich_traite($traite);
         
    }
        //=================afficher le tableau============================
    $traite1 = filter_by_date("traitements",$date,$start_from,$num_per_page,"nom",$search,$conn);

        if (mysqli_num_rows($traite1) > 0) 
        { table_traite($traite1); }
        else
        {
          echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
        } 
  }
  else
  {
        $traite = mysqli_query($conn,"SELECT * FROM traitements limit $start_from,$num_per_page");
      if (mysqli_num_rows($traite) > 0) 
        { // output data of each row
          affich_traite($traite);
        }
        //=================afficher le tableau============================
        $traite1 = mysqli_query($conn,"SELECT * FROM traitements limit $start_from,$num_per_page");
        if(mysqli_num_rows($traite1) > 0) 
        { table_traite($traite1); }
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
pagination($conn,"traitements","traite.php",3,$page);
echo'</div>';
?>
 </div>

</div>
                  
</div>
<?php include'footer.php';?>

 