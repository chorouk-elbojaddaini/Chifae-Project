<?php include'head.php';
include'pagination.php';
include '../../connexionDoc/cnx.php';
include'filter.php';


function affich_vaccin($vaccin)
{
  echo' 
  <!-- -----------------------AFFICHAGE DES vaccins------------------------ -->
   <div class="affichage">';
  while($row = mysqli_fetch_assoc($vaccin)) 
  { 
     echo"
     <div class='affichage-item border'id='vaccin'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idV"]."'>
                          <button class='editV' value='".$row["idV"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteV' id='delete-'".$row["idV"]."' value='".$row["idV"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Date de l'act <span>".$row["date"]."</span></p>
          <p>Protege contre<span>".$row["protegeContre"]."</span></p>

          <p>Nombre des rappels: <span>".$row["nbRappel"]."</span></p>
          <p>Decription<span>".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
}
function table_vaccin($vaccin)
{
  echo
  "
<table id='vaccin-table'>
<thead>
<tr>
  <th>Nom du vaccin</th>
  <th>Date de l'act</th>
  <th>Durée</th>
  <th>Nombre des rappels</th>
  <th>Description</th>
  <th><i class='fa-solid fa-ellipsis-vertical'></i></th>
</tr>
</thead>
<tbody>";
while($row = mysqli_fetch_assoc($vaccin)) 
{ 
 echo"
     <tr>
          <td>".$row["nom"]."</td>
           <td>".$row["date"]."</td>
           <td>".$row["protegeContre"]."</td>
           <td>".$row["nbRappel"]."</td>
           <td>".$row["description"]."</td>
            <td>
            <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
            <div class='options' data-div='".$row["idV"]."'>
                <button class='editV' value='".$row["idV"]."'><i class='fa-solid fa-pen'></i></button>
                <button class='deleteV' id='delete-'".$row["idV"]."' value='".$row["idV"]."'><i class='fa-solid fa-trash-can'></i></button>
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
<!-- =====================PAGE 5 =========================-->
<div class="page " data-page="5">
                  <!-- -------------------------Descriptions------------------------ -->
                      <div class="description" data-page="5">
                        <div class="text-img">
                          <img src="images/vaccin.png" alt="vaccin" id="add-file">
                          <div class="text">
                            <h2 id="ajout" class="hover-underline-animation">
                              J'ajoute mes vaccins
                            </h2>
                            <p>
                              Je peux renseigner l'ensemble de mes vaccins et les décrire 
                            </p>
                            <button type="button" class="open-form" id="add-vaccin" onclick="displayForm('vaccin')">Ajouter</button>
                          </div>
                      </div>
                      </div>
                          <!-- -----------------------------vaccin insert----------------------------------- -->
                  <div class="overlay vaccin hide" id="vaccin">
                    <form action="#" method="post" name="vaccin" class="form border insert" id="vaccin-form">
                      <button class="close_form" id="vaccin-btn" name="close-insert-vaccin"> <i class="uis uis-multiply closeF"></i> </button> 
                    
                              <label >
                                Nom du vaccin : 
                                <input type="text" minlength="3" name="nom-vaccin"  placeholder="Exp: astrazeneca" />
                              </label>
                              <label >
                                Date de l'act  :
                                <input type="date"id="date-vaccin"name="vaccin-date" />
                            </label>
                            <label >
                            Protège contre : 
                            <input type="text" minlength="3" name="utilite-vaccin"  placeholder="exp: Protège contre covid-19 ....."/>
                        </label>
                        <label >
                          Nombre des rappels : 
                          <input type="text"  name="nbr-vaccin"  placeholder="exp: 2 fois ....."/>
                      </label>
                              <label >
                                  Description :
                                  <textarea name="desc-vaccin"  id="desc-vaccin"  rows="4" placeholder="Exp: J'ai eu des effets secondaires ..."></textarea>
                              </label>
                                
                            <button type="submit" class="form-btn"  name="insert-vaccin">Ajouter</button>
                  </form>
                  </div>
                    <!-- -----------------------------vaccin update----------------------------------- -->
                    <div class="overlay vaccin hide" id="vaccin1">
                      <form action="#" method="post" name="vaccin" class="form border update" id="vaccin-form-update">
                        <button class="close_form" id="vaccin-btn-close" name="close-update-vaccin"> <i class="uis uis-multiply closeF"></i> </button> 
                            <input type="hidden" name="idV" id="vac" >
                                
                                <label >
                                  Nom du vaccin : 
                                  <input type="text" minlength="3" name="nomV" id="nomV" placeholder="Exp: astrazeneca" />
                                </label>
                                <label >
                                  Date de l'act  :
                                  <input type="date"id="dateV"name="dateV" />
                              </label>
                              <label >
                              Protège contre : 
                              <input type="text" minlength="3" id="protegeV" name="protegeV"  placeholder="exp: Protège contre covid-19 ....."/>
                          </label>
                          <label >
                            Nombre des rappels : 
                            <input type="text"  name="nbV" id="nbRappel" placeholder="exp: 2 fois ....."/>
                        </label>
                                <label >
                                    Description :
                                    <textarea name="descV"  id="descV"  rows="4" placeholder="Exp: J'ai eu des effets secondaires ..."></textarea>
                                </label>
                                  
                              <button type="submit" class="form-btn"  name="update-vaccin" id="update-vaccin">Modifier</button>
                    </form>
                    </div>
                  <!-- -------------------------Contenu------------------------ -->

                      <div class="contenu" data-page="5">
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
                        <input type="text" name="search" id="search" placeholder='nom de vaccin....'>
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                        <hr>
<?php 

$date = 'tous';
$search = "";
  //--------vaccin-------------
 
 if(isset($_GET['byDate'])||isset($_GET['search']))
  {
    $date = $_GET['byDate'];
    $search = $_GET['search'];
    $vaccin = filter_by_date("vaccins",$date,$start_from,$num_per_page,"nom",$search,$conn);
    if (mysqli_num_rows($vaccin) > 0) 
    { // output data of each row
          affich_vaccin($vaccin);
         
    }
        //=================afficher le tableau============================
    $vaccin1 = filter_by_date("vaccins",$date,$start_from,$num_per_page,"nom",$search,$conn);

        if (mysqli_num_rows($vaccin1) > 0) 
        { table_vaccin($vaccin1); }
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
        $vaccin = mysqli_query($conn,"SELECT * FROM vaccins limit $start_from,$num_per_page");
      if (mysqli_num_rows($vaccin) > 0) 
    { // output data of each row
          affich_vaccin($vaccin);
    }
        //=================afficher le tableau============================
        $vaccin1 = mysqli_query($conn,"SELECT * FROM vaccins limit $start_from,$num_per_page");
        if (mysqli_num_rows($vaccin1) > 0) 
        { table_vaccin($vaccin1); }
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
pagination($conn,"vaccins","vaccin",3,$page);
echo'</div>';
?>
</div>

</div>
</div>

<?php include'footer.php';?>
 

 