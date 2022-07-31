<?php include'head.php';
include'pagination.php';
include '../../connexionDoc/cnx.php';
include'filter.php';


function affich_vaccin($vaccin,$res)
{
  echo' 
  <!-- -----------------------AFFICHAGE DES vaccins------------------------ -->
   <div class="affichage"> '.$res;
  

  while($row = mysqli_fetch_assoc($vaccin)) 
  { 
     echo"
     <div class='affichage-item border'id='vaccin'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idV"]."'>
                          <button class='editV editHide' value='".$row["idV"]."'><i class='fa-solid fa-pen'></i></button>
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
function table_vaccin($vaccin,$res)
{
  echo
  "
  $res
  <div class='table-scroll'>
  <table id='vaccin-table'>
<thead>
<tr>
  <th>Nom du vaccin</th>
  <th>Date de l'act</th>
  <th>Durée</th>
  <th>Nombre des rappels</th>
  <th>Description</th>
  <th>Actions</th>
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
           <td class='options'>
            
                <button class='editV btn-option' value='".$row["idV"]."'><i class='fa-solid fa-pen'></i></button>
                <button class='deleteV btn-option' id='delete-'".$row["idV"]."' value='".$row["idV"]."'><i class='fa-solid fa-trash-can'></i></button>
         
           </td>
      </tr>
   ";       
        
}

echo" 
</tbody>
</table> 
</div>
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
                      <button class="close_form" onclick="hideForm()" id="vaccin-btn" name="close-insert-vaccin"> <i class="uis uis-multiply closeF"></i> </button> 
                    
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
                        <button  class="close_form" id="vaccin-btn-close" name="close-update-vaccin" > <i class="uis uis-multiply closeF"></i> </button> 
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
                          <?php
                                   if(empty( $_SESSION['dateV']) && empty( $_SESSION['searchV']))
                                   {
                                   $_SESSION['dateV']='tous';
                                   $_SESSION['searchV']='';
                                   }
                                   if(isset($_POST['searchVac']))
                                   {
                                   
                                     $_SESSION['dateV'] = $_POST['byDateV'];
                                     $_SESSION['searchV'] = $_POST['searchV'];
                                     $_SESSION['searchVac'] = $_POST['searchVac'];

                                   }
                          ?>
                    <div class="filters">
                      <form action="" method="POST" id="by_date">
                        <select name="byDateV">
                        <option name="tous" value="tous" <?php if(isset($_SESSION['searchVac'])){if($_SESSION['dateV']=="tous"){echo "selected";} }?>>Tous</option>
                            <option name="cemois" value="cemois" <?php if(isset($_SESSION['searchVac'])){if($_SESSION['dateV']=="cemois"){echo "selected";} }?>>ce mois</option>
                            <option name="moisprec" value="moisprec" <?php if(isset($_SESSION['searchVac'])){if($_SESSION['dateV']=="moisprec"){echo "selected";} }?>>mois précédent</option>
                            <option name="6mois" value="6mois" <?php if(isset($_SESSION['searchVac'])){if($_SESSION['dateV']=="6mois"){echo "selected";} }?>>6 mois</option>
                            <option name="ans" value="ans" <?php if(isset($_SESSION['searchVac'])){if($_SESSION['dateV']=="ans"){echo "selected";} }?>>ans</option>
                            <option name="plsans" value="plusieursAns" <?php if(isset($_SESSION['searchVac'])){if($_SESSION['dateV']=="plusieursAns"){echo "selected";} }?>>plus d'un an</option>
                        </select>
                        <input type="text" name="searchV" id="search" placeholder='nom du vaccin...' value="<?php if(isset($_SESSION['searchVac'])){echo $_SESSION['searchV'];}?>">
                        <button type="submit" name="searchVac" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                        <hr class="hideMe">
                        <?php 
                    // $total_pages = 0;
                    $num_per_page=03;
           
                    // echo "ana session". $_SESSION['dateV']."<br>";
                    // echo "ana search". $_SESSION['searchV']."<br>";
                    
                    $pageV = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromV =   ($pageV-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromH;
                    $vaccin_array = filter_by_date("vaccins",$_SESSION['dateV'],$start_fromV,$num_per_page,"nom", $_SESSION['searchV'],$conn,$_SESSION['idPatient']);
                    $vaccin = $vaccin_array['query'];
                    $total_recordsV=$vaccin_array['nb_rows'];
                    // echo $total_records;
                    $total_pages=ceil($total_recordsV/$num_per_page);
                    $res = "<p class='response hideMe'>Il existe ". $total_recordsV." enregistrement</p>";
                    if($total_recordsV>0)
                    {
                     
                      table_vaccin($vaccin,$res);
                          

                    }
                    $vaccin_array1 = filter_by_date("vaccins",$_SESSION['dateV'],$start_fromV,$num_per_page,"nom", $_SESSION['searchV'],$conn,$_SESSION['idPatient']);
                    $vaccin1 = $vaccin_array1['query'];
                    $total_pages=ceil($total_recordsV/$num_per_page);
                    $res = "<p class='response '>Il existe ". $total_recordsV." enregistrement</p>";

                    if($total_recordsV>0)
                    {
                      // echo"<p class='response'>Il existe ". $total_recordsV." enregistrement</p>";
                      affich_vaccin($vaccin1,$res);
                      
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
let opt = options.querySelectorAll('options');

</script>
 