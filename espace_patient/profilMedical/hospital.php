<?php include'head.php';
 include'pagination.php';
 include '../../connexionDoc/cnx.php';
include'filter.php';
 
 function affich_hospital($hospital)
 {
  echo' 
  <!-- -----------------------AFFICHAGE DES hospitalisation------------------------ -->
   <div class="affichage">';
  while($row = mysqli_fetch_assoc($hospital)) 
  { 
     echo"
     <div class='affichage-item border'>
          <h4>".$row["cause"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idH"]."'>
                          <button class='editH' value='".$row["idH"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteH' id='delete-'".$row["idH"]."' value='".$row["idH"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Date d'admission<span>".$row["date"]."</span></p>
          <p>Durée de séjour<span>".$row["duree"]."</span></p>
          <p>Decription<span>".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
 }
 function table_hospital($hospital)
 {
  echo"
    <table id='hospital-table'>
    <thead>
      <tr>
        <th>Cause</th>
        <th>Date d'admission</th>
        <th>Durée de séjour</th>
        <th>Description</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($hospital)) 
    { 
       echo"
           <tr>
                <td>".$row["cause"]."</td>
                 <td>".$row["date"]."</td>
                 <td>".$row["duree"]."</td>

                 <td>".$row["description"]."</td>
                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idH"]."'>
                      <button class='editH' value='".$row["idH"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteH' id='delete-'".$row["idH"]."' value='".$row["idH"]."'><i class='fa-solid fa-trash-can'></i></button>
                  </div>
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
 <!-- =====================PAGE 3 =========================-->
 <div class="page "  data-page="3">
                  <!-- -------------------------Descriptions------------------------ -->
                  <div class="description" data-page="3">
                    <div class="text-img">
                      <img src="images/hospital.png" alt="load-a-file" id="add-file">
                      <div class="text">
                        <h2 id="ajout" class="hover-underline-animation">
                          J'ajoute une hospitalisation ou un acte chirurgical
                        </h2>
                        <p>
                          Je peux renseigner l'ensemble de mes hospitalisations et autres actes chirurgicals actuels ou passes 
                        </p>
                        <button type="button" class="open-form" id="add-hospital" onclick="displayForm('hospital')">Ajouter</button>
                      </div>
                  </div>
                  </div>

                  <!-- -----------------------------Insert hospitalisations----------------------------------- -->
                  <div class="overlay hospital hide" id="hospital">
                    <form action="#" method="post" name="hospital" class="form border insert" id="hospital-form">
                      <button class="close_form" id="hospital-btn" name="close-insert-hospital"> <i class="uis uis-multiply closeF"></i> </button> 
                    
                              <label >
                                Cause : 
                                <input type="text" minlength="3" name="cause-hospital"  placeholder="Chirurgie cardiaque"/>
                            </label>
                              <label >
                                  Date d'admission :
                                  <input type="date"id="date-hospital" name="hospital-date" />
                              </label>
                              <label >
                                Durée de séjour :
                                <input type="text" minlength="3"id="duree-hospital" name="hospital-duree" />
                            </label>
                                <label >
                                  Description :
                                    <textarea name="desc-hospital"  id="desc-hospital"  rows="4" placeholder=" Description "></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn"  name="insert-hospital">Ajouter</button>
                  </form>
                  </div>
                  <!-- -----------------------------update hospitalisations----------------------------------- -->
                  <div class="overlay hospital hide" id="hospital1">
                    <form action="#" method="post" name="hospital" class="form border update" id="hospital-form-update">
                      <button class="close_form" id="hospital-btn-close" name="close-update-hospital"> <i class="uis uis-multiply closeF"></i> </button> 
                              <input type="hidden" name="idH" id="hosp" >
                              
                              <label >
                                Cause : 
                                <input type="text" minlength="3" name="cause" id="causeH"  placeholder="Chirurgie cardiaque"/>
                            </label>
                              <label >
                                  Date d'admission :
                                  <input type="date"id="dateH" name="dateH" />
                              </label>
                              <label >
                                Durée de séjour :
                                <input type="text" minlength="3"id="dureeH" name="dureeH" />
                            </label>
                                <label >
                                  Description :
                                    <textarea name="descH"  id="descH"  rows="4" placeholder=" Description "></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn"  name="update-hospital"id="update-hospital">Modifier</button>
                  </form>
                  </div>
                  <!-- -------------------------Contenu------------------------ -->
                  
                  <div class="contenu" data-page="3">
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
                        <input type="text" name="search" id="search" placeholder='cause ...'>
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <?php 



$date = 'tous';
$search = "";
  //--------hospitalisation-------------
 
 if(isset($_GET['byDate'])||isset($_GET['search']))
  {
    $date = $_GET['byDate'];
    $search = $_GET['search'];
    $hospital = filter_by_date("hospitalisation",$date,$start_from,$num_per_page,"cause",$search,$conn);
    if (mysqli_num_rows($hospital) > 0) 
    { // output data of each row
          affich_hospital($hospital);
         
    }
        //=================afficher le tableau============================
    $hospital1 = filter_by_date("hospitalisation",$date,$start_from,$num_per_page,"cause",$search,$conn);

        if (mysqli_num_rows($hospital1) > 0) 
        { table_hospital($hospital1); }
        else
        {
          echo"<div class='affichage-item border'>
          <p>Aucun résultat n'est trouvé</p>
          </div>";
        } 
        $referer_host = $_SERVER[ "HTTP_HOST" ];
        $referer_uri = explode( "?", $_SERVER[ "REQUEST_URI" ] );
        $referer = $referer_host . $referer_uri[ 0 ];
  }
  else
  {
        $hospital = mysqli_query($conn,"SELECT * FROM hospitalisation limit $start_from,$num_per_page");
      if (mysqli_num_rows($hospital) > 0) 
    { // output data of each row
          affich_hospital($hospital);
    }
        //=================afficher le tableau============================
        $hospital1 = mysqli_query($conn,"SELECT * FROM hospitalisation limit $start_from,$num_per_page");
        if (mysqli_num_rows($hospital1) > 0) 
        { table_hospital($hospital1); }
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
pagination($conn,"hospitalisation","hospital.php",3,$page);
echo'</div>';
?>
</div>

</div>
</div>

<?php include'footer.php';?>
 