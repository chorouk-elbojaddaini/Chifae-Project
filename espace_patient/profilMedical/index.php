<?php include'head.php';
include'pagination.php';
include'filter.php';

include '../../connexionDoc/cnx.php';
function insert_maladie()
{
  echo'
  <div class="overlay maladie hide" id="maladie">
  <form action="#" method="post" name="maladie" class="form border insert" id="maladie-form">
    <button class="close_form" id="maladie-btn" name="close-insert-maladie"> <i class="uis uis-multiply closeF"></i> </button> 
            <label >
              Nom du maladie : 
              <input type="text" minlength="3" name="nom-maladie"  placeholder="Entrez le nom du maladie" />
          </label>
            <label >
                Date début du maladie :
                <input type="date"id="date-maladie"name="maladie-date" />
            </label>
            <label >
  Catégorie :
  <select id="category" name="category">
      <option value="ordinaire">ordinaire</option>
      <option value="chronique">chronique</option>
      <option value="Tumeur">Tumeur</option>
      <option value="Grossesse">Grossesse</option>
      <option value="autres">autres </option>
  </select>
              <label >
                  Description :
                  <textarea name="desc-maladie"  id="desc-maladie"  rows="4" placeholder="Décrivez votre maladie"></textarea>
              </label>
              
          <button type="submit" class="form-btn " name="insert-maladie" >Ajouter</button>
          
</form>
</div>
';
}
function affich_maladie($malad,$res)
{
 echo' 
 <!-- -----------------------AFFICHAGE DES MALADIES------------------------ -->
  <div class="affichage">';echo $res;
 while($row = mysqli_fetch_assoc($malad)) 
 { 
  

    echo"
    <div class='affichage-item border'>
         <h4>".$row["nom"]."
         <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                     <div class='options' data-div='".$row["idMal"]."'>
                         <button class='editM' value='".$row["idMal"]."'><i class='fa-solid fa-pen'></i></button>
                         <button class='deleteM' id='delete-'".$row["idMal"]."' value='".$row["idMal"]."'><i class='fa-solid fa-trash-can'></i></button>
                     </div>
         </h4>
         <p>Categorie <span>".$row["categorie"]."</span></p>

         <p>Depuis <span>".$row["date"]."</span></p>
         <p>Decription<span>".$row["description"]."</span></p>
   </div>
   <hr>";
 }
 echo'</div>';
}
function table_maladie($malad1,$res)
{
 echo  $res;
 
  echo"
    
    <table id='maladie-table'>
    <thead>
      <tr>
        <th>Nom du maladie</th>
        <th>Depuis</th>
        <th>Catégorie</th>

        <th>Description</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($malad1)) 
    { 
       echo"
           <tr>
                <td>".$row["nom"]."</td>
                 <td>".$row["date"]."</td>
                 <td>".$row["categorie"]."</td>

                 <td>".$row["description"]."</td>
                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idMal"]."'>
                      <button class='editM' value='".$row["idMal"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteM' id='delete-'".$row["idMal"]."' value='".$row["idMal"]."'><i class='fa-solid fa-trash-can'></i></button>
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
  <!-- =====================PAGE 1 =========================-->
  <div class="page  is-active" data-page="1" >
                  <!-- -------------------------Descriptions------------------------ -->
                  <div class="description " data-page="1">

                      <div class="text-img">
                          <img src="images/load.png" alt="load-a-file" id="add-file">
                          <div class="text">
                            <h2 id="ajout" class="hover-underline-animation">
                              J'ajoute mes maladies et autres sujets de santé
                            </h2>
                            <p>
                              Je peux renseigner l'ensemble de mes maladies et autres sujets de santé actuels ou passes (exemples : maladies graves,suivi dentaires, grossesses, douleurs chroniques...)
                            </p>
                            <button type="button" class="open-form" id="add-maladie" onclick="displayForm('maladie')">Ajouter une maladie</button>
                          </div>
                      </div>
                    
                    </div>

                      <!-- -----------------------REMPLISSAGE DES MALADIES------------------------ -->
                     <?php insert_maladie();?>
                 
                  <!-- -----------------------UPDATE DES MALADIES------------------------ -->
                  
                  <div class="overlay maladie hide" id="maladie1">
                    <form action="#" method="post" name="maladie" class="form border update" id="maladie-form-update">
                      <button class="close_form" id="maladie-btn-close" name="close-update-maladie"> <i class="uis uis-multiply closeF"></i> </button> 
                          <input type="hidden" name="idMal" id="mal" >

                              <label >
                                Nom du maladie : 
                                <input type="text" minlength="3" id="nomMal" name="nomMal"  placeholder="Entrez le nom du maladie" />
                            </label>
                              <label >
                                  Date début du maladie :
                                  <input type="date"id="dateMal"name="dateMal" />
                              </label>
                              <label >
                    Catégorie :
                    <select id="category" name="category">
                        <option value="ordi">ordinaire</option>
                        <option value="chroni">chronique</option>
                        <option value="tumeur">Tumeur</option>
                        <option value="grossesse">Grossesse</option>
                        <option value="autres">autres </option>
                    </select>
                                <label >
                                    Description :
                                    <textarea name="descMal"  id="descMal"  rows="4" placeholder="Décrivez votre maladie"></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn "id="update-maladie" name="update-maladie">Modifier</button>
                            
                  </form>
                  </div>
                  

                  <!-- -------------------------Contenu------------------------ -->
                  <div class="contenu " data-page="1">
                    
                    <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="index.php" method="POST" id="by_date">
                        <select name="byDate">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="search" id="search" placeholder='ordinaire ...'>
                        <button type="submit" name="searchM" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <hr>
                    <!-- -----------------------AFFICHAGE DES MALADIES------------------------ -->
                    
                    <?php 

                  
                  $num_per_page=03;

                  if(empty( $_SESSION['date']) && empty( $_SESSION['search']))
                  {
                  $_SESSION['date']='tous';
                  $_SESSION['search']='';
                  }
                  if(isset($_POST['searchM']))
                  {
                  
                    $_SESSION['date'] = $_POST['byDate'];
                    $_SESSION['search'] = $_POST['search'];
                  }
                  // echo "ana session". $_SESSION['date']."<br>";

                  $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                  // echo "ana page".$page."<br>";
                  $start_from =   ($page-1)*$num_per_page;
                  // echo "ana lbdya 0".$start_from;
                  $malad_array = filter_by_date("maladies",$_SESSION['date'],$start_from,$num_per_page,"categorie", $_SESSION['search'],$conn);
                  $malad = $malad_array['query'];
                  $total_records=$malad_array['nb_rows'];
                  // echo "ana total".$total_records;
                  $total_pages=ceil($total_records/$num_per_page);
                  $res ="<p class='response hideMe'>Il existe ". $total_records." enregistrement</p>";

                  if($total_records>0)
                  {

                    table_maladie($malad,$res);
                        

                  }//====================small devices================
                  $malad1_array = filter_by_date("maladies",$_SESSION['date'],$start_from,$num_per_page,"categorie", $_SESSION['search'],$conn);
                  $malad1 = $malad1_array['query'];
                  $total_records1=$malad1_array['nb_rows'];
                  $res1 ="<p class='response'>Il existe ". $total_records1." enregistrement</p>";
                  if($total_records1>0)
                  {
                    // echo"<p class='response'>Il existe ". $total_records." enregistrement</p>";

                    affich_maladie($malad1,$res1);
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